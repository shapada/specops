<?php

//BUTTON SHORTCODE
//ADD BUTTON SHORTCODE TO TINYMCE EDITOR

function forge_button( $atts ) {  
  extract(shortcode_atts(array(  
    "url" => '#',
    "text" => 'Click here'
  ), $atts));
  return '<a href="'. $url . '" class="button">'.$text.'</a>';  
}
add_shortcode("button", "forge_button");

function forge_pdf( $atts, $content = 'Download PDF' ) {  
    extract(shortcode_atts(array(  
      "url" => '#'
    ), $atts));
    return '<a href="'. $url . '" class="button" download>'.$content.'</a>';  
}
add_shortcode("pdf", "forge_pdf");
add_action('init', 'add_pdf');

function add_pdf() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') && get_user_option('rich_editing'))  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons', 'register_button');  
   }  
}

function register_button($buttons) {  
   array_push($buttons, "fs_pdf");   
   return $buttons;  
}

function add_plugin($plugin_array) {  
   $plugin_array['fs_pdf'] = get_bloginfo('template_url').'/scripts/customcodes.js';

   return $plugin_array;  
} 
