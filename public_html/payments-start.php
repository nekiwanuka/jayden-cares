<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/pesapal.php';

function redirect_to_payment_status(string $status): never
{
    header('Location: contact.php?payment=channels', true, 303);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php?payment=channels', true, 303);
    exit;
}
if (!valid_csrf()) {
    redirect_to_payment_status('invalid');
}
if (!pesapal_is_configured()) {
    redirect_to_payment_status('not_configured');
}

$invoiceReference = trim((string) ($_POST['invoice_reference'] ?? ''));
$amount = trim((string) ($_POST['amount'] ?? ''));
$firstName = clean_text((string) ($_POST['first_name'] ?? ''), 80);
$lastName = clean_text((string) ($_POST['last_name'] ?? ''), 80);
$phone = trim((string) ($_POST['phone'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));

if (
    preg_match('/^[A-Za-z0-9-]{1,30}$/', $invoiceReference) !== 1
    || preg_match('/^[1-9][0-9]{0,8}$/', $amount) !== 1
    || $firstName === ''
    || $lastName === ''
    || preg_match('/^[+0-9 ()-]{7,25}$/', $phone) !== 1
    || filter_var($email, FILTER_VALIDATE_EMAIL) === false
    || (string) ($_POST['consent'] ?? '') !== 'yes'
) {
    redirect_to_payment_status('invalid');
}

try {
    $checkoutUrl = pesapal_submit_invoice_payment([
        'invoice_reference' => $invoiceReference,
        'amount' => (int) $amount,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'phone' => $phone,
        'email' => $email,
    ]);
} catch (RuntimeException $error) {
    error_log('PesaPal checkout could not be started: ' . $error->getMessage());
    redirect_to_payment_status('failed');
}

header('Location: ' . $checkoutUrl, true, 303);
exit;
