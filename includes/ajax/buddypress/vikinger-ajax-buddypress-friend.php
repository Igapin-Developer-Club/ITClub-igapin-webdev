<?php
/**
 * AJAX - BuddyPress - Friend
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_friend_add_ajax')) {
  /**
   * Add a friend
   */
  function vikinger_friend_add_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $initiator_userid = array_key_exists('initiator_userid', $args) ? (int) $args['initiator_userid'] : false;
    $friend_userid = array_key_exists('friend_userid', $args) ? (int) $args['friend_userid'] : false;

    if (!$initiator_userid || !$friend_userid) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_friendship_initiator = $logged_user_id === $initiator_userid;

    if (!$logged_user_is_friendship_initiator) {
      wp_die('Unauthorized');
    }

    $result = vikinger_friend_add($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_friend_add_ajax', 'vikinger_friend_add_ajax');

if (!function_exists('vikinger_friend_remove_ajax')) {
  /**
   * Remove a friend
   */
  function vikinger_friend_remove_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $friendship_id = array_key_exists('friendship_id', $args) ? (int) $args['friendship_id'] : false;

    if (!$friendship_id) {
      wp_die('Missing Parameters');
    }

    $friendship_user_ids = vikinger_friend_friendship_user_ids_get($friendship_id);

    if (!$friendship_user_ids) {
      wp_die('Friendship not found');
    }
    
    $initiator_userid = $friendship_user_ids[0];
    $friend_userid = $friendship_user_ids[1];

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_friendship_participant = ($logged_user_id === $initiator_userid) || ($logged_user_id === $friend_userid);

    if (!$logged_user_is_friendship_participant) {
      wp_die('Unauthorized');
    }

    $result = vikinger_friend_remove($friendship_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_friend_remove_ajax', 'vikinger_friend_remove_ajax');

if (!function_exists('vikinger_friend_withdraw_ajax')) {
  /**
   * Withdraw a friend request
   */
  function vikinger_friend_withdraw_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $initiator_userid = array_key_exists('initiator_userid', $args) ? (int) $args['initiator_userid'] : false;
    $friend_userid = array_key_exists('friend_userid', $args) ? (int) $args['friend_userid'] : false;

    if (!$initiator_userid || !$friend_userid) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_friendship_initiator = $logged_user_id === $initiator_userid;

    if (!$logged_user_is_friendship_initiator) {
      wp_die('Unauthorized');
    }

    $result = vikinger_friend_withdraw($initiator_userid, $friend_userid);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_friend_withdraw_ajax', 'vikinger_friend_withdraw_ajax');

if (!function_exists('vikinger_friend_reject_ajax')) {
  /**
   * Reject a friend request
   */
  function vikinger_friend_reject_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $friendship_id = array_key_exists('friendship_id', $args) ? (int) $args['friendship_id'] : false;

    if (!$friendship_id) {
      wp_die('Missing Parameters');
    }

    $friendship_user_ids = vikinger_friend_friendship_user_ids_get($friendship_id);

    if (!$friendship_user_ids) {
      wp_die('Friendship not found');
    }
    
    $friend_userid = $friendship_user_ids[1];

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_friendship_receiver = $logged_user_id === $friend_userid;

    if (!$logged_user_is_friendship_receiver) {
      wp_die('Unauthorized');
    }

    $result = vikinger_friend_reject($friendship_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_friend_reject_ajax', 'vikinger_friend_reject_ajax');

if (!function_exists('vikinger_friend_accept_ajax')) {
  /**
   * Accept a friend request
   */
  function vikinger_friend_accept_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $friendship_id = array_key_exists('friendship_id', $args) ? (int) $args['friendship_id'] : false;

    if (!$friendship_id) {
      wp_die('Missing Parameters');
    }

    $friendship_user_ids = vikinger_friend_friendship_user_ids_get($friendship_id);

    if (!$friendship_user_ids) {
      wp_die('Friendship not found');
    }
    
    $friend_userid = $friendship_user_ids[1];

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_friendship_receiver = $logged_user_id === $friend_userid;

    if (!$logged_user_is_friendship_receiver) {
      wp_die('Unauthorized');
    }
    
    $result = vikinger_friend_accept($friendship_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_friend_accept_ajax', 'vikinger_friend_accept_ajax');

?>