<?php
/*
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( get_field( 'content_section_title' ) ) : ?>

	<header class="entry-header">
		
		<h1 class="entry-title"><?php the_field( 'content_section_title' ); ?></h1>
	
	</header><!-- .entry-header -->

	<?php endif; ?>

	<div class="entry-content">
	
		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
