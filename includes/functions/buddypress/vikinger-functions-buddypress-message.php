<?php
/**
 * Functions - BuddyPress - Message
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_get_messages')) {
  /**
   * Returns filtered message data, or false on error
   * 
   * @param array     $args      Filters for the notifications query
   * @return array|boolean
   */
  function vikinger_get_messages($args = []) {
    $defaults = [
      'per_page'  => 20
    ];

    $args = array_merge($defaults, $args);

    $request = new WP_REST_Request('GET', '/buddypress/v1/messages');

    /**
     * Filter messages args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_messages_get_args', $args);

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $response = rest_do_request($request);

    $messages = [];

    // if request was succesfull
    if ($response->status === 200) {
      foreach ($response->data as $bp_message) {
        $messages[] = vikinger_get_message_data($bp_message, $args);
      }
    } else {
      return false;
    }

    $message_results = [
      'data'     => $messages,
      'headers'  => $response->headers
    ];

    /**
     * Filter messages results.
     * 
     * @since 1.9.1
     * 
     * @param array $message_results
     */
    $message_results = apply_filters('vikinger_messages_get_results', $message_results);

    return $message_results;
  }
}

if (!function_exists('vikinger_get_message')) {
  /**
   * Get a message thread
   * 
   * @param int     $thread_id        ID of the message thread to get
   * @return array|boolean
   */
  function vikinger_get_message($thread_id) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/messages/' . $thread_id);

    $response = rest_do_request($request);

    // if request was succesfull
    if ($response->status === 200) {
      $message = vikinger_get_message_data($response->data[0]);

      return $message;
    }

    return false;
  }
}

if (!function_exists('vikinger_get_message_data')) {
  /**
   * Get message data from a bp_message object.
   * 
   * @param object  $bp_message       BP message object.
   * @param array   $args             Query args
   * @return array  $message_data     Message data.
   */
  function vikinger_get_message_data($bp_message, $args = []) {
    $message_data = [
      'id'              => $bp_message['id'],
      'date'            => $bp_message['date'],
      'unread_count'    => $bp_message['unread_count'],
      'subject'         => $bp_message['subject']['rendered'],
      'content'         => html_entity_decode(wp_strip_all_tags($bp_message['message']['rendered']), ENT_QUOTES),
      'link'            => bp_get_message_thread_view_link($bp_message['id']),
      'user'            => vikinger_members_get_fallback($bp_message['last_sender_id']),
      'timestamp'       => sprintf(
        esc_html_x('%s ago', 'Message Timestamp', 'vikinger'),
        human_time_diff(
          mysql2date('U', get_date_from_gmt($bp_message['date'])),
          current_time('timestamp')
        )
      ),
      'messages'        => [],
      'recipients'      => [],
      'starred'         => count($bp_message['starred_message_ids']) > 0,
      'recipients_ids'  => []
    ];

    // get thread recipients
    foreach ($bp_message['recipients'] as $recipient) {
      $message_data['recipients_ids'][] = $recipient['id'];

      // if filtered by user id, and recipient id equals that user id, don't include as recipient
      // TLDR; don't care to see myself as recipient in messages
      if (array_key_exists('user_id', $args) && ($recipient['user_id'] === (int) $args['user_id'])) {
        continue;
      }

      $message_data['recipients'][] = [
        'id'            => $recipient['id'],
        'is_deleted'    => $recipient['is_deleted'],
        'sender_only'   => $recipient['sender_only'],
        'unread_count'  => $recipient['unread_count'],
        'user'          => vikinger_members_get_fallback($recipient['user_id'])
      ];
    }

    // get thread messages
    foreach ($bp_message['messages'] as $thread_message) {
      $message_data['messages'][] = [
        'id'          => $thread_message['id'],
        'date_sent'   => $thread_message['date_sent'],
        'is_starred'  => $thread_message['is_starred'],
        'subject'     => $thread_message['subject'],
        'content'     => convert_smilies(stripslashes($thread_message['message']['raw'])),
        'link'        => bp_get_message_thread_view_link($thread_message['id']),
        'user'        => vikinger_members_get_fallback($thread_message['sender_id']),
        'timestamp'   => sprintf(
          esc_html_x('%s ago', 'Message Timestamp', 'vikinger'),
          human_time_diff(
            mysql2date('U', get_date_from_gmt($thread_message['date_sent'])),
            current_time('timestamp')
          )
        )
      ];
    }

    /**
     * Filter message data.
     * 
     * @since 1.9.1
     * 
     * @param array $message_data
     */
    $message_data = apply_filters('vikinger_messages_get_data', $message_data);

    return $message_data;
  }
}

if (!function_exists('vikinger_send_message')) {
  /**
   * Start a new messages thread or reply to an existing one
   * 
   * @param array   $args
   * @param int     $args['id']             ID of the messages thread, required if replying to a thread
   * @param string  $args['message']        Content of the message  
   * @param array   $args['recipients']     User IDs of the recipients of the message, required if starting a new thread
   * @param int     $args['sender_id']      User ID of the message sender
   * @return array               
   */
  function vikinger_send_message($args) {
    $request = new WP_REST_Request('POST', '/buddypress/v1/messages');

    $request->set_param('context', 'edit');

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_delete_message_thread')) {
  /**
   * Delete a message thread
   * 
   * @param array $args
   * @param int   $args['thread_id']        ID of the message thread to delete
   * @param int   $args['user_id']          ID of the user that deletes the message thread (to be removed from the thread)
   * @return array
   */
  function vikinger_delete_message_thread($args) {
    $request = new WP_REST_Request('DELETE', '/buddypress/v1/messages/' . $args['thread_id']);

    // set parameters
    $request->set_param('context', 'edit');
    $request->set_param('user_id', $args['user_id']);

    $response = rest_do_request($request);

    return $response;
  }
}

if (!function_exists('vikinger_message_mark_thread_as_read')) {
  /**
   * Mark a message thread as read
   * 
   * @param int $thread_id      ID of the thread to mark as read
   * @return int|boolean
   */
  function vikinger_message_mark_thread_as_read($thread_id) {
    return messages_mark_thread_read($thread_id);
  }
}

if (!function_exists('vikinger_star_message')) {
  /**
   * Star a message
   * 
   * @param int $message_id       ID of the message to star
   * @return array
   */
  function vikinger_star_message($message_id) {
    $request = new WP_REST_Request('PUT', '/buddypress/v1/messages/starred/' . $message_id);

    // set parameters
    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_unstar_message')) {
  /**
   * Unstar a message
   * 
   * @param int $message_id       ID of the message to unstar
   * @return array
   */
  function vikinger_unstar_message($message_id) {
    $request = new WP_REST_Request('PUT', '/buddypress/v1/messages/starred/' . $message_id);

    // set parameters
    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_messages_get_thread_id')) {
  /**
   * Get message thread id from a message id
   * 
   * @param int $message_id         ID of the message.
   * @return bool|int $thread_id    ID of the thread, false on failure.  
   */
  function vikinger_messages_get_thread_id($message_id) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_messages_messages";
    $table = $prefix . $table_name;

    $sql = "SELECT thread_id FROM $table
            WHERE id=%d";

    $result = $wpdb->get_row($wpdb->prepare($sql, [$message_id]));

    $thread_id = false;

    if (!is_null($result)) {
      $thread_id = (int) $result->thread_id;
    }

    return $thread_id;
  }
}

?>