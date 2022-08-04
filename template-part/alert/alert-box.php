<?php
/**
 * Vikinger Template Part - Alert Box
 * 
 * @package Vikinger
 * @since 1.2.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string $type     Alert box type.
 *   @type string $title    Alert box title.
 *   @type string $text     Alert box text.
 * }
 */

?>

<!-- ALERT BOX -->
<div class="alert-box alert-box-<?php echo esc_attr($args['type']); ?>">
  <!-- ALERT BOX ICON WRAP -->
  <div class="alert-box-icon-wrap">
    <!-- ALERT BOX ICON -->
    <svg class="alert-box-icon icon-<?php echo esc_attr($args['type']); ?>">
      <use href="#svg-<?php echo esc_attr($args['type']); ?>"></use>
    </svg>
    <!-- /ALERT BOX ICON -->
  </div>
  <!-- /ALERT BOX ICON WRAP -->

  <!-- ALERT BOX TITLE -->
  <p class="alert-box-title"><?php echo esc_html($args['title']); ?></p>
  <!-- /ALERT BOX TITLE -->

  <!-- ALERT BOX TEXT -->
  <p class="alert-box-text"><?php echo esc_html($args['text']); ?></p>
  <!-- /ALERT BOX TEXT -->
</div>
<!-- /ALERT BOX -->