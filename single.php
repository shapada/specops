<?php
/**
 * The main template file.
 */
get_header(); ?>
		
	<div class="row content-area">	

		<div id="content" class="columns-8 site-content" role="main">

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
			<nav class="post-nav">
			<?php forge_saas_content_nav('nav-below'); ?>
			</nav>
			<?php
                
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }

            ?>



		</div><!-- #content -->

		<?php get_sidebar(); ?>
		
	</div>


<?php get_footer(); ?>
