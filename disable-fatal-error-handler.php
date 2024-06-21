<?php
/*
Plugin Name: Disable Fatal Error Handler
Description: Your website will not send any email in case of a fatal errors.
Author: Jose Mortellaro
Author URI: https://josemortellaro.com/
Domain Path: /languages/
Version: 0.0.4
Text Domain: disable-fatal-error-handler
Domain Path: /languages/

*/
/*  This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
defined( 'ABSPATH' ) ||  exit; // Exit if accessed directly

//Actions triggered after plugin activation
function eos_dfeh_plugin_activation(){
	require untrailingslashit( dirname( __FILE__ ) ).'/dfeh-file.php';
  eos_dfeh_update_wp_config( "define( 'WP_DISABLE_FATAL_ERROR_HANDLER',true );" );
}
register_activation_hook( __FILE__, 'eos_dfeh_plugin_activation' );


//Actions triggered after plugin deaactivation
function eos_dfeh_plugin_deactivation(){
  require untrailingslashit( dirname( __FILE__ ) ).'/dfeh-file.php';
  eos_dfeh_update_wp_config( "" );
}
register_deactivation_hook( __FILE__, 'eos_dfeh_plugin_deactivation' );
