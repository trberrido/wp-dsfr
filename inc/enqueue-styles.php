<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'enqueue_block_assets', 'dsfr__enqueue_styles' );
function dsfr__enqueue_styles() {

	// add concatenation operation depending env type
	foreach ( glob( get_template_directory() . '/assets/css/*.css' ) as $css_file ) {
		$file_name = substr( strrchr( $css_file, '/' ), 1 );
		wp_enqueue_style( 'wp-dsfr-' . $file_name, get_template_directory_uri() . '/assets/css/' . $file_name );
	}

}