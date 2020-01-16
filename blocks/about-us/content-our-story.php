<?php
/**
 * Block Name: Our Story
 *
 * This is the template that displays the About Us: Our Story block.
 */
?>

<section id="story">
  <div class="row">
    <div class="columns-10 column-center">
      <h2><?php the_field('our_story_title') ?></h2>
      <?php the_field('our_story_content'); ?>
    </div>
  </div>
</section>