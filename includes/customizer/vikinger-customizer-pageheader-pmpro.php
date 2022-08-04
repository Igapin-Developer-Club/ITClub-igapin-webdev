<?php
/**
 * Vikinger Customizer - PMPRO Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader_pmpro($wp_customize) {
  /**
   * WooCommerce Header section
   */
  $wp_customize->add_section('vikinger_pageheader_pmpro', [
    'title'       => esc_html_x('Page Headers - Paid Memberships Pro', '(Customizer) Page Headers Paid Memberships Pro Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the paid memberships pro page headers.', '(Customizer) Page Headers Paid Memberships Pro Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Paid Memberships Pro Header Image
   */
  $wp_customize->add_setting('vikinger_pageheader_pmpro_setting_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_pageheader_pmpro_control_image', [
    'label'       => esc_html_x('Paid Memberships Pro Page Header - Image', '(Customizer) Paid Memberships Pro Page Header Image - Title', 'vikinger'),
    'description' => esc_html_x('Image of the paid memberships pro page headers.', '(Customizer) Paid Memberships Pro Page Header Image - Description', 'vikinger'),
    'section'     => 'vikinger_pageheader_pmpro',
    'settings'    => 'vikinger_pageheader_pmpro_setting_image',
    'mime_type'   => 'image'
  ]));

  /**
   * Paid Memberships Pro Header Title
   */
  $wp_customize->add_setting('vikinger_pageheader_pmpro_setting_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Memberships', 'Paid Memberships Pro Page - Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_pmpro_control_title', [
    'label'       => esc_html_x('Paid Memberships Pro Page Header - Title', '(Customizer) Paid Memberships Pro Page Header Title - Title', 'vikinger'),
    'description' => esc_html_x('Title of the paid memberships pro page headers.', '(Customizer) Paid Memberships Pro Page Header Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_pageheader_pmpro',
    'settings'    => 'vikinger_pageheader_pmpro_setting_title'
  ]);

  /**
   * Paid Memberships Pro Header Description
   */
  $wp_customize->add_setting('vikinger_pageheader_pmpro_setting_description', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Check out our membership options and perks!', 'Paid Memberships Pro Page - Description', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_pmpro_control_description', [
    'label'       => esc_html_x('Paid Memberships Pro Page Header - Description', '(Customizer) Paid Memberships Pro Page Header Description - Title', 'vikinger'),
    'description' => esc_html_x('Description of the paid memberships pro page headers.', '(Customizer) Paid Memberships Pro Page Header Description - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_pageheader_pmpro',
    'settings'    => 'vikinger_pageheader_pmpro_setting_description'
  ]);
}

add_action('customize_register', 'vikinger_customizer_pageheader_pmpro');