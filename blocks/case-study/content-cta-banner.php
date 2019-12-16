<?php
/**
 * Block Name: CTA Banner
 *
 * This is the template that displays the Case Studies: CTA Banner block.
 */
?>

<?php
		$icon = get_field( 'cta_icon' );
		$blurb = get_field( 'cta_blurb' );
		$link = get_field( 'cta_link' );
		$button_label = get_field( 'cta_button_label' );
		$button_label = $button_label ? $button_label : 'Try For Free';

		if ( $icon || $blurb || $link ) :
	?>
  <div class="row case-banner">
    <div class="columns-12" >
      <div class="case-banner-img">
        <?php echo wp_get_attachment_image( $icon['id'], 'full' ); ?>
      </div>
      <div class="case-banner-blurb">
        <span><?php echo $blurb ?></span>
      </div>
      <div class="case-study-link">
        <a class="button" href="<?php echo $link ?>"><?php echo $button_label ?></a>
      </div>
    </div>
  </div>
<?php elseif ( is_admin() ) : ?>
  <div class="row" style="text-align: center; color: #888; background: #f8f8f8; font-weight: bold; width: 100%; min-height: 160px; display: flex;">
    <div class="case-banner-content" style="width: 100%; display: flex; justify-content: center; align-items: center;"><p>Add content to banner CTA banner</p></div>
  </div>
<?php endif; ?>