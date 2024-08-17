<?php
	$heading_level = 'h' . intval( ( $attributes['level'] ?? 3 ) );
	$unique_id = wp_unique_id( 'wpdsfr-accordion__content-' );
?>

<section
	data-wp-interactive="wpdsfr/accordion"
	data-wp-context='{ "isOpen": false }'
	data-wp-class--wp-block-wpdsfr-accordion--is-open="context.isOpen"
	<?php echo get_block_wrapper_attributes(['class' => 'fr-accordion']); ?>>

	<<?php echo $heading_level; ?> class="fr-accordion__title">
		<button
			class="fr-accordion__btn"
			data-wp-on--click="actions.toggle"
			data-wp-bind--aria-expanded="context.isOpen"
			aria-controls="<?php echo esc_attr( $unique_id ); ?>"
		>
			<?php echo $attributes['content']; ?>
		</button>
	</<?php echo $heading_level; ?>>

	<div
		id="<?php echo esc_attr( $unique_id ); ?>"
		class="fr-collapse"
		data-wp-class--fr-collapse--expanded="context.isOpen"
	>
		<?php echo $content; ?>
	</div>

</section>