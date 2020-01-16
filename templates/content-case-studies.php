
<?php
    // WP_Query arguments
    $args = array(
        'post_type'              => array( 'case-studies' ),
        'nopaging'               => true,
        'posts_per_page'         => '-1',
    );

    // The Query
    $query = new WP_Query($args);
?>

<div id="case-studies">
	<?php if ($query->have_posts()) : $query->the_post(); ?>
		<?php
                // Get the terms related to the cast study
                $taxonomies = get_object_taxonomies('case-studies', 'objects');
                $term_list = array();
                foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
                    $terms = get_the_terms($query->post->ID, $taxonomy_slug);
                    foreach ($terms as $term) {
                        $term_name = esc_html($term->name);
                        if (strpos($term_name, 'uReset') !== false) {
                            $term_name = 'Specops uReset';
                        }
                        $term_list[] = $term_name;
                    }
                }
                $term_list = implode(', ', $term_list);

                // Grab case study thumbnail image (ACF), if none grab featured image
                $acf_img = get_field('case_study_thumbnail_image', $query->post->ID);
                $image = $acf_img ?
                                        wp_get_attachment_image($acf_img, 'about-head') :
                    wp_get_attachment_image(get_post_thumbnail_id(), 'about-head');
            ?>
			<div class="case-study-featured-wrap row">
				<div class="columns-12">
					<div class="case-study-featured">
						<div class="case-study-featured-img">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('about-head'); ?>
							</a>
						</div>
						<div class="case-study-featured-content">
							<h3 class="case-study-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<span class="case-study-categories"><?php echo $term_list; ?></span>
							<p class="case-study-excerpt"><?php the_field('intro'); ?></p>
							<a class="button" href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

	<div class="row">
		<div class="columns-12 case-study-listing">
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<?php
          // Get the terms related to the cast study
          $taxonomies = get_object_taxonomies('case-studies', 'objects');
                    $term_list = array();
                
                    foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
                        $terms = get_the_terms($query->post->ID, $taxonomy_slug);
                        if (! empty($terms)) {
                            foreach ($terms as $term) {
                                $term_name = esc_html($term->name);
                                if (strpos($term_name, 'uReset') !== false) {
                                    $term_name = 'Specops uReset';
                                }
                                $term_list[] = $term_name;
                            }
                        }
                    }
                    $term_list = implode(', ', $term_list);
                    // Grab case study thumbnail image (ACF), if none grab featured image
                    $acf_img = get_field('case_study_thumbnail_image', $query->post->ID);
                    $image = $acf_img ?
                                            wp_get_attachment_image($acf_img, 'blog-thumb') :
                                            wp_get_attachment_image(get_post_thumbnail_id(), 'blog-thumb');
                ?>
				<div class="case-study">
					<a href="<?php the_permalink(); ?>">
						<div class="case-study-img">
							<?php echo $image; ?>
						</div>
						<h3 class="case-study-title"><?php the_title(); ?></h3>
						<span class="case-study-categories"><?php echo $term_list; ?></span>
						<p class="case-study-excerpt"><?php the_field('intro'); ?></p>
					</a>
				</div>
			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		</div>
	</div>
</div>

<?php the_content(); ?>