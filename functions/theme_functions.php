<?php

// Query Functions
// ===================================================================


/**
 * get_query function.
 *
 * @param  string $post_type. The post type you'd like to pull fron, default: 'post'
 * @param  int $limit. How many results do you want, default: -1
 * @param  array/string $args. Overwrite wp_query's arg, default: ''
 * @return obj
 *
 */
function get_query($post_type = 'post', $limit = -1, $args = '')
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $defaults = array(
        'post_type' => $post_type,
        'posts_per_page' => $limit,
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'paged' => $paged
    );

    $args = wp_parse_args($args, $defaults);

    return new WP_Query($args);
}

/* return a wp_query object with random order (shortcut) */
function get_random($post_type = 'post', $limit = 1, $args = '')
{
    $default = array(
        'orderby' => 'rand'
    );
    return get_query($post_type, $limit, wp_parse_args($args, $default));
}

/* return a wp_query object with date order (shortcut) */
function get_latest($post_type = 'post', $limit = 1, $args = '')
{
    $default = array(
        'orderby' => 'date',
        'order' => 'desc'
    );
    return get_query($post_type, $limit, wp_parse_args($args, $default));
}


// IE8 Template
// ====================================================================
/**
 * no_more_ie_eight function.
 *
 * Detect the browser user agent, if it's ie 2-8, block the site
 * and show the ie8 template.
 *
 * Event 9, 10 should be auto updated, but we shouldn't block the user
 * from using the site.
 *
 */
// add_filter( 'template_include', 'no_more_ie_eight', 15);
function no_more_ie_eight($template)
{
    // important to not include 1, because ie 10 11 1121223 895340y*&@#)$*($)
    if (preg_match('/(?i)msie [2-8]/', $_SERVER['HTTP_USER_AGENT'])) {
        $template = get_query_template('ie8');
    }
    return $template;
}

function forge_get_breadcrumb()
{
    global $post;

    $trail = '';
    $page_title = get_the_title($post->ID);

    if ($post->post_parent) {
        $parent_id = $post->post_parent;

        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<span>' . get_the_title($page->ID) . '</span> | ';
            $parent_id = $page->post_parent;
        }

        $breadcrumbs = array_reverse($breadcrumbs);
        array_shift($breadcrumbs);
        foreach ($breadcrumbs as $crumb) {
            $trail .= $crumb;
        }
    }

    $trail .= $page_title;
    $trail .= '';

    return $trail;
}

function forge_slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}


function forge_get_year_archive_array($args = array())
{
    global $wpdb;

    $defaults = array(
        'type' => 'monthly', 'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1, 'order' => 'DESC',
        'post_type' => 'post', 'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);

    $sql_where = $wpdb->prepare("WHERE post_type = %s AND post_status = 'publish'", $r['post_type']);
    $where = ''; //apply_filters( 'getarchives_where', $sql_where, $r );
    $join = ''; //apply_filters( 'getarchives_join', '', $r );
    $order = strtoupper($r['order']);
    $limit = $r['limit']? ' LIMIT ' . $r['limit'] : '';

    // pirnt_r($where);

    $last_changed = wp_cache_get('last_changed', 'posts');
    if (! $last_changed) {
        $last_changed = microtime();
        wp_cache_set('last_changed', $last_changed, 'posts');
    }

    // print_r($where);

    $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date $order $limit";
    $key = md5($query);

    $key = "wp_get_archives:$key:$last_changed";
    if (! $results = wp_cache_get($key, 'posts')) {
        $results = $wpdb->get_results($query);
        wp_cache_set($key, $results, 'posts');
    }
    return $results;
}


add_action('pre_get_posts', 'forge_custom_searching_thing');
function forge_custom_searching_thing($query)
{
    if ($query->is_home() && $query->is_main_query() && !$query->is_admin()) {
        global $is_custom_search;
        $is_custom_search = false;

        if (isset($_GET['keywords']) && $_GET['keywords']) {
            $query->set('s', $_GET['keywords']);
            $is_custom_search = true;
        }

        if (isset($_GET['postdate']) && $_GET['postdate']) {
            list($y, $m) = explode('-', $_GET['postdate']);
            // $query->set('year', $y);
            // $query->set('month', $m);
            $query->set('m', $y.str_pad($m, 2, '0', STR_PAD_LEFT));
            $is_custom_search = true;
        }

        if (isset($_GET['post-tag']) && $_GET['post-tag']) {
            $query->set('tag', $_GET['post-tag']);
            $is_custom_search = true;
        }
    }
}


function forge_get_tags()
{
    // $tags = get_tags('orderby=name');
    $tags = get_field('blog_dropdown_tags', 'options');

    usort($tags, function ($a, $b) {
        return strcasecmp($a->name, $b->name);
    });

    return $tags;
}

/*
 |----------------------------------------------------------------
 | Cookie Notice HTML
 |----------------------------------------------------------------
 */
add_action('wp_footer', 'forge_add_cookie_notice');
function forge_add_cookie_notice()
{
    get_template_part('templates/cookie-notice');
}






/*
 |----------------------------------------------------------------
 | Remove filters inside classes
 |----------------------------------------------------------------
 */

/**
 * Make sure the function does not exist before defining it
 */
if (! function_exists('remove_class_filter')) {
    /**
     * Remove Class Filter Without Access to Class Object
     *
     * In order to use the core WordPress remove_filter() on a filter added with the callback
     * to a class, you either have to have access to that class object, or it has to be a call
     * to a static method.  This method allows you to remove filters with a callback to a class
     * you don't have access to.
     *
     * Works with WordPress 1.2+ (4.7+ support added 9-19-2016)
     * Updated 2-27-2017 to use internal WordPress removal for 4.7+ (to prevent PHP warnings output)
     *
     * @param string $tag         Filter to remove
     * @param string $class_name  Class name for the filter's callback
     * @param string $method_name Method name for the filter's callback
     * @param int    $priority    Priority of the filter (default 10)
     *
     * @return bool Whether the function is removed.
     */
    function remove_class_filter($tag, $class_name = '', $method_name = '', $priority = 10)
    {
        global $wp_filter;
        // Check that filter actually exists first
        if (! isset($wp_filter[ $tag ])) {
            return false;
        }
        /**
         * If filter config is an object, means we're using WordPress 4.7+ and the config is no longer
         * a simple array, rather it is an object that implements the ArrayAccess interface.
         *
         * To be backwards compatible, we set $callbacks equal to the correct array as a reference (so $wp_filter is updated)
         *
         * @see https://make.wordpress.org/core/2016/09/08/wp_hook-next-generation-actions-and-filters/
         */
        if (is_object($wp_filter[ $tag ]) && isset($wp_filter[ $tag ]->callbacks)) {
            // Create $fob object from filter tag, to use below
            $fob       = $wp_filter[ $tag ];
            $callbacks = &$wp_filter[ $tag ]->callbacks;
        } else {
            $callbacks = &$wp_filter[ $tag ];
        }
        // Exit if there aren't any callbacks for specified priority
        if (! isset($callbacks[ $priority ]) || empty($callbacks[ $priority ])) {
            return false;
        }
        // Loop through each filter for the specified priority, looking for our class & method
        foreach ((array) $callbacks[ $priority ] as $filter_id => $filter) {
            // Filter should always be an array - array( $this, 'method' ), if not goto next
            if (! isset($filter['function']) || ! is_array($filter['function'])) {
                continue;
            }
            // If first value in array is not an object, it can't be a class
            if (! is_object($filter['function'][0])) {
                continue;
            }
            // Method doesn't match the one we're looking for, goto next
            if ($filter['function'][1] !== $method_name) {
                continue;
            }
            // Method matched, now let's check the Class
            if (get_class($filter['function'][0]) === $class_name) {
                // WordPress 4.7+ use core remove_filter() since we found the class object
                if (isset($fob)) {
                    // Handles removing filter, reseting callback priority keys mid-iteration, etc.
                    $fob->remove_filter($tag, $filter['function'], $priority);
                } else {
                    // Use legacy removal process (pre 4.7)
                    unset($callbacks[ $priority ][ $filter_id ]);
                    // and if it was the only filter in that priority, unset that priority
                    if (empty($callbacks[ $priority ])) {
                        unset($callbacks[ $priority ]);
                    }
                    // and if the only filter for that tag, set the tag to an empty array
                    if (empty($callbacks)) {
                        $callbacks = array();
                    }
                    // Remove this filter from merged_filters, which specifies if filters have been sorted
                    unset($GLOBALS['merged_filters'][ $tag ]);
                }
                return true;
            }
        }
        return false;
    }
}
/**
 * Make sure the function does not exist before defining it
 */
if (! function_exists('remove_class_action')) {
    /**
     * Remove Class Action Without Access to Class Object
     *
     * In order to use the core WordPress remove_action() on an action added with the callback
     * to a class, you either have to have access to that class object, or it has to be a call
     * to a static method.  This method allows you to remove actions with a callback to a class
     * you don't have access to.
     *
     * Works with WordPress 1.2+ (4.7+ support added 9-19-2016)
     *
     * @param string $tag         Action to remove
     * @param string $class_name  Class name for the action's callback
     * @param string $method_name Method name for the action's callback
     * @param int    $priority    Priority of the action (default 10)
     *
     * @return bool               Whether the function is removed.
     */
    function remove_class_action($tag, $class_name = '', $method_name = '', $priority = 10)
    {
        remove_class_filter($tag, $class_name, $method_name, $priority);
    }
}

/**
 * Add page slug to body class
 */
add_filter('body_class', 'add_slug_body_class');

function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}


/**
 * Set language
 */
add_filter('locale', 'de_locale');
function de_locale($locale)
{
    $lang = get_post_meta(get_the_ID(), 'specops_language', true);
    if ($lang == 'de') {
        return 'de';
    }

    return $locale;
}
