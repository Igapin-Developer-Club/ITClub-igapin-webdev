<?php
/**
 * Vikinger Customizer - Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader($wp_customize) {
  /**
   * Page Header section
   */
  $wp_customize->add_section('vikinger_pageheader', [
    'title'       => esc_html_x('Page Headers', '(Customizer) Page Headers Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the background image used in all the headers of the theme.', '(Customizer) Page Headers Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Page Header Display
   */
  $wp_customize->add_setting('vikinger_pageheader_setting_display', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_pageheader_control_display', [
    'label'       => esc_html_x('Display / Hide', '(Customizer) Page Header Option - Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide page headers.', '(Customizer) Page Header Option - Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger'),
    ],
    'section'     => 'vikinger_pageheader',
    'settings'    => 'vikinger_pageheader_setting_display'
  ]);

  /**
   * Page Header Background Image
   */
  $wp_customize->add_setting('vikinger_pageheader_setting_background_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_pageheader_control_background_image', [
    'label'       => esc_html_x('Page Header - Background Image', '(Customizer) Page Header Background Image - Title', 'vikinger'),
    'description' => esc_html_x('Background image used for all the page headers.', '(Customizer) Page Header Background Image - Description', 'vikinger'),
    'section'     => 'vikinger_pageheader',
    'settings'    => 'vikinger_pageheader_setting_background_image',
    'mime_type'   => 'image'
  ]));
}

add_action('customize_register', 'vikinger_customizer_pageheader');