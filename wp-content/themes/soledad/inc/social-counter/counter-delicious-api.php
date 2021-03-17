<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_Social_Counter_Delicious_API' ) ):
	class Penci_Social_Counter_Delicious_API {
		public static function get_count( $data, $cache_period ) {

			$page_id     = preg_replace( '/\s+/', '', $data['name'] );
			$data['url'] = "https://del.icio.us/$page_id";
			$data['icon'] =  penci_icon_by_ver('fab fa-delicious');;

			$count = 0;

			if ( $count ) {
				$data['count'] = $count;
			}

			return $data;
		}
	}

endif;