<?php
/**
 * Vikinger Template - BuddyPress Members Friends
 * 
 * Displays member friends
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $member = get_query_var('member');

  /**
   * Section Header
   */
  get_template_part('template-part/section/section', 'header', [
    'section_pretitle'  => sprintf(
      esc_html_x('Browse %s', 'Section Header - Pretitle', 'vikinger'),
      $member['name']
    ),
    'section_title'     => esc_html__('Friends', 'vikinger'),
    'section_text'      => $member['stats']['friend_count']
  ]);

  /**
   * Member Filterable List
   */
  get_template_part('template-part/member/member-filterable-list', null, [
    'attributes'  => [
      'userid'  => $member['id']
    ]
  ]);

?>
