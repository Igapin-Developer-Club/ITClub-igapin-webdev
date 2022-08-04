<?php
/**
 * Functions - GamiPress - Rank
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_gamipress_get_rank_types')) {
  /**
   * Get rank types
   * 
   * @return array
   */
  function vikinger_gamipress_get_rank_types() {
    return gamipress_get_rank_types();
  }
}

if (!function_exists('vikinger_gamipress_rank_type_exists')) {
  /**
   * Check if a rank type exists
   * 
   * @param string $type      Rank type.
   * @return bool  $exists    True if rank type exists, false otherwise.
   */
  function vikinger_gamipress_rank_type_exists($type = '') {
    $rank_types = gamipress_get_rank_types();

    return array_key_exists($type, $rank_types);
  }
}

if (!function_exists('vikinger_gamipress_user_completed_rank')) {
  /**
   * Check if user completed a rank
   * 
   * @param int $rank_id     ID of the rank
   * @param int $user_id     ID of the user to check if the rank is completed
   * @return boolean
   */
  function vikinger_gamipress_user_completed_rank($rank_id, $user_id) {
    $completed_ranks_users = gamipress_get_rank_earners($rank_id);

    foreach ($completed_ranks_users as $completed_ranks_user) {
      if ($completed_ranks_user->ID === $user_id) {
        return true;
      }
    }

    return false;
  }
}

if (!function_exists('vikinger_gamipress_get_rank_completed_users')) {
  /**
   * Get users that completed a rank
   * 
   * @param int $rank_id   ID of the rank to get users that completed it
   * @return array
   */
  function vikinger_gamipress_get_rank_completed_users($rank_id, $args = []) {
    $users = [];

    $rank_users = gamipress_get_rank_earners($rank_id, $args);

    foreach ($rank_users as $rank_user) {
      // check if user exists (if account hasn't been activated yet GamiPress will return the user but BuddyPress won't)
      if (count(vikinger_members_get(['include' => [$rank_user->ID]])) === 1) {
        $users[] = vikinger_members_get(['include' => [$rank_user->ID]])[0];
      }
    }

    return $users;
  }
}

if (!function_exists('vikinger_gamipress_get_ranks')) {
  /**
   * Get filtered ranks.
   * 
   * @param array   $args           Rank filters.
   * @param int     $user_id        ID of the user to return completed rank stats from.
   * @param boolean $completed      True to return only completed ranks, false to return uncompleted ranks.
   * @return array
   */
  function vikinger_gamipress_get_ranks($args = [], $user_id = false, $completed = null) {
    /**
     * Filter rank args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_ranks_get_args', $args);

    $gp_ranks = gamipress_get_ranks($args);

    $ranks = [];

    foreach ($gp_ranks as $gp_rank) {
      $completed_rank = false;
      $lowest_rank = false;

      if ($user_id) {
        if (gamipress_is_lowest_priority_rank($gp_rank->ID)) {
          $lowest_rank = true;
          $completed_rank = true;
        } else {
          $completed_rank = vikinger_gamipress_user_completed_rank($gp_rank->ID, $user_id);
        }

        // if completed arg supplied, use it to skip achievements accordingly
        if (!is_null($completed) && ($completed !== $completed_rank)) {
          continue;
        }
      }

      $gp_rank_extra_data = [
        'completed'   => $completed_rank,
        'lowest_rank' => $lowest_rank
      ];

      $rank = vikinger_gamipress_rank_data_get($gp_rank, $user_id, $gp_rank_extra_data);

      $ranks[] = $rank;
    }

    if (count($ranks) > 1) {
      // sort ranks by priority
      usort($ranks, function ($a, $b) {
        if ($a['priority'] < $b['priority']) {
          return -1;
        }
  
        if ($a['priority'] > $b['priority']) {
          return 1;
        }
  
        return 0;
      });
    }

    /**
     * Filter rank results.
     * 
     * @since 1.9.1
     * 
     * @param array $ranks
     */
    $ranks = apply_filters('vikinger_ranks_get_results', $ranks);

    return $ranks;
  }
}

if (!function_exists('vikinger_gamipress_rank_data_get')) {
  /**
   * Returns rank data from a GamiPress rank object.
   * 
   * @since 1.9.1
   * 
   * @param Object    $gp_rank                GamiPress rank object.
   * @param int|bool  $user_id                ID of the user to return completed rank stats from.
   * @param array     $gp_rank_extra_data     GamiPress rank extra data.
   * @return array    $rank_data              Rank data.
   */
  function vikinger_gamipress_rank_data_get($gp_rank, $user_id = false, $gp_rank_extra_data = []) {
    $awarded_rank = false;

    if ($user_id) {
      $awarded_rank = vikinger_gamipress_rank_was_awarded($gp_rank->ID, $user_id);
    }

    $rank_data = [
      'id'                  => $gp_rank->ID,
      'name'                => $gp_rank->post_title,
      'slug'                => $gp_rank->post_name,
      'description'         => wp_strip_all_tags($gp_rank->post_content),
      'description_raw'     => $gp_rank->post_content,
      'image_url'           => vikinger_gamipress_post_get_image($gp_rank->ID),
      'unlock_with_points'  => vikinger_gamipress_get_unlockable_with_points($gp_rank->ID),
      'steps'               => [],
      'completed_users'     => vikinger_gamipress_get_rank_completed_users($gp_rank->ID, ['limit' => 12, 'orderby' => 'u.umeta_id']),
      'completed'           => $gp_rank_extra_data['completed'],
      'priority'            => gamipress_get_rank_priority($gp_rank->ID),
      'awarded'             => $awarded_rank
    ];

    // get achievements steps
    $completed_all_steps = true;
    $steps = gamipress_get_rank_requirements($gp_rank->ID);

    foreach ($steps as $step) {
      $completed_step = false;

      if ($user_id) {
        $completed_step = vikinger_gamipress_user_completed_step($step->ID, $user_id);
      }

      if (!$completed_step) {
        $completed_all_steps = false;
      }

      $rank_data['steps'][] = [
        'id'          => $step->ID,
        'description' => $step->post_title,
        'completed'   => $completed_step
      ];
    }

    $rank_data['completed_all_steps'] = $completed_all_steps;

    // rank was unlocked with points if it is completed without having all its steps completed and without beign awarded
    $rank_data['unlocked_with_points'] = !$gp_rank_extra_data['lowest_rank'] && $rank_data['completed'] && (!$completed_all_steps || count($steps) === 0) && !$rank_data['awarded'];

    /**
     * Filter rank data.
     * 
     * @since 1.9.1
     * 
     * @param array $rank_data
     */
    $rank_data = apply_filters('vikinger_ranks_get_data', $rank_data);

    return $rank_data;
  }
}

if (!function_exists('vikinger_gamipress_get_logged_user_ranks')) {
  /**
   * Get logged user rank data
   * 
   * @param string  $rank_type_slug    Slug of the rank type to return data from
   * @return array
   */
  function vikinger_gamipress_get_logged_user_ranks($rank_type_slug) {
    $user_id = false;

    if (is_user_logged_in()) {
      $user_id = get_current_user_id();
    }

    $ranks = vikinger_gamipress_get_ranks(['post_type' => $rank_type_slug], $user_id);

    return $ranks;
  }
}

if (!function_exists('vikinger_gamipress_get_user_completed_ranks')) {
  /**
   * Get user completed rank data
   * 
   * @param string  $rank_type_slug           Slug of the rank type to return data from
   * @param int     $user_id                  ID of the user to return completed ranks from
   * @return array
   */
  function vikinger_gamipress_get_user_completed_ranks($rank_type_slug, $user_id) {
    $ranks = vikinger_gamipress_get_ranks(['post_type' => $rank_type_slug], $user_id, true);

    $rank_count = count($ranks);

    if ($rank_count > 0) {
      return [$ranks[$rank_count - 1]];
    }

    return $ranks;
  }
}

if (!function_exists('vikinger_gamipress_get_user_rank_priority')) {
  /**
   * Get current user rank information
   * 
   * @param string  $rank_type_slug           Slug of the rank type to return data from
   * @param int     $user_id                  ID of the user to return current rank from
   * @param string  $data_scope               Scope of the rank data to return.
   * @return array
   */
  function vikinger_gamipress_get_user_rank_priority($rank_type_slug, $user_id, $data_scope = 'full') {
    $args = [
      'post_type' => $rank_type_slug
    ];

    $gp_ranks = gamipress_get_ranks($args);
    $total_gp_ranks = count($gp_ranks);

    $gp_user_rank = gamipress_get_user_rank($user_id, $rank_type_slug);

    if ($data_scope === 'full') {
      $user_rank = [
        'id'              => $gp_user_rank->ID,
        'name'            => $gp_user_rank->post_title,
        'description'     => wp_strip_all_tags($gp_user_rank->post_content),
        'image_url'       => vikinger_gamipress_post_get_image($gp_user_rank->ID),
        'current'         => gamipress_get_rank_priority($gp_user_rank->ID),
        'total'           => $total_gp_ranks
      ];
    } else if ($data_scope === 'simple') {
      $user_rank = [
        'id'              => $gp_user_rank->ID,
        'name'            => $gp_user_rank->post_title,
        'current'         => gamipress_get_rank_priority($gp_user_rank->ID),
        'total'           => $total_gp_ranks
      ];
    }

    return $user_rank;
  }
}

if (!function_exists('vikinger_gamipress_unlock_user_rank_with_points')) {
  /**
   * Unlock user rank with points
   * 
   * @param int $rank_id            ID of the rank to unlock
   * @param int $user_id            ID of the user to unlock the rank to
   * @return boolean
   */
  function vikinger_gamipress_unlock_user_rank_with_points($rank_id, $user_id) {
    // check if user has enough points to unlock rank
    $ranks = vikinger_gamipress_get_ranks(['post__in' => [$rank_id]], $user_id);

    if (count($ranks) === 0) {
      return false;
    }

    $rank = $ranks[0];

    // if rank can be unlocked with points and it hasn't been unlocked yet
    if ($rank['unlock_with_points'] && !$rank['completed']) {
      $point_type_to_deduct = $rank['unlock_with_points']['slug'];
      $points_to_deduct = $rank['unlock_with_points']['points'];

      $user_points = vikinger_gamipress_get_user_points($user_id);

      // if user has enough points to unlock rank
      if ($user_points[$point_type_to_deduct]['points'] >= $points_to_deduct) {
        // deduct points from user
        gamipress_deduct_points_to_user($user_id, $points_to_deduct, $point_type_to_deduct);

        // award next rank to the user
        gamipress_award_rank_to_user($rank_id, $user_id);

        return true;
      }
    }

    return false;
  }
}

if (!function_exists('vikinger_gamipress_unlock_logged_user_rank_with_points')) {
  /**
   * Unlock logged user rank with points
   * 
   * @param int $rank_id     ID of the rank to unlock
   * @return boolean
   */
  function vikinger_gamipress_unlock_logged_user_rank_with_points($rank_id) {
    $user_id = false;

    if (is_user_logged_in()) {
      $user_id = get_current_user_id();
    }

    if ($user_id) {
      return vikinger_gamipress_unlock_user_rank_with_points($rank_id, $user_id);
    }

    return false;
  }
}

if (!function_exists('vikinger_gamipress_rank_was_awarded')) {
  /**
   * Returns true if given rank was awarded to the user (given to the user via the admin panel)
   * 
   * @param int $rank_id        ID of the rank
   * @param int $user_id        ID of the user to check if the rank was awarded to
   * @return boolean
   */
  function vikinger_gamipress_rank_was_awarded($rank_id, $user_id) {
    global $wpdb;

    $gamipress_logs_table_name = 'gamipress_logs';
    $gamipress_logs_table = $wpdb->prefix . $gamipress_logs_table_name;

    $gamipress_logs_meta_table_name = 'gamipress_logs_meta';
    $gamipress_logs_meta_table = $wpdb->prefix . $gamipress_logs_meta_table_name;

    // get if rank was awarded by using the logs
    $sql = "SELECT $gamipress_logs_table.user_id FROM $gamipress_logs_meta_table
            INNER JOIN $gamipress_logs_table ON $gamipress_logs_table.log_id=$gamipress_logs_meta_table.log_id
            WHERE meta_key='_gamipress_rank_id' and meta_value=%d and user_id=%d and type='rank_award'";

    $result = $wpdb->get_row($wpdb->prepare($sql, [$rank_id, $user_id]));

    return !is_null($result);
  }
}

?>