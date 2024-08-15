<p <?php echo get_block_wrapper_attributes(); ?>>

	<?php if ( false === is_home() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php endif; ?>

		<?php echo $attributes['content']; ?>

	<?php if ( false === is_home() ) : ?>
		</a>
	<?php endif; ?>

</p>