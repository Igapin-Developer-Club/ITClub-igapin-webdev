<?php
/**
 * Vikinger Template Part - Widget User List
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type string $widget_title     Widget title.
 *   @type array  $users            Users data.
 *   @type string $no_results_text  Text to show when no results are found ($users count === 0).
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

    if (count($args['users']) > 0) :
      /**
       * User Status List
       */
      get_template_part('template-part/user/user-status', 'list', [
        'users' => $args['users']
      ]);

      if (array_key_exists('button', $args)) :

  ?>
    <a class="widget-box-button button small primary" href="<?php echo esc_url($args['button']['link']); ?>"><?php echo esc_html($args['button']['text']); ?></a>
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