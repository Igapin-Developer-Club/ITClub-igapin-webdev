<?php
/**
 * Vikinger Customizer - Admin Bar
 * 
 * @since 1.0.0
 */

function vikinger_customizer_adminbar($wp_customize) {
  /**
   * Admin Bar section
   */
  $wp_customize->add_section('vikinger_adminbar', [
    'title'       => esc_html_x('Admin Bar', '(Customizer) Admin Bar Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can choose admin bar options.', '(Customizer) Admin Bar Options - Description', 'vikinger'),
    'priority'    => 25,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Admin Bar Display
   */
  $wp_customize->add_setting('vikinger_adminbar_setting_display', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_adminbar_control_display', [
    'label'       => esc_html_x('Display / Hide', '(Customizer) Admin Bar Option - Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide the admin bar. Selecting "Hide" will hide the admin bar on the frontend for all logged in users except administrators. This doesn\'t affect BuddyPress toolbar for logged out users, to hide the bar for logged out users, deactivate BuddyPress Toolbar setting in the  Settings -> BuddyPress -> Options tab.', '(Customizer) Admin Bar Option - Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger'),
    ],
    'section'     => 'vikinger_adminbar',
    'settings'    => 'vikinger_adminbar_setting_display',
  ]);
}

add_action('customize_register', 'vikinger_customizer_adminbar');