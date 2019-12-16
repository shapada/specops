<?php
/**
 * Block Name: Reviews
 *
 * This is the template that displays the Case Studies: Reviews block.
 */
?>

<?php if ( have_rows( 'reviews' ) ) : ?>

	<div id="case-studies-reviews">
		<div class="row case-studies-reviews-heading">
			<div class="columns-10 column-center">
				<h2><?php the_field( 'heading' ); ?></h2>
				<?php the_field( 'content' ); ?>
			</div>
		</div>

		<div class="row">
			<div class="columns-12 case-studies-reviews-listing">
				<?php while ( have_rows( 'reviews' ) ) : the_row(); 
				
					// Get sub-fields
					$title = get_sub_field( 'review_title' );
					$link = get_sub_field( 'review_link' );
					$author = get_sub_field( 'review_author' );
					$product = get_the_title( get_sub_field( 'product', false, false ) );
					$product = preg_replace( '/[^ \w]+/', '', $product );
					$review = get_sub_field( 'review' );
				
				?>

					<div class="review">
						<span class="review-product"><?php echo $product; ?></span>
						<h3 class="review-title"><?php echo ( $link ) ? '<a href="' . $link . '" target="_blank">' : ''; ?>
							<?php echo $title; ?><?php echo ( $link ) ? '</a>' : ''; ?>
						</h3>
						<div class="review-content">
							<?php echo preg_replace( '/<p>/', '<p>' . $author . ', ', $review, 1 ); ?>
							<?php echo ( $link ) ? '<p><a href="' . $link . '" target="_blank">Read Full Review</a></p>' : '' ?>
						</div>
					</div>

				<?php endwhile; ?>
		</div>
	</div>

<?php endif; ?>