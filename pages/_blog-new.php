<?php
/*
 * Template Name: New Blog Page
 */
get_header(); ?>

    <?php get_template_part('templates/page', 'banner'); ?>

    <?php /* get_template_part('templates/blog', 'search'); */ ?>

    <div class="row content-area">

        <div id="content" class="columns-12 site-content" role="main">
            
            <?php get_template_part('templates/blog', 'category-list'); ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('templates/content', get_post_format()); ?>

            <?php endwhile; ?>

            <?php forge_page_navi(); ?>

        </div><!-- #content -->

    </div>

<?php get_footer(); ?>
