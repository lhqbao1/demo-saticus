<?php

namespace Gravity_Forms\Gravity_Forms\License;

/**
 * Class GF_License_Statuses
 *
 * Helper class to provide license statuse codes and messages. Should not be instantiated, but used statically.
 *
 * @since 2.5.11
 *
 * @package Gravity_Forms\Gravity_Forms\License
 */
class GF_License_Statuses {
	const VALID_KEY             = 'valid_key';
	const SITE_UNREGISTERED     = 'site_unregistered';
	const INVALID_LICENSE_KEY   = 'gravityapi_invalid_license';
	const EXPIRED_LICENSE_KEY   = 'gravityapi_expired_license';
	const SITE_REVOKED          = 'gravityapi_site_revoked';
	const URL_CHANGED           = 'gravityapi_site_url_changed';
	const MAX_SITES_EXCEEDED    = 'gravityapi_exceeds_number_of_sites';
	const MULTISITE_NOT_ALLOWED = 'gravityapi_multisite_not_allowed';
	const NO_DATA               = 'rest_no_route';

	const USABILITY_VALID       = 'success';
	const USABILITY_ALLOWED     = 'warning';
	const USABILITY_NOT_ALLOWED = 'error';

	/**
	 * Get the correct Message for the given code.
	 *
	 * @since 2.5.11
	 *
	 * @param $code
	 *
	 * @return mixed|string|void
	 */
	public static function get_message_for_code( $code ) {
		$map = array(
			self::VALID_KEY             => __( 'Your license key has been successfully validated.', 'gravityforms' ),
		);

		return $map[ 'valid_key' ];
	}
}
