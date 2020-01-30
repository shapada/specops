<?php
/**
 * Block Name: Organization and Results
 *
 * This is the template that displays the Case Studies: Organization and Results block.
 */
?>

<?php
  $organization = get_field('organization_country');
  $results = get_field('goals_results');

  if ($organization || $results) :
?>
<div class="row">
  <div class="case-info-wrapper">
    <?php if ($organization) : ?>
      <div class="case-study-organization-country">
        <?php echo $organization; ?>
      </div>
    <?php endif; ?>
    <?php if ($results) : ?>
      <div class="case-study-goals-results">
      <?php echo $results; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php elseif (is_admin()) : ?>
  <div class="row" style="text-align: center; color: #888; background: #f8f8f8; font-weight: bold; width: 100%; min-height: 160px; display: flex;">
    <div class="case-banner-content" style="width: 100%; display: flex; justify-content: center; align-items: center;"><p>Add content to Organization and Results</p></div>
  </div>
<?php endif; ?>