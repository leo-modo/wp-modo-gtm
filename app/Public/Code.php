<?php

declare( strict_types=1 );

namespace WpModoGtm\Public;

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

		echo "\n" . "<!-- Google Tag Manager - added by WP Modo GTM plugin -->" . "\n";

		if ( ! empty( $gtm_id ) ) {

			echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
               new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','" . $gtm_id . "');</script>";

		} else {
			echo "<!-- Attention : ID GTM introuvable ou incorrecte -->";
		}

		echo "\n" . "<!-- End Google Tag Manager - added by WP Modo GTM plugin -->" . "\n\n";
	}

	/**
	 * @return void
	 */
	public function add_body_code(): void {

		$gtm_id = $this->get_gtm_id();

		if ( ! empty( $gtm_id ) ) {
			echo "\n" . "<!-- Google Tag Manager (noscript)  - added by WP Modo GTM plugin -->" . "\n";
			echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . $gtm_id . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
			echo "\n" . "<!-- End Google Tag Manager (noscript)  - added by WP Modo GTM plugin -->" . "\n\n";
		}
	}

	/**
	 * @return string
	 */
	private function get_gtm_id(): string {

		$option = get_option( 'wp_modo_gtm' );
		if ( ! empty( $option ) && ! empty( $option['id'] ) ) {
			return $option['id'];
		}

		return '';

	}
}