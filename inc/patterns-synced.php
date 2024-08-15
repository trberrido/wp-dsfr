<?php defined('ABSPATH') or die();

add_action( 'init', 'wpdsfr__import_synced_patterns' );
function wpdsfr__import_synced_patterns(): void {

	if ( is_admin() ) {

		$patterns = glob( get_template_directory() . '/patterns-synced/*.json' );
		foreach ( $patterns as $pattern ) {

			$pattern_data = json_decode( file_get_contents( $pattern ), true );
			if ( ! $pattern_data || ! isset( $pattern_data['title'] ) || ! isset( $pattern_data['content'] ) ) {
				continue;
			}

			$pattern_posts = get_posts( array(
				'post_type'		=> 'wp_block',
				'numberposts'	=> 1,
				'title'			=> $pattern_data['title']
			) );

			if ( empty( $pattern_posts ) ) {

				$pattern_post_id = wp_insert_post( array(
					'post_type'			=> 'wp_block',
					'post_title'		=> $pattern_data['title'],
					'post_content'		=> $pattern_data['content'],
					'post_status'		=> 'publish',
					'ping_status'		=> 'closed',
					'comment_status' 	=> 'closed',
				) );

			} else {

				$pattern_post = $pattern_posts[0];
				$pattern_post = wp_update_post( array(
					'ID'			=> $pattern_post->ID,
					'post_title'	=> $pattern_data['title'],
					'post_content'	=> $pattern_data['content'],
				) );

			}

		}

	}

}