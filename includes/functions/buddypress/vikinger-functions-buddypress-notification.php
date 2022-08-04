<?php
/**
 * Functions - BuddyPress - Notification
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_get_notifications')) {
  /**
   * Returns filtered notification data, or false on error
   * 
   * @param array     $args      Filters for the notifications query
   * @return array|boolean
   */
  function vikinger_get_notifications($args = []) {
    $defaults = [
      'order_by'    => 'date_notified',
      'sort_order'  => 'DESC',
      'per_page'    => 20
    ];

    $args = array_merge($defaults, $args);

    $notifications = [];

    /**
     * Filter notification args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_notifications_get_args', $args);

    $notifications = vikinger_get_notifications_data($args);

    if (array_key_exists('is_new', $args)) {
      $notifications = vikinger_get_notifications_data($args);
    } else {
      $unread_args = array_merge($args, ['is_new' => true]);
      $unread_notifications = vikinger_get_notifications_data($unread_args);

      $read_args = array_merge($args, ['is_new' => false]);
      $read_notifications = vikinger_get_notifications_data($read_args);

      $notifications = array_merge($read_notifications, $unread_notifications);
    }

    // order notifications by date DESC
    usort($notifications, function ($a, $b) {
      if ($a['date'] > $b['date']) {
        return -1;
      }

      if ($a['date'] < $b['date']) {
        return 1;
      }

      return 0;
    });

    // remove extra results derived from combining read and unread results
    if (count($notifications) > absint($args['per_page'])) {
      $notifications = array_slice($notifications, 0, absint($args['per_page']));
    }

    /**
     * Filter notification results.
     * 
     * @since 1.9.1
     * 
     * @param array $notifications
     */
    $notifications = apply_filters('vikinger_notifications_get_results', $notifications);

    return $notifications;
  }
}

if (!function_exists('vikinger_get_unread_notifications_count')) {
  /**
   * Get unread notifications count
   * 
   * @param int $user_id     ID of the user to get notifications count of.
   */
  function vikinger_get_unread_notifications_count($user_id = 0) {
    if ($user_id === 0) {
      $user_id = get_current_user_id();
    }

    return bp_notifications_get_unread_notification_count($user_id);
  }
}

if (!function_exists('vikinger_get_notifications_data')) {
  /**
   * Get notification data with extra information depending on the notification component and action, or false on error
   * 
   * @param array $args       Filters for the notification data
   * @return array
   */
  function vikinger_get_notifications_data($args) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/notifications');

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $bp_notifications = rest_do_request($request);

    $notifications = [];

    // if request was succesfull
    if ($bp_notifications->status === 200) {
      foreach ($bp_notifications->data as $bp_notification) {
        $notification = $bp_notification;

        // add component specific data
        if ($notification['component'] === 'friends') {
          $notification['user'] = vikinger_members_get_fallback($notification['item_id']);

          // add data according to action
          switch ($notification['action']) {
            case 'friendship_accepted':
              $notification['description'] = sprintf(esc_html__('accepted your %sfriend request%s', 'vikinger'), '<span class="highlighted">', '</span>');
              break;
            case 'friendship_request':
              $notification['description'] = sprintf(esc_html__('sent you a %sfriend request%s', 'vikinger'), '<a class="highlighted" href="' . bp_loggedin_user_domain() . 'settings/friend-requests">', '</a>');
              break;
          }
        } else if ($notification['component'] === 'groups') {
          // add group data
          $notification['group'] = vikinger_groups_get(['include' => [$notification['item_id']]])[0];

          // add data according to action
          switch ($notification['action']) {
            case 'group_invite':
              $user = vikinger_members_get(['include' => [$notification['user_id']]])[0];
              $notification['description'] = sprintf(
                esc_html__('You were %sinvited%s to join the group %s', 'vikinger'),
                '<a href="' . $user['received_group_invitations_link'] . '" class="highlighted">',
                '</a>',
                '<a href="' . $notification['group']['link'] . '" class="bold">' . $notification['group']['name'] . '</a>'
              );
              break;
            case 'new_membership_request':
              $logged_user = vikinger_get_logged_user_member_data();
              $notification['user'] = vikinger_members_get(['include' => [$notification['secondary_item_id']]])[0];
              $notification['description'] = sprintf(
                esc_html__('sent a %srequest%s to join the group %s', 'vikinger'),
                '<a href="' . $logged_user['membership_requests_link'] . '" class="highlighted">',
                '</a>',
                '<a href="' . $notification['group']['link'] . '" class="bold">' . $notification['group']['name'] . '</a>'
              );
              break;
            case 'membership_request_rejected':
              $notification['description'] = sprintf(
                esc_html__('Your %srequest%s to join the group %s was %srejected%s', 'vikinger'),
                '<span class="highlighted">',
                '</span>',
                '<a href="' . $notification['group']['link'] . '" class="bold">' . $notification['group']['name'] . '</a>',
                '<span class="highlighted">',
                '</span>'
              );
              break;
            case 'membership_request_accepted':
              $notification['description'] = sprintf(
                esc_html__('Your %srequest%s to join the group %s was %saccepted%s', 'vikinger'),
                '<span class="highlighted">',
                '</span>',
                '<a href="' . $notification['group']['link'] . '" class="bold">' . $notification['group']['name'] . '</a>',
                '<span class="highlighted">',
                '</span>'
              );
              break;
            case 'member_promoted_to_mod':
              $notification['description'] = sprintf(
                esc_html__('You were %spromoted%s to %smod%s in the group %s', 'vikinger'),
                '<span class="highlighted">',
                '</span>',
                '<span class="highlighted">',
                '</span>',
                '<a href="' . $notification['group']['link'] . '" class="bold">' . $notification['group']['name'] . '</a>'
              );
              break;
            case 'member_promoted_to_admin':
              $notification['description'] = sprintf(
                esc_html__('You were %spromoted%s to %sadmin%s in the group %s', 'vikinger'),
                '<span class="highlighted">',
                '</span>',
                '<span class="highlighted">',
                '</span>',
                '<a href="' . $notification['group']['link'] . '" class="bold">' . $notification['group']['name'] . '</a>'
              );
              break;
          }
        } else if ($notification['component'] === 'messages') {
          // add message data
          // $notification['message'] = vikinger_get_message($notification['item_id']);
          $notification['user'] = vikinger_members_get_fallback($notification['secondary_item_id']);
          $thread_id = vikinger_messages_get_thread_id($notification['item_id']);

          // add data according to action
          switch ($notification['action']) {
            case 'new_message':
              $notification['description'] = sprintf(esc_html__('sent you a %smessage%s', 'vikinger'), '<a class="highlighted" href="' . bp_loggedin_user_domain() . 'settings/messages?message_id=' . $thread_id . '">', '</a>');
              break;
          }
        } else if ($notification['component'] === 'activity') {
          // add activity link
          $notification['link'] = bp_activity_get_permalink($notification['item_id']);
          $notification['user'] = vikinger_members_get(['include' => [$notification['secondary_item_id']]])[0];

          // add data according to action
          switch ($notification['action']) {
            case 'update_reply':
              $notification['description'] = sprintf(esc_html__('posted a comment on your %sstatus update%s', 'vikinger'), '<a class="highlighted" href="' . $notification['link'] . '">', '</a>');
              break;
            case 'new_at_mention':
              $notification['description'] = sprintf(esc_html__('mentioned you on a %sstatus update%s', 'vikinger'), '<a class="highlighted" href="' . $notification['link'] . '">', '</a>');
              break;
            case 'comment_reply':
              $notification['description'] = sprintf(esc_html__('replied to your %scomment%s', 'vikinger'), '<a class="highlighted" href="' . $notification['link'] . '">', '</a>');
              break;
          }
        } else if ($notification['component'] === 'forums') {
          // if bbPress plugin is not active, ignore notification
          if (!vikinger_plugin_bbpress_is_active()) {
            continue;
          }

          $notification['user'] = vikinger_members_get_fallback($notification['secondary_item_id']);
          $reply_id = $notification['item_id'];

          // add data according to action
          if (preg_match('/bbp_new_reply_?.*/', $notification['action'])) {
            $reply_url = bbp_get_reply_url($reply_id);
            $reply_content = vikinger_truncate_text(wp_strip_all_tags(bbp_get_reply_content($reply_id)), 15);

            $topic_id = bbp_get_reply_topic_id($reply_id);
            $topic_title = bbp_get_topic_title($topic_id);

            $notification['description'] = sprintf(
              esc_html__('replied %s"%s"%s in %s%s%s', 'vikinger'),
              '<span class="bold">',
              $reply_content,
              '</span>',
              '<a class="highlighted" href="' . $reply_url . '">',
              $topic_title, '</a>'
            );
          }
        } else {
          // get default notification content

          $notification_ref_array = array(
            $notification['action'],
            $notification['item_id'],
            $notification['secondary_item_id'],
            0,
            'string',
            $notification['action'],
            $notification['name'],
            $notification['id']
          );

          $notification['description'] = apply_filters_ref_array('bp_notifications_get_notifications_for_user', $notification_ref_array);
        }

        $notification['timestamp'] = sprintf(
          esc_html_x('%s ago', 'Notification Timestamp', 'vikinger'),
          human_time_diff(
            mysql2date('U', get_date_from_gmt($notification['date'])),
            current_time('timestamp')
          )
        );

        /**
         * Filter notification data.
         * 
         * @since 1.9.1
         * 
         * @param array $notification
         */
        $notification = apply_filters('vikinger_notifications_get_data', $notification);

        if (!isset($notification['description'])) {
          continue;
        }

        $notifications[] = $notification;
      }
    } else {
      return false;
    }

    return $notifications;
  }
}

if (!function_exists('vikinger_get_notification')) {
  /**
   * Get notification by id.
   * 
   * @param int $notification_id      ID of the notification to get.
   * @return array|bool
   */
  function vikinger_get_notification($notification_id) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/notifications/' . $notification_id);

    $bp_notification = rest_do_request($request);

    $notification = false;

    // if request was succesfull
    if ($bp_notification->status === 200) {
      $notification = $bp_notification->data[0];
    }

    return $notification;
  }
}

if (!function_exists('vikinger_mark_notifications_as_read')) {
  /**
   * Mark multiple notifications as read
   * 
   * @param array $notifications      Array of ids of notifications to mark as read
   * @return array
   */
  function vikinger_mark_notifications_as_read($notifications) {
    foreach ($notifications as $notification_id) {
      $result = vikinger_mark_notification_as_read($notification_id);
    }

    return $result;
  }
}

if (!function_exists('vikinger_mark_notification_as_read')) {
  /**
   * Mark a notification as read
   * 
   * @param int $notification_id      ID of the notification to mark as read
   * @return array
   */
  function vikinger_mark_notification_as_read($notification_id) {
    $request = new WP_REST_Request('PUT', '/buddypress/v1/notifications/' . $notification_id);

    // set parameters
    $request->set_param('context', 'edit');
    $request->set_param('is_new', 0);

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_mark_notifications_as_unread')) {
  /**
   * Mark multiple notifications as unread
   * 
   * @param array $notifications      Array of ids of notifications to mark as unread
   * @return array
   */
  function vikinger_mark_notifications_as_unread($notifications) {
    foreach ($notifications as $notification_id) {
      $result = vikinger_mark_notification_as_unread($notification_id);
    }

    return $result;
  }
}

if (!function_exists('vikinger_mark_notification_as_unread')) {
  /**
   * Mark a notification as unread
   * 
   * @param int $notification_id      ID of the notification to mark as unread
   * @return array
   */
  function vikinger_mark_notification_as_unread($notification_id) {
    $request = new WP_REST_Request('PUT', '/buddypress/v1/notifications/' . $notification_id);

    // set parameters
    $request->set_param('context', 'edit');
    $request->set_param('is_new', 1);

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_delete_notifications')) {
  /**
   * Delete multiple notifications
   * 
   * @param array $notifications      Array of ids of notifications to delete
   * @return array
   */
  function vikinger_delete_notifications($notifications) {
    foreach ($notifications as $notification_id) {
      $result = vikinger_delete_notification($notification_id);
    }

    return $result;
  }
}

if (!function_exists('vikinger_delete_notification')) {
  /**
   * Delete a notification
   * 
   * @param int $notification_id      ID of the notification to delete
   * @return array
   */
  function vikinger_delete_notification($notification_id) {
    $request = new WP_REST_Request('DELETE', '/buddypress/v1/notifications/' . $notification_id);

    // set parameters
    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_notification_get_settings')) {
  /**
   * Returns member notification email settings
   * 
   * @param int     $member_id        ID of the user to return settings from.
   * @return array  $email_settings   User email settings.
   */
  function vikinger_notification_get_settings($member_id) {
    $email_settings_data = [
      /**
       * Activity email settings
       */
      'notification_activity_new_mention',
      'notification_activity_new_reply',

      /**
       * Messages email settings
       */
      'notification_messages_new_message',

      /**
       * Friends email settings
       */
      'notification_friends_friendship_request',
      'notification_friends_friendship_accepted',

      /**
       * Groups email settings
       */
      'notification_groups_invite',
      'notification_groups_group_updated',
      'notification_groups_admin_promotion',
      'notification_groups_membership_request',
      'notification_membership_request_completed'
    ];

    $email_settings = [];

    foreach ($email_settings_data as $email_setting_data) {
      $email_setting_meta = get_user_meta($member_id, $email_setting_data, true);

      if ($email_setting_meta === '') {
        $email_setting_meta = 'yes';
      }

      $email_settings[$email_setting_data] = $email_setting_meta;
    }

    return $email_settings;
  }
}

?>