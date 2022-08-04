<?php
/**
 * Vikinger Customizer - Site Identity
 * 
 * @since 1.0.0
 */

function vikinger_customizer_siteidentity($wp_customize) {
  /**
   * Header Type
   */
  $wp_customize->add_setting('vikinger_siteidentity_setting_header_type', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'v1'
  ]);

  $wp_customize->add_control('vikinger_siteidentity_control_header_type', [
    'label'       => esc_html_x('Display Logo and Site Title / Display Logo', '(Customizer) Site Identity Option - Display Logo and Site Title / Display Logo - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display the logo and site title or only the logo in the header.', '(Customizer) Site Identity Option - Display Logo and Site Title / Display Logo - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'v1'  => esc_html__('Display Logo and Site Title', 'vikinger'),
      'v2'  => esc_html__('Display Logo', 'vikinger'),
    ],
    'section'     => 'title_tagline',
    'settings'    => 'vikinger_siteidentity_setting_header_type',
  ]);
}

add_action('customize_register', 'vikinger_customizer_siteidentity');