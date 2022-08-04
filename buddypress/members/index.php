<?php
/**
 * Vikinger Template - BuddyPress Members Index
 * 
 * Displays all the members of the site
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
    $member_header_icon_id      = get_theme_mod('vikinger_pageheader_member_setting_image', false);
    $member_header_title        = get_theme_mod('vikinger_pageheader_member_setting_title', esc_html_x('Members', 'Members Page - Title', 'vikinger'));
    $member_header_description  = get_theme_mod('vikinger_pageheader_member_setting_description', esc_html_x('Browse all the members of the community!', 'Members Page - Description', 'vikinger'));

    if ($member_header_icon_id) {
      $member_header_icon_url = wp_get_attachment_image_src($member_header_icon_id , 'full')[0];
    } else {
      $member_header_icon_url = vikinger_customizer_member_page_image_get_default();
    }

    /**
     * Section Banner
     */
    get_template_part('template-part/section/section', 'banner', [
      'section_icon_url'    => $member_header_icon_url,
      'section_title'       => $member_header_title,
      'section_description' => $member_header_description
    ]);
  }

  bp_get_template_part('members/members-loop');
  
?>
</div>
<!-- /CONTENT GRID -->