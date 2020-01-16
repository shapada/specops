<?php
/*
 * Template Name: Case Studies Page
 */
get_header(); ?>
	<?php get_template_part('templates/page', 'banner'); ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('templates/content', 'case-studies'); ?>

			<?php endwhile; // end of the loop.?>
		
<?php get_footer(); ?>
