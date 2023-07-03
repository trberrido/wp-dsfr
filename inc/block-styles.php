<?php

function dsfr_register_block_styles(){

	register_block_style(
		'core/paragraph',
		array(
			'name' => 'highlight',
			'label' => 'Mise en avant',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name' => 'highlight-strong',
			'label' => 'Mise en avant accentuée',
		)
	);

}

add_action( 'init', 'dsfr_register_block_styles' );