<?php

function dsfr_reload_styles(){

	if ( isset( $_GET['scheme'] ) && $_GET['scheme'] == 'dark' ){

		add_filter( 'wp_theme_json_data_user', 'dsfr_update_with_dark_theme' );

	}

	wp_enqueue_global_styles();
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	header( 'Content-type: text/css' );
	wp_print_styles();

	exit();

}

add_action( 'wp_ajax_dsfr_reload_styles', 'dsfr_reload_styles' );
add_action( 'wp_ajax_nopriv_dsfr_reload_styles', 'dsfr_reload_styles' );