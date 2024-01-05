<?php

add_action( 'init', 'dsfr__register_blocks', 5 );

function dsfr__register_blocks(){

	foreach ( glob( get_stylesheet_directory() . '/blocks/*') as $block ){
		register_block_type( $block );
	}

}