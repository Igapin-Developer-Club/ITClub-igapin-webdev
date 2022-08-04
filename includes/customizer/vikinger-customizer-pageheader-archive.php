<?php
/**
 * Vikinger Customizer - Archive Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader_archive($wp_customize) {
  /**
   * Archive Page Header section
   */
  $wp_customize->add_section('vikinger_pageheader_archive', [
    'title'       => esc_html_x('Page Headers - Archive', '(Customizer) Page Headers Archive Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the archive page header.', '(Customizer) Page Headers Archive Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Archive Header Image
   */
  $wp_customize->add_setting('vikinger_pageheader_archive_setting_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_pageheader_archive_control_image', [
    'label'       => esc_html_x('Archive Page Header - Image', '(Customizer) Archive Page Header Image - Title', 'vikinger'),
    'description' => esc_html_x('Image of the archive page header.', '(Customizer) Archive Page Header Image - Description', 'vikinger'),
    'section'     => 'vikinger_pageheader_archive',
    'settings'    => 'vikinger_pageheader_archive_setting_image',
    'mime_type'   => 'image'
  ]));

  /**
   * Archive Header Title
   */
  $wp_customize->add_setting('vikinger_pageheader_archive_setting_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Archive', 'Archive Page - Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_archive_control_title', [
    'label'       => esc_html_x('Archive Page Header - Title', '(Customizer) Archive Page Header Title - Title', 'vikinger'),
    'description' => esc_html_x('Title of the archive page header.', '(Customizer) Archive Page Header Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_pageheader_archive',
    'settings'    => 'vikinger_pageheader_archive_setting_title'
  ]);

  /**
   * Archive Header Description
   */
  $wp_customize->add_setting('vikinger_pageheader_archive_setting_description', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Check what was happening in the past!', 'Archive Page - Description', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_archive_control_description', [
    'label'       => esc_html_x('Archive Page Header - Description', '(Customizer) Archive Page Header Description - Title', 'vikinger'),
    'description' => esc_html_x('Description of the archive page header.', '(Customizer) Archive Page Header Description - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_pageheader_archive',
    'settings'    => 'vikinger_pageheader_archive_setting_description'
  ]);
}

add_action('customize_register', 'vikinger_customizer_pageheader_archive');