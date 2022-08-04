<?php
/**
 * Vikinger Template Part - Membership Level Tag
 * 
 * @package Vikinger
 * @since 1.8.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string $name             Membership name.
 *   @type string $modifiers       Optional. Additional class names to add to the HTML wrapper.             
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';

?>

<!-- VIKINGER PMPRO LEVEL TAG -->
<div class="vikinger-pmpro-level-tag <?php echo esc_attr($modifiers_classes); ?>">
  <!-- VIKINGER PMPRO LEVEL TAG TEXT -->
  <p class="vikinger-pmpro-level-tag-text"><?php echo esc_html($args['name']); ?></p>
  <!-- /VIKINGER PMPRO LEVEL TAG TEXT -->
</div>
<!-- /VIKINGER PMPRO LEVEL TAG -->

