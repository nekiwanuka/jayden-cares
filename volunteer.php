<?php
$currentPage = 'volunteer';
$pageTitle = 'Volunteer With Jayden';
$pageDescription = 'Express interest in volunteering or supporting Jayden Nursing and Bedside Homecare Services Limited.';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div class="container narrow"><span class="eyebrow">Volunteer With Us</span><h1>Offer your time, skills and compassion.</h1><p>Jayden welcomes expressions of interest from people who would like to support care, community outreach and service activities. Opportunities depend on current needs, suitability and professional scope.</p></div></section>
<section class="section">
    <div class="container image-text-split">
        <div>
            <h2>Where support may be useful.</h2>
            <div class="values-grid compact-values">
                <div><strong>Care Support</strong><p>Appropriate non-clinical support under clear supervision and boundaries.</p></div>
                <div><strong>Community Outreach</strong><p>Health awareness, family support and community engagement activities.</p></div>
                <div><strong>Professional Skills</strong><p>Qualified healthcare professionals may express interest for suitable activities within professional scope.</p></div>
                <div><strong>Administration</strong><p>Support with communication, organisation, events and approved operational tasks.</p></div>
            </div>
        </div>
        <div class="image-text-photo">
            <img src="assets/images/medical-escort.webp?v=<?= e($assetVersion) ?>" alt="Jayden team member supporting an elderly client in a care facility corridor" loading="lazy" decoding="async">
        </div>
    </div>
</section>
<section class="section section-soft"><div class="container form-layout"><div><span class="eyebrow">Volunteer Application</span><h2>Tell us how you would like to contribute.</h2><p>We intentionally keep this first application simple. If more documents are required, Jayden can request them directly after review.</p><div class="quote-panel volunteer-note"><p>Volunteering does not guarantee employment or clinical placement. Jayden will review each expression of interest according to current needs, qualifications, safeguarding and professional requirements.</p></div></div>
<form class="site-form" method="post" action="forms/submit.php" novalidate><input type="hidden" name="form_type" value="volunteer"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><div class="hp-field" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
<div class="form-grid"><label>Full Name*<input name="full_name" required maxlength="120" autocomplete="name"></label><label>Phone Number*<input name="phone" required maxlength="50" autocomplete="tel"></label><label>Email Address*<input type="email" name="email" required maxlength="160" autocomplete="email"></label><label>Location / District*<input name="location" required maxlength="160"></label><label>Area of Interest*<select name="interest" required><option value="">Select</option><option>Nursing</option><option>Midwifery</option><option>Caregiving / bedside support</option><option>Physiotherapy / rehabilitation</option><option>Community outreach</option><option>Administration</option><option>Communications</option><option>Other</option></select></label><label>Availability<select name="availability"><option value="">Select</option><option>Weekdays</option><option>Weekends</option><option>Occasional activities</option><option>Flexible</option></select></label></div>
<label>Qualification or Relevant Experience<textarea name="experience" rows="4" maxlength="1800"></textarea></label><label>Why would you like to volunteer with Jayden?*<textarea name="message" rows="5" required maxlength="2000"></textarea></label><label class="check"><input type="checkbox" name="consent" value="yes" required><span>I consent to Jayden using the information submitted here to review and contact me about volunteering opportunities.</span></label><button class="btn" type="submit">Submit Volunteer Interest</button></form>
</div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
