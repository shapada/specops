<?php
/**
 * The main template file.
 */
get_header(); ?>
	<div class="cpt-search">
		<div class="row content-area">	
		
			<div id="content" class="columns-10 column-center site-content" role="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
					
						<!-- blog page title is set in the Page Options panel -->
						<h1 class="entry-title"><?php printf(__('Search Results for: %s', 'anvil'), get_search_query()); ?></h1>
					
					</header><!-- .entry-header -->	

				</article>

			<?php if (have_posts()) : ?>

				<?php /* Start the Loop */ ?>
				<?php while (have_posts()) : the_post(); ?>

					<?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to overload this in a child theme then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('templates/content', get_post_format());
                    ?>

				<?php endwhile; ?>
				
				<?php if (function_exists('forge_page_navi')) { // if expirimental feature is active?>
					
					<?php forge_page_navi(); // use the page navi function?>
					
				<?php } else { // if it is disabled, display regular wp prev & next links?>

					<?php forge_saas_content_nav('nav-below'); ?>

				<?php } ?>

			<?php else : ?>

				<h2><?php _e('Sorry, no results were found.', 'anvil'); ?></h2>

			<?php endif; ?>

			</div><!-- #content -->


			
		</div>
	</div>


<?php get_footer(); ?>
