<?php
/**
 * Vikinger Customizer - Quest Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader_quest($wp_customize) {
  /**
   * Quest Header section
   */
  $wp_customize->add_section('vikinger_pageheader_quest', [
    'title'       => esc_html_x('Page Headers - Quests', '(Customizer) Page Headers Quest Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the quests page header.', '(Customizer) Page Headers Quest Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Quest Header Image
   */
  $wp_customize->add_setting('vikinger_pageheader_quest_setting_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_pageheader_quest_control_image', [
    'label'       => esc_html_x('Quest Page Header - Image', '(Customizer) Quest Page Header Image - Title', 'vikinger'),
    'description' => esc_html_x('Image of the quests page header.', '(Customizer) Quest Page Header Image - Description', 'vikinger'),
    'section'     => 'vikinger_pageheader_quest',
    'settings'    => 'vikinger_pageheader_quest_setting_image',
    'mime_type'   => 'image'
  ]));

  /**
   * Quest Header Title
   */
  $wp_customize->add_setting('vikinger_pageheader_quest_setting_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Quests', 'Quests Page - Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_quest_control_title', [
    'label'       => esc_html_x('Quest Page Header - Title', '(Customizer) Quest Page Header Title - Title', 'vikinger'),
    'description' => esc_html_x('Title of the quests page header.', '(Customizer) Quest Page Header Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_pageheader_quest',
    'settings'    => 'vikinger_pageheader_quest_setting_title'
  ]);

  /**
   * Quest Header Description
   */
  $wp_customize->add_setting('vikinger_pageheader_quest_setting_description', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Browse all the quests of the community!', 'Quests Page - Description', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_quest_control_description', [
    'label'       => esc_html_x('Quest Page Header - Description', '(Customizer) Quest Page Header Description - Title', 'vikinger'),
    'description' => esc_html_x('Description of the quests page header.', '(Customizer) Quest Page Header Description - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_pageheader_quest',
    'settings'    => 'vikinger_pageheader_quest_setting_description'
  ]);
}

add_action('customize_register', 'vikinger_customizer_pageheader_quest');