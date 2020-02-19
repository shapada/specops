<?php
/*
 * Template Name: Products Page
 */
get_header(); ?>
	<?php get_template_part('templates/page', 'banner'); ?>

	<div class="products-wrapper">
		<div class="row">
			<div class="columns-12">

				<?php
					// WP_Query arguments
					$args = array (
						'post_type'              => array( 'product' ),
						'post_status'            => array( 'publish' ),
						'nopaging'               => true,
						'order'                  => 'ASC',
						'orderby'                => 'menu_order',
					);

					// The Query
					$products = new WP_Query( $args );
				?>
				
				<?php if ( $products->have_posts() ) : ?>

					<ul class="products block-grid-3">

						<?php while ( $products->have_posts() ) : $products->the_post(); ?>

							<li <?php post_class( $classes ); ?>>
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
								<?php
									$excerpt = get_field( 'single_product_overview_excerpt' );
									if ( $excerpt ) :
								?>
									<p><?php echo $excerpt; ?></p>
								<?php else : ?>
									<?php
										$overview = get_field( 'single_product_overview' );
									?>
									<p><?php echo wp_trim_words( $overview, 20 ); ?></p>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="button read-more">Read More</a>
							</li>

						<?php endwhile; // end of the loop. ?>

					</ul>

			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
		
<?php get_footer(); ?>