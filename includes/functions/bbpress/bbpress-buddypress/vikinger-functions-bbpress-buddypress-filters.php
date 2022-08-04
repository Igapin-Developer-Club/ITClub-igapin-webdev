<?php
/**
 * Functions - bbPress + BuddyPress - Filters
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_bbpress_format_activity_action_new_topic')) {
  /**
   * Action string format for the bbp_topic_create action
   * 
   * @param string $action    Action string
   * @param Object $activity  Activity item object
   * @return string
   */
  function vikinger_bbpress_format_activity_action_new_topic($action, $activity) {
    $pattern = '/<\s*a[^>]*>[^<]*<\s*\/a\s*>\s*/';

    // remove first anchor, which contains user fullname
    return preg_replace($pattern, '', $action, 1);
  }
}

add_filter('bbp_format_activity_action_new_topic', 'vikinger_bbpress_format_activity_action_new_topic', 10, 2);

if (!function_exists('vikinger_bbpress_format_activity_action_new_reply')) {
  /**
   * Action string format for the bbp_reply_create action
   * 
   * @param string $action    Action string
   * @param Object $activity  Activity item object
   * @return string
   */
  function vikinger_bbpress_format_activity_action_new_reply($action, $activity) {
    $pattern = '/<\s*a[^>]*>[^<]*<\s*\/a\s*>\s*/';

    // remove first anchor, which contains user fullname
    return preg_replace($pattern, '', $action, 1);
  }
}

add_filter('bbp_format_activity_action_new_reply', 'vikinger_bbpress_format_activity_action_new_reply', 10, 2);

?>