<?php

add_action( 'init', 'dsfr__register_blocks', 5 );

function dsfr__register_blocks() {

	foreach ( glob( get_stylesheet_directory() . '/blocks/*') as $block ) {
		register_block_type( $block );
	}

}

add_action( 'init', 'dsfr__block__register_style_variations' );

function dsfr__block__register_style_variations() {

	$blocks_style_variations = array(
		'core/navigation'	=> array(
			array(
				'name'	=> 'main',
				'label'	=> 'Navigation principale'
			),
			array(
				'name'	=> 'header-tools',
				'label'	=> 'Header, outils'
			)
		),
		'core/paragraph'	=> array(
			array(
				'name'	=> 'site-logo',
				'label'	=> 'Logo'
			)
		),
	);

	foreach ( $blocks_style_variations as $block_name => $style_variations ) {
		foreach ( $style_variations as $style_variation ) {
			register_block_style(
				$block_name,
				$style_variation
			);
		}
	}

}