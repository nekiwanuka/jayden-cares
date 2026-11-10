JAYDEN CARE WEBSITE - CPANEL DEPLOYMENT
======================================

Domain: jaydencares.com
Database: NONE required
Technology: PHP + HTML + CSS + JavaScript
Forms: Delivered by PHP mail() to info@jaydencares.com

QUICK DEPLOYMENT CHECKLIST
1. Create a full backup of the current public_html before replacing files.
2. Upload the website files so index.php and .htaccess are directly in public_html.
3. Set the domain to PHP 8.1 or newer in cPanel MultiPHP Manager.
4. Create info@jaydencares.com and verify SPF/DKIM in Email Deliverability.
5. Issue or install the SSL certificate before testing the HTTPS redirect.
6. Configure PesaPal credentials in a private .env file as described below.
7. Open the site in a private browser window and test every form and payment flow.
8. Remove any temporary ZIP archive from public_html after extraction.

DEPLOY
1. In cPanel > File Manager, open the document root for jaydencares.com (normally public_html).
2. Upload the complete website archive and extract it directly in that document root.
3. Confirm index.php and .htaccess are directly inside the document root, not inside another folder.
4. Ensure PHP 8.1 or newer is selected for the domain.
	The included .user.ini disables display_errors, enables server-side logging and limits uploads.
5. Create or confirm the mailbox info@jaydencares.com in cPanel > Email Accounts.
6. In cPanel > Email Deliverability, ensure SPF and DKIM show as valid.
7. Confirm SSL is active. The included .htaccess then redirects all requests to HTTPS.
8. Configure PesaPal in a private .env file (see PesaPal Payments below).
9. Open https://jaydencares.com and test all three forms and the payment flow on desktop and mobile.

CPANEL FILE PERMISSIONS
- Folders: 755
- PHP, CSS, JavaScript and image files: 644
- includes/config.php: 644 is sufficient because .htaccess blocks web access to it
- Do not set 777 permissions and do not place backup files, ZIP archives or credentials in public_html.

MAIL TROUBLESHOOTING
- The From address defaults to info@jaydencares.com and should use a mailbox on the same domain.
- Replies are sent to the visitor's validated email address when one is provided.
- Check cPanel Track Delivery and the hosting error log if a form redirects to the mail error page.
- If PHP mail() is disabled or unreliable, use an authenticated SMTP provider and replace send_site_mail() with PHPMailer.

PACKAGE CONTENTS
- Public PHP pages
- assets, forms and includes folders
- .htaccess, robots.txt and sitemap.xml
- README.txt and .env.example
- No database, build process, vendor folder or local development environment
- The private .env file and PesaPal credentials are never included in the ZIP.

PESAPAL PAYMENTS
- The Payments page accepts an invoice reference and the exact quoted amount in UGX.
- Customers continue to PesaPal's hosted checkout to select an available payment method.
- Airtel Merchant Pay and DFCU Bank transfer details remain available as direct alternatives.
- Copy .env.example to .env in the website document root and set:
  PESAPAL_CONSUMER_KEY=your_consumer_key
  PESAPAL_CONSUMER_SECRET=your_consumer_secret
  PESAPAL_ENVIRONMENT=sandbox
- Use sandbox credentials and environment first. Change PESAPAL_ENVIRONMENT to live only after a successful sandbox test and when live credentials are ready.
- Keep .env private. The supplied .htaccess blocks direct web access to it. Do not email it, commit it, or upload it inside the deployment ZIP.
- The PHP cURL extension and a valid HTTPS certificate are required. The site automatically registers its HTTPS IPN endpoint with PesaPal during the first checkout and verifies payment status with PesaPal before showing a completed result.
- Test with an issued invoice before accepting real payments. Confirm completed, pending and cancelled/failed outcomes in the PesaPal dashboard.
- The Payments page sends invoice and contact details to PesaPal for checkout; the privacy notice explains what is shared.

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
