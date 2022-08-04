<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );

?>

<!-- GRID -->
<div class="grid grid-3-9 medium-space">
<?php

  $member = false;

  if (vikinger_plugin_buddypress_is_active()) {
    $member = vikinger_get_logged_user_member_data();
  }

  $sidebar_menu_sections = vikinger_members_get_settings_navigation_sections($member);

  /**
   * Sidebar Menu
   */
  get_template_part('template-part/sidebar/sidebar-menu', null, [
    'sidebar_menu_sections' => $sidebar_menu_sections
  ]);

?>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
