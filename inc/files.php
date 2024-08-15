<?php if ( ! defined( 'ABSPATH' ) ) exit;

function wpdsfr__files__remove_spaces( string $str ): string {

	$patterns = array(
		'!/\*.*?\*/!s'		=> '',
		'/\s*\/\/.*(\R)?/'	=> '',
		'/\s*:\s*/'			=> ':',
		'/\s*;\s*/'			=> ';',
		'/\s*{\s*/'			=> '{',
		'/\s*}\s*/'			=> '}',
		'/\s*,\s*/'			=> ',',
		'/\s*}\s*/'			=> '}',
		'/\s+/'				=> ' ',
		'/[\r\n\t]/'		=> ''
	);

	return preg_replace( array_keys( $patterns ), array_values( $patterns ), $str );

}

function wpdsfr__files__concatenation( string $srcs, string $dst ): void {

	if ( file_exists( $dst ) ) {
		unlink( $dst );
	}
	foreach ( glob( $srcs ) as $src ) {
		if ( $src === $dst ) {
			continue;
		}
		file_put_contents( $dst, wpdsfr__files__remove_spaces( file_get_contents( $src ) ), FILE_APPEND );
	}

}