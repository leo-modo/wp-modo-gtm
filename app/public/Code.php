<?php

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 */
class Code {

	/**
	 * @var
	 */
	public static $instance;

	/**
	 * @return Code
	 */
	public static function get_instance(): Code {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 *
	 */
	public function __construct() {
		add_action( 'wp_head', [ $this, 'add_head_code' ] );
		add_action( 'wp_body_open', [ $this, 'add_body_code' ] );
	}

	/**
	 * @return void
	 */
	public function add_head_code(): void {

		$gtm_id = $this->get_gtm_id();
		$file   = WP_MODO_GTM_ADMIN_TEMPLATE_PATH . 'public/code-head.php';
		if ( file_exists( $file ) ) {
			include $file;
		}
	}

	/**
	 * @return void
	 */
	public function add_body_code(): void {

		$gtm_id = $this->get_gtm_id();
		$file   = WP_MODO_GTM_ADMIN_TEMPLATE_PATH . 'public/code-body.php';
		if ( file_exists( $file ) ) {
			include $file;
		}
	}

	/**
	 * @return string
	 */
	private function get_gtm_id(): string {

		$option = get_option( 'wp_modo_gtm' );
		if ( ! empty( $option ) && ! empty( $option['id'] ) ) {
			return str_replace( ' ', '', trim( $option['id'] ) );
		}

		return '';
	}
}