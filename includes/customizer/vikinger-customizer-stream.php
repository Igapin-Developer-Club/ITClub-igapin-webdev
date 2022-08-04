<?php
/**
 * Vikinger Customizer - Stream
 * 
 * @since 1.9.0
 */

function vikinger_customizer_stream($wp_customize) {
  /**
   * Stream section
   */
  $wp_customize->add_section('vikinger_stream', [
    'title'       => esc_html_x('Stream', '(Customizer) Stream - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can change stream related options.', '(Customizer) Stream - Description', 'vikinger'),
    'priority'    => 285,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Stream Profile Status
   */
  $wp_customize->add_setting('vikinger_stream_setting_profile_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_stream_control_profile_status', [
    'label'       => esc_html_x('Stream Profile - Status', '(Customizer) Stream Profile Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to enable or disable stream profile functionality (disabling this will remove the profile activity widget, profile activity page and account hub settings page).', '(Customizer) Stream Profile Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_stream',
    'settings'    => 'vikinger_stream_setting_profile_status',
  ]);

  /**
   * Twitch Embeds Parent Domain
   */
  $wp_customize->add_setting('vikinger_stream_setting_twitch_embed_parent', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text_comma_separated',
    'default'           => ''
  ]);

  $wp_customize->add_control('vikinger_stream_control_twitch_embed_parent', [
    'label'       => esc_html_x('Twitch Embeds - Parent Domain', '(Customizer) Twitch Embeds Option - Parent Domain - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('In order to be able to use the Twitch Embedded Player (display twitch videos on any part of the site), Twitch requires that your site has a valid SSL certificate (HTTPS site) and that you specify the parent domain/s where the videos will be embedded (i.e.: "mysite.com"). Please enter your site domain/s below, you can enter multiple by separating them with a comma (,).%sYou can check the requirements on this official Twitch post: %shttps://discuss.dev.twitch.tv/t/twitch-embedded-player-updates-in-2020/23956%s', '(Customizer) Twitch Embeds Option - Parent Domain - Description', 'vikinger'),
      '<br><br>',
      '<a href="https://discuss.dev.twitch.tv/t/twitch-embedded-player-updates-in-2020/23956" target="_blank">',
      '</a>'
    ),
    'type'        => 'text',
    'section'     => 'vikinger_stream',
    'settings'    => 'vikinger_stream_setting_twitch_embed_parent',
  ]);
}

add_action('customize_register', 'vikinger_customizer_stream');