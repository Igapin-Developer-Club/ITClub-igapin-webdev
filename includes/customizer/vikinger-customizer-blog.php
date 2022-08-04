<?php
/**
 * Vikinger Customizer - Blog
 * 
 * @since 1.0.0
 */

function vikinger_customizer_blog($wp_customize) {
  /**
   * Blog section
   */
  $wp_customize->add_section('vikinger_blog', [
    'title'       => esc_html_x('Blog', '(Customizer) Blog - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can change the blog post type used for regular open posts.', '(Customizer) Blog - Description', 'vikinger'),
    'priority'    => 280,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Blog Type
   */
  $wp_customize->add_setting('vikinger_blog_setting_type', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'v1'
  ]);

  $wp_customize->add_control('vikinger_blog_control_type', [
    'label'       => esc_html_x('Version 1 / Version 2', '(Customizer) Blog Option - Version 1 / Version 2 - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to use version 1 or version 2 of the blog open post.', '(Customizer) Blog Option - Version 1 / Version 2 - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'v1'  => esc_html__('Version 1', 'vikinger'),
      'v2'  => esc_html__('Version 2', 'vikinger')
    ],
    'section'     => 'vikinger_blog',
    'settings'    => 'vikinger_blog_setting_type',
  ]);

  /**
   * Post Type to Display in Blog
   */
  $wp_customize->add_setting('vikinger_blog_setting_post_types_to_display_in_blog', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text_comma_separated',
    'default'           => vikinger_blog_post_types_default_get()
  ]);

  $wp_customize->add_control('vikinger_blog_control_post_types_to_display_in_blog', [
    'label'       => esc_html_x('Post Types - Display in Blog', '(Customizer) Post Types Option - Display in Blog - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('You can enter the post types allowed for display in the site blog. Enter each post type you want to display separated by a comma (,)%s%sFor example, to display WooCommerce products along with regular posts, enter "post,product" or "product" to only display products.%s', '(Customizer) Post Types Option - Display in Blog - Description', 'vikinger'),
      '<br><br>',
      '<strong>',
      '</strong>'
    ),
    'type'        => 'text',
    'section'     => 'vikinger_blog',
    'settings'    => 'vikinger_blog_setting_post_types_to_display_in_blog',
  ]);

  /**
   * Post Type to Display in Search
   */
  $wp_customize->add_setting('vikinger_blog_setting_post_types_to_display_in_search', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text_comma_separated',
    'default'           => vikinger_blog_post_types_default_get()
  ]);

  $wp_customize->add_control('vikinger_blog_control_post_types_to_display_in_search', [
    'label'       => esc_html_x('Post Types - Display in Search', '(Customizer) Post Types Option - Display in Search - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('You can enter the post types allowed for display in the site search. Enter each post type you want to display separated by a comma (,)%s%sFor example, to display WooCommerce products along with regular posts, enter "post,product" or "product" to only display products.%s', '(Customizer) Post Types Option - Display in Search - Description', 'vikinger'),
      '<br><br>',
      '<strong>',
      '</strong>'
    ),
    'type'        => 'text',
    'section'     => 'vikinger_blog',
    'settings'    => 'vikinger_blog_setting_post_types_to_display_in_search',
  ]);

  /**
   * Blog Post Type Split Display
   */
  $wp_customize->add_setting('vikinger_blog_setting_post_type_split_display', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'disabled'
  ]);

  $wp_customize->add_control('vikinger_blog_control_post_type_split_display', [
    'label'       => esc_html_x('Post Types - Split Display', '(Customizer) Post Type Option - Split Display - Title', 'vikinger'),
    'description' => esc_html_x('If enabled, one post list will be displayed for each post type.', '(Customizer) Post Type Filter Option - Display - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_blog',
    'settings'    => 'vikinger_blog_setting_post_type_split_display',
  ]);

  /**
   * Blog Post Type Filter Display
   */
  $wp_customize->add_setting('vikinger_blog_setting_post_type_filter_display', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'disabled'
  ]);

  $wp_customize->add_control('vikinger_blog_control_post_type_filter_display', [
    'label'       => esc_html_x('Post Types - Filter Display', '(Customizer) Post Type Option - Filter Display - Title', 'vikinger'),
    'description' => esc_html_x('If enabled, users will be able to filter posts lists by post type when "Post Type - Split Display" is disabled.', '(Customizer) Post Type Option - Filter Display - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_blog',
    'settings'    => 'vikinger_blog_setting_post_type_filter_display',
  ]);
}

add_action('customize_register', 'vikinger_customizer_blog');