<?php
/**
 * Functions - BuddyPress - Friend
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_get_friends')) {
  /**
   * Returns user friends.
   * 
   * @param array   $args           Friend filters
   * @return array
   */
  function vikinger_get_friends($args, $data_scope = 'user-status') {
    $friend_args = [
      'per_page'  => 0,
      'page'      => 0,
      'filter'    => ''
    ];

    $friend_args = array_replace($friend_args, $args);

    $friends = friends_get_alphabetically($friend_args['user_id'], $friend_args['per_page'], $friend_args['page'], $friend_args['filter']);
    
    $f = [];

    foreach ($friends['users'] as $friend) {
      $user = vikinger_members_get(['include' => [$friend->id], 'data_scope' => $data_scope])[0];
      $user['friendship_id'] = friends_get_friendship_id($friend_args['user_id'], $friend->id);
      $user['friendship_data'] = $friend;
      $f[] = $user;
    }

    return $f;
  }
}

if (!function_exists('vikinger_get_friend_requests_received')) {
  /**
   * Get friend requests received by a member.
   * 
   * @param int     $member_id                  ID of the member to get friend requests received of.
   * @return array  $friend_requests_received   Friend requests received by the member.
   */
  function vikinger_get_friend_requests_received($member_id) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_friends";
    $table = $prefix . $table_name;

    $sql = "SELECT id, initiator_user_id FROM $table
            WHERE friend_user_id=%d AND is_confirmed=0";

    $results = $wpdb->get_results($wpdb->prepare($sql, [$member_id]));

    $friend_requests_received = [];

    if (!is_null($results)) {
      foreach ($results as $result) {
        $friend_requests_received[] = [
          'id'    => absint($result->id),
          'user'  => vikinger_members_get(['include' => [absint($result->initiator_user_id)]])[0]
        ];
      }
    }

    return $friend_requests_received;
  }
}

if (!function_exists('vikinger_get_friend_requests_sent')) {
  /**
   * Get friend requests sent by a member.
   * 
   * @param int     $member_id              ID of the member to get friend requests sent of.
   * @return array  $friend_requests_sent   Friend requests sent by the member.
   */
  function vikinger_get_friend_requests_sent($member_id) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_friends";
    $table = $prefix . $table_name;

    $sql = "SELECT id, friend_user_id FROM $table
            WHERE initiator_user_id=%d AND is_confirmed=0";

    $results = $wpdb->get_results($wpdb->prepare($sql, [$member_id]));

    $friend_requests_sent = [];

    if (!is_null($results)) {
      foreach ($results as $result) {
        $friend_requests_sent[] = [
          'id'    => absint($result->id),
          'user'  => vikinger_members_get(['include' => [absint($result->friend_user_id)]])[0]
        ];
      }
    }

    return $friend_requests_sent;
  }
}

if (!function_exists('vikinger_friend_add')) {
  /**
   * Sends a friend request (or adds a friend if $force_accept is true).
   * 
   * @param array $args
   * @param int     $initiator_userid       ID of the user that initiated the friend request
   * @param int     $friend_userid          ID of the user to become friends with
   * @param boolean $force_accept           When true, friendship is forcefully initiated, when false a friendship request is sent
   * @return boolean
   */
  function vikinger_friend_add($args) {
    $defaults = [
      'force_accept'  => false
    ];

    $args = array_merge($defaults, $args);

    return friends_add_friend($args['initiator_userid'], $args['friend_userid'], $args['force_accept']);
  }
}

if (!function_exists('vikinger_friend_accept')) {
  /**
   * Accepts a friend request (Also initiates a friendship_accepted activity item)
   * 
   * @param int $friendship_id    ID of the friendship object
   * @return boolean
   */
  function vikinger_friend_accept($friendship_id) {
    return friends_accept_friendship($friendship_id);
  }
}

if (!function_exists('vikinger_friend_withdraw')) {
  /**
   * Withdraws a friend request
   * 
   * @param int $initiator_userid ID of the user that made the friendship request
   * @param int $friend_userid    ID of the requested friend
   * @return boolean
   */
  function vikinger_friend_withdraw($initiator_userid, $friend_userid) {
    return friends_withdraw_friendship($initiator_userid, $friend_userid);
  }
}

if (!function_exists('vikinger_friend_reject')) {
  /**
   * Rejects a friend request
   * 
   * @param int $friendship_id    ID of the friendship object
   * @return boolean
   */
  function vikinger_friend_reject($friendship_id) {
    return friends_reject_friendship($friendship_id);
  }
}

if (!function_exists('vikinger_friend_remove')) {
  /**
   * Removes a friend (Will also delete the related friendship_accepted activity item)
   * 
   * @param int $friendship_id       ID of the friendship object
   * @return boolean
   */
  function vikinger_friend_remove($friendship_id) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_friends";
    $table = $prefix . $table_name;

    $sql = "SELECT initiator_user_id, friend_user_id FROM $table
            WHERE id=%d";

    $result = $wpdb->get_row($wpdb->prepare($sql, [$friendship_id]));

    if (!is_null($result)) {
      return friends_remove_friend($result->initiator_user_id, $result->friend_user_id);
    }

    return false;
  }
}

if (!function_exists('vikinger_friend_friendship_user_ids_get')) {
  /**
   * Gets ids of users that are a part of a friendship.
   * 
   * @param int $friendship_id       ID of the friendship.
   * @return array
   */
  function vikinger_friend_friendship_user_ids_get($friendship_id) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_friends";
    $table = $prefix . $table_name;

    $sql = "SELECT initiator_user_id, friend_user_id FROM $table
            WHERE id=%d";

    $result = $wpdb->get_row($wpdb->prepare($sql, [$friendship_id]));

    if (!is_null($result)) {
      return [(int) $result->initiator_user_id, (int) $result->friend_user_id];
    }

    return false;
  }
}

?>