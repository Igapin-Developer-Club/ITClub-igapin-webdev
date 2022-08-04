<?php
/**
 * Vikinger Customizer - Login Register
 * 
 * @since 1.0.0
 */

function vikinger_customizer_loginregister($wp_customize) {
  /**
   * Login Register Page section
   */
  $wp_customize->add_section('vikinger_loginregister', [
    'title'       => esc_html_x('Login - Register', '(Customizer) Login - Register Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the login and register page options.', '(Customizer) Login - Register Options - Description', 'vikinger'),
    'priority'    => 20,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Login Register Display
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_forcelogin', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'disabled'
  ]);

  $wp_customize->add_control('vikinger_loginregister_control_forcelogin', [
    'label'       => esc_html_x('Force Login', '(Customizer) Force Login Option - Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to force non admin users to have to be logged in in order to be able to browse your site pages (will redirect users to the login page).', '(Customizer) Force Login Option - Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_loginregister',
    'settings'    => 'vikinger_loginregister_setting_forcelogin',
  ]);

  /**
   * Login Register Redirect URL
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_redirect_url', [
    'sanitize_callback' => 'esc_url_raw',
    'default'           => ''
  ]);

  $wp_customize->add_control('vikinger_loginregister_control_redirect_url', [
    'label'           => esc_html_x('Login - Redirect Page URL', '(Customizer) Login Option - Redirect Page URL - Title', 'vikinger'),
    'description'     => esc_html_x('You can enter the URL which users are redirected to when they login to the site (home page is used by default).', '(Customizer) Login Option - Redirect Page URL - Description', 'vikinger'),
    'type'            => 'text',
    'section'         => 'vikinger_loginregister',
    'settings'        => 'vikinger_loginregister_setting_redirect_url',
  ]);

  /**
   * Login Register Exception URL
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_exception_urls', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text_comma_separated',
    'default'           => ''
  ]);

  $wp_customize->add_control('vikinger_loginregister_control_exception_urls', [
    'label'           => esc_html_x('Login - Exception Page URLs', '(Customizer) Login Option - Exception Page URLs - Title', 'vikinger'),
    'description'     => esc_html_x('You can enter URLs (comma separated) that can still be accessible when the force login option is enabled (you can use regular expressions in the URLs).', '(Customizer) Login Option - Exception Page URLs - Description', 'vikinger'),
    'type'            => 'textarea',
    'section'         => 'vikinger_loginregister',
    'settings'        => 'vikinger_loginregister_setting_exception_urls',
  ]);

  /**
   * Login Page Logo
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_logo', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'vikinger_loginregister_control_login_logo', [
    'label'       => esc_html_x('Login Page Logo', '(Customizer) Login Page Logo - Title', 'vikinger'),
    'description' => esc_html_x('The logo that displays above the form of the login page.', '(Customizer) Login Page Logo - Description', 'vikinger'),
    'section'     => 'vikinger_loginregister',
    'settings'    => 'vikinger_loginregister_setting_login_logo',
    'mime_type'   => 'image'
  ]));

  /**
   * Login Page Background
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_background', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'vikinger_loginregister_control_login_background', [
    'label'       => esc_html_x('Login Page Background', '(Customizer) Login Page Background - Title', 'vikinger'),
    'description' => esc_html_x('The background image of the login page.', '(Customizer) Login Page Background - Description', 'vikinger'),
    'section'     => 'vikinger_loginregister',
    'settings'    => 'vikinger_loginregister_setting_login_background',
    'mime_type'   => 'image'
  ]));

  /**
   * Login Page Pre Title
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_pretitle', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Welcome to', 'Login Page - Pre Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_loginregister_control_login_pretitle', [
    'label'       => esc_html_x('Login Page - Pre Title', '(Customizer) Login Page Pre Title - Title', 'vikinger'),
    'description' => esc_html_x('The text that displays before the title of the login page.', '(Customizer) Login Page Pre Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_loginregister',
    'settings'    => 'vikinger_loginregister_setting_login_pretitle'
  ]);

  /**
   * Login Page Title
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Vikinger', 'Login Page - Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_loginregister_control_login_title', [
    'label'       => esc_html_x('Login Page - Title', '(Customizer) Login Page Title - Title', 'vikinger'),
    'description' => esc_html_x('The title of the login page.', '(Customizer) Login Page Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_loginregister',
    'settings'    => 'vikinger_loginregister_setting_login_title'
  ]);

  /**
   * Login Page Text
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_text', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text',
    'default'           => sprintf(esc_html__('%sThe next generation WordPress+Buddypress social community!%s Connect with your friends with full profiles, reactions, groups, badges, quests, ranks, credits and %smuch more to come!%s', 'vikinger'), '<span class="bold">', '</span>', '<span class="bold">', '</span>')
  ]);

  $wp_customize->add_control('vikinger_loginregister_control_login_text', [
    'label'       => esc_html_x('Login Page - Text', '(Customizer) Login Page Title - Text', 'vikinger'),
    'description' => esc_html_x('The text of the login page.', '(Customizer) Login Page Text - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_loginregister',
    'settings'    => 'vikinger_loginregister_setting_login_text'
  ]);
}

add_action('customize_register', 'vikinger_customizer_loginregister');