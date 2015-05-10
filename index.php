<?php
/*
   Plugin Name: Quick Login link
   Description: Simply login not only through yoursite.com/wp-admin , but also: yoursite.com/login  (P.S.  OTHER MUST-HAVE PLUGINS FOR EVERYONE: http://bitly.com/MWPLUGINS  )
   contributors: selnomeria
   Version: 1.1
   LICENCE: Free
*/
if ( ! defined( 'ABSPATH' ) ) exit; //Exit if accessed directly


$execut = new QuickLoginLinks;	
class QuickLoginLinks
{
	public $YOUR_CUSTOM_URL1= '/login';
	public $YOUR_CUSTOM_URL2= '/admin';
	
	public function __construct()
	{
		add_action('init', $this->start_test_detector() );
	}
	public function start_test_detector()
	{
		if (
			 (strpos($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], substr(home_url().$this->YOUR_CUSTOM_URL1,8)) !== false)
			 || 
			 (strpos($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], substr(home_url().$this->YOUR_CUSTOM_URL2,8)) !== false)
			)
		{
			echo '<script type="text/javascript">window.location = "'.home_url().'/wp-login.php?redirect_to='.urlencode(home_url()).'%2Fwp-admin%2Fedit.php%3Fpost_type%3Dpage&reauth=1";</script>';
			exit;
		}
	}
}
?>
