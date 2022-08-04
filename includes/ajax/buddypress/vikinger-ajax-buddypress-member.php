<?php
/**
 * AJAX - BuddyPress - Member
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_members_get_ajax')) {
  /**
   * Get filtered members
   */
  function vikinger_members_get_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $filters = isset($_POST['filters']) ? $_POST['filters'] : [];

    $members = vikinger_members_get($filters);

    header('Content-Type: application/json');
    
    // return members
    echo json_encode($members);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_members_get_ajax', 'vikinger_members_get_ajax');
add_action('wp_ajax_nopriv_vikinger_members_get_ajax', 'vikinger_members_get_ajax');

if (!function_exists('vikinger_members_get_count_ajax')) {
  /**
   * Get filtered members count
   */
  function vikinger_members_get_count_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $filters = isset($_POST['filters']) ? $_POST['filters'] : [];

    $members_count = vikinger_members_get_count($filters);

    header('Content-Type: application/json');
    
    // return members count
    echo json_encode($members_count);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_members_get_count_ajax', 'vikinger_members_get_count_ajax');
add_action('wp_ajax_nopriv_vikinger_members_get_count_ajax', 'vikinger_members_get_count_ajax');

if (!function_exists('vikinger_member_update_xprofile_data_ajax')) {
  /**
   * Update member xprofile data
   */
  function vikinger_member_update_xprofile_data_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $member_id = isset($args['member_id']) ? (int) $args['member_id'] : false;

    if (!$member_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_xprofile_data_user = $logged_user_id === $member_id;

    if (!$logged_user_is_xprofile_data_user) {
      wp_die('Unauthorized');
    }
    
    $result = vikinger_member_update_xprofile_data($args['fields'], $member_id);

    do_action('gamipress_bp_update_profile', $member_id);

    header('Content-Type: application/json');
    
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_member_update_xprofile_data_ajax', 'vikinger_member_update_xprofile_data_ajax');

if (!function_exists('vikinger_member_avatar_upload_triggers_call_ajax')) {
  /**
   * Call avatar upload triggers
   */
  function vikinger_member_avatar_upload_triggers_call_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $user_id = isset($_POST['user_id']) ? (int) $_POST['user_id'] : false;

    if (!$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_trigger_user = $logged_user_id === $user_id;

    if (!$logged_user_is_trigger_user) {
      wp_die('Unauthorized');
    }

    do_action_deprecated('xprofile_avatar_uploaded', [(int) $user_id], '6.0.0', 'bp_members_avatar_uploaded');
    
    do_action('bp_members_avatar_uploaded', (int) $user_id);

    header('Content-Type: application/json');
    
    echo json_encode(true);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_member_avatar_upload_triggers_call_ajax', 'vikinger_member_avatar_upload_triggers_call_ajax');

if (!function_exists('vikinger_member_cover_upload_triggers_call_ajax')) {
  /**
   * Call cover upload triggers
   */
  function vikinger_member_cover_upload_triggers_call_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $user_id = isset($_POST['user_id']) ? (int) $_POST['user_id'] : false;

    if (!$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_trigger_user = $logged_user_id === $user_id;

    if (!$logged_user_is_trigger_user) {
      wp_die('Unauthorized');
    }

    do_action_deprecated('xprofile_cover_image_uploaded', [(int) $user_id], '6.0.0', 'members_cover_image_uploaded');
    
    do_action('members_cover_image_uploaded', (int) $user_id);

    header('Content-Type: application/json');
    
    echo json_encode(true);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_member_cover_upload_triggers_call_ajax', 'vikinger_member_cover_upload_triggers_call_ajax');

if (!function_exists('vikinger_member_avatar_delete_ajax')) {
  /**
   * Delete member avatar
   */
  function vikinger_member_avatar_delete_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $user_id = isset($_POST['user_id']) ? (int) $_POST['user_id'] : false;

    if (!$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_avatar_user = $logged_user_id === $user_id;

    if (!$logged_user_is_avatar_user) {
      wp_die('Unauthorized');
    }

    $result = vikinger_member_avatar_delete($user_id);

    header('Content-Type: application/json');
    
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_member_avatar_delete_ajax', 'vikinger_member_avatar_delete_ajax');

if (!function_exists('vikinger_member_cover_delete_ajax')) {
  /**
   * Delete member cover
   */
  function vikinger_member_cover_delete_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $user_id = isset($_POST['user_id']) ? (int) $_POST['user_id'] : false;

    if (!$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_cover_user = $logged_user_id === $user_id;

    if (!$logged_user_is_cover_user) {
      wp_die('Unauthorized');
    }

    $result = vikinger_member_cover_delete($user_id);

    header('Content-Type: application/json');
    
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_member_cover_delete_ajax', 'vikinger_member_cover_delete_ajax');

if (!function_exists('vikinger_user_meta_update_ajax')) {
  /**
   * Update user metadata
   */
  function vikinger_user_meta_update_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $user_id = isset($args['user_id']) ? (int) $args['user_id'] : false;

    if (!$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_meta_user = $logged_user_id === $user_id;

    if (!$logged_user_is_meta_user) {
      wp_die('Unauthorized');
    }
    
    $result = vikinger_user_meta_update($user_id, $args['metadata']);

    header('Content-Type: application/json');
    
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_user_meta_update_ajax', 'vikinger_user_meta_update_ajax');

if (!function_exists('vikinger_check_password_ajax')) {
  /**
   * Check if a password plain text can be used to generated the password hash
   */
  function vikinger_check_password_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $user_id = isset($args['user_id']) ? (int) $args['user_id'] : false;

    if (!$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_password_user = $logged_user_id === $user_id;

    if (!$logged_user_is_password_user) {
      wp_die('Unauthorized');
    }

    $result = wp_check_password($args['password_plain'], $args['password_hash'], $user_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_check_password_ajax', 'vikinger_check_password_ajax');

if (!function_exists('vikinger_update_password_ajax')) {
  /**
   * Update user password
   */
  function vikinger_update_password_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $user_id = isset($args['user_id']) ? (int) $args['user_id'] : false;

    if (!$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_password_user = $logged_user_id === $user_id;

    if (!$logged_user_is_password_user) {
      wp_die('Unauthorized');
    }
    
    wp_set_password($args['password'], $user_id);

    // wp_set_password logs user out, so we have to log user in again
    $user = get_userdata($user_id);

    $creds = array(
      'user_login'    => $user->user_login,
      'user_password' => $args['password'],
      'remember'      => true
    );

    $result = wp_signon($creds, false);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_update_password_ajax', 'vikinger_update_password_ajax');

if (!function_exists('vikinger_logged_user_delete_account_ajax')) {
  /**
   * Delete logged user account
   */
  function vikinger_logged_user_delete_account_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');
    
    $result = vikinger_logged_user_delete_account();

    header('Content-Type: application/json');
    
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_logged_user_delete_account_ajax', 'vikinger_logged_user_delete_account_ajax');

?>