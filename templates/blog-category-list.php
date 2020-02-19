<?php
	global $is_custom_search;
	if( $is_custom_search ) return; // not on serach page
?>

<?php $categories = get_terms( 'category', 'hide_empty=0' ); ?>
<div class="blog-categories">
	<span class="ti-category-label">Categories<span class="ti-hide-mobile">:</span>
		<span class="burger-trigger">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</span>
	<ul class="blog-category-lists">
		<li class="all"><a href="<?php echo get_permalink(12); ?>" class="<?php echo $current;?>"><?php _e('Show All', 'anvil'); ?></a></li>
		<?php foreach ($categories as $category): ?>
			<?php $link = get_term_link($category); ?>
			<?php $current = $category->term_id == get_queried_object()->term_id? 'active' : ''; ?>
			<?php $catID = $category->term_id; ?>
			<?php if($catID == 318):  ?>
				<li><a href="<?php echo $link; ?>" class="<?php echo $current;?>"><?php echo $category->description; ?></a></li>
			<?php else: ?>
				<li><a href="<?php echo $link; ?>" class="<?php echo $current;?>"><?php echo $category->name; ?></a></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</div>
