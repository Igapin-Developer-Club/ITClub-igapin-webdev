<?php
/**
 * Vikinger Customizer - WooCommerce Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader_woocommerce($wp_customize) {
  /**
   * WooCommerce Header section
   */
  $wp_customize->add_section('vikinger_pageheader_woocommerce', [
    'title'       => esc_html_x('Page Headers - WooCommerce', '(Customizer) Page Headers WooCommerce Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the woocommerce page headers.', '(Customizer) Page Headers WooCommerce Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * WooCommerce Header Image
   */
  $wp_customize->add_setting('vikinger_pageheader_woocommerce_setting_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_pageheader_woocommerce_control_image', [
    'label'       => esc_html_x('WooCommerce Page Header - Image', '(Customizer) WooCommerce Page Header Image - Title', 'vikinger'),
    'description' => esc_html_x('Image of the woocommerce page headers.', '(Customizer) WooCommerce Page Header Image - Description', 'vikinger'),
    'section'     => 'vikinger_pageheader_woocommerce',
    'settings'    => 'vikinger_pageheader_woocommerce_setting_image',
    'mime_type'   => 'image'
  ]));

  /**
   * WooCommerce Header Title
   */
  $wp_customize->add_setting('vikinger_pageheader_woocommerce_setting_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Vikinger Shop', 'WooCommerce Page - Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_woocommerce_control_title', [
    'label'       => esc_html_x('WooCommerce Page Header - Title', '(Customizer) WooCommerce Page Header Title - Title', 'vikinger'),
    'description' => esc_html_x('Title of the woocommerce page headers.', '(Customizer) WooCommerce Page Header Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_pageheader_woocommerce',
    'settings'    => 'vikinger_pageheader_woocommerce_setting_title'
  ]);

  /**
   * WooCommerce Header Description
   */
  $wp_customize->add_setting('vikinger_pageheader_woocommerce_setting_description', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Merchandise, clothing, coffee mugs and more!', 'WooCommerce Page - Description', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_woocommerce_control_description', [
    'label'       => esc_html_x('WooCommerce Page Header - Description', '(Customizer) WooCommerce Page Header Description - Title', 'vikinger'),
    'description' => esc_html_x('Description of the woocommerce page headers.', '(Customizer) WooCommerce Page Header Description - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_pageheader_woocommerce',
    'settings'    => 'vikinger_pageheader_woocommerce_setting_description'
  ]);
}

add_action('customize_register', 'vikinger_customizer_pageheader_woocommerce');