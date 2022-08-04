<?php
/**
 * Vikinger Template Part - Forum Page
 * 
 * @package Vikinger
 * @since 1.3.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

?>

<!-- CONTENT GRID -->
<div class="content-grid">
<?php

  $page_header_status = get_theme_mod('vikinger_pageheader_setting_display', 'display');

  if ($page_header_status === 'display') {
    $forum_header_icon_id      = get_theme_mod('vikinger_pageheader_forum_setting_image', false);
    $forum_header_title        = get_theme_mod('vikinger_pageheader_forum_setting_title', esc_html_x('Forums', 'Forum Page - Title', 'vikinger'));
    $forum_header_description  = get_theme_mod('vikinger_pageheader_forum_setting_description', esc_html_x('Talk about anything you want!', 'Forum Page - Description', 'vikinger'));

    if ($forum_header_icon_id) {
      $forum_header_icon_url = wp_get_attachment_image_src($forum_header_icon_id , 'full')[0];
    } else {
      $forum_header_icon_url = vikinger_customizer_forum_page_image_get_default();
    }

    /**
     * Section Banner
     */
    get_template_part('template-part/section/section', 'banner', [
      'section_icon_url'    => $forum_header_icon_url,
      'section_title'       => $forum_header_title,
      'section_description' => $forum_header_description
    ]);
  }

?>
  <!-- FORUM HEADING -->
  <div class="forum-heading">
    <!-- FORUM PRETITLE -->
    <h2 class="forum-pretitle"><?php esc_html_e('Welcome To', 'vikinger'); ?></h2>
    <!-- /FORUM PRETITLE -->

    <!-- FORUM TITLE -->
    <h2 class="forum-title"><?php the_title(); ?></h2>
    <!-- /FORUM TITLE -->
  </div>
  <!-- /FORUM HEADING -->
<?php

  the_content();

?>
</div>
<!-- /CONTENT GRID -->