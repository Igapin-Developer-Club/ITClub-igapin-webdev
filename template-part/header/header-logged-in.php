<?php
/**
 * Vikinger Template Part - Header Logged In
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see header.php
 * 
 * @param array $args {
 *   @type array  $user                             User data.
 *   @type array  $points                           User points data.
 *   @type array  $side_menu_items                  Side menu items.
 *   @type array  $side_menu_items_flat             Side menu items flattened.
 *   @type array  $header_menu_items                Header menu items.
 *   @type array  $header_features_menu_items       Header features menu items.
 *   @type array  $settings_navigation_sections     Settings navigation sections.
 * }
 */

  // add BuddyPress member stats data if plugin is active
  if (vikinger_plugin_buddypress_is_active()) {
    $post_count = $args['user']['stats']['post_count'];
    $friend_count = $args['user']['stats']['friend_count'];
    $comment_count = $args['user']['stats']['comment_count'];
  }

  $sidemenu_status = get_theme_mod('vikinger_sidemenu_setting_display', 'display');
  $header_version = get_theme_mod('vikinger_siteidentity_setting_header_type', 'v1');

  $has_custom_logo = has_custom_logo();

  if ($has_custom_logo) {
    $logo_id = get_theme_mod('custom_logo');
    $logo_url = wp_get_attachment_image_src($logo_id , 'full');
  }

  global $vikinger_settings;

  $display_search = ($vikinger_settings['search_status'] === 'display') && ($vikinger_settings['search_members_enabled'] || $vikinger_settings['search_groups_enabled'] || $vikinger_settings['search_blog_enabled']);

  $display_verified = vikinger_plugin_bpverifiedmember_is_active();

  $display_verified_in_fullname = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_fullname'];
  $display_verified_in_username = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_username'];

  $verified_user = $display_verified && $args['user']['verified'];

  if ($sidemenu_status === 'display') :
?>
<!-- NAVIGATION WIDGET -->
<nav id="navigation-widget-small" class="navigation-widget navigation-widget-desktop navigation-widget-closed sidebar left <?php echo $vikinger_settings['sidemenu_active'] ? 'navigation-widget-hidden' : 'navigation-widget-delayed'; ?>">
<?php

  /**
   * Avatar Small
   */
  get_template_part('template-part/avatar/avatar', 'small', [
    'user'      => $args['user'],
    'linked'    => vikinger_plugin_buddypress_is_active(),
    'no_border' => true
  ]);

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
<nav id="navigation-widget" class="navigation-widget navigation-widget-desktop sidebar left <?php echo $vikinger_settings['sidemenu_active'] ? 'navigation-widget-delayed' : 'navigation-widget-hidden'; ?>" data-simplebar>
  <!-- NAVIGATION WIDGET COVER -->
  <div class="navigation-widget-cover" style="<?php echo esc_attr('background: url(' . esc_url($args['user']['cover_url']) . ') center center / cover no-repeat'); ?>"></div>
  <!-- /NAVIGATION WIDGET COVER -->

  <!-- USER SHORT DESCRIPTION -->
  <div class="user-short-description">
  <?php

    /**
     * Avatar Medium
     */
    get_template_part('template-part/avatar/avatar', 'medium', [
      'user'      => $args['user'],
      'modifiers' => 'user-short-description-avatar',
      'linked'    => vikinger_plugin_buddypress_is_active()
    ]);

  ?>

    <!-- USER SHORT DESCRIPTION TITLE -->
    <p class="user-short-description-title">
    <?php
        
      echo esc_html($args['user']['name']);

      if ($display_verified_in_fullname && $verified_user) {
        echo $vikinger_settings['bp_verified_member_badge'];
      }

    ?>
    </p>
    <!-- /USER SHORT DESCRIPTION TITLE -->

    <?php

      $display_membership_tag = vikinger_plugin_pmpro_buddypress_is_active() && vikinger_pmpro_buddypress_membership_level_tag_display_on_profile_is_enabled() && $args['user']['membership'];

      if ($display_membership_tag) {
        /**
         * Membership Level Tag
         */
        get_template_part('template-part/membership/membership-level', 'tag', [
          'name'  => $args['user']['membership']['name']
        ]);
      }

    ?>

    <!-- USER SHORT DESCRIPTION TEXT -->
    <p class="user-short-description-text">
    <?php

      echo '&#64;' . esc_html($args['user']['mention_name']);

      if ($display_verified_in_username && $verified_user) {
        echo $vikinger_settings['bp_verified_member_badge'];
      }

    ?>
    </p>
    <!-- /USER SHORT DESCRIPTION TEXT -->
  </div>
  <!-- /USER SHORT DESCRIPTION -->

  <?php

    // add GamiPress badges data if plugin is active
    if (vikinger_plugin_gamipress_is_active() && vikinger_gamipress_achievement_type_exists('badge')) :
      $badges = $args['user']['badges'];
      
      if (!is_null($badges)) :
        $badges_count = count($badges);

        if ($badges_count > 0) :
          $badges_count = $badges_count;
          $max_display_count = 4;
          $display_count = min($max_display_count, $badges_count);

          $display_badges = array_slice($badges, 0, $display_count);
          $more_count = ($badges_count - $display_count) > 0 ? $badges_count - $display_count : 0;

          /**
           * Badge List
           */
          get_template_part('template-part/badge/badge', 'list', [
            'badges'      => $display_badges,
            'modifiers'   => 'small',
            'more_count'  => $more_count,
            'more_link'   => $args['user']['badges_link']
          ]);
        else :
  ?>
      <p class="no-results-text"><?php esc_html_e('No badges unlocked', 'vikinger'); ?></p>
  <?php
        endif;
      endif;
    endif;

    // add BuddyPress member stats data if plugin is active
    if (vikinger_plugin_buddypress_is_active()) :

  ?>

  <!-- USER STATS -->
  <div class="user-stats">
    <!-- USER STAT -->
    <div class="user-stat">
      <!-- USER STAT TITLE -->
      <p class="user-stat-title"><?php echo esc_html($post_count); ?></p>
      <!-- /USER STAT TITLE -->

      <!-- USER STAT TEXT -->
      <p class="user-stat-text"><?php echo esc_html(_n('post', 'posts', $post_count, 'vikinger')); ?></p>
      <!-- /USER STAT TEXT -->
    </div>
    <!-- /USER STAT -->

  <?php

      // add BuddyPress friend stats data if friends component is active
      if (bp_is_active('friends')) :

  ?>
    <!-- USER STAT -->
    <div class="user-stat">
      <!-- USER STAT TITLE -->
      <p class="user-stat-title"><?php echo esc_html($friend_count); ?></p>
      <!-- /USER STAT TITLE -->

      <!-- USER STAT TEXT -->
      <p class="user-stat-text"><?php echo esc_html(_n('friend', 'friends', $friend_count, 'vikinger')); ?></p>
      <!-- /USER STAT TEXT -->
    </div>
    <!-- /USER STAT -->
  <?php

    endif;

  ?>
    <!-- USER STAT -->
    <div class="user-stat">
      <!-- USER STAT TITLE -->
      <p class="user-stat-title"><?php echo esc_html($comment_count); ?></p>
      <!-- /USER STAT TITLE -->

      <!-- USER STAT TEXT -->
      <p class="user-stat-text"><?php echo esc_html(_n('comment', 'comments', $comment_count, 'vikinger')); ?></p>
      <!-- /USER STAT TEXT -->
    </div>
    <!-- /USER STAT -->
  </div>
  <!-- /USER STATS -->

<?php

  endif;

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

  <!-- NAVIGATION WIDGET INFO WRAP -->
  <div class="navigation-widget-info-wrap">
    <!-- NAVIGATION WIDGET INFO -->
    <div class="navigation-widget-info">
      <!-- USER AVATAR -->
      <?php 
      
        /**
         * Avatar Small
         */
        get_template_part('template-part/avatar/avatar', 'small', [
          'user'      => $args['user'],
          'linked'    => vikinger_plugin_buddypress_is_active(),
          'no_border' => true
        ]);
        
      ?>
      <!-- /USER AVATAR -->

      <!-- NAVIGATION WIDGET INFO TITLE -->
      <p class="navigation-widget-info-title">
      <?php

        echo esc_html($args['user']['name']);

        if ($verified_user) {
          echo $vikinger_settings['bp_verified_member_badge'];
        }

      ?>
      </p>
      <!-- /NAVIGATION WIDGET INFO TITLE -->

      <!-- NAVIGATION WIDGET INFO TEXT -->
      <p class="navigation-widget-info-text"><?php esc_html_e('Welcome Back!', 'vikinger'); ?></p>
      <!-- /NAVIGATION WIDGET INFO TEXT -->
    </div>
    <!-- /NAVIGATION WIDGET INFO -->

  <?php

    // add GamiPress points data if plugin is active
    if (vikinger_plugin_gamipress_is_active()) {
      if (count($args['points'])) {
        /**
         * Point Item List
         */
        get_template_part('template-part/point/point-item', 'list', [
          'points'    => $args['points'],
          'modifiers' => 'negative'
        ]);
      }
    }

  ?>

    <!-- NAVIGATION WIDGET BUTTON -->
    <a class="navigation-widget-info-button button small secondary" href="<?php echo esc_url(wp_logout_url()); ?>"><?php esc_html_e('Logout', 'vikinger'); ?></a>
    <!-- /NAVIGATION WIDGET BUTTON -->
  </div>
  <!-- /NAVIGATION WIDGET INFO WRAP -->

<?php if (vikinger_customizer_color_theme_switch_is_active()) : ?>
  <!-- ACTION ITEM WRAP -->
  <div class="action-item-wrap">
    <!-- ACTION ITEM -->
    <div class="action-item hoverable vk-theme-toggle">
    <?php

      $color_theme = vikinger_logged_user_color_theme_get();

      $toggle_color_theme = 'light';

      if ($color_theme === 'light') {
        $toggle_color_theme = 'dark';
      }

      $color_theme_name = $color_theme === 'light' ? esc_html__('Switch to Dark', 'vikinger') : esc_html__('Switch to Light', 'vikinger');

      /**
       * Icon SVG
       */
      get_template_part('template-part/icon/icon', 'svg', [
        'icon'      => $toggle_color_theme . '-theme',
        'modifiers' => 'action-item-icon'
      ]);

    ?>

    <!-- ACTION ITEM TEXT -->
    <p class="action-item-text"><?php echo esc_html($color_theme_name); ?></p>
    <!-- /ACTION ITEM TEXT -->
    </div>
    <!-- /ACTION ITEM -->
  </div>
  <!-- /ACTION ITEM WRAP -->
<?php endif; ?>

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

  // show settings menu
  foreach ($args['settings_navigation_sections'] as $settings_navigation_section) {
    /**
     * Navigation Widget Section
     */
    get_template_part('template-part/navigation/navigation-widget-section', null, [
      'section_name'  => $settings_navigation_section['title'],
      'section_links' => $settings_navigation_section['menu_items']
    ]);
  }

  // show header menu
  if (count($args['header_menu_items']) > 0) {
    $section_name = $args['header_menu_items'][0]['menu_name'];

    /**
     * Navigation Widget Section
     */
    get_template_part('template-part/navigation/navigation-widget-section', null, [
      'section_name'  => $section_name,
      'section_links' => $args['header_menu_items']
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
<header class="header">
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
    <div class="sidemenu-trigger navigation-widget-trigger <?php echo $vikinger_settings['sidemenu_active'] ? 'active' : ''; ?>">
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
    get_template_part('template-part/search/search', 'form', [
      'attributes'  => [
        'userid'  => $args['user']['id']
      ]
    ]);

  ?>
  </div>
  <!-- /HEADER ACTIONS -->
  <?php endif; ?>

  <?php if (vikinger_plugin_buddypress_is_active() || vikinger_plugin_woocommerce_is_active() || $display_search) : ?>
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

    <?php if (vikinger_plugin_buddypress_is_active()) : ?>
      <?php if (!vikinger_plugin_woocommerce_is_active()) : ?>
        <?php if (bp_is_active('friends')) : ?>
        <!-- ACTION LIST ITEM -->
        <a class="action-list-item" href="<?php echo esc_url($args['user']['friend_requests_link']); ?>">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'friend',
            'modifiers' => 'action-list-item-icon'
          ]);

        ?>
        </a>
        <!-- /ACTION LIST ITEM -->
        <?php endif; ?>
      <?php endif; ?>

      <?php

        if (bp_is_active('messages')) :
          $unread_messages_count = bp_get_total_unread_messages_count($args['user']['id']);
          $unread_messages_count_classes = $unread_messages_count > 0 ? 'unread' : '';

      ?>
      <!-- ACTION LIST ITEM -->
      <a class="action-list-item <?php echo esc_attr($unread_messages_count_classes); ?>" href="<?php echo esc_url($args['user']['messages_link']); ?>">
      <?php

        /**
         * Icon SVG
         */
        get_template_part('template-part/icon/icon', 'svg', [
          'icon'      => 'messages',
          'modifiers' => 'action-list-item-icon'
        ]);

      ?>
      </a>
      <!-- /ACTION LIST ITEM -->
      <?php endif; ?>

      <?php

        if (bp_is_active('notifications')) :
          $unread_notifications_count = vikinger_get_unread_notifications_count($args['user']['id']);
          $unread_notifications_count_classes = $unread_notifications_count > 0 ? 'unread' : '';

      ?>
      <!-- ACTION LIST ITEM -->
      <a class="action-list-item <?php echo esc_attr($unread_notifications_count_classes); ?>" href="<?php echo esc_url($args['user']['notifications_link']); ?>">
      <?php

        /**
         * Icon SVG
         */
        get_template_part('template-part/icon/icon', 'svg', [
          'icon'      => 'notification',
          'modifiers' => 'action-list-item-icon'
        ]);

      ?>
      </a>
      <!-- /ACTION LIST ITEM -->
      <?php endif; ?>
    <?php endif; ?>

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

    // add GamiPress rank data if plugin is active
    if (vikinger_plugin_gamipress_is_active()) :
      if (array_key_exists('rank', $args['user']) && ($args['user']['rank']['total'] !== 0)) :
  
  ?>
    <!-- PROGRESS STAT -->
    <div class="progress-stat">
      <!-- BAR PROGRESS WRAP -->
      <div class="bar-progress-wrap">
        <!-- BAR PROGRESS INFO -->
        <p class="bar-progress-info"><?php esc_html_e('Rank', 'vikinger'); ?>: <span class="bar-progress-text"></span></p>
        <!-- /BAR PROGRESS INFO -->
      </div>
      <!-- /BAR PROGRESS WRAP -->
  
      <!-- PROGRESS STAT BAR -->
      <div class="progress-stat-bar user-rank-pgb" data-scalestop="<?php echo esc_attr($args['user']['rank']['current']); ?>" data-scaleend="<?php echo esc_attr($args['user']['rank']['total']); ?>"></div>
      <!-- /PROGRESS STAT BAR -->
    </div>
    <!-- /PROGRESS STAT -->
  <?php

      endif;

      if ($args['points'] && (count($args['points']) > 0)) {
        /**
         * Point Item List
         */
        get_template_part('template-part/point/point-item', 'list', [
          'points'    => $args['points']
        ]);
      }
    
    endif;

    if (vikinger_plugin_woocommerce_is_active()) {
      /**
       * WooCommerce Header Mini Cart
       */
      get_template_part('template-part/woocommerce/woocommerce-header-mini-cart');
    }

    // add BuddyPress notifications if plugin is active
    if (vikinger_plugin_buddypress_is_active()) :
  ?>

    <!-- HEADER NOTIFICATIONS -->
    <div id="header-notifications"></div>
    <!-- /HEADER NOTIFICATIONS -->

  <?php
    endif;

    if (vikinger_customizer_color_theme_switch_is_active()) :
  ?>

    <!-- ACTION ITEM WRAP -->
    <div class="action-item-wrap">
      <!-- ACTION ITEM -->
      <div class="action-item hoverable vk-theme-toggle">
      <?php

        $color_theme = vikinger_logged_user_color_theme_get();

        $toggle_color_theme = 'light';

        if ($color_theme === 'light') {
          $toggle_color_theme = 'dark';
        }

        /**
         * Icon SVG
         */
        get_template_part('template-part/icon/icon', 'svg', [
          'icon'      => $toggle_color_theme . '-theme',
          'modifiers' => 'action-item-icon'
        ]);

      ?>
      </div>
      <!-- /ACTION ITEM -->
    </div>
    <!-- /ACTION ITEM WRAP -->
  <?php
    endif;
  ?>

    <!-- ACTION ITEM WRAP -->
    <div class="action-item-wrap">
      <!-- ACTION ITEM -->
      <div class="action-item dark header-settings-dropdown-trigger">
      <?php

        /**
         * Icon SVG
         */
        get_template_part('template-part/icon/icon', 'svg', [
          'icon'      => 'settings',
          'modifiers' => 'action-item-icon'
        ]);

      ?>
      </div>
      <!-- /ACTION ITEM -->

    <?php

      /**
       * Dropdown Navigation
       */
      get_template_part('template-part/navigation/dropdown-navigation', null, [
        'modifiers'           => 'header-settings-dropdown',
        'user'                => $args['user'],
        'navigation_sections' => $args['settings_navigation_sections']
      ]);

    ?>
    </div>
    <!-- /ACTION ITEM WRAP -->
  </div>
  <!-- /HEADER ACTIONS -->
</header>
<!-- /HEADER -->