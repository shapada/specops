

			<?php
		$queried_object = get_queried_object();
	   ?>
		<h5><?php _e('Search Support', 'anvil'); ?></h5>
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div>
				<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
				<input type="hidden" name="post_type" value="support" />
				<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
			</div>
		</form>

		<ul class="support-sidebar">
				<li class="contact-support-button">
					<div class="support">
						<a href="<?php the_field('contact_support_button_url', 'options'); ?>" class="button"><?php the_field('contact_support_button_text', 'options'); ?></a>
					</div>
				</li>
		<?php


				$args = array(
					'post_type' => 'support',
					'post_per_page' => -1,
					'hide_empty' => false,
					'order' => 'ASC',
					'orderby' => 'menu_order',
					);

				$terms = get_terms( 'support-types', $args); ?>

				<?php foreach($terms as $term): ?>
				<?php $link = get_term_link( $term ); ?>
					<li>
						<div class="support">
							<h5><a href="<?php echo $link; ?>" ><?php echo $term->name; ?></a></h5>
						</div>
					</li>
				<?php endforeach; ?>

		</ul>

