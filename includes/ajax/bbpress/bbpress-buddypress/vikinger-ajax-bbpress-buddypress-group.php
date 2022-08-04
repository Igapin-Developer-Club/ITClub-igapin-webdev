<?php
/**
 * AJAX - bbPress + BuddyPress - Group
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_bbpress_group_forum_create_ajax')) {
  /**
   * Creates group forum
   */
  function vikinger_bbpress_group_forum_create_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;
    $group_id = isset($_POST['group_id']) ? (int) $_POST['group_id'] : false;

    if (!$args || !$group_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();
    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_bbpress_group_forum_create($args, $group_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_bbpress_group_forum_create_ajax', 'vikinger_bbpress_group_forum_create_ajax');

if (!function_exists('vikinger_bbpress_group_forum_delete_ajax')) {
  /**
   * Deletes a forum
   */
  function vikinger_bbpress_group_forum_delete_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $forum_id = array_key_exists('forum_id', $args) ? (int) $args['forum_id'] : false;
    $group_id = array_key_exists('group_id', $args) ? (int) $args['group_id'] : false;

    if (!$forum_id || !$group_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();
    $logged_user_is_group_admin = groups_is_user_admin($logged_user_id, $group_id);

    if (!$logged_user_is_group_admin) {
      wp_die('Unauthorized');
    }

    $result = vikinger_bbpress_group_forum_delete($forum_id, $group_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_bbpress_group_forum_delete_ajax', 'vikinger_bbpress_group_forum_delete_ajax');

if (!function_exists('vikinger_bbpress_group_forum_associate_get_ajax')) {
  /**
   * Returns id of forum associated with a group
   */
  function vikinger_bbpress_group_forum_associate_get_ajax() {
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

    $result = vikinger_bbpress_group_forum_associate_get($group_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_bbpress_group_forum_associate_get_ajax', 'vikinger_bbpress_group_forum_associate_get_ajax');

?>