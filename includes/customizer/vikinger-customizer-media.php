<?php
/**
 * Vikinger Customizer - Media
 * 
 * @since 1.4.0
 */

function vikinger_customizer_media($wp_customize) {
  /**
   * Media section
   */
  $wp_customize->add_section('vikinger_media', [
    'title'       => esc_html_x('Media', '(Customizer) Media - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can change media related settings.', '(Customizer) Media - Description', 'vikinger'),
    'priority'    => 277,
    'panel'       => 'vikinger_customizer'
  ]);

  $upload_max_size = vikinger_upload_max_size_get();

  /**
   * Media Photo Upload Status
   */
  $wp_customize->add_setting('vikinger_media_setting_photo_upload_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_media_control_photo_upload_status', [
    'label'       => esc_html_x('Photo Upload - Status', '(Customizer) Photo Upload Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('Disabling this option removes photo upload related functionality and pages.', '(Customizer) Photo Upload Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_media',
    'settings'    => 'vikinger_media_setting_photo_upload_status'
  ]);

  /**
   * Media Photo Upload Maximum Size
   */
  $wp_customize->add_setting('vikinger_media_setting_photo_upload_maximum_size', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_upload_maximum_size',
    'default'           => $upload_max_size
  ]);

  $wp_customize->add_control('vikinger_media_control_photo_upload_maximum_size', [
    'label'       => esc_html_x('Photo Upload - Maximum Size in MB', '(Customizer) Media Option - Photo Upload Maximum Size - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('You can choose the maximum size (in Megabytes) allowed for photos uploaded by users on BuddyPress activities (this value can\'t be higher than your server maximum upload file size).%s%sYour server maximum upload file size is ' . $upload_max_size . 'MB.%s%s', '(Customizer) Media Option - Photo Upload Maximum Size - Description', 'vikinger'),
      '<br><br>',
      '<strong>',
      '</strong>',
      '<br><br>'
    ),
    'type'        => 'number',
    'input_attrs' => [
      'min'   => 0,
      'max'   => $upload_max_size,
      'step'  => 1
    ],
    'section'     => 'vikinger_media',
    'settings'    => 'vikinger_media_setting_photo_upload_maximum_size',
  ]);

  /**
   * Media Photo Allowed Extensions
   */
  $wp_customize->add_setting('vikinger_media_setting_photo_allowed_extensions', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text_comma_separated',
    'default'           => vikinger_file_default_allowed_extensions_get('image')
  ]);

  $wp_customize->add_control('vikinger_media_control_photo_allowed_extensions', [
    'label'       => esc_html_x('Photo Upload - Allowed Extensions', '(Customizer) Media Option - Photo Upload Allowed Extensions - Title', 'vikinger'),
    'description' => esc_html_x('You can enter the file extensions allowed for photos uploaded by users on BuddyPress activities. Enter each extension you want to allow separated by a comma (,)', '(Customizer) Media Option - Photo Upload Allowed Extensions - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_media',
    'settings'    => 'vikinger_media_setting_photo_allowed_extensions',
  ]);

  /**
   * Media Photo Allowed Extensions Case Sensitive
   */
  $wp_customize->add_setting('vikinger_media_setting_photo_allowed_extensions_case_sensitive', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_media_control_photo_allowed_extensions_case_sensitive', [
    'label'       => esc_html_x('Photo Upload - Allowed Extensions - Case Sensitive', '(Customizer) Photo Upload Option - Allowed Extensions - Case Sensitive - Title', 'vikinger'),
    'description' => esc_html_x('Disable this option to allow any capitalization combination of the file extensions entered in the "Photo Upload - Allowed Extensions" option to be used. For example, if the allowed extension is "jpg" and this option is disabled, then the following extensions will be allowed: "jpg", "JPG", "Jpg", etc.', '(Customizer) Photo Upload Option - Allowed Extensions - Case Sensitive - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_media',
    'settings'    => 'vikinger_media_setting_photo_allowed_extensions_case_sensitive'
  ]);

  /**
   * Media Video Upload Status
   */
  $wp_customize->add_setting('vikinger_media_setting_video_upload_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_media_control_video_upload_status', [
    'label'       => esc_html_x('Video Upload - Status', '(Customizer) Video Upload Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('Disabling this option removes video upload related functionality and pages.', '(Customizer) Video Upload Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_media',
    'settings'    => 'vikinger_media_setting_video_upload_status'
  ]);

  /**
   * Media Video Upload Maximum Size
   */
  $wp_customize->add_setting('vikinger_media_setting_video_upload_maximum_size', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_upload_maximum_size',
    'default'           => $upload_max_size
  ]);

  $wp_customize->add_control('vikinger_media_control_video_upload_maximum_size', [
    'label'       => esc_html_x('Video Upload - Maximum Size in MB', '(Customizer) Media Option - Video Upload Maximum Size - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('You can choose the maximum size (in Megabytes) allowed for videos uploaded by users on BuddyPress activities (this value can\'t be higher than your server maximum upload file size).%s%sYour server maximum upload file size is ' . $upload_max_size . 'MB.%s%s', '(Customizer) Media Option - Video Upload Maximum Size - Description', 'vikinger'),
      '<br><br>',
      '<strong>',
      '</strong>',
      '<br><br>'
    ),
    'type'        => 'number',
    'input_attrs' => [
      'min'   => 0,
      'max'   => $upload_max_size,
      'step'  => 1
    ],
    'section'     => 'vikinger_media',
    'settings'    => 'vikinger_media_setting_video_upload_maximum_size',
  ]);

  /**
   * Media Video Allowed Extensions
   */
  $wp_customize->add_setting('vikinger_media_setting_video_allowed_extensions', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text_comma_separated',
    'default'           => vikinger_file_default_allowed_extensions_get('video')
  ]);

  $wp_customize->add_control('vikinger_media_control_video_allowed_extensions', [
    'label'       => esc_html_x('Video Upload - Allowed Extensions', '(Customizer) Media Option - Video Upload Allowed Extensions - Title', 'vikinger'),
    'description' => esc_html_x('You can enter the file extensions allowed for videos uploaded by users on BuddyPress activities. Enter each extension you want to allow separated by a comma (,)', '(Customizer) Media Option - Video Upload Allowed Extensions - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_media',
    'settings'    => 'vikinger_media_setting_video_allowed_extensions',
  ]);

  /**
   * Media Video Allowed Extensions Case Sensitive
   */
  $wp_customize->add_setting('vikinger_media_setting_video_allowed_extensions_case_sensitive', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_media_control_video_allowed_extensions_case_sensitive', [
    'label'       => esc_html_x('Video Upload - Allowed Extensions - Case Sensitive', '(Customizer) Video Upload Option - Allowed Extensions - Case Sensitive - Title', 'vikinger'),
    'description' => esc_html_x('Disable this option to allow any capitalization combination of the file extensions entered in the "Video Upload - Allowed Extensions" option to be used. For example, if the allowed extension is "mp4" and this option is disabled, then the following extensions will be allowed: "mp4", "MP4", "Mp4", etc.', '(Customizer) Video Upload Option - Allowed Extensions - Case Sensitive - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_media',
    'settings'    => 'vikinger_media_setting_video_allowed_extensions_case_sensitive'
  ]);
}

add_action('customize_register', 'vikinger_customizer_media');