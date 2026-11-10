<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$formType = field('form_type');
$allowed = ['contact', 'quote', 'volunteer', 'course', 'internship'];
if (!in_array($formType, $allowed, true)) {
    header('Location: ../thank-you.php?status=invalid');
    exit;
}

// Honeypot: humans should never fill this field.
if (field('website') !== '') {
    header('Location: ../thank-you.php?status=sent&type=' . urlencode($formType));
    exit;
}

if (!valid_csrf()) {
    header('Location: ../thank-you.php?status=expired&type=' . urlencode($formType));
    exit;
}

if (!rate_limit_ok()) {
    header('Location: ../thank-you.php?status=slow&type=' . urlencode($formType));
    exit;
}

$fullName = field('full_name');
$phone = field('phone');
$email = field('email');
$message = field('message');
$consent = field('consent');

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../thank-you.php?status=invalid_email&type=' . urlencode($formType));
    exit;
}

$replyTo = $email !== '' ? $email : null;
$ok = false;

if ($formType === 'contact') {
    $subject = field('subject');
    if ($fullName === '' || $subject === '' || $message === '' || $consent !== 'yes' || ($phone === '' && $email === '')) {
        header('Location: ../thank-you.php?status=missing&type=contact');
        exit;
    }
    $rows = [
        'Form' => 'Contact Us',
        'Full Name' => $fullName,
        'Phone' => $phone,
        'Email' => $email,
        'Subject' => $subject,
        'Message' => $message,
        'Consent' => 'Yes',
        'Submitted' => date('Y-m-d H:i:s T'),
    ];
    $ok = send_site_mail('[Jayden Website] Contact: ' . $subject . ' - ' . $fullName, $rows, $replyTo);
}

if ($formType === 'quote') {
    $location = field('location');
    $service = field('service');
    if ($fullName === '' || $phone === '' || $location === '' || $service === '' || $message === '' || $consent !== 'yes') {
        header('Location: ../thank-you.php?status=missing&type=quote');
        exit;
    }
    $rows = [
        'Form' => 'Request Care / Quotation',
        'Full Name' => $fullName,
        'Phone' => $phone,
        'Email' => $email,
        'Client Location' => $location,
        'Service Required' => $service,
        'Preferred Start Date' => field('start_date'),
        'Expected Duration' => field('duration'),
        'Care Schedule' => field('schedule'),
        'Care Location Type' => field('care_location'),
        'Preferred Contact Method' => field('contact_method'),
        'Support Needed' => $message,
        'Consent' => 'Yes',
        'Submitted' => date('Y-m-d H:i:s T'),
    ];
    $ok = send_site_mail('[Jayden Website] Care Request - ' . $service . ' - ' . $fullName, $rows, $replyTo);
}

if ($formType === 'volunteer') {
    $location = field('location');
    $interest = field('interest');
    if ($fullName === '' || $phone === '' || $email === '' || $location === '' || $interest === '' || $message === '' || $consent !== 'yes') {
        header('Location: ../thank-you.php?status=missing&type=volunteer');
        exit;
    }
    $rows = [
        'Form' => 'Volunteer Interest',
        'Full Name' => $fullName,
        'Phone' => $phone,
        'Email' => $email,
        'Location / District' => $location,
        'Area of Interest' => $interest,
        'Availability' => field('availability'),
        'Qualification / Experience' => field('experience'),
        'Why They Want to Volunteer' => $message,
        'Consent' => 'Yes',
        'Submitted' => date('Y-m-d H:i:s T'),
    ];
    $ok = send_site_mail('[Jayden Website] Volunteer Interest - ' . $interest . ' - ' . $fullName, $rows, $replyTo);
}

if ($formType === 'course') {
    $firstName = clean_text(field('first_name'), 120);
    $lastName = clean_text(field('last_name'), 120);
    $fullName = trim($firstName . ' ' . $lastName);
    $phone = clean_text(field('phone'), 50);
    $email = clean_text(field('email'), 160);
    $courseInterest = field('course_interest');
    $message = clean_text(field('message'), 2000);
    $consent = field('consent');

    if ($firstName === '' || $lastName === '' || $phone === '' || $email === '' || $consent !== 'yes') {
        header('Location: ../thank-you.php?status=missing&type=course');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../thank-you.php?status=invalid_email&type=course');
        exit;
    }

    $courseInterests = [
        'first-aid-cpr',
        'caregiver-professional',
        'child-care-home-management',
        'homecare-foundations',
        'elderly-care',
        'bedside-support',
        'recovery-support',
        'physiotherapy-rehabilitation',
        'mother-newborn-support',
        'personal-care-mobility',
    ];
    if (!in_array($courseInterest, $courseInterests, true)) {
        header('Location: ../thank-you.php?status=invalid&type=course');
        exit;
    }

    $interestLabels = [
        'first-aid-cpr' => 'First Aid and CPR',
        'caregiver-professional' => 'Caregiver Course (Certified Caregiver Professionals)',
        'child-care-home-management' => 'Child Care and Home Management',
        'homecare-foundations' => 'Homecare Caregiving Foundations',
        'elderly-care' => 'Elderly Care and Daily Living Support',
        'bedside-support' => 'Bedside and Hospital Support',
        'recovery-support' => 'Post-Surgery and Recovery Support',
        'physiotherapy-rehabilitation' => 'Physiotherapy and Rehabilitation Training',
        'mother-newborn-support' => 'Mother and Newborn Support',
        'personal-care-mobility' => 'Personal Care and Safe Mobility Assistance',
    ];
    $courseLabel = $interestLabels[$courseInterest];
    $rows = [
        'Form' => 'Training Course Registration',
        'First Name' => $firstName,
        'Last Name' => $lastName,
        'Phone' => $phone,
        'Email' => $email,
        'Course Selected' => $courseLabel,
        'Additional Information' => $message,
        'Consent' => 'Yes',
        'Submitted' => date('Y-m-d H:i:s T'),
    ];
    $adminSent = send_site_mail('[Jayden Website] Training Registration - ' . $courseLabel . ' - ' . $fullName, $rows, $email);

    $confirmationHtml = '<div style="font-family:Arial,sans-serif;color:#1f2d3d">'
        . '<h2>Thank you for contacting Jayden Care</h2>'
        . '<p>Hello ' . e($firstName) . ',</p>'
        . '<p>We have received your interest in ' . e($courseLabel) . '. Our team will review your enquiry and contact you with further information.</p>'
        . '<p>This message confirms receipt of your enquiry only; it does not confirm a course place, qualification or employment.</p>'
        . '<p>Jayden Care<br>Care that feels human, professional and reassuring</p>'
        . '</div>';
    $confirmationBody = rtrim(chunk_split(base64_encode($confirmationHtml), 76, "\r\n"));
    $applicantSent = mail($email, 'Jayden training course enquiry received', $confirmationBody, mail_headers());
    $ok = $adminSent && $applicantSent;
}

if ($formType === 'internship') {
    $country = clean_text(field('country'), 100);
    $institution = clean_text(field('institution'), 160);
    $program = field('program');
    $duration = field('duration');
    $startDate = field('start_date');
    $experience = clean_text(field('experience'), 1800);
    $message = clean_text(field('message'), 2000);

    if ($fullName === '' || $phone === '' || $email === '' || $country === '' || $program === '' || $duration === '' || $message === '' || $consent !== 'yes') {
        header('Location: ../thank-you.php?status=missing&type=internship');
        exit;
    }

    $internshipPrograms = [
        'nursing-clinical-care' => 'Nursing and Clinical Care',
        'community-health' => 'Community Health',
        'maternal-child-health' => 'Maternal and Child Healthcare',
        'elderly-homecare' => 'Elderly Care and Homecare',
        'public-health' => 'Public Health',
        'healthcare-administration' => 'Healthcare Administration and Management',
    ];
    $internshipDurations = [
        '2-weeks' => '2 weeks',
        '4-weeks' => '4 weeks',
        '8-weeks' => '8 weeks',
        '12-weeks' => '12 weeks',
        '3-6-months' => '3–6 months',
    ];
    if (!isset($internshipPrograms[$program], $internshipDurations[$duration])) {
        header('Location: ../thank-you.php?status=invalid&type=internship');
        exit;
    }

    $rows = [
        'Form' => 'International Internship Application',
        'Full Name' => $fullName,
        'Email' => $email,
        'Phone / WhatsApp' => $phone,
        'Country of Residence' => $country,
        'University / Institution' => $institution,
        'Preferred Program' => $internshipPrograms[$program],
        'Preferred Duration' => $internshipDurations[$duration],
        'Preferred Start Date' => $startDate,
        'Academic Background / Experience' => $experience,
        'Learning Objectives' => $message,
        'Consent' => 'Yes',
        'Submitted' => date('Y-m-d H:i:s T'),
    ];
    $adminSent = send_site_mail('[Jayden Website] Internship Application - ' . $internshipPrograms[$program] . ' - ' . $fullName, $rows, $email);

    $confirmationHtml = '<div style="font-family:Arial,sans-serif;color:#1f2d3d">'
        . '<h2>Thank you for your internship application enquiry</h2>'
        . '<p>Hello ' . e($fullName) . ',</p>'
        . '<p>Jayden Care has received your enquiry for the ' . e($internshipPrograms[$program]) . ' program. Our team will review your details and contact you about eligibility and availability.</p>'
        . '<p>This acknowledgement does not confirm acceptance, placement, professional registration or authority to practise. Any activities require appropriate approval and supervision.</p>'
        . '<p>Jayden Care<br>Care that feels human, professional and reassuring</p>'
        . '</div>';
    $confirmationBody = rtrim(chunk_split(base64_encode($confirmationHtml), 76, "\r\n"));
    $applicantSent = mail($email, 'Jayden international internship enquiry received', $confirmationBody, mail_headers());
    $ok = $adminSent && $applicantSent;
}

header('Location: ../thank-you.php?status=' . ($ok ? 'sent' : 'mail_error') . '&type=' . urlencode($formType));
exit;
