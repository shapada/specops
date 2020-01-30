<?php
/**
 * Block Name: Feature Partners
 *
 * This is the template that displays the feature partners.
 */
?>
<div class="feature-partners">
	<div class="row"> 
		<div class="columns-10 column-center">		
			<?php if (have_rows('feature_partners')): ?>
				<h2 class="section-title">
					<?php echo esc_html(get_field('feature_partners_heading')); ?>
				</h2>
				<?php while (have_rows('feature_partners')) : the_row(); ?>
					<div class="partner">
						<div class="row">
							<div class="columns-4 column-center partner-logo">
								<?php
                                    $image = get_sub_field('partner_logo');

                                    echo wp_get_attachment_image($image['ID'], [ '271', '138' ]);
                                ?>
							</div>
							<div class="columns-12 column-center partner-info">	
								<h4 class="technology-partner">Technology Partner</h4>										
								<h3 class="partner-title">
									<a href="<?php esc_url(the_sub_field('partner_link')); ?>">
										<?php esc_html(the_sub_field('partner_title')); ?>
									</a>
								</h3>
								<p class="partner-content">
									<?php esc_textarea(the_sub_field('partner_content')); ?>
								</p>
								<a href="<?php esc_url(the_sub_field('partner_link')) ; ?>" class="read-more" target="_blank">
									<?php esc_html(the_sub_field('partner_link_text')); ?>
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>