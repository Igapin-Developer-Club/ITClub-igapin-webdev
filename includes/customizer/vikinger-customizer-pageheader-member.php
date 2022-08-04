<?php
/**
 * Vikinger Customizer - Member Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader_member($wp_customize) {
  /**
   * Member Header section
   */
  $wp_customize->add_section('vikinger_pageheader_member', [
    'title'       => esc_html_x('Page Headers - Members', '(Customizer) Page Headers Member Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the member page header.', '(Customizer) Page Headers Member Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Member Header Image
   */
  $wp_customize->add_setting('vikinger_pageheader_member_setting_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_pageheader_member_control_image', [
    'label'       => esc_html_x('Member Page Header - Image', '(Customizer) Member Page Header Image - Title', 'vikinger'),
    'description' => esc_html_x('Image of the members page header.', '(Customizer) Member Page Header Image - Description', 'vikinger'),
    'section'     => 'vikinger_pageheader_member',
    'settings'    => 'vikinger_pageheader_member_setting_image',
    'mime_type'   => 'image'
  ]));

  /**
   * Member Header Title
   */
  $wp_customize->add_setting('vikinger_pageheader_member_setting_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Members', 'Members Page - Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_member_control_title', [
    'label'       => esc_html_x('Member Page Header - Title', '(Customizer) Member Page Header Title - Title', 'vikinger'),
    'description' => esc_html_x('Title of the members page header.', '(Customizer) Member Page Header Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_pageheader_member',
    'settings'    => 'vikinger_pageheader_member_setting_title'
  ]);

  /**
   * Member Header Description
   */
  $wp_customize->add_setting('vikinger_pageheader_member_setting_description', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Browse all the members of the community!', 'Members Page - Description', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_member_control_description', [
    'label'       => esc_html_x('Member Page Header - Description', '(Customizer) Member Page Header Description - Title', 'vikinger'),
    'description' => esc_html_x('Description of the members page header.', '(Customizer) Member Page Header Description - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_pageheader_member',
    'settings'    => 'vikinger_pageheader_member_setting_description'
  ]);
}

add_action('customize_register', 'vikinger_customizer_pageheader_member');