<?php
/**
 * The file that renders a single resource item.
 **/
get_header();

get_template_part('templates/content', 'single-resource-banner');

?>
<div class="single-page-content cpt-search">
	<div class="row">
		<div class="columns-12 column-center" id="content">
			<?php
                while (have_posts()) {
                    the_post();

                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

                    if (! empty($image)): ?>
						<img src="<?php echo esc_url($image[0]); ?>" alt="">
					<?php
                    endif;

                    the_content();

                    if (get_field('form_field')): ?>
						<div class="columns-6 clearfix">
							<?php echo get_field('form_field'); ?>
						</div>
					<?php
                    endif;
                }
            ?>
		</div>
	</div>
</div>
<section class="related-articles">
	<div class="row">
		<div class="columns-12">
			<h2>
			  <?php _e('Related Resources', 'anvil'); ?>
			</h2>
			<ul class="block-grid-3">
				<?php
					$resource_topics = get_the_terms(null, 'resource-topic');

					$related_resource = new \Specops\Resources\RelatedResources();


                    $related = array(
                        'post_type' => 'resources',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post__not_in' => array( get_the_ID() ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'resource-topic',
                                'field' => 'id',
                                'terms' => wp_list_pluck($resource_term, 'term_id'),
                            ),
                        ),
                    );

					$related_resources = new WP_Query($related);

					var_dump( $related_resources );
                ?>
				<?php while ($related_resources->have_posts()): $related_resources->the_post(); ?>

					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="related-article card">
								<div class="card-header">
									<h5>
										<?php the_title(); ?>
									</h5>
								</div>
								<div class="card-body">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</a>
					</li>
				<?php endwhile; wp_reset_query(); ?>
			</ul>
		</div>
	</div>
</div>
<?php
get_footer();
