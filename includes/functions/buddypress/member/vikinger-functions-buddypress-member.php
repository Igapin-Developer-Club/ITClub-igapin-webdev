<?php
/**
 * Functions - BuddyPress - Member
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Filters
 */
require_once VIKINGER_PATH . '/includes/functions/buddypress/member/vikinger-functions-buddypress-member-filters.php';

if (vikinger_plugin_buddypress_is_active()) {
  /**
   * Actions
   */
  require_once VIKINGER_PATH . '/includes/functions/buddypress/member/vikinger-functions-buddypress-member-actions.php';
}

/**
 * Global
 */
require_once VIKINGER_PATH . '/includes/functions/buddypress/member/vikinger-functions-buddypress-member-global.php';

?>