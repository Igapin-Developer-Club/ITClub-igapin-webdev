<?php
/**
 * Vikinger Template Part - Alert Line
 * 
 * @package Vikinger
 * @since 1.3.3
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string $type     Alert line type.
 *   @type string $text     Alert line text.
 * }
 */

?>

<!-- ALERT LINE -->
<div class="alert-line alert-line-<?php echo esc_attr($args['type']); ?>">
  <!-- ALERT LINE ICON WRAP -->
  <div class="alert-line-icon-wrap">
    <!-- ALERT LINE ICON -->
    <svg class="alert-line-icon icon-<?php echo esc_attr($args['type']); ?>">
      <use href="#svg-<?php echo esc_attr($args['type']); ?>"></use>
    </svg>
    <!-- /ALERT LINE ICON -->
  </div>
  <!-- /ALERT LINE ICON WRAP -->

  <!-- ALERT LINE TEXT -->
  <p class="alert-line-text"><?php echo wp_kses($args['text'], ['span' => ['class' => []]]); ?></p>
  <!-- /ALERT LINE TEXT -->
</div>
<!-- /ALERT LINE -->