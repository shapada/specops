<?php
	$text_content = ! empty( get_field( 'text-content' ) ) ? get_field( 'text-content' ) : 'Create your customized security approach.';
	$button_label = ! empty( get_field( 'button-label' ) ) ? get_field( 'button-label' ) : 'Contact Us';
?>

<div class="cookie-notice-holder contact-us-sticky">
	<div class="content">
		<p>
			<?php echo esc_html( $text_content ); ?>
		</p>
	</div>
	<div class="action">
		<a href="https://specopssoft.com/contact-us" class="button">
			<?php echo esc_html( $button_label ); ?>
		</a>
	</div>
</div>
