<?php if ( ! defined( 'ABSPATH' ) ) exit;

// print an undefined list of arguments
// @param mixed $fn_argv
// @return void
function console() {
	$argv = func_get_args();
	echo '<pre style="background-color:#ececec; color: black; padding: 1rem; border: 1px solid #666666; font-size: .8rem; border-radius: .5rem;">';
	foreach ( $argv as $arg ) {
		var_dump( $arg );
		echo '-----------<br>';
	}
	echo '</pre>';
}

// this filter is usefull to know what data are necessary
// when using the function inc/blocks.php > dw__block__get()
// add_filter( 'render_block', dsfr__block_dissect', 10, 2 );
function dsfr__block_dissect( $block_content, $block ) {

	if ( 'core/' === $block['blockName'] ) {
		console( $block );
	}

	return $block_content;

}