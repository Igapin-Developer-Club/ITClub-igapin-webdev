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
 *   @type array  $header_menu_items             Header menu items.
 *   @type array  $header_features_menu_items    Header features menu items.
 * }
 */

  $header_menu_items_count          = count($args['header_menu_items']);
  $header_features_menu_items_count = count($args['header_features_menu_items']);

?>

<!-- NAVIGATION -->
<nav class="navigation">
<?php if (($header_menu_items_count > 0) || ($header_features_menu_items_count > 0)) : ?>
  <!-- MENU MAIN -->
  <ul class="menu-main">
  <?php if ($header_menu_items_count > 0) : ?>
    <!-- MENU MAIN ITEM -->
    <li class="menu-main-item">
      <!-- MENU MAIN ITEM LINK -->
      <a class="menu-main-item-link" href="<?php echo esc_url($args['header_menu_items'][0]['link']); ?>" <?php echo $args['header_menu_items'][0]['target'] !== '' ? 'target="' . $args['header_menu_items'][0]['target'] . '"' : ''; ?>>
      <?php

        echo esc_html($args['header_menu_items'][0]['name']);

        if (count($args['header_menu_items'][0]['children']) > 0) {
          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'small-arrow',
            'modifiers' => 'menu-main-item-link-icon'
          ]);
        }

      ?>
      </a>
      <!-- /MENU MAIN ITEM LINK -->
      <?php
      
        if (count($args['header_menu_items'][0]['children']) > 0) {
          /**
           * Menu Main
           */
          get_template_part('template-part/navigation/menu', 'main', [
            'menu_items'  => $args['header_menu_items'][0]['children']
          ]);
        }

      ?>
    </li>
    <!-- /MENU MAIN ITEM -->
  <?php endif; ?>

  <?php

    if ($header_features_menu_items_count > 0) :
      foreach ($args['header_features_menu_items'] as $header_features_menu_item) {
        $header_features_menu_name = $header_features_menu_item[0]['menu_name'];
        break;
      }

  ?>
    <!-- MENU MAIN ITEM -->
    <li class="menu-main-item">
      <!-- MENU MAIN ITEM LINK -->
      <p class="menu-main-item-link">
      <?php

        echo esc_html($header_features_menu_name);

        /**
         * Icon SVG
         */
        get_template_part('template-part/icon/icon', 'svg', [
          'icon'      => 'small-arrow',
          'modifiers' => 'menu-main-item-link-icon'
        ]);

      ?>
      </p>
      <!-- /MENU MAIN ITEM LINK -->

      <!-- MENU WIDE -->
      <div class="menu-wide">
      <?php

        foreach ($args['header_features_menu_items'] as $key => $header_features_menu_item) {
          /**
           * Navigation Section
           */
          get_template_part('template-part/navigation/navigation', 'section', [
            'section_name'  => $key,
            'section_links' => $header_features_menu_item
          ]);
        }

      ?>
      </div>
      <!-- /MENU WIDE -->
    </li>
    <!-- /MENU MAIN ITEM -->
  <?php

    endif;

  ?>

  <?php

    if ($header_menu_items_count > 1) :
      foreach (array_slice($args['header_menu_items'], 1) as $header_menu_item) :

  ?>
    <!-- MENU MAIN ITEM -->
    <li class="menu-main-item">
      <!-- MENU MAIN ITEM LINK -->
      <a class="menu-main-item-link" href="<?php echo esc_url($header_menu_item['link']); ?>" <?php echo $header_menu_item['target'] !== '' ? 'target="' . $header_menu_item['target'] . '"' : ''; ?>>
      <?php

        echo esc_html($header_menu_item['name']);

        if (count($header_menu_item['children']) > 0) {
          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'small-arrow',
            'modifiers' => 'menu-main-item-link-icon'
          ]);
        }

      ?>
      </a>
      <!-- /MENU MAIN ITEM LINK -->
      <?php
      
        if (count($header_menu_item['children']) > 0) {
          /**
           * Menu Main
           */
          get_template_part('template-part/navigation/menu', 'main', [
            'menu_items'  => $header_menu_item['children']
          ]);
        }

      ?>
    </li>
    <!-- /MENU MAIN ITEM -->
  <?php

      endforeach;
    endif;

  ?>
  </ul>
  <!-- /MENU MAIN -->
<?php endif; ?>
</nav>
<!-- /NAVIGATION -->