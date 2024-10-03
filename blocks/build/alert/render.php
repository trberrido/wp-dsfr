<?php

$class = [ 'fr-alert' ];
if ( isset( $attributes['type'] ) ) {
	array_push( $class, 'fr-alert--' . $attributes['type'] );
}

$heading_level = 'h' . intval( ( $attributes['level'] ?? 3 ) );

?>

<div <?php echo get_block_wrapper_attributes(['class' => implode( ' ', $class )] ); ?>>
    <<?php echo $heading_level; ?> class="fr-alert__title">
		<?php echo $attributes['title'] ?>
	</<?php echo $heading_level; ?>>
    <p><?php echo $attributes['content']; ?></p>
</div>