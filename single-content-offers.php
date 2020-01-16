<?php
get_header(); the_post(); ?>

    <?php get_template_part('templates/landing', 'banner'); ?>

    <div class="row content-area">

        <div class="columns-7 main-content" role="main">

            <?php get_template_part('templates/landing', 'page'); ?>

            <?php if (get_field('content_download_file') || get_field('content_page_url')) : ?>

                <?php $buttonType = get_field('content_button_type'); ?>
                <?php if ($buttonType === 'download') : ?>

                    <a class="download button" href="<?php the_field('content_download_file'); ?>"  target="_blank" download>Read Now <span class="dl-icon"></span></a>

                <?php else: ?>

                    <a class="button" href="<?php the_field('content_page_url'); ?>" target="_blank"><?php _e('Read Now', 'anvil'); ?></a>

                <?php endif; ?>

            <?php endif; ?>

        </div><!-- #content -->

        <div class="secondary-content columns-5">

            <div class="requirements-intro">
                <?php the_field('requirements_content'); ?>
            </div>

            <?php if (get_field('requirements_checklist')) : ?>
            <div class="requirements-list">
            <span class="checklist-title"><?php the_field('requirements_checklist_title'); ?></span>
                <ul>
                    <?php while (have_rows('requirements_checklist')) : the_row(); ?>
                    <li><?php the_sub_field('list_item'); ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php endif; ?>

        </div>

    </div>

    <?php get_template_part('templates/landing', 'resources'); ?>
    <?php get_template_part('templates/landing', 'callout'); ?>

<?php get_footer(); ?>
