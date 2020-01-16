<?php
/**
* Compat template for displaying heroic knowledgebase single item content
*/
?>

<!-- #ht-kb -->
<div id="hkb" class="hkb-template-single">

<?php hkb_get_template_part('hkb-searchbox', 'single'); ?>

<?php hkb_get_template_part('hkb-breadcrumbs', 'single'); ?>

	<?php while (have_posts()) : the_post(); ?>

			<div class="hkb-entry-content">

					<h2 class="hkb-article-title"><?php the_title(); ?></h2>

					<?php hkb_get_template_part('hkb-entry-content', 'single'); ?>

					<p class="kb-author">Posted by <?php the_author(); ?> on <?php the_date(); ?></p>

					<?php hkb_get_template_part('hkb-single-attachments'); ?>

					<?php //hkb_get_template_part('hkb-single-tags');?> 

					<?php do_action('ht_kb_end_article'); ?>
					
					<?php hkb_get_template_part('hkb-single-author'); ?>

					<?php hkb_get_template_part('hkb-single-related'); ?>		

			</div>	

	<?php endwhile; // end of the loop.?>

</div><!-- /#ht-kb -->