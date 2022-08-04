<?php
/**
 * Vikinger Template - Header
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php if (has_site_icon()) : ?>
  <!-- favicon -->
  <link rel="icon" href="<?php site_icon_url(); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php

  $loading_screen_status = get_theme_mod('vikinger_loadingscreen_setting_display', 'display');

  if ($loading_screen_status === 'display') :

?>
  <!-- PAGE LOADER -->
  <div class="page-loader">
    <?php

      $loading_screen_logo_id = get_theme_mod('vikinger_loadingscreen_setting_logo', false);
      $loading_screen_logo_url = false;

      if ($loading_screen_logo_id) {
        $loading_screen_logo_url = wp_get_attachment_image_src($loading_screen_logo_id , 'full')[0];
      } else if (has_custom_logo()) {
        $loading_screen_logo_id = get_theme_mod('custom_logo');
        $loading_screen_logo_url = wp_get_attachment_image_src($loading_screen_logo_id , 'full')[0];
      }

      if ($loading_screen_logo_url) :

    ?>
    <!-- PAGE LOADER LOGO -->
    <img class="page-loader-logo" src="<?php echo esc_url($loading_screen_logo_url); ?>" alt="logo">
    <!-- /PAGE LOADER LOGO -->
    <?php

      endif;

    ?>
    <!-- PAGE LOADER INFO -->
    <div class="page-loader-info">
      <!-- PAGE LOADER INFO TITLE -->
      <p class="page-loader-info-title"><?php bloginfo('name'); ?></p>
      <!-- /PAGE LOADER INFO TITLE -->

      <!-- PAGE LOADER INFO TEXT -->
      <p class="page-loader-info-text"><?php echo esc_html_x('Loading...', 'Loading Screen - Text', 'vikinger'); ?></p>
      <!-- /PAGE LOADER INFO TEXT -->
    </div>
    <!-- /PAGE LOADER INFO -->
    
    <!-- PAGE LOADER INDICATOR -->
    <div class="page-loader-indicator loader-bars">
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
    </div>
    <!-- /PAGE LOADER INDICATOR -->
  </div>
  <!-- /PAGE LOADER -->
<?php

  endif;

  $buddypress_plugin_is_active = vikinger_plugin_buddypress_is_active();

  if (($buddypress_plugin_is_active && !bp_is_register_page() && !bp_is_activation_page()) || !$buddypress_plugin_is_active) {

    // add BuddyPress member data if plugin is active
    if ($buddypress_plugin_is_active) {
      $user = vikinger_get_logged_user_member_data('user-sidebar');
    } else {
      $user = vikinger_get_logged_user_data();
    }

    // get header menu data, they display whether the user is logged in or not
    $header_menu_items          = vikinger_menu_get_items('header_menu')['threaded'];
    $header_features_menu_items = vikinger_menu_get_items('header_features_menu')['threaded'];
    $header_features_menu_items = vikinger_menu_group_by_parent($header_features_menu_items);
    
    $side_menu_items            = vikinger_menu_get_items('side_menu');
    $side_menu_items_threaded   = $side_menu_items['threaded'];
    $side_menu_items_flat       = $side_menu_items['flat'];

    $vikinger_settings = vikinger_settings_get();

    // if a user is logged in, show logged in header
    if ($user) {
      $points = false;

      // if gamipress is active, get user points
      if (vikinger_plugin_gamipress_is_active()) {
        // get logged user points data
        $points = vikinger_gamipress_get_user_points($user['id']);
      }

      // get logged user header menu and navigation data
      $settings_navigation_sections = vikinger_members_get_settings_navigation_sections($user);

      /**
       * Header Logged In
       */
      get_template_part('template-part/header/header', 'logged-in', [
        'user'                          => $user,
        'points'                        => $points,
        'side_menu_items'               => $side_menu_items_threaded,
        'side_menu_items_flat'          => $side_menu_items_flat,
        'header_menu_items'             => $header_menu_items,
        'header_features_menu_items'    => $header_features_menu_items,
        'settings_navigation_sections'  => $settings_navigation_sections
      ]);
    } else {
      /**
       * Header Logged Out
       */
      get_template_part('template-part/header/header', 'logged-out', [
        'header_menu_items'           => $header_menu_items,
        'header_features_menu_items'  => $header_features_menu_items,
        'side_menu_items'             => $side_menu_items_threaded,
        'side_menu_items_flat'        => $side_menu_items_flat,
        'vikinger_settings'           => $vikinger_settings
      ]);
    }
  }

?>