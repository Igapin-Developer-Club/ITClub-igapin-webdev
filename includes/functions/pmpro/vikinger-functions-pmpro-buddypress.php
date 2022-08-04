<?php
/**
 * Functions - Paid Memberships Pro - BuddyPress
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Remove PMPRO buddypress query construct action
 * since it prevents the logged user from being
 * fetched when in the members page
 */
add_action('init', function () {
  remove_action('bp_pre_user_query_construct', 'pmpro_bp_bp_pre_user_query_construct', 1);
}, 30);

if (!function_exists('vikinger_pmpro_buddypress_logged_user_membership_level_options_get')) {
  /**
   * Returns logged user membership level buddypress options
   * 
   * @return array   $membership_level      User membership level options.
   */
  function vikinger_pmpro_buddypress_logged_user_membership_level_options_get() {
    $membership_level_options = pmpro_bp_get_user_options(get_current_user_id());

    return $membership_level_options;
  }
}

if (!function_exists('vikinger_pmpro_buddypress_membership_level_tag_display_on_profile_is_enabled')) {
  /**
   * Returns whether the option to display membership tags on member profiles is enabled or not.
   * 
   * @return bool True if the option to display membership tags on member profiles is enabled.
   */
  function vikinger_pmpro_buddypress_membership_level_tag_display_on_profile_is_enabled() {
    return get_option('pmpro_bp_show_level_on_bp_profile') === 'yes';
  }
}

?>