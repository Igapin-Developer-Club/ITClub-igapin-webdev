<?php
/**
 * Functions - Paid Memberships Pro - Global
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_pmpro_is_pmpro_page')) {
  /**
   * Check if the current page is a pmpro page
   */
  function vikinger_pmpro_is_pmpro_page() {
    global $pmpro_pages;

    $pmpro_regular_pages = [
      'levels',
      'checkout',
      'confirmation',
      'cancel'
    ];

    foreach ($pmpro_pages as $pmpro_page_name => $pmpro_page_ID) {
      if (in_array($pmpro_page_name, $pmpro_regular_pages) && is_page($pmpro_page_ID)) {
        return true;
      }
    }

    return false;
  }
}

if (!function_exists('vikinger_pmpro_is_pmpro_account_page')) {
  /**
   * Check if the current page is a pmpro account page
   */
  function vikinger_pmpro_is_pmpro_account_page() {
    global $pmpro_pages;

    $pmpro_account_pages = [
      'account',
      'billing',
      'invoice'
    ];

    foreach ($pmpro_pages as $pmpro_page_name => $pmpro_page_ID) {
      if (in_array($pmpro_page_name, $pmpro_account_pages) && is_page($pmpro_page_ID)) {
        return true;
      }
    }

    return false;
  }
}

if (!function_exists('vikinger_pmpro_search_archives_limit_enabled')) {
  /**
   * Check if posts should be displayed on posts lists and archives
   */
  function vikinger_pmpro_search_archives_limit_enabled() {
    $filter_queries = (int) pmpro_getOption('filterqueries');

    return $filter_queries === 1;
  }
}

if (!function_exists('vikinger_pmpro_excerpts_display_is_enabled')) {
  /**
   * Check if posts excerpts should be displayed on posts lists and archives
   */
  function vikinger_pmpro_excerpts_display_is_enabled() {
    $showexcerpts = (int) pmpro_getOption('showexcerpts');

    return $showexcerpts === 1;
  }
}

if (!function_exists('vikinger_pmpro_user_membership_level_get')) {
  /**
   * Returns user membership level
   * 
   * @param int           $user_id               ID of the user to get membership level of.
   * @return array|bool   $membership_level      User membership level or false if no membership.
   */
  function vikinger_pmpro_user_membership_level_get($user_id) {
    $membership_level = pmpro_getMembershipLevelForUser($user_id);

    if ($membership_level) {
      $membership_level = (array) $membership_level;
    }

    return $membership_level;
  }
}

if (!function_exists('vikinger_pmpro_logged_user_membership_level_get')) {
  /**
   * Returns logged user membership level
   * 
   * @return array|bool   $membership_level      User membership level or false if no membership.
   */
  function vikinger_pmpro_logged_user_membership_level_get() {
    $membership_level = vikinger_pmpro_user_membership_level_get(get_current_user_id());

    return $membership_level;
  }
}

if (!function_exists('vikinger_pmpro_membership_level_allowed_categories_get')) {
  /**
   * Returns allowed categories for a membership level
   * 
   * @param int     $membership_level_id      ID of the membership level to get allowed categories of.
   * @return array  $allowed_categories       Categories that the membership level is allowed to browse.
   */
  function vikinger_pmpro_membership_level_allowed_categories_get($membership_level_id) {
    $allowed_categories = pmpro_getMembershipCategories($membership_level_id);

    return $allowed_categories;
  }
}

if (!function_exists('vikinger_pmpro_categories_get')) {
  /**
   * Returns all membership exclusive categories
   * 
   * @return array $categories        All membership exclusive categories.
   */
  function vikinger_pmpro_categories_get() {
    global $wpdb;
    
    $categories = $wpdb->get_col("SELECT category_id FROM {$wpdb->pmpro_memberships_categories}");
  
    return array_map(
      function ($category) {
        return (int) $category;
      },
      array_unique($categories)
    );
  }
}

if (!function_exists('vikinger_pmpro_membership_level_allowed_posts_get')) {
  /**
   * Returns allowed posts for a membership level
   * 
   * @param int     $membership_level_id      ID of the membership level to get allowed posts of.
   * @return array  $allowed_posts            Posts that the membership level is allowed to browse.
   */
  function vikinger_pmpro_membership_level_allowed_posts_get($membership_level_id) {
    global $wpdb;
    
    $allowed_posts = $wpdb->get_col(
      $wpdb->prepare(
        "SELECT page_id FROM {$wpdb->pmpro_memberships_pages} WHERE membership_id = %d",
        [ $membership_level_id ]
      )
    );

    return $allowed_posts;
  }
}

if (!function_exists('vikinger_pmpro_posts_get')) {
  /**
   * Returns all membership exclusive posts
   * 
   * @return array $posts        All membership exclusive posts.
   */
  function vikinger_pmpro_posts_get() {
    global $wpdb;
    
    $posts = $wpdb->get_col("SELECT page_id FROM {$wpdb->pmpro_memberships_pages}");
  
    return array_map(
      function ($post) {
        return (int) $post;
      },
      array_unique($posts)
    );
  }
}

if (!function_exists('vikinger_pmpro_logged_user_restricted_categories_get')) {
  /**
   * Returns restricted post categories for logged user
   * 
   * @return array $membership_exclusive_categories     Restricted post categories for logged user.
   */
  function vikinger_pmpro_logged_user_restricted_categories_get() {
    $logged_user_membership_level = vikinger_pmpro_logged_user_membership_level_get();
    $membership_exclusive_categories = vikinger_pmpro_categories_get();
  
    if ($logged_user_membership_level) {
      $logged_user_allowed_categories = vikinger_pmpro_membership_level_allowed_categories_get($logged_user_membership_level['ID']);
  
      $membership_exclusive_categories = array_filter($membership_exclusive_categories, function ($category) use ($logged_user_allowed_categories) {
        return !in_array($category, $logged_user_allowed_categories);
      });
    }

    return $membership_exclusive_categories;
  }
}

if (!function_exists('vikinger_pmpro_logged_user_restricted_posts_get')) {
  /**
   * Returns restricted post posts for logged user
   * 
   * @return array $membership_exclusive_posts     Restricted post for logged user.
   */
  function vikinger_pmpro_logged_user_restricted_posts_get() {
    $logged_user_membership_level = vikinger_pmpro_logged_user_membership_level_get();
    $membership_exclusive_posts = vikinger_pmpro_posts_get();
  
    if ($logged_user_membership_level) {
      $logged_user_allowed_posts = vikinger_pmpro_membership_level_allowed_posts_get($logged_user_membership_level['ID']);
  
      $membership_exclusive_posts = array_filter($membership_exclusive_posts, function ($category) use ($logged_user_allowed_posts) {
        return !in_array($category, $logged_user_allowed_posts);
      });
    }

    return $membership_exclusive_posts;
  }
}

if (!function_exists('vikinger_pmpro_post_access_data_get')) {
  /**
   * Returns post access data
   * 
   * @param int     $post_id            Post ID. Optional. Current loop post ID used if not provided.
   * @param int     $user_id            User ID. Optional. Current logged user ID used if not provided.
   * @return array  $post_access_data   Post access data.
   */
  function vikinger_pmpro_post_access_data_get($post_id = NULL, $user_id = NULL) {
    $post_access_data = [
      'message'     => '',
      'accessible'  => true
    ];

    if (is_null($post_id) && is_home() && get_option('page_for_posts')) {
      $post_id = get_option('page_for_posts');
    }

    $post_membership = pmpro_has_membership_access($post_id, $user_id, true);

    if (is_array($post_membership)) {
			$post_membership_levels_ids = $post_membership[1];
			$post_membership_levels_names = $post_membership[2];
			$logged_user_has_membership_access = $post_membership[0];

      $post_access_data['accessible'] = $logged_user_has_membership_access;
      if (!$logged_user_has_membership_access) {
        $post_access_data['message'] = pmpro_get_no_access_message('', $post_membership_levels_ids, $post_membership_levels_names);
      }
		}

    return $post_access_data;
  }
}

?>