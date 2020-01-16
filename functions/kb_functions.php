<?php

/**
 * Add Knowledge Base CSS
 */
add_action('wp_enqueue_scripts', 'kb_styles');
function kb_styles()
{
    if ((is_post_type_archive('ht_kb')) || (is_singular('ht_kb')) | (is_tax('ht_kb_category')) || (is_tax('ht_kb_tag'))) {
        wp_enqueue_style('hkb-style', plugins_url('ht-knowledge-base/css/hkb-style.css'));
        wp_enqueue_style('ti-kb', get_stylesheet_directory_uri() . '/styles/css/ti-kb.css');
    }
}

/**
 * Fix for Knowledge Base category slug
 */
add_action('init', 'new_kb_tax_args', 999);
function new_kb_tax_args()
{
    $kb_cat_args = get_taxonomy('ht_kb_category');

    $kb_cat_args->rewrite['slug'] = 'knowledge-base';
    $kb_cat_args->rewrite['with_front'] = false;

    register_taxonomy('ht_kb_category', 'ht_kb', (array) $kb_cat_args);
}

add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules');
function generate_taxonomy_rewrite_rules($wp_rewrite)
{
    $rules = array();
    $post_types = get_post_types(array( 'name' => 'ht_kb', 'public' => true, '_builtin' => false ), 'objects');
    $taxonomies = get_taxonomies(array( 'name' => 'ht_kb_category', 'public' => true, '_builtin' => false ), 'objects');
    foreach ($post_types as $post_type) {
        $post_type_name = $post_type->name; // 'developer'
      $post_type_slug = $post_type->rewrite['slug']; // 'developers'
      foreach ($taxonomies as $taxonomy) {
          if ($taxonomy->object_type[0] == $post_type_name) {
              $terms = get_categories(array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ));
              foreach ($terms as $term) {
                  $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                  $rules[$post_type_slug . '/' . $term->slug . '/page/?([0-9]{1,})/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug . '&paged=' . $wp_rewrite->preg_index(1);
              }
          }
      }
    }
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}

/**
 * Fix archive title
 */
add_filter('wp_title', 'kb_archive_title', 999, 3);
function kb_archive_title($title, $sep)
{
    if (is_post_type_archive('ht_kb')) {
        return 'Knowledge Base ' . $sep . ' ' . get_bloginfo('name');
    } elseif (is_tax('ht_kb_category')) {
        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        return  $term->name . ' | Knowledge Base ' . $sep . ' ' . get_bloginfo('name');
    }
    return $title;
}
