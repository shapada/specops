<?php
/*
 * Template Name: Custom Post Type Query
 */
get_header(); ?>

	<div class="row content-area">

		<div id="content" class="columns-8 site-content" role="main">

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('templates/content', 'page'); ?>

			<?php endwhile; // end of the loop.?>

			<?php
                /*
                    This is starter template for doing multi-column templates. Change the query paramenters below to query different posts.
                    Alter the loop structure for different column sizes.
                */
                /* for get_query parameters, see functions/theme_functions.php, line 16) */
                $second_query = get_query('services', 2);
                if ($second_query->have_posts()): while ($second_query->have_posts()): $second_query->the_post();
            ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

					<div class="row">

						<div class="columns-4 ">
						
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium')?></a>
						
						</div>

						<div class="columns-8">
							
							<header class="entry-header">
								
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								
							</header><!-- .entry-header -->
						
							<div class="entry-content">
							
								<p><?php echo excerpt(40); ?>
								
								<a href="<?php the_permalink(); ?>">Read More</a>
								</p>
							</div><!-- .entry-content -->
						
							<?php edit_post_link(__('Edit', 'forge_saas'), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>'); ?>

						</div>

					</div>
					
				</article><!-- #post-## -->


			<?php endwhile;  ?>

			<?php if (function_exists('forge_page_navi')) { // if expirimental feature is active?>
				<?php forge_page_navi('', '', $second_query); // use the page navi function?>
				
			<?php } else { // if it is disabled, display regular wp prev & next links?>

				<?php forge_saas_content_nav('nav-below'); ?>

			<?php } ?>

			<?php endif; wp_reset_postdata(); ?>

		</div><!-- #content -->

		<?php get_sidebar(); ?>

	</div>
		
<?php get_footer(); ?>
