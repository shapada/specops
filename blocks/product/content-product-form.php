<?php
/**
 * Block Name: Product Form
 *
 * This is the template that displays the Product Form block.
 */
?>

<?php 
	$product_form = get_field( 'product_form' );
	if ( $product_form ) :
?>
	<?php
		// Get title/content fields
		$custom_form_title = get_field( 'heading' );
		$custom_form_content = get_field( 'product_form_content' );
	?>
	<div id="tryfree">
		<div class="row">
			<div class="product-center-content">
				<h2 class="product-section-title"><?php echo ( $custom_form_title ) ? $custom_form_title : 'Try it for FREE, today!'; ?></h2>
				<?php echo ( $custom_form_content ) ? $custom_form_content : '<p>Please fill in your information to start your free trial. All fields are mandatory.</p>'; ?>
				<hr class="sep">
			</div>
			<div class="product-form-wrap">
				<?php echo $product_form; ?>
			</div>
		</div>
  </div>
<?php elseif ( is_admin() ) : ?>
  <div id="tryfree" style="background: #efefef; padding: 30px; text-align: center; color: #888; font-weight: bold;">
		<div class="row">
      <div class="product-center-content""><p>Add form</p></div>
    </div>
  </div>
<?php endif; ?>