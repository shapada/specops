<?php

//used for listing terms related to a post
function forge_list_terms($taxonomy, $format = "link", $postID = null)
{
    if ($postID == null) {
        $postID = $post->ID;
    }
    $terms = get_the_terms($postID, $taxonomy);
    if ($terms && ! is_wp_error($terms)) {
        $term_output = array();
    
        foreach ($terms as $term) {
            if ($format == 'name') {
                $term_output[] =  $term->name;
            } elseif ($format == 'link') {
                $term_output[] = "<a href='".get_term_link($term->slug, $taxonomy)."' class='term-link'>".$term->name."</a>";
            } else {
                $term_output[0] = "The format provided is not supported. ";
            }
        }
                            
        $theTerms = join(", ", $term_output);
    }
    return 	$theTerms;
}


//used for listing terms from a taxonomy
function forge_taxonomy_terms($taxonomy, $format = "link")
{
    $terms = get_terms($taxonomy);
    if ($terms && ! is_wp_error($terms)) {
        $term_output = array();
        $theTax = "";
        foreach ($terms as $term) {
            if ($format == 'name') {
                $term_output[] =  $term->name;
            } elseif ($format == 'link') {
                $term_output[] = "<a href='".get_term_link($term->slug, $taxonomy)."' class='term-link'>".$term->name."</a>";
            } elseif ($format == 'checkbox') {
                $checked = '';
                if (!empty($_GET[$term->taxonomy])) {
                    foreach ((array) $_GET[$term->taxonomy] as $category_id) {
                        if ($category_id == $term->term_id) {
                            $checked = 'checked="checked"';
                        } // end of if statement
                    } // end of foreach
                } // end of if statement

                $term_output[] = '<label for="'. $term->taxonomy .'_' . $term->term_id . '"><input type="checkbox" name="'. $term->taxonomy .'[]" id="'.$term->taxonomy .'_' . $term->term_id . '" value="' . $term->term_id . '" '. $checked .' >&nbsp;' . $term->name . '</label>';
            } elseif ($format == 'dropdown') {
                $term_output[] = '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                $theTax = $term->taxonomy;
            } else {
                $term_output[0] = "The format provided is not supported. ";
            }
        }


        if ($format == 'checkbox') {
            $theTerms = join(" ", $term_output);
        } elseif ($format == 'dropdown') {
            $theTerms = "<select name='".$theTax."'><option>Please select one</option>".join("", $term_output)."</select>";
        } else {
            $theTerms = join(", ", $term_output);
        }
    }
    return 	$theTerms;
}
