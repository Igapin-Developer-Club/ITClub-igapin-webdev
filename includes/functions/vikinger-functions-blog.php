<?php
/**
 * Functions - Blog
 * 
 * @package Vikinger
 * 
 * @since 1.0.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_post_get_image')) {
  /**
   * Returns post image url.
   * 
   * @param int $post_id    ID of the post to get the image from.
   * @return string
   */
  function vikinger_post_get_image($post_id) {
    $thumbnail_id = get_post_thumbnail_id($post_id);

    $thumbnail_post = get_post($thumbnail_id);

    return $thumbnail_post->guid;
  }
}

if (!function_exists('vikinger_get_posts')) {
  /**
   * Returns filtered posts.
   * 
   * @param array   $args   Filter arguments for post query.
   * @return array
   */
  function vikinger_get_posts($args) {
    /**
     * Filter post args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_posts_get_args', $args);

    // get posts
    $wp_posts = get_posts($args);

    $posts = [];

    foreach ($wp_posts as $wp_post) {
      $post = [
        'id'                    => $wp_post->ID,
        'type'                  => 'post',
        'post_type'             => $wp_post->post_type,
        'format'                => get_post_format($wp_post->ID),
        'timestamp'             => get_the_date('', $wp_post->ID),
        'excerpt'               => get_the_excerpt($wp_post->ID),
        'permalink'             => get_permalink($wp_post->ID),
        'title'                 => $wp_post->post_title,
        'cover_url'             => false,
        'cover_url_thumb'       => false,
        'postv1_cover_url'      => false,
        'postv2_cover_url'      => false,
        'share_count'           => (int) vikinger_post_get_share_count($wp_post->ID),
        'comment_count'         => (int) $wp_post->comment_count,
        'reactions'             => [],
        'categories'            => [],
        'tags'                  => [],
        'comment_status'        => $wp_post->comment_status,
        'ping_status'           => $wp_post->ping_status,
        'post_password'         => $wp_post->post_password,
        'password_required'     => post_password_required($wp_post->ID),
        'has_membership_access' => true
      ];

      // add BuddyPress member data if plugin is active
      if (vikinger_plugin_buddypress_is_active()) {
        $post['author'] = vikinger_members_get(['include' => [$wp_post->post_author]])[0];
      } else {
        $post['author'] = vikinger_user_get_data($wp_post->post_author);
      }

      // if pmpro plugin is active and post excerpt display requires membership
      if (vikinger_plugin_pmpro_is_active()) {
        $post_access_data = vikinger_pmpro_post_access_data_get($post['id']);
        $post['has_membership_access'] = $post_access_data['accessible'];
      }

      // if no author data available, show as deleted
      if (count($post['author']) === 0) {
        $post['author'] = [
          'id'            => $wp_post->post_author,
          'name'          => esc_html__('[deleted]', 'vikinger'),
          'mention_name'  => esc_html__('[deleted]', 'vikinger'),
          'link'          => '',
          'media_link'    => '',
          'badges_link'   => '',
          'avatar_url'    => vikinger_get_default_member_avatar_url(),
          'rank'          => [
            'current' => 0,
            'total'   => 0
          ],
          'verified'      => false
        ];
      }

      // add vkreact reactions data if plugin is active
      if (vikinger_plugin_vkreact_is_active()) {
        $post['reactions'] = vikinger_reactions_insert_user_data(vkreact_get_post_reactions($wp_post->ID));
      }

      // add post format information
      if ($post['format'] === 'video') {
        $videoURL = get_post_meta($wp_post->ID, 'vikinger_video_url', true);
        $post['video_url'] = $videoURL;
      } else if ($post['format'] === 'audio')  {
        $audioURL = get_post_meta($wp_post->ID, 'vikinger_audio_url', true);

        $post['audio_url'] = $audioURL;
      } else if ($post['format'] === 'gallery') {
        $attachment_ids = get_post_meta($wp_post->ID, 'vikinger_gallery_ids', true);
        $attachment_ids = explode(',', $attachment_ids);

        if (is_array($attachment_ids) && (count($attachment_ids) > 0) && ($attachment_ids[0] !== '')) {
          $post['gallery'] = [];

          foreach ($attachment_ids as $attachment_id) {
            $attachment = [];
            $attachment['id'] = $attachment_id;
            $attachment['url'] = wp_get_attachment_url($attachment_id);
            $post['gallery'][] = $attachment;
          }
        } else {
          $post['gallery'] = false;
        }
      }

      // if user uploaded a custom cover
      if (has_post_thumbnail($wp_post->ID)) {
        // get user custom cover url
        $post['cover_url'] = get_the_post_thumbnail_url($wp_post->ID);
        $post['cover_url_thumb'] = get_the_post_thumbnail_url($wp_post->ID, 'vikinger-postlist-thumb');
        $post['postv1_cover_url'] = get_the_post_thumbnail_url($wp_post->ID, 'vikinger-postv1-fullscreen');
        $post['postv2_cover_url'] = get_the_post_thumbnail_url($wp_post->ID, 'vikinger-postv2-fullscreen');
      }

      // get post categories
      $categories = get_the_category($wp_post->ID);

      foreach ($categories as $category) {
        $post_cat = get_category($category);

        $cat = [];
        $cat['id'] = $post_cat->cat_ID;
        $cat['name'] = $post_cat->name;
        $cat['link'] = get_category_link($post_cat->cat_ID);

        $post['categories'][] = $cat;
      }

      // get post tags
      $tags = get_the_tags($wp_post->ID);

      if ($tags) {
        foreach ($tags as $tag) {
          $t = [];
          $t['id'] = $tag->term_id;
          $t['name'] = $tag->name;
          $t['link'] = get_tag_link($tag->term_id);
    
          $post['tags'][] = $t;
        }
      }

      /**
       * Filter post data.
       * 
       * @since 1.9.1
       * 
       * @param array $post
       */
      $post = apply_filters('vikinger_posts_get_data', $post);

      $posts[] = $post;
    }

    /**
     * Filter post results.
     * 
     * @since 1.9.1
     * 
     * @param array $posts
     */
    $posts = apply_filters('vikinger_posts_get_results', $posts);

    return $posts;
  }
}

if (!function_exists('vikinger_get_post_count')) {
  /**
   * Get filtered post count
   * 
   * @param array $args         Post filters.
   * @return int  $post_count   Filtered post count.
   */
  function vikinger_get_post_count($args) {
    /**
     * Filter post count args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_posts_get_count_args', $args);

    $defaults = [
      'numberposts' => -1
    ];

    $args = array_merge($defaults, $args);

    $posts = get_posts($args);
    $post_count = count($posts);

    return $post_count;
  }
}

if (!function_exists('vikinger_post_get_sticky_posts')) {
  /**
   * Returns sticky posts.
   * 
   * @return array $sticky_posts      Sticky posts data.
   */
  function vikinger_post_get_sticky_posts() {
    $sticky_post_ids = get_option('sticky_posts');

    $sticky_posts = [];

    $sticky_post_args = [];

    // if sticky posts found
    if (count($sticky_post_ids) > 0) {
      $sticky_post_args['include'] = $sticky_post_ids;

      // add pmpro membership post and category restrictions
      if (vikinger_plugin_pmpro_is_active() && vikinger_pmpro_search_archives_limit_enabled()) {
        $restricted_categories = vikinger_pmpro_logged_user_restricted_categories_get();
        $restricted_posts = vikinger_pmpro_logged_user_restricted_posts_get();

        $sticky_post_args['category__not_in'] = $restricted_categories;
        $sticky_post_args['include'] = array_diff($sticky_post_args['include'], $restricted_posts);

        if (count($sticky_post_args['include']) === 0) {
          return [];
        }
      }

      /**
       * Filter sticky post args.
       * 
       * @since 1.9.1
       * 
       * @param array $sticky_post_args
       */
      $sticky_post_args = apply_filters('vikinger_posts_get_sticky_posts_args', $sticky_post_args);

      $sticky_posts = vikinger_get_posts($sticky_post_args);
    }

    /**
     * Filter sticky post results.
     * 
     * @since 1.9.1
     * 
     * @param array $sticky_posts
     */
    $sticky_posts = apply_filters('vikinger_posts_get_sticky_posts_results', $sticky_posts);

    return $sticky_posts;
  }
}

if (!function_exists('vikinger_post_get_loop_data')) {
  /**
   * Returns post loop data.
   */
  function vikinger_post_get_loop_data() {
    $author_id    = get_the_author_meta('ID');
    $post_format  = get_post_format();
    $post_type    = get_theme_mod('vikinger_blog_setting_type', 'v1');

    if (in_array($post_format, ['video', 'audio', 'gallery'])) {
      $post_type = 'v3';
    }

    $post_id = get_the_ID();

    $post_data = [
      'id'                => $post_id,
      'format'            => $post_format,
      'type'              => $post_type,
      'categories'        => get_the_category(),
      'date'              => get_the_date(),
      'title'             => get_the_title(),
      'cover_url'         => false,
      'cover_url_thumb'   => false,
      'link'              => get_permalink(),
      'excerpt_from_text' => get_the_excerpt(),
      'comment_count'     => get_comments_number(),
      'share_count'       => vikinger_post_get_share_count($post_id)
    ];

    // add BuddyPress member data if plugin is active
    if (vikinger_plugin_buddypress_is_active()) {
      $post_data['author'] = vikinger_members_get(['include' => [$author_id]])[0];
    } else {
      $post_data['author'] = vikinger_user_get_data($author_id);
    }

    // if no author data available, show as deleted
    if (count($post_data['author']) === 0) {
      $post_data['author'] = [
        'id'            => $author_id,
        'name'          => esc_html__('[deleted]', 'vikinger'),
        'mention_name'  => esc_html__('[deleted]', 'vikinger'),
        'link'          => '',
        'media_link'    => '',
        'badges_link'   => '',
        'avatar_url'    => vikinger_get_default_member_avatar_url(),
        'verified'      => false
      ];
    }

    // if user uploaded a custom cover
    if (has_post_thumbnail($post_id)) {
      // get user custom cover url
      $post_data['cover_url'] = get_the_post_thumbnail_url($post_id);
      $post_data['cover_url_thumb'] = get_the_post_thumbnail_url($post_id, 'vikinger-postlist-thumb');

      if ($post_type === 'v1') {
        $post_data['cover_url'] = get_the_post_thumbnail_url($post_id, 'vikinger-postv1-fullscreen');
      } else if ($post_type === 'v2') {
        $post_data['cover_url'] = get_the_post_thumbnail_url($post_id, 'vikinger-postv2-fullscreen');
      }
    }

    // only add excerpt data if it exists
    if (has_excerpt()) {
      $post_data['excerpt'] = get_the_excerpt();
    }

    // only add tags data if they exist
    $tags = get_the_tags();
    
    if ($tags) {
      $post_data['tags'] = $tags;
    }

    return $post_data;
  }
}

if (!function_exists('vikinger_get_pages')) {
  /**
   * Returns filtered pages.
   * 
   * @param array   $args   Filter arguments for page query
   * @return array
   */
  function vikinger_get_pages($args) {
    /**
     * Filter page args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_pages_get_args', $args);

    // get pages
    $wp_pages = get_pages($args);

    $pages = [];

    foreach ($wp_pages as $wp_page) {
      $page = [
        'id'                => $wp_page->ID,
        'type'              => 'page',
        'title'             => $wp_page->post_title,
        'cover_url'         => false,
        'cover_url_thumb'   => false,
        'comment_count'     => (int) $wp_page->comment_count,
        'share_count'       => 0,
        'comment_status'    => $wp_page->comment_status,
        'reactions'         => []
      ];

      // if user uploaded a custom cover
      if (has_post_thumbnail($wp_page->ID)) {
        // get user custom cover url
        $page['cover_url'] = get_the_post_thumbnail_url($wp_page->ID);
        $page['cover_url_thumb']  = get_the_post_thumbnail_url($wp_page->ID, 'vikinger-postlist-thumb');
      }

      // add vkreact reactions data if plugin is active
      if (vikinger_plugin_vkreact_is_active()) {
        $page['reactions'] = vikinger_reactions_insert_user_data(vkreact_get_post_reactions($wp_page->ID));
      }

      /**
       * Filter page data.
       * 
       * @since 1.9.1
       * 
       * @param array $page
       */
      $page = apply_filters('vikinger_pages_get_data', $page);

      $pages[] = $page;
    }

    /**
     * Filter page results.
     * 
     * @since 1.9.1
     * 
     * @param array $pages
     */
    $pages = apply_filters('vikinger_pages_get_results', $pages);

    return $pages;
  }
}

if (!function_exists('vikinger_page_get_loop_data')) {
  /**
   * Returns page loop data.
   */
  function vikinger_page_get_loop_data() {
    $post_id = get_the_ID();

    $post_data = [
      'id'                => $post_id,
      'type'              => 'page',
      'title'             => get_the_title(),
      'cover_url'         => false,
      'cover_url_thumb'   => false,
      'comment_count'     => get_comments_number(),
      'share_count'       => vikinger_post_get_share_count($post_id),
      'allow_comments'    => comments_open()
    ];

    // if user uploaded a custom cover
    if (has_post_thumbnail($post_id)) {
      // get user custom cover url
      $post_data['cover_url'] = get_the_post_thumbnail_url($post_id);
      $post_data['cover_url_thumb']  = get_the_post_thumbnail_url($post_id, 'vikinger-postlist-thumb');
    }

    return $post_data;
  }
}

if (!function_exists('vikinger_post_get_share_count')) {
  /**
   * Returns post share count.
   * 
   * @param int   $post_id          ID of the post to get share count of.
   * @return int  $share_count      Share count of the post.
   */
  function vikinger_post_get_share_count($post_id) {
    $share_count = get_post_meta($post_id, 'share_count', true);

    return !empty($share_count) ? $share_count : 0;
  }
}

if (!function_exists('vikinger_update_post_meta')) {
  /**
   * Update post meta
   * 
   * @param array   $args   Post meta args
   * @return int|boolean
   */
  function vikinger_update_post_meta($args) {
    $result = update_post_meta($args['post_id'], $args['meta_key'], $args['meta_value']);

    // metadata ID on new meta created, true on meta update, false on error
    return $result;
  }
}

if (!function_exists('vikinger_blog_post_types_default_get')) {
  /**
   * Get default post types
   * 
   * @return string   Comma separated post types.
   */
  function vikinger_blog_post_types_default_get() {
    return 'post';
  }
}

if (!function_exists('vikinger_blog_post_types_to_display_in_blog_get')) {
  /**
   * Get post types to display in site blog.
   * 
   * @return array   Post types.
   */
  function vikinger_blog_post_types_to_display_in_blog_get() {
    $post_types_to_display = get_theme_mod('vikinger_blog_setting_post_types_to_display_in_blog', vikinger_blog_post_types_default_get());

    return explode(',', $post_types_to_display);
  }
}

if (!function_exists('vikinger_blog_post_types_to_display_in_search_get')) {
  /**
   * Get post types to display in site search.
   * 
   * @return array   Post types.
   */
  function vikinger_blog_post_types_to_display_in_search_get() {
    $post_types_to_display = get_theme_mod('vikinger_blog_setting_post_types_to_display_in_search', vikinger_blog_post_types_default_get());

    return explode(',', $post_types_to_display);
  }
}

if (!function_exists('vikinger_blog_post_type_filter_display_is_enabled')) {
  /**
   * Returns if post type filter display is enabled.
   * 
   * @return bool $post_type_filter_is_enabled   True if enabled, false otherwise.
   */
  function vikinger_blog_post_type_filter_display_is_enabled() {
    $post_type_filter_is_enabled = get_theme_mod('vikinger_blog_setting_post_type_filter_display', 'disabled') === 'enabled';

    return $post_type_filter_is_enabled;
  }
}

if (!function_exists('vikinger_blog_post_type_split_display_is_enabled')) {
  /**
   * Returns if post type split display is enabled.
   * 
   * @return bool $post_type_split_is_enabled   True if enabled, false otherwise.
   */
  function vikinger_blog_post_type_split_display_is_enabled() {
    $post_type_split_is_enabled = get_theme_mod('vikinger_blog_setting_post_type_split_display', 'disabled') === 'enabled';

    return $post_type_split_is_enabled;
  }
}

if (!function_exists('vikinger_post_create_meta_share_count_task')) {
  /**
   * Get post share count meta creation task
   * 
   * @param array   $args       Parameters to give to the task
   * @return Vikinger_Task
   */
  function vikinger_post_create_meta_share_count_task($args) {
    $task_execute = function ($args) {
      $meta_args = [
        'post_id'     => $args['id'],
        'meta_key'    => 'share_count',
        'meta_value'  => $args['count']
      ];

      $result = vikinger_update_post_meta($meta_args);

      if ($result) {
        return $args['id'];
      }

      return false;
    };

    $task_rewind = function ($args, $post_id) {

    };

    $task = new Vikinger_Task($task_execute, $task_rewind, $args);

    return $task;
  }
}

if (!function_exists('vikinger_get_posts_query')) {
  /**
   * Returns filtered post query
   * 
   * @param array   $args   Filter arguments for post query
   * @return WP_Query
   */
  function vikinger_get_posts_query($args) {
    // configuration to get posts
    $query_args = [
      'orderby'         => 'date',
      'order'           => 'DESC',
      'posts_per_page'  => $args['post_count']
    ];

    if (!empty($args['post_ID'])) {
      $query_args['post__not_in'] = [$args['post_ID']];
    }

    // related posts
    if ($args['query'] === 'related') {
      if (empty($args['related_by'])) {
        $args['related_by'] = 'tag';
      }

      if ($args['related_by'] === 'all_and' || $args['related_by'] === 'tag') {
        // require current post tags in post search
        $query_args['tag__in'] = vikinger_get_post_tags_IDs($args['post_ID']);
      }

      if ($args['related_by'] === 'all_and' || $args['related_by'] === 'category') {
        // require current post categories in post search
        $query_args['category__in'] = vikinger_get_post_categories_IDs($args['post_ID']);
      }

      if ($args['related_by'] === 'all_or') {
        $query_args['tax_query'] = array(
          'relation'  => 'OR',
          array(
            'taxonomy'          => 'category',
            'terms'             => vikinger_get_post_categories_IDs($args['post_ID']),
            'include_children'  => false
          ),
          array(
            'taxonomy'  => 'post_tag',
            'terms'     => vikinger_get_post_tags_IDs($args['post_ID'])
          )
        );
      }
    // popular posts
    } else if ($args['query'] === 'popular') {
      $query_args['orderby'] = 'comment_count';
    }

    // reset post data to create a new query
    wp_reset_postdata();

    // create posts query
    return new WP_Query($query_args);
  }
}

if (!function_exists('vikinger_get_post_tags_IDs')) {
  /**
   * Returns post tags IDs
   * 
   * @param int   $post_ID   Post ID to get tags from
   * @return array
   */
  function vikinger_get_post_tags_IDs($post_ID) {
    // get post tags
    $tags = get_the_tags($post_ID);

    $tags_ids = [];

    // if post has tags
    if ($tags) {
      foreach ($tags as $tag) {
        $tags_ids[] = $tag->term_id;
      }

      return $tags_ids;
    }

    return $tags_ids;
  }
}

if (!function_exists('vikinger_get_post_categories_IDs')) {
  /**
   * Returns post categories IDs
   * 
   * @param int   $post_ID   Post ID to get categories from
   * @return array
   */
  function vikinger_get_post_categories_IDs($post_ID) {
    // get post categories
    $categories = get_the_category($post_ID);

    $categories_ids = [];

    // if post has categories
    if ($categories) {
      foreach ($categories as $tag) {
        $categories_ids[] = $tag->term_id;
      }

      return $categories_ids;
    }

    return $categories_ids;
  }
}

?>