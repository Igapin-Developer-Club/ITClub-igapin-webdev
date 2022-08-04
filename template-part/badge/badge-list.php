<?php
/**
 * Vikinger Template Part - Badge List
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type array    $badges       Badges data.
 *   @type string   $modifiers    Optional. Additional class names to add to the HTML wrapper.
 *   @type int      $more_count   Optional. How many more badges the user has.
 *   @type string   $more_link    Optional. Link to the page that shows all the user badges.
 * }
 */

  $modifiers = isset($args['modifiers']) ? $args['modifiers'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';

?>

<!-- BADGE LIST -->
<div class="badge-list <?php echo esc_attr($modifiers_classes); ?>">
<?php foreach ($args['badges'] as $badge) : ?>
  <!-- BADGE ITEM -->
  <div class="badge-item text-tooltip-tft" data-title="<?php echo esc_attr($badge['name']); ?>">
    <img src="<?php echo esc_url($badge['image_url']); ?>" alt="badge-<?php echo esc_attr($badge['slug']); ?>">
  </div>
  <!-- /BADGE ITEM -->
<?php endforeach; ?>

<?php if (isset($args['more_count']) && $args['more_count'] > 0) : ?>
  <!-- BADGE ITEM -->
  <a class="badge-item badge-item-more" href="<?php echo esc_url($args['more_link']); ?>">
    <img src="<?php echo VIKINGER_URL; ?>/img/badge/blank-s.png" alt="badge-blank-s">
    <!-- BADGE ITEM TEXT -->
    <p class="badge-item-text">+<?php echo esc_html($args['more_count']); ?></p>
    <!-- /BADGE ITEM TEXT -->
  </a>
  <!-- /BADGE ITEM -->
<?php endif; ?>
</div>
<!-- /BADGE LIST -->