<?php
/**
 * Functions - User
 * 
 * @package Vikinger
 * 
 * @since 1.0.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_get_logged_user_data')) {
  /**
   * Returns logged user data, or false if no user is logged in
   * 
   * @return array|bool $user           User if logged in, false otherwise.  
   */
  function vikinger_get_logged_user_data() {
    $user = false;

    if (is_user_logged_in()) {
      $user_id = get_current_user_id();
      $user = vikinger_user_get_data($user_id);
    }

    return $user;
  }
}

if (!function_exists('vikinger_user_get_data')) {
  /**
   * Returns user data
   * 
   * @param int     $user_id      User id.
   * @return array  $user         User data.
   */
  function vikinger_user_get_data($user_id) {
    $user_data = get_userdata($user_id);

    $user = [];

    if ($user_data) {
      $user = [
        'id'            => $user_data->ID,
        'name'          => $user_data->display_name,
        'mention_name'  => $user_data->user_login,
        'link'          => '',
        'media_link'    => '',
        'badges_link'   => '',
        'avatar_url'    => get_avatar_url($user_data->ID),
        'cover_url'     => vikinger_get_default_member_cover_url(),
        'badges'        => [],
        'verified'      => false,
        'membership'    => false
      ];
    
      // add GamiPress badges and rank data if plugin is active
      if (vikinger_plugin_gamipress_is_active()) {
        if (vikinger_gamipress_rank_type_exists('rank')) {
          $user['rank'] = vikinger_gamipress_get_user_rank_priority('rank', $user_data->ID, 'simple');
        }
        
        $user['badges'] = vikinger_gamipress_get_user_completed_achievements('badge', $user_data->ID, 'simple');
      }

      // add membership data if the plugin is active
      if (vikinger_plugin_pmpro_is_active()) {
        $user['membership'] = vikinger_pmpro_user_membership_level_get($user['id']);
      }
    } else {
      $user = [
        'id'            => $user_id,
        'name'          => esc_html__('[deleted]', 'vikinger'),
        'mention_name'  => esc_html__('[deleted]', 'vikinger'),
        'link'          => '',
        'media_link'    => '',
        'badges_link'   => '',
        'avatar_url'    => vikinger_get_default_member_avatar_url(),
        'verified'      => false,
        'membership'    => false
      ];
    }

    return $user;
  }
}

if (!function_exists('vikinger_user_meta_update')) {
  /**
   * Update user user metadata
   * 
   * @param int   $user_id      ID of the user to update metadata of.
   * @param array $metadata     Key value pairs of user metadata to update.
   */
  function vikinger_user_meta_update($user_id, $metadata) {
    foreach ($metadata as $meta_key => $meta_value) {
      $result = update_user_meta($user_id, $meta_key, $meta_value);
    }

    return true;
  }
}

if (!function_exists('vikinger_logged_user_color_theme_get')) {
  /**
   * Get logged in user color theme
   * 
   * @return string $color_theme       Color theme (light / dark).
   */
  function vikinger_logged_user_color_theme_get() {
    $color_theme = get_theme_mod('vikinger_color_presets_setting_theme_switch_default', 'light');

    if (is_user_logged_in()) {
      // user_color_theme is false if invalid user_id or '' (empty string) if no value stored
      $user_color_theme = vikinger_user_color_theme_get(get_current_user_id());

      if ($user_color_theme) {
        $color_theme = $user_color_theme;
      }
    }

    return $color_theme;
  }
}

if (!function_exists('vikinger_user_color_theme_get')) {
  /**
   * Get user color theme
   * 
   * @param int $user_id      User ID.
   */
  function vikinger_user_color_theme_get($user_id) {
    // clear user meta cache to force getting updated user meta
    wp_cache_delete($user_id, 'user_meta');

    return get_user_meta($user_id, 'vikinger_color_theme', true);
  }
}

if (!function_exists('vikinger_logged_user_color_theme_update')) {
  /**
   * Update logged user color theme
   * 
   * @param string    $color_theme    Color theme.
   * @return int|bool $result         Meta ID if it didn't exist, true on successful update, false on failure, if there is no logged in user, or if color_theme has the same value as stored.
   */
  function vikinger_logged_user_color_theme_update($color_theme) {
    if (is_user_logged_in()) {
      return vikinger_user_color_theme_update(get_current_user_id(), $color_theme);
    }

    return false;
  }
}

if (!function_exists('vikinger_user_color_theme_update')) {
  /**
   * Update user color theme
   * 
   * @param int       $user_id        User ID.
   * @param string    $color_theme    Color theme.
   * @return int|bool $result         Meta ID if it didn't exist, true on successful update, false on failure or if color_theme has the same value as stored.
   */
  function vikinger_user_color_theme_update($user_id, $color_theme) {
    return update_user_meta($user_id, 'vikinger_color_theme', $color_theme);
  }
}

if (!function_exists('vikinger_logged_user_color_theme_toggle')) {
  /**
   * Toggle logged user color theme
   * 
   * @return int|bool $result         Meta ID if it didn't exist, true on successful update, false on failure, if there is no logged in user, or if color_theme has the same value as stored.
   */
  function vikinger_logged_user_color_theme_toggle() {
    $user_color_theme = vikinger_logged_user_color_theme_get();

    if ($user_color_theme === 'light') {
      return vikinger_logged_user_color_theme_update('dark');
    } else {
      return vikinger_logged_user_color_theme_update('light');
    }
  }
}

if (!function_exists('vikinger_logged_user_delete_account')) {
  /**
   * Delete logged user account
   * 
   * @return bool True on success, false on failure.
   */
  function vikinger_logged_user_delete_account() {
    return bp_core_delete_account();
  }
}

if (!function_exists('vikinger_user_grid_type_default_get')) {
  /**
   * Returns default user grid type.
   * 
   * @return string $default_grid_type      Default grid type.
   */
  function vikinger_user_grid_type_default_get() {
    $default_grid_type = 'small';

    /**
     * Filter user default grid type. One of: "big", "small", "list".
     * 
     * @since 1.9.1
     * 
     * @param string $default_grid_type
     */
    $default_grid_type = apply_filters('vikinger_users_grid_type_default', $default_grid_type);

    return $default_grid_type;
  }
}

if (!function_exists('vikinger_user_grid_type_get')) {
  /**
   * Get user grid component type.
   * 
   * @param int     $user_id            User ID.
   * @param string  $grid_component     Grid component.
   * @return string $posts_grid_type    Grid type.
   */
  function vikinger_user_grid_type_get($user_id, $grid_component) {
    // clear user meta cache to force getting updated user meta
    wp_cache_delete($user_id, 'user_meta');

    $posts_grid_type_meta_value = get_user_meta($user_id, 'vikinger_' . $grid_component . '_grid_type', true);

    $posts_grid_type = $posts_grid_type_meta_value ? $posts_grid_type_meta_value : vikinger_user_grid_type_default_get();

    return $posts_grid_type;
  }
}

if (!function_exists('vikinger_logged_user_grid_type_get')) {
  /**
   * Get logged user grid component type.
   * 
   * @param string $grid_component    Grid component.
   * @return string
   */
  function vikinger_logged_user_grid_type_get($grid_component) {
    if (is_user_logged_in()) {
      return vikinger_user_grid_type_get(get_current_user_id(), $grid_component);
    }

    return vikinger_user_grid_type_default_get();
  }
}

if (!function_exists('vikinger_user_grid_type_update')) {
  /**
   * Update user grid component type.
   * 
   * @param int       $user_id          User ID.
   * @param string    $grid_component   Grid component.
   * @param string    $grid_type        Grid type.
   * @return int|bool $result           Meta ID if it didn't exist, true on successful update, false on failure or if posts_grid_type has the same value as stored.
   */
  function vikinger_user_grid_type_update($user_id, $grid_component, $grid_type) {
    return update_user_meta($user_id, 'vikinger_' . $grid_component . '_grid_type', $grid_type);
  }
}

if (!function_exists('vikinger_logged_user_grid_type_update')) {
  /**
   * Update logged user grid component type.
   * 
   * @param string    $grid_component   Grid component.
   * @param string    $grid_type        Grid type.
   * @return int|bool $result           Meta ID if it didn't exist, true on successful update, false on failure, if there is no logged in user, or if posts_grid_type has the same value as stored.
   */
  function vikinger_logged_user_grid_type_update($grid_component, $grid_type) {
    if (is_user_logged_in()) {
      return vikinger_user_grid_type_update(get_current_user_id(), $grid_component, $grid_type);
    }

    return false;
  }
}

if (!function_exists('vikinger_user_sidemenu_status_default_get')) {
  /**
   * Returns default user side menu status.
   * 
   * @return string $default_sidemenu_status      Default side menu status.
   */
  function vikinger_user_sidemenu_status_default_get() {
    $default_sidemenu_status = 'closed';

    /**
     * Filter user default side menu status. One of "open", "closed".
     * 
     * @since 1.9.1
     * 
     * @param string $default_sidemenu_status
     */
    $default_sidemenu_status = apply_filters('vikinger_users_sidemenu_status_default', $default_sidemenu_status);

    return $default_sidemenu_status;
  }
}

if (!function_exists('vikinger_user_sidemenu_status_get')) {
  /**
   * Get user sidemenu status.
   * 
   * @param int     $user_id            User ID.
   * @return string $sidemenu_status    One of: 'open', 'closed'.
   */
  function vikinger_user_sidemenu_status_get($user_id) {
    // clear user meta cache to force getting updated user meta
    wp_cache_delete($user_id, 'user_meta');

    $sidemenu_status_meta_value = get_user_meta($user_id, 'vikinger_sidemenu_status', true);

    $sidemenu_status = $sidemenu_status_meta_value ? $sidemenu_status_meta_value : vikinger_user_sidemenu_status_default_get();

    return $sidemenu_status;
  }
}

if (!function_exists('vikinger_logged_user_sidemenu_status_get')) {
  /**
   * Get logged user sidemenu status.
   *
   * @return string
   */
  function vikinger_logged_user_sidemenu_status_get() {
    if (is_user_logged_in()) {
      return vikinger_user_sidemenu_status_get(get_current_user_id());
    }

    return vikinger_user_sidemenu_status_default_get();
  }
}

if (!function_exists('vikinger_user_sidemenu_status_update')) {
  /**
   * Update user sidemenu status.
   * 
   * @param int       $user_id          User ID.
   * @param string    $sidemenu_status  One of: 'open', 'closed'.
   * @return int|bool $result           Meta ID if it didn't exist, true on successful update, false on failure or if vikinger_sidemenu_status has the same value as stored.
   */
  function vikinger_user_sidemenu_status_update($user_id, $sidemenu_status) {
    return update_user_meta($user_id, 'vikinger_sidemenu_status', $sidemenu_status);
  }
}

if (!function_exists('vikinger_logged_user_sidemenu_status_update')) {
  /**
   * Update logged user grid component type.
   * 
   * @param string    $sidemenu_status  One of: 'open', 'closed'.
   * @return int|bool $result           Meta ID if it didn't exist, true on successful update, false on failure, if there is no logged in user, or if vikinger_sidemenu_status has the same value as stored.
   */
  function vikinger_logged_user_sidemenu_status_update($sidemenu_status) {
    if (is_user_logged_in()) {
      return vikinger_user_sidemenu_status_update(get_current_user_id(), $sidemenu_status);
    }

    return false;
  }
}

if (!function_exists('vikinger_user_stream_username_get')) {
  /**
   * Get user stream username.
   * 
   * @param int     $user_id            User ID.
   * @return string $username           Stream username.
   */
  function vikinger_user_stream_username_get($user_id) {
    // clear user meta cache to force getting updated user meta
    wp_cache_delete($user_id, 'user_meta');

    $stream_username_meta_value = get_user_meta($user_id, 'vikinger_stream_username', true);

    return $stream_username_meta_value;
  }
}

if (!function_exists('vikinger_logged_user_stream_username_get')) {
  /**
   * Get logged user stream username.
   *
   * @return string
   */
  function vikinger_logged_user_stream_username_get() {
    if (is_user_logged_in()) {
      return vikinger_user_stream_username_get(get_current_user_id());
    }

    return '';
  }
}

if (!function_exists('vikinger_user_stream_username_update')) {
  /**
   * Update logged user grid component type.
   * 
   * @param int       $user_id          User ID.
   * @param string    $username         Streamer username.
   * @return int|bool $result           Meta ID if it didn't exist, true on successful update, false on failure or if vikinger_stream_username has the same value as stored.
   */
  function vikinger_user_stream_username_update($user_id, $username) {
    return update_user_meta($user_id, 'vikinger_stream_username', $username);
  }
}

if (!function_exists('vikinger_logged_user_stream_username_update')) {
  /**
   * Update logged user grid component type.
   * 
   * @param string    $username         Streamer username.
   * @return int|bool $result           Meta ID if it didn't exist, true on successful update, false on failure, if there is no logged in user, or if vikinger_stream_username has the same value as stored.
   */
  function vikinger_logged_user_stream_username_update($username) {
    if (is_user_logged_in()) {
      return vikinger_user_stream_username_update(get_current_user_id(), $username);
    }

    return false;
  }
}

?>