<?php
	$site_name = get_bloginfo( 'name' );
	$current_url = get_permalink();
	$current_surl = wp_get_shortlink();
	$current_title = get_the_title();
	// $current_featured = has_post_thumbnail()? wp_get_attachment_image_url( (int) get_post_thumbnail_id(), 'fs-home-featured' ) : '';
	$current_featured = has_post_thumbnail()? wp_get_attachment_image_src( (int) get_post_thumbnail_id(), 'fs-home-featured' )[0] : '';
	$current_description = get_the_excerpt();


	// specials
	$merge_keys 	= array( '__SITE_NAME__', 	'__URL__', 		'__SURL__', 	'__TITLE__', 	'__DESCRIPTION__', 		'__FEATURED_IMAGE__' );
	$merge_texts 	= array( $site_name, 		$current_url, 	$current_surl, 	$current_title, $current_description, 	$current_featured );

	$twitter_body = strip_tags( str_replace( $merge_keys, $merge_texts, get_field('default_twitter_tweets_content', 'options') ) );
	$email_subject = str_replace( $merge_keys, $merge_texts, get_field('default_mailto_subject', 'options') );
	$email_body = str_replace( $merge_keys, $merge_texts, get_field('default_mailto_body', 'options') );
	$email_body = urlencode( $email_body );
	$email_body = str_replace( '+', '%20', $email_body );
?>
<div class="social-sharing">

	<p class="share-label"><?php printf(__('Share This %s', 'anvil'), isset($GLOBALS['share_label'])? $GLOBALS['share_label'] : 'Article'); ?></p>

	<ul class="social-sharing-list">

		<li class="twitter-share">
			<a href="<?php echo esc_attr( "https://twitter.com/home?status={$twitter_body}" ); ?>" class="ss-icon-circle ss-twitter pop"></a>
		</li>

		<li class="facebook-share">
			<a href="<?php echo esc_attr( "https://www.facebook.com/sharer/sharer.php?u={$current_url}" ); ?>" class="ss-icon-circle ss-facebook pop"></a>
		</li>

		<li class="linkedin-share">
			<a href="<?php echo esc_attr( "https://www.linkedin.com/shareArticle?mini=true&url={$current_url}&title={$current_title}&summary={$current_description}" ); ?>" class="ss-icon-circle ss-linkedin pop"></a>
		</li>

		<li class="email-share">
			<a href="<?php echo esc_attr( "mailto:?&subject={$email_subject}&body={$email_body}" ); ?>" class="ss-icon-circle ss-mail"></a>
		</li>

	</ul>
</div>
