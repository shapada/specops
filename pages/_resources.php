<?php
/*
 * Template Name: Resources Page
 */
get_header(); ?>

	<?php get_template_part('templates/page', 'banner'); ?>
	<div class="cpt-search ">
		<div class="row">

				<div class="columns-4">
					<div class="sidebar-inner">
						<?php get_template_part('templates/content', 'resources-sidebar'); ?>
					</div>
				</div>



			<div id="content" class="columns-8 site-content" role="main">
				<div class="sub-title"><h4><?php _e('Latest Resources', 'anvil'); ?></h4></div>
				<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part('templates/content', 'resources'); ?>

				<?php endwhile; // end of the loop.?>

			</div><!-- #content -->


		</div>
	</div>


<?php get_footer(); ?>
