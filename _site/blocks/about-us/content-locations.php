<?php
/**
 * Block Name: Locations
 *
 * This is the template that displays the About Us: Locations block.
 */
?>

<section id="locations">
  <div class="row">
    <div class="columns-12">
      <h2><?php the_field('title'); ?></h2>

        <?php if (have_rows('locations')): ?>
          <div class="locations-wrap">
            <?php while (have_rows('locations')) : the_row(); ?>
              <div class="location" style="background-image: url( '<?php the_sub_field('location_image') ?>' );">
                <div class="location-title">
                  <h3><?php the_sub_field('location_title'); ?></h3>
                </div>
                <div class="location-contact">
                  <p class="address"><?php the_sub_field('location_address'); ?></p>
                  <?php while (have_rows('location_contact')) : the_row(); ?>
                    <p class="contact"><strong><?php the_sub_field('contact_title'); ?>:</strong> <?php the_sub_field('contact_content'); ?></p>
                  <?php endwhile; ?>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>

    </div>
  </div>
</section>