<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'wpdsfr__load_includes' );
function wpdsfr__load_includes(): void {

	foreach ( glob( get_template_directory() . '/inc/*.php' ) as $filepath ){
		require_once $filepath;
	}

}