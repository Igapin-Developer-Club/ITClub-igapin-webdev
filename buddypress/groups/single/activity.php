<?php
/**
 * Vikinger Template - BuddyPress Groups Activity
 * 
 * Displays a group activity feed
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $group = get_query_var('group');

?>

<!-- GRID -->
<div class="grid grid-3-6-3 mobile-prefer-content">
  <!-- GRID COLUMN -->
  <div class="grid-column">
  <?php

    $group_meta_args = [
      'group_id'  => $group['id']
    ];

    $group_meta = vikinger_group_get_meta($group_meta_args);

    /**
     * Widget Social
     */
    get_template_part('template-part/widget/widget-social', null, [
      'widget_title'  => esc_html__('Social Networks', 'vikinger'),
      'social_links'  => vikinger_groups_meta_get_social_links($group_meta)
    ]);

    /**
     * Widget Info Group
     */
    get_template_part('template-part/widget/widget-info', 'group', [
      'group' => $group
    ]);

    $newest_members = vikinger_groups_get_members(['group_id' => $group['id'], 'exclude_admins' => false, 'per_page' => 5]);

    /**
     * Widget User List
     */
    get_template_part('template-part/widget/widget-user-list', null, [
      'widget_title'    => esc_html__('Newest Members', 'vikinger'),
      'users'           => $newest_members,
      'no_results_text' => esc_html__('No members found', 'vikinger')
    ]);

  ?>
  </div>
  <!-- /GRID COLUMN -->

  <!-- ACTIVITY FILTERABLE LIST -->
  <div id="activity-filterable-list" class="grid-column" data-groupid="<?php echo esc_attr($group['id']); ?>"></div>
  <!-- /ACTIVITY FILTERABLE LIST -->

  <!-- GRID COLUMN -->
  <div class="grid-column">
  <?php

    $group_admins = vikinger_get_group_admins($group['id']);

    /**
     * Widget User List
     */
    get_template_part('template-part/widget/widget-user-list', null, [
      'widget_title'  => esc_html__('Group Administrators', 'vikinger'),
      'users'         => $group_admins
    ]);

    $group_mods = vikinger_get_group_mods($group['id']);

    /**
     * Widget User List
     */
    get_template_part('template-part/widget/widget-user-list', null, [
      'widget_title'    => esc_html__('Group Moderators', 'vikinger'),
      'users'           => $group_mods,
      'no_results_text' => esc_html__('This group doesn\'t have any moderators', 'vikinger')
    ]);

    // add vkmedia photos widget if plugin is active
    if (vikinger_plugin_vkmedia_is_active()) :

  ?>

    <!-- PHOTOS WIDGET -->
    <div id="photos-widget" data-groupid="<?php echo esc_attr($group['id']); ?>"></div>
    <!-- /PHOTOS WIDGET -->
  <?php

    endif;

  ?>
  </div>
  <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->