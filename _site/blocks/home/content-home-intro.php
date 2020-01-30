<?php
/**
 * Block Name: Intro
 *
 * This is the template that displays the Home: Intro block.
 */
?>

<div class="homepage-intro">

	<div class="row">

		<div class="columns-8 column-center">
			<div class="intro-content">
		
				<h1><?php echo wptexturize(get_field('heading')); ?></h1>
				<?php the_field('content'); ?>

				<?php
                $introlink1 = get_field('first_button_link');
                    $introtext1 = get_field('first_button_label');
                    $introlink2 = get_field('second_button_link');
                    $introtext2 = get_field('second_button_label');
                ?>

				<?php if ($introlink1 && $introtext1) : ?>
					<a href="<?php echo $introlink1; ?>" class="button"><?php echo $introtext1; ?></a>
				<?php endif; ?>
				<?php if ($introlink2 && $introtext2) : ?>
					<a href="<?php echo $introlink2; ?>" class="button"><?php echo $introtext2; ?></a>
				<?php endif; ?>
		
			</div>
		</div>

	</div>

</div>