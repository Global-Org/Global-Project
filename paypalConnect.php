<?php
 //start session in all pages
  if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
  //if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

	// sandbox or liv
	define('PPL_MODE', 'sandbox');

	if(PPL_MODE=='sandbox'){
		
		define('PPL_API_USER', 'mjunaidjunaid786_api1.gmail.com');
		define('PPL_API_PASSWORD', 'P3JL7DARFTCSYJV7');
		define('PPL_API_SIGNATURE', 'AXk2ddI5aaxDDi4zyd8-1y4hzkd7A7EoQufOL3lVWohWpGlnS4jaTpTN');
	}
	else{
		
		define('PPL_API_USER', 'mjunaidjunaid786_api1.gmail.com');
		define('PPL_API_PASSWORD', 'P3JL7DARFTCSYJV7');
		define('PPL_API_SIGNATURE', '1y4hzkd7A7EoQufOL3lVWohWpGlnS4jaTpTN');
	}
	$Dollar=$_SESSION['CurrencyCode'];
	define('PPL_LANG', 'EN');
	define('PPL_CURRENCY_CODE', $Dollar);
	define('PPL_LOGO_IMG', 'http://global.anitsolutions.com/images/bg/avision.png');
	
	define('PPL_RETURN_URL', 'http://global.anitsolutions.com/paymentConfirmation.php?id=Success');
	define('PPL_CANCEL_URL', 'http://global.anitsolutions.com/deposite.php?id=Cancel');


?>