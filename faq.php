<?php
$currentPage = 'faq';
$pageTitle = 'Frequently Asked Questions';
$pageDescription = 'Answers to common questions about Jayden care arrangements, pricing, service areas, staffing and emergencies.';
require __DIR__ . '/includes/header.php';
$faqs = [
['How do I request care?','Call, email, WhatsApp or use the Request Care form. Jayden will first establish the kind of support required, the location, schedule and level of assistance before proposing a care arrangement.'],
['Does Jayden provide both home and hospital bedside care?','Yes. The company profile covers care delivered in the client’s home as well as bedside support for patients admitted in hospital or another care facility.'],
['How much does care cost?','Starting rates are UGX 50,000 per day, UGX 350,000 per week and UGX 1,500,000 per month. Final fees are confirmed after assessment and may vary according to the client’s needs, location, hours or shifts, staffing level, procedures, supplies and transport.'],
['Can I request care for an elderly relative while I live elsewhere?','Yes. Jayden’s intended clients include families living away from elderly or unwell relatives who need dependable local care support. Family updates and care coordination can be arranged where authorised.'],
['Does Jayden provide physiotherapy?','Home-based physiotherapy and rehabilitation support may be arranged with appropriately qualified professionals, subject to availability and the client’s assessed needs.'],
['Can Jayden provide temporary healthcare personnel to an organisation or facility?','Jayden may support healthcare facilities, organisations and families with temporary or assigned healthcare personnel according to the required role, scope and availability.'],
['What areas does Jayden serve?','Jayden is positioned from Seguku off Entebbe Road for Kampala and Wakiso, with wider coverage subject to availability. Contact us with the exact location so the team can confirm coverage.'],
['Is Jayden an emergency medical service?','No. Jayden homecare is not a substitute for emergency medical services. Medical emergencies should be taken to an appropriate health facility without delay.'],
['Do I need to send medical records through the website?','No. The public forms are designed for initial contact and general care requirements. Avoid sending highly sensitive medical information through the website. Jayden can advise how any necessary clinical information should be handled after contact.'],
['Can care arrangements change as the patient improves or needs more help?','Yes. The care arrangement can be reviewed as the patient’s needs, recovery or family circumstances change.']
];
?>
<section class="page-hero"><div class="container narrow"><span class="eyebrow">FAQs</span><h1>Common questions about arranging care.</h1><p>If your question is not covered here, contact Jayden directly and we will guide you.</p></div></section>
<section class="section"><div class="container faq-list"><?php foreach($faqs as [$q,$a]): ?><article class="faq-item"><button type="button" aria-expanded="false"><span><?= e($q) ?></span><b>+</b></button><div class="faq-answer"><p><?= e($a) ?></p></div></article><?php endforeach; ?></div></section>
<section class="section section-soft"><div class="container final-cta-box"><div><span class="eyebrow">Still need help?</span><h2>Speak with Jayden about the exact care situation.</h2></div><div class="hero-actions"><a class="btn" href="contact.php">Contact Us</a><a class="btn btn-outline" href="care-pricing.php#request-quote">Request Care</a></div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
