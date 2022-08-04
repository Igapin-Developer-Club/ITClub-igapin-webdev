<?php
/**
 * Functions - BuddyPress - Group - Filters
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_group_cover_image_setup')) {
  /**
   * Setup group cover preferred image size
   */
  function vikinger_group_cover_image_setup($settings = []) {
    // dimension settings
    $settings['width'] = 1184;
    $settings['height'] = 300;

    return $settings;
  }
}

add_filter('bp_before_groups_cover_image_settings_parse_args', 'vikinger_group_cover_image_setup', 10, 1);

if (!function_exists('vikinger_set_default_group_avatar')) {
  /**
   * Set default group avatar
   */
  function vikinger_set_default_group_avatar() {
    $groups_default_avatar_url = vikinger_get_default_group_avatar_url();

    return $groups_default_avatar_url;
  }
}

add_filter('bp_core_default_avatar_group', 'vikinger_set_default_group_avatar');

?>