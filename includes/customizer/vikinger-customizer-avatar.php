<?php
/**
 * Vikinger Customizer - Avatar
 * 
 * @since 1.3.6
 */

function vikinger_customizer_avatar($wp_customize) {
  /**
   * Avatar section
   */
  $wp_customize->add_section('vikinger_avatar', [
    'title'       => esc_html_x('Avatar', '(Customizer) Avatar - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can change avatar settings.', '(Customizer) Avatar - Description', 'vikinger'),
    'priority'    => 275,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Avatar Type
   */
  $wp_customize->add_setting('vikinger_avatar_setting_type', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'hexagon'
  ]);

  $wp_customize->add_control('vikinger_avatar_control_type', [
    'label'       => esc_html_x('Avatar Type', '(Customizer) Avatar Option - Type - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to use hexagon, circle or square avatars for members and groups.', '(Customizer) Avatar Option - Type - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'hexagon' => esc_html__('Hexagon', 'vikinger'),
      'circle'  => esc_html__('Circle', 'vikinger'),
      'square'  => esc_html__('Square', 'vikinger')
    ],
    'section'     => 'vikinger_avatar',
    'settings'    => 'vikinger_avatar_setting_type',
  ]);
}

add_action('customize_register', 'vikinger_customizer_avatar');