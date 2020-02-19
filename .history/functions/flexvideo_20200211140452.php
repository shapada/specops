<?php

/*
 * Convert all YouTube embeds (embed shortcode and autoembed)
 *
 */
function youtube_lazyload_oembed_html($html, $url, $attr, $post_id)
{
    $oembed      = _wp_oembed_get_object();
    // $oembed_provider = $oembed->get_provider( $url, $attr );
    // $oembed_html = $oembed->get_html( $url, $attr );
    $oembed_data = $oembed->get_data($url, $attr);
    if ($oembed_data) {
        $video_data = parse_video_uri($url);
        if ($video_data) {
            $oembed_data->video_id    = $video_data['id'];
            $oembed_data->provider_id = $video_data['type'];
            if ($video_data['type'] == 'youtube') {
                $oembed_data->thumbs = array(
                    'thumbnail' => 'https://img.youtube.com/vi/' . $video_data['id'] . '/default.jpg', // Default (Thumbnail)
                    'small' => 'https://img.youtube.com/vi/' . $video_data['id'] . '/mqdefault.jpg', // Medium Quality (Small)
                    'medium' => 'https://img.youtube.com/vi/' . $video_data['id'] . '/hqdefault.jpg', // High Quality (Medium)
                    'large' => 'https://img.youtube.com/vi/' . $video_data['id'] . '/sddefault.jpg', // Standard Definition (Large)
                    'full' => 'https://img.youtube.com/vi/' . $video_data['id'] . '/maxresdefault.jpg' // Maximum Resolution (Full)
                );
            }
        }
    }

    if ($oembed_data->provider_id == 'youtube') {
        $images = json_decode(file_get_contents('https://gdata.youtube.com/feeds/api/videos/' . $oembed_data->video_id . '?v=2&alt=json'), true);
        $images = $images['entry']['media$group']['media$thumbnail'];
        $image  = $images[count($images)-4]['url'];

        $maxurl = 'https://i.ytimg.com/vi/' . $oembed_data->video_id . '/maxresdefault.jpg';
        $max    = get_headers($maxurl);
        if (substr($max[0], 9, 3) !== '404') {
            $image = $maxurl;
        } else {
            $image = 'https://i.ytimg.com/vi/' . $oembed_data->video_id . '/hqdefault.jpg';
        }

        $html = <<<HTML
<div class="youtube youtube-lazyload flex-video" data-embed="{$oembed_data->video_id}"><button class="ytp-large-play-button ytp-button" aria-label="Play"><svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="palette( brand, yellow )"></path><path d="M 45,24 27,14 27,34" fill="$color-white"></path></svg></button><img src="{$image}"></div>
HTML;
    } elseif ($oembed_data->provider_id == 'vimeo') {
        $html = <<<HTML
<div class="vimeo vimeo-lazyload flex-video" data-embed="{$oembed_data->video_id}">{$oembed_data->html}</div>
HTML;
    }
    return $html;
}

if (!is_admin()) {
    add_filter('embed_oembed_html', 'youtube_lazyload_oembed_html', 99, 4);
}

/* Pull apart OEmbed video link to get thumbnails out*/
function get_video_thumbnail_uri($video_uri)
{
    $thumbnail_uri = '';

    // determine the type of video and the video id
    $video = parse_video_uri($video_uri);

    // get youtube thumbnail
    if ($video['type'] == 'youtube') {
        $thumbnail_uri = 'http://img.youtube.com/vi/' . $video['id'] . '/hqdefault.jpg';
    }

    // get vimeo thumbnail
    if ($video['type'] == 'vimeo') {
        $thumbnail_uri = get_vimeo_thumbnail_uri($video['id']);
    }

    // get wistia thumbnail
    if ($video['type'] == 'wistia') {
        $thumbnail_uri = get_wistia_thumbnail_uri($video_uri);
    }

    // get default/placeholder thumbnail
    if (empty($thumbnail_uri) || is_wp_error($thumbnail_uri)) {
        $thumbnail_uri = '';
    }

    //return thumbnail uri
    return $thumbnail_uri;
}

/* Parse the video uri/url to determine the video type/source and the video id */
function parse_video_uri($url)
{
    // Parse the url
    $parse = parse_url($url);

    // Set blank variables
    $video_type = '';
    $video_id   = '';

    // Url is http://youtu.be/xxxx
    if ($parse['host'] == 'youtu.be') {
        $video_type = 'youtube';

        $video_id = ltrim($parse['path'], '/');
    }

    // Url is http://www.youtube.com/watch?v=xxxx
    // or http://www.youtube.com/watch?feature=player_embedded&v=xxx
    // or http://www.youtube.com/embed/xxxx
    if (($parse['host'] == 'youtube.com') || ($parse['host'] == 'www.youtube.com')) {
        $video_type = 'youtube';

        parse_str(parse_url($url, PHP_URL_QUERY), $video_data);
        $video_id = $video_data['v'];
    }

    // Url is http://www.vimeo.com
    if (($parse['host'] == 'vimeo.com') || ($parse['host'] == 'www.vimeo.com')) {
        $video_type = 'vimeo';

        $video_id = ltrim($parse['path'], '/');
    }
    $host_names = explode(".", $parse['host']);
    $rebuild    = (!empty($host_names[1]) ? $host_names[1] : '') . '.' . (!empty($host_names[2]) ? $host_names[2] : '');

    // Url is an oembed url wistia.com
    if (($rebuild == 'wistia.com') || ($rebuild == 'wi.st.com') || ($rebuild == 'wistia.net')) {
        $video_type = 'wistia';

        if (strpos($parse['path'], 'medias') == 1 || strpos($parse['path'], 'embed/iframe') == 1) {
            $wistia_path_parts = explode('/', $parse['path']);
            $video_id          = end($wistia_path_parts);
        }
    }

    // If recognised type return video array
    if (!empty($video_type)) {
        $video_array = array(
            'type' => $video_type,
            'id' => $video_id
        );

        return $video_array;
    } else {
        return false;
    }
}


/* Takes a Vimeo video/clip ID and calls the Vimeo API v2 to get the large thumbnail URL.*/
function get_vimeo_thumbnail_uri($clip_id)
{
    if (empty($clip_id)) {
        return false;
    }

    $vimeo_api_uri  = 'http://vimeo.com/api/v2/video/' . $clip_id . '.php';
    $vimeo_response = wp_remote_get($vimeo_api_uri);

    if (is_wp_error($vimeo_response)) {
        return $vimeo_response;
    } else {
        $vimeo_response = unserialize($vimeo_response['body']);
        return $vimeo_response[0]['thumbnail_large'];
    }
}

/* Takes a wistia oembed url and gets the video thumbnail url. */
function get_wistia_thumbnail_uri($video_uri)
{
    if (empty($video_uri)) {
        return false;
    }

    $wistia_api_uri  = 'http://fast.wistia.com/oembed?url=' . $video_uri;
    $wistia_response = wp_remote_get($wistia_api_uri);

    if (is_wp_error($wistia_response)) {
        return $wistia_response;
    } else {
        $wistia_response = json_decode($wistia_response['body'], true);
        return $wistia_response['thumbnail_url'];
    }
}
