<?php
/**
 * Vikinger Customizer - Blog Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader_blog($wp_customize) {
  /**
   * Blog Page Header section
   */
  $wp_customize->add_section('vikinger_pageheader_blog', [
    'title'       => esc_html_x('Page Headers - Blog', '(Customizer) Page Headers Blog Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the blog page header.', '(Customizer) Page Headers Blog Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Blog Header Image
   */
  $wp_customize->add_setting('vikinger_pageheader_blog_setting_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_pageheader_blog_control_image', [
    'label'       => esc_html_x('Blog Page Header - Image', '(Customizer) Blog Page Header Image - Title', 'vikinger'),
    'description' => esc_html_x('Image of the blog page header.', '(Customizer) Blog Page Header Image - Description', 'vikinger'),
    'section'     => 'vikinger_pageheader_blog',
    'settings'    => 'vikinger_pageheader_blog_setting_image',
    'mime_type'   => 'image'
  ]));

  /**
   * Blog Header Title
   */
  $wp_customize->add_setting('vikinger_pageheader_blog_setting_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Blog Posts', 'Blog Page - Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_blog_control_title', [
    'label'       => esc_html_x('Blog Page Header - Title', '(Customizer) Blog Page Header Title - Title', 'vikinger'),
    'description' => esc_html_x('Title of the blog page header.', '(Customizer) Blog Page Header Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_pageheader_blog',
    'settings'    => 'vikinger_pageheader_blog_setting_title'
  ]);

  /**
   * Blog Header Description
   */
  $wp_customize->add_setting('vikinger_pageheader_blog_setting_description', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Read about news, announcements and more!', 'Blog Page - Description', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_pageheader_blog_control_description', [
    'label'       => esc_html_x('Blog Page Header - Description', '(Customizer) Blog Page Header Description - Title', 'vikinger'),
    'description' => esc_html_x('Description of the blog page header.', '(Customizer) Blog Page Header Description - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_pageheader_blog',
    'settings'    => 'vikinger_pageheader_blog_setting_description'
  ]);
}

add_action('customize_register', 'vikinger_customizer_pageheader_blog');