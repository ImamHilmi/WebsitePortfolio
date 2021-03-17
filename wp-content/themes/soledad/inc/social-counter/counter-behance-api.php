<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_Social_Counter_Behance_API' ) ):
	class Penci_Social_Counter_Behance_API {
		public static function get_count( $data, $cache_period ) {

			$user_id     = preg_replace( '/\s+/', '', $data['name'] );
			$data['url'] = "https://www.behance.net/$user_id";
			$data['icon'] = penci_icon_by_ver('fab fa-behance');

			$count = 0;

			if ( $count ) {
				$data['count'] = $count;
			}

			return $data;
		}
	}

endif;