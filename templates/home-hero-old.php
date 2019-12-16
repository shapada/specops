<?php $bg = wp_get_attachment_image_src( get_field('hero_background') , 'full' ); ?>
<?php $image = wp_get_attachment_image_src( get_field('hero_image') , 'full' ); ?>
<div class="homepage-hero" style="background: url(<?php echo $bg[0]; ?>);">

	<div class="row">

		<div class="columns-8 ">
			<div class="hero-wrapper">
				<img class="hero-image" src="<?php echo $image[0]; ?> " alt="">
			</div>
			
		</div>
		<div class="columns-4">
			<div class="hero-content">
		
				<h2><?php the_field('hero_header'); ?></h2>
				<p><?php the_field('hero_content'); ?></p>
				<a href="<?php the_field('hero_link_1'); ?>" class="button"><?php the_field('hero_link_1_text'); ?></a>
				<a href="<?php the_field('hero_link_2'); ?>" class="button invisible"><?php the_field('hero_link_2_text'); ?></a>
		
			</div>
		</div>

	</div>

</div>
