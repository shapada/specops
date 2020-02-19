<div class="row">
	<?php while (have_posts()): the_post();?>
			<?php if (get_field('form_field')): ?>
				<div class="columns-12 column-center" id="content">
					<div class="columns-6 clearfix">
			<?php else: ?>
		<div class="columns-8 column-center" id="content">
	<?php endif;?>

		<?php $terms = get_the_terms(get_queried_object(), 'resource-types');?>

		<h2><?php the_title();?></h2>

		<h6>Posted in</h6>

		<?php foreach ($terms as $term): ?>
			<?php $link = get_term_link($term);?>
			<a href="<?php echo $link; ?>" class="resource-topics" ><?php echo $term->name; ?></a>
		<?php endforeach;?>

		<?php //echo forge_saas_full_date(); ?>

		<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');?>

		<?php if ($image): ?>
		<img src="<?php echo $image[0]; ?>" alt="">
		<?php endif;?>

		<?php the_content();?>

		<?php if (get_field('is_pdf')): ?>
			<div class="pdf-wrapper">
				<a href="<?php the_field('pdf_file');?>" target="_blank" class="button"><?php _e('Download PDF', 'anvil');?></a>
			</div>
		<?php endif;?>

		<?php if (get_field('form_field')): ?>
			<div class="columns-6 clearfix">
				<?php echo get_field('form_field'); ?>
			</div>
		<?php endif;?>

	<?php endwhile;?>
</div>
<div class="back-nav-wrapper columns-12 clearfix">
<a href="<?php the_field('resource_parent', 'options');?>" class="back-to"><?php _e('Back to Resources', 'anvil');?></a>
<?php
$GLOBALS['share_label'] = 'Resource';
get_template_part('templates/social-sharing');
?>
</div>
