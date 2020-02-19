

			<?php
		$queried_object = get_queried_object();
	   ?>
		<h5><?php _e('Search Resources', 'anvil'); ?></h5>
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div>
				<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
				<input type="hidden" name="post_type" value="resources" />
				<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
			</div>
		</form>

		<ul class="resource-sidebar">
			<li>
				<h5><a href="<?php the_field('resource_parent', 'options'); ?>"><?php _e('View All', 'anvil'); ?></a></h5>
			</li>

		<?php


				$args = array(
					'post_type' => 'resources',
					'post_per_page' => -1,
					'hide_empty' => false,
					'order' => 'ASC',
					'orderby' => 'menu_order',
					);

				$terms = get_terms( 'resource-types', $args); ?>

				<?php foreach($terms as $term): ?>
				<?php $link = get_term_link( $term ); ?>
					<li>

							<h5><a href="<?php echo $link; ?>" ><?php echo $term->name; ?></a></h5>

					</li>
				<?php endforeach; ?>


		</ul>

