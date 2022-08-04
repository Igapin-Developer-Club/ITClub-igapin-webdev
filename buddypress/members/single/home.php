<?php
/**
 * Vikinger Template - BuddyPress Members Home
 * 
 * Determines member template to display
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  /**
   * Redirect admin when trying to access other users settings
   */
  if (bp_is_user_settings() && !bp_is_my_profile() || bp_is_user_messages()) {
    $user_domain = bp_displayed_user_domain();

    wp_safe_redirect(trailingslashit($user_domain . 'activity'));
    exit;
  }

  $displayed_user   = bp_get_displayed_user();
  // xprofile and groups necessary
  $displayed_member = vikinger_members_get(['include' => [$displayed_user->id], 'data_scope' => 'user-preview']);

  // if user isn't activated (user_status = 2) or marked as spam (user_status = 1)
  // redirect to home
  if (count($displayed_member) === 0) {
    wp_safe_redirect(home_url('/'));
    exit;
  }

  $displayed_member = $displayed_member[0];

  $sidebar_menu_sections = vikinger_members_get_settings_navigation_sections($displayed_member);

  set_query_var('member', $displayed_member);

  // if user settings page, load settings banner and sidebar
  if (bp_is_user_settings()) :

?>

<!-- CONTENT GRID -->
<div class="content-grid">
<?php

  $page_header_status = get_theme_mod('vikinger_pageheader_setting_display', 'display');

  if ($page_header_status === 'display') {
    $settings_header_icon_id      = get_theme_mod('vikinger_pageheader_settings_setting_image', false);
    $settings_header_title        = get_theme_mod('vikinger_pageheader_settings_setting_title', esc_html_x('Account Hub', 'Settings Page - Title', 'vikinger'));
    $settings_header_description  = get_theme_mod('vikinger_pageheader_settings_setting_description', esc_html_x('Profile info, notifications, friends, groups, messages and much more!', 'Settings Page - Description', 'vikinger'));

    if ($settings_header_icon_id) {
      $settings_header_icon_url = wp_get_attachment_image_src($settings_header_icon_id , 'full')[0];
    } else {
      $settings_header_icon_url = vikinger_customizer_settings_page_image_get_default();
    }

    /**
     * Section Banner
     */
    get_template_part('template-part/section/section', 'banner', [
      'section_icon_url'    => $settings_header_icon_url,
      'section_title'       => $settings_header_title,
      'section_description' => $settings_header_description
    ]);
  }

?>

  <!-- GRID -->
  <div class="grid grid-3-9 medium-space">
  <?php

    /**
     * Sidebar Menu
     */
    get_template_part('template-part/sidebar/sidebar-menu', null, [
      'sidebar_menu_sections' => $sidebar_menu_sections
    ]);

  else :
    $current_component = bp_current_component();
  
    $nav_items    = vikinger_members_get_navigation_items($displayed_member);
    $subnav_items = vikinger_member_bp_subnavigation_items_get($displayed_member, $current_component);
  
    set_query_var('member', $displayed_member);
    set_query_var('member_navigation_items', $nav_items);
    set_query_var('member_subnavigation_items', $subnav_items);
    set_query_var('current_component', $current_component);

    /**
     * Get members page header
     */
    bp_get_template_part('members/single/member-header');
    
  endif;

  /**
   * Get members page current template
   */ 
  if (bp_is_user_front()) {
    bp_displayed_user_front_template_part();
  } else if (bp_is_user_activity()) {
    bp_get_template_part('members/single/activity');

  } else if (bp_is_user_blogs()) {
    bp_get_template_part('members/single/blogs');

  } else if (bp_is_user_friends()) {
    bp_get_template_part('members/single/friends');

  } else if (bp_is_user_groups()) {
    bp_get_template_part('members/single/groups');

  } else if (bp_is_user_messages()) {
    bp_get_template_part('members/single/messages');

  } else if (bp_is_user_profile()) {
    bp_get_template_part('members/single/profile');

  } else if (bp_is_user_notifications()) {
    bp_get_template_part('members/single/notifications');

  } else if (bp_is_user_settings()) {
    bp_get_template_part('members/single/settings');

  } else {
    bp_get_template_part('members/single/plugins');

  }

  if (!bp_is_user_settings() && $subnav_items) {

?>
    </div>
    <!-- /GRID COLUMN -->
<?php

  }

?>
  </div>
  <!-- /GRID -->
</div>
<!-- /CONTENT GRID -->