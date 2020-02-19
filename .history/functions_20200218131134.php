<?php

    /**
     * Forge Saas functions and definitions
     *
     * @package Anvil 2
     */

    /*
        functions.php

        Functions File for Anvil Theme.

        This is the functions file for the Anvil theme.
        It functions as an index of include files.
        The functions folder contains all functions that
        will be loaded in the functions.php file.

        Default WordPress functions are included at the top
        of the file, then includes start after.

        Each set of related functions should be contained
        in its own file, with a descriptive name. The
        file should be saved in the functions folder.

        Each function should be well commented. The start
        of each file should contain a comment that
        describes the function(s) contained.

        EXAMPLE:
    */


    /*	FUNCTION NAME
    *
    *	Short description of functions
    *
    */
    //require_once 'functions/file_name.php';


//Making jQuery to load from Google Library
function replace_jquery()
{
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '1.11.3', true);
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'replace_jquery');


function product_reload()
{
    if (is_singular('product')) { ?>
		<script>
			if (performance.navigation.type == 2) { location.reload(true); }
		</script>
	<?php
    }
}
add_action('wp_head', 'product_reload');

/**
 * Register Nav Menus
 */
register_nav_menus(array(
    'primary' => 'Primary Menu',
    'footer'  => 'Footer Menu',
    'utility' => 'Utility Menu'
));

/**
 * Register Image Sizes
 */
add_image_size('fs-home-featured', 600, 450, true);
add_image_size('fs-home-sponser', 300, 300, true);
add_image_size('landing-resources', 390, 220, true);
add_image_size('home-blog', 380, 190, true);
add_image_size('home-case-study', 330, 330, true);
add_image_size('about-head', 280, 280, true);
add_image_size('support-thumb', 270, 231, true);
add_image_size('blog-thumb', 180, 180, true);
add_image_size('blog-single-thumb', 482, 450, false);
add_image_size('icon', 75, 75, false);

add_image_size('content-offer', 250, 290, true);


/**
 * Register Sidebars
 */
function forge_widget_sidebars()
{
    register_sidebar(array(
        'name' => __('Main Sidebar'),
        'id' => 'sidebar-main',
        'description' => __('Appears on pages'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Blog Sidebar'),
        'id' => 'sidebar-blog',
        'description' => __('Appears on the blog page'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'forge_widget_sidebars');


/**
 * Enqueue Stylesheets
 */
function forge_stylesheets()
{
    // wp_enqueue_style( 'symbolset-css', get_template_directory_uri() . '/webfonts/ss-social-circle.css');
    // wp_enqueue_style( 'symbolset-css', get_template_directory_uri() . '/webfonts/ss-social-regular.css');
    //wp_enqueue_style('fancybox', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css');
    wp_enqueue_style('main-styles', get_template_directory_uri() . '/styles/css/main-style.css');
    //wp_enqueue_style( 'roboto-gfont', '//fonts.googleapis.com/css?family=Roboto:400,400italic,300,700' );
}
add_action('wp_enqueue_scripts', 'forge_stylesheets', 15);


/**
 * Enqueue Scripts
 */
function forge_scripts()
{
    wp_enqueue_script('jquery');

    // Register Scripts
    wp_enqueue_script('js-cookie', 'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js', array('jquery'), '2.1.3', true);

    // Enqueue scripts we need
    wp_enqueue_script('site_js', get_template_directory_uri().'/scripts/site-js.js', array('jquery'), '', true);
    wp_enqueue_script('site_js', get_stylesheet_directory().'/scripts/ti-foundation.js', array('jquery'), '', true);

    if (is_page_template('_support-contact-new.php')) {
        wp_enqueue_script('salesforce_js', get_template_directory_uri().'/scripts/litium-SalesForceSupportForm.js', array(), '', true);
    }

    if (is_singular('docs')) {
        wp_enqueue_script('classie_js', get_template_directory_uri().'/scripts/classie.js', array(), '', true);
        wp_enqueue_script('select_fx_js', get_template_directory_uri().'/scripts/selectFx.js', array(), '', true);
    }
}
add_action('wp_enqueue_scripts', 'forge_scripts');

// Dequeue Gutenberg block CSS since it shows on front end
add_action('wp_print_styles', 'wps_deregister_styles', 100);
function wps_deregister_styles()
{
    wp_dequeue_style('wp-block-library');
    wp_deregister_style('wp-block-library');
}


/**
 * Enqueue Admin Scripts
 */
function forge_admin_scripts()
{
    wp_enqueue_script('acf-enhance-js', get_template_directory_uri() . '/scripts/acf-enhance.js', array('jquery'), '', true);
}
add_action('admin_enqueue_scripts', 'forge_admin_scripts');






    // INCLUDES //



    /*	BUTTONS & SHORTCODES
    *
    *	Used to setup Shortcodes, and buttons
    *	for the WYSIWYG editors.
    *
    */
    require_once 'functions/buttons_and_shortcodes.php';


    /**
     *  Custom Excerpts.
     *	EXAMPLE: <?php echo exerpt(140); ?> <-regular excerpt of the_content();
     *	EXAMPLE: <?php echo except(140, 'field_name'); ?> <- excerpt of custom field 'field_name' for current post_id
     *	EXAMPLE: <?php echo except(140, 'field_name', '88'); ?> <- excerpt of custom field 'field_name' for post '88'
     */
    require_once 'functions/custom-excerpt.php';


    /**
     *  Custom Admin and login logos
     */
    require_once 'functions/custom-logos.php';



    /**
     * Load custom post types.
     * and custom taxonomies.
     */
    require_once 'functions/custom-post-types.php';



    /*	AUTOMATIC FLEXVIDEO
    *
    *	Automatically add Flex-video around iframe videos
    *
    */
    require_once 'functions/flexvideo.php';



    /*	GRAVITY FORMS PLACEHOLDERS
    *
    *	Adds placeholder option to Gravity Forms.
    *
    */
    require_once 'functions/gravity_forms.php';



    /*	OPTIONS PAGES
    *
    *	Used to register extra options pages
    *
    */
    require_once 'functions/options_pages.php';



    /*	GALLERY FUNCTIONS
    *
    *	Used for any functions related to gallery
    * 	orge_gallery_filter function.
    * 	This filter overrides the default WordPress gallery to allow for fancybox JS effect on click.
    *
    */
    require_once 'functions/gallery-filter.php';



    /*	Theme Support
    *
    *	Used to add theme support for
    *	required functionality ( add_theme_support() )
    *
    */
    require_once 'functions/theme_support.php';



    /*	Pagination Functions
    *
    *	Functions pertaining to Pagination
    *
    *	forge_page_navi($before = '', $after = '', $query = '')
    *
    *	forge_saas_content_nav( $nav_id )
    *
    */
    require_once 'functions/pagination.php';





    /*	Forge WP Title
    *
    *	Filters wp_title to print a neat <title> tag based on what is being viewed.
    *
    *	forge_saas_wp_title( $title, $sep )
    *
    */
    require_once 'functions/forge_wp_title.php';


    /*	Forge Terms
    *
    *	Functions related to listing taxonomy terms
    *
    * 	1. List terms related to a post
    *	forge_list_terms($taxonomy, $format = "link", $postID = NULL )
    *
    *	2. List terms from a taxonomy
    *	function forge_taxonomy_terms($taxonomy, $format = "link")
    *
    *
    */
    require_once 'functions/forge_terms.php';



    /*	Blog Functions
    *
    *	Functions related to Blog posts (comments, post meta, etc)
    *
    * 	1. Used as a callback by wp_list_comments() for displaying the comments.
    *	forge_saas_comment( $comment, $args, $depth )
    *
    *	2. Prints HTML with meta information for the current post-date/time and author.
    *	forge_saas_posted_on()
    *
    *
    */
    require_once 'functions/blog_functions.php';



    /*	Theme Functions
    *
    *	Functions related to this theme
    *
    * 	1. shortcut for getting queries
    *
    *
    */
    require_once 'functions/theme_functions.php';

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' 	=> 'Banner Settings',
            'menu_title'	=> 'Banners',
            'menu_slug' 	=> 'banner-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
    }


/**
 * Script enqueues for specific pages
 */
add_action('wp_enqueue_scripts', 'single_product_enqueue_scripts');
function single_product_enqueue_scripts()
{
    if (is_singular('product')) {
        wp_enqueue_script('product', get_stylesheet_directory_uri() . '/scripts/product.js', array('jquery'), '', true);
    }
    if (is_page_template('pages/_careers.php')) {
        wp_enqueue_script('product', get_stylesheet_directory_uri() . '/scripts/careers.js', array('jquery'), '', true);
    }
    if (is_page_template('pages/_pillar-page.php')) {
        wp_enqueue_style('pillar', get_template_directory_uri() . '/styles/css/ti-pillar.css', array(), '1.0');
        wp_enqueue_style('merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300i,400i');
        wp_enqueue_script('pillar', get_stylesheet_directory_uri() . '/scripts/ti-pillar.js', array('jquery'), '', true);
	}

	if ( 'resources' === get_post_type() && has_term( 'datasheets', 'resource-types' ) ) {
		wp_enqueue_style( 'tablesaw-css', get_stylesheet_directory_uri() . '/scripts/vendor/tablesaw/tablesaw.stackonly.css' );
	 	wp_enqueue_script( 'tablesaw-stackonly', get_stylesheet_directory_uri() . '/scripts/vendor/tablesaw/tablesaw.stackonly.js' );
	 	wp_enqueue_script( 'tablesaw-init', get_stylesheet_directory_uri() . '/scripts/vendor/tablesaw/tablesaw-init.js', [ 'tablesaw-stackonly' ] );
	}
}


/**
 * Search functions
 */

require_once 'functions/search_functions.php';


/**
 * Knowledge Base functions
 */
require_once 'functions/kb_functions.php';


/**
 * Change reset password email to work on WP Engine
 */
add_filter('retrieve_password_message', 'ti_forgot_email_message', 10, 2) ;

function ti_forgot_email_message($message, $key)
{
    $user_data = '';
    // If no value is posted, return false
    if (! isset($_POST['user_login'])) {
        return '';
    }
    // Fetch user information from user_login
    if (strpos($_POST['user_login'], '@')) {
        $user_data = get_user_by('email', trim($_POST['user_login']));
    } else {
        $login = trim($_POST['user_login']);
        $user_data = get_user_by('login', $login);
    }
    if (! $user_data) {
        return '';
    }
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;

    $site_url = get_site_url();
    $reset_url = network_site_url('wp-login.php?action=rp&key=' . $key . '&login=' . rawurlencode($user_login), 'login');

    return $message . ' (' . $reset_url . ')';
}

/**
 * Adjustments to the reset password form
 */
//add_filter('random_password', 'ti_disable_random_password', 10, 2);

function ti_disable_random_password($password)
{
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ('wp-login.php' === $GLOBALS['pagenow'] && ('rp' == $action  || 'resetpass' == $action)) {
        return '';
    }
    return $password;
}

add_action('resetpass_form', function ($user) { ?>
	<p class="user-ti-pass2-wrap">
        <label for="ti-pass2"><?php _e('Confirm new password') ?></label><br />
        <input type="password" name="ti-pass2" id="ti-pass2" class="input"
               size="20" value="" autocomplete="off" />
    </p> <?php
});

add_action('validate_password_reset', function ($errors) {
    if (isset($_POST['pass1']) && $_POST['pass1'] != $_POST['ti-pass2']) {
        $errors->add('password_reset_mismatch', __('The passwords do not match.'));
    }
});

add_action('login_enqueue_scripts', function () {
    if (! wp_script_is('jquery', 'done')) {
        wp_enqueue_script('jquery');
    }
    wp_add_inline_script('jquery-migrate', 'jQuery(document).ready(function(){ jQuery( "#pass1" ).data( "reveal", 0 ); jQuery( "#resetpassform .clear" ).hide(); jQuery( ".pw-weak" ).remove(); });');
}, 1);

add_filter('password_hint', function ($hint) {
    return '';
});

/**
 * Diable comments for media
 */
add_filter('comments_open', 'filter_media_comment_status', 10, 2);
function filter_media_comment_status($open, $post_id)
{
    $post = get_post($post_id);
    if ($post->post_type == 'attachment') {
        return false;
    }
    return $open;
}


/**
 * Don't index thank you pages
 */
add_action('save_post', 'set_noindex_nofollow');
function set_noindex_nofollow($post_id)
{
    if (wp_is_post_revision($post_id)) {
        return;
    }

    if (strpos(get_page_template_slug($post_id), 'thank-you') !== false) {
        add_action('wpseo_saved_postdata', function () use ($post_id) {
            update_post_meta($post_id, '_yoast_wpseo_meta-robots-noindex', '1');
            update_post_meta($post_id, '_yoast_wpseo_meta-robots-nofollow', '1');
        }, 999);
    } else {
        return;
    }
}


/**
 * Dequeue FacetWP conditional logic on non-search pages
 */
add_action('wp_head', 'ti_remove_facetwp', 999);

function ti_remove_facetwp()
{
    if (! is_page('search-results')) {
        remove_class_action('wp_footer', 'FacetWP_Conditional_Logic_Addon', 'render_assets');
    }
}

/**
 * Enqueue prism.js when Enlighter is in the content
 */
add_action('the_posts', 'ti_check_for_prism');

function ti_check_for_prism($posts)
{
    if (empty($posts)) {
        return $posts;
    }

    // false because we have to search through the posts first
    $found = false;

    // search through each post
    foreach ($posts as $post) {
        // check the post content for the short code
        if (stripos($post->post_content, 'EnlighterJSRAW')) {
            // we have found a post with the short code
            $found = true;
        }
        // stop the search
        break;
    }

    if ($found) {
        wp_enqueue_script('prism', get_template_directory_uri() . '/scripts/prism.js', array(), '1.15.0', true);
        wp_enqueue_style('prism', get_template_directory_uri() . '/styles/css/prism.css', array(), '1.15.0');
    }
    return $posts;
}

add_filter('script_loader_tag', 'ti_modify_prism_tag', 10, 3);

function ti_modify_prism_tag($tag, $handle, $src)
{
    if ('prism' === $handle) {
        $tag = '<script type="text/javascript" src="' . $src . '" data-manual></script>';
    }
    return $tag;
}

/**
 * Soil support
 * */
add_theme_support('soil-clean-up');
add_theme_support('soil-disable-rest-api');
add_theme_support('soil-disable-asset-versioning');
add_theme_support('soil-disable-trackbacks');

/**
 * Gutenberg blocks
 */
require_once 'functions/blocks.php';
