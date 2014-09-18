<?php
  /*
   Plugin Name: Quick Login link
   Plugin URI:  http://none.none
   Description: Simply login not only through yoursite.com/wp-admin , but also yoursite.com/login (or whatever you want, set in plugin). 
   Author: selnomeria
   Version: 1.1
   LICENCE: Free
    */

$execut = new QuickLoginLinks;	
if (!defined('ABSPATH')) {exit;}

class QuickLoginLinks
{
	public function __construct()
	{
		add_action('init', $this->start_test_detector() );
	}
	public function start_test_detector()
	{
		if (substr($_SERVER['REQUEST_URI'],-6)=='/login')
		{
			echo '<script type="text/javascript">window.location = "'.home_url().'/wp-login.php?redirect_to='.urlencode(home_url()).'%2Fwp-admin%2Fedit.php%3Fpost_type%3Dpage&reauth=1";</script>';
			exit;
		}
	}
}
?>
