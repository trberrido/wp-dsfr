<?php if ( ! defined( 'ABSPATH' ) ) exit;

function dsfr__enqueue_scripts() {

	$wpdsfr_data = array(
		'siteUrl'	=> esc_url( site_url() )
	);

	foreach ( glob( get_template_directory() . '/assets/js/*.js' ) as $js_file ) {

		$file_name = substr( strrchr( $js_file, '/' ), 1 );
		wp_enqueue_script( 'wp-dsfr-' . $file_name, get_template_directory_uri() . '/assets/js/' . $file_name, array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ) );
		wp_localize_script( 'wp-dsfr-' . $file_name, 'wpdsfr_data', $wpdsfr_data );

	}

}
add_action( 'enqueue_block_editor_assets', 'dsfr__enqueue_scripts' );