<?php
/**
 * The case study single file.
 */
get_header(); ?>

<?php get_template_part('templates/page', 'banner'); ?>

<div id="case-study">

	<div class="single-case-image">
		<?php the_post_thumbnail( 'about-head' ); ?>
	</div>

	<div class="row">
		<div class="columns-12 case-study-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>
