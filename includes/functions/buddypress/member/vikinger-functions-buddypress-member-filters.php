<?php
/**
 * Functions - BuddyPress - Member - Filters
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_member_gravatar_disable')) {
  /**
   * Disable Gravatar
   */
  function vikinger_member_gravatar_disable() {
    return true;
  }
}

add_filter('bp_core_fetch_avatar_no_grav', 'vikinger_member_gravatar_disable');

if (!function_exists('vikinger_set_default_member_avatar')) {
  /**
   * Set default member avatar
   */
  function vikinger_set_default_member_avatar() {
    $members_default_avatar_url = vikinger_get_default_member_avatar_url();

    return $members_default_avatar_url;
  }
}

add_filter('bp_core_default_avatar_user', 'vikinger_set_default_member_avatar');

if (!function_exists('vikinger_members_cover_image_setup')) {
  /**
   * Setup member cover preferred image size
   */
  function vikinger_members_cover_image_setup($settings = []) {
    // dimension settings
    $settings['width'] = 1184;
    $settings['height'] = 300;

    return $settings;
  }
}

add_filter('bp_before_members_cover_image_settings_parse_args', 'vikinger_members_cover_image_setup', 10, 1);

?>