<?php

declare( strict_types=1 );

namespace WpModoGtm\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 */
class Settings {

	/**
	 * @var
	 */
	public static $instance;

	/**
	 * @return Settings
	 */
	public static function get_instance(): Settings {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 *
	 */
	public function __construct() {

		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
		add_action( 'admin_init', [ $this, 'settings_init' ] );
	}

	/**
	 * @return void
	 */
	public function admin_menu(): void {

		add_options_page(
			'Google Tag Manager',
			'Google Tag Manager',
			'manage_options',
			'wp-modo-gtm',
			[ $this, 'admin_settings_page' ]
		);

	}

	/**
	 * @return void
	 */
	public function admin_settings_page(): void {
		include WP_MODO_GTM_ADMIN_TEMPLATE_PATH . 'settings-page.php';
	}

	/**
	 * @return void
	 */
	public function settings_init(): void {

		register_setting(
			'wp_modo_gtm_group',
			'wp_modo_gtm'
		);

		add_settings_section(
			'wp_modo_gtm_settings_section',
			'Section de réglages personnalisés',
			array( $this, 'settings_section_callback' ),
			'wp-modo-gtm-settings'
		);

		add_settings_field(
			'id',
			'Identifiant tracking GTM',
			array( $this, 'field_callback' ),
			'wp-modo-gtm-settings',
			'wp_modo_gtm_settings_section'
		);

	}

	/**
	 * @return void
	 */
	public function settings_section_callback(): void {
		echo "Renseignez l'identifiant GTM afin d'ajouter le code de tracking sur le site";
	}

	/**
	 * @return void
	 */
	public function field_callback(): void {
		$option       = get_option( 'wp_modo_gtm' );
		$option_value = ( ! empty( $option['id'] ) ) ? $option['id'] : '';
		echo '<input type="text" name="wp_modo_gtm[id]" value="' . esc_attr( $option_value ) . '" />';
	}
}