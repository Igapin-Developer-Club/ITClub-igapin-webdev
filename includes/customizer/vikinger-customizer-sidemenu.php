<?php
/**
 * Vikinger Customizer - Side Menu
 * 
 * @since 1.0.0
 */

function vikinger_customizer_sidemenu($wp_customize) {
  /**
   * Side Menu section
   */
  $wp_customize->add_section('vikinger_sidemenu', [
    'title'       => esc_html_x('Side Menu', '(Customizer) Side Menu Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can choose side menu options.', '(Customizer) Side Menu Options - Description', 'vikinger'),
    'priority'    => 280,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Side Menu Display
   */
  $wp_customize->add_setting('vikinger_sidemenu_setting_display', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_sidemenu_control_display', [
    'label'       => esc_html_x('Display / Hide', '(Customizer) Side Menu Option - Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide the side menu.', '(Customizer) Side Menu Option - Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger'),
    ],
    'section'     => 'vikinger_sidemenu',
    'settings'    => 'vikinger_sidemenu_setting_display',
  ]);
}

add_action('customize_register', 'vikinger_customizer_sidemenu');