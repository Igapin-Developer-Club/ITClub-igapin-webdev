<?php
/**
 * AJAX - Backend - Demo
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Creates demo content menus, assigns them to menu locations and creates menu items.
 */
function vikinger_demo_content_menus_create_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_menus_create();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_menus_create_ajax', 'vikinger_demo_content_menus_create_ajax');

/**
 * Deletes demo content menus.
 */
function vikinger_demo_content_menus_delete_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_menus_delete();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_menus_delete_ajax', 'vikinger_demo_content_menus_delete_ajax');

/**
 * Create demo content base pages.
 */
function vikinger_demo_content_base_pages_create_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_base_pages_create();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_base_pages_create_ajax', 'vikinger_demo_content_base_pages_create_ajax');

/**
 * Deletes demo content base pages.
 */
function vikinger_demo_content_base_pages_delete_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_base_pages_delete();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_base_pages_delete_ajax', 'vikinger_demo_content_base_pages_delete_ajax');

/**
 * Create demo content elementor pages.
 */
function vikinger_demo_content_elementor_pages_create_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_elementor_pages_create();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_elementor_pages_create_ajax', 'vikinger_demo_content_elementor_pages_create_ajax');

/**
 * Deletes demo content elementor pages.
 */
function vikinger_demo_content_elementor_pages_delete_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_elementor_pages_delete();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_elementor_pages_delete_ajax', 'vikinger_demo_content_elementor_pages_delete_ajax');

/**
 * Create demo content gamipress pages.
 */
function vikinger_demo_content_gamipress_pages_create_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_gamipress_pages_create();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_gamipress_pages_create_ajax', 'vikinger_demo_content_gamipress_pages_create_ajax');

/**
 * Deletes demo content gamipress pages.
 */
function vikinger_demo_content_gamipress_pages_delete_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_gamipress_pages_delete();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_gamipress_pages_delete_ajax', 'vikinger_demo_content_gamipress_pages_delete_ajax');

/**
 * Create demo content buddypress xprofile field groups.
 */
function vikinger_demo_content_buddypress_xprofile_field_groups_create_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_buddypress_xprofile_field_groups_create();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_buddypress_xprofile_field_groups_create_ajax', 'vikinger_demo_content_buddypress_xprofile_field_groups_create_ajax');

/**
 * Deletes demo content buddypress xprofile field groups.
 */
function vikinger_demo_content_buddypress_xprofile_field_groups_delete_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_demo_content_buddypress_xprofile_field_groups_delete();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_demo_content_buddypress_xprofile_field_groups_delete_ajax', 'vikinger_demo_content_buddypress_xprofile_field_groups_delete_ajax');

?>