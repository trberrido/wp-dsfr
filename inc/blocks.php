<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'dsfr__block__register_blocks_styles' );

function dsfr__block__register_blocks_styles() {

	$blocks_styles = array(
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