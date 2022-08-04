<?php
/**
 * Vikinger Template Part - Point Item List
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_gamipress_get_user_points
 * 
 * @param array $args {
 *   @type array   $points      Points data.
 *   @type string  $modifiers   Optional. Additional class names to add to the HTML wrapper.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';

?>

<!-- POINT ITEM LIST -->
<div class="point-item-list <?php echo esc_attr($modifiers_classes); ?>">
<?php foreach ($args['points'] as $point) : ?>
  <!-- POINT ITEM -->
  <div class="point-item">
    <!-- POINT ITEM IMAGE -->
    <img class="point-item-image" src="<?php echo esc_url($point['image_url']); ?>" alt="<?php echo esc_attr($point['slug']); ?>">
    <!-- /POINT ITEM IMAGE -->

    <!-- POINT ITEM TEXT -->
    <p class="point-item-text"><?php echo esc_html($point['points']); ?></p>
    <!-- /POINT ITEM TEXT -->
  </div>
  <!-- POINT ITEM -->
<?php endforeach; ?>
</div>
<!-- /POINT ITEM LIST -->