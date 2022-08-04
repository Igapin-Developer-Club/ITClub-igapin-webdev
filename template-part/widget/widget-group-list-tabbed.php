<?php
/**
 * Vikinger Template Part - Widget Group List Tabbed
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_groups_get
 * 
 * @param array $args {
 *   @type string $widget_title     Widget title.
 *   @type array $tabs {
 *     @type string $title            Tab item title.
 *     @type array  $groups           Groups data.
 *     @type string $no_results_text  Text to show when no results are found ($groups count === 0).
 *   }
 * }
 */

?>

<!-- WIDGET BOX -->
<div class="widget-box">
  <!-- WIDGET BOX TITLE -->
  <p class="widget-box-title"><?php echo esc_html($args['widget_title']); ?></p>
  <!-- /WIDGET BOX TITLE -->

  <!-- WIDGET BOX CONTENT -->
  <div class="widget-box-content tab-container">
    <!-- FILTERS -->
    <div class="filters">
    <?php foreach ($args['tabs'] as $tab) : ?>
      <!-- FILTER -->
      <p class="filter tab-option"><?php echo esc_html($tab['title']); ?></p>
      <!-- /FILTER -->
    <?php endforeach; ?>
    </div>
    <!-- /FILTERS -->

    <!-- FILTERS ITEMS -->
    <div class="filters-items">
    <?php foreach ($args['tabs'] as $tab) : ?>
      <!-- TAB ITEM -->
      <div class="tab-item">
      <?php

        if (count($tab['groups']) > 0) :
          /**
           * Group Status List
           */
          get_template_part('template-part/group/group-status', 'list', [
            'groups' => $tab['groups']
          ]);
        else:

      ?>
        <p class="no-results-text"><?php echo esc_html($tab['no_results_text']); ?></p>
      <?php

        endif;
        
      ?>
      </div>
      <!-- /TAB ITEM -->
    <?php endforeach; ?>
    </div>
    <!-- /FILTERS ITEMS -->
  </div>
  <!-- /WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->