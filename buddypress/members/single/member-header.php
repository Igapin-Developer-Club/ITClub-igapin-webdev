<?php
/**
 * Vikinger Template - BuddyPress Member Header
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $member = get_query_var('member');

  $member_navigation_items = get_query_var('member_navigation_items');

  $member_subnavigation_items = get_query_var('member_subnavigation_items');

  $current_component = get_query_var('current_component');

  $social_links = vikinger_members_get_xprofile_social_links($member);

?>

<!-- CONTENT GRID -->
<div class="content-grid">
<?php

  /**
   * Profile Header
   */
  get_template_part('template-part/profile/profile-header', null, [
    'member'        => $member,
    'social_links'  => $social_links
  ]);

  /**
   * Section Navigation
   */
  get_template_part('template-part/section/section', 'navigation', [
    'nav_items' => $member_navigation_items
  ]);

  if ($member_subnavigation_items) {
  ?>

  <!-- GRID -->
  <div class="grid grid-3-9 medium-space">
    <!-- GRID COLUMN -->
    <div class="grid-column">
    <?php

      $sidebar_menu_sections = [
        [  
          'menu_items'      => $member_subnavigation_items
        ]
      ];

      if ($current_component === 'forums') {
        $sidebar_menu_sections = [
          [
            'title'       => esc_html_x('Forum Activity', 'Forum Activity Menu - Title', 'vikinger'),
            'description' => esc_html_x('Check out your topics, replies, engagements and more! ', 'Forum Activity Menu - Description', 'vikinger'),
            'icon'        => 'forum',
            'menu_items'  => $member_subnavigation_items
          ]
        ];
      }

      /**
       * Sidebar Menu
       */
      get_template_part('template-part/sidebar/sidebar-menu', null, [
        'sidebar_menu_sections' => $sidebar_menu_sections,
        'accordion'             => false,
        'disable_header'        => $current_component !== 'forums'
      ]);

    ?>
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="grid-column">

  <?php
  }

?>
