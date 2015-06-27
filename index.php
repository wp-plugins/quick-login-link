<?php
/*
   Plugin Name: Quick Login link
   Description: Simply login not only through yoursite.com/wp-admin , but also: yoursite.com/login  (P.S.  OTHER MUST-HAVE PLUGINS FOR EVERYONE: http://bitly.com/MWPLUGINS  )
   contributors: selnomeria
   Version: 1.21
   LICENCE: Free
*/
if ( ! defined( 'ABSPATH' ) ) exit; //Exit if accessed directly

$h= home_url('','relative');
if (in_array(strtolower($_SERVER['REQUEST_URI']), array( $h.'/admin', $h.'/login',  $h.'/l' ))){ echo '<script type="text/javascript">window.location = "'.admin_url('').'";</script>'; exit; }

?>
