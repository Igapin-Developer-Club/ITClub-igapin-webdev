<?php
/**
 * Functions - VKMedia + BuddyPress - Actions
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Member Profile - Photos Page
 */
if (vikinger_settings_media_file_upload_is_enabled('image')) {
  if (!function_exists('vikinger_members_photos_page_setup_nav')) {
    /**
     * Creates member photos page navigation
     */
    function vikinger_members_photos_page_setup_nav() {
      global $bp;

      bp_core_new_nav_item([
        'name'            => esc_html__('Photos', 'vikinger'),
        'slug'            => 'photos',
        'screen_function' => 'vikinger_members_photos_page',
        'position'        => 7
      ]);
    }
  }

  add_action('bp_setup_nav', 'vikinger_members_photos_page_setup_nav');

  if (!function_exists('vikinger_members_photos_page')) {
    /**
     * Members photos page setup
     */
    function vikinger_members_photos_page() {
      add_action('bp_template_content', 'vikinger_members_photos_page_screen_content');
      bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
    }
  }

  if (!function_exists('vikinger_members_photos_page_screen_content')) {
    /**
     * Members photos page HTML content
     */
    function vikinger_members_photos_page_screen_content() {
      $member = get_query_var('member');

      ?>
      <div id="activity-photo-list" data-userid=<?php echo esc_attr($member['id']); ?>></div>
      <?php
    }
  }
}

/**
 * Member Profile - Videos Page
 */
if (vikinger_settings_media_file_upload_is_enabled('video')) {
  if (!function_exists('vikinger_members_videos_page_setup_nav')) {
    /**
     * Creates member videos page navigation
     */
    function vikinger_members_videos_page_setup_nav() {
      global $bp;

      bp_core_new_nav_item([
        'name'            => esc_html__('Videos', 'vikinger'),
        'slug'            => 'videos',
        'screen_function' => 'vikinger_members_videos_page',
        'position'        => 8
      ]);
    }
  }

  add_action('bp_setup_nav', 'vikinger_members_videos_page_setup_nav');

  if (!function_exists('vikinger_members_videos_page')) {
    /**
     * Members videos page setup
     */
    function vikinger_members_videos_page() {
      add_action('bp_template_content', 'vikinger_members_videos_page_screen_content');
      bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
    }
  }

  if (!function_exists('vikinger_members_videos_page_screen_content')) {
    /**
     * Members videos page HTML content
     */
    function vikinger_members_videos_page_screen_content() {
      $member = get_query_var('member');

      ?>
      <div id="activity-video-list" data-userid=<?php echo esc_attr($member['id']); ?>></div>
      <?php
    }
  }
}