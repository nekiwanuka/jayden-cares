<?php
$currentPage = 'contact';
$pageTitle = 'Contact Jayden Care';
$pageDescription = 'Contact Jayden Nursing and Bedside Homecare Services Limited by phone, email, WhatsApp or the website form.';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div class="container narrow"><span class="eyebrow">Contact Jayden</span><h1>Talk to us about the care you need.</h1><p>Use the contact form for general enquiries. If you already know the kind of support required, you may also use the quotation form to request care.</p></div></section>
<section class="section">
    <div class="container contact-grid">
        <div class="contact-details">
            <div class="contact-tile"><span>Phone</span><a href="tel:<?= e(SITE_PHONE_E164) ?>"><?= e(SITE_PHONE_DISPLAY) ?></a><a href="tel:<?= e((string) constant('SITE_PHONE_SECONDARY_E164')) ?>"><?= e((string) constant('SITE_PHONE_SECONDARY_DISPLAY')) ?></a></div>
            <div class="contact-tile"><span>Email</span><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></div>
            <div class="contact-tile"><span>WhatsApp</span><a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener">Chat with Jayden</a></div>
            <div class="contact-tile"><span>Address</span><strong><?= e(SITE_ADDRESS) ?></strong></div>
            <div class="contact-tile"><span>Social Media</span><div class="social-links social-links-inline"><a href="<?= e(SITE_TIKTOK) ?>" target="_blank" rel="noopener">TT <span>TikTok</span></a><a href="<?= e(SITE_FACEBOOK) ?>" target="_blank" rel="noopener">FB <span>Facebook</span></a><a href="<?= e(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener">IG <span><?= e(SITE_INSTAGRAM_HANDLE) ?></span></a></div></div>
            <div class="contact-photo-card"><img src="assets/images/personal-care.webp?v=<?= e($assetVersion) ?>" alt="Jayden caregiver supporting an older client outdoors" loading="lazy" decoding="async"></div>
        </div>
        <form class="site-form" method="post" action="forms/submit.php" novalidate>
            <input type="hidden" name="form_type" value="contact"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><div class="hp-field" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
            <div class="form-grid"><label>Full Name*<input name="full_name" required maxlength="120" autocomplete="name"></label><label>Phone Number<input name="phone" maxlength="50" autocomplete="tel"></label><label>Email Address<input type="email" name="email" maxlength="160" autocomplete="email"></label><label>Subject*<input name="subject" required maxlength="160"></label></div><label>Message*<textarea name="message" rows="7" required maxlength="3000"></textarea></label><label class="check"><input type="checkbox" name="consent" value="yes" required><span>I consent to Jayden using these details to respond to my enquiry.</span></label><button class="btn" type="submit">Send Message</button><p class="form-note">Please provide either a phone number or email address so Jayden can respond.</p>
        </form>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
