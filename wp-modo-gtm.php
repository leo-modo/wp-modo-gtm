<?php
/*
Plugin Name:    Modo GTM
Description:    Ce module permet d'ajouter automatiquement le code de tracking GTM dans votre site
Author:         Léo Fontin
Author URI:     https://agence-modo.fr
License:        GPL2
License URI:    https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:    wp-modo-gtm
Domain Path:    /languages
*/

declare( strict_types=1 );

namespace WpModoGtm;

use WpModoGtm\Admin\Settings;
use WpModoGtm\Public\Code;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'vendor/autoload.php';

define( 'WP_MODO_GTM_ROOT', dirname( __FILE__ ) . '/' );
define( 'WP_MODO_GTM_ADMIN_TEMPLATE_PATH', WP_MODO_GTM_ROOT . 'templates/' );


class WP_Modo_GTM {

	public function __construct() {

		// Admin //
		Settings::get_instance();

		// Public //
		Code::get_instance();
	}

}

new WP_Modo_GTM();