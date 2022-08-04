<?php 
/**
 * Vikinger Template - BuddyPress Groups Members
 * 
 * Displays group members
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $group = get_query_var('group');

  /**
   * Section Header
   */
  get_template_part('template-part/section/section', 'header', [
    'section_pretitle'    => sprintf(
      esc_html_x('Browse %s', 'Section Header - Pretitle', 'vikinger'),
      $group['name']
    ),
    'section_title'       => esc_html__('Members', 'vikinger'),
    'section_text'        => $group['total_member_count'],
    'section_text_color'  => 'secondary'
  ]);

  $members_grid_type = vikinger_logged_user_grid_type_get('member');
  
?>

<!-- MEMBER FILTERABLE LIST -->
<div id="group-members-filterable-list" class="filterable-list" data-themecolor="secondary" data-groupid="<?php echo esc_attr($group['id']); ?>" data-grid-type="<?php echo esc_attr($members_grid_type); ?>"></div>
<!-- /MEMBER FILTERABLE LIST -->
