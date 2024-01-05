<?php

// Adding css rules to the existing blocks.
// With `wp_enqueue_block_style`,
// the css file is inlinely loaded only if the block is present on the page.
function dsfr__enqueue_blocks_styles() {

	$blocks_css_directory = '/assets/css/blocks/';
	foreach ( glob( get_stylesheet_directory() . $blocks_css_directory . '*', GLOB_ONLYDIR ) as $directory ) {
		$namespace = substr( strrchr( $directory, '/' ), 1 );
		foreach ( glob( $directory . '/*.css' ) as $css_file ) {
			$filename = pathinfo( $css_file, PATHINFO_FILENAME );

			wp_enqueue_block_style(
				$namespace . '/' . $filename,
				array(
					'handle'	=> 'dsfr-' . $namespace . '-' . $filename,
					'src'		=> get_template_directory_uri() . $blocks_css_directory . $namespace . '/' . $filename . '.css',
					'path'		=> get_template_directory() . $blocks_css_directory . $namespace . '/' . $filename . '.css',
					'ver'		=> filemtime( get_template_directory() . $blocks_css_directory . $namespace . '/' . $filename . '.css' )
				)
			);

		}
	}

}
add_action( 'init', 'dsfr__enqueue_blocks_styles' );

// Adding css for every page.
function dsfr__enqueue_styles() {

	foreach ( glob( get_template_directory() . '/assets/css/*.css' ) as $css_file ) {

		$file_name = substr( strrchr( $css_file, '/' ), 1 );
		wp_enqueue_style( 'wp-dsfr-' . $file_name, get_template_directory_uri() . '/assets/css/' . $file_name );

	}

}
add_action( 'enqueue_block_assets', 'dsfr__enqueue_styles' );