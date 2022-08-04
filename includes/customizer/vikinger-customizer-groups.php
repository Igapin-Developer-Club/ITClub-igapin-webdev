<?php
/**
 * Vikinger Customizer - Groups
 * 
 * @since 1.0.0
 */

function vikinger_customizer_groups($wp_customize) {
  /**
   * Groups section
   */
  $wp_customize->add_section('vikinger_groups', [
    'title'       => esc_html_x('Groups', '(Customizer) Groups Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the groups options.', '(Customizer) Groups Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Groups Default Avatar
   */
  $wp_customize->add_setting('vikinger_groups_setting_default_avatar', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_groups_control_default_avatar', [
    'label'       => esc_html_x('Groups Default Avatar', '(Customizer) Groups Default Avatar - Title', 'vikinger'),
    'description' => esc_html_x('Default avatar assigned to groups.', '(Customizer) Groups Default Avatar - Description', 'vikinger'),
    'section'     => 'vikinger_groups',
    'settings'    => 'vikinger_groups_setting_default_avatar',
    'mime_type'   => 'image'
  ]));

  /**
   * Groups Default Cover
   */
  $wp_customize->add_setting('vikinger_groups_setting_default_cover', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_groups_control_default_cover', [
    'label'       => esc_html_x('Groups Default Cover', '(Customizer) Groups Default Cover - Title', 'vikinger'),
    'description' => esc_html_x('Default cover assigned to groups.', '(Customizer) Groups Default Cover - Description', 'vikinger'),
    'section'     => 'vikinger_groups',
    'settings'    => 'vikinger_groups_setting_default_cover',
    'mime_type'   => 'image'
  ]));

   /**
   * Groups - List Items Per Page
   */
  $wp_customize->add_setting('vikinger_groups_setting_list_items_per_page', [
    'sanitize_callback' => 'absint',
    'default'           => 12
  ]);

  $wp_customize->add_control('vikinger_groups_setting_list_items_per_page', [
    'label'       => esc_html_x('Group Lists - Items Per Page', '(Customizer) Group Option - Label', 'vikinger'),
    'description' => esc_html_x('Amount of groups to display per page in group lists.', '(Customizer) Group Option - Description', 'vikinger'),
    'type'        => 'number',
    'input_attrs' => [
      'min'   => 1,
      'step'  => 1
    ],
    'section'     => 'vikinger_groups'
  ]);
}

add_action('customize_register', 'vikinger_customizer_groups');