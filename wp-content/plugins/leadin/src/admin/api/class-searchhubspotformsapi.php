<?php

namespace Leadin\admin\api;

use Leadin\utils\RequestUtils;
use Leadin\utils\QueryParams;
use Leadin\auth\OAuth;

/**
 * Search HubSpot forms API, Used to retrieve the existing hubspot forms a user has.
 */
class SearchHubSpotFormsApi extends ApiGenerator {
	const FORMS_API_URL = 'https://api.hubspotqa.com/forms/v2/forms';

	/**
	 * Search HubSpot Forms API. Adds the ajax hooks.
	 *
	 * @var String $endpoint API endpoint.
	 */
	public $endpoint = 'wp_ajax_leadin_search_forms';

	/**
	 * HubSpot Forms API constructor.
	 */
	public function __construct() {
		parent::__construct( false );
	}

	/**
	 * Search Forms API runner. It validates the portal id and domain and stores them as WordPress options.
	 */
	public function run() {
		$query_params = array(
			'offset'         => QueryParams::get_param( 'offset', 'hubspot-ajax', '_ajax_nonce' ),
			'limit'          => QueryParams::get_param( 'limit', 'hubspot-ajax', '_ajax_nonce' ),
			'name__contains' => QueryParams::get_param( 'name__contains', 'hubspot-ajax', '_ajax_nonce' ),
			'formTypes'      => array( 'HUBSPOT' ),
			'order'          => '-updatedAt',
		);

		$search_forms_url = self::FORMS_API_URL . '?' . http_build_query( $query_params );

		$search_forms_request = wp_remote_get(
			$search_forms_url,
			array(
				'headers' => array(
					'Content-Type'  => 'application/json',
					'Authorization' => 'Bearer ' . OAuth::get_access_token(),
				),
			)
		);

		$request_code = intval( wp_remote_retrieve_response_code( $search_forms_request ) );
		if ( is_array( $search_forms_request ) && 200 === $request_code ) {
			RequestUtils::send_json( json_decode( $search_forms_request['body'] ) );
		} else {
			$error_message = wp_remote_retrieve_response_message( $search_forms_request );
			RequestUtils::send_error_message( $error_message, $request_code );
		}
	}
}
