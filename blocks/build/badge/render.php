<?php

$class = [ 'fr-badge' ];
if ( strlen( $attributes['type'] ) ) {
	array_push( $class, 'fr-badge--' . $attributes['type'] );
}

if ( false === $attributes['hasIcon'] ) {
	array_push( $class, 'fr-badge--no-icon' );
}

?>

<p <?php echo get_block_wrapper_attributes( ['class' => implode( ' ', $class )] ); ?>>
	<?php echo $attributes['content']; ?>
</p>