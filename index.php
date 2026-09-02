<?php
$currentPage = 'home';
$pageTitle = 'Professional Care, Right Where You Need It.';
$pageDescription = 'Compassionate nursing, bedside and homecare support for patients, older adults, recovering clients, new mothers and families in Kampala and surrounding areas.';
require __DIR__ . '/includes/header.php';
$featuredServices = [
    ['title' => 'Homecare Nursing', 'link' => 'services.php#home-nursing', 'image' => 'assets/images/home-nursing.webp', 'text' => 'Professional nursing support in the comfort of home, guided by assessed needs and agreed care plans.'],
    ['title' => 'Bedside & Hospital Care', 'link' => 'services.php#bedside-care', 'image' => 'assets/images/bedside-care.webp', 'text' => 'Reliable bedside support for admitted patients, helping families stay reassured and supported.'],
    ['title' => 'Elderly Care', 'link' => 'services.php#elderly-care', 'image' => 'assets/images/elderly-care.webp', 'text' => 'Respectful assistance that helps older adults remain safe, comfortable and as independent as possible.'],
    ['title' => 'Post-Surgery Care', 'link' => 'services.php#recovery-care', 'image' => 'assets/images/recovery-care.webp', 'text' => 'Structured recovery support after discharge, including monitoring, wound care and daily-living assistance.'],
    ['title' => 'Mother & Newborn Support', 'link' => 'services.php#mother-newborn', 'image' => 'assets/images/mother-newborn.webp', 'text' => 'Post-delivery support for mothers and babies with practical care, observation and reassurance.'],
    ['title' => 'Physiotherapy & Rehabilitation', 'link' => 'services.php#rehabilitation', 'image' => 'assets/images/rehabilitation.webp', 'text' => 'Mobility and rehabilitation support for clients recovering from surgery, injury or reduced function.'],
];
$team = [
    ['role' => 'Homecare Nurse', 'image' => 'assets/images/team-female-1.webp', 'text' => 'Supports in-home nursing routines, monitoring and patient comfort.'],
    ['role' => 'Caregiver', 'image' => 'assets/images/team-male-1.webp', 'text' => 'Assists with bedside support, personal care and day-to-day wellbeing.'],
    ['role' => 'Care Coordinator', 'image' => 'assets/images/team-female-2.webp', 'text' => 'Helps organise care plans, follow-up and family communication.'],
    ['role' => 'Rehabilitation Support', 'image' => 'assets/images/team-male-2.webp', 'text' => 'Supports mobility, safe movement and recovery-focused routines.'],
];
?>
<section class="home-hero" aria-label="Jayden Care services">
    <div class="hero-slider" data-slider>
        <article class="hero-slide is-active" data-slide aria-hidden="false">
            <img src="assets/images/hero-homecare.webp?v=<?= e($assetVersion) ?>" alt="Jayden caregiver checking on an elderly client at home" fetchpriority="high" decoding="async">
            <div class="hero-shade"></div>
            <div class="container hero-slide-content">
                <span class="eyebrow light">Compassionate. Professional. Reliable.</span>
                <h1>Professional care, right where you need it.</h1>
                <p>Trusted nursing, bedside and homecare support for families across Kampala and Wakiso.</p>
                <div class="hero-actions">
                    <a class="btn btn-accent" href="care-pricing.php#request-quote">Request Care</a>
                    <a class="btn btn-glass" href="tel:<?= e(SITE_PHONE_E164) ?>">Call Jayden</a>
                </div>
            </div>
        </article>
        <article class="hero-slide" data-slide aria-hidden="true">
            <img src="assets/images/bedside-care.webp?v=<?= e($assetVersion) ?>" alt="Jayden caregiver offering bedside support to a patient" loading="lazy" decoding="async">
            <div class="hero-shade"></div>
            <div class="container hero-slide-content">
                <span class="eyebrow light">Bedside &amp; Hospital Care</span>
                <h2>Reassuring support when family matters most.</h2>
                <p>Attentive bedside assistance and clear communication for patients and their loved ones.</p>
                <div class="hero-actions"><a class="btn btn-accent" href="services.php#bedside-care">Explore Bedside Care</a></div>
            </div>
        </article>
        <article class="hero-slide" data-slide aria-hidden="true">
            <img src="assets/images/mother-newborn.webp?v=<?= e($assetVersion) ?>" alt="Jayden nurse supporting a mother and newborn baby at home" loading="lazy" decoding="async">
            <div class="hero-shade"></div>
            <div class="container hero-slide-content">
                <span class="eyebrow light">Mother &amp; Newborn Support</span>
                <h2>Gentle care for life’s newest chapter.</h2>
                <p>Practical post-delivery support that helps mothers recover and families settle in with confidence.</p>
                <div class="hero-actions"><a class="btn btn-accent" href="services.php#mother-newborn">Discover Family Support</a></div>
            </div>
        </article>
        <div class="container slider-controls">
            <div class="slider-dots" aria-label="Choose a slide">
                <button class="is-active" type="button" data-slide-to="0" aria-label="Show homecare slide" aria-current="true"></button>
                <button type="button" data-slide-to="1" aria-label="Show bedside care slide" aria-current="false"></button>
                <button type="button" data-slide-to="2" aria-label="Show mother and newborn slide" aria-current="false"></button>
            </div>
            <div class="slider-arrows">
                <button type="button" data-slide-prev aria-label="Previous slide">&#8592;</button>
                <button type="button" data-slide-next aria-label="Next slide">&#8594;</button>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading compact">
            <span class="eyebrow">Welcome to Jayden</span>
            <h2>Care that feels human, professional and reassuring.</h2>
            <p>Every care arrangement begins with listening. We take time to understand the patient, the family and the practical support that will make each day safer and more comfortable.</p>
        </div>
        <div class="feature-media-grid">
            <article class="feature-media-card">
                <img src="assets/images/home-nursing.webp?v=<?= e($assetVersion) ?>" alt="Jayden nurse checking a client's vitals at home" loading="lazy" decoding="async">
                <div>
                    <span class="eyebrow">Home Visits</span>
                    <h3>Care that comes to the patient.</h3>
                    <p>Jayden helps bridge the gap between hospital care and daily recovery by bringing compassionate support closer to the patient.</p>
                </div>
            </article>
            <article class="feature-media-card">
                <img src="assets/images/personal-care.webp?v=<?= e($assetVersion) ?>" alt="Jayden caregiver supporting an elderly man during a walk" loading="lazy" decoding="async">
                <div>
                    <span class="eyebrow">Daily Support</span>
                    <h3>Comfort, companionship and dignity.</h3>
                    <p>From personal care to mobility support, we work to make each day safer and more manageable.</p>
                </div>
            </article>
            <article class="feature-media-card">
                <img src="assets/images/mother-newborn.webp?v=<?= e($assetVersion) ?>" alt="Jayden nurse supporting a mother and newborn baby" loading="lazy" decoding="async">
                <div>
                    <span class="eyebrow">Family Support</span>
                    <h3>Support for mothers and babies.</h3>
                    <p>Post-delivery support can ease recovery, improve confidence and help families adjust well at home.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow">Our Services</span>
            <h2>Support built around the person, not a one-size-fits-all routine.</h2>
            <p>Jayden bridges the gap between formal healthcare facilities and day-to-day recovery by bringing appropriate care, observation and personal support closer to the patient.</p>
        </div>
        <div class="service-media-grid">
            <?php foreach ($featuredServices as $service): ?>
                <article class="service-media-card">
                    <img src="<?= e($service['image']) ?>?v=<?= e($assetVersion) ?>" alt="<?= e($service['title']) ?> at Jayden Care" loading="lazy" decoding="async">
                    <div class="service-media-body">
                        <h3><?= e($service['title']) ?></h3>
                        <p><?= e($service['text']) ?></p>
                        <a href="<?= e($service['link']) ?>">Explore service</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="center-actions"><a class="btn btn-outline" href="services.php">View All Services</a></div>
    </div>
</section>

<section class="section section-soft">
    <div class="container image-text-split reverse-mobile">
        <div class="image-text-photo">
            <img src="assets/images/medical-escort.webp?v=<?= e($assetVersion) ?>" alt="Jayden caregiver supporting an elderly client during a clinic visit" loading="lazy" decoding="async">
        </div>
        <div>
            <span class="eyebrow">How Jayden Care Works</span>
            <h2>A clear path from first contact to ongoing care.</h2>
            <div class="steps-grid">
                <div class="step"><span>01</span><h3>Contact Jayden</h3><p>Tell us what kind of support is required.</p></div>
                <div class="step"><span>02</span><h3>Needs Assessment</h3><p>We establish condition, location, schedule and level of assistance required.</p></div>
                <div class="step"><span>03</span><h3>Care Plan &amp; Quote</h3><p>We recommend a suitable arrangement and confirm the fee.</p></div>
                <div class="step"><span>04</span><h3>Caregiver Assignment</h3><p>A suitable available caregiver or professional is assigned.</p></div>
                <div class="step"><span>05</span><h3>Care Begins</h3><p>Care starts at the agreed home, hospital or suitable location.</p></div>
                <div class="step"><span>06</span><h3>Review &amp; Follow-up</h3><p>The care arrangement can be reviewed as needs change.</p></div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container pricing-preview">
        <div>
            <span class="eyebrow">Care &amp; Pricing</span>
            <h2>Simple starting packages, personalised after assessment.</h2>
            <p>Starting rates help families plan, while the final quotation reflects the client’s actual care needs, location, hours, staffing level, procedures, supplies and transport.</p>
            <a class="btn" href="care-pricing.php#request-quote">Get a Care Assessment</a>
        </div>
        <div class="price-stack">
            <div><span>Daily Care</span><strong>From UGX 50,000/day</strong></div>
            <div><span>Weekly Care</span><strong>From UGX 350,000/week</strong></div>
            <div><span>Monthly Care</span><strong>From UGX 1,500,000/month</strong></div>
            <div><span>Specialised Services</span><strong>Individual quotation</strong></div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading compact">
            <span class="eyebrow">Our Team</span>
            <h2>A caring team of women and men ready to support your family.</h2>
            <p>Jayden care may involve nurses, caregivers, bedside attendants, rehabilitation support and care coordinators depending on the needs assessed.</p>
        </div>
        <div class="team-grid">
            <?php foreach ($team as $member): ?>
                <article class="team-card">
                    <img src="<?= e($member['image']) ?>?v=<?= e($assetVersion) ?>" alt="<?= e($member['role']) ?> at Jayden Care" loading="lazy" decoding="async">
                    <div class="team-card-body">
                        <h3><?= e($member['role']) ?></h3>
                        <p><?= e($member['text']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-blue">
    <div class="container split-cta">
        <div><span class="eyebrow light">Why Families Choose Jayden</span><h2>Dignity, reliability and clear communication at every stage.</h2></div>
        <div class="check-list light-list">
            <span>Individual care arrangements</span>
            <span>Home and hospital bedside options</span>
            <span>Family involvement where authorised</span>
            <span>Clear assessment before longer-term care</span>
            <span>Kampala &amp; Wakiso positioning, wider coverage subject to availability</span>
        </div>
    </div>
</section>

<section class="section final-cta">
    <div class="container final-cta-box">
        <div><span class="eyebrow">Need support for a loved one?</span><h2>Tell us what care is needed and Jayden will guide the next step.</h2></div>
        <div class="hero-actions"><a class="btn" href="care-pricing.php#request-quote">Request a Quote</a><a class="btn btn-outline" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener">WhatsApp Jayden</a></div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
