<?php
/**
 * Vikinger Template Part - Widget User List Tabbed
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type string $widget_title     Widget title.
 *   @type array $tabs {
 *     @type string $title            Tab item title.
 *     @type array  $users            Users data.
 *     @type string $no_results_text  Text to show when no results are found ($users count === 0).
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

        if (count($tab['users']) > 0) :
          /**
           * User Status List
           */
          get_template_part('template-part/user/user-status', 'list', [
            'users' => $tab['users']
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