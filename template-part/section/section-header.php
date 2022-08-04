<?php
/**
 * Vikinger Template Part - Social Items
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string   $section_pretitle     Section pretitle.
 *   @type string   $section_title        Section title.
 *   @type int      $section_text         Optional. Highlighted text to add after the section title.
 *   @type string   $section_text_color   Optional. Color to apply to the results count.
 * }
 */

  $section_color_classes = isset($args['section_text_color']) ? $args['section_text_color'] : '';

?>

<!-- SECTION HEADER -->
<div class="section-header">
  <!-- SECTION HEADER INFO -->
  <div class="section-header-info">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php echo esc_html($args['section_pretitle']); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <h2 class="section-title"><?php echo esc_html($args['section_title']); ?> <span class="highlighted <?php echo esc_attr($section_color_classes); ?>"><?php echo isset($args['section_text']) ? esc_html($args['section_text']) : ''; ?></span></h2>
    <!-- /SECTION TITLE -->
  </div>
  <!-- /SECTION HEADER INFO -->
</div>
<!-- /SECTION HEADER -->