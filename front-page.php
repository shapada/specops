<?php
/*
 *  Template Name: Home Page
 *
 *	Front page is typically a series of template parts that will differ
 *	depending the design.
 *
 *
 */

get_header(); ?>

	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('templates/home', 'hero'); ?>
		<?php the_content(); ?>
	<?php endwhile; // end of the loop.?>

<?php get_footer(); ?>
