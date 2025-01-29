<?php
/*
Plugin Name:    Modo GTM Injector
Description:    Easily integrate Google Tag Manager into your WordPress site! With this module, simply enter your GTM ID, and the tracking code is automatically installed. Save time and ensure reliable tracking without any technical hassle.
Author:         Agence Modo
Author URI:     https://agence-modo.fr
License:        GPL2
License URI:    https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:    wp-modo-gtm
Domain Path:    /languages
*/

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WP_MODO_GTM_ROOT', dirname( __FILE__ ) . '/' );
define( 'WP_MODO_GTM_ADMIN_TEMPLATE_PATH', WP_MODO_GTM_ROOT . 'templates/' );

define( 'WP_MODO_GTM_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_MODO_GTM_ASSETS_URL', WP_MODO_GTM_URL . 'assets/' );

include WP_MODO_GTM_ROOT . 'app/admin/Settings.php';
include WP_MODO_GTM_ROOT . 'app/public/Code.php';

Settings::get_instance();

Code::get_instance();
