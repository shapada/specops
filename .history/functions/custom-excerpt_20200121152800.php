<?php


    /*	CUSTOM-EXCERPT.PHP

        Functions used to display custom length excerpts.


        To use the main exerpt, simply echo exerpt() with the number of words in the ().
        EXAMPLE: <?php echo exerpt(140); ?>

        To get excerpt of a ACF Field, add the field name and post ID in () as well.
        EXAMPLE: <?php echo except(140, 'biography', '88'); ?> <-- gets from post 88.
        EXAMPLE: <?php echo except(140, 'biography'); ?> <-- gets from current post.

    */

function excerpt()
{
    $args = func_get_args();
    $count = count($args);
    if ($count == 1) {
        return excerpt_main($args[0]);
    //return "1 ARG";
    } elseif ($count <= 3) {
        //return "3 ARGS " . $arg[0] . $arg[1];
        return excerpt_acf($args[0], $args[1], $args[2]);
    } else {
        return false;
    }
}

function excerpt_main($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt).'...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}

// Gets excerpt from a ACF Custom field.
function excerpt_acf($limit, $fieldName, $postID = null)
{

    // if($postID == NULL){
    // 	global $post;
    // 	$postID = $post->ID;
    // }
    if (get_field($fieldName, $postID)) {
        $excerpt = strip_tags(get_field($fieldName, $postID));
        $excerpt = explode(' ', $excerpt, $limit);
        //return $excerpt;
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt);
        } else {
            $excerpt = implode(" ", $excerpt);
        }
        $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

        return $excerpt;
    } else {
        return false;
    }
}

function forge_custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'forge_custom_excerpt_length', 999);

function forge_new_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'forge_new_excerpt_more');

function trinity_get_excerpt( $post = null, $word_limit = 20, $more = '...' ) {
	if( true !== is_a( $post, 'WP_Post' ) ) {
		$post = get_queried_object();
	}

	$excerpt = ! empty( $post->post_excerpt ) ? $post->post_excerpt : $post->post_content;

	return wp_trim_words( $excerpt, $word_limit, $more );
}
