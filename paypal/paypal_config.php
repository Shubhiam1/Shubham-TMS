<?php
define('PAYPAL_ID', 'sb-tfmb527924400@business.example.com');
define('PAYPAL_SANDBOX', true);

define('PAYPAL_RETURN_URL', 'http://localhost/tour/paypal/paypal_success.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/tour/paypal/paypal_cancel.php'); 
define('PAYPAL_CURRENCY', 'USD');

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'new');

define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");
?>
