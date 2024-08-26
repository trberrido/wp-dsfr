<?php if ( $attributes['isLink'] ) : ?>
	<a	href="<?php echo esc_url( home_url( '/' ) ) ?>"
		title="Accueil - <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
		rel="home"
	>
<?php endif; ?>


<p <?php echo get_block_wrapper_attributes( ['class' => 'fr-logo fr-logo--' . $attributes['size']] ); ?>>
	<?php echo $attributes['content']; ?>
</p>

<?php if ( $attributes['isLink'] ) : ?>
	</a>
<?php endif; ?>