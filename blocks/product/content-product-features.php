<?php
/**
 * Block Name: Product Features
 *
 * This is the template that displays the Product Features block.
 */
?>

<?php 
	$features = get_field( 'product_features' );
	if ( $features ) :
?>
	<div id="product-features">
		<div class="row">
			<div class="product-center-content">
				<h2 class="product-section-title">Features</h2>
				<hr class="sep">
			</div>
			<?php $features = '<li>' . str_replace( array( "\r", "\n\n", "\n" ), array( '', "\n", "</li>\n<li>" ), trim( $features, "\n\r" ) ) . '</li>'; ?>
				<div class="product-features-wrap">
					<ul>
						<?php echo $features; ?>
					</ul>
				</div>
		</div>
  </div>
<?php elseif ( is_admin() ) : ?>
  <div id="product-features" style="background: #efefef; padding: 30px; text-align: center; color: #888; font-weight: bold;">
		<div class="row">
      <div class="product-center-content"><p>Add features</p></div>
    </div>
  </div>
<?php endif; ?>