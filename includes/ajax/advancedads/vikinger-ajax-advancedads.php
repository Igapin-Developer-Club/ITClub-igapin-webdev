<?php
/**
 * AJAX - Advanced Ads
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Global
 */
require_once VIKINGER_PATH . '/includes/ajax/advancedads/vikinger-ajax-advancedads-global.php';

/**
 * Load BuddyPress related AJAX endpoints only
 * when the plugin is installed and active
 */
if (vikinger_plugin_buddypress_is_active()) {
  /**
   * BuddyPress
   */
  require_once VIKINGER_PATH . '/includes/ajax/advancedads/advancedads-buddypress/vikinger-ajax-advancedads-buddypress.php';
}

?>