<?php
/*
 * Tax support types
 */
get_header(); ?>

	<?php get_template_part('templates/page', 'banner'); ?>
	<div class="cpt-search">
		<div class="row">

				<div class="columns-4">
					<div class="sidebar-inner">
						<?php get_template_part( 'templates/content', 'resources-sidebar' ); ?>
					</div>
				</div>



			<div id="content" class="columns-8 site-content" role="main">
				<?php
					$queried_object = get_queried_object();
			   ?>
				<h2><?php echo $queried_object->name; ?></h2>
				<p><?php echo $queried_object->description; ?></p>
				<div class="row">

					<?php
					 		$termSlug = get_query_var('term');

							$termObject = get_term_by('slug', $termSlug, 'resource-types');

							$term = get_term(get_queried_object_id(),'resource-types');

							$termName = $termObject->name;
							$termID = $termObject->term_id;
							$description = $termObject->description;
							$termSlug = $termObject->slug;
							$termParent = $termObject->parent;

							$args = array(
								'post_type' => 'resources',
								'posts_per_page' => -1,
								'hide_empty' => false,
								'order' => 'ASC',
								'orderby' => 'menu_order',
								'tax_query' => array(
											array(
												'taxonomy' => 'resource-types',
												'field'    => 'slug',
												'terms'    => $termSlug,
												'operator' => 'IN'

											),
										),
								);

							$second_query = new WP_Query($args); ?>

						<?php if($second_query->have_posts()): while($second_query->have_posts()): $second_query->the_post();?>
							<div class="columns-12">
								<div class="resource">

										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
										<p><?php echo excerpt(20); ?></p>
										<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'anvil'); ?></a>

								</div>
							</div>


						<?php endwhile;endif; ?>

				</div>
			</div><!-- #content -->


		</div>
	</div>


<?php get_footer(); ?>
