<?php
/*
 * Template Name: Page with No Heading
 */
get_header(); ?>
		<?php get_template_part('templates/page', 'banner'); ?>
	<div class="row content-area">

		<div id="content" class="columns-12 site-content" role="main">

			<?php while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">

						<?php the_content(); ?>

					</div><!-- .entry-content -->

				</article><!-- #post-## -->


			<?php endwhile; // end of the loop.?>

		</div><!-- #content -->

		<?php //get_sidebar();?>

	</div>

<?php get_footer(); ?>
