<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'rest_endpoints', 'dsfr__remove_users_endpoints');
function dsfr__remove_users_endpoints( $endpoints ) {
	if ( isset( $endpoints['/wp/v2/users'] ) ) {
		unset( $endpoints['/wp/v2/users'] );
	}
	if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}
	return $endpoints;
}