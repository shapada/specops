
		<div class="row" style="">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php if(get_field('form_field')) : ?>
						<div class="columns-12 column-center" id="content">
							<div class="columns-6 clearfix">
					<?php else: ?>
						<div class="columns-8 column-center" id="content">
					<?php endif; ?>

					<?php $terms = get_the_terms(get_queried_object(), 'resource-types');  ?>

					<h2><?php the_title(); ?></h2>

					<h6>Posted in</h6>

					<?php foreach ($terms as $term): ?>
						<?php $link = get_term_link($term); ?>
						<a href="<?php echo $link; ?>" class="resource-topics" ><?php echo $term->name; ?></a>
					<?php endforeach; ?>

					<?php //echo forge_saas_full_date(); ?>

					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>

					<?php if ($image) : ?>
					<img src="<?php echo $image[0]; ?>" alt="">
					<?php endif; ?>

                    <?php the_content(); ?>

					<?php if(get_field('is_pdf')): ?>
						<div class="pdf-wrapper">
							<a href="<?php the_field('pdf_file'); ?>" target="_blank" class="button"><?php _e('Download PDF', 'anvil'); ?></a>
						</div>
					<?php endif; ?>

					<?php if(get_field('form_field')) : ?>
						</div>
                        <div class="columns-6 clearfix">
                            <?php echo get_field('form_field'); ?>
                        </div>
                    <?php endif; ?>



				<?php endwhile; ?>


			</div>
            <div class="back-nav-wrapper columns-12 clearfix">
                <a href="<?php the_field('resource_parent', 'options'); ?>" class="back-to"><?php _e('Back to Resources', 'anvil'); ?></a>
				<?php
				$GLOBALS['share_label'] = 'Resource';
				get_template_part( 'templates/social-sharing' );
				?>
            </div>

		</div>

		<div class="realted-article">

			<div class="row">

				<div class="columns-12">

					<h2><?php _e('Related Resources', 'anvil'); ?></h2>

					<ul class="block-grid-3">

						<?php
							$resource_term = get_the_terms(null, 'resource-topics'); 

							// print_r($resource_term);

							$related = array(
								'post_type' => 'resources',
								'posts_per_page' => 3,
								'orderby' => 'date',
								'order' => 'DESC',
								'post__not_in' => array(get_the_ID()),
								'tax_query' => array(
									array(
										'taxonomy' => 'resource-topics',
										'field' => 'id',
										'terms' => wp_list_pluck($resource_term, 'term_id'),
									),
								),
							);
							$related_resources = new WP_Query($related);
						?>

						<?php while($related_resources->have_posts()): $related_resources->the_post(); ?>

							<li>

								<div class="blog-wrap">

									<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

									<?php the_excerpt(); ?>

									<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'anvil'); ?></a>

								</div>

							</li>

						<?php endwhile; wp_reset_query(); ?>

					</ul>

				</div>

			</div>

		</div>