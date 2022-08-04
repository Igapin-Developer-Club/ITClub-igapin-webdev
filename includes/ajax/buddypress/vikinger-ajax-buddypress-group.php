<?php
/**
 * AJAX - BuddyPress - Group
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_groups_get_ajax')) {
  /**
   * Get filtered groups
   */
  function vikinger_groups_get_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : [];
    $groups = vikinger_groups_get($_POST['args']);

    header('Content-Type: application/json');
    echo json_encode($groups);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_groups_get_ajax', 'vikinger_groups_get_ajax');
add_action('wp_ajax_nopriv_vikinger_groups_get_ajax', 'vikinger_groups_get_ajax');

if (!function_exists('vikinger_groups_get_count_ajax')) {
  /**
   * Get groups count
   */
  function vikinger_groups_get_count_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : [];
    $groups_count = vikinger_groups_get_count($args);

    header('Content-Type: application/json');
    echo json_encode($groups_count);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_groups_get_count_ajax', 'vikinger_groups_get_count_ajax');
add_action('wp_ajax_nopriv_vikinger_groups_get_count_ajax', 'vikinger_groups_get_count_ajax');

if (!function_exists('vikinger_groups_get_members_ajax')) {
  /**
   * Get filtered group members
   */
  function vikinger_groups_get_members_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : [];
    $group_members = vikinger_groups_get_members($_POST['args']);

    header('Content-Type: application/json');
    echo json_encode($group_members);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_groups_get_members_ajax', 'vikinger_groups_get_members_ajax');
add_action('wp_ajax_nopriv_vikinger_groups_get_members_ajax', 'vikinger_groups_get_members_ajax');

if (!function_exists('vikinger_groups_get_members_count_ajax')) {
  /**
   * Get filtered group members
   */
  function vikinger_groups_get_members_count_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : [];
    $group_members = vikinger_groups_get_members_count($_POST['args']);

    header('Content-Type: application/json');
    echo json_encode($group_members);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_groups_get_members_count_ajax', 'vikinger_groups_get_members_count_ajax');
add_action('wp_ajax_nopriv_vikinger_groups_get_members_count_ajax', 'vikinger_groups_get_members_count_ajax');

if (!function_exists('vikinger_group_create_ajax')) {
  /**
   * Creates a group
   */
  function vikinger_group_create_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $creator_id = array_key_exists('creator_id', $args) ? (int) $args['creator_id'] : false;

    if (!$creator_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_creator = $logged_user_id === $creator_id;

    if (!$logged_user_is_group_creator) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_create($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_create_ajax', 'vikinger_group_create_ajax');

if (!function_exists('vikinger_group_update_ajax')) {
  /**
   * Updates a group
   */
  function vikinger_group_update_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = array_key_exists('id', $args) ? (int) $args['id'] : false;

    if (!$group_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    if (array_key_exists('enable_forum', $args)) {
      $args['enable_forum'] = (int) ($args['enable_forum'] === 'true');
    }

    $result = vikinger_group_update($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_update_ajax', 'vikinger_group_update_ajax');

if (!function_exists('vikinger_group_delete_ajax')) {
  /**
   * Deletes a group
   */
  function vikinger_group_delete_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $group_id = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$group_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_delete($group_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_delete_ajax', 'vikinger_group_delete_ajax');

if (!function_exists('vikinger_group_membership_requests_send_ajax')) {
  /**
   * Request a group membership
   */
  function vikinger_group_membership_requests_send_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $user_id = array_key_exists('user_id', $args) ? (int) $args['user_id'] : false;
    $group_id = array_key_exists('group_id', $args) ? (int) $args['group_id'] : false;

    if (!$group_id || !$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_request_user = $logged_user_id === $user_id;

    if (!$logged_user_is_request_user) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_membership_requests_send($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_membership_requests_send_ajax', 'vikinger_group_membership_requests_send_ajax');

if (!function_exists('vikinger_group_membership_requests_remove_ajax')) {
  /**
   * Remove a group membership
   */
  function vikinger_group_membership_requests_remove_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $membership_request_id = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$membership_request_id) {
      wp_die('Missing Parameters');
    }

    $result = vikinger_group_membership_requests_remove($membership_request_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_membership_requests_remove_ajax', 'vikinger_group_membership_requests_remove_ajax');

if (!function_exists('vikinger_group_membership_requests_accept_ajax')) {
  /**
   * Accept a group membership
   */
  function vikinger_group_membership_requests_accept_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $membership_request_id = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$membership_request_id) {
      wp_die('Missing Parameters');
    }

    $result = vikinger_group_membership_requests_accept($membership_request_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_membership_requests_accept_ajax', 'vikinger_group_membership_requests_accept_ajax');

if (!function_exists('vikinger_group_join_ajax')) {
  /**
   * Adds a member to a group
   */
  function vikinger_group_join_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = array_key_exists('group_id', $args) ? (int) $args['group_id'] : false;
    $user_id = array_key_exists('user_id', $args) ? (int) $args['user_id'] : false;

    if (!$group_id || !$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_join_requester = $logged_user_id === $user_id;

    if (!$logged_user_is_group_join_requester) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_join($group_id, $user_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_join_ajax', 'vikinger_group_join_ajax');

if (!function_exists('vikinger_group_leave_ajax')) {
  /**
   * Removes a member from a group
   */
  function vikinger_group_leave_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = array_key_exists('group_id', $args) ? (int) $args['group_id'] : false;
    $user_id = array_key_exists('user_id', $args) ? (int) $args['user_id'] : false;

    if (!$group_id || !$user_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_leave_requester = $logged_user_id === $user_id;

    if (!$logged_user_is_group_leave_requester) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_leave($group_id, $user_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_leave_ajax', 'vikinger_group_leave_ajax');

if (!function_exists('vikinger_group_member_remove_ajax')) {
  /**
   * Remove a group member
   */
  function vikinger_group_member_remove_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = array_key_exists('group_id', $args) ? (int) $args['group_id'] : false;

    if (!$group_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_member_remove($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_member_remove_ajax', 'vikinger_group_member_remove_ajax');

if (!function_exists('vikinger_group_send_invite_ajax')) {
  /**
   * Send a group invitation
   */
  function vikinger_group_send_invite_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $result = vikinger_group_send_invite($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_send_invite_ajax', 'vikinger_group_send_invite_ajax');

if (!function_exists('vikinger_group_accept_invite_ajax')) {
  /**
   * Accept a group invitation
   */
  function vikinger_group_accept_invite_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $invite_id = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$invite_id) {
      wp_die('Missing Parameters');
    }

    $result = vikinger_group_accept_invite($invite_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_accept_invite_ajax', 'vikinger_group_accept_invite_ajax');

if (!function_exists('vikinger_group_remove_invite_ajax')) {
  /**
   * Remove or reject a group invitation
   */
  function vikinger_group_remove_invite_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $invite_id = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$invite_id) {
      wp_die('Missing Parameters');
    }

    $result = vikinger_group_remove_invite($invite_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_remove_invite_ajax', 'vikinger_group_remove_invite_ajax');

if (!function_exists('vikinger_group_member_promote_to_admin_ajax')) {
  /**
   * Promote a group member to admin
   */
  function vikinger_group_member_promote_to_admin_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = isset($args['group_id']) ? (int) $args['group_id'] : false;
    $member_id = isset($args['member_id']) ? (int) $args['member_id'] : false;

    if (!$group_id || !$member_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_member_promote_to_admin($args);

    do_action('groups_promote_member', $group_id, $member_id, 'admin');
    do_action('groups_promoted_member', $member_id, $group_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_member_promote_to_admin_ajax', 'vikinger_group_member_promote_to_admin_ajax');

if (!function_exists('vikinger_group_member_promote_to_mod_ajax')) {
  /**
   * Promote a group member to mod
   */
  function vikinger_group_member_promote_to_mod_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = isset($args['group_id']) ? (int) $args['group_id'] : false;
    $member_id = isset($args['member_id']) ? (int) $args['member_id'] : false;

    if (!$group_id || !$member_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_member_promote_to_mod($args);

    do_action('groups_promote_member', $group_id, $member_id, 'mod');
    do_action('groups_promoted_member', $member_id, $group_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_member_promote_to_mod_ajax', 'vikinger_group_member_promote_to_mod_ajax');

if (!function_exists('vikinger_group_member_demote_to_member_ajax')) {
  /**
   * Demote a group member to member
   */
  function vikinger_group_member_demote_to_member_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = isset($args['group_id']) ? (int) $args['group_id'] : false;
    $member_id = isset($args['member_id']) ? (int) $args['member_id'] : false;

    if (!$group_id || !$member_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_member_demote_to_member($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_member_demote_to_member_ajax', 'vikinger_group_member_demote_to_member_ajax');

if (!function_exists('vikinger_group_member_demote_to_mod_ajax')) {
  /**
   * Demote a group member to mod
   */
  function vikinger_group_member_demote_to_mod_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = isset($args['group_id']) ? (int) $args['group_id'] : false;
    $member_id = isset($args['member_id']) ? (int) $args['member_id'] : false;

    if (!$group_id || !$member_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_member_demote_to_mod($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_member_demote_to_mod_ajax', 'vikinger_group_member_demote_to_mod_ajax');

if (!function_exists('vikinger_group_member_ban_ajax')) {
  /**
   * Ban a group member
   */
  function vikinger_group_member_ban_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = isset($args['group_id']) ? (int) $args['group_id'] : false;
    $member_id = isset($args['member_id']) ? (int) $args['member_id'] : false;

    if (!$group_id || !$member_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_member_ban($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_member_ban_ajax', 'vikinger_group_member_ban_ajax');

if (!function_exists('vikinger_group_member_unban_ajax')) {
  /**
   * Unban a group member
   */
  function vikinger_group_member_unban_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = isset($args['group_id']) ? (int) $args['group_id'] : false;
    $member_id = isset($args['member_id']) ? (int) $args['member_id'] : false;

    if (!$group_id || !$member_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_member_unban($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_member_unban_ajax', 'vikinger_group_member_unban_ajax');

if (!function_exists('vikinger_group_update_meta_fields_ajax')) {
  /**
   * Update group metadata fields
   */
  function vikinger_group_update_meta_fields_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = isset($args['group_id']) ? (int) $args['group_id'] : false;

    if (!$group_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_group_update_meta_fields($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_update_meta_fields_ajax', 'vikinger_group_update_meta_fields_ajax');

if (!function_exists('vikinger_group_delete_meta_fields_ajax')) {
  /**
   * Delete group metadata fields
   */
  function vikinger_group_delete_meta_fields_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $group_id = isset($args['group_id']) ? (int) $args['group_id'] : false;

    if (!$group_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }
    
    $result = vikinger_group_delete_meta_fields($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_group_delete_meta_fields_ajax', 'vikinger_group_delete_meta_fields_ajax');

?>