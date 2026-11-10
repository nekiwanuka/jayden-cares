<?php
$currentPage = '';
$pageTitle = 'Thank You';
$pageDescription = 'Jayden Care website form status.';
$pageRobots = 'noindex,follow';
require __DIR__ . '/includes/header.php';
$status = (string) ($_GET['status'] ?? '');
$type = (string) ($_GET['type'] ?? '');
$back = $type === 'course' ? 'caregiver-training.php' : ($type === 'internship' ? 'international-internship.php#internship-application' : ($type === 'volunteer' ? 'volunteer.php' : ($type === 'quote' ? 'care-pricing.php#request-quote' : 'contact.php')));
$messages = [
    'sent' => ['Thank you. Your message has been sent.', 'Jayden will review your enquiry and contact you using the details provided.'],
    'missing' => ['Some required information is missing.', 'Please return to the form and complete all required fields.'],
    'invalid_email' => ['Please check the email address.', 'The email address entered does not appear to be valid.'],
    'expired' => ['The form session expired.', 'Please return to the form, refresh the page and submit again.'],
    'slow' => ['Please wait before submitting again.', 'A form was submitted very recently from this browser. Wait a few seconds and try again.'],
    'mail_error' => ['We could not send the form by email.', 'Please call or WhatsApp Jayden directly while the website mail settings are checked.'],
    'invalid' => ['We could not process that request.', 'Please return to the website and try again.'],
];
[$heading, $body] = $messages[$status] ?? $messages['invalid'];
?>
<section class="page-hero"><div class="container narrow status-box"><img src="assets/images/jayden-mark.webp?v=<?= e($assetVersion) ?>" alt="" class="status-mark"><span class="eyebrow">Jayden Care</span><h1><?= e($heading) ?></h1><p><?= e($body) ?></p><div class="hero-actions"><a class="btn" href="<?= e($back) ?>">Return to Form</a><a class="btn btn-outline" href="tel:<?= e(SITE_PHONE_E164) ?>">Call Jayden</a></div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
