<?php
/**
 * AJAX - Backend - Plugin
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Returns required plugins status. 
 */
function vikinger_plugin_get_required_plugins_status_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_plugin_get_required_plugins_status();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_plugin_get_required_plugins_status_ajax', 'vikinger_plugin_get_required_plugins_status_ajax');

/**
 * Install and activate plugin.
 */
function vikinger_plugin_install_and_activate_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }
  
  $result = vikinger_plugin_install_and_activate($_POST['plugin_name']);

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_plugin_install_and_activate_ajax', 'vikinger_plugin_install_and_activate_ajax');

/**
 * Update and activate plugin.
 */
function vikinger_plugin_update_and_activate_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_plugin_update_and_activate($_POST['plugin_name']);

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_plugin_update_and_activate_ajax', 'vikinger_plugin_update_and_activate_ajax');

/**
 * Activate a plugin.
 */
function vikinger_plugin_activate_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_plugin_activate($_POST['plugin_slug']);

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_plugin_activate_ajax', 'vikinger_plugin_activate_ajax');

/**
 * Get selected plugin preset.
 */
function vikinger_plugin_selected_preset_get_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_plugin_selected_preset_get();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_plugin_selected_preset_get_ajax', 'vikinger_plugin_selected_preset_get_ajax');

/**
 * Save selected plugin preset.
 */
function vikinger_plugin_selected_preset_save_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_plugin_selected_preset_save($_POST['preset']);

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_plugin_selected_preset_save_ajax', 'vikinger_plugin_selected_preset_save_ajax');

/**
 * Get custom preset plugins.
 */
function vikinger_plugin_custom_preset_plugins_get_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_plugin_custom_preset_plugins_get();

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_plugin_custom_preset_plugins_get_ajax', 'vikinger_plugin_custom_preset_plugins_get_ajax');

/**
 * Save custom preset plugins.
 */
function vikinger_plugin_custom_preset_plugins_save_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_admin_ajax');

  $logged_user_is_site_admin = current_user_can('administrator');

  if (!$logged_user_is_site_admin) {
    wp_die('Unauthorized');
  }

  $result = vikinger_plugin_custom_preset_plugins_save($_POST['plugins']);

  header('Content-Type: application/json');
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_plugin_custom_preset_plugins_save_ajax', 'vikinger_plugin_custom_preset_plugins_save_ajax');

?>