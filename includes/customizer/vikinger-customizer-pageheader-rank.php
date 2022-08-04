<?php
/**
 * Vikinger Customizer - Rank Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader_rank($wp_customize) {
  /**
   * Rank Header section
   */
  $wp_customize->add_section('vikinger_pageheader_rank', [
    'title'       => esc_html_x('Page Headers - Ranks', '(Customizer) Page Headers Rank Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the ranks page header.', '(Customizer) Page Headers Rank Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Rank Header Image
   */
  $wp_customize->add_setting('vikinger_pageheader_rank_setting_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_pageheader_rank_control_image', [
    'label'       => esc_html_x('Rank Page Header - Image', '(Customizer) Rank Page Header Image - Title', 'vikinger'),
    'description' => esc_html_x('Image of the ranks page header.', '(Customizer) Rank Page Header Image - Description', 'vikinger'),
    'section'     => 'vikinger_pageheader_rank',
    'settings'    => 'vikinger_pageheader_rank_setting_image',
    'mime_type'   => 'image'
  ]));

  /**
   * Rank Header Title
   */
  $wp_customize->add_setting('vikinger_pageheader_rank_setting_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Ranks', 'Ranks Page - Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_rank_control_title', [
    'label'       => esc_html_x('Rank Page Header - Title', '(Customizer) Rank Page Header Title - Title', 'vikinger'),
    'description' => esc_html_x('Title of the ranks page header.', '(Customizer) Rank Page Header Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_pageheader_rank',
    'settings'    => 'vikinger_pageheader_rank_setting_title'
  ]);

  /**
   * Rank Header Description
   */
  $wp_customize->add_setting('vikinger_pageheader_rank_setting_description', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Browse all the ranks of the community!', 'Ranks Page - Description', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_rank_control_description', [
    'label'       => esc_html_x('Rank Page Header - Description', '(Customizer) Rank Page Header Description - Title', 'vikinger'),
    'description' => esc_html_x('Description of the ranks page header.', '(Customizer) Rank Page Header Description - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_pageheader_rank',
    'settings'    => 'vikinger_pageheader_rank_setting_description'
  ]);
}

add_action('customize_register', 'vikinger_customizer_pageheader_rank');