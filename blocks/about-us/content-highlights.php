<?php
/**
 * Block Name: Highlights
 *
 * This is the template that displays the About Us: Highlights block.
 */
?>

<section id="highlights">
  <div class="row">
    <div class="columns-12">
      <h2><?php the_field('heading'); ?></h2>
      
      <?php

        $i = 0;

        if (have_rows('highlights')) : ?>
          <div class="years-wrap">
          <?php while (have_rows('highlights')) : the_row(); $i++ ?>

            <?php if ($i == 3) : ?>
            <div class="show-more"><span class="show-more-button">Show More Highlights</span></div>
              <div class="more-highlights">
            <?php endif; ?>
            <div>
              <h3><?php the_sub_field('year'); ?></h3>
              <?php if (have_rows('highlights_points')) : ?>
                <ul>
                <?php while (have_rows('highlights_points')) : the_row(); ?>
                  <li>
                    <?php the_sub_field('highlight'); ?>
                  </li>
                <?php endwhile; ?>
                </ul>
              <?php endif; ?>
            </div>

          <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>