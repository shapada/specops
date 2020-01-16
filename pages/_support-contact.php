<?php
/*
 * Template Name: Support Contact Page
 */
get_header(); ?>
<?php get_template_part('templates/page', 'banner'); ?>
	<div class="row content-area">

		<div id="content" class="columns-10 column-center site-content" role="main">

			<?php while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop.?>

		</div><!-- #content -->

		
		

	</div>
		
<?php get_footer(); ?>
