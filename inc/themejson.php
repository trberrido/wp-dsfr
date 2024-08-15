<?php if ( ! defined( 'ABSPATH' ) ) exit;

function wpdsfr__theme_json__merge_contents( string $directorypath, array $data = array() ): array {

	foreach ( glob( $directorypath ) as $filepath ) {

		if ( false === isset( $data[ pathinfo( $filepath, PATHINFO_FILENAME ) ] ) ) {
			$data[ pathinfo( $filepath, PATHINFO_FILENAME ) ] = array();
		}

		$key = pathinfo( $filepath, PATHINFO_FILENAME );

		if ( is_dir( $filepath ) ) {
			$data[ $key ] = array_merge_recursive( $data[ $key ], wpdsfr__theme_json__merge_contents( $filepath . '/*' ) );
		} else if ( 'json' === pathinfo( $filepath, PATHINFO_EXTENSION ) ) {
			$data[ $key ] = array_merge_recursive( $data[ $key ], json_decode( file_get_contents( $filepath ), true ) );
		}

	}

	return $data;

}

add_action( 'init', 'wpdsfr__theme_json__builder' );
function wpdsfr__theme_json__builder(): void {

	if ( /* is_admin() && */ in_array( wp_get_environment_type(), array( 'development', 'local' ) ) ) {
		$json_content = array(
			'$schema'	=> 'https://schemas.wp.org/trunk/theme.json',
			'version'	=> 3,
		);
		$json_file = get_template_directory() . '/theme.json';
		file_put_contents(
			$json_file,
			json_encode( wpdsfr__theme_json__merge_contents( get_template_directory() . '/themejson/*', $json_content ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE /* | JSON_PRETTY_PRINT  */)
		);
	}

}