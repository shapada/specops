<?php
/**
 * Block Name: Contact Support
 *
 * This is the template that displays the Contact: Contact Support block.
 */
?>

<div class="support-redirect">
  <?php the_field( 'content' ); ?>
  <div class="support-button-wrapper">
    <a href="<?php the_field( 'button_link' ); ?>" class="button"><?php the_field( 'button_label' ); ?></a>
  </div>
</div>