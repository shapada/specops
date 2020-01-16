

<?php

    $args = array(
        'post_type' => 'support',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'hide_empty' => false,

        );

    $second_query = new WP_Query($args);?>
	<div class="supports">



			<?php if ($second_query->have_posts()): while ($second_query->have_posts()): $second_query->the_post();?>


				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
				<div class="row">

					<div class="columns-12">
						<div class="support">
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<p><?php echo excerpt(40); ?></p>
							<a href="<?php the_permalink(); ?>"><?php _e('Read More', 'anvil'); ?></a></h6>
						</div>
					</div>
				</div>
			<?php endwhile; endif; ?>

	</div>
