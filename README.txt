JAYDEN CARE WEBSITE - CPANEL DEPLOYMENT
======================================

Domain: jaydencares.com
Database: NONE required
Technology: PHP + HTML + CSS + JavaScript
Forms: Delivered by PHP mail() to info@jaydencares.com

DEPLOY
1. In cPanel > File Manager, open the document root for jaydencares.com (normally public_html).
2. Upload jayden-care-cpanel-deployment.zip and extract it directly in that document root.
3. Confirm index.php and .htaccess are directly inside the document root, not inside another folder.
4. Ensure PHP 8.1 or newer is selected for the domain.
5. Create or confirm the mailbox info@jaydencares.com in cPanel > Email Accounts.
6. In cPanel > Email Deliverability, ensure SPF and DKIM show as valid.
7. Confirm SSL is active. The included .htaccess then redirects all requests to HTTPS.
8. Open https://jaydencares.com and test all three forms on desktop and mobile.

PACKAGE CONTENTS
- Public PHP pages
- assets, forms and includes folders
- .htaccess, robots.txt and sitemap.xml
- README.txt
- No database, build process, vendor folder or local development environment

FORM DELIVERY
- Contact Us -> info@jaydencares.com
- Request Care / Quotation -> info@jaydencares.com
- Volunteer Interest -> info@jaydencares.com

The website uses PHP mail() deliberately to keep the project dependency-free and lightweight.
If your hosting provider disables PHP mail(), replace send_site_mail() in includes/functions.php with SMTP/PHPMailer.
No visitor submissions are stored in a database.

SECURITY / SPAM
- CSRF token using PHP session
- Honeypot spam field
- Simple per-session submission rate limit
- Server-side validation and output escaping
- No file uploads
- Sensitive-record warning on the care request form

IMPORTANT
Jayden homecare is not presented as an emergency medical service. The website includes a visible emergency disclaimer.

AFTER DEPLOYMENT
- Confirm the logo, hero slider and all service images load.
- Submit Contact, Request Care and Volunteer forms and confirm email delivery.
- Check the browser address uses HTTPS and no certificate warning appears.
- Delete the uploaded ZIP from public_html after successful extraction and testing.
