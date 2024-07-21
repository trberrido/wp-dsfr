<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'dsfr__include' );
function dsfr__include() {
	foreach ( glob( get_template_directory() . '/inc/*.php' ) as $file ){
		require_once $file;
	}
}