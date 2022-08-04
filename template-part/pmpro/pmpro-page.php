<?php
/**
 * Vikinger Template Part - Paid Memberships Pro Page
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
    $pmpro_header_icon_id      = get_theme_mod('vikinger_pageheader_pmpro_setting_image', false);
    $pmpro_header_title        = get_theme_mod('vikinger_pageheader_pmpro_setting_title', esc_html_x('Memberships', 'Paid Memberships Pro Page - Title', 'vikinger'));
    $pmpro_header_description  = get_theme_mod('vikinger_pageheader_pmpro_setting_description', esc_html_x('Check out our membership options and perks!', 'Paid Memberships Pro Page - Description', 'vikinger'));

    if ($pmpro_header_icon_id) {
      $pmpro_header_icon_url = wp_get_attachment_image_src($pmpro_header_icon_id , 'full')[0];
    } else {
      $pmpro_header_icon_url = vikinger_customizer_pmpro_page_image_get_default();
    }

    /**
     * Section Banner
     */
    get_template_part('template-part/section/section', 'banner', [
      'section_icon_url'    => $pmpro_header_icon_url,
      'section_title'       => $pmpro_header_title,
      'section_description' => $pmpro_header_description
    ]);
  }

?>

  <!-- VIKINGER PMPRO PAGE WRAP -->
  <div class="vikinger-pmpro-page-wrap">
    <!-- VIKINGER PMPRO PAGE TITLE -->
    <h2 class="vikinger-pmpro-page-title"><?php the_title(); ?></h2>
    <!-- /VIKINGER PMPRO PAGE TITLE -->

    <?php the_content(); ?>
  </div>
  <!-- /VIKINGER PMPRO PAGE WRAP -->
</div>
<!-- /CONTENT GRID -->