<?php
/**
 * Vikinger Customizer - Loading Screen
 * 
 * @since 1.0.0
 */

function vikinger_customizer_loadingscreen($wp_customize) {
  /**
   * Loading Screen section
   */
  $wp_customize->add_section('vikinger_loadingscreen', [
    'title'       => esc_html_x('Loading Screen', '(Customizer) Loading Screen - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can choose to display or hide the loading screen of the site. We recommend to display the loading screen to avoid FOUC (flash of unstyled content).', '(Customizer) Loading Screen - Description', 'vikinger'),
    'priority'    => 270,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Loading Screen Display
   */
  $wp_customize->add_setting('vikinger_loadingscreen_setting_display', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_loadingscreen_control_display', [
    'label'       => esc_html_x('Display / Hide', '(Customizer) Loading Screen Option - Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide the loading screen.', '(Customizer) Loading Screen Option - Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger'),
    ],
    'section'     => 'vikinger_loadingscreen',
    'settings'    => 'vikinger_loadingscreen_setting_display',
  ]);

  /**
   * Loading Screen Logo
   */
  $wp_customize->add_setting('vikinger_loadingscreen_setting_logo', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_loadingscreen_control_logo', [
    'label'     => esc_html_x('Logo', '(Customizer) Loading Screen - Logo - Title', 'vikinger'),
    'description' => esc_html_x('You can upload an image to use for the loading screen logo. Site identity logo will be used by default.', '(Customizer) Loading Screen Option - Logo - Description', 'vikinger'),
    'section'   => 'vikinger_loadingscreen',
    'settings'  => 'vikinger_loadingscreen_setting_logo',
    'mime_type' => 'image'
  ]));
}

add_action('customize_register', 'vikinger_customizer_loadingscreen');