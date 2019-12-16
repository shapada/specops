<?php
/**
 * Block Name: Product Benefits
 *
 * This is the template that displays the Product Benefits block.
 */
?>

<?php if ( have_rows( 'product_benefits' ) ) : ?>
	<div id="product-benefits">
		<div class="row">
			<ul class="product-benefits-wrap">
				<?php while ( have_rows( 'product_benefits' ) ) : the_row(); 
					// Get sub-fields
					$icon = get_sub_field( 'product_benefit_icon' );
					$title = get_sub_field( 'product_benefit_heading' );
					$content = get_sub_field( 'product_benefit_content' );
					$more_content = get_sub_field( 'product_benefit_more_content' );
				?>
					<li id="<?php echo sanitize_title_with_dashes( $title ); ?>">
						<div class="benefit-title">
							<?php echo wp_get_attachment_image( $icon['id'], 'full' ); ?>
							<h2><?php echo $title; ?></h2>
						</div>
						<div class="benefit-content">
							<?php echo $content; ?>
							<?php if ( $more_content ) : ?>
								<?php echo '<div class="more-content">' . $more_content . '</div>'; ?>
								<a class="read-more" href="#">Read More</a>
							<?php endif; ?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>

	<div id="product-cta">
		<div class="row">
			<?php
				// Get fields
				$custom_cta = get_field( 'product_custom_cta_blurb' );
				$custom_cta_label = get_field( 'product_custom_cta_button_label' );
				$custom_cta_link = get_field( 'product_custom_cta_button_link' );
			?>
			<p><?php echo ( $custom_cta ) ? $custom_cta : 'Sound like a good fit?'; ?></p>
      <a class="button" role="button" href="<?php echo ( $custom_cta_link ) ? $custom_cta_link : get_permalink( get_page_by_path( 'contact-us' ) ); ?>">
        <?php echo ( $custom_cta_label ) ? $custom_cta_label : 'Get in Touch'; ?>
      </a>
		</div>
  </div>
<?php elseif ( is_admin() ) : ?>
  <div id="product-benefits">
  <div class="row">
			<ul class="product-benefits-wrap">
        <li id="<?php echo sanitize_title_with_dashes( $title ); ?>">
					<div class="benefit-title">
            <h2>Product Benefit</h2>
          </div>
          <div class="benefit-content">
            <p>Morbi non auctor leo, sit amet dapibus velit. In fermentum velit eget nisl vehicula egestas. Phasellus dignissim eros sollicitudin enim rutrum mollis. Aenean posuere congue lorem, quis viverra metus varius vitae. Duis porta mollis erat, nec venenatis elit dignissim ac. Curabitur vel nisi porta, ullamcorper augue a, ullamcorper nisl.</p>
          </div>
        </li>
      </ul>
		</div>
  </div>
<?php endif; ?>