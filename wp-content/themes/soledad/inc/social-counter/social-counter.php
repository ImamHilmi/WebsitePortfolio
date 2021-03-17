<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! function_exists( 'penci_get_social_counter_option' ) ):
	function penci_get_social_counter_option( $key = null, $default = false ) {
		static $data;

		$data = empty( $data ) ? get_option( 'penci_social_counter_settings' ) : $data;

		if ( isset( $data[ $key ] ) ) {
			return $data[ $key ];
		}

		if ( $default ) {
			return $default;
		}

		return '';
	}
endif;

if ( ! class_exists( 'PENCI_FW_Social_Counter' ) ):
	class PENCI_FW_Social_Counter {

		private static $_instance = null;

		private static $caching_time = 10800;  // cache expire time - default 10800 = 3 hours

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		public function __construct() {
			$this->load_files();
		}

		public function load_files() {
			require_once dirname( __FILE__ ) . '/admin-options.php';
		}

		public static function get_social_counter( $social, $get_number = true ) {

			$cache_period = self::$caching_time;

			$penci_social_counter_settings = get_option( 'penci_social_counter_settings' );

			$counter_data = shortcode_atts( array(
				$social . '_name'       => '',
				$social . '_text_below' => '',
				$social . '_text_btn'   => '',
				$social . '_default'    => ''
			), $penci_social_counter_settings );

			$face_name = $counter_data[ $social . '_name' ];

			$data_default = array(
				'name'       => $face_name,
				'title'      => $face_name ? $face_name : esc_html__( 'Facebook', 'soledad' ),
				'text_below' => $counter_data[ $social . '_text_below' ],
				'text_btn'   => $counter_data[ $social . '_text_btn' ],
				'count'      => $counter_data[ $social . '_default' ],
				'icon'       => '',
				'url'        => '',
				'error'      => '',
			);

			$data = array();

			$social_file = dirname( __FILE__ ) . '/counter-' . $social . '-api.php';
			$class_name  = 'Penci_Social_Counter_' . ucwords( $social ) . '_API';


			if ( file_exists( $social_file ) ) {

				require_once $social_file;
			}

			if ( class_exists( $class_name ) ) {
				$data = $class_name::get_count( $data_default, $cache_period );
			}

			return $data;
		}

		public static function format_followers( $followers ) {
			if ( ! $followers ) {
				return $followers;
			}

			if ( $followers >= 1000000 ) {
				$followers = number_format_i18n( $followers / 1000000, 2 ) . 'm';
			} elseif ( $followers >= 10000 ) {
				$followers = number_format_i18n( $followers / 1000, 1 ) . 'k';
			} else {
				$followers = number_format_i18n( $followers );
			}

			return $followers;
		}
	}

	new PENCI_FW_Social_Counter;
endif;