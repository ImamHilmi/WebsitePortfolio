<?php
define( 'PENCI_ELEMENTOR_PATH', get_template_directory()  . '/inc/elementor/'  );
define( 'PENCI_ELEMENTOR_URL', get_template_directory_uri()  . '/inc/elementor/'  );

if ( ! class_exists( 'Penci_Soledad_Elementor_Extension' ) ):
	final class Penci_Soledad_Elementor_Extension {
		private static $_instance = null;
		
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
		
		public function __construct() {
			require PENCI_ELEMENTOR_PATH . 'loader.php';
		}
	}

	Penci_Soledad_Elementor_Extension::instance();
endif;