<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'wpdsfr__register_blocks_types' );
function wpdsfr__register_blocks_types(): void {

	foreach ( glob( get_stylesheet_directory() . '/blocks/build/*' ) as $block_directory ) {
		register_block_type( $block_directory );
	}

}