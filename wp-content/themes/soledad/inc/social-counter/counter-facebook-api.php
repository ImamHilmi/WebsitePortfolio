<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_Social_Counter_Facebook_API' ) ):
	class Penci_Social_Counter_Facebook_API {
		public static function get_count( $data, $cache_period ) {

			$page_id        = preg_replace( '/\s+/', '', $data['name'] );
			$access_token   = penci_get_social_counter_option( 'facebook_token' );
			$facebook_count = get_transient( 'penci_counter_facebook' . $page_id );

			if( ! $access_token ) {
				$data['error'] = '<strong>Facebook: </strong> Facebook Access Tokensis empty. Please fill an facebook Access Tokens';
			}

			$auth = array(
				array(
					'628341623933053',
					'fa85e47820eea0943e270866b82fd6de'
				),

				array(
					'137700946743769',
					'02fbb8b47ef2ab9959eb669969960204'
				),

				array(
					'1371946829525082',
					'7c313e6ca551ee652cbef3becace3fb3'
				),

				array(
					'1796275967299269',
					'21f18e737642e4dd077e5049452b2c7b'
				),

				array(
					'211826695956763',
					'c98034423a06b99504d7bf1b013c7818'
				)
			);
			$app_index = array_rand( $auth );

			$access_token = $auth[ $app_index ][0] . '|' . $auth[ $app_index ][1];

			$count = 0;
			if ( ! $facebook_count && $page_id && $access_token ) {
				$response = wp_remote_get( "https://graph.facebook.com/v3.0/$page_id?access_token=$access_token&fields=fan_count" );

				if ( ! is_wp_error( $response ) ) {
					$face_data = isset( $response['body'] ) ? json_decode( $response['body'] ) : '';;
					$face_data = (array)$face_data;

					if ( isset( $face_data['fan_count'] ) ) {
						$count = $face_data['fan_count'];
						set_transient( 'penci_counter_facebook' . $page_id , $count, $cache_period );
					}elseif( isset( $face_data['error']->message ) ){
						$data['error'] = '<strong>Facebook: </strong>' . $face_data['error']->message;
					}
				}
			}elseif( $facebook_count ){
				$count = $facebook_count;
			}

			if( $count ){
				$data['count'] = $count;
			}

			$data['url'] = "https://www.facebook.com/$page_id";
			$data['icon'] = penci_icon_by_ver('fab fa-facebook-f');

			return $data;
		}
	}

endif;