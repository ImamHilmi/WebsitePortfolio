<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_Social_Counter_Vimeo_API' ) ):
	class Penci_Social_Counter_Vimeo_API {
		public static function get_count( $data, $cache_period ) {

			$page_id     = preg_replace( '/\s+/', '', $data['name'] );
			$data['url'] = "http://vimeo.com/$page_id";
			$data['icon'] = penci_icon_by_ver('fab fa-vimeo-v');

			$cache_key = 'penci_counter__vimeo' . $page_id;
			$vimeo_count = get_transient( $cache_key );
			if ( ! $vimeo_count ) {
				$penci_data = self::get_json( "http://vimeo.com/api/v2/channel/$page_id/info.json" );
				$count      = isset( $penci_data['total_subscribers'] ) ? intval( $penci_data['total_subscribers'] ) : 0;

				set_transient( $cache_key, $count, $cache_period );
			} else {
				$count = $vimeo_count;
			}

			if ( $count ) {
				$data['count'] = $count;
			}

			return $data;
		}

		public static function get_url_wordpress( $url ) {

			$response = wp_remote_get( $url, array(
				'timeout'    => 10,
				'sslverify'  => false,
				'user-agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0'
			) );

			if ( is_wp_error( $response ) ) {
				return false;
			}

			$penci_request_result = wp_remote_retrieve_body( $response );

			if ( empty( $penci_request_result ) ) {
				return false;
			}

			return $penci_request_result;
		}

		private static function get_url( $url ) {
			return self::get_url_wordpress( $url );
		}

		private static function get_json( $url ) {
			return json_decode( self::get_url( $url ), true );
		}
	}

endif;