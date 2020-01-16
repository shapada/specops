<div class="callout-section" style="background-image: url(<?php the_field('callout_background_image', get_the_id()); ?>)">
		
	<div class="row">
		
		<div class="callout-wrapper columns-10 column-center">
			
			<div class="row">
				
				<div class="callout-content columns-10 column-center">
					
					<h3><?php the_field('callout_title', get_the_id()); ?></h3>

					<?php the_field('callout_text', get_the_id()); ?>

					<a class="button" href="<?php the_field('callout_button_url', get_the_id()); ?>"><?php the_field('callout_button_text', get_the_id()); ?></a>

						
				</div>
			
			</div>
			
		</div>

	</div>

</div>
