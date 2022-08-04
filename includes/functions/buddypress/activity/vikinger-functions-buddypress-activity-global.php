<?php
/**
 * Functions - BuddyPress - Activity - Global
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_get_activities')) {
  /**
   * Returns activity data.
   * 
   * @param array   $args   Filter activities using args data.
   * @return array
   */
  function vikinger_get_activities($args = []) {
    $activities_args = [
      'display_comments'  => 'threaded',
      'show_hidden'       => true
    ];

    $pinned_activity = false;

    if (array_key_exists('include_pinned_from', $args) && $args['include_pinned_from']) {
      $user_id = $args['include_pinned_from'];
      $pinned_activity = vikinger_get_pinned_activity($user_id);

      if ($pinned_activity) {
        $pinned_activity['pinned'] = true;
        $activities_args['exclude'] = $pinned_activity['id'];
      }

      unset($args['include_pinned_from']);
    }

    $activities_args = array_replace_recursive($activities_args, $args);

    /**
     * Filter activity args.
     * 
     * @since 1.9.1
     * 
     * @param array $activities_args
     */
    $activities_args = apply_filters('vikinger_activities_get_args', $activities_args);

    $bp_activities = bp_activity_get($activities_args);
    
    $activities = [
      'activities'      => $pinned_activity ? [$pinned_activity] : [],
      'has_more_items'  => $bp_activities['has_more_items']
    ];

    $logged_in_user_id = bp_loggedin_user_id();
    $logged_in_user_favorites = bp_activity_get_user_favorites($logged_in_user_id);

    foreach ($bp_activities['activities'] as $bp_activity) {
      $activities['activities'][] = vikinger_activity_data_get($bp_activity, $logged_in_user_favorites);
    }

    /**
     * Filter activity results.
     * 
     * @since 1.9.1
     * 
     * @param array $activities
     */
    $activities = apply_filters('vikinger_activities_get_results', $activities);

    return $activities;
  }
}

if (!function_exists('vikinger_activity_data_get')) {
  /**
   * Returns activity data from a bp_activity Object.
   * 
   * @param Object  $bp_activity                  BP activity object.
   * @param array   $logged_in_user_favorites     Logged in user favorites.
   * @return array  $activity_data                Activity data.
   */
  function vikinger_activity_data_get($bp_activity, $logged_in_user_favorites) {
    $comments = property_exists($bp_activity, 'children') ? $bp_activity->children : false;
    $my_comments = [];

    if ($comments) {
      vikinger_get_activity_comments_with_children_recursive($comments, $my_comments);
    }

    $activity_data = [
      'id'                => $bp_activity->id,
      'item_id'           => $bp_activity->item_id,
      'secondary_item_id' => $bp_activity->secondary_item_id,
      'component'         => $bp_activity->component,
      'type'              => $bp_activity->type,
      'action'            => $bp_activity->action,
      'content'           => convert_smilies(stripslashes($bp_activity->content)),
      'date'              => $bp_activity->date_recorded,
      'last_edited'       => vikinger_activity_last_edited_by_get($bp_activity->id),
      'timestamp'         => sprintf(
        esc_html_x('%s ago', 'Activity Comment Timestamp', 'vikinger'),
        human_time_diff(
          mysql2date('U', get_date_from_gmt($bp_activity->date_recorded)),
          current_time('timestamp')
        )
      ),
      'parent'            => $bp_activity->item_id === $bp_activity->secondary_item_id ? 0 : $bp_activity->secondary_item_id,
      'comments'          => $my_comments,
      'comment_count'     => bp_activity_recurse_comment_count($bp_activity),
      'meta'              => bp_activity_get_meta($bp_activity->id),
      'author'            => vikinger_members_get_fallback($bp_activity->user_id),
      'favorite'          => $logged_in_user_favorites ? in_array($bp_activity->id, $logged_in_user_favorites) : false,
      'reactions'         => [],
      'permalink'         => bp_activity_get_permalink($bp_activity->id),
      'hide_sitewide'     => $bp_activity->hide_sitewide
    ];

    // override bbPress group component activity action
    if (($activity_data['component'] === 'groups') && (($activity_data['type'] === 'bbp_topic_create') || ($activity_data['type'] === 'bbp_reply_create'))) {
      $activity_data['action'] = vikinger_bbpress_format_activity_action_new_topic($activity_data['action'], $bp_activity);
    }

    // add vkreact-buddypress reactions data if plugin is active
    if (vikinger_plugin_vkreact_is_active() && vikinger_plugin_vkreact_buddypress_is_active()) {
      $activity_data['reactions'] = vikinger_reactions_insert_user_data(vkreact_bp_get_activity_reactions($bp_activity->id));
    }

    // add group information
    if ($activity_data['component'] === 'groups') {
      $activity_data['group'] = false;
      $activity_group = vikinger_groups_get(['include' => [$bp_activity->item_id], 'data_scope' => 'group-activity']);

      if (is_array($activity_group) && (count($activity_group) > 0)) {
        $activity_data['group'] = $activity_group[0];
      }
    }

    // add friend information
    if ($activity_data['type'] === 'friendship_created') {
      $activity_data['friend'] = vikinger_members_get_fallback($bp_activity->secondary_item_id, 'user-activity-friend');
    }

    // add share information
    if ($activity_data['type'] === 'activity_share') {
      $shared_item = vikinger_get_activities(['in' => $bp_activity->secondary_item_id, 'display_comments' => false])['activities'];

      $activity_data['shared_item'] = count($shared_item) === 1 ? $shared_item[0] : false;
    }

    // add share information
    if ($activity_data['type'] === 'post_share') {
      $shared_item = vikinger_get_posts(['include' => [$bp_activity->secondary_item_id]]);

      $activity_data['shared_item'] = count($shared_item) === 1 ? $shared_item[0] : false;
    }

    // add media information
    if (($activity_data['type'] === 'activity_media') || ($activity_data['type'] === 'activity_video')) {
      // add vkmedia data if plugin is active
      if (vikinger_plugin_vkmedia_is_active()) {
        $activity_data['media'] = vkmedia_get_media($bp_activity->secondary_item_id);
      } else {
        $activity_data['media'] = [];
      }
    }

    // add media information
    if (array_key_exists('uploaded_media_id', $activity_data['meta'])) {
      $uploaded_media_ids = $activity_data['meta']['uploaded_media_id'];

      $uploaded_media = [];

      // fetch all media
      foreach ($uploaded_media_ids as $uploaded_media_id) {
        if (($activity_data['type'] === 'activity_media_update') || ($activity_data['type'] === 'activity_media_upload')) {
          $activity_media_type = 'activity_media';
        } else if (($activity_data['type'] === 'activity_video_update') || ($activity_data['type'] === 'activity_video_upload')) {
          $activity_media_type = 'activity_video';
        }

        $media_activity = vikinger_get_activities(['filter' => ['secondary_id' => $uploaded_media_id, 'action' => $activity_media_type]])['activities'];
        
        if ((count($media_activity) > 0) && !is_null($media_activity[0]['media'])) {
          $uploaded_media[] = $media_activity[0];
        }
      }

      // fetch maximum
      $display_max = 5;
      $uploaded_media_count = count($uploaded_media);
      $uploaded_media_fetch_count = min($display_max, $uploaded_media_count);

      // set more link according to the component where the media was posted on
      if ($bp_activity->component === 'groups') {
        if ($activity_data['group']) {
          $more_link = $activity_data['group']['media_link'];
        } else {
          $more_link = '#';
        }
      } else {
        $more_link = bp_core_get_user_domain($bp_activity->user_id) . 'photos';
      }

      $activity_data['uploaded_media'] = [
        'data'      => array_slice($uploaded_media, 0, $uploaded_media_fetch_count),
        'metadata'  => [
          'more'      => abs($display_max - $uploaded_media_count),
          'more_link' => $more_link
        ]
      ];
    }

    /**
     * Filter activity data.
     * 
     * @since 1.9.1
     * 
     * @param array $activity_data
     */
    $activity_data = apply_filters('vikinger_activities_get_data', $activity_data);

    return $activity_data;
  }
}

if (!function_exists('vikinger_activities_get_count')) {
  /**
   * Returns filtered activities count
   * 
   * @param array   $args               Activity filters.
   * @return array  $activities_count   Filtered activities count.
   */
  function vikinger_activities_get_count($args = []) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/activity');

    $defaults = [
      'per_page' => 1
    ];

    $args = array_merge($defaults, $args);

    /**
     * Filter activity count args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_activities_get_count_args', $args);

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $bp_activities = rest_do_request($request);

    $activities_count = 0;

    // if request was succesfull
    if ($bp_activities->status === 200) {
      if (array_key_exists('X-WP-Total', $bp_activities->headers)) {
        $activities_count = $bp_activities->headers['X-WP-Total'];
      }
    }

    return $activities_count;
  }
}

if (!function_exists('vikinger_get_activity_comments_with_children_recursive')) {
  /**
   * Recursively re-format comment info
   */
  function vikinger_get_activity_comments_with_children_recursive($comments, &$my_comments) {
    foreach ($comments as $comment) {
      // only send required data
      $com = [
        'id'                => $comment->id,
        'component'         => $comment->component,
        'type'              => $comment->type,
        'item_id'           => $comment->item_id,
        'secondary_item_id' => $comment->secondary_item_id,
        'parent'            => $comment->item_id === $comment->secondary_item_id ? 0 : $comment->secondary_item_id,
        'author'            => vikinger_members_get_fallback($comment->user_id),
        'date'              => $comment->date_recorded,
        'content'           => convert_smilies(stripslashes($comment->content)),
        'timestamp'         => sprintf(
          esc_html_x('%s ago', 'Activity Comment Timestamp', 'vikinger'),
          human_time_diff(
            mysql2date('U', get_date_from_gmt($comment->date_recorded)),
            current_time('timestamp')
          )
        ),
        'last_edited'       => vikinger_activity_last_edited_by_get($comment->id),
        'reactions'         => []
      ];

      // add vkreact-buddypress reactions data if plugin is active
      if (vikinger_plugin_vkreact_is_active() && vikinger_plugin_vkreact_buddypress_is_active()) {
        $com['reactions'] = vikinger_reactions_insert_user_data(vkreact_bp_get_activity_reactions($comment->id));
      }

      if ($comment->children) {
        $com['children'] = [];
        vikinger_get_activity_comments_with_children_recursive($comment->children, $com['children']);
      }

      $my_comments[] = $com;
    }
  }
}

if (!function_exists('vikinger_create_activity')) {
  /**
   * Create activity
   * 
   * @param array   $args   Filter activities using args data
   * @return int|boolean
   */
  function vikinger_create_activity($args) {
    // return false;
    $result = bp_activity_add($args);

    // if activity was created successfully, trigger buddypress actions
    // (required for some gamipress triggers to work as they depend on buddypress actions)
    if ($result) {
      $activity_id = $result;
      $logged_in_user_id = get_current_user_id();

      // if created in a group
      if (array_key_exists('component', $args) && ($args['component'] === 'groups')) {
        do_action('bp_groups_posted_update', $args['content'], $logged_in_user_id, $args['item_id'], $activity_id);
      // if created a comment
      } else if (array_key_exists('action', $args) && ($args['action'] === 'activity_comment')) {
        do_action('bp_activity_comment_posted', $activity_id, $args);
      } else {
        do_action('bp_activity_posted_update', $args['content'], $logged_in_user_id, $activity_id);
      }
    }

    // activity ID on success, false on error
    return $result;
  }
}

if (!function_exists('vikinger_activity_update')) {
  /**
   * Update an activity.
   * 
   * @param array $args {
   *   @type int    $id         ID of the activity to update.
   * }
   * @return bool $result      True if successfull update, false otherwise.
   */
  function vikinger_activity_update($args) {
    // on successfull update, $result equals the activity id
    $result = bp_activity_add($args);

    $activity_id = (int) $args['id'];

    // save edited by information on successfull update
    if (is_numeric($result) && (((int) $result) === $activity_id)) {
      vikinger_activity_last_edited_by_update($activity_id, get_current_user_id());
    }

    return $result;
  }
}


if (!function_exists('vikinger_delete_activity')) {
  /**
   * Delete activity
   * 
   * @param int   $activity_id  ID of the activity to delete
   * @return boolean
   */
  function vikinger_delete_activity($activity_id) {
    vikinger_activity_associated_media_delete($activity_id);

    $result = bp_activity_delete_by_activity_id($activity_id);

    // true on success, false on error
    return $result;
  }
}

if (!function_exists('vikinger_activity_associated_media_activities_get')) {
  /**
   * Get media activities associated to an activity
   * 
   * @param int $activity_id    ID of the activity to get associated media activities of.
   * @return bool|array         Associated media activities, false if there aren't any.
   */
  function vikinger_activity_associated_media_activities_get($activity_id) {
    $activity_meta = bp_activity_get_meta($activity_id);

    if (!array_key_exists('uploaded_media_id', $activity_meta)) {
      return false;
    }

    $media_activities = [];

    foreach ($activity_meta['uploaded_media_id'] as $uploaded_media_id) {
      $media_activities[] = vikinger_get_activities([
        'filter'  => [
          'action'        => [
            'activity_media',
            'activity_video'
          ],
          'secondary_id'  => $uploaded_media_id
        ]
      ]);
    }

    return $media_activities;
  }
}

if (!function_exists('vikinger_activity_associated_media_delete')) {
  /**
   * Delete media associated to an activity
   * 
   * @param int $activity_id    ID of the activity to delete associated media of.
   * @return bool
   */
  function vikinger_activity_associated_media_delete($activity_id) {
    $activity_meta = bp_activity_get_meta($activity_id);

    if (!array_key_exists('uploaded_media_id', $activity_meta)) {
      return true;
    }

    foreach ($activity_meta['uploaded_media_id'] as $uploaded_media_id) {
      $bp_media_activities = bp_activity_get([
        'filter'  => [
          'action'        => [
            'activity_media',
            'activity_video'
          ],
          'secondary_id'  => $uploaded_media_id
        ]
      ])['activities'];

      if (count($bp_media_activities) > 0) {
        $bp_media_activity = $bp_media_activities[0];

        $media_activity = [
          'id'        => $bp_media_activity->id,
          'component' => [
            'id'    => $bp_media_activity->item_id,
            'type'  => $bp_media_activity->component === 'activity' ? 'member' : 'group'
          ],
          'media'     => (array) vkmedia_get_media($uploaded_media_id)
        ];
    
        // remove activity media
        $activity_delete_result = bp_activity_delete_by_activity_id($media_activity['id']);
    
        if ($activity_delete_result) {
          // remove media file entry from vkmedia table
          $vkmedia_entry_delete_result = vkmedia_delete_media((int) $media_activity['media']['id']);
    
          // remove media file from server
          $file_path = vikinger_get_component_upload_path($media_activity['component']) . '/' . $media_activity['media']['name'] . '.' . $media_activity['media']['type'];
          $file_delete_result = vikinger_delete_file($file_path);
        }
      }
    }

    return true;
  }
}

if (!function_exists('vikinger_activity_comment_delete')) {
  /**
   * Delete activity comment
   * 
   * @param int   $activity_id      ID of the activity the comment belongs to.
   * @param int   $comment_id       ID of the activity comment to delete.
   * @return bool $result           True if successful delete, false otherwise.
   */
  function vikinger_activity_comment_delete($activity_id, $comment_id) {
    $result = bp_activity_delete_comment($activity_id, $comment_id);

    return $result;
  }
}

if (!function_exists('vikinger_update_activity_meta')) {
  /**
   * Update activity meta
   * 
   * @param array   $args   Filter activities using args data
   * @return int|boolean
   */
  function vikinger_update_activity_meta($args) {
    $result = bp_activity_update_meta($args['activity_id'], $args['meta_key'], $args['meta_value']);

    // metadata ID on new meta created, true on meta update, false on error
    return $result;
  }
}

if (!function_exists('vikinger_add_activity_meta')) {
  /**
   * Add activity meta
   * 
   * @param array   $args   Filter activities using args data
   * @return int|boolean
   */
  function vikinger_add_activity_meta($args) {
    $result = bp_activity_add_meta($args['activity_id'], $args['meta_key'], $args['meta_value']);

    // metadata ID on new meta created, false on error
    return $result;
  }
}

if (!function_exists('vikinger_add_favorite_activity')) {
  /**
   * Add activity to user favorites
   * 
   * @param int   $activityID   ID of the activity to add to user favorites
   * @param int   $userID       ID of the user to add the activity to favorites
   * @return boolean
   */
  function vikinger_add_favorite_activity($activityID, $userID) {
    $result = bp_activity_add_user_favorite($activityID, $userID);

    // true on success, false on error
    return $result;
  }
}

if (!function_exists('vikinger_remove_favorite_activity')) {
  /**
   * Remove activity from user favorites
   * 
   * @param int   $activityID   ID of the activity to remove from user favorites
   * @param int   $userID       ID of the user to remove the activity from favorites
   * @return boolean
   */
  function vikinger_remove_favorite_activity($activityID, $userID) {
    $result = bp_activity_remove_user_favorite($activityID, $userID);

    // true on success, false on error
    return $result;
  }
}

if (!function_exists('vikinger_pin_activity')) {
  /**
   * Pin activity by user
   * 
   * @param int   $activityID   ID of the activity to pin
   * @param int   $userID       ID of the user that pins the activity
   * @return int|boolean
   */
  function vikinger_pin_activity($activityID, $userID) {
    $result = bp_update_user_meta($userID, 'vikinger_pinned_activity', $activityID);

    // metaID if it didn't exist, true on success, false on error
    return $result;
  }
}

if (!function_exists('vikinger_unpin_activity')) {
  /**
   * Unpin activity by user
   * 
   * @param int   $userID       ID of the user that unpins the activity
   * @return int|boolean
   */
  function vikinger_unpin_activity($userID) {
    $result = bp_update_user_meta($userID, 'vikinger_pinned_activity', '');

    // metaID if it didn't exist, true on success, false on error
    return $result;
  }
}

if (!function_exists('vikinger_activity_last_edited_by_update')) {
  /**
   * Update activity last_edited_by_user meta value.
   * 
   * @param int $activity_id      ID of the activity to set user that last edited it.
   * @param int $user_id          ID of the user that last edited the activity.
   * @return bool|int Returns false on failure. On successful update of existing
   *                  metadata, returns true. On successful creation of new metadata,
   *                  returns the integer ID of the new metadata row.
   */
  function vikinger_activity_last_edited_by_update($activity_id, $user_id) {
    $result = bp_activity_update_meta($activity_id, 'last_edited_by_user', $user_id);

    return $result;
  }
}

if (!function_exists('vikinger_activity_last_edited_by_get')) {
  /**
   * Returns activity last_edited_by information
   * 
   * @param int         $activity_id             ID of the activity.
   * @return bool|array $last_edited_by_data     Last edited by data if activity was edited, false otherwise.
   */
  function vikinger_activity_last_edited_by_get($activity_id) {
    $last_edited_by_data = false;

    $last_edited_by_user = bp_activity_get_meta($activity_id, 'last_edited_by_user');

    if ($last_edited_by_user) {
      $last_edited_by_data = [
        'user'      => vikinger_members_get_fallback((int) $last_edited_by_user)
      ];
    }

    return $last_edited_by_data;
  }
}

if (!function_exists('vikinger_get_pinned_activity')) {
  /**
   * Get user pinned activity.
   * 
   * @param int   $user_id       ID of the user to get pinned activity from.
   * @return bool|array
   */
  function vikinger_get_pinned_activity($user_id) {
    // meta value if key exists, empty string if not
    $pinned_activity_id = (int) bp_get_user_meta($user_id, 'vikinger_pinned_activity', true);

    $pinned_activity = false;

    if ($pinned_activity_id) {
      $pinned_activity_args = [
        'in'          => $pinned_activity_id,
        'show_hidden' => true
      ];

      $pinned_activity = vikinger_get_activities($pinned_activity_args)['activities'];

      if (count($pinned_activity) === 1) {
        $pinned_activity = $pinned_activity[0];
      }
    }

    return $pinned_activity;
  }
}

if (!function_exists('vikinger_activity_meta_activity_id_get')) {
  /**
   * Get id of the activity that corresponds to the meta value provided
   */
  function vikinger_activity_meta_activity_id_get($meta_value) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_activity_meta";
    $table = $prefix . $table_name;

    $sql = "SELECT activity_id FROM $table
            WHERE meta_value = %d";

    $result = $wpdb->get_row($wpdb->prepare($sql, [$meta_value]));

    if (!is_null($result)) {
      return (int) $result->activity_id;
    }

    return false;
  }
}

if (!function_exists('vikinger_activity_meta_media_count_get')) {
  /**
   * Get count of media associated to the provided activity id
   */
  function vikinger_activity_meta_media_count_get($activity_id) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_activity_meta";
    $table = $prefix . $table_name;

    $sql = "SELECT count(id) AS activity_media_count FROM $table
            WHERE activity_id = %d";

    $result = $wpdb->get_row($wpdb->prepare($sql, [$activity_id]));

    if (!is_null($result)) {
      return (int) $result->activity_media_count;
    }

    return false;
  }
}

?>