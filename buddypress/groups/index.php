<?php
/**
 * Vikinger Template - BuddyPress Groups Index
 * 
 * Displays all the groups of the site
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

?>

<!-- CONTENT GRID -->
<div class="content-grid">
<?php

  $page_header_status = get_theme_mod('vikinger_pageheader_setting_display', 'display');

  if ($page_header_status === 'display') {
    $group_header_icon_id      = get_theme_mod('vikinger_pageheader_group_setting_image', false);
    $group_header_title        = get_theme_mod('vikinger_pageheader_group_setting_title', esc_html_x('Groups', 'Groups Page - Title', 'vikinger'));
    $group_header_description  = get_theme_mod('vikinger_pageheader_group_setting_description', esc_html_x('Browse all the groups of the community!', 'Groups Page - Description', 'vikinger'));

    if ($group_header_icon_id) {
      $group_header_icon_url = wp_get_attachment_image_src($group_header_icon_id , 'full')[0];
    } else {
      $group_header_icon_url = vikinger_customizer_group_page_image_get_default();
    }

    /**
     * Section Banner
     */
    get_template_part('template-part/section/section', 'banner', [
      'section_icon_url'    => $group_header_icon_url,
      'section_title'       => $group_header_title,
      'section_description' => $group_header_description
    ]);
  }

  bp_get_template_part('groups/groups-loop');

?>
</div>
<!-- /CONTENT GRID -->