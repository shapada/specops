<?php
/**
 * Block Name: Contact Info
 *
 * This is the template that displays the Contact: Contact Info block.
 */
?>

<?php if ( have_rows( 'contact_info' ) ) : ?>
  <div class="contact-info-wrap">
    <div class="row">
      <div class="columns-8 column-center grid-container">
        <ul class="block-grid-2 contact-info">
          <?php while ( have_rows( 'contact_info' ) ) : the_row(); ?>
          <li>
            <?php the_sub_field( 'info' ); ?>
            <?php if ( have_rows( 'numbers' ) ) : ?>
            <ul class="numbers">
              <?php while ( have_rows( 'numbers' ) ) : the_row(); ?>
              <li>
                <span class="label"><?php the_sub_field( 'label' ); ?></span>
                <span class="number"><?php the_sub_field( 'number' ); ?></span>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?>