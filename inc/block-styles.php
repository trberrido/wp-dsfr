<?php

// Adding block styles variations
// https://developer.wordpress.org/themes/features/block-style-variations/
function dsfr__register_block_styles() {

	$blocks_styles = array(
		'core/paragraph' => array(
			array(
				'name' => 'highlight',
				'label' => 'Mise en avant',
			),
			array(
				'name' => 'highlight-strong',
				'label' => 'Mise en avant accentuée',
			),
		),
	);

	foreach ( $blocks_styles as $block_name => $styles ) {
		foreach ( $styles as $style ){
			register_block_style(
				$block_name,
				array(
					'name' => $style['name'],
					'label' => $style['label'],
				)
			);
		}
	}

}
add_action( 'init', 'dsfr__register_block_styles' );