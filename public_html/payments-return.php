<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/pesapal.php';

$currentPage = 'payments';
$pageTitle = 'Payment Channels';
$pageDescription = 'Direct payment channels and contact details for Jayden Care.';
$pageRobots = 'noindex,nofollow';
$pageCanonical = 'https://' . SITE_DOMAIN . '/contact.php';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div class="container narrow"><span class="eyebrow">Direct payment options</span><h1>Payment channels are handled directly.</h1><p>Jayden is currently receiving payments through the direct channels listed on the website and by direct bank or mobile-money confirmation.</p></div></section>
<section class="section"><div class="container narrow status-box">
    <h2>To make a payment</h2>
    <p>Use the Airtel Money or DFCU details shown in the footer, then contact Jayden with your invoice reference to confirm receipt.</p>
    <div class="hero-actions"><a class="btn" href="contact.php">Contact Jayden</a><a class="btn btn-outline" href="index.php">Back to Home</a></div>
</div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
