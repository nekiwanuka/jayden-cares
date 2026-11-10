<?php
$currentPage = 'tips';
$pageTitle = 'Healthy Tips';
$pageDescription = 'Practical healthy living and homecare tips from Jayden Care for families, older adults and people recovering at home.';
require __DIR__ . '/includes/header.php';
$topics = [
    ['hydration-nutrition-tips.php', 'Hydration & Nutrition', 'Simple ways to support fluids, balanced meals and steady energy at home.', 'assets/images/personal-care.webp'],
    ['movement-fall-prevention-tips.php', 'Movement & Fall Prevention', 'Small changes that can make everyday movement safer and more confident.', 'assets/images/rehabilitation.webp'],
    ['recovery-at-home-tips.php', 'Recovery at Home', 'Helpful routines for rest, observation, medication support and follow-up.', 'assets/images/recovery-care.webp'],
    ['mother-newborn-tips.php', 'Mother & Newborn Wellbeing', 'Gentle post-delivery reminders for rest, feeding support and early concerns.', 'assets/images/mother-newborn.webp'],
];
?>
<section class="page-hero"><div class="container narrow"><span class="eyebrow">Healthy Tips</span><h1>Small steps can support better days at home.</h1><p>Explore practical reminders for everyday wellbeing, recovery and family care. These tips support good routines but do not replace advice from a qualified health professional.</p></div></section>
<section class="section"><div class="container"><div class="section-heading"><span class="eyebrow">Care knowledge</span><h2>Helpful guidance for families and caregivers.</h2><p>Choose a topic below. When someone is unwell, follow their clinician's advice and seek help promptly when symptoms are serious or changing.</p></div><div class="tips-grid">
<?php foreach ($topics as [$link, $title, $intro, $image]): ?><a class="tip-card" href="<?= e($link) ?>"><img src="<?= e($image) ?>?v=<?= e($assetVersion) ?>" alt="<?= e($title) ?>" loading="lazy" decoding="async"><div><span class="eyebrow">Jayden guide</span><h3><?= e($title) ?></h3><p><?= e($intro) ?></p><span class="text-link">Read the tips</span></div></a><?php endforeach; ?>
</div></div></section>
<section class="section section-soft"><div class="container split-cta"><div><span class="eyebrow">Need personal support?</span><h2>Healthy routines are easier with the right help.</h2></div><div><p>Jayden can discuss homecare, bedside support, recovery assistance or a care assessment based on your situation.</p><a class="btn" href="care-pricing.php#request-quote">Request a Quotation</a></div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
