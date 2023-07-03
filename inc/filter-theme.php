<?php

function dsfr_update_with_dark_theme( $theme_json ){

	$dark_theme = json_decode( file_get_contents( get_template_directory() . '/styles/dark.json' ), true );
	return $theme_json->update_with( $dark_theme );

}

