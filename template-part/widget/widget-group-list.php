<?php
/**
 * Vikinger Template Part - Widget Group List
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_groups_get
 * 
 * @param array $args {
 *   @type string $widget_title     Widget title.
 *   @type array  $groups           Groups data.
 *   @type string $no_results_text  Text to show when no results are found ($groups count === 0).
 *   @type array $button {
 *     @type string $text       Button text.
 *     @type string $link       Button link url.
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
  <div class="widget-box-content">
  <?php

    if (count($args['groups']) > 0) :
      /**
       * Group Status List
       */
      get_template_part('template-part/group/group-status', 'list', [
        'groups' => $args['groups']
      ]);
    
      if (array_key_exists('button', $args)) :

  ?>
    <a class="widget-box-button button small secondary" href="<?php echo esc_url($args['button']['link']); ?>"><?php echo esc_html($args['button']['text']); ?></a>
  <?php

      endif;

    else:

  ?>
    <p class="no-results-text"><?php echo esc_html($args['no_results_text']); ?></p>
  <?php

    endif;
    
  ?>
  </div>
  <!-- /WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->