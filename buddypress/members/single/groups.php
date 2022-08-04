<?php
/**
 * Vikinger Template - BuddyPress Members Groups
 * 
 * Displays the groups a member has created or joined
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $member = get_query_var('member');
  $group_count = vikinger_groups_get_count(['user_id' => $member['id']]);

  /**
   * Section Header
   */
  get_template_part('template-part/section/section', 'header', [
    'section_pretitle'    => sprintf(
      esc_html_x('Browse %s', 'Section Header - Pretitle', 'vikinger'),
      $member['name']
    ),
    'section_title'       => esc_html__('Groups', 'vikinger'),
    'section_text'        => $group_count
  ]);

  $groups_grid_type = vikinger_logged_user_grid_type_get('group');
  
?>

<!-- GROUP FILTERABLE LIST -->
<div id="group-filterable-list" class="filterable-list" data-userid="<?php echo esc_attr($member['id']); ?>" data-grid-type="<?php echo esc_attr($groups_grid_type); ?>"></div>
<!-- /GROUP FILTERABLE LIST -->
