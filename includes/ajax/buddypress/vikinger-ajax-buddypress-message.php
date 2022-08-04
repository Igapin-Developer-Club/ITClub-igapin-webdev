<?php
/**
 * AJAX - BuddyPress - Message
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_get_messages_ajax')) {
  /**
   * Get filtered messages
   */
  function vikinger_get_messages_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    if (vikinger_plugin_bpbettermessages_is_active()) {
      $messages = BP_Better_Messages()->functions->get_threads_html(get_current_user_id());
    } else {
      $args = (isset($_POST['args']) && is_array($_POST['args'])) ? $_POST['args'] : [];
      $messages = vikinger_get_messages($args);
    }

    header('Content-Type: application/json');
    echo json_encode($messages);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_get_messages_ajax', 'vikinger_get_messages_ajax');
add_action('wp_ajax_nopriv_vikinger_get_messages_ajax', 'vikinger_get_messages_ajax');

if (!function_exists('vikinger_get_message_ajax')) {
  /**
   * Get a message thread
   */
  function vikinger_get_message_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $message = vikinger_get_message($_POST['args']);

    header('Content-Type: application/json');
    echo json_encode($message);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_get_message_ajax', 'vikinger_get_message_ajax');
add_action('wp_ajax_nopriv_vikinger_get_message_ajax', 'vikinger_get_message_ajax');

if (!function_exists('vikinger_send_message_ajax')) {
  /**
   * Send a message or start a new thread
   */
  function vikinger_send_message_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $args = isset($_POST['args']) ? $_POST['args'] : false;

    if (!$args) {
      wp_die('Missing Parameters');
    }

    $sender_id = isset($args['sender_id']) ? (int) $args['sender_id'] : false;

    if (!$sender_id) {
      wp_die('Missing Parameters');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_message_sender_user = $logged_user_id === $sender_id;

    if (!$logged_user_is_message_sender_user) {
      wp_die('Unauthorized');
    }

    $result = vikinger_send_message($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_send_message_ajax', 'vikinger_send_message_ajax');

if (!function_exists('vikinger_star_message_ajax')) {
  /**
   * Star a message
   */
  function vikinger_star_message_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $message_id = isset($_POST['args']) ? (int) $_POST['args'] : false;

    if (!$message_id) {
      wp_die('Missing Parameters');
    }

    $thread_id = vikinger_messages_get_thread_id($message_id);

    if (!$thread_id) {
      wp_die('Thread not found');
    }

    $thread = vikinger_get_message($thread_id);

    if (!$thread) {
      wp_die('Thread not found');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_message_recipient = false;

    foreach ($thread['recipients'] as $recipient) {
      if ($logged_user_id === $recipient['user']['id']) {
        $logged_user_is_message_recipient = true;
        break;
      }
    }

    if (!$logged_user_is_message_recipient) {
      wp_die('Unauthorized');
    }

    $result = vikinger_star_message($message_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_star_message_ajax', 'vikinger_star_message_ajax');

if (!function_exists('vikinger_unstar_message_ajax')) {
  /**
   * Unstar a message
   */
  function vikinger_unstar_message_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $message_id = isset($_POST['args']) ? (int) $_POST['args'] : false;

    if (!$message_id) {
      wp_die('Missing Parameters');
    }

    $thread_id = vikinger_messages_get_thread_id($message_id);

    if (!$thread_id) {
      wp_die('Thread not found');
    }

    $thread = vikinger_get_message($thread_id);

    if (!$thread) {
      wp_die('Thread not found');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_message_recipient = false;

    foreach ($thread['recipients'] as $recipient) {
      if ($logged_user_id === $recipient['user']['id']) {
        $logged_user_is_message_recipient = true;
        break;
      }
    }

    if (!$logged_user_is_message_recipient) {
      wp_die('Unauthorized');
    }

    $result = vikinger_unstar_message($message_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_unstar_message_ajax', 'vikinger_unstar_message_ajax');

if (!function_exists('vikinger_message_mark_thread_as_read_ajax')) {
  /**
   * Mark a message thread as read
   */
  function vikinger_message_mark_thread_as_read_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $thread_id = isset($_POST['args']) ? (int) $_POST['args'] : false;

    if (!$thread_id) {
      wp_die('Missing Parameters');
    }

    $thread = vikinger_get_message($thread_id);

    if (!$thread) {
      wp_die('Thread not found');
    }

    // get logged user id
    $logged_user_id = get_current_user_id();

    $logged_user_is_message_recipient = false;

    foreach ($thread['recipients'] as $recipient) {
      if ($logged_user_id === $recipient['user']['id']) {
        $logged_user_is_message_recipient = true;
        break;
      }
    }

    if (!$logged_user_is_message_recipient) {
      wp_die('Unauthorized');
    }

    $result = vikinger_message_mark_thread_as_read($thread_id);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_message_mark_thread_as_read_ajax', 'vikinger_message_mark_thread_as_read_ajax');

if (!function_exists('vikinger_delete_message_thread_ajax')) {
  /**
   * Delete a message thread
   */
  function vikinger_delete_message_thread_ajax() {
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

    $logged_user_is_thread_delete_user = $logged_user_id === $user_id;

    if (!$logged_user_is_thread_delete_user) {
      wp_die('Unauthorized');
    }
    
    $result = vikinger_delete_message_thread($args);

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_delete_message_thread_ajax', 'vikinger_delete_message_thread_ajax');



?>