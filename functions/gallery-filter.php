<?php

/**
 * forge_gallery_filter function.
 * This filter overrides the default WordPress gallery to allow for fancybox JS effect on click.
 *
 * @access public
 * @param mixed $value
 * @param mixed $id
 * @param mixed $size
 * @param mixed $permalink
 * @param mixed $icon
 * @param mixed $text
 * @return void
 */
function forge_gallery_filter($value, $id, $size, $permalink, $icon, $text)
{
    $thumbnail = wp_get_attachment_image_src($id, $size);
    $larger = wp_get_attachment_image_src($id, 'full');
    $value = "<a href=''></a>";
    return "<a href='$larger[0]' class='pop-up-gallery' rel='Gallery'><img src='$thumbnail[0]' /></a>";
}
add_filter('wp_get_attachment_link', 'forge_gallery_filter', 10, 6);
