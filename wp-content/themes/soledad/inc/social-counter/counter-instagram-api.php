<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_Social_Counter_Instagram_API' ) ):
	class Penci_Social_Counter_Instagram_API {
		public static function get_count( $data, $cache_period ) {

			$user_id     = preg_replace( '/\s+/', '', $data['name'] );
			$data['url'] = "http://instagram.com/$user_id";
			$data['icon'] = penci_icon_by_ver('fab fa-instagram');

			$cache_key = 'penci_counter__instagram' . $user_id;

			set_transient( $cache_key, 0, $cache_period );

			$instagram_count = get_transient( $cache_key );
			if ( ! $instagram_count ) {
				$access_token = penci_get_social_counter_option( 'instagram_token' );
				$access_token = self::clean_token( $access_token );

				$api_url    = 'https://api.instagram.com/v1/users/self/?access_token=' . $access_token;
				$params     = array(
					'sslverify' => false,
					'timeout'   => 60
				);

				$connection = wp_remote_get( $api_url, $params );

				if ( is_wp_error( $connection ) ) {
					$count = 0;
				} else {
					$response = json_decode( $connection['body'], true );
					if (
						isset( $response['meta']['code'] ) && 200 == $response['meta']['code'] && isset( $response['data']['counts']['followed_by'] )
					) {
						$count = ( intval( $response['data']['counts']['followed_by'] ) );
					} else {
						$count = 0;
					}
				}

				set_transient( $cache_key, $count, $cache_period );

			} else {
				$count = $instagram_count;
			}


			if ( $count ) {
				$data['count'] = $count;
			}

			return $data;
		}

		public static function clean_token( $maybe_dirty ) {
			if ( substr_count( $maybe_dirty, '.' ) < 3 ) {
				return str_replace( '634hgdf83hjdj2', '', $maybe_dirty );
			}

			$parts     = explode( '.', trim( $maybe_dirty ) );
			$last_part = $parts[2] . $parts[3];
			$cleaned   = $parts[0] . '.' . base64_decode( $parts[1] ) . '.' . base64_decode( $last_part );

			$cleaned = preg_replace( "/[^a-zA-Z0-9\.]+/", "", $cleaned );

			return $cleaned;
		}
	}

endif;