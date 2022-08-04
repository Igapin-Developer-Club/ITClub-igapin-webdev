<?php
/**
 * Vikinger Customizer - xProfile
 * 
 * @since 1.0.0
 */

function vikinger_customizer_xprofile($wp_customize) {
  /**
   * xProfile section
   */
  $wp_customize->add_section('vikinger_xprofile', [
    'title'       => esc_html_x('xProfile Groups / Fields', '(Customizer) xProfile Groups / Fields - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can assign new names to xprofile groups and fields if you need to change them for translation purposes. The theme needs to know the new names to be able to display the profile field / group information correctly.', '(Customizer) xProfile Groups / Fields - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * xProfile Profile_Bio group
   */
  $wp_customize->add_setting('vikinger_xprofile_setting_group_name_profile_bio', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'Bio'
  ]);

  $wp_customize->add_control('vikinger_xprofile_control_group_name_profile_bio', [
    'label'       => esc_html_x('Profile_Bio - New Name', '(Customizer) Profile_Bio New Name - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('If you changed the group name after the underscore %s(Bio)%s, please enter that same name here to allow the theme to load the profile bio data in the member profile about me widget.', '(Customizer) Profile_Bio New Name - Description', 'vikinger'),
      '<strong>',
      '</strong>'
    ),
    'type'      => 'text',
    'section'   => 'vikinger_xprofile',
    'settings'  => 'vikinger_xprofile_setting_group_name_profile_bio'
  ]);

  /**
   * xProfile Profile_Bio_About field
   */
  $wp_customize->add_setting('vikinger_xprofile_setting_field_name_profile_bio_about', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'About'
  ]);

  $wp_customize->add_control('vikinger_xprofile_control_field_name_profile_bio_about', [
    'label'       => esc_html_x('Profile_Bio_About - New Name', '(Customizer) Profile_Bio_About New Name - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('If you changed the name for the Profile_Bio %sAbout%s field, please enter that same name here to allow the theme to load the profile bio about data in the member profile about me widget.', '(Customizer) Profile_Bio_About New Name - Description', 'vikinger'),
      '<strong>',
      '</strong>'
    ),
    'type'      => 'text',
    'section'   => 'vikinger_xprofile',
    'settings'  => 'vikinger_xprofile_setting_field_name_profile_bio_about'
  ]);

  /**
   * xProfile Profile_Personal group
   */
  $wp_customize->add_setting('vikinger_xprofile_setting_group_name_profile_personal', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'Personal'
  ]);

  $wp_customize->add_control('vikinger_xprofile_control_group_name_profile_personal', [
    'label'       => esc_html_x('Profile_Personal - New Name', '(Customizer) Profile_Personal New Name - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('If you changed the group name after the underscore %s(Personal)%s, please enter that same name here to allow the theme to load the profile personal data in the member profile personal info widget.', '(Customizer) Profile_Personal New Name - Description', 'vikinger'),
      '<strong>',
      '</strong>'
    ),
    'type'      => 'text',
    'section'   => 'vikinger_xprofile',
    'settings'  => 'vikinger_xprofile_setting_group_name_profile_personal'
  ]);

  /**
   * xProfile Profile_Interests group
   */
  $wp_customize->add_setting('vikinger_xprofile_setting_group_name_profile_interests', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'Interests'
  ]);

  $wp_customize->add_control('vikinger_xprofile_control_group_name_profile_interests', [
    'label'       => esc_html_x('Profile_Interests - New Name', '(Customizer) Profile_Interests New Name - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('If you changed the group name after the underscore %s(Interests)%s, please enter that same name here to allow the theme to load the profile interests data in the member profile interests widget.', '(Customizer) Profile_Interests New Name - Description', 'vikinger'),
      '<strong>',
      '</strong>'
    ),
    'type'      => 'text',
    'section'   => 'vikinger_xprofile',
    'settings'  => 'vikinger_xprofile_setting_group_name_profile_interests'
  ]);

  /**
   * xProfile Social_Links group
   */
  $wp_customize->add_setting('vikinger_xprofile_setting_group_name_social_links', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'Links'
  ]);

  $wp_customize->add_control('vikinger_xprofile_control_group_name_social_links', [
    'label'       => esc_html_x('Social_Links - New Name', '(Customizer) Social_Links New Name - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('If you changed the group name after the underscore %s(Links)%s, please enter that same name here to allow the theme to load the social links data in the member profile headers.', '(Customizer) Social_Links New Name - Description', 'vikinger'),
      '<strong>',
      '</strong>'
    ),
    'type'      => 'text',
    'section'   => 'vikinger_xprofile',
    'settings'  => 'vikinger_xprofile_setting_group_name_social_links'
  ]);
}

add_action('customize_register', 'vikinger_customizer_xprofile');