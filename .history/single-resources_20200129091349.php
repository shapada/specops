<?php
/**
 * The file that renders a single resource item.
 **/
get_header();

//get_template_part('templates/content', 'single-resource-banner');
<?php get_template_part('templates/page', 'banner'); ?>

include_once( get_template_directory() . '/functions/related-resources.php' );

?>
<div class="single-page-content cpt-search">
	<div class="row">
		<div class="columns-12 column-center" id="content">
			<?php
                while ( have_posts() ) {
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
			<?php
				$resource_topics = get_the_terms( null, 'resource-topic' );
				$resource_topics_ids = wp_list_pluck( $resource_topics, 'term_id' );

				$related_resources = new RelatedResources( get_the_ID(), $resource_topics_ids, 'Related Resources' );

				$related_resources->render();
			?>
		</div>
	</div>
</div>
<?php
get_footer();
