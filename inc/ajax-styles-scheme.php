<?php

// This ajax call enables switching between light and dark schemes.

function dsfr__update_with_dark_theme( $theme_json ) {

	$dark_theme = wp_json_file_decode(
		file_get_contents( get_template_directory() . '/styles/dark.json' ),
		array( 'associative' => true )
	); console( $dark_theme, json_last_error(), json_last_error_msg() ); exit();

	return $theme_json->update_with( $dark_theme );

}

function dsfr__reload_styles() {

	if ( isset( $_GET['scheme'] ) && $_GET['scheme'] === 'dark' ) {
		add_filter( 'wp_theme_json_data_user', 'dsfr__update_with_dark_theme' );
	}

	wp_enqueue_global_styles();
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	header( 'Content-type: text/css' );
	wp_print_styles();

	exit();

}
add_action( 'wp_ajax_dsfr_reload_styles', 'dsfr__reload_styles' );
add_action( 'wp_ajax_nopriv_dsfr_reload_styles', 'dsfr__reload_styles' );