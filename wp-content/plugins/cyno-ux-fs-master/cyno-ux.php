<?php
/*
	Plugin Name: Cyno UX
	Plugin URI: https://cyno.com.vn
	Description: This plugin will create new elements for Flatsome > v3.18 
	Version: 0.0.1
	Author: Tigon
	Author URI: https://profiles.wordpress.org/xuhuon/
	Text Domain: cyno-ux
	Domain Path: /languages
*/

if (!defined('ABSPATH')) { exit; }

define('CYNO_PATH', plugin_dir_path(__FILE__));
define('CYNO_URL', plugins_url('/', __FILE__));

//Warning
add_action( 'admin_notices', 'uxf_warning' );
function uxf_warning () {
	if ( wp_get_theme()->template !== 'flatsome' ) {
		echo '<div class="error"><p>' . __( 'Warning: Please install the "Flatsome" parent theme or deactive cyno-ux', 'cyno-ux' ).'</p></div>';
	}
}

//Load translations
function cyno_ux_plugins_loaded() {
	load_plugin_textdomain('cyno-ux', false, dirname(plugin_basename( __FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'cyno_ux_plugins_loaded');

if ( wp_get_theme()->template == 'flatsome' ) {
  require_once CYNO_PATH . 'inc/init.php';
}
