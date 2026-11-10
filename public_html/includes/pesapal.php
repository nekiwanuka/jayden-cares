<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

function pesapal_is_configured(): bool
{
    return PESAPAL_CONSUMER_KEY !== '' && PESAPAL_CONSUMER_SECRET !== '';
}

function pesapal_base_url(): string
{
    if (PESAPAL_ENVIRONMENT === 'sandbox') {
        return 'https://cybqa.pesapal.com/pesapalv3';
    }
    if (PESAPAL_ENVIRONMENT === 'live') {
        return 'https://pay.pesapal.com/v3';
    }
    throw new RuntimeException('PesaPal environment must be set to sandbox or live.');
}

function pesapal_api_request(string $method, string $path, ?array $payload = null, ?string $token = null): array
{
    if (!function_exists('curl_init')) {
        throw new RuntimeException('The PHP cURL extension is required for PesaPal payments.');
    }

    $headers = ['Accept: application/json', 'Content-Type: application/json'];
    if ($token !== null) {
        $headers[] = 'Authorization: Bearer ' . $token;
    }

    $curl = curl_init(pesapal_base_url() . $path);
    if ($curl === false) {
        throw new RuntimeException('Unable to initialize the PesaPal request.');
    }
    $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_NOSIGNAL => 1,
    ];
    if ($payload !== null) {
        try {
            $payloadJson = json_encode($payload, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $payloadJson;
        } catch (JsonException $error) {
            throw new RuntimeException('Payment details could not be encoded.', 0, $error);
        }
    }
    curl_setopt_array($curl, $options);
    $responseBody = curl_exec($curl);
    $curlError = curl_error($curl);
    $httpStatus = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($responseBody === false) {
        error_log('PesaPal request failed: ' . $curlError . ' (HTTP ' . $httpStatus . ')');
        throw new RuntimeException('Unable to contact PesaPal. Please try again later.');
    }
    $response = json_decode($responseBody, true);
    if (!is_array($response) || $httpStatus < 200 || $httpStatus >= 300 || isset($response['error'])) {
        $error = is_array($response) ? ($response['error'] ?? null) : null;
        $errorCode = is_array($error)
            ? (string) ($error['code'] ?? $error['type'] ?? 'invalid_response')
            : (is_string($error) ? $error : 'invalid_response');
        error_log('PesaPal API returned HTTP ' . $httpStatus . ' (' . preg_replace('/[^A-Za-z0-9_-]/', '', $errorCode) . ').');
        throw new RuntimeException('PesaPal could not process the request. Please try again or contact Jayden.');
    }
    return $response;
}

function pesapal_access_token(): string
{
    if (!pesapal_is_configured()) {
        throw new RuntimeException('PesaPal credentials have not been configured.');
    }
    $response = pesapal_api_request('POST', '/api/Auth/RequestToken', [
        'consumer_key' => PESAPAL_CONSUMER_KEY,
        'consumer_secret' => PESAPAL_CONSUMER_SECRET,
    ]);
    $token = (string) ($response['token'] ?? '');
    if ($token === '') {
        throw new RuntimeException('PesaPal did not return an access token.');
    }
    return $token;
}

function pesapal_notification_id(string $token): string
{
    $callbackUrl = 'https://' . SITE_DOMAIN . '/payments-ipn.php';
    $cacheFile = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR)
        . DIRECTORY_SEPARATOR . 'jayden-pesapal-ipn-' . hash('sha256', PESAPAL_ENVIRONMENT . '|' . PESAPAL_CONSUMER_KEY . '|' . $callbackUrl) . '.json';
    $cache = fopen($cacheFile, 'c+');
    if ($cache === false || !flock($cache, LOCK_EX)) {
        if (is_resource($cache)) {
            fclose($cache);
        }
        throw new RuntimeException('Unable to prepare PesaPal payment notifications on this server.');
    }

    try {
        rewind($cache);
        $cached = json_decode((string) stream_get_contents($cache), true);
        if (is_array($cached) && ($cached['url'] ?? '') === $callbackUrl && is_string($cached['ipn_id'] ?? null) && $cached['ipn_id'] !== '') {
            return $cached['ipn_id'];
        }

        $response = pesapal_api_request('POST', '/api/URLSetup/RegisterIPN', [
            'url' => $callbackUrl,
            'ipn_notification_type' => 'GET',
        ], $token);
        $notificationId = (string) ($response['ipn_id'] ?? '');
        if ($notificationId === '') {
            throw new RuntimeException('PesaPal did not register payment notifications.');
        }

        rewind($cache);
        ftruncate($cache, 0);
        $cacheContent = json_encode(['url' => $callbackUrl, 'ipn_id' => $notificationId]);
        $written = $cacheContent === false ? false : fwrite($cache, $cacheContent);
        if ($written !== strlen((string) $cacheContent) || !fflush($cache)) {
            throw new RuntimeException('Unable to save PesaPal notification configuration.');
        }
        return $notificationId;
    } finally {
        flock($cache, LOCK_UN);
        fclose($cache);
    }
}

function pesapal_submit_invoice_payment(array $payment): string
{
    $token = pesapal_access_token();
    $notificationId = pesapal_notification_id($token);
    try {
        $merchantReference = 'JC' . date('ymdHis') . strtoupper(bin2hex(random_bytes(3)));
    } catch (Exception $error) {
        throw new RuntimeException('Unable to create a secure payment reference.', 0, $error);
    }
    $callbackUrl = 'https://' . SITE_DOMAIN . '/payments-return.php';

    $response = pesapal_api_request('POST', '/api/Transactions/SubmitOrderRequest', [
        'id' => $merchantReference,
        'currency' => 'UGX',
        'amount' => (int) $payment['amount'],
        'description' => 'Invoice ' . $payment['invoice_reference'] . ' - Jayden Care',
        'callback_url' => $callbackUrl,
        'notification_id' => $notificationId,
        'billing_address' => [
            'email_address' => $payment['email'],
            'phone_number' => $payment['phone'],
            'country_code' => 'UG',
            'first_name' => $payment['first_name'],
            'last_name' => $payment['last_name'],
        ],
    ], $token);

    $redirectUrl = (string) ($response['redirect_url'] ?? '');
    $redirectParts = parse_url($redirectUrl);
    $allowedHosts = PESAPAL_ENVIRONMENT === 'sandbox'
        ? ['cybqa.pesapal.com']
        : ['pay.pesapal.com'];
    if (
        ($redirectParts['scheme'] ?? '') !== 'https'
        || !in_array(strtolower((string) ($redirectParts['host'] ?? '')), $allowedHosts, true)
    ) {
        error_log('PesaPal returned an invalid checkout URL.');
        throw new RuntimeException('PesaPal did not provide a valid checkout page. Please contact Jayden.');
    }
    return $redirectUrl;
}

function pesapal_transaction_status(string $orderTrackingId): array
{
    return pesapal_api_request(
        'GET',
        '/api/Transactions/GetTransactionStatus?orderTrackingId=' . rawurlencode($orderTrackingId),
        null,
        pesapal_access_token()
    );
}

function pesapal_order_tracking_id(array $query): string
{
    $trackingId = (string) ($query['OrderTrackingId'] ?? $query['orderTrackingId'] ?? '');
    return preg_match('/^[A-Za-z0-9-]{1,100}$/', $trackingId) === 1 ? $trackingId : '';
}
