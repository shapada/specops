<?php
    /*	Theme Functions
    *
    *	Removing default woocomm styles
    *
    *
    */
    add_filter('woocommerce_enqueue_styles', '__return_false');

    /*	Theme Functions
    *
    *	Removing reviews from single prod
    *
    *
    */
    add_action('template_redirect', 'remove_product_reviews');
    function remove_product_reviews()
    {
        if (is_single()) {
            remove_action('woocommerce_product_tabs', 'woocommerce_product_reviews_tab', 20);
            remove_action('woocommerce_product_tab_panels', 'woocommerce_product_reviews_panel', 20);
        }
    }

    // add this code directly, no action needed
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

    /* remove single product sidebar */
    function woocommerce_remove_sidebar_shop()
    {
        if (is_product()) {
            remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
        }
    }
    add_action('template_redirect', 'woocommerce_remove_sidebar_shop');

    /* remove single product sidebar */
    function woocommerce_remove_sidebar_page()
    {
        if (is_page()) {
            remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
        }
    }
    add_action('template_redirect', 'woocommerce_remove_sidebar_page');

    /**
     * Removes the "Buy" button from list of products (ex. category pages).
     */
    add_action('woocommerce_after_shop_loop_item', 'forge_remove_add_to_cart_buttons', 1);
    function forge_remove_add_to_cart_buttons()
    {
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    }

    /**
     * Adds a "Read More" button on list of products (ex. category pages).
     */
    add_action('woocommerce_after_shop_loop_item', 'forge_add_more_info_buttons', 1);
    function forge_add_more_info_buttons()
    {
        add_action('woocommerce_after_shop_loop_item', 'forge_more_info_button');
    }

    function forge_more_info_button()
    {
        global $product;
        echo '<a href="' . get_permalink($product->id) . '" class="button add_to_cart_button product_type_external">'.__('Read More', 'anvil').'</a>';
    }
