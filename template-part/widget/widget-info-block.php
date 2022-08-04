<?php
/**
 * Vikinger Template Part - Widget Info Block
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_xprofile_get_group_fields
 * 
 * @param array $args {
 *   @type string $widget_title           Widget title.
 *   @type string $widget_text            Optional. Widget text.
 *   @type array  $information_items      Information items.
 *   @type string $no_results_text        Optional. Text to display when information items array is empty.
 * }
 */

  $no_results_text = isset($args['no_results_text']) ? $args['no_results_text'] : esc_html__('No Information Found', 'vikinger');

?>

<!-- WIDGET BOX -->
<div class="widget-box">
  <!-- WIDGET BOX TITLE -->
  <p class="widget-box-title"><?php echo esc_html($args['widget_title']); ?></p>
  <!-- /WIDGET BOX TITLE -->

  <!-- WIDGET BOX CONTENT -->
  <div class="widget-box-content">
  <?php

    $information_items_have_value = false;

    foreach ($args['information_items'] as $information_item) {
      if ($information_item['value'] !== '') {
        $information_items_have_value = true;
        break;
      }
    }

    if ((count($args['information_items']) > 0) && $information_items_have_value) :
      /**
       * Information Block List
       */
      get_template_part('template-part/information/information-block', 'list', [
        'information_items' => $args['information_items']
      ]);
    else :

  ?>
    <p class="no-results-text"><?php echo esc_html($no_results_text); ?></p>
  <?php
  
    endif;

  ?>
  </div>
  <!-- /WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->