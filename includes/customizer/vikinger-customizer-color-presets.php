<?php
/**
 * Vikinger Customizer - Color Presets
 * 
 * @since 1.0.0
 */

function vikinger_customizer_color_presets($wp_customize) {
  /**
   * Color Presets section
   */
  $wp_customize->add_section('vikinger_color_presets', [
    'title'       => esc_html_x('Color Presets', '(Customizer) Color Presets Options - Title', 'vikinger'),
    'description' => sprintf(esc_html_x('From here, you can choose the default color preset of the site, enable the color theme switch, select which color preset to assign to your site light and dark color themes and select the default color theme the site uses.%sYou can customize individual preset colors from the Customizer -> Vikinger Settings -> Colors - Preset menu.', '(Customizer) Color Presets Options - Description', 'vikinger'), '<br><br>', '<br><br>'),
    'priority'    => 99,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Color Preset
   */
  $wp_customize->add_setting('vikinger_color_presets_setting_name', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'custom'
  ]);

  $wp_customize->add_control('vikinger_color_presets_control_name', [
    'label'       => esc_html_x('Color Preset', '(Customizer) Color Preset - Title', 'vikinger'),
    'description' => esc_html_x('You can choose which color preset you want to use by default (when the Color Theme Switch is disabled).', '(Customizer) Color Preset - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'custom'        => esc_html__('Custom', 'vikinger'),
      'light'         => esc_html__('Light', 'vikinger'),
      'dark'          => esc_html__('Dark', 'vikinger'),
      'darkblue'      => esc_html__('Dark Blue', 'vikinger'),
      'darkpurple'    => esc_html__('Dark Purple', 'vikinger'),
      'darkcyan'      => esc_html__('Dark Cyan', 'vikinger'),
      'carbonyellow'  => esc_html__('Carbon Yellow', 'vikinger')
    ],
    'section'     => 'vikinger_color_presets',
    'settings'    => 'vikinger_color_presets_setting_name',
  ]);

  /**
   * Color Theme Switch - Status
   */
  $wp_customize->add_setting('vikinger_color_presets_setting_theme_switch_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'disabled'
  ]);

  $wp_customize->add_control('vikinger_color_presets_control_theme_switch_status', [
    'label'       => esc_html_x('Color Theme Switch - Status', '(Customizer) Color Theme Switch Status - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to enable or disable the color theme switch. When enabled, your site users can toggle the color theme with the sun / moon button that is on the header on desktop and on the top left menu on mobile.', '(Customizer) Color Theme Switch Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_color_presets',
    'settings'    => 'vikinger_color_presets_setting_theme_switch_status',
  ]);

  /**
   * Color Theme Switch - Light
   */
  $wp_customize->add_setting('vikinger_color_presets_setting_theme_switch_light', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'light'
  ]);

  $wp_customize->add_control('vikinger_color_presets_control_theme_switch_light', [
    'label'       => esc_html_x('Color Theme Switch - Light', '(Customizer) Color Theme Switch Light - Title', 'vikinger'),
    'description' => esc_html_x('You can choose which color preset you want to use for your site light theme.', '(Customizer) Color Theme Switch Light - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'custom'        => esc_html__('Custom', 'vikinger'),
      'light'         => esc_html__('Light', 'vikinger'),
      'dark'          => esc_html__('Dark', 'vikinger'),
      'darkblue'      => esc_html__('Dark Blue', 'vikinger'),
      'darkpurple'    => esc_html__('Dark Purple', 'vikinger'),
      'darkcyan'      => esc_html__('Dark Cyan', 'vikinger'),
      'carbonyellow'  => esc_html__('Carbon Yellow', 'vikinger')
    ],
    'section'     => 'vikinger_color_presets',
    'settings'    => 'vikinger_color_presets_setting_theme_switch_light'
  ]);

  /**
   * Color Theme Switch - Dark
   */
  $wp_customize->add_setting('vikinger_color_presets_setting_theme_switch_dark', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'dark'
  ]);

  $wp_customize->add_control('vikinger_color_presets_control_theme_switch_dark', [
    'label'       => esc_html_x('Color Theme Switch - Dark', '(Customizer) Color Theme Switch Dark - Title', 'vikinger'),
    'description' => esc_html_x('You can choose which color preset you want to use for your site dark theme.', '(Customizer) Color Theme Switch Dark - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'custom'        => esc_html__('Custom', 'vikinger'),
      'light'         => esc_html__('Light', 'vikinger'),
      'dark'          => esc_html__('Dark', 'vikinger'),
      'darkblue'      => esc_html__('Dark Blue', 'vikinger'),
      'darkpurple'    => esc_html__('Dark Purple', 'vikinger'),
      'darkcyan'      => esc_html__('Dark Cyan', 'vikinger'),
      'carbonyellow'  => esc_html__('Carbon Yellow', 'vikinger')
    ],
    'section'     => 'vikinger_color_presets',
    'settings'    => 'vikinger_color_presets_setting_theme_switch_dark'
  ]);

  /**
   * Color Theme Switch - Default
   */
  $wp_customize->add_setting('vikinger_color_presets_setting_theme_switch_default', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'light'
  ]);

  $wp_customize->add_control('vikinger_color_presets_control_theme_switch_default', [
    'label'       => esc_html_x('Color Theme Switch - Default', '(Customizer) Color Theme Switch Default - Title', 'vikinger'),
    'description' => esc_html_x('You can choose the default active color theme for all the users of your site.', '(Customizer) Color Theme Switch Default - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'light' => esc_html__('Light', 'vikinger'),
      'dark'  => esc_html__('Dark', 'vikinger')
    ],
    'section'     => 'vikinger_color_presets',
    'settings'    => 'vikinger_color_presets_setting_theme_switch_default',
  ]);
}

add_action('customize_register', 'vikinger_customizer_color_presets');