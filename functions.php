<?php

function dsfr_include_utils(){

	foreach ( glob( __DIR__ . '/inc/*.php' ) as $util_file ){

		include_once $util_file;

	}

}

add_action('after_setup_theme', 'dsfr_include_utils');