<?php
/**
 * Functions - BP Verified Member - Global
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_bpverifiedmember_settings_get')) {
  /**
   * Get verified member for buddypress settings
   * 
   * @param string  $scope          Scope to narrow the options that are fetched. One of: 'all', 'activity', 'members', 'topics', 'replies', 'comments', 'posts'.
   *                                Optional. Default: 'all'.
   * @return array  $settings       Settings.
   */
  function vikinger_bpverifiedmember_settings_get($scope = 'all') {
    $settings = [];

    $settings = [
      'bp_verified_member_display_badge_in_profile_username'  => get_option('bp_verified_member_display_badge_in_profile_username', 1) == 1,
      'bp_verified_member_display_badge_in_profile_fullname'  => get_option('bp_verified_member_display_badge_in_profile_fullname', 0) == 1
    ];

    if ($scope === 'all' || $scope === 'activity') {
      $settings['bp_verified_member_display_badge_in_activity_stream'] = get_option('bp_verified_member_display_badge_in_activity_stream', 1) == 1;
    }

    if ($scope === 'all' || $scope === 'members') {
      $settings['bp_verified_member_display_badge_in_members_lists'] = get_option('bp_verified_member_display_badge_in_members_lists', 1) == 1;
    }

    if ($scope === 'all' || $scope === 'topics') {
      $settings['bp_verified_member_display_badge_in_bbp_topics'] = get_option('bp_verified_member_display_badge_in_bbp_topics', 1) == 1;
    }

    if ($scope === 'all' || $scope === 'replies') {
      $settings['bp_verified_member_display_badge_in_bbp_replies'] = get_option('bp_verified_member_display_badge_in_bbp_replies', 1) == 1;
    }

    if ($scope === 'all' || $scope === 'comments') {
      $settings['bp_verified_member_display_badge_in_wp_comments'] = get_option('bp_verified_member_display_badge_in_wp_comments', 1) == 1;
    }

    if ($scope === 'all' || $scope === 'posts') {
      $settings['bp_verified_member_display_badge_in_wp_posts'] = get_option('bp_verified_member_display_badge_in_wp_posts', 1) == 1;
    }
    
    return $settings;
  }
}

if (!function_exists('vikinger_bpverifiedmember_user_is_verified')) {
  /**
   * Check if a user is verified
   */
  function vikinger_bpverifiedmember_user_is_verified($user_id) {
    global $bp_verified_member;

    return $bp_verified_member->is_user_verified($user_id);
  }
}

if (!function_exists('vikinger_bpverifiedmember_badge_get')) {
  /**
   * Get verified member for buddypress badge HTML content
   * 
   * @return string $badge        Verified badge HTML content.
   */
  function vikinger_bpverifiedmember_badge_get() {
    $badge = '';

    // only get settings if the plugin is active
    if (vikinger_plugin_bpverifiedmember_is_active()) {
      global $bp_verified_member;

      $badge = $bp_verified_member->get_verified_badge();
    }

    return $badge;
  }
}

?>