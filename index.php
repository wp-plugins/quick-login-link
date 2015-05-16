<?php
/*
   Plugin Name: Quick Login link
   Description: Simply login not only through yoursite.com/wp-admin , but also: yoursite.com/login  (P.S.  OTHER MUST-HAVE PLUGINS FOR EVERYONE: http://bitly.com/MWPLUGINS  )
   contributors: selnomeria
   Version: 1.2
   LICENCE: Free
*/
if ( ! defined( 'ABSPATH' ) ) exit; //Exit if accessed directly

$execut = new QuickLoginLinks;
class QuickLoginLinks{
	public $YOUR_CUSTOM_URL_ARRAY= array('/login','/admin','/l');
	
	public function __construct()			{	add_action('init', $this->start_test_detector() , 1); 	}
	public function start_test_detector()	{ 	$homePath= home_url('','relative');
		foreach ($this->YOUR_CUSTOM_URL_ARRAY as $each){
			if (strtolower($_SERVER['REQUEST_URI']) == $homePath.$each){ echo '<script type="text/javascript">window.location = "'.admin_url('').'";</script>'; exit; }
		}
	}
}
?>
