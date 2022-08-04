<?php
/**
 * Vikinger Template Part - Menu
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_menu_get_items
 * 
 * @param array $args {
 *   @type array    $menu_items         Menu items data.
 *   @type string   $modifiers          Optional. Additional class names to add to the HTML wrapper.
 *   @type bool     $show_tooltips      Optional. Displays tooltips when hovering over the menu items if set.
 *   @type bool     $show_menu_names    Optional. Displays menu name text.
 * }
 */

  $modifiers        = isset($args['modifiers']) ? $args['modifiers'] : false;
  $show_tooltips    = isset($args['show_tooltips']) ? $args['show_tooltips'] : false;
  $show_menu_names  = isset($args['show_menu_names']) ? $args['show_menu_names'] : false;

  $modifiers_classes      = $modifiers ? $modifiers : '';
  $menu_item_link_classes = $show_tooltips ? 'text-tooltip-tfr' : '';

?>

<!-- MENU -->
<ul class="menu <?php echo esc_attr($modifiers_classes); ?>">
<?php

  foreach ($args['menu_items'] as $menu_item) : 
    $menu_item_classes = $menu_item['active'] ? 'active' : '';

?>
  <!-- MENU ITEM -->
  <li class="menu-item <?php echo esc_attr($menu_item_classes);  ?>">
    <!-- MENU ITEM LINK -->
    <a  class="menu-item-link <?php echo esc_attr($menu_item_link_classes); ?>"
        href="<?php echo esc_url($menu_item['link']); ?>"
        <?php echo $menu_item['target'] !== '' ? 'target="' . $menu_item['target'] . '"' : ''; ?>
        data-title="<?php echo esc_attr($menu_item['name']); ?>"
    >
    <?php

      /**
       * Icon SVG
       */
      get_template_part('template-part/icon/icon', 'svg', [
        'icon'      => $menu_item['icon'],
        'modifiers' => 'menu-item-link-icon'
      ]);


      if ($show_menu_names) {
        echo esc_html($menu_item['name']);
      }
      
    ?>
    </a>
    <!-- /MENU ITEM LINK -->

    <?php

      if (count($menu_item['children']) > 0) {
        /**
         * Menu
         */
        get_template_part('template-part/navigation/menu', null, [
          'menu_items'      => $menu_item['children'],
          'modifiers'       => $modifiers,
          'show_tooltips'   => $show_tooltips,
          'show_menu_names' => $show_menu_names
        ]);
      }

    ?>
  </li>
  <!-- /MENU ITEM -->
<?php endforeach; ?>
</ul>
<!-- /MENU -->