<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'wpdsfr__register_blocks_styles' );
function wpdsfr__register_blocks_styles(): void {

	$blocks_styles = array(
		'core/button'		=> array(
			array(
				'name'			=> 'primary',
				'label'			=> 'Primaire',
				'is_default'	=> true
			),
			array(
				'name'			=> 'secondary',
				'label'			=> 'Secondaire'
			),
			array(
				'name'			=> 'tertiary',
				'label'			=> 'Tertiaire'
			),
			array(
				'name'			=> 'tertiary-no-outline',
				'label'			=> 'Tertiaire sans contours'
			)
		),
		'core/buttons'		=> array(
			array(
				'name'	=> 'size-sm',
				'label'	=> 'Taille SM',
			),
			array(
				'name'			=> 'size-md',
				'label'			=> 'Taille MD',
				'is_default'	=> true
			),
			array(
				'name'	=> 'size-lg',
				'label'	=> 'Taille LG',
			)
		),
		'core/paragraph'	=> array(
			array(
				'name'	=> 'highlight',
				'label'	=> 'Mise en avant'
			),
			array(
				'name'	=> 'excergue',
				'label'	=> 'Mise en exergue'
			)
		)
	);

	foreach ( $blocks_styles as $block => $styles ) {
		foreach ( $styles as $style ) {
			register_block_style( $block, $style );
		}
	}

}

add_action( 'init', 'wpdsfr__enqueue_blocks_styles' );
function wpdsfr__enqueue_blocks_styles(): void {

	$blocks_css_directory = '/assets/css/blocks/';
	foreach ( glob( get_stylesheet_directory() . $blocks_css_directory . '*', GLOB_ONLYDIR ) as $directory ) {
		$namespace = basename( $directory );
		foreach ( glob( $directory . '/*.css' ) as $css_file ) {
			$blockname = basename( $css_file, '.css' );
			wp_enqueue_block_style(
				$namespace . '/' . $blockname,
				array(
					'handle'	=> 'wpdsfr-' . $namespace . '-' . $blockname,
					'src'		=> get_template_directory_uri() . $blocks_css_directory . $namespace . '/' . $blockname . '.css',
					'path'		=> get_template_directory() . $blocks_css_directory . $namespace . '/' . $blockname . '.css',
					'ver'		=> filemtime( get_template_directory() . $blocks_css_directory . $namespace . '/' . $blockname . '.css' )
				)
			);
		}
	}

}