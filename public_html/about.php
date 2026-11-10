<?php
$currentPage = 'about';
$pageTitle = 'About Jayden Care';
$pageDescription = 'Learn about Jayden Nursing and Bedside Homecare Services Limited, our mission, vision, values and care philosophy.';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container narrow">
        <span class="eyebrow">About Jayden</span>
        <h1>Compassionate care with professional support.</h1>
        <p>Jayden Nursing and Bedside Homecare Services Limited provides dependable, respectful and person-centred nursing and bedside support to individuals and families.</p>
    </div>
</section>
<section class="section">
    <div class="container image-text-split">
        <div>
            <h2>Bridging the gap between healthcare facilities and everyday recovery.</h2>
            <p>Our model is designed for people who need professional support at home, in hospital, during recovery, in older age, after childbirth or while living with long-term illness.</p>
            <p>We believe quality care should not end when a patient leaves a clinic or hospital. Jayden brings appropriate care, observation, personal assistance and family support closer to the patient.</p>
        </div>
        <div class="image-text-photo">
            <img src="assets/images/home-nursing.webp?v=<?= e($assetVersion) ?>" alt="Jayden nurse supporting an older client at home" loading="lazy" decoding="async">
        </div>
    </div>
</section>
<section class="section section-soft">
    <div class="container card-grid three-grid">
        <article class="info-card"><span class="eyebrow">Vision</span><h3>Trusted and accessible care in Uganda.</h3><p>To become a trusted and accessible provider of compassionate home and bedside care in Uganda, known for dignity, professionalism, reliability and personalised service.</p></article>
        <article class="info-card"><span class="eyebrow">Mission</span><h3>Improve comfort, safety and quality of life.</h3><p>To improve the comfort, safety and quality of life of patients and families through responsive, client-centred nursing, bedside and supportive care at home and in hospital.</p></article>
        <article class="info-card"><span class="eyebrow">Care Philosophy</span><h3>Individual, respectful and family-aware.</h3><p>Care is organised around assessed needs, personal dignity, appropriate professional boundaries and clear communication with authorised family members.</p></article>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="section-heading compact"><span class="eyebrow">Core Values</span><h2>What guides every interaction.</h2></div>
        <div class="values-grid">
            <div><strong>Compassion</strong><p>Care with empathy and humanity.</p></div>
            <div><strong>Dignity</strong><p>Respect privacy, independence, beliefs and choices.</p></div>
            <div><strong>Professionalism</strong><p>Maintain appropriate standards, conduct and accountability.</p></div>
            <div><strong>Reliability</strong><p>Provide dependable care and clear communication.</p></div>
            <div><strong>Safety</strong><p>Prioritise wellbeing, infection prevention and timely escalation.</p></div>
            <div><strong>Family Partnership</strong><p>Involve relatives and responsible caregivers where appropriate.</p></div>
            <div><strong>Confidentiality</strong><p>Treat client and medical information with discretion.</p></div>
            <div><strong>Respect</strong><p>Honour each person’s condition, context and humanity.</p></div>
        </div>
    </div>
</section>
<section class="section section-soft">
    <div class="container two-col">
        <div>
            <span class="eyebrow">Who We Serve</span>
            <h2>Support for changing care needs.</h2>
            <ul class="clean-list">
                <li>Older adults needing assistance to remain safe and comfortable.</li>
                <li>Patients recovering from surgery, illness, injury or hospital admission.</li>
                <li>People living with chronic or serious illnesses who need continuing support.</li>
                <li>Patients requiring a bedside attendant or nurse while admitted in hospital.</li>
                <li>New mothers and newborns requiring post-delivery support.</li>
                <li>People with reduced mobility needing rehabilitation or daily-living assistance.</li>
                <li>Families living away from elderly or unwell relatives who need dependable local support.</li>
            </ul>
        </div>
        <div>
            <span class="eyebrow">Quality &amp; Safety</span>
            <h2>Clear professional boundaries matter.</h2>
            <ul class="clean-list">
                <li>Care is provided within the worker’s training, professional scope and agreed care plan.</li>
                <li>Prescribed treatments and medicines follow valid clinical instructions.</li>
                <li>Significant changes in a client’s condition should be documented and communicated appropriately.</li>
                <li>Client information is shared only with authorised persons or where legitimately required.</li>
                <li>Families are informed when hospital or emergency assessment is necessary.</li>
            </ul>
        </div>
    </div>
</section>
<section class="section">
    <div class="container team-banner">
        <div class="team-banner-copy">
            <span class="eyebrow">A Balanced Care Team</span>
            <h2>Women and men serving with compassion.</h2>
            <p>Jayden’s service model allows for different kinds of support including nursing care, caregiving, bedside support, rehabilitation routines and family communication depending on what is needed.</p>
        </div>
        <div class="team-banner-photos">
            <img src="assets/images/team-female-1.webp?v=<?= e($assetVersion) ?>" alt="Jayden female nurse" loading="lazy" decoding="async">
            <img src="assets/images/team-male-1.webp?v=<?= e($assetVersion) ?>" alt="Jayden male caregiver" loading="lazy" decoding="async">
            <img src="assets/images/team-female-2.webp?v=<?= e($assetVersion) ?>" alt="Jayden care coordinator" loading="lazy" decoding="async">
            <img src="assets/images/team-male-2.webp?v=<?= e($assetVersion) ?>" alt="Jayden rehabilitation support professional" loading="lazy" decoding="async">
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
