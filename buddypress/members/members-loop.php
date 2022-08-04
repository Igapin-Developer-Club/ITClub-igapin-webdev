<?php
/**
 * Vikinger Template - BuddyPress Members Loop
 * 
 * Displays the members loop
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $member_filterable_list_args = [];

  // add pmpro membership restrictions
  if (vikinger_plugin_pmpro_buddypress_is_active() && pmpro_bp_is_member_directory_locked()) {
    $member_filterable_list_args['attributes'] = [];
    $restricted_members_ids = pmpro_bp_get_members_in_directory();

    if (!empty($restricted_members_ids)) {
      $member_filterable_list_args['attributes']['member-include'] = implode(',', $restricted_members_ids);
    } else {
      $member_filterable_list_args['attributes']['member-include'] = '0';
    }
  }

  /**
   * Member Filterable List
   */
  get_template_part('template-part/member/member-filterable-list', null, $member_filterable_list_args);

?>