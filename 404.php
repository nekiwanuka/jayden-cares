<?php
http_response_code(404);
$currentPage = '';
$pageTitle = 'Page Not Found';
$pageDescription = 'The requested Jayden Care page could not be found.';
$pageRobots = 'noindex,follow';
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div class="container narrow status-box"><img src="assets/images/jayden-mark.webp?v=<?= e($assetVersion) ?>" alt="" class="status-mark"><span class="eyebrow">404</span><h1>That page could not be found.</h1><p>The link may be outdated or the page may have moved.</p><div class="hero-actions"><a class="btn" href="index.php">Return Home</a><a class="btn btn-outline" href="contact.php">Contact Jayden</a></div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
