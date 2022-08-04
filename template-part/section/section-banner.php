<?php
/**
 * Vikinger Template Part - Section Banner
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string $section_icon_url     Section icon url.
 *   @type string $section_title        Section title.
 *   @type string $section_description  Section description.
 * }
 */

  $section_banner_background_id = get_theme_mod('vikinger_pageheader_setting_background_image', false);

  if ($section_banner_background_id) {
    $section_banner_background_url = wp_get_attachment_image_src($section_banner_background_id , 'full')[0];
  } else {
    $section_banner_background_url = vikinger_customizer_page_header_cover_image_get_default();
  }

?>

<!-- SECTION BANNER -->
<div class="section-banner" style="background: url('<?php echo esc_url($section_banner_background_url); ?>') center center / cover no-repeat;">
  <!-- SECTION BANNER ICON -->
  <img class="section-banner-icon" src="<?php echo esc_url($args['section_icon_url']); ?>" alt="section-icon">
  <!-- /SECTION BANNER ICON -->

  <!-- SECTION BANNER TITLE -->
  <p class="section-banner-title"><?php echo esc_html($args['section_title']); ?></p>
  <!-- /SECTION BANNER TITLE -->

  <!-- SECTION BANNER TEXT -->
  <p class="section-banner-text"><?php echo esc_html($args['section_description']); ?></p>
  <!-- /SECTION BANNER TEXT -->
</div>
<!-- /SECTION BANNER -->