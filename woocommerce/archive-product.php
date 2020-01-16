<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
global $featured_item, $wp_query;
if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

get_header('shop'); ?>

	<?php
        /**
         * woocommerce_before_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        do_action('woocommerce_before_main_content');
    ?>

	<div class="product-categories" id="product-categories">

		<div class="row">

			<div class="columns-10 column-center">

				<ul class="block-grid-3">

					<?php $current_tax = get_queried_object()->term_id; ?>

					<?php $categories = get_terms('product_cat', 'hide_empty=0'); ?>

					<?php foreach ($categories as $term): ?>

						<?php $term_link = get_term_link($term); ?>

						<?php

                            $woo_cat_id = $term->term_id;

                            if ($woo_cat_id == $current_tax) {
                                $active = ' active-tax';
                            } else {
                                $active = null;
                            }

                            $woo_cat = $term->slug;

                            // get default category image url
                            $thumbnail_id = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_image_src($thumbnail_id);

                            // get custom category image active/hover state url
                            $hover = get_field('thumbnail_hover_active', $term);
                            $hover = $hover['sizes']['thumbnail'];
                        ?>

						<style type="text/css">

							.cat-<?php echo $woo_cat; ?> .product-cat-image .thumbnail,
							.cat-<?php echo $woo_cat; ?> a:hover .product-cat-image .hover,
							.cat-<?php echo $woo_cat; ?>.active-tax .product-cat-image .hover {
								opacity: 1;
							}
							.cat-<?php echo $woo_cat; ?> .product-cat-image .hover,
							.cat-<?php echo $woo_cat; ?> a:hover .product-cat-image .thumbnail,
							.cat-<?php echo $woo_cat; ?>.active-tax .product-cat-image .thumbnail {
								opacity: 0;
							}
							.cat-<?php echo $woo_cat; ?> .product-cat-image .thumbnail,
							.cat-<?php echo $woo_cat; ?> a:hover .product-cat-image .thumbnail {
								-webkit-transition: opacity .5s;
								-moz-transition: opacity .5s;
								-ms-transition: opacity .5s;
								transition: opacity .5s;
							}
						</style>

						<li class="product-category cat-<?php echo $woo_cat; ?><?php echo $active; ?>">

							<a href="<?php echo $term_link; ?>#product-categories" class="button">							

								<div class="product-cat-image">
									<img class="thumbnail" src="<?php echo $image[0]; ?>" alt="<?php $term->name; ?> | Category Image">
									<img class="hover" src="<?php echo $hover; ?>" alt="<?php $term->name; ?> | Category Hover Image">
								</div>

								<?php echo $term->name; ?>

							</a>

						</li>
						
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

	<?php $featured_products =  get_field('featured_products', get_queried_object()); ?>
	<?php $page = get_query_var('paged'); ?>

	<?php if ($page < 2): ?>
		<div class="product-featured">
			<div class="row">

			  <?php foreach ($featured_products as $post): // variable must be called $post (IMPORTANT)?>
			        <?php setup_postdata($post); ?>
			      
				        <div class="columns-6">
							<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
							<img src="<?php echo $image[0]; ?>" alt="">
				        </div>
				        <div class="columns-5">
					        <div class="featured-content">
					        	<h2><?php echo $post->post_title; ?></h2>
					        	<?php $excerpt = apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
					        	
					        	<p><?php echo $excerpt; ?></p>
					        	<?php $permalink = get_permalink($post->ID); ?>
					        	<a href="<?php echo $permalink; ?>" class="button"><?php _e('Read More', 'anvil'); ?></a>
				        	
				        	</div>
				        </div>
	 					<?php $featured_item = $post->ID;  ?>
				 
			    <?php endforeach; ?>
			    </div>
		</div>
	<?php endif; ?>



	

	<div class="prodcuts-wrapper">
		<div class="row">
			<div class="columns-12">
				

			
				<?php if (have_posts()) : ?>

			
					<ul class="products block-grid-3">

						<?php woocommerce_product_subcategories(); ?>

						<?php while (have_posts()) : the_post(); ?>

							<?php wc_get_template_part('content', 'product'); ?>

						<?php endwhile; // end of the loop.?>

					</ul>

			<?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
            ?>

			<?php elseif (! woocommerce_product_subcategories(array( 'before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false) ))) : ?>

				<?php wc_get_template('loop/no-products-found.php'); ?>

			<?php endif; ?>
		</div>
	</div>


	<?php
        /**
         * woocommerce_after_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');
    ?>



<?php get_footer('shop'); ?>
