<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_Social_Counter_Pinterest_API' ) ):
	class Penci_Social_Counter_Pinterest_API {
		public static function get_count( $data, $cache_period ) {

			$user_id     = preg_replace( '/\s+/', '', $data['name'] );
			$data['url'] = "https://www.pinterest.com/$user_id";
			$data['icon'] = penci_icon_by_ver('fab fa-pinterest');

			$count = 0;

			$cache_key       = 'penci_counter__pinterest' . $user_id;
			$pinterest_count = get_transient( $cache_key );
			if ( ! $pinterest_count ) {

				try {
					$get_request = wp_remote_get( "https://www.pinterest.com/$user_id/", array( 'timeout' => 18, 'sslverify' => false ) );
					$html        = wp_remote_retrieve_body( $get_request );

					$doc = new DOMDocument();
					@$doc->loadHTML( $html );
					$metas = $doc->getElementsByTagName( 'meta' );
					for ( $i = 0; $i < $metas->length; $i ++ ) {
						$meta = $metas->item( $i );
						if ( $meta->getAttribute( 'name' ) == 'pinterestapp:followers' ) {
							$count = $meta->getAttribute( 'content' );
							break;
						}
					}

				} catch ( Exception $e ) {
					$count = 0;
				}

				set_transient( $cache_key, $count, $cache_period );
			} else {
				$count = $pinterest_count;
			}

			if ( $count ) {
				$data['count'] = $count;
			}

			return $data;
		}
	}

endif;