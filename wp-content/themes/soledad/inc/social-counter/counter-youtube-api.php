<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_Social_Counter_Youtube_API' ) ):
	class Penci_Social_Counter_Youtube_API {
		public static function get_count( $data, $cache_period ) {
			if( empty( $data['name'] ) ) {
				return $data;
			}

			$user_id     = preg_replace( '/\s+/', '', $data['name'] );
			$data['url'] = ( strpos( 'channel/', $user_id ) >= 0 ) ? "http://www.youtube.com/$user_id" : "http://www.youtube.com/user/$user_id";
			$data['icon'] = penci_icon_by_ver('fab fa-youtube');

			$cache_key = 'penci_counter_youtube' . $user_id;
			$youtube_count = get_transient( $cache_key );
			$count         = 0;

			if ( ! $youtube_count ) {

				$url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&key=AIzaSyBqKo542QYt8lixFlaHSl5FIrc_crd2p-I";

				$search_id = str_replace( "channel/", "", $user_id );

				if ( strpos( $user_id, "channel/" ) === 0 ) {
					$url .= "&id=$search_id";
				} else {
					$url .= "&forUsername=$search_id";
				}

				$penci_data = self::get_json( $url );

				$subscriberCount = isset( $penci_data['items'][0]['statistics']['subscriberCount'] ) ? $penci_data['items'][0]['statistics']['subscriberCount'] : '';

				if ( ! empty( $subscriberCount ) ) {
					$count = (int) $subscriberCount;
				}

				set_transient( $cache_key, $count, $cache_period );

			} else {
				$count = $youtube_count;
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