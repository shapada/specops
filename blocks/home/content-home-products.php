<?php
/**
 * Block Name: Featured Products
 *
 * This is the template that displays the Home: Featured Products block.
 */
?>

<div class="homepage-featured-products">
	<div class="row">
	<?php if ( have_rows( 'products' ) ) : ?>
		<?php while ( have_rows( 'products' ) ) : the_row(); 
			// vars
			$icon        = get_sub_field( 'product_icon' );
			$title       = get_sub_field( 'product_title' );
			$description = get_sub_field( 'product_description' );
			$link        = get_sub_field( 'product_link' );
			$cta_label   = get_sub_field( 'product_cta_label' );
		?>
			<div class="columns-4 featured-product">
				<a href="<?php echo $link; ?>">
					<?php echo wp_get_attachment_image( $icon['id'], 'full' ); ?>
					<h3><?php echo $title; ?></h3>
					<p><?php echo $description; ?></p>
					<span><?php echo $cta_label ? $cta_label : 'See How It Works' ?></span>
				</a>
			</div>
	<?php endwhile; endif; ?>
	</div>
</div>