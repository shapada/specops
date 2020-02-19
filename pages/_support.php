<?php
/*
 * Template Name: Support Page
 */
get_header(); ?>

	<?php get_template_part('templates/page', 'banner'); ?>

		<div class="row">

			<div id="content" class="columns-10 column-center site-content" role="main">
				<div class="sub-title"><h4><?php _e('Latest Support', 'anvil'); ?></h4></div>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'templates/content', 'support' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->


		</div>



<?php get_footer(); ?>
