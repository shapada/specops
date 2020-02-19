<div class="landing-banner" style="background-image: url(<?php the_field( 'banner_background' ); ?>)">
	
	<div class="row">
		
		<div class="banner-content columns-7">
			
			<h1><?php the_field( 'banner_title' ); ?></h1>

			<hr class="landing-border">

			<?php the_field( 'banner_paragraph' ); ?>

			<hr class="landing-border">

			<?php if ( get_field( 'banner_subtext' ) ) : ?>
				
			<h3><?php the_field( 'banner_subtext' ); ?></h3>

			<?php endif; ?>

		</div>

		<div class="banner-form columns-5">
			
			<div class="form-wrap">
				
				<header class="form-heading">
					
					<h2><?php the_field( 'form_title_line_one' ); ?></h2>
					
					<?php if ( get_field( 'form_title_line_two' ) ) : ?>
					<h3><?php the_field( 'form_title_line_two' ); ?></h3>
					<?php endif; ?>

				</header>

				<div class="form-body" style="background-image: url(<?php the_field( 'form_background_image' ); ?>)">
				<?php if ( get_field( 'form_shortcode' ) ) : ?>
					<?php the_field( 'form_shortcode' ); ?>
				<?php else: ?>
					<?php the_field( 'form_code' ); ?>
				<?php endif; ?>
				</div>

			</div>

		</div>

	</div>

</div>
