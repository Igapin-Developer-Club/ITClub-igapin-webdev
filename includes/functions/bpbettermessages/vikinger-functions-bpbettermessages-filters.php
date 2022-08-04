<?php
/**
 * Functions - BP Better Messages - Filters
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_bp_better_messages_location_overwrite')) {
  /**
   * Replace plugin URL with Vikinger URL
   */
  function vikinger_bp_better_messages_location_overwrite($url, $user_id) {
    return bp_core_get_user_domain($user_id) . 'settings/messages/';
  }
}

add_filter('bp_better_messages_page', 'vikinger_bp_better_messages_location_overwrite', 10, 2);

?>