<?php
/**
 * Vikinger Template Part - Header Logged Out
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see header.php
 * 
 * @param array $args {
 *   @type array  $header_menu_items              Header menu items.
 *   @type array  $header_features_menu_items     Header features menu items.
 *   @type array  $side_menu_items                Side menu items.
 *   @type array  $side_menu_items_flat           Side menu items flattened.
 * }
 */

  global $vikinger_settings;

  $display_search = ($vikinger_settings['search_status'] === 'display') && ($vikinger_settings['search_members_enabled'] || $vikinger_settings['search_groups_enabled'] || $vikinger_settings['search_blog_enabled']);

  $sidemenu_status = get_theme_mod('vikinger_sidemenu_setting_display', 'display');
  $header_version = get_theme_mod('vikinger_siteidentity_setting_header_type', 'v1');

  $has_custom_logo = has_custom_logo();

  if ($has_custom_logo) {
    $logo_id = get_theme_mod('custom_logo');
    $logo_url = wp_get_attachment_image_src($logo_id , 'full');
  }

  if (vikinger_plugin_buddypress_is_active()) {
    $bp_directory_page_ids = bp_core_get_directory_page_ids();
    $register_page = get_post($bp_directory_page_ids['register']);
    $register_page_link = get_permalink($register_page->ID);
  } else {
    $register_page_link = wp_registration_url();
  }

  if ($sidemenu_status === 'display') :
?>

<!-- NAVIGATION WIDGET -->
<nav id="navigation-widget-small" class="navigation-widget navigation-widget-desktop navigation-widget-closed sidebar left navigation-widget-delayed">
<?php

  // show side menu items if it has at least one item
  if (count($args['side_menu_items']) > 0) {
    /**
     * Menu
     */
    get_template_part('template-part/navigation/menu', null, [
      'menu_items'    => $args['side_menu_items_flat'],
      'modifiers'     => 'small',
      'show_tooltips' => true
    ]);
  }

?>
</nav>
<!-- /NAVIGATION WIDGET -->

<!-- NAVIGATION WIDGET -->
<nav id="navigation-widget" class="navigation-widget navigation-widget-desktop sidebar left navigation-widget-hidden" data-simplebar>
<?php

  if (count($args['side_menu_items']) > 0) {
    /**
     * Menu
     */
    get_template_part('template-part/navigation/menu', null, [
      'menu_items'      => $args['side_menu_items'],
      'show_menu_names' => true
    ]);
  }

?>
</nav>
<!-- /NAVIGATION WIDGET -->
<?php

  endif;

?>

<!-- NAVIGATION WIDGET -->
<nav id="navigation-widget-mobile" class="navigation-widget navigation-widget-mobile sidebar left navigation-widget-hidden" data-simplebar>
  <!-- NAVIGATION WIDGET CLOSE BUTTON -->
  <div class="navigation-widget-close-button">
  <?php
    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => 'back-arrow',
      'modifiers' => 'navigation-widget-close-button-icon'
    ]);
  ?>
  </div>
  <!-- /NAVIGATION WIDGET CLOSE BUTTON -->

  <!-- NAVIGATION WIDGET ACTIONS -->
  <div class="navigation-widget-actions">
  <?php if ($args['vikinger_settings']['users_can_register']) : ?>
    <!-- BUTTON -->
    <a class="button register-button" href="<?php echo esc_url($register_page_link); ?>"><?php esc_html_e('Register', 'vikinger'); ?></a>
    <!-- /BUTTON -->
  <?php endif; ?>

    <!-- BUTTON -->
    <a class="button primary login-button" href="<?php echo esc_url(wp_login_url()); ?>"><?php esc_html_e('Login', 'vikinger'); ?></a>
    <!-- /BUTTON -->
  </div>
  <!-- /NAVIGATION WIDGET ACTIONS -->

<?php if (count($args['side_menu_items']) > 0) : ?>
  <!-- NAVIGATION WIDGET SECTION -->
  <div class="navigation-widget-section">
    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title"><?php esc_html_e('Sections', 'vikinger'); ?></p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

  <?php

      /**
       * Menu
       */
      get_template_part('template-part/navigation/menu', null, [
        'menu_items'      => $args['side_menu_items'],
        'show_menu_names' => true
      ]);
    
  ?>
  </div>
  <!-- /NAVIGATION WIDGET SECTION -->
<?php endif; ?>

<?php

  // show header menu
  if (count($args['header_menu_items']) > 0) {
    $section_name = $args['header_menu_items'][0]['menu_name'];

    /**
     * Navigation Widget Section
     */
    get_template_part('template-part/navigation/navigation-widget-section', null, [
      'section_name'  => $section_name,
      'section_links' => $args['header_menu_items'],
      'modifiers'     => 'space-top'
    ]);
  }

  // show header features menu
  if (count($args['header_features_menu_items']) > 0) {
    foreach ($args['header_features_menu_items'] as $header_features_menu_section => $header_features_menu_items) {
      /**
       * Navigation Widget Section
       */
      get_template_part('template-part/navigation/navigation-widget-section', null, [
        'section_name'  => $header_features_menu_section,
        'section_links' => $header_features_menu_items
      ]);
    }
  }

?>
</nav>
<!-- /NAVIGATION WIDGET -->

<!-- HEADER -->
<header class="header logged-out">
  <!-- HEADER ACTIONS -->
  <div class="header-actions header-actions-full">
  <?php if ($has_custom_logo && $header_version === 'v2') : ?>
    <!-- LOGO -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo logo-encased">
      <!-- LOGO IMAGE -->
      <img class="logo-image" src="<?php echo esc_url($logo_url[0]); ?>" alt="logo">
      <!-- /LOGO IMAGE -->
    </a>
    <!-- /LOGO -->
  <?php endif; ?>

  <?php if ($header_version === 'v1') : ?>
      <!-- HEADER BRAND -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="header-brand">
      <?php if ($has_custom_logo) : ?>
        <!-- LOGO -->
        <div class="logo">
          <!-- LOGO IMAGE -->
          <img class="logo-image" src="<?php echo esc_url($logo_url[0]); ?>" alt="logo">
          <!-- /LOGO IMAGE -->
        </div>
        <!-- /LOGO -->
      <?php endif; ?>

        <!-- HEADER BRAND TEXT -->
        <h1 class="header-brand-text"><?php bloginfo('name'); ?></h1>
        <!-- /HEADER BRAND TEXT -->
      </a>
      <!-- /HEADER BRAND -->

  <?php endif; ?>

  <?php if ($sidemenu_status === 'display') : ?>
    <!-- SIDEMENU TRIGGER -->
    <div class="sidemenu-trigger navigation-widget-trigger">
    <?php
  
      /**
       * Icon SVG
       */
      get_template_part('template-part/icon/icon', 'svg', [
        'icon'      => 'grid'
      ]);

    ?>
    </div>
    <!-- /SIDEMENU TRIGGER -->
  <?php endif; ?>

    <!-- MOBILEMENU TRIGGER -->
    <div class="mobilemenu-trigger navigation-widget-mobile-trigger">
      <!-- BURGER ICON -->
      <div class="burger-icon inverted">
        <!-- BURGER ICON BAR -->
        <div class="burger-icon-bar"></div>
        <!-- /BURGER ICON BAR -->

        <!-- BURGER ICON BAR -->
        <div class="burger-icon-bar"></div>
        <!-- /BURGER ICON BAR -->

        <!-- BURGER ICON BAR -->
        <div class="burger-icon-bar"></div>
        <!-- /BURGER ICON BAR -->
      </div>
      <!-- /BURGER ICON -->
    </div>
    <!-- /MOBILEMENU TRIGGER -->
  <?php

    /**
     * Navigation
     */
    get_template_part('template-part/navigation/navigation', null, [
      'header_menu_items'           => $args['header_menu_items'],
      'header_features_menu_items'  => $args['header_features_menu_items']
    ]);
    
  ?>
  </div>
  <!-- /HEADER ACTIONS -->

  <?php if ($display_search) : ?>
  <!-- HEADER ACTIONS -->
  <div class="header-actions search-bar">
  <?php

    /**
     * Search Form
     */
    get_template_part('template-part/search/search', 'form');

  ?>
  </div>
  <!-- /HEADER ACTIONS -->
  <?php endif; ?>

  <?php if (vikinger_plugin_woocommerce_is_active() || $display_search) : ?>
  <!-- HEADER ACTIONS -->
  <div class="header-actions">
    <!-- ACTION LIST -->
    <div class="action-list action-list-small action-list-mobile dark">
    <?php

      if (vikinger_plugin_woocommerce_is_active()) {
        /**
         * WooCommerce Header Mini Cart Icon Link
         */
        get_template_part('template-part/woocommerce/woocommerce-header-mini-cart-icon-link');
      }

    ?>
    
    <?php if ($display_search) : ?>
      <!-- ACTION LIST ITEM WRAP -->
      <div class="action-list-item-wrap">
        <!-- ACTION LIST ITEM -->
        <div class="action-list-item header-search-push-open">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'magnifying-glass',
            'modifiers' => 'action-list-item-icon'
          ]);

        ?>
        </div>
        <!-- /ACTION LIST ITEM -->

        <!-- ACTION LIST ITEM -->
        <div class="action-list-item action-list-item-hidden header-search-push-close">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'cross-thin',
            'modifiers' => 'action-list-item-icon'
          ]);

        ?>
        </div>
        <!-- /ACTION LIST ITEM -->
      </div>
      <!-- /ACTION LIST ITEM WRAP -->
    <?php endif; ?>
    </div>
    <!-- /ACTION LIST -->
  </div>
  <!-- /HEADER ACTIONS -->
  <?php endif; ?>

  <!-- HEADER ACTIONS -->
  <div class="header-actions">
  <?php

    if (vikinger_plugin_woocommerce_is_active()) {
      /**
       * WooCommerce Header Mini Cart
       */
      get_template_part('template-part/woocommerce/woocommerce-header-mini-cart');
    }

  ?>

  <?php if ($args['vikinger_settings']['users_can_register']) : ?>
    <!-- BUTTON -->
    <a class="button register-button" href="<?php echo esc_url($register_page_link); ?>"><?php esc_html_e('Register', 'vikinger'); ?></a>
    <!-- /BUTTON -->
  <?php endif; ?>

    <!-- BUTTON -->
    <a class="button primary login-button" href="<?php echo esc_url(wp_login_url()); ?>"><?php esc_html_e('Login', 'vikinger'); ?></a>
    <!-- /BUTTON -->
  </div>
  <!-- /HEADER ACTIONS -->
</header>
<!-- /HEADER -->