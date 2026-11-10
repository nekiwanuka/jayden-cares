<?php
$currentPage = 'internship';
$pageTitle = 'International Healthcare Internships in Uganda';
$pageDescription = 'Explore supervised international healthcare internship programs in Uganda with Jayden Nursing and Bedside Homecare Services.';
$internshipTracks = [
    [
        'title' => 'Nursing and Clinical Care',
        'topics' => ['Nursing practices and patient support', 'Bedside care, comfort and personal care', 'Basic observation and monitoring', 'Infection prevention education alongside qualified local professionals'],
    ],
    [
        'title' => 'Community Health',
        'topics' => ['Health education and promotion', 'Disease prevention and community outreach', 'Supervised screening initiatives', 'Learning about local community health needs'],
    ],
    [
        'title' => 'Maternal and Child Healthcare',
        'topics' => ['Maternal and child health services', 'Antenatal and postnatal health education', 'Child health and nutrition awareness', 'Maternal health outreach'],
    ],
    [
        'title' => 'Elderly Care and Homecare',
        'topics' => ['Elderly and bedside support', 'Rehabilitation support exposure', 'Patient dignity and emotional support', 'Home-based healthcare approaches'],
    ],
    [
        'title' => 'Public Health',
        'topics' => ['Public health education', 'Community disease prevention', 'Health promotion campaigns', 'Approved community health research exposure'],
    ],
    [
        'title' => 'Healthcare Administration and Management',
        'topics' => ['Healthcare service coordination', 'Patient support systems and documentation', 'Homecare service management', 'Healthcare operations'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero internship-hero">
    <div class="container internship-hero-grid">
        <div class="internship-hero-copy">
            <span class="eyebrow light">International Healthcare Internship Programs</span>
            <h1>Experience healthcare. Discover Uganda. Make a difference.</h1>
            <p>Practical learning, cultural exchange and community engagement for international students, graduates and aspiring healthcare professionals.</p>
            <div class="hero-actions">
                <a class="btn btn-accent" href="#internship-application">Apply for an internship</a>
                <a class="btn btn-glass" href="#programs">Explore programs</a>
            </div>
        </div>
        <img class="internship-hero-image" src="assets/images/international-healthcare-internship.webp?v=<?= e($assetVersion) ?>" alt="Jayden International Healthcare Internship Programs poster with healthcare professionals and Uganda program details" fetchpriority="high" decoding="async">
    </div>
</section>

<section class="section">
    <div class="container internship-intro-grid">
        <div>
            <span class="eyebrow">Welcome to Uganda</span>
            <h2>Learn alongside local healthcare teams.</h2>
            <p class="lead">Jayden Nursing and Bedside Homecare Services welcomes international students, graduates and aspiring healthcare professionals interested in healthcare delivery in Uganda.</p>
            <p>Internship opportunities bring together professional learning, cultural exchange and community engagement. Activities and patient contact depend on eligibility, placement availability, host-site approval and appropriate supervision.</p>
            <a class="text-link" href="#placement-safeguarding">Read about placement and supervision <span aria-hidden="true">→</span></a>
        </div>
        <figure class="image-text-photo volunteer-inline-photo">
            <img src="assets/images/volunteer-team-01.webp?v=<?= e($assetVersion) ?>" alt="Healthcare professionals in Jayden-branded scrubs gathered for a team portrait" loading="lazy" decoding="async">
            <figcaption>Professional learning with respect for local teams and communities</figcaption>
        </figure>
    </div>
</section>

<section class="section section-soft" id="programs">
    <div class="container">
        <div class="section-heading compact">
            <span class="eyebrow">Internship programs</span>
            <h2>Choose an area that fits your learning goals.</h2>
            <p>Program activities are arranged according to the intern's background, approved scope, host-site requirements and available supervision.</p>
        </div>
        <div class="internship-track-grid">
            <?php foreach ($internshipTracks as $index => $track): ?>
            <article class="internship-track">
                <span class="internship-track-number" aria-hidden="true"><?= sprintf('%02d', $index + 1) ?></span>
                <h3><?= e($track['title']) ?></h3>
                <ul class="clean-list compact-list">
                    <?php foreach ($track['topics'] as $topic): ?>
                    <li><?= e($topic) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container internship-details-grid">
        <div>
            <span class="eyebrow">Your internship experience</span>
            <h2>Build perspective as well as practical knowledge.</h2>
            <ul class="clean-list">
                <li>Learning opportunities in an African healthcare environment.</li>
                <li>Professional mentorship and guidance, subject to placement arrangements.</li>
                <li>Cross-cultural experiences and exposure to community-based healthcare.</li>
                <li>Insight into healthcare delivery challenges and potential solutions.</li>
                <li>Communication, teamwork and a broader international perspective.</li>
            </ul>
        </div>
        <div class="internship-duration-panel">
            <span class="eyebrow">Who can apply?</span>
            <h2>Students and graduates with relevant interests.</h2>
            <ul class="clean-list">
                <li>Nursing, medical, public health and midwifery students.</li>
                <li>Healthcare graduates and social work students interested in community health.</li>
                <li>International volunteers with relevant interests, qualifications and approvals.</li>
            </ul>
            <p><strong>Duration:</strong> Enquiries are welcome for 2, 4, 8 or 12 weeks, or 3–6 months. All arrangements depend on placement availability and program approval.</p>
        </div>
    </div>
</section>

<section class="section section-blue">
    <div class="container internship-details-grid">
        <div>
            <span class="eyebrow light">Why choose Uganda?</span>
            <h2>A rich setting for learning and cultural exchange.</h2>
            <p class="internship-light-copy">Uganda offers diverse healthcare settings, community-based approaches, local traditions and warm community hospitality. During approved free time, participants may explore the country's landscapes, wildlife and cultural heritage.</p>
            <ul class="internship-learning-points">
                <li><i data-lucide="users-round" aria-hidden="true"></i><span><strong>Community perspectives</strong><small>Explore local approaches to health education, outreach and care.</small></span></li>
                <li><i data-lucide="messages-square" aria-hidden="true"></i><span><strong>Cross-cultural practice</strong><small>Build communication skills and a broader healthcare perspective.</small></span></li>
                <li><i data-lucide="handshake" aria-hidden="true"></i><span><strong>Learn with local teams</strong><small>Mentorship and activities depend on placement and supervision arrangements.</small></span></li>
                <li><i data-lucide="map" aria-hidden="true"></i><span><strong>Discover Uganda</strong><small>Explore local culture and heritage during approved free time.</small></span></li>
            </ul>
        </div>
        <div>
            <span class="eyebrow light">Support for international interns</span>
            <h2>Plan the practical details with Jayden.</h2>
            <p class="internship-light-copy">Depending on the agreed placement package, assistance may be available with placement coordination, orientation, mentorship arrangements, accommodation guidance, airport pickup coordination, local transportation guidance and cultural orientation.</p>
            <p class="internship-light-copy"><strong>Specific support and associated costs will be confirmed before placement.</strong></p>
            <figure class="internship-detail-photo internship-light-photo">
                <img src="assets/images/volunteer-team-03.webp?v=<?= e($assetVersion) ?>" alt="A diverse group of healthcare professionals wearing Jayden uniforms" loading="lazy" decoding="async">
                <figcaption>Compassionate support through teamwork</figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container internship-details-grid">
        <div>
            <span class="eyebrow">Application requirements</span>
            <h2>Prepare the essentials for your enquiry.</h2>
            <ul class="clean-list">
                <li>Updated CV or resume and academic background.</li>
                <li>University introduction or recommendation letter, where applicable.</li>
                <li>Preferred program, proposed dates and duration.</li>
                <li>A short statement explaining your learning objectives.</li>
                <li>Copy of passport, when requested through an agreed submission process.</li>
            </ul>
        </div>
        <aside class="internship-application-note">
            <h3>Start with an enquiry</h3>
            <p>Use the application form to tell us your preferred program and dates. Jayden will confirm eligibility, availability, placement arrangements, support and costs before a placement is agreed.</p>
            <p>Please contact Jayden to confirm a suitable submission method before sending passport or other identity documents.</p>
            <p class="internship-contact-meta">jaydencares.com<br>Phone / WhatsApp: <?= e(SITE_PHONE_DISPLAY) ?> | <?= e((string) constant('SITE_PHONE_SECONDARY_DISPLAY')) ?><br><?= e(SITE_ADDRESS) ?>, Uganda<br><?= e(SITE_POBOX) ?></p>
            <a class="btn" href="#internship-application">Continue to application</a>
        </aside>
    </div>
</section>

<section class="section section-soft" id="internship-application">
    <div class="container form-layout">
        <div>
            <span class="eyebrow">International internship application</span>
            <h2>Tell us about your plans.</h2>
            <p>Share your background, preferred program and learning objectives. The application is an enquiry only; placement, supervision, eligibility and costs must be confirmed by Jayden.</p>
            <div class="quote-panel volunteer-note"><p>Please do not include passport scans, medical records or other sensitive documents in this form. Jayden will advise on an appropriate submission method if documents are needed.</p></div>
        </div>
        <form class="site-form" method="post" action="forms/submit.php" novalidate>
            <input type="hidden" name="form_type" value="internship">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <div class="hp-field" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
            <div class="form-grid">
                <label>Full name*<input name="full_name" required maxlength="120" autocomplete="name"></label>
                <label>Email address*<input type="email" name="email" required maxlength="160" autocomplete="email"></label>
                <label>Phone / WhatsApp*<input type="tel" name="phone" required maxlength="50" autocomplete="tel"></label>
                <label>Country of residence*<input name="country" required maxlength="100" autocomplete="country-name"></label>
                <label>University or institution<input name="institution" maxlength="160" autocomplete="organization"></label>
                <label>Preferred program*<select name="program" required>
                    <option value="">Choose a program</option>
                    <option value="nursing-clinical-care">Nursing and Clinical Care</option>
                    <option value="community-health">Community Health</option>
                    <option value="maternal-child-health">Maternal and Child Healthcare</option>
                    <option value="elderly-homecare">Elderly Care and Homecare</option>
                    <option value="public-health">Public Health</option>
                    <option value="healthcare-administration">Healthcare Administration and Management</option>
                </select></label>
                <label>Preferred duration*<select name="duration" required>
                    <option value="">Choose a duration</option>
                    <option value="2-weeks">2 weeks</option>
                    <option value="4-weeks">4 weeks</option>
                    <option value="8-weeks">8 weeks</option>
                    <option value="12-weeks">12 weeks</option>
                    <option value="3-6-months">3–6 months</option>
                </select></label>
                <label>Preferred start date<input type="date" name="start_date"></label>
            </div>
            <label>Academic background or relevant experience<textarea name="experience" rows="4" maxlength="1800"></textarea></label>
            <label>What do you hope to learn?*<textarea name="message" rows="5" required maxlength="2000"></textarea></label>
            <label class="check"><input type="checkbox" name="consent" value="yes" required><span>I consent to Jayden using these details to review my internship application enquiry and contact me about it.</span></label>
            <button class="btn" type="submit">Submit Internship Application</button>
            <p class="form-note">Submitting this form does not confirm acceptance, placement, professional registration or authority to practise.</p>
        </form>
    </div>
</section>

<section class="section" id="placement-safeguarding">
    <div class="container">
        <div class="internship-safeguarding">
            <span class="eyebrow">Placement, supervision and safeguarding</span>
            <h2>Patient safety and professional boundaries come first.</h2>
            <p>All placements are subject to eligibility, host-site approval, supervision arrangements and applicable Ugandan requirements. Patient contact and clinical activities are permitted only within the intern's approved scope and under appropriate supervision. Internship participation does not itself confer professional registration or authority to practise independently.</p>
        </div>
    </div>
</section>

<section class="section final-cta">
    <div class="container final-cta-box">
        <div>
            <span class="eyebrow">Apply for an international internship in Uganda</span>
            <h2>Share your learning goals and proposed dates with Jayden.</h2>
        </div>
        <div class="hero-actions">
            <a class="btn" href="#internship-application">Apply for an internship</a>
            <a class="btn btn-outline" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=Hello%20Jayden%20Care%2C%20I%20would%20like%20to%20ask%20about%20international%20healthcare%20internships." target="_blank" rel="noopener">WhatsApp Jayden</a>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
