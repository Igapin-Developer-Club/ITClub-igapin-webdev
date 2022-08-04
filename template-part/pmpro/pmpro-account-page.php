<?php
/**
 * Vikinger Template Part - Paid Memberships Pro Account Page
 * 
 * @package Vikinger
 * @since 1.8.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

?>

<!-- CONTENT GRID -->
<div class="content-grid">
<?php

  $page_header_status = get_theme_mod('vikinger_pageheader_setting_display', 'display');

  if ($page_header_status === 'display') {
    $settings_header_icon_id      = get_theme_mod('vikinger_pageheader_settings_setting_image', false);
    $settings_header_title        = get_theme_mod('vikinger_pageheader_settings_setting_title', esc_html_x('Account Hub', 'Settings Page - Title', 'vikinger'));
    $settings_header_description  = get_theme_mod('vikinger_pageheader_settings_setting_description', esc_html_x('Profile info, notifications, friends, groups, messages and much more!', 'Settings Page - Description', 'vikinger'));

    if ($settings_header_icon_id) {
      $settings_header_icon_url = wp_get_attachment_image_src($settings_header_icon_id , 'full')[0];
    } else {
      $settings_header_icon_url = vikinger_customizer_settings_page_image_get_default();
    }

    /**
     * Section Banner
     */
    get_template_part('template-part/section/section', 'banner', [
      'section_icon_url'    => $settings_header_icon_url,
      'section_title'       => $settings_header_title,
      'section_description' => $settings_header_description
    ]);
  }

?>
  <!-- GRID -->
  <div class="grid grid-3-9 medium-space">
  <?php

    $member = false;

    if (vikinger_plugin_buddypress_is_active()) {
      $member = vikinger_get_logged_user_member_data();
    }

    $sidebar_menu_sections = vikinger_members_get_settings_navigation_sections($member);

    /**
     * Sidebar Menu
     */
    get_template_part('template-part/sidebar/sidebar-menu', null, [
      'sidebar_menu_sections' => $sidebar_menu_sections
    ]);

  ?>
    <!-- VIKINGER PMPRO PAGE WRAP -->
    <div class="vikinger-pmpro-page-wrap">
    <?php

      /**
       * Section Header
       */
      get_template_part('template-part/section/section', 'header', [
        'section_pretitle'  => esc_html__('Memberships', 'vikinger'),
        'section_title'     => get_the_title()
      ]);
      
      the_content();

    ?>
    </div>
    <!-- /VIKINGER PMPRO PAGE WRAP -->
  </div>
  <!-- /GRID -->
</div>
<!-- /CONTENT GRID -->