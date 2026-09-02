<?php

declare(strict_types=1);

date_default_timezone_set('Africa/Kampala');

if (PHP_SAPI !== 'cli-server') {
	ini_set('display_errors', '0');
	ini_set('log_errors', '1');
}

define('SITE_NAME', 'Jayden Nursing and Bedside Homecare Services Limited');
define('SITE_DOMAIN', 'jaydencares.com');
define('ASSET_VERSION', '20260902.4');
define('SITE_PHONE_DISPLAY', '+256 768 719 022');
define('SITE_PHONE_E164', '+256768719022');
define('SITE_PHONE_SECONDARY_DISPLAY', '+256 708 177 763');
define('SITE_PHONE_SECONDARY_E164', '+256708177763');
define('SITE_WHATSAPP', '256768719022');
define('SITE_EMAIL', 'info@jaydencares.com');
define('SITE_ADDRESS', 'Seguku, Naziba Zone 2, off Entebbe Road');
define('SITE_POBOX', 'P. O. Box 703708, Entebbe');

define('SITE_TIKTOK', 'https://vm.tiktok.com/ZS9BPQv7oy6Ww-tZEHX/');
define('SITE_FACEBOOK', 'https://www.facebook.com/share/1DZJiUF6rw/');
define('SITE_INSTAGRAM', 'https://www.instagram.com/jaydenhomecare/');
define('SITE_INSTAGRAM_HANDLE', '@jaydenhomecare');

// Forms are delivered directly to this mailbox. You may override these values
// from cPanel Environment Variables if your hosting setup supports them.
define('MAIL_TO', getenv('JAYDEN_MAIL_TO') ?: SITE_EMAIL);
define('MAIL_FROM', getenv('JAYDEN_MAIL_FROM') ?: SITE_EMAIL);
define('MAIL_FROM_NAME', 'Jayden Website');
