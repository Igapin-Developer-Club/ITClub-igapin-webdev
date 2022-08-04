<?php
/**
 * Vikinger Template Part - Navigation Mobile Menu
 * 
 * @package Vikinger
 * @since 1.6.3
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_menu_get_items
 * 
 * @param array $args {
 *   @type array  $menu_items         Menu items data.
 *   @type array  $menu_styles        Menu styles data.
 * }
 */

  $menu_styles = isset($args['menu_styles']) ? $args['menu_styles'] : [];

  $menu_item_styles_content = array_key_exists('menu-item', $menu_styles) ? $menu_styles['menu-item'] : [];
  $menu_item_styles_attribute = vikinger_elementor_styles_encode_get($menu_item_styles_content);

?>

<!-- VK EL NAVIGATION MOBILE MENU -->
<ul class="vk-el-navigation-mobile-menu">
<?php foreach ($args['menu_items'] as $menu_item) : ?>
  <!-- VK EL NAVIGATION MOBILE MENU ITEM -->
  <li class="vk-el-navigation-mobile-menu-item">
    <!-- VK EL NAVIGATION MOBILE MENU ITEM LINK -->
    <a class="vk-el-navigation-mobile-menu-item-link" href="<?php echo esc_url($menu_item['link']); ?>" <?php echo $menu_item['target'] !== '' ? 'target="' . $menu_item['target'] . '"' : ''; ?> <?php echo $menu_item_styles_attribute ?>><?php echo esc_html($menu_item['name']); ?></a>
    <!-- /VK EL NAVIGATION MOBILE MENU ITEM LINK -->

  <?php

    if (count($menu_item['children']) > 0) {
      get_template_part('template-part/elementor/navigation/navigation-mobile', 'menu', [
        'menu_items'  => $menu_item['children'],
        'menu_styles' => $menu_styles
      ]);
    }

  ?>
  </li>
  <!-- /VK EL NAVIGATION MOBILE MENU ITEM -->
<?php endforeach; ?>
</ul>
<!-- /VK EL NAVIGATION MOBILE MENU -->