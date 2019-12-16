<?php
/*
 * Template Name: About Page
 */
get_header(); ?>

	<?php get_template_part( 'templates/page', 'banner' ); ?>
	<div class="about">
		<section id="story">
			<div class="row">
				<div class="columns-10 column-center">
					<h2><?php the_field( 'our_story_title' ) ?></h2>
					<?php the_field( 'our_story_content' ); ?>
				</div>
			</div>
		</section>
	<section id="people">
		<div class="row">
			<div class="columns-12">
				<?php

					$args = array(
						'post_type' => 'people',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'DESC',
						'hide_empty' => false,

						);

					$second_query = new WP_Query($args);?>

				<div class="people">
					<h2><?php _e( 'Meet Our Executives', 'anvil' ); ?></h2>
					<ul class="block-grid-3">
						<?php if ($second_query->have_posts()): while ($second_query->have_posts()): $second_query->the_post(); ?>
							<li class="person">
								<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id( ), 'about-head' ); ?>
								<div class="image-wrap">
									<?php if($image): ?>
										<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
									<?php endif; ?>
									<div class="overlay">
										<span class="button bio-button">Read Bio</span>
									</div>
								</div>
								<div class="info-wrap">
									<h3><?php the_title(); ?></h3>
									<p class="job-title"><?php the_field( 'single_person_title' ); ?></p>
								</div>

								<div class="bio-mask"></div>
								<div class="bio-modal">
									<div class="close">&times;</div>
									<?php if($image): ?>
										<div class="bio-img">
											<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
										</div>
									<?php endif; ?>
									<h3><?php the_title(); ?></h3>
									<p class="job-title"><?php the_field( 'single_person_title' ); ?></p>
									<div class="bio">
										<?php the_content(); ?>
									</div>
								</div>
							</li>
						<?php endwhile; endif; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
				</div>

			</div>

		</div>
	</section>

	<section id="partners">
		<div class="row">
			<div class="columns-12 column-center">
				<h2><?php the_field( 'partners_title' ); ?></h2>
				<?php if ( have_rows( 'partners' ) ): ?>
					<ul class="partners-logos">
						<?php while ( have_rows( 'partners' ) ) : the_row(); ?>
						
						<li>
							<?php $image = get_sub_field( 'partner_logo' ); ?>
							
							<?php if ( ! empty( $image ) ) : ?>

								<?php echo wp_get_attachment_image( $image['id'], 'medium' ); ?>

							<?php else : ?>

								<div class="image-placeholder"></div>

							<?php endif; ?>
						</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<section id="partners-callout">
		<div class="row">
			<div class="columns-12 column-center">
				<?php the_field( 'partners_content' ) ?>
				<a class="button" href="<?php the_field( 'partners_link' ); ?>"><?php the_field( 'partners_link_text' ); ?></a>
			</div>
		<div>
	</section>
	<section id="locations">
		<div class="row">
			<div class="columns-12">
				<h2><?php the_field( 'locations_title' ); ?></h2>

					<?php if ( have_rows( 'locations' ) ): ?>
						<div class="locations-wrap">
							<?php while ( have_rows( 'locations' ) ) : the_row(); ?>
								<div class="location" style="background-image: url( '<?php the_sub_field( 'location_image' ) ?>' );">
									<div class="location-title">
										<h3><?php the_sub_field( 'location_title' ); ?></h3>
									</div>
									<div class="location-contact">
										<p class="address"><?php the_sub_field( 'location_address' ); ?></p>
										<?php while ( have_rows( 'location_contact' ) ) : the_row(); ?>
											<p class="contact"><strong><?php the_sub_field( 'contact_title' ); ?>:</strong> <?php the_sub_field( 'contact_content' ); ?></p>
										<?php endwhile; ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

			</div>
		</div>
	</section>

	<section id="highlights">
		<div class="row">
			<div class="columns-12">
				<h2><?php the_field( 'highlights_title' ); ?></h2>

				<?php get_template_part( 'templates/about', 'highlights' ); ?>  
			</div>
		</div>
	</div>

<?php get_footer(); ?>
