<?php
/**
 * Vikinger Template Part - Widget Stream
 * 
 * @package Vikinger
 * @since 1.9.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string $widget_title     Widget title.
 *   @type string $username         Streamer username.
 * }
 */

?>

<!-- WIDGET BOX -->
<div class="widget-box no-padding bottom-padded">
  <!-- WIDGET BOX TITLE -->
  <p class="widget-box-title"><?php echo esc_html($args['widget_title']); ?></p>
  <!-- /WIDGET BOX TITLE -->

  <!-- WIDGET BOX CONTENT -->
  <div class="widget-box-content">
  <?php

    /**
     * Stream Preview
     */
    get_template_part('template-part/stream/stream', 'preview', [
      'username'  => $args['username']
    ]);

  ?>
  </div>
  <!-- /WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->