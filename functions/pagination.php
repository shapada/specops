<?php

/**
 * Pagination Functions
 */
if (! function_exists('forge_page_navi')) :

    // Numeric Page Navi (built into the theme by default)
    function forge_page_navi($before = '', $after = '', $query = '')
    {
        if ($query == '') {
            global $wpdb, $wp_query;
            $query = $wp_query;
        }
        $request = $query->request;
        $posts_per_page = intval($query->query_vars['posts_per_page']);
        $paged = intval(get_query_var('paged'));
        $numposts = $query->found_posts;
        $max_page = $query->max_num_pages;
        if ($numposts <= $posts_per_page) {
            return;
        }
        if (empty($paged) || $paged == 0) {
            $paged = 1;
        }
        $pages_to_show = 7;
        $pages_to_show_minus_1 = $pages_to_show-1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
        if ($start_page <= 0) {
            $start_page = 1;
        }
        $end_page = $paged + $half_page_end;
        if (($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if ($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if ($start_page <= 0) {
            $start_page = 1;
        }

        echo $before.'<ul class="pagination clearfix">'."";


        echo '<li class="prev" rel="prev">';
        previous_posts_link('&larr;', $query);
        echo '</li>';
        for ($i = $start_page; $i  <= $end_page; $i++) {
            if ($i == $paged) {
                echo '<li class="current"><a href="#">'.$i.'</a></li>';
            } else {
                echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
            }
        }
        echo '<li class="next" rel="next">';
        next_posts_link('&rarr;', $query->max_num_pages);
        echo '</li>';

        echo '</ul>'.$after."";
    }

endif;

if (! function_exists('forge_saas_content_nav')) :
/**
 * Display navigation to next/previous pages when applicable
 */
function forge_saas_content_nav($nav_id = '', $same_term = false, $term_name = 'category')
{
    global $wp_query, $post;

    // Don't print empty markup on single pages if there's nowhere to navigate.
    if (is_single()) {
        $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post($same_term, '', true, $term_name);
        $next = get_adjacent_post($same_term, '', false, $term_name);

        if (! $next && ! $previous) {
            return;
        }
    }

    // Don't print empty markup in archives if there's only one page.
    if ($wp_query->max_num_pages < 2 && (is_home() || is_archive() || is_search())) {
        return;
    }

    $nav_class = (is_single()) ? 'navigation-post' : 'navigation-paging'; ?>
	<nav role="navigation" id="<?php echo esc_attr($nav_id); ?>" class="<?php echo $nav_class; ?>">

	<?php if (is_single()) : // navigation links for single posts?>

		<?php previous_post_link('<div class="nav-previous left">%link</div>', '%title', $same_term, '', $term_name); ?>
		<?php next_post_link('<div class="nav-next right ">%link</div>', '%title', $same_term, '', $term_name); ?>

	<?php elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())) : // navigation links for home, archive, and search pages?>

		<?php if (get_next_posts_link()) : ?>
		<div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'forge_saas')); ?></div>
		<?php endif; ?>

		<?php if (get_previous_posts_link()) : ?>
		<div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'forge_saas')); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html($nav_id); ?> -->
	<?php
}
endif; // forge_saas_content_nav
