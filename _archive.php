<?php
/**
 * The template for displaying Archive pages.
 */
get_header(); ?>
		<?php get_template_part('templates/page', 'banner'); ?>
	<div class="row content-area">

		<div id="content" class="columns-12 site-content" role="main">
			<?php

            $args = array(
                'hide_empty' => false

                );

            ?>

			<?php /*
            <div class="row">

                <div class="columns-8 column-center blog-search">

                    <h2><?php _e('Search the Blog', 'anvil'); ?></h2>
                    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div>
                            <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
                            <input type="hidden" name="post_type" value="post" />
                            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search for a blog post..."/>
                            <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
                        </div>
                    </form>

                </div>

            </div>
            */ ?>

			<ul class="block-grid-4 category-list">
				<li><a href="<?php echo get_permalink(12); ?>" class="button"><?php _e('All', 'anvil'); ?></a></li>
				<?php $categories = get_terms('category', $args); ?>
				<?php foreach ($categories as $category): ?>
					<?php $link = get_term_link($category); ?>
					<?php $current = $category->term_id == get_queried_object()->term_id? 'active' : ''; ?>

					<li><a href="<?php echo $link; ?>" class="button  <?php echo $current;?>"><?php echo $category->name; ?></a></li>
				<?php endforeach; ?>
			</ul>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">

					<h1 class="entry-title">

						<?php
                        if (is_category()) :
                            printf(__('%s'), '<span>' . single_cat_title('', false) . '</span>');

                        elseif (is_tag()) :
                            printf(__('%s'), '<span>' . single_tag_title('', false) . '</span>');

                        elseif (is_author()) :
                            /* Queue the first post, that way we know
                             * what author we're dealing with (if that is the case).
                            */
                            the_post();
                            printf(__('%s', 'forge_saas'), '<span class="vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author()) . '" rel="me">' . get_the_author() . '</a></span>');
                            /* Since we called the_post() above, we need to
                             * rewind the loop back to the beginning that way
                             * we can run the loop properly, in full.
                             */
                            rewind_posts();

                        elseif (is_day()) :
                            printf(__('%s'), '<span>' . get_the_date() . '</span>');

                        elseif (is_month()) :
                            printf(__('%s'), '<span>' . get_the_date('F Y') . '</span>');

                        elseif (is_year()) :
                            printf(__('%s'), '<span>' . get_the_date('Y') . '</span>');

                        else :
                            _e('');

                        endif;
                        ?>

					</h1>

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

			<?php //get_template_part( 'no-results', 'index' );?>

		<?php endif; ?>

		</div><!-- #content -->


	</div>


<?php get_footer(); ?>
