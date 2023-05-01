<?php

function dsfr_styles() {
	wp_register_style(
		'wp-dsfr',
		get_template_directory_uri() . '/style.css',
		array(),
		false,
		'all'
	);
	wp_enqueue_style( 'wp-dsfr' );
}

add_action( 'wp_enqueue_scripts', 'dsfr_styles' );