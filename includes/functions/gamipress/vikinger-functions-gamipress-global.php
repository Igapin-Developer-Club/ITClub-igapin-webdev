<?php
/**
 * Functions - GamiPress - Global
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_gamipress_post_get_image')) {
  /**
   * Returns post image url.
   * 
   * @param int $post_id    ID of the post to get the image from.
   * @return string
   */
  function vikinger_gamipress_post_get_image($post_id) {
    $site_id = gamipress_is_network_wide_active() ? get_main_site_id() : get_current_blog_id();

    switch_to_blog($site_id);

    $thumbnail_id = get_post_thumbnail_id($post_id);

    $thumbnail_post = get_post($thumbnail_id);

    restore_current_blog();

    return $thumbnail_post->guid;
  }
}

if (!function_exists('vikinger_gamipress_post_types_get')) {
  /**
   * Get GamiPress post types
   */
  function vikinger_gamipress_post_types_get() {
    $achievement_types = vikinger_gamipress_achievement_types_get_flat();
    $rank_types = vikinger_gamipress_rank_types_get_flat();

    $post_types = [];

    $post_types = array_merge($post_types, $achievement_types);
    $post_types = array_merge($post_types, $rank_types);

    return $post_types;
  }
}

if (!function_exists('vikinger_gamipress_achievement_types_get_flat')) {
  /**
   * Get flattened GamiPress achievement types
   */
  function vikinger_gamipress_achievement_types_get_flat() {
    $gp_achievement_types = vikinger_gamipress_get_achievement_types();

    $achievement_types = [];

    foreach ($gp_achievement_types as $key => $gp_achievement_type) {
      $achievement_types[] = $key;
    }

    return $achievement_types;
  }
}

if (!function_exists('vikinger_gamipress_rank_types_get_flat')) {
  /**
   * Get flattened GamiPress rank types
   */
  function vikinger_gamipress_rank_types_get_flat() {
    $gp_rank_types = vikinger_gamipress_get_rank_types();

    $rank_types = [];

    foreach ($gp_rank_types as $key => $gp_rank_type) {
      $rank_types[] = $key;
    }

    return $rank_types;
  }
}

if (!function_exists('vikinger_gamipress_type_get')) {
  /**
   * Get GamiPress type by post type
   * 
   * @param string        $post_type    Post type.
   * @return string|bool  $gp_type      GamiPress element type or false if invalid post_type. One of: 'achievement', 'rank'.
   */
  function vikinger_gamipress_type_get($post_type) {
    $achievement_types = vikinger_gamipress_achievement_types_get_flat();
    $rank_types = vikinger_gamipress_rank_types_get_flat();

    if (in_array($post_type, $achievement_types)) {
      return 'achievement';
    }

    if (in_array($post_type, $rank_types)) {
      return 'rank';
    }

    return false;
  }
}