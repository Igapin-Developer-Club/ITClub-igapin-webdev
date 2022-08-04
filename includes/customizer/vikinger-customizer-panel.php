<?php
/**
 * Vikinger Customizer - Panel
 * 
 * @since 1.0.0
 */

/**
 * Creates the vikinger customizer main panel
 */
function vikinger_customizer_panel($wp_customize) {
  $wp_customize->add_panel('vikinger_customizer', [
    'title'       => esc_html_x('Vikinger Settings', '(Customizer) Settings - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize your theme settings.', '(Customizer) Settings - Description', 'vikinger'),
    'priority'    => 300
  ]);
}

add_action('customize_register', 'vikinger_customizer_panel');