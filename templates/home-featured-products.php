
<div class="homepage-featured-products">

	<div class="row">

	<?php if ( have_rows( 'home_featured_products' ) ) : ?>

		<?php while ( have_rows( 'home_featured_products' ) ) : the_row(); 

			// vars
			$icon        = get_sub_field( 'home_product_icon' );
			$title       = get_sub_field( 'home_product_title' );
			$description = get_sub_field( 'home_product_description' );
			$link        = get_sub_field( 'home_product_link' );
			$cta_label   = get_sub_field( 'home_product_cta_label' );

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
