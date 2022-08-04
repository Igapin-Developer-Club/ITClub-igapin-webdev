<?php
/**
 * Vikinger USER AJAX
 * 
 * @since 1.0.0
 */

/**
 * Get logged in user member data, or false if no user is logged in
 */
function vikinger_get_logged_user_member_data_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_ajax');
  
  $data_scope = isset($_POST['data_scope']) ? $_POST['data_scope'] : 'user-status';

  if (vikinger_plugin_buddypress_is_active()) {
    $user = vikinger_get_logged_user_member_data($data_scope);
  } else {
    $user = vikinger_get_logged_user_data();
  }

  header('Content-Type: application/json');
  echo json_encode($user);

  wp_die();
}

add_action('wp_ajax_vikinger_get_logged_user_member_data_ajax', 'vikinger_get_logged_user_member_data_ajax');
add_action('wp_ajax_nopriv_vikinger_get_logged_user_member_data_ajax', 'vikinger_get_logged_user_member_data_ajax');

/**
 * Toggle logged user color theme
 */
function vikinger_logged_user_color_theme_toggle_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_ajax');
  
  $result = vikinger_logged_user_color_theme_toggle();

  header('Content-Type: application/json');
  
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_logged_user_color_theme_toggle_ajax', 'vikinger_logged_user_color_theme_toggle_ajax');

/**
 * Update logged user posts grid type
 */
function vikinger_logged_user_grid_type_update_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_ajax');
  
  $result = vikinger_logged_user_grid_type_update($_POST['args']['grid_component'], $_POST['args']['grid_type']);

  header('Content-Type: application/json');
  
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_logged_user_grid_type_update_ajax', 'vikinger_logged_user_grid_type_update_ajax');

/**
 * Update logged user sidemenu status
 */
function vikinger_logged_user_sidemenu_status_update_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_ajax');
  
  $result = vikinger_logged_user_sidemenu_status_update($_POST['args']['sidemenu_status']);

  header('Content-Type: application/json');
  
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_logged_user_sidemenu_status_update_ajax', 'vikinger_logged_user_sidemenu_status_update_ajax');
add_action('wp_ajax_nopriv_vikinger_logged_user_sidemenu_status_update_ajax', 'vikinger_logged_user_sidemenu_status_update_ajax');

/**
 * Get logged user stream username
 */
function vikinger_logged_user_stream_username_get_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_ajax');
  
  $result = vikinger_logged_user_stream_username_get();

  header('Content-Type: application/json');
  
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_logged_user_stream_username_get_ajax', 'vikinger_logged_user_stream_username_get_ajax');

/**
 * Update logged user stream username
 */
function vikinger_logged_user_stream_username_update_ajax() {
  // nonce check, dies early if the nonce cannot be verified
  check_ajax_referer('vikinger_ajax');
  
  $result = vikinger_logged_user_stream_username_update($_POST['args']['username']);

  header('Content-Type: application/json');
  
  echo json_encode($result);

  wp_die();
}

add_action('wp_ajax_vikinger_logged_user_stream_username_update_ajax', 'vikinger_logged_user_stream_username_update_ajax');

?>