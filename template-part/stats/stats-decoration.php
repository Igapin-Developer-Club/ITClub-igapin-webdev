<?php
/**
 * Vikinger Template Part - Stats Decoration
 * 
 * @package Vikinger
 * @since 1.3.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string       $description      Stat description.
 *   @type string       $value            Stat value.
 *   @type string       $icon             Stat icon.
 *   @type string       $modifiers        Optional. Additional class names to add to the HTML wrapper.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;
  $modifiers_classes  = $modifiers ? $modifiers : '';
  
?>

<!-- STATS DECORATION -->
<div class="stats-decoration <?php echo esc_attr($modifiers_classes); ?>">
  <!-- STATS DECORATION ICON WRAP -->
  <div class="stats-decoration-icon-wrap">
  <?php

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => $args['icon'],
      'modifiers' => 'stats-decoration-icon'
    ]);

  ?>
  </div>
  <!-- /STATS DECORATION ICON WRAP -->

  <!-- STATS DECORATION TITLE -->
  <p class="stats-decoration-title"><?php echo esc_html($args['value']); ?></p>
  <!-- /STATS DECORATION TITLE -->

  <!-- STATS DECORATION TEXT -->
  <p class="stats-decoration-text"><?php echo esc_html($args['description']); ?></p>
  <!-- /STATS DECORATION TEXT -->
</div>
<!-- /STATS DECORATION -->