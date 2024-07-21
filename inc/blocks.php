<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'dsfr__register_blocks_types' );
function dsfr__register_blocks_types() {
	foreach ( glob( get_stylesheet_directory() . '/blocks/*' ) as $block ) {
		register_block_type( $block );
	}
}