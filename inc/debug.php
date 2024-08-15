<?php if ( ! defined( 'ABSPATH' ) ) exit;

// print an undefined list of arguments
// @param mixed $fn_argv
// @return void
function console(): void {

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
// add_filter( 'render_block', wpdsfr__block_dissect', 10, 2 );
function wpdsfr__block_dissect( string $block_content, array $block ): string {

	if ( 'core/' === $block['blockName'] ) {
		console( $block );
	}

	return $block_content;

}