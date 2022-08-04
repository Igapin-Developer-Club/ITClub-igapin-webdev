<?php
/**
 * AJAX - BuddyPress - Notification
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_get_notifications_ajax')) {
  /**
   * Get filtered notifications
   */
  function vikinger_get_notifications_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = (isset($_POST['args']) && is_array($_POST['args'])) ? $_POST['args'] : [];
    $notifications = vikinger_get_notifications($args);

    header('Content-Type: application/json');
    echo json_encode($notifications);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_get_notifications_ajax', 'vikinger_get_notifications_ajax');
add_action('wp_ajax_nopriv_vikinger_get_notifications_ajax', 'vikinger_get_notifications_ajax');

if (!function_exists('vikinger_get_unread_notifications_count_ajax')) {
  /**
   * Get filtered notifications count
   */
  function vikinger_get_unread_notifications_count_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = (isset($_POST['args']) && is_array($_POST['args'])) ? $_POST['args'] : [];
    $count = vikinger_get_unread_notifications_count($args);

    header('Content-Type: application/json');
    echo json_encode($count);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_get_unread_notifications_count_ajax', 'vikinger_get_unread_notifications_count_ajax');
add_action('wp_ajax_nopriv_vikinger_get_unread_notifications_count_ajax', 'vikinger_get_unread_notifications_count_ajax');

if (!function_exists('vikinger_mark_notifications_as_read_ajax')) {
  /**
   * Mark multiple notifications as read
   */
  function vikinger_mark_notifications_as_read_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $notification_ids = [];

    // get logged user id
    $logged_user_id = get_current_user_id();

    foreach ($args as $notification_id) {
      $notification = vikinger_get_notification($notification_id);

      if ($notification) {
        $notification_owner_id = (int) $notification['user_id'];

        $logged_user_is_notification_owner = $logged_user_id === $notification_owner_id;

        if ($logged_user_is_notification_owner) {
          $notification_ids[] = (int) $notification_id;
        }
      }
    }

    if (count($notification_ids) === 0) {
      wp_die('Unauthorized');
    }

    $result = vikinger_mark_notifications_as_read($notification_ids);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_mark_notifications_as_read_ajax', 'vikinger_mark_notifications_as_read_ajax');

if (!function_exists('vikinger_mark_notification_as_read_ajax')) {
  /**
   * Mark a notification as read
   */
  function vikinger_mark_notification_as_read_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $notification_id = isset($args['id']) ? (int) $args['id'] : false;

    if (!$notification_id) {
      wp_die('Missing Parameters');
    }

    $notification = vikinger_get_notification($notification_id);

    if (!$notification) {
      wp_die('Notification not found');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $notification_owner_id = (int) $notification['user_id'];

    $logged_user_is_notification_owner = $logged_user_id === $notification_owner_id;

    if (!$logged_user_is_notification_owner) {
      wp_die('Unauthorized');
    }
    
    $result = vikinger_mark_notification_as_read($notification_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_mark_notification_as_read_ajax', 'vikinger_mark_notification_as_read_ajax');

if (!function_exists('vikinger_delete_notifications_ajax')) {
  /**
   * Delete a notification
   */
  function vikinger_delete_notifications_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $notification_ids = [];

    // get logged user id
    $logged_user_id = get_current_user_id();

    foreach ($args as $notification_id) {
      $notification = vikinger_get_notification($notification_id);

      if ($notification) {
        $notification_owner_id = (int) $notification['user_id'];

        $logged_user_is_notification_owner = $logged_user_id === $notification_owner_id;

        if ($logged_user_is_notification_owner) {
          $notification_ids[] = (int) $notification_id;
        }
      }
    }

    if (count($notification_ids) === 0) {
      wp_die('Unauthorized');
    }
    
    $result = vikinger_delete_notifications($notification_ids);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_delete_notifications_ajax', 'vikinger_delete_notifications_ajax');

?>