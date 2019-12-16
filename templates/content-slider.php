
<?php

	$args = array(
		'post_type' => 'case-studies',
		'posts_per_page' => -1,
		'order' => 'DESC',
		'hide_empty' => false,

		);

	$second_query = new WP_Query($args);?>
	<div class="case-studies">
		<div class="row">


			<?php if($second_query->have_posts()): while($second_query->have_posts()): $second_query->the_post();?>


				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>

				<div class="columns-5 right-1">
					<img src="<?php echo $image[0]; ?> " alt="">
				</div>
				<div class="columns-5 right-1"
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<p><?php echo excerpt(20); ?></p>
					<a href="<?php the_permalink(); ?>" class="button"><?php _e('Read More', 'anvil'); ?></a></h6>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
