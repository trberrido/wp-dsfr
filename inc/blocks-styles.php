<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'dsfr__register_blocks_styles' );
function dsfr__register_blocks_styles() {

	$blocks_styles = array(
		'core/paragraph'	=> array(
			array(
				'name'	=> 'highlight',
				'label'	=> 'Mise en avant',
			),
			array(
				'name'	=> 'highlight-strong',
				'label'	=> 'Mise en avant accentuée',
			),
			array(
				'name'	=> 'site-logo',
				'label'	=> 'Logo'
			)
		)
	);

	foreach ( $blocks_styles as $block => $styles ) {
		foreach ( $styles as $style ) {
			register_block_style( $block, $style );
		}
	}

}

add_action( 'init', 'dsfr__enqueue_blocks_styles' );
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