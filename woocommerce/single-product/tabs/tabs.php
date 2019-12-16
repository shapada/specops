<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	
	<div class="tabs">
		<ul class="slider-thumbs block-grid-4">
			

				<?php if(get_field('single_product_overview', get_queried_object())): ?>
					<li><?php _e('Overview', 'anvil'); ?></li>
					<?php endif; ?>
				<?php if(get_field('single_product_benefits', get_queried_object())): ?>
					<li><?php _e('Benefits', 'anvil'); ?></li>
					<?php endif; ?>
				<?php if(get_field('single_product_faqs', get_queried_object())): ?>
					<li><?php _e('FAQs', 'anvil'); ?></li>
				<?php endif; ?>
				<?php if(have_rows('additional_tabs', get_queried_object())): ?>
					<?php while ( have_rows('additional_tabs') ) : the_row(); ?>
						<li><?php the_sub_field('tab_title'); ?></li>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php if(get_field('single_included_products', get_queried_object())): ?>
					<li><?php _e('Related Products', 'anvil'); ?></li>
				<?php endif; ?>

			
		</ul>
		<div class="flexslider tab-slider">
			<ul class="slides">
				<?php if(get_field('single_product_overview', get_queried_object())): ?>
					<li><?php the_field('single_product_overview'); ?></li>
				<?php endif; ?>
				<?php if(get_field('single_product_benefits', get_queried_object())): ?>
					<li><?php the_field('single_product_benefits'); ?></li>
					<?php endif; ?>
				<?php if(get_field('single_product_faqs', get_queried_object())): ?>
					<li><?php the_field('single_product_faqs'); ?></li>
				<?php endif; ?>
					<?php if(have_rows('additional_tabs', get_queried_object())): ?>
					<?php while ( have_rows('additional_tabs') ) : the_row(); ?>
						<li><?php the_sub_field('tab_content'); ?></li>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php if(get_field('single_included_products', get_queried_object())): ?>
					<li>
						<?php $posts = get_field('single_included_products'); ?>
						<?php foreach ($posts as $post): ?>
							<?php setup_postdata($post); ?>
						
							<div class="row included-product">
								<div class="columns-12 related-product">
									<?php $permalink = get_permalink($post->ID ); ?>
									<h4><a href="<?php echo $permalink; ?>"><?php echo $post->post_title; ?></a></h4>
									<?php $excerpt = has_excerpt( $post->ID )? $post->post_excerpt : $post->post_content; ?>
									<p><?php echo wp_trim_words( $excerpt, 40);  ?></p>
									
					        	<a href="<?php echo $permalink; ?>" class="button">Read More</a>
								</div>
							</div>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
					</li>
					<?php endif; ?>
			</ul>
		</div>
		<?php if (get_field('show_button')) : ?>
		<div class="evaluation-button-wrap">
			<a class="button" href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a>
		</div>
		<?php endif; ?>
	</div>

<?php endif; ?>
