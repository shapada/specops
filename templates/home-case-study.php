
<div class="homepage-case-study">

	<div class="row">
		 <div class="columns-6 column-center">
			<h3><?php the_field('home_case_header'); ?></h3>
		</div>
		<?php $posts = get_field('home_case_study'); ?>

		<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
       		<?php setup_postdata($post); ?>
		      <div class="columns-5 case-image-col">
		      	<?php  $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'home-case-study' ); ?>
		      	<div class="case-frame">
		     	 	<img src="<?php echo $image[0]; ?>" alt="">
		     	 	<span class="circle-1"></span>
		     	 	<span class="circle-2"></span>
		     	 	<span class="circle-3"></span>
		     	 	<span class="circle-4"></span>
		      	</div>
		      </div>
		      <div class="columns-7 case-content-col">
		      	<div class="case-content">
			      	<h4><?php the_title(); ?></h4>
			      	<p><?php echo excerpt(40); ?></p>
			      	<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'anvil'); ?></a>
		      	</div>
		      </div>
	    <?php endforeach; ?>
	</div>
	<?php wp_reset_postdata(); ?>

</div>
