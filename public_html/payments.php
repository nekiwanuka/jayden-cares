<?php
$currentPage = 'payments';
$pageTitle = 'Payment Channels';
$pageDescription = 'Jayden payment channels for Airtel, MTN MoMo, DFCU and direct invoice payment arrangements.';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div class="container narrow"><span class="eyebrow">Payment channels</span><h1>Pay using a method that works for you.</h1><p>Jayden accepts direct payments through the channels below. Please include your invoice reference so we can confirm receipt quickly.</p></div></section>
<section class="section section-soft"><div class="container">
    <div class="payment-methods" aria-label="Jayden payment channels">
        <ul class="payment-method-list">
            <li class="payment-method payment-method-airtel"><span aria-hidden="true">A</span>Airtel Money</li>
            <li class="payment-method payment-method-mtn"><span aria-hidden="true">MTN</span>MTN MoMo</li>
            <li class="payment-method payment-method-visa"><span aria-hidden="true">VISA</span>Visa</li>
            <li class="payment-method payment-method-mastercard"><span class="mastercard-mark" aria-hidden="true"><i></i><i></i></span>Mastercard</li>
        </ul>
    </div>

    <div class="contact-box">
        <strong>Airtel Merchant Pay</strong>
        <p>Code No: 4428648</p>
    </div>

    <div class="contact-box">
        <strong>DFCU Bank Entebbe Branch, Account No: 01560021160578 </strong>

        <p>Account name: <?= e(SITE_NAME) ?></p>
    </div>

    <div class="contact-box">
        <strong>Need help?</strong>
        <p>Call <?= e(SITE_PHONE_DISPLAY) ?> or email <?= e(SITE_EMAIL) ?> and share your invoice reference before making payment.</p>
    </div>
</div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
