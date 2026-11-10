</main>
<section class="emergency-note">
    <div class="container">
        <strong>Medical emergency?</strong> Jayden homecare is not an emergency medical service. Seek immediate assessment at an appropriate health facility.
    </div>
</section>
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <img class="footer-logo" src="assets/images/jayden-logo.webp?v=<?= e($assetVersion) ?>" alt="Jayden Care" loading="lazy" decoding="async">
            <p>Compassionate Care. Professional Support. Right Where You Need It.</p>
            <div class="social-links" aria-label="Jayden social media links">
                <a href="<?= e(SITE_TIKTOK) ?>" target="_blank" rel="noopener" aria-label="Jayden Care on TikTok" title="TikTok"><i data-lucide="music-2" aria-hidden="true">TikTok</i></a>
                <a href="<?= e(SITE_FACEBOOK) ?>" target="_blank" rel="noopener" aria-label="Jayden Care on Facebook" title="Facebook"><i data-lucide="facebook" aria-hidden="true">Facebook</i></a>
                <a href="<?= e(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener" aria-label="Jayden Care on Instagram" title="Instagram"><i data-lucide="instagram" aria-hidden="true">Instagram</i></a>
            </div>
        </div>
        <div>
            <h3>Care Services</h3>
            <a href="services.php#home-nursing">Homecare Nursing</a>
            <a href="services.php#bedside-care">Bedside &amp; Hospital Care</a>
            <a href="services.php#elderly-care">Elderly Care</a>
            <a href="services.php#recovery-care">Post-Surgery Care</a>
            <a href="services.php#palliative-care">Palliative &amp; Comfort Care</a>
        </div>
        <div>
            <h3>Quick Links</h3>
            <a href="about.php">About Jayden</a>
            <a href="care-pricing.php">Request a Quotation</a>
            <a href="volunteer.php">Volunteer With Us</a>
            <a href="international-internship.php">International Internships</a>
            <a href="international-internship.php#internship-application">Apply for an Internship</a>
            <a href="faq.php">FAQs</a>
            <a href="healthy-tips.php">Healthy Tips</a>
            <a href="privacy.php">Privacy Notice</a>
        </div>
        <div>
            <h3>Contact Jayden</h3>
            <p><?= e(SITE_POBOX) ?><br><?= e(SITE_ADDRESS) ?></p>
            <a href="tel:<?= e(SITE_PHONE_E164) ?>"><?= e(SITE_PHONE_DISPLAY) ?></a>
            <a href="tel:<?= e((string) constant('SITE_PHONE_SECONDARY_E164')) ?>"><?= e((string) constant('SITE_PHONE_SECONDARY_DISPLAY')) ?></a>
            <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
            <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=Hello%20Jayden%20Care%2C%20I%20would%20like%20to%20ask%20about%20your%20services." target="_blank" rel="noopener">WhatsApp Jayden</a>
        </div>
        <p class="footer-payment-details" aria-label="Payment details"><strong>PAYMENT CHANNELS</strong><span aria-hidden="true">|</span><span><strong>Airtel Merchant Pay:</strong> Code 4428648</span><span aria-hidden="true">|</span><span><strong> DFCU Bank - Entebbe Branch:</strong>  Account: 01560021160578, Account Name: <?= e(SITE_NAME) ?></span></p>
    </div>
    <div class="container footer-bottom">
        <span>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</span>
        <span>Caring with Heart. Serving with Excellence.</span>
    </div>
</footer>
<a class="whatsapp-float" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=Hello%20Jayden%20Care%2C%20I%20would%20like%20to%20ask%20about%20your%20services." target="_blank" rel="noopener" aria-label="Chat with Jayden Care on WhatsApp">WA</a>
<?php if (($currentPage ?? '') !== 'internship'): ?>
<dialog class="internship-popup" data-internship-popup aria-labelledby="internshipPopupTitle" aria-describedby="internshipPopupDescription">
    <button class="internship-popup-close" type="button" data-internship-popup-close aria-label="Close internship announcement"><i data-lucide="x" aria-hidden="true">Close</i></button>
    <img src="assets/images/international-healthcare-internship.webp?v=<?= e($assetVersion) ?>" alt="" loading="lazy" decoding="async">
    <div class="internship-popup-copy">
        <span class="eyebrow">Now welcoming enquiries</span>
        <h2 id="internshipPopupTitle">International healthcare internships in Uganda</h2>
        <p id="internshipPopupDescription">Explore supervised learning opportunities, community health and cultural exchange with Jayden Care.</p>
        <a class="btn" href="international-internship.php">Explore internship programs</a>
    </div>
</dialog>
<?php endif; ?>
<section class="cookie-consent" data-cookie-consent hidden role="dialog" aria-live="polite" aria-label="Cookie consent">
    <div class="cookie-consent-copy">
        <strong>Your privacy matters</strong>
        <p>Jayden uses an essential session cookie to secure website forms and stores your consent choice in this browser. We do not use advertising or analytics cookies. Read our <a href="privacy.php">privacy notice</a>.</p>
    </div>
    <div class="cookie-consent-actions">
        <button class="btn btn-outline" type="button" data-cookie-choice="essential">Essential only</button>
        <button class="btn" type="button" data-cookie-choice="accepted">Accept</button>
    </div>
</section>
</body>
</html>
