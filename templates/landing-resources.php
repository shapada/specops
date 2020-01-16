<?php if (get_field('show_resources')) : ?>

<div class="resources-section">

	<div class="row">

		<div class="resources-intro columns-6 column-center">

			<?php echo wp_get_attachment_image(get_field('resources_icon'), 'icon'); ?>

			<?php the_field('resources_intro'); ?>

		</div>

		<div class="resources-wrapper columns-8 column-center">

			<?php $posts = get_field('resources'); ?>

			<?php if ($posts) : ?>

			<ul class="resource-list">

				<?php global $post;
                foreach ($posts as $post) : setup_postdata($post); ?>

					<li>
						<div class="row">
							<?php if (get_the_post_thumbnail()) : ?>

							<?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'landing-resources'); ?>

							<style>
							.content-holder.post-id-<?php echo $post->ID; ?>.has-image:before {
								background-image: url('<?php echo $thumbnail[0]; ?>');
							}
							</style>
							<div class="image-holder columns-6">
								<?php the_post_thumbnail('landing-resources'); ?>
							</div>
							<div class="content-holder columns-6 has-image post-id-<?php echo $post->ID; ?>">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p><?php echo excerpt(25); ?></p>
								<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'anvil'); ?></a>
							</div>
							<?php else : ?>
							<div class="content-holder columns-12">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p><?php echo excerpt(25); ?></p>
								<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'anvil'); ?></a>
							</div>
							<?php endif; ?>
						</div>
					</li>

				<?php endforeach;wp_reset_postdata(); ?>

			</ul>

			<div class="resource-toggle-holder">

				<a class="button resource-toggle" href="#">
					<span class="message"><?php _e('Show Resources', 'anvil'); ?></span>
					&nbsp;<span class="triangle">&#9660;</span>
				</a>

			</div>

			<?php endif; ?>

		</div>

	</div>

</div>

<?php endif; ?>
