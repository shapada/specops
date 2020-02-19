<?php
/*
 * Template Name: Partners Page
 */
get_header(); ?>

	<?php get_template_part('templates/page', 'banner'); ?>
	<div class="partners">
		<div class="row">
			<div class="columns-12">
			
			

					<?php if( have_rows('partners') ): ?>
						<?php while ( have_rows('partners') ) : the_row(); ?>
							<div class="partners">
								<div class="row">
								
									<div class="columns-8 column-center">											
										<h5><a href="<?php the_sub_field('partner_link'); ?>"><?php the_sub_field('partner_title'); ?></a></h5>
										<p><?php the_sub_field('partner_content') ?></p>
										<a href="<?php the_sub_field('partner_link'); ?>" class="read-more" target="_blank"><?php the_sub_field('partner_link_text'); ?></a>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
					
					
				
			</div>
		</div>
		
		
	</div>
		
<?php get_footer(); ?>		
