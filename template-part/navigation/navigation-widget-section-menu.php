<?php
/**
 * Vikinger Template Part - Navigation Widget Section Menu
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get_settings_navigation_sections
 * 
 * @param array $args {
 *   @type array $menu_items        Menu items.
 * }
 */

?>

<!-- NAVIGATION WIDGET SECTION MENU -->
<ul class="navigation-widget-section-menu">
<?php foreach ($args['menu_items'] as $menu_item) : ?>
  <!-- NAVIGATION WIDGET SECTION MENU ITEM -->
  <li class="navigation-widget-section-menu-item">
    <!-- NAVIGATION WIDGET SECTION MENU ITEM LINK -->
    <a class="navigation-widget-section-menu-item-link" href="<?php echo esc_url($menu_item['link']); ?>"><?php echo esc_html($menu_item['name']); ?></a>
    <!-- /NAVIGATION WIDGET SECTION MENU ITEM LINK -->

    <?php

      if (array_key_exists('children', $menu_item) && (count($menu_item['children']) > 0)) {
        /**
         * Navigation Widget Section Menu
         */
        get_template_part('template-part/navigation/navigation-widget-section', 'menu', [
          'menu_items'  => $menu_item['children']
        ]);
      }

    ?>
  </li>
  <!-- /NAVIGATION WIDGET SECTION MENU ITEM -->
<?php endforeach; ?>
</ul>
<!-- /NAVIGATION WIDGET SECTION MENU -->