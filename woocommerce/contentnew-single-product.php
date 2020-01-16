<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly
?>

<?php
    /**
     * woocommerce_before_single_product hook
     *
     * @hooked wc_print_notices - 10
     */
    do_action('woocommerce_before_single_product');

    if (post_password_required()) {
        echo get_the_password_form();
        return;
    }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?> data-product>

	<div id="product-banner">

		<?php
            // Get product banner fields
            $custom_title = get_field('single_product_overview_headline');
            $overview = get_field('single_product_overview');
            $custom_btn_show = get_field('single_product_overview_button_show');
            $custom_btn_label = get_field('single_product_overview_button_label');
            $custom_btn_link = get_field('single_product_overview_button_link');
            $screenshot = get_field('single_product_overview_screenshot');
        ?>

		<div class="row">

			<div class="product-banner-text">
				<h1><?php echo ($custom_title) ? $custom_title : get_the_title(); ?></h1>
				<?php echo $overview; ?>
				<?php if ($custom_btn_show == "Show Button") { ?>
				  <a class="button" href="<?php echo ($custom_btn_link) ? $custom_btn_link : '#tryfree'; ?>"><?php echo ($custom_btn_label) ? $custom_btn_label : 'Try It For Free!'; ?></a>
				<?php } ?>
			</div>

			<div class="product-banner-image">
				<div class="laptop-wrap">
					<?php echo wp_get_attachment_image($screenshot['id'], 'full'); ?>
				</div>
			</div>

		</div>
		
	</div>

	<?php if (have_rows('single_product_benefits')) : ?>

		<div id="product-benefits">

			<div class="row">

				<ul class="product-benefits-wrap">

					<?php while (have_rows('single_product_benefits')) : the_row();
                    
                        // Get sub-fields
                        $icon = get_sub_field('single_product_benefit_icon');
                        $title = get_sub_field('single_product_benefit_title');
                        $content = get_sub_field('single_product_benefit_content');
                        $more_content = get_sub_field('single_product_benefit_more_content');
                    
                    ?>

						<li id="<?php echo sanitize_title_with_dashes($title); ?>">
							<div class="benefit-title">
								<?php echo wp_get_attachment_image($icon['id'], 'full'); ?>
								<h2><?php echo $title; ?></h2>
							</div>
							<div class="benefit-content">
								<?php echo $content; ?>
								<?php if ($more_content) : ?>
									<?php echo '<div class="more-content">' . $more_content . '</div>'; ?>
									<a class="read-more" href="#">Read More</a>
								<?php endif; ?>
							</div>
						</li>

					<?php endwhile; ?>

				</ul>

			</div>

		</div>

		<div id="product-cta">
			<div class="row">
				<?php
                    // Get fields
                    $custom_cta = get_field('single_product_custom_cta_blurb');
                    $custom_cta_label = get_field('single_product_custom_cta_button_label');
                    $custom_cta_link = get_field('single_product_custom_cta_button_link');
                ?>
				<p><?php echo ($custom_cta) ? $custom_cta : 'Sound like a good fit?'; ?></p> <a class="button" role="button" href="<?php echo ($custom_cta_link) ? $custom_cta_link : get_permalink(get_page_by_path('contact-us')); ?>"><?php echo ($custom_cta_label) ? $custom_cta_label : 'Get in Touch'; ?></a>
			</div>
		</div>

	<?php endif; ?>

	<?php
        $features = get_field('single_product_features');

        if ($features) :
    ?>

		<?php
            // Get title field
            $custom_feat_title = get_field('single_product_features_title');
        ?>

		<div id="product-features">

			<div class="row">

				<div class="product-center-content">
					<h2 class="product-section-title"><?php echo ($custom_feat_title) ? $custom_feat_title : 'Features'; ?></h2>
					<hr class="sep">
				</div>
			
				<?php $features = '<li>' . str_replace(array( "\r", "\n\n", "\n" ), array( '', "\n", "</li>\n<li>" ), trim($features, "\n\r")) . '</li>'; ?>

					<div class="product-features-wrap">
						<ul>
							<?php echo $features; ?>
						</ul>
					</div>

			</div>

		</div>

	<?php endif; ?>

	<?php
        $product_form = get_field('single_product_form');

        if ($product_form) :
    ?>

		<?php
            // Get title/content fields
            $custom_form_title = get_field('single_product_form_title');
            $custom_form_content = get_field('single_product_content');
        ?>

		<div id="tryfree">

			<div class="row">

				<div class="product-center-content">
					<h2 class="product-section-title"><?php echo ($custom_form_title) ? $custom_form_title : 'Try it for FREE, today!'; ?></h2>
					<?php echo ($custom_form_content) ? $custom_form_content : '<p>Please fill in your information to start your free trial. All fields are mandatory.</p>'; ?>
					<hr class="sep">
				</div>

				<div class="product-form-wrap">
					<?php echo $product_form; ?>
				</div>

			</div>
	
		</div>

	<?php endif; ?>
		
	<meta itemprop="url" content="<?php the_permalink(); ?>">
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action('woocommerce_after_single_product'); ?>

<?php

$resource_posts = get_field('single_product_resources');
$related_posts = get_field('single_included_products');

if ($resource_posts || $related_posts || have_rows('single_product_reviews')) :

?>
<div id="product-sticky-footer">
	<div class="row product-sticky-footer-expand-trigger-wrapper">
		<div class="product-sticky-footer-expand-trigger"></div>
	</div>

	<div class="product-sticky-footer-title">
		<div class="row">
			<h2>Learn More</h2>
		</div>
	</div>

	<div class="product-sticky-footer-wrapper">

		<div class="row">

			<?php
                if ($resource_posts) :
            ?>

				<div id="product-resources" class="tab-panel active">

					<ul class="product-resource-list">
						<?php foreach ($resource_posts as $post) : ?>

							<?php setup_postdata($post); ?>

							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="resource-thumb-wrap">
										<?php
                                            if (has_post_thumbnail()) :
                                                the_post_thumbnail('thumbnail');
                                            else :
                                                $terms = get_the_terms(get_the_ID(), 'resource-types');
                                                if ($terms && ! is_wp_error($terms)) :
                                                    foreach ($terms as $term) :
                                                        $img = get_field('resource_type_image', $term);
                                                        $id = $img['id'];
                                                    endforeach;
                                                    echo wp_get_attachment_image($id, 'thumbnail');
                                                endif;
                                            endif;
                                        ?>
									</div>
									<h3><?php the_title(); ?></h3>
								</a>
							</li>

						<?php endforeach; ?>
					</ul>

					<?php wp_reset_postdata(); ?>

				</div>
			<?php endif; ?>

			<?php if (have_rows('single_product_reviews')) : ?>

				<div id="product-reviews" class="tab-panel">

					<?php /*
                    <div class="product-center-content">
                        <h2 class="product-section-title"><?php echo '3rd Party Product Reviews'; ?></h2>
                        <hr class="sep">
                    </div>
                    */ ?>

					<ul class="product-reviews-wrap">

						<?php while (have_rows('single_product_reviews')) : the_row();
                        
                            // Get sub-fields
                            $title = get_sub_field('single_product_reviews_review_title');
                            $link = get_sub_field('single_product_reviews_review_link');
                            $author = get_sub_field('single_product_reviews_review_author');
                            $review = get_sub_field('single_product_reviews_review');
                        
                        ?>

							<li>
								<div class="review-title">
									<h3><?php echo ($link) ? '<a href="' . $link . '" target="_blank">' : ''; ?><?php echo $title; ?><?php echo ($link) ? '</a>' : ''; ?></h3>
								</div>
								<div class="review-content">
									<?php echo preg_replace('/<p>/', '<p>' . $author . ', ', $review, 1); ?>
								</div>
							</li>

						<?php endwhile; ?>

					</ul>

				</div>

			<?php endif; ?>

			<?php
                if ($related_posts) :
            ?>

				<div id="product-related" class="tab-panel">

					<?php /*
                    <div class="product-center-content">
                        <h2 class="product-section-title"><?php echo 'Related Products'; ?></h2>
                        <hr class="sep">
                    </div>
                    */ ?>

					<ul>
						<?php foreach ($related_posts as $post) : ?>

							<?php setup_postdata($post); ?>

							<li>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php
                                    $excerpt = get_field('single_product_overview_excerpt');
                                    if ($excerpt) :
                                ?>
									<p><?php echo $excerpt; ?></p>
								<?php else : ?>
									<?php
                                        $overview = get_field('single_product_overview');
                                    ?>
                                    <p><?php echo wp_trim_words($overview, 30); ?></p>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="button button-blue">Learn More</a>
							</li>

						<?php endforeach; ?>
					</ul>

					<?php wp_reset_postdata(); ?>

				</div>

			<?php endif; ?>

			<ul class="product-footer-tabs">
				<?php if ($resource_posts) : ?>
					<li rel="product-resources">View Resources</li>
				<?php endif; ?>
				<?php if (have_rows('single_product_reviews')) : ?>
					<li rel="product-reviews">View Product Reviews</li>
				<?php endif; ?>
				<?php if ($related_posts) : ?>
					<li rel="product-related">View Related Products</li>
				<?php endif; ?>
			</ul>

		</div>
		
	</div>

</div>

<?php endif; ?>