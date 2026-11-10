<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/pesapal.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    header('Allow: GET');
    exit;
}

$trackingId = pesapal_order_tracking_id($_GET);
if ($trackingId === '') {
    http_response_code(400);
    exit;
}

try {
    pesapal_transaction_status($trackingId);
} catch (RuntimeException $error) {
    error_log('PesaPal IPN verification failed: ' . $error->getMessage());
    http_response_code(503);
    exit;
}

http_response_code(200);
header('Content-Type: text/plain; charset=UTF-8');
echo 'OK';
