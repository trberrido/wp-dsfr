<?php

function dsfr__enqueue_scripts() {

	$wpdsfr_data = array(
		'site_url'	=> esc_url( site_url() )
	);

	foreach ( glob( get_template_directory() . '/assets/js/*.js' ) as $js_file ) {

		$file_name = substr( strrchr( $js_file, '/' ), 1 );
		wp_enqueue_script( 'wp-dsfr-' . $file_name, get_template_directory_uri() . '/assets/js/' . $file_name );
		wp_localize_script( 'wp-dsfr-' . $file_name, 'wpdsfr_data', $wpdsfr_data );

	}

}
add_action( 'wp_enqueue_scripts', 'dsfr__enqueue_scripts' );