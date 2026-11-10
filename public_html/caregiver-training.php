<?php
$currentPage = 'training';
$pageTitle = 'Caregiver and Short Courses';
$pageDescription = 'Explore Jayden Care training in First Aid and CPR, professional caregiving, and child care and home management in Kampala and Wakiso.';
$courses = [
    'first-aid-cpr' => [
        'title' => 'First Aid and CPR',
        'icon' => 'heart-pulse',
        'description' => 'Build an understanding of basic first aid and CPR, how to recognize an emergency, and how to respond safely while seeking appropriate emergency help.',
    ],
    'caregiver-professional' => [
        'title' => 'Caregiver Course (Certified Caregiver Professionals)',
        'icon' => 'heart-handshake',
        'description' => 'Develop practical caregiving foundations, compassionate communication and ethical awareness for supporting people with day-to-day care needs. Certification and recognition details will be confirmed by Jayden Care before enrolment.',
    ],
    'child-care-home-management' => [
        'title' => 'Child Care and Home Management',
        'icon' => 'baby',
        'description' => 'Explore child wellbeing, safe and nurturing daily routines, and practical home-management skills that help create a supportive environment for children and families.',
    ],
    'homecare-foundations' => [
        'title' => 'Homecare Caregiving Foundations',
        'icon' => 'house',
        'description' => 'Learn person-centred foundations for supporting daily routines at home, including respectful communication, comfort, personal care and working collaboratively with families.',
    ],
    'elderly-care' => [
        'title' => 'Elderly Care and Daily Living Support',
        'icon' => 'heart',
        'description' => 'Explore dignity-focused support for older adults, including assistance with everyday routines, companionship, safe movement and maintaining independence where possible.',
    ],
    'bedside-support' => [
        'title' => 'Bedside and Hospital Support',
        'icon' => 'hospital',
        'description' => 'Understand how caregivers can provide comfort, practical non-clinical assistance and companionship at the bedside, while communicating concerns to the responsible clinical team.',
    ],
    'recovery-support' => [
        'title' => 'Post-Surgery and Recovery Support',
        'icon' => 'activity',
        'description' => "Learn supportive approaches to daily activities and safe movement after discharge, following the person's care instructions and promptly raising concerns with a qualified professional.",
    ],
    'physiotherapy-rehabilitation' => [
        'title' => 'Physiotherapy and Rehabilitation Training',
        'icon' => 'dumbbell',
        'description' => 'Explore foundational mobility and rehabilitation support under the guidance of qualified professionals. This course does not qualify participants to assess or practise physiotherapy without the required professional credentials.',
    ],
    'mother-newborn-support' => [
        'title' => 'Mother and Newborn Support',
        'icon' => 'baby',
        'description' => 'Build understanding of practical postnatal and newborn support, including comfort, everyday routines and helping families know when to seek qualified clinical advice.',
    ],
    'personal-care-mobility' => [
        'title' => 'Personal Care and Safe Mobility Assistance',
        'icon' => 'accessibility',
        'description' => 'Develop respectful approaches to hygiene, dressing and mobility assistance, with attention to privacy, consent, safe movement and fall prevention.',
    ],
];
$selectedCourse = (string) ($_GET['course'] ?? '');
if (!isset($courses[$selectedCourse])) {
    $selectedCourse = '';
}
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero"><div class="container narrow"><span class="eyebrow">Jayden Care Training</span><h1>Practical skills for care and everyday wellbeing.</h1><p>Explore short courses designed to build confidence, practical knowledge and a more compassionate approach to supporting people and families.</p></div></section>
<section class="section">
    <div class="container">
        <div class="section-heading compact"><span class="eyebrow">Training options</span><h2>Choose the course that fits your goals.</h2><p>Each course introduces practical knowledge for supporting people and families with care, respect and confidence.</p></div>
        <div class="service-overview-grid">
            <?php foreach ($courses as $courseValue => $course): ?>
            <article class="service-overview-card">
                <span class="icon-badge course-icon" aria-hidden="true"><i data-lucide="<?= e($course['icon']) ?>"></i></span>
                <div>
                    <h3><?= e($course['title']) ?></h3>
                    <p><?= e($course['description']) ?></p>
                    <a class="text-link" href="caregiver-training.php?course=<?= rawurlencode($courseValue) ?>#course-registration">Register for this course <span aria-hidden="true">→</span></a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <div class="center-actions"><a class="btn btn-outline" href="international-internship.php">Explore International Healthcare Internships</a></div>
    </div>
</section>
<section class="section section-soft" id="course-registration"><div class="container form-layout">
    <div>
        <span class="eyebrow">Care that feels human, professional and reassuring</span>
        <h2>Training grounded in compassionate support.</h2>
        <p>Caregiving skills may help learners explore opportunities in Uganda's healthcare and support sector, subject to role requirements, relevant qualifications and available positions.</p>
        <p>Jayden Care serves families in Kampala and Wakiso. Share your details and our team will follow up with available course information.</p>
        <div class="contact-box"><strong>Questions about training?</strong><a href="tel:<?= e(SITE_PHONE_E164) ?>"><?= e(SITE_PHONE_DISPLAY) ?></a><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></div>
    </div>
    <form class="site-form" method="post" action="forms/submit.php">
        <input type="hidden" name="form_type" value="course">
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <div class="hp-field" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
        <h2>Register your interest</h2>
        <p>Select a course and Jayden will follow up with available training information.</p>
        <div class="form-grid">
            <label>First name*<input name="first_name" required maxlength="120" autocomplete="given-name"></label>
            <label>Last name*<input name="last_name" required maxlength="120" autocomplete="family-name"></label>
            <label>Phone number*<input type="tel" name="phone" required maxlength="50" autocomplete="tel" placeholder="e.g. +256 7XX XXX XXX"></label>
            <label>Email address*<input type="email" name="email" required maxlength="160" autocomplete="email" placeholder="you@example.com"></label>
            <label>Course selection*
                <select name="course_interest" required>
                    <option value="">Choose a course</option>
                    <?php foreach ($courses as $courseValue => $course): ?>
                    <option value="<?= e($courseValue) ?>"<?= $selectedCourse === $courseValue ? ' selected' : '' ?>><?= e($course['title']) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <label>Additional information (optional)<textarea name="message" rows="5" maxlength="2000" placeholder="Share a question or relevant experience. Please do not include private medical information."></textarea></label>
        <label class="check"><input type="checkbox" name="consent" value="yes" required><span>I agree that Jayden Care may use these details to respond to my training enquiry. See the <a href="privacy.php">Privacy Notice</a>.</span></label>
        <button class="btn" type="submit">Register Interest</button>
        <p class="form-note">Submitting this form is an enquiry, not confirmation of a course place, certification or employment. Course dates, eligibility and any certification details will be confirmed by Jayden Care.</p>
    </form>
</div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>