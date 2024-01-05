<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function dsfr__include() {

	foreach ( glob( get_template_directory() . '/inc/*.php' ) as $file ){
		require_once $file;
	}

}
add_action( 'after_setup_theme', 'dsfr__include' );