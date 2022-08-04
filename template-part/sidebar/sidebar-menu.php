<?php
/**
 * Vikinger Template Part - Sidebar Menu
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get_settings_navigation_sections
 * 
 * @param array $args {
 *   @type array $sidebar_menu_sections     Sidebar sections data.
 *   @type bool  $accordion                 Optional. Set to true to use accordion, false otherwise. Default: true
 * }
 */

  $accordion = isset($args['accordion']) ? $args['accordion'] : true;

  $accordion_trigger_classes = $accordion ? 'accordion-trigger-linked' : '';
  $accordion_content_classes = $accordion ? 'accordion-content-linked' : '';

  $disable_header = isset($args['disable_header']) ? $args['disable_header'] : false;

  $disable_header_classes = $disable_header ? 'sidebar-menu-item-disable-header' : '';

?>

<!-- ACCOUNT HUB SIDEBAR -->
<div class="account-hub-sidebar">
  <!-- SIDEBAR BOX -->
  <div class="sidebar-box no-padding">
    <!-- SIDEBAR MENU -->
    <div class="sidebar-menu">
    <?php foreach ($args['sidebar_menu_sections'] as $sidebar_menu_section) : ?>
      <!-- SIDEBAR MENU ITEM -->
      <div class="sidebar-menu-item <?php echo esc_attr($disable_header_classes); ?>">
      <?php if (!$disable_header) : ?>
        <!-- SIDEBAR MENU HEADER -->
        <div class="sidebar-menu-header <?php echo esc_attr($accordion_trigger_classes); ?>">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => $sidebar_menu_section['icon'],
            'modifiers' => 'sidebar-menu-header-icon'
          ]);

        ?>

        <?php if ($accordion) : ?>
          <!-- SIDEBAR MENU HEADER CONTROL ICON -->
          <div class="sidebar-menu-header-control-icon">
          <?php

            /**
             * Icon SVG
             */
            get_template_part('template-part/icon/icon', 'svg', [
              'icon'      => 'minus-small',
              'modifiers' => 'sidebar-menu-header-control-icon-open'
            ]);

            /**
             * Icon SVG
             */
            get_template_part('template-part/icon/icon', 'svg', [
              'icon'      => 'plus-small',
              'modifiers' => 'sidebar-menu-header-control-icon-closed'
            ]);

          ?>
          </div>
          <!-- /SIDEBAR MENU HEADER CONTROL ICON -->
        <?php endif; ?>

          <!-- SIDEBAR MENU HEADER TITLE -->
          <p class="sidebar-menu-header-title"><?php echo esc_html($sidebar_menu_section['title']); ?></p>
          <!-- /SIDEBAR MENU HEADER TITLE -->

          <!-- SIDEBAR MENU HEADER TEXT -->
          <p class="sidebar-menu-header-text"><?php echo esc_html($sidebar_menu_section['description']); ?></p>
          <!-- /SIDEBAR MENU HEADER TEXT -->
        </div>
        <!-- /SIDEBAR MENU HEADER -->
      <?php endif; ?>

      <?php

        $section_menu_item_is_active = false;

        if ($accordion) {
          // check if this section has a menu item that is currently selected and open it's accordion in that case
          foreach ($sidebar_menu_section['menu_items'] as $sidebar_menu_section_item) {
            if ($sidebar_menu_section_item['active']) {
              $section_menu_item_is_active = true;
              break;
            }
          }
        }

        $section_menu_body_classes = $section_menu_item_is_active ? 'accordion-open' : '';

      ?>

        <!-- SIDEBAR MENU BODY -->
        <div class="sidebar-menu-body <?php echo esc_attr($accordion_content_classes); ?> <?php echo esc_attr($section_menu_body_classes); ?>">
        <?php

          foreach ($sidebar_menu_section['menu_items'] as $sidebar_menu_section_item) :
            $sidebar_menu_link_classes = $sidebar_menu_section_item['active'] ? 'active' : '';
            
        ?>
          <!-- SIDEBAR MENU LINK -->
          <a class="sidebar-menu-link <?php echo esc_attr($sidebar_menu_link_classes); ?>" href="<?php echo esc_url($sidebar_menu_section_item['link']); ?>">
          <?php echo esc_html($sidebar_menu_section_item['name']); ?>
          </a>
          <!-- /SIDEBAR MENU LINK -->
        <?php endforeach; ?>
        </div>
        <!-- /SIDEBAR MENU BODY -->
      </div>
      <!-- /SIDEBAR MENU ITEM -->
    <?php endforeach; ?>
    </div>
    <!-- /SIDEBAR MENU -->
  </div>
  <!-- /SIDEBAR BOX -->
</div>
<!-- /ACCOUNT HUB SIDEBAR -->