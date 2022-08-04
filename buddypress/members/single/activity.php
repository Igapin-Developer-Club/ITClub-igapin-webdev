<?php
/**
 * Vikinger Template - BuddyPress Members Activity
 * 
 * Displays a member activity feed
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $member = get_query_var('member');

  $friends = vikinger_members_get(['user_id' => $member['id'], 'per_page' => 5]);
  
?>

<!-- GRID -->
<div class="grid grid-3-6-3 mobile-prefer-content">
  <!-- GRID COLUMN -->
  <div class="grid-column">
  <?php

    /**
     * Widget Info About
     */
    get_template_part('template-part/widget/widget-info', 'about', [
      'member' => $member
    ]);

    // if GamiPress plugin is active, show badges and quests widget
    if (vikinger_plugin_gamipress_is_active()) {
      if (vikinger_gamipress_achievement_type_exists('badge')) {
        /**
         * Widget Badges
         */
        get_template_part('template-part/widget/widget-badges', null, [
          'widget_title'  => esc_html__('Badges', 'vikinger'),
          'badges'        => vikinger_gamipress_get_user_completed_achievements('badge', $member['id'])
        ]);
      }

      if (vikinger_gamipress_achievement_type_exists('quest')) {
        /**
         * Widget Quests
         */
        get_template_part('template-part/widget/widget-quests', null, [
          'widget_title'  => esc_html__('Quests', 'vikinger'),
          'quests'        => vikinger_gamipress_get_user_completed_achievements('quest', $member['id'])
        ]);
      }
    }

    // if the friends component is active, show friends widget
    if (bp_is_active('friends')) {
      /**
       * Widget User List
       */
      get_template_part('template-part/widget/widget-user-list', null, [
        'widget_title'    => esc_html__('Friends', 'vikinger'),
        'users'           => $friends,
        'no_results_text' => esc_html__('No friends found', 'vikinger'),
        'button'          => [
          'text'  => esc_html__('See all friends', 'vikinger'),
          'link'  => bp_core_get_user_domain($member['id']) . 'friends'
        ]
      ]);
    }

  ?>
  </div>
  <!-- /GRID COLUMN -->

  <!-- ACTIVITY FILTERABLE LIST -->
  <div id="activity-filterable-list" class="grid-column" data-userid="<?php echo esc_attr($member['id']); ?>"></div>
  <!-- /ACTIVITY FILTERABLE LIST -->

  <!-- GRID COLUMN -->
  <div class="grid-column">
  <?php

    if (vikinger_settings_stream_profile_is_enabled()) {
      $stream_username = vikinger_user_stream_username_get($member['id']);

      if ($stream_username) {
        /**
         * Widget Stream
         */
        get_template_part('template-part/widget/widget', 'stream', [
          'widget_title'  => esc_html__('Stream Box', 'vikinger'),
          'username'      => $stream_username
        ]);
      }
    }

    // if GamiPress plugin is active, show points widget
    if (vikinger_plugin_gamipress_is_active()) {
      $member_points = vikinger_gamipress_get_user_points($member['id']);

      if (count($member_points) > 0) {
        /**
         * Widget Points
         */
        get_template_part('template-part/widget/widget-points', null, [
          'widget_title'  => esc_html__('Credits Balance', 'vikinger'),
          'points'        => vikinger_gamipress_get_user_points($member['id'])
        ]);
      }
    }

    // add vkmedia photos widget if plugin is active
    if (vikinger_plugin_vkmedia_is_active() && vikinger_settings_media_file_upload_is_enabled('image')) :
      
  ?>

    <!-- PHOTOS WIDGET -->
    <div id="photos-widget" data-userid="<?php echo esc_attr($member['id']); ?>"></div>
    <!-- /PHOTOS WIDGET -->

  <?php
  
    endif;

    // if the groups component is active, show groups widget
    if (bp_is_active('groups')) {
      $user_groups = vikinger_groups_get(['user_id' => $member['id'], 'type' => 'popular', 'per_page' => 5]);

      /**
       * Widget Group List Tabbed
       */
      get_template_part('template-part/widget/widget-group-list', null, [
        'widget_title'    => esc_html__('Groups', 'vikinger'),
        'groups'          => $user_groups,
        'no_results_text' => esc_html__('No groups found', 'vikinger'),
        'button'          => [
          'text'  => esc_html__('See all groups', 'vikinger'),
          'link'  => bp_core_get_user_domain($member['id']) . 'groups'
        ]
      ]);
    }

  ?>
  </div>
  <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->