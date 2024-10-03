<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'wpdsfr__dequeue_styles' );
function wpdsfr__dequeue_styles() {
	wp_dequeue_style( 'global-styles' );
}

add_action( 'enqueue_block_assets', 'wpdsfr__enqueue_styles' );
function wpdsfr__enqueue_styles(): void {

	if ( file_exists( get_template_directory() . '/assets/css/style.min.css' )
		&& ( wp_get_environment_type() === 'production' || wp_get_environment_type() === 'staging' ) ) {

		wp_enqueue_style(
			'wpdsfr-style',
			get_template_directory_uri() . '/assets/css/style.min.css',
			false,
			filemtime( get_template_directory() . '/assets/css/style.min.css' )
		);

	} else {

		wpdsfr__files__concatenation(
			get_template_directory() . '/assets/css/*.css',
			get_template_directory() . '/assets/css/style.min.css'
		);

		foreach ( glob( get_template_directory() . '/assets/css/*.css' ) as $filepath ) {
			$filename = basename( $filepath );
			wp_enqueue_style(
				'wpdsfr-' . $filename,
				get_template_directory_uri() . '/assets/css/' . $filename,
				false,
				filemtime( $filepath )
			);
		}

	}

}