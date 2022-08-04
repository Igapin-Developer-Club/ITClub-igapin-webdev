<?php
/**
 * Vikinger Template Part - Section Navigation
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get_navigation_items, vikinger_groups_get_navigation_items
 * 
 * @param array $args {
 *   @type array  $nav_items            Navigation items data.
 *   @type string $nav_items_color      Optional. Navigation items color.
 * }
 */

  $nav_items_color = isset($args['nav_items_color']) ? $args['nav_items_color'] : false;

  $nav_items_color_classes = $nav_items_color ? $nav_items_color : '';

?>

<!-- SECTION NAVIGATION -->
<nav class="section-navigation">
  <!-- SECTION MENU WRAP -->
  <div id="section-navigation-slider" class="section-menu-wrap swiper-container">
    <!-- SECTION MENU -->
    <div class="section-menu <?php echo esc_attr($nav_items_color_classes); ?> swiper-wrapper">
    <?php

      foreach ($args['nav_items'] as $nav_item) :
        $section_menu_item_classes = $nav_item['active'] ? 'active' : '';
        $section_menu_item_classes = !$nav_item['icon'] ? $section_menu_item_classes . ' no-icon' : $section_menu_item_classes;

    ?>
      <!-- SECTION MENU ITEM -->
      <a class="section-menu-item <?php echo esc_attr($section_menu_item_classes); ?> swiper-slide" href="<?php echo esc_url($nav_item['link']); ?>">
      <?php

        if ($nav_item['icon']) {
          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => $nav_item['icon'],
            'modifiers' => 'section-menu-item-icon'
          ]);
        }

      ?>

        <!-- SECTION MENU ITEM TEXT -->
        <p class="section-menu-item-text"><?php echo wp_kses($nav_item['name'], ['span' => ['class' => []]]); ?></p>
        <!-- /SECTION MENU ITEM TEXT -->
      </a>
      <!-- /SECTION MENU ITEM -->
    <?php endforeach; ?>
    </div>
    <!-- /SECTION MENU -->
  </div>
  <!-- /SECTION MENU WRAP -->

  <!-- SLIDER CONTROLS -->
  <div class="slider-controls">
    <!-- SLIDER CONTROL -->
    <div id="section-navigation-control-prev" class="slider-control left">
    <?php

      /**
       * Icon SVG
       */
      get_template_part('template-part/icon/icon', 'svg', [
        'icon'      => 'small-arrow',
        'modifiers' => 'slider-control-icon'
      ]);
        
    ?>
    </div>
    <!-- /SLIDER CONTROL -->

    <!-- SLIDER CONTROL -->
    <div id="section-navigation-control-next" class="slider-control right">
    <?php

      /**
       * Icon SVG
       */
      get_template_part('template-part/icon/icon', 'svg', [
        'icon'      => 'small-arrow',
        'modifiers' => 'slider-control-icon'
      ]);
        
    ?>
    </div>
    <!-- /SLIDER CONTROL -->
  </div>
  <!-- /SLIDER CONTROLS -->
</nav>
<!-- /SECTION NAVIGATION -->