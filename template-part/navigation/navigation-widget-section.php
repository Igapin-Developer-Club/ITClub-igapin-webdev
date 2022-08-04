<?php
/**
 * Vikinger Template Part - Navigation Widget Section
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get_settings_navigation_sections
 * 
 * @param array $args {
 *   @type string  $section_name      Section name.
 *   @type string  $section_links     Section links.
 *   @type string  $modifiers         Optional. Additional class names to add to the HTML wrapper.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';

?>

<!-- NAVIGATION WIDGET SECTION -->
<div class="navigation-widget-section <?php echo esc_attr($modifiers_classes); ?>">
  <!-- NAVIGATION WIDGET SECTION TITLE -->
  <p class="navigation-widget-section-title"><?php echo esc_html($args['section_name']); ?></p>
  <!-- /NAVIGATION WIDGET SECTION TITLE -->

<?php

  /**
   * Navigation Widget Section Menu
   */
  get_template_part('template-part/navigation/navigation-widget-section', 'menu', [
    'menu_items'  => $args['section_links']
  ]);

?>
</div>
<!-- /NAVIGATION WIDGET SECTION -->