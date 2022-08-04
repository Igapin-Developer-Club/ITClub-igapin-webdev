<?php
/**
 * AJAX - bbPress
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Load BuddyPress related AJAX endpoints only
 * when the plugin is installed and active
 */
if (vikinger_plugin_buddypress_is_active()) {
  /**
   * BuddyPress
   */
  require_once VIKINGER_PATH . '/includes/ajax/bbpress/bbpress-buddypress/vikinger-ajax-bbpress-buddypress.php';
}

?>
