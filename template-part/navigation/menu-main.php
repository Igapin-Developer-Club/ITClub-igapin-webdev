<?php
/**
 * Vikinger Template Part - Navigation
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_menu_get_items
 * 
 * @param array $args {
 *   @type array  $menu_items     Menu items.
 * }
 */

?>

<!-- MENU MAIN -->
<ul class="menu-main">
<?php foreach ($args['menu_items'] as $menu_item) : ?>
  <!-- MENU MAIN ITEM -->
  <li class="menu-main-item">
    <!-- MENU MAIN ITEM LINK -->
    <a class="menu-main-item-link" href="<?php echo esc_url($menu_item['link']); ?>" <?php echo $menu_item['target'] !== '' ? 'target="' . $menu_item['target'] . '"' : ''; ?>>
    <?php

      echo esc_html($menu_item['name']);

      if (count($menu_item['children']) > 0) {
        /**
         * Icon SVG
         */
        get_template_part('template-part/icon/icon', 'svg', [
          'icon'      => 'small-arrow',
          'modifiers' => 'menu-sub-item-icon'
        ]);
      }

    ?>
    </a>
    <!-- /MENU MAIN ITEM LINK -->

    <?php

      if (count($menu_item['children']) > 0) {
        /**
         * Menu Main
         */
        get_template_part('template-part/navigation/menu', 'main', [
          'menu_items'  => $menu_item['children']
        ]);
      }

    ?>
  </li>
  <!-- /MENU MAIN ITEM -->
<?php endforeach; ?>
</ul>
<!-- /MENU MAIN -->