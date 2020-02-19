
<div class="homepage-intro">

	<div class="row">

		<div class="columns-8 column-center">
			<div class="intro-content">
		
				<h1><?php echo wptexturize(get_field('home_intro_header')); ?></h1>
				<p><?php echo wptexturize(get_field('home_intro_content')); ?></p>

				<?php

					$introlink1 = get_field('home_intro_link');
					$introtext1 = get_field('home_intro_link_text');
					$introlink2 = get_field('home_intro_link_2');
					$introtext2 = get_field('home_intro_link_2_text');

				?>

				<?php if ( $introlink1 && $introtext1 ) : ?>
					<a href="<?php echo $introlink1; ?>" class="button"><?php echo $introtext1; ?></a>
				<?php endif; ?>
				<?php if ( $introlink2 && $introtext2 ) : ?>
					<a href="<?php echo $introlink2; ?>" class="button"><?php echo $introtext2; ?></a>
				<?php endif; ?>
		
			</div>
		</div>

	</div>

</div>
