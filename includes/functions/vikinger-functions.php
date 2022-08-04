<?php
/**
 * Functions
 * 
 * @package Vikinger
 * 
 * @since 1.0.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Utils
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-utils.php';

/**
 * Demo
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-demo.php';

/**
 * Settings
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-settings.php';

/**
 * Translation
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-translation.php';

/**
 * Plugin
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-plugin.php';

/**
 * WordPress Login
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-wplogin.php';

/**
 * Blog
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-blog.php';

/**
 * Comment
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-comment.php';

/**
 * User
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-user.php';

if (vikinger_plugin_gamipress_is_active()) {
  /**
   * GamiPress
   */
  require_once VIKINGER_PATH . '/includes/functions/gamipress/vikinger-functions-gamipress.php';
}

/**
 * BuddyPress
 */
require_once VIKINGER_PATH . '/includes/functions/buddypress/vikinger-functions-buddypress.php';

/**
 * VKMedia
 */
require_once VIKINGER_PATH . '/includes/functions/vkmedia/vikinger-functions-vkmedia.php';

/**
 * File
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-file.php';

/**
 * Elementor
 */
require_once VIKINGER_PATH . '/includes/functions/elementor/vikinger-functions-elementor.php';

/**
 * bbPress
 */
require_once VIKINGER_PATH . '/includes/functions/bbpress/vikinger-functions-bbpress.php';

/**
 * BP Better Messages
 */
require_once VIKINGER_PATH . '/includes/functions/bpbettermessages/vikinger-functions-bpbettermessages.php';

/**
 * BP Verified Member
 */
require_once VIKINGER_PATH . '/includes/functions/bpverifiedmember/vikinger-functions-bpverifiedmember.php';

/**
 * WooCommerce
 */
require_once VIKINGER_PATH . '/includes/functions/woocommerce/vikinger-functions-woocommerce.php';

/**
 * Paid Memberships Pro
 */
require_once VIKINGER_PATH . '/includes/functions/pmpro/vikinger-functions-pmpro.php';

/**
 * Stream
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions-stream.php';

/**
 * Advanced Ads
 */
require_once VIKINGER_PATH . '/includes/functions/advancedads/vikinger-functions-advancedads.php';

?>