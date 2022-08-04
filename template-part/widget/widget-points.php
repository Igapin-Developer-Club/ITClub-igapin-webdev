<?php
/**
 * Vikinger Template Part - Widget Points
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_gamipress_get_user_points
 * 
 * @param array $args {
 *   @type string $widget_title     Widget title.
 *   @type array  $points           Points data.
 * }
 */

?>

<!-- WIDGET BOX -->
<div class="widget-box">
  <!-- WIDGET BOX TITLE -->
  <p class="widget-box-title"><?php echo esc_html($args['widget_title']); ?></p>
  <!-- /WIDGET BOX TITLE -->

  <!-- WIDGET BOX CONTENT -->
  <div class="widget-box-content">
  <?php

    if (count($args['points']) > 0) :
      /**
       * Point Item Line list
       */
      get_template_part('template-part/point/point-item-line-list', null, [
        'points' => $args['points']
      ]);
    else :

  ?>
    <p class="no-results-text"><?php esc_html_e('No Credits Found', 'vikinger'); ?></p>
  <?php

    endif;
    
  ?>
  </div>
  <!-- /WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->