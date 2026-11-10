<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
$currentPage = $currentPage ?? '';
$pageTitle = $pageTitle ?? 'Professional Care, Right Where You Need It.';
$pageDescription = $pageDescription ?? 'Compassionate nursing, bedside and homecare support in Kampala, Wakiso and surrounding areas.';
$assetVersion = (string) constant('ASSET_VERSION');
$siteUrl = 'https://' . SITE_DOMAIN;
$scriptName = basename((string) ($_SERVER['SCRIPT_NAME'] ?? 'index.php'));
$canonicalPaths = [
    'index.php' => '/',
    'about.php' => '/about.php',
    'services.php' => '/services.php',
    'care-pricing.php' => '/care-pricing.php',
    'caregiver-training.php' => '/caregiver-training.php',
    'international-internship.php' => '/international-internship.php',
    'payments.php' => '/payments.php',
    'volunteer.php' => '/volunteer.php',
    'faq.php' => '/faq.php',
    'healthy-tips.php' => '/healthy-tips.php',
    'hydration-nutrition-tips.php' => '/hydration-nutrition-tips.php',
    'movement-fall-prevention-tips.php' => '/movement-fall-prevention-tips.php',
    'recovery-at-home-tips.php' => '/recovery-at-home-tips.php',
    'mother-newborn-tips.php' => '/mother-newborn-tips.php',
    'contact.php' => '/contact.php',
    'privacy.php' => '/privacy.php',
];
$canonicalUrl = $pageCanonical ?? $siteUrl . ($canonicalPaths[$scriptName] ?? '/');
$pageRobots = $pageRobots ?? 'index,follow,max-image-preview:large';
$socialImage = $siteUrl . '/assets/images/hero-homecare.webp';
$structuredData = [
    '@context' => 'https://schema.org',
    '@type' => 'MedicalBusiness',
    '@id' => $siteUrl . '/#organization',
    'name' => SITE_NAME,
    'url' => $siteUrl . '/',
    'logo' => $siteUrl . '/assets/images/jayden-logo.webp',
    'image' => $socialImage,
    'description' => 'Professional nursing, bedside and homecare support for families in Kampala and Wakiso.',
    'telephone' => [SITE_PHONE_E164, (string) constant('SITE_PHONE_SECONDARY_E164')],
    'email' => SITE_EMAIL,
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => SITE_ADDRESS,
        'addressCountry' => 'UG',
    ],
    'areaServed' => ['Kampala', 'Wakiso'],
    'sameAs' => [SITE_FACEBOOK, SITE_INSTAGRAM, SITE_TIKTOK],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> | Jayden Care</title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="robots" content="<?= e($pageRobots) ?>">
    <meta name="theme-color" content="#0D47A1">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Jayden Care">
    <meta property="og:locale" content="en_UG">
    <meta property="og:title" content="<?= e($pageTitle) ?> | Jayden Care">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <meta property="og:image" content="<?= e($socialImage) ?>">
    <meta property="og:image:alt" content="Jayden caregiver providing professional homecare support">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?> | Jayden Care">
    <meta name="twitter:description" content="<?= e($pageDescription) ?>">
    <meta name="twitter:image" content="<?= e($socialImage) ?>">
    <script type="application/ld+json"><?= json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    <link rel="icon" type="image/png" href="assets/images/favicon.png?v=<?= e($assetVersion) ?>">
    <link rel="preconnect" href="https://unpkg.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/site.css?v=<?= e($assetVersion) ?>">
    <script defer src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>
    <script defer src="assets/js/site.js?v=<?= e($assetVersion) ?>"></script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<div class="topbar">
    <div class="container topbar-inner">
        <span><i data-lucide="map-pin" aria-hidden="true"></i><?= e(SITE_ADDRESS) ?></span>
        <div class="topbar-actions">
            <a href="tel:<?= e(SITE_PHONE_E164) ?>"><i data-lucide="phone" aria-hidden="true">Tel</i><?= e(SITE_PHONE_DISPLAY) ?></a>
            <a href="tel:<?= e((string) constant('SITE_PHONE_SECONDARY_E164')) ?>"><i data-lucide="phone" aria-hidden="true">Tel</i><?= e((string) constant('SITE_PHONE_SECONDARY_DISPLAY')) ?></a>
            <a href="mailto:<?= e(SITE_EMAIL) ?>"><i data-lucide="mail" aria-hidden="true">Mail</i><?= e(SITE_EMAIL) ?></a>
        </div>
    </div>
</div>
<header class="site-header" id="siteHeader">
    <div class="container nav-wrap">
        <a class="brand" href="index.php" aria-label="Jayden Care home">
            <img src="assets/images/jayden-logo.webp?v=<?= e($assetVersion) ?>" alt="Jayden Nursing and Bedside Homecare Services Limited" decoding="async">
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="mainNav" aria-label="Open menu">
            <span></span><span></span><span></span>
        </button>
        <nav class="main-nav" id="mainNav" aria-label="Main navigation">
            <div class="nav-menu-links">
                <a href="index.php"<?= is_active('home', $currentPage) ?>>Home</a>
                <a href="about.php"<?= is_active('about', $currentPage) ?>>About</a>
                <div class="nav-dropdown"><div class="nav-parent"><a href="services.php"<?= is_active('services', $currentPage) ?>>Services</a><button type="button" class="submenu-toggle" aria-expanded="false" aria-label="Open Services submenu"><span aria-hidden="true">⌄</span></button></div><div class="submenu mega-menu"><a href="services.php#home-nursing"><img src="assets/images/home-nursing.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Homecare Nursing</strong><small>Professional home care</small></a><a href="services.php#bedside-care"><img src="assets/images/bedside-care.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Bedside Care</strong><small>Hospital support</small></a><a href="services.php#elderly-care"><img src="assets/images/elderly-care.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Elderly Care</strong><small>Daily living support</small></a><a href="services.php#rehabilitation"><img src="assets/images/rehabilitation.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Rehabilitation</strong><small>Recovery support</small></a><a href="services.php#assessment"><img src="assets/images/assessment.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Care Assessment</strong><small>Personalised guidance</small></a><a class="mega-all-link" href="services.php">View All Services <span aria-hidden="true">→</span></a></div></div>
                <a href="caregiver-training.php"<?= is_active('training', $currentPage) ?>>Short Courses</a>
                <div class="nav-dropdown"><div class="nav-parent"><a href="international-internship.php"<?= is_active('internship', $currentPage) ?>>Internships</a><button type="button" class="submenu-toggle" aria-expanded="false" aria-label="Open Internships submenu"><span aria-hidden="true">⌄</span></button></div><div class="submenu"><a href="international-internship.php">Program Overview</a><a href="international-internship.php#internship-application">Apply Now</a></div></div>
                <a href="volunteer.php"<?= is_active('volunteer', $currentPage) ?>>Volunteer</a>
                <a href="faq.php"<?= is_active('faq', $currentPage) ?>>FAQs</a>
                <div class="nav-dropdown"><div class="nav-parent"><a href="healthy-tips.php"<?= is_active('tips', $currentPage) ?>>Healthy Tips</a><button type="button" class="submenu-toggle" aria-expanded="false" aria-label="Open Healthy Tips submenu"><span aria-hidden="true">⌄</span></button></div><div class="submenu mega-menu tips-mega-menu"><a href="hydration-nutrition-tips.php"><img src="assets/images/personal-care.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Hydration &amp; Nutrition</strong><small>Daily wellbeing</small></a><a href="movement-fall-prevention-tips.php"><img src="assets/images/rehabilitation.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Movement &amp; Falls</strong><small>Safer routines</small></a><a href="recovery-at-home-tips.php"><img src="assets/images/recovery-care.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Recovery at Home</strong><small>Care guidance</small></a><a href="mother-newborn-tips.php"><img src="assets/images/mother-newborn.webp?v=<?= e($assetVersion) ?>" alt=""><strong>Mother &amp; Newborn</strong><small>Family wellbeing</small></a><a class="mega-all-link" href="healthy-tips.php">View All Healthy Tips <span aria-hidden="true">→</span></a></div></div>
                <a href="contact.php"<?= is_active('contact', $currentPage) ?>>Contact</a>
            </div>
            <div class="nav-actions">
                <a class="btn btn-small" href="care-pricing.php#request-quote">Ask for a Quote</a>
                <div class="header-socials" aria-label="Jayden social media">
                    <a href="<?= e(SITE_FACEBOOK) ?>" target="_blank" rel="noopener" aria-label="Jayden Care on Facebook" title="Facebook"><i data-lucide="facebook" aria-hidden="true">F</i></a>
                    <a href="<?= e(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener" aria-label="Jayden Care on Instagram" title="Instagram"><i data-lucide="instagram" aria-hidden="true">I</i></a>
                    <a href="<?= e(SITE_TIKTOK) ?>" target="_blank" rel="noopener" aria-label="Jayden Care on TikTok" title="TikTok"><i data-lucide="music-2" aria-hidden="true">T</i></a>
                </div>
            </div>
        </nav>
    </div>
</header>
<main id="main">
