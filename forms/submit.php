<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$formType = field('form_type');
$allowed = ['contact', 'quote', 'volunteer'];
if (!in_array($formType, $allowed, true)) {
    header('Location: ../thank-you.php?status=invalid');
    exit;
}

// Honeypot: humans should never fill this field.
if (field('website') !== '') {
    header('Location: ../thank-you.php?status=sent&type=' . urlencode($formType));
    exit;
}

if (!valid_csrf()) {
    header('Location: ../thank-you.php?status=expired&type=' . urlencode($formType));
    exit;
}

if (!rate_limit_ok()) {
    header('Location: ../thank-you.php?status=slow&type=' . urlencode($formType));
    exit;
}

$fullName = field('full_name');
$phone = field('phone');
$email = field('email');
$message = field('message');
$consent = field('consent');

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../thank-you.php?status=invalid_email&type=' . urlencode($formType));
    exit;
}

$replyTo = $email !== '' ? $email : null;
$ok = false;

if ($formType === 'contact') {
    $subject = field('subject');
    if ($fullName === '' || $subject === '' || $message === '' || $consent !== 'yes' || ($phone === '' && $email === '')) {
        header('Location: ../thank-you.php?status=missing&type=contact');
        exit;
    }
    $rows = [
        'Form' => 'Contact Us',
        'Full Name' => $fullName,
        'Phone' => $phone,
        'Email' => $email,
        'Subject' => $subject,
        'Message' => $message,
        'Consent' => 'Yes',
        'Submitted' => date('Y-m-d H:i:s T'),
    ];
    $ok = send_site_mail('[Jayden Website] Contact: ' . $subject . ' - ' . $fullName, $rows, $replyTo);
}

if ($formType === 'quote') {
    $location = field('location');
    $service = field('service');
    if ($fullName === '' || $phone === '' || $location === '' || $service === '' || $message === '' || $consent !== 'yes') {
        header('Location: ../thank-you.php?status=missing&type=quote');
        exit;
    }
    $rows = [
        'Form' => 'Request Care / Quotation',
        'Full Name' => $fullName,
        'Phone' => $phone,
        'Email' => $email,
        'Client Location' => $location,
        'Service Required' => $service,
        'Preferred Start Date' => field('start_date'),
        'Expected Duration' => field('duration'),
        'Care Schedule' => field('schedule'),
        'Care Location Type' => field('care_location'),
        'Preferred Contact Method' => field('contact_method'),
        'Support Needed' => $message,
        'Consent' => 'Yes',
        'Submitted' => date('Y-m-d H:i:s T'),
    ];
    $ok = send_site_mail('[Jayden Website] Care Request - ' . $service . ' - ' . $fullName, $rows, $replyTo);
}

if ($formType === 'volunteer') {
    $location = field('location');
    $interest = field('interest');
    if ($fullName === '' || $phone === '' || $email === '' || $location === '' || $interest === '' || $message === '' || $consent !== 'yes') {
        header('Location: ../thank-you.php?status=missing&type=volunteer');
        exit;
    }
    $rows = [
        'Form' => 'Volunteer Interest',
        'Full Name' => $fullName,
        'Phone' => $phone,
        'Email' => $email,
        'Location / District' => $location,
        'Area of Interest' => $interest,
        'Availability' => field('availability'),
        'Qualification / Experience' => field('experience'),
        'Why They Want to Volunteer' => $message,
        'Consent' => 'Yes',
        'Submitted' => date('Y-m-d H:i:s T'),
    ];
    $ok = send_site_mail('[Jayden Website] Volunteer Interest - ' . $interest . ' - ' . $fullName, $rows, $replyTo);
}

header('Location: ../thank-you.php?status=' . ($ok ? 'sent' : 'mail_error') . '&type=' . urlencode($formType));
exit;
