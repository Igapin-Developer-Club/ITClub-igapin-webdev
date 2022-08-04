<?php
/**
 * Vikinger Customizer - Search
 * 
 * @since 1.3.6
 */

function vikinger_customizer_search($wp_customize) {
  /**
   * Search section
   */
  $wp_customize->add_section('vikinger_search', [
    'title'       => esc_html_x('Search', '(Customizer) Search - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can change search options.', '(Customizer) Search - Description', 'vikinger'),
    'priority'    => 271,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Search Status
   */
  $wp_customize->add_setting('vikinger_search_setting_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_search_control_status', [
    'label'       => esc_html_x('Display / Hide', '(Customizer) Search Option - Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide the search input on the header.', '(Customizer) Search Option - Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger')
    ],
    'section'     => 'vikinger_search',
    'settings'    => 'vikinger_search_setting_status',
  ]);

  /**
   * Search Blog Enabled
   */
  $wp_customize->add_setting('vikinger_search_setting_blog_enabled', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_bool',
    'default'           => true
  ]);

  $wp_customize->add_control('vikinger_search_control_blog_enabled', [
    'label'       => esc_html_x('Show blog posts in search', '(Customizer) Search Option - Show blog posts in search - Title', 'vikinger'),
    'description' => esc_html_x('If enabled, blog posts are displayed on search.', '(Customizer) Search Option - Show blog posts in search - Description', 'vikinger'),
    'type'        => 'checkbox',
    'section'     => 'vikinger_search',
    'settings'    => 'vikinger_search_setting_blog_enabled',
  ]);

  /**
   * Search Members Enabled
   */
  $wp_customize->add_setting('vikinger_search_setting_members_enabled', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_bool',
    'default'           => true
  ]);

  $wp_customize->add_control('vikinger_search_control_members_enabled', [
    'label'       => esc_html_x('Show members in search', '(Customizer) Search Option - Show members in search - Title', 'vikinger'),
    'description' => esc_html_x('If enabled, members are displayed on search.', '(Customizer) Search Option - Show members in search - Description', 'vikinger'),
    'type'        => 'checkbox',
    'section'     => 'vikinger_search',
    'settings'    => 'vikinger_search_setting_members_enabled',
  ]);

  /**
   * Search Groups Enabled
   */
  $wp_customize->add_setting('vikinger_search_setting_groups_enabled', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_bool',
    'default'           => true
  ]);

  $wp_customize->add_control('vikinger_search_control_groups_enabled', [
    'label'       => esc_html_x('Show groups in search', '(Customizer) Search Option - Show groups in search - Title', 'vikinger'),
    'description' => esc_html_x('If enabled, groups are displayed on search.', '(Customizer) Search Option - Show groups in search - Description', 'vikinger'),
    'type'        => 'checkbox',
    'section'     => 'vikinger_search',
    'settings'    => 'vikinger_search_setting_groups_enabled',
  ]);
}

add_action('customize_register', 'vikinger_customizer_search');