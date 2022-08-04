<?php
/**
 * Vikinger Template Part - Navigation
 * 
 * @package Vikinger
 * @since 1.6.3
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_menu_get_items
 * 
 * @param array $args {
 *   @type array  $menu_items       Menu items data.
 *   @type array  $menu_styles      Menu styles data.
 *   @type bool   $submenu          True if submenu, false otherwise.
 * }
 */

  $menu_styles = isset($args['menu_styles']) ? $args['menu_styles'] : [];

  $submenu = isset($args['submenu']) ? $args['submenu'] : false;

  $menu_styles_key = $submenu ? 'submenu' : 'menu';
  $menu_item_styles_key = $submenu ? 'submenu-item' : 'menu-item';
  $menu_item_icon_styles_key = $submenu ? 'submenu-item-icon' : 'menu-item-icon';

  $menu_styles_content = array_key_exists($menu_styles_key, $menu_styles) ? $menu_styles[$menu_styles_key] : [];
  $menu_styles_attribute = vikinger_elementor_styles_encode_get($menu_styles_content);

  $menu_item_styles_content = array_key_exists($menu_item_styles_key, $menu_styles) ? $menu_styles[$menu_item_styles_key] : [];
  $menu_item_styles_attribute = vikinger_elementor_styles_encode_get($menu_item_styles_content);

  $menu_item_icon_styles_content = array_key_exists($menu_item_icon_styles_key, $menu_styles) ? $menu_styles[$menu_item_icon_styles_key] : [];
  $menu_item_icon_styles_attribute = vikinger_elementor_styles_encode_get($menu_item_icon_styles_content);

?>

<!-- VK EL NAVIGATION -->
<ul class="vk-el-navigation" <?php echo $menu_styles_attribute ?>>
<?php foreach ($args['menu_items'] as $menu_item) : ?>
  <!-- VK EL NAVIGATION ITEM -->
  <li class="vk-el-navigation-item">
    <!-- VK EL NAVIGATION ITEM LINK -->
    <a class="vk-el-navigation-item-link" href="<?php echo esc_url($menu_item['link']); ?>" <?php echo $menu_item['target'] !== '' ? 'target="' . $menu_item['target'] . '"' : ''; ?> <?php echo $menu_item_styles_attribute ?>>
    <?php
    
      echo esc_html($menu_item['name']);

      if (count($menu_item['children']) > 0) :
    ?>
      <!-- ICON SVG -->
      <svg class="icon-small-arrow vk-el-navigation-item-icon" <?php echo $menu_item_icon_styles_attribute; ?>>
        <use href="#svg-small-arrow"></use>
      </svg>
      <!-- ICON SVG -->
    <?php

      endif;

    ?>
    </a>
    <!-- /VK EL NAVIGATION ITEM LINK -->

  <?php

    if (count($menu_item['children']) > 0) {
      get_template_part('template-part/elementor/navigation/navigation', null, [
        'menu_items'  => $menu_item['children'],
        'menu_styles' => $menu_styles,
        'submenu'     => true
      ]);
    }

  ?>
  </li>
  <!-- /VK EL NAVIGATION ITEM -->
<?php endforeach; ?>
</ul>
<!-- /VK EL NAVIGATION -->