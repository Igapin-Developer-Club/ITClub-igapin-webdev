<?php
/**
 * Vikinger Template - BuddyPress Activity Home
 * 
 * Displays a single activity
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $displayed_user   = bp_get_displayed_user();
  $displayed_member = vikinger_members_get(['include' => [$displayed_user->id], 'data_scope' => 'user-preview'])[0];

  $nav_items = vikinger_members_get_navigation_items($displayed_member, true);
  $subnav_items = false;
  
  set_query_var('member', $displayed_member);
  set_query_var('member_navigation_items', $nav_items);
  set_query_var('member_subnavigation_items', $subnav_items);

  /**
   * Get members page header
   */
  bp_get_template_part('members/single/member-header');

  if (bp_has_activities( 'include=' . bp_current_action())) {
    while (bp_activities()) {
      bp_the_activity();

      /**
       * Get activity entry
       */
      bp_get_template_part('activity/entry');
    }
  }

?>
</div>
<!-- /CONTENT GRID -->