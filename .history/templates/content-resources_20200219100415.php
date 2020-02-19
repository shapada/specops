<?php

$args = array(
	'post_type' => 'resources',
	'posts_per_page' => -1,
	'order' => 'DESC',
	'hide_empty' => false,

);

$second_query = new WP_Query($args); ?>
<div class="resources">
	<?php if ($second_query->have_posts()) : while ($second_query->have_posts()) : $second_query->the_post(); ?>
			<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
			<div class="row resource">

				<div class="columns-12">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo excerpt(40); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'anvil'); ?></a>
				</div>
			</div>
	<?php endwhile;
	endif; ?>
</div>
