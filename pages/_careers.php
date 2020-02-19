<?php
/*
 * Template Name: Careers Page
 */
get_header(); ?>
	<?php get_template_part('templates/page', 'banner'); ?>
	<div class="row content-area">

		<div id="content" class="columns-12 site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/content', 'careers' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

		
	</div>
		
<?php get_footer(); ?>
