<?php
/**
 * Functions - Comment
 * 
 * @package Vikinger
 * 
 * @since 1.0.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_create_comment')) {
  /**
   * Creates a new comment
   * 
   * @param array   $comment_data   Data of comment to create
   * @return int
   */
  function vikinger_create_comment($comment_data = []) {
    // comment ID on success, false on error
    $result = wp_new_comment($comment_data);
    
    return $result;
  }
}

if (!function_exists('vikinger_comment_update')) {
  /**
   * Updates a comment
   * 
   * @param array $args {
   *   @type int      $comment_ID         ID of the comment to update.
   *   @type string   $comment_content    New content of the comment.
   * }
   * @return int|bool $result   The value 1 if the comment was updated, 0 if not updated. False on error.
   */
  function vikinger_comment_update($args) {
    $result = wp_update_comment($args);

    $comment_id = (int) $args['comment_ID'];

    // save edited by information on successfull update
    if (is_numeric($result) && (((int) $result) === 1)) {
      vikinger_comment_last_edited_by_update($comment_id, get_current_user_id());
    }

    return $result;
  }
}

if (!function_exists('vikinger_post_comment_delete')) {
  /**
   * Delete post comment
   * 
   * @param int $comment_id       ID of the comment to delete.
   * @return bool True if successfull delete, false otherwise.
   */
  function vikinger_post_comment_delete($comment_id) {
    return wp_delete_comment($comment_id, true);
  }
}

if (!function_exists('vikinger_post_comment_children_delete')) {
  /**
   * Delete post comment children
   * 
   * @param int $comment_id       ID of the comment to delete all children from.
   */
  function vikinger_post_comment_children_delete($comment_id) {
    global $wpdb;

    $sql = "SELECT comment_ID FROM $wpdb->comments WHERE comment_parent = %d";

    $comment_children = $wpdb->get_col($wpdb->prepare($sql, $comment_id));

    if (!empty($comment_children)) {
      foreach ($comment_children as $comment_child => $comment_child_id) {
        vikinger_post_comment_delete($comment_child_id);
      }
    }
  }
}

add_action('delete_comment', 'vikinger_post_comment_children_delete');

if (!function_exists('vikinger_comment_last_edited_by_update')) {
  /**
   * Update comment last_edited_by_user meta value
   * 
   * @param int $comment_id       ID of the comment to set user that last edited it.
   * @param int $user_id          ID of the user that last edited the activity.
   * @return bool|int             Meta ID if the key didn't exist, true on successful update, false on failure or
   *                              if the value passed to the function is the same as the one that is already in the database.
   */
  function vikinger_comment_last_edited_by_update($comment_id, $user_id) {
    $result = update_comment_meta($comment_id, 'last_edited_by_user', $user_id);

    return $result;
  }
}

if (!function_exists('vikinger_comment_last_edited_by_get')) {
  /**
   * Returns comment last_edited_by information
   * 
   * @param int         $comment_id             ID of the comment.
   * @return bool|array $last_edited_by_data    Last edited by data if comment was edited, false otherwise.
   */
  function vikinger_comment_last_edited_by_get($comment_id) {
    $last_edited_by_data = false;

    $last_edited_by_user = get_comment_meta($comment_id, 'last_edited_by_user');

    if ($last_edited_by_user) {
      if (vikinger_plugin_buddypress_is_active()) {
        $last_edited_by_data['user'] = vikinger_members_get_fallback((int) $last_edited_by_user);
      } else {
        $last_edited_by_data['user'] = vikinger_user_get_data((int) $last_edited_by_user);
      }
    }

    return $last_edited_by_data;
  }
}

if (!function_exists('vikinger_get_comments')) {
  /**
   * Get filtered comments
   * 
   * @param array   $args   Filters for the comments
   * @return array
   */
  function vikinger_get_comments($args = [], $include_children = true) {
    /**
     * Filter comment args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_comments_get_args', $args);

    $comments = get_comments($args);

    if ($include_children) {
      $comments_with_children = [];

      vikinger_get_comments_with_children_recursive($comments, $comments_with_children);

      $comments = $comments_with_children;
    }

    /**
     * Filter comment results.
     * 
     * @since 1.9.1
     * 
     * @param array $comments
     */
    $comments = apply_filters('vikinger_comments_get_results', $comments);

    return $comments;
  }
}

if (!function_exists('vikinger_get_comments_with_children_recursive')) {
  /**
   * Recursively add children comments
   * 
   * @param array $comments                 Comments returned from get_comments with 'hierarchical'  => 'threaded' arg
   * @param array $comments_with_children   Comments array to fill with comments with recursive children comments as properties
   */
  function vikinger_get_comments_with_children_recursive($comments, &$comments_with_children) {
    foreach ($comments as $comment) {
      // only send required data
      $com = [
        'id'          => $comment->comment_ID,
        'content'     => convert_smilies($comment->comment_content),
        'parent'      => $comment->comment_parent,
        'approved'    => $comment->comment_approved,
        'date'        => $comment->comment_date,
        'timestamp'   => sprintf(
          esc_html_x('%s ago', 'Comment Timestamp', 'vikinger'),
          human_time_diff(
            get_comment_date('U', $comment->comment_ID),
            current_time('timestamp')
          )
        ),
        'last_edited' => vikinger_comment_last_edited_by_get($comment->comment_ID),
        'type'        => $comment->comment_type,
        'reactions'   => []
      ];

      // add vkreact reactions data if plugin is active
      if (vikinger_plugin_vkreact_is_active()) {
        $com['reactions'] = vikinger_reactions_insert_user_data(vkreact_get_postcomment_reactions($comment->comment_ID));
      }

      // not guest
      if (((int)$comment->user_id) !== 0) {
        // add BuddyPress member data if plugin is active
        if (vikinger_plugin_buddypress_is_active()) {
          $com['author'] = vikinger_members_get_fallback($comment->user_id);
        } else {
          $com['author'] = vikinger_user_get_data($comment->user_id);
        }
      } else {
      // guest
        $com['author'] = [
          'id'            => $comment->user_id,
          'name'          => $comment->comment_author,
          'mention_name'  => $comment->comment_author,
          'link'          => $comment->comment_author_url,
          'media_link'    => '',
          'avatar_url'    => get_avatar_url($comment->comment_author_email)
        ];
      }

      $children_comments = $comment->get_children();

      if (count($children_comments)) {
        $com['children'] = [];
        vikinger_get_comments_with_children_recursive($children_comments, $com['children']);
      }

      /**
       * Filter comment data.
       * 
       * @since 1.9.1
       * 
       * @param array $com
       */
      $com = apply_filters('vikinger_comments_get_data', $com);

      $comments_with_children[] = $com;
    }
  }
}

if (!function_exists('vikinger_get_post_top_level_comment_count')) {
  /**
   * Returns post total top level comment count
   * 
   * @param int   $post_id   Post ID to get total top level comment count from
   * @return int
   */
  function vikinger_get_post_top_level_comment_count($post_id) {
    global $wpdb;

    $table = $wpdb->prefix . 'comments';

    $sql = "SELECT COUNT(comment_ID) FROM $table WHERE comment_post_ID=%d AND comment_approved=1 AND comment_parent=0";

    $comment_count = $wpdb->get_var($wpdb->prepare($sql, $post_id));

    return $comment_count;
  }
}

if (!function_exists('vikinger_get_user_total_comment_count')) {
  /**
   * Returns user total comment count
   * 
   * @param int   $user_ID   User ID to get total comment count from
   * @return int
   */
  function vikinger_get_user_total_comment_count($user_ID) {
    global $wpdb;

    $table = $wpdb->prefix . 'comments';

    $sql = "SELECT COUNT(user_id) FROM $table WHERE user_id=%d AND comment_approved=1";

    $comment_count = $wpdb->get_var($wpdb->prepare($sql, $user_ID));

    return $comment_count;
  }
}

?>