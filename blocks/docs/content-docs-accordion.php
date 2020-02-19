<?php
/**
 * Block Name: Accordion
 *
 * This is the template that displays the Docs: Accordion block.
 */
?>

<?php if ( have_rows( 'accordion' ) ) : ?>
<p class="search-page-wrap"><span class="search-input-wrap"><input value="" placeholder="Search this content" type="search" class="search-page"></span><span class="ti-counter"></span></p>
<div class="accordion">
<?php while ( have_rows( 'accordion' ) ) : the_row(); ?>
  <?php $heading = get_sub_field( 'heading' ); ?>
  <section>
    <h5 name="<?php echo sanitize_title( $heading ); ?>" class="title"><?php echo $heading; ?></h5>
    <div class="content"><?php the_sub_field( 'content' ); ?></div>
  </section>
<?php endwhile; ?>
</div>
<?php endif; ?>
