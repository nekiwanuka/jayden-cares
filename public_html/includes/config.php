<?php

declare(strict_types=1);

date_default_timezone_set('Africa/Kampala');

if (PHP_SAPI !== 'cli-server') {
	ini_set('display_errors', '0');
	ini_set('log_errors', '1');
}

$appEnvironment = [];
$environmentFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';
if (is_readable($environmentFile)) {
    $environmentLines = file($environmentFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($environmentLines === false) {
        throw new RuntimeException('Unable to read application environment configuration.');
    }
    foreach ($environmentLines as $environmentLine) {
        $environmentLine = preg_replace('/^\xEF\xBB\xBF/', '', $environmentLine) ?? $environmentLine;
        $environmentLine = trim($environmentLine);
        if ($environmentLine === '' || str_starts_with($environmentLine, '#') || !str_contains($environmentLine, '=')) {
            continue;
        }
        $environmentLine = preg_replace('/^export\s+/', '', $environmentLine) ?? $environmentLine;
        [$environmentKey, $environmentValue] = explode('=', $environmentLine, 2);
        $environmentKey = trim($environmentKey);
        $environmentValue = trim($environmentValue);
        if ($environmentKey === '' || preg_match('/^[A-Z][A-Z0-9_]*$/', $environmentKey) !== 1) {
            continue;
        }
        $environmentValue = preg_replace('/\s+#.*$/', '', $environmentValue);
        if (strlen($environmentValue) >= 2 && (($environmentValue[0] === '"' && str_ends_with($environmentValue, '"')) || ($environmentValue[0] === "'" && str_ends_with($environmentValue, "'")))) {
            $environmentValue = substr($environmentValue, 1, -1);
        }
        $appEnvironment[$environmentKey] = $environmentValue;
    }
}

function app_environment(string $key, string $default = ''): string
{
    $value = getenv($key);
    if ($value === false || trim((string) $value) === '') {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? null;
    }
    if (is_string($value) || is_numeric($value) || is_bool($value)) {
        $trimmed = trim((string) $value);
        if ($trimmed !== '') {
            return $trimmed;
        }
    }
    global $appEnvironment;
    $envValue = $appEnvironment[$key] ?? null;
    if (is_string($envValue) || is_numeric($envValue) || is_bool($envValue)) {
        $trimmed = trim((string) $envValue);
        if ($trimmed !== '') {
            return $trimmed;
        }
    }
    return $default;
}

define('SITE_NAME', 'Jayden Nursing and Bedside Homecare Services Limited');
define('SITE_DOMAIN', 'jaydencares.com');
define('ASSET_VERSION', '20261110.1');
define('SITE_PHONE_DISPLAY', '+256 768 719 022');
define('SITE_PHONE_E164', '+256768719022');
define('SITE_PHONE_SECONDARY_DISPLAY', '+256 708 177 763');
define('SITE_PHONE_SECONDARY_E164', '+256708177763');
define('SITE_WHATSAPP', '256768719022');
define('SITE_EMAIL', 'info@jaydencares.com');
define('SITE_ADDRESS', 'Kitala - Entebbe Road');
define('SITE_POBOX', 'P. O. Box 703708, Entebbe');

define('SITE_TIKTOK', 'https://vm.tiktok.com/ZS9BPQv7oy6Ww-tZEHX/');
define('SITE_FACEBOOK', 'https://www.facebook.com/profile.php?id=61594201134846');
define('SITE_INSTAGRAM', 'https://www.instagram.com/jaydencareservices/');
define('SITE_INSTAGRAM_HANDLE', '@jaydencareservices');

define('PESAPAL_CONSUMER_KEY', app_environment('PESAPAL_CONSUMER_KEY'));
define('PESAPAL_CONSUMER_SECRET', app_environment('PESAPAL_CONSUMER_SECRET'));
define('PESAPAL_ENVIRONMENT', strtolower(app_environment('PESAPAL_ENVIRONMENT', 'sandbox')));

// Forms are delivered directly to this mailbox. You may override these values
// from cPanel Environment Variables if your hosting setup supports them.
define('MAIL_TO', app_environment('JAYDEN_MAIL_TO', SITE_EMAIL) ?: SITE_EMAIL);
define('MAIL_FROM', app_environment('JAYDEN_MAIL_FROM', SITE_EMAIL) ?: SITE_EMAIL);
define('MAIL_FROM_NAME', 'Jayden Website');
