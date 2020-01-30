<?php
/**
 * Block Name: Callout
 *
 * This is the template that displays the Docs: Callout block.
 */
?>

<div class="callout-wrapper">
  <h3><?php the_field('heading'); ?></h3>
  <?php the_field('content'); ?>

  <?php if (have_rows('link_list')) : ?>
  <ul class="link-list">
    <?php while (have_rows('link_list')) : the_row(); ?>
      <li><a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a></li>
    <?php endwhile; ?>
  </ul>
  <?php endif; ?>
</div>