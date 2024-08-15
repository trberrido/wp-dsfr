<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'rest_endpoints', 'wpdsfr__remove_users_endpoints');
function wpdsfr__remove_users_endpoints( $endpoints ): array {

	if ( isset( $endpoints['/wp/v2/users'] ) ) {
		unset( $endpoints['/wp/v2/users'] );
	}
	if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}

	return $endpoints;

}