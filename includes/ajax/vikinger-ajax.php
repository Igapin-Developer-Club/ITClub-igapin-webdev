<?php
/**
 * AJAX
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * User
 */
require_once VIKINGER_PATH . '/includes/ajax/vikinger-ajax-user.php';

/**
 * Blog
 */
require_once VIKINGER_PATH . '/includes/ajax/vikinger-ajax-blog.php';

/**
 * Comment
 */
require_once VIKINGER_PATH . '/includes/ajax/vikinger-ajax-comment.php';

/**
 * Load BuddyPress related AJAX endpoints only
 * when the plugin is installed and active
 */
if (vikinger_plugin_buddypress_is_active()) {
  /**
   * BuddyPress
   */
  require_once VIKINGER_PATH . '/includes/ajax/buddypress/vikinger-ajax-buddypress.php';
}

/**
 * Load bbPress related AJAX endpoints only
 * when the plugin is installed and active
 */
if (vikinger_plugin_bbpress_is_active()) {
  /**
   * bbPress
   */
  require_once VIKINGER_PATH . '/includes/ajax/bbpress/vikinger-ajax-bbpress.php';
}

/**
 * Load Advanced Ads related AJAX endpoints only
 * when the plugin is installed and active
 */
if (vikinger_plugin_advancedads_pro_is_active()) {
  /**
   * Advanced Ads
   */
  require_once VIKINGER_PATH . '/includes/ajax/advancedads/vikinger-ajax-advancedads.php';
}

/**
 * Load backend related AJAX endpoints only
 * when on the WordPress backend
 */
if (is_admin()) {
  /**
   * Backend
   */
  require_once VIKINGER_PATH . '/includes/ajax/backend/vikinger-ajax-backend.php';
}

?>