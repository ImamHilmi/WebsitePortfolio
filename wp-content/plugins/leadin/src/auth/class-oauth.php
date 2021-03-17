<?php

namespace Leadin\auth;

use Leadin\wp\User;
use Leadin\LeadinOptions;

/**
 * Class managing OAuth2 authorization
 */
class OAuth {

	/**
	 * Returns true if the OAuth2 gate is enabled from the dev plugin
	 */
	public static function is_enabled() {
		return ! empty( get_option( 'hsdev_oauth_enabled' ) );
	}

	/**
	 * Authorizes the plugin with given oauth credentials by storing them in the options DB.
	 *
	 * @param String $access_token OAuth access token to store.
	 * @param String $refresh_token OAuth refresh token to store.
	 * @param String $expires_in Time left in seconds till access token expires.
	 */
	public static function authorize( $access_token, $refresh_token, $expires_in ) {
		LeadinOptions::update( 'access_token', $access_token );
		LeadinOptions::update( 'refresh_token', $refresh_token );
		LeadinOptions::update( 'expiry_time', time() + $expires_in );
	}

	/**
	 * Deauthorizes the plugin by deleting OAuth credentials from the options DB.
	 */
	public static function deauthorize() {
		LeadinOptions::delete( 'access_token' );
		LeadinOptions::delete( 'refresh_token' );
		LeadinOptions::delete( 'expiry_time' );
	}

	/**
	 * Returns the access token currently stored in the options table.
	 * If the token has expired, it will be refreshed before being returned.
	 */
	public static function get_access_token() {
		if ( self::is_access_token_expired() ) {
			self::refresh_access_token();
		}

		return LeadinOptions::get( 'access_token' );
	}

	/**
	 * Returns the refresh token stored in the options table.
	 */
	public static function get_refresh_token() {
		return LeadinOptions::get( 'refresh_token' );
	}

	/**
	 * Returns the unix time in seconds for when the access token will expire.
	 */
	public static function get_expiry_time() {
		return LeadinOptions::get( 'expiry_time' );
	}

	/**
	 * Returns a boolean based on if the access token needs to be refreshed.
	 * Currently buffers 10 minutes so that the token can be refreshed before it expires.
	 */
	public static function is_access_token_expired() {
		$current_time = time();

		$expiry_time = self::get_expiry_time();
		return $expiry_time - $current_time < 26000; // 10 minutes.
	}

	/**
	 * Refreshes the stored access token by posting to HubSpot's OAuth api.
	 */
	public static function refresh_access_token() {
		$refresh_token   = self::get_refresh_token();
		$url             = "https://api.hubspotqa.com/wordpress/v1/oauth/refresh?refresh_token=$refresh_token";
		$refresh_request = wp_remote_post(
			$url,
			array(
				'headers' => array( 'Content-Type: application/json' ),
			)
		);

		if ( is_wp_error( $refresh_request ) || wp_remote_retrieve_response_code( $refresh_request ) !== 200 ) {
			wp_safe_redirect( admin_url( 'admin.php?page=leadin&error=1' ) );
			exit;
		} else {
			$authorization = json_decode( wp_remote_retrieve_body( $refresh_request ) );
			self::authorize( $authorization->access_token, $authorization->refresh_token, $authorization->expires_in );
		}
	}
}
