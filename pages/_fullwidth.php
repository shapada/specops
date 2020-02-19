<?php
/*
 * Template Name: Full Width
 */
get_header(); ?>

<?php get_template_part( 'templates/page', 'banner' ); ?>

		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
<?php get_footer(); ?>
