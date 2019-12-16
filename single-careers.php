<?php
/**
 * The careers single file.
 */
get_header(); ?>
	<?php get_template_part('templates/page', 'banner'); ?>
	<div class="row">
		
		<div class="columns-10 column-center">
			<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>


<?php get_footer(); ?>
