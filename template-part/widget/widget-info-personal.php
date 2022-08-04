<?php
/**
 * Vikinger Template Part - Widget Info Personal
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type array $member     Member data.
 * }
 */

  $profile_personal_group_name = vikinger_settings_xprofile_group_profile_personal_name_get();

  /**
   * Widget Info
   */
  get_template_part('template-part/widget/widget-info', null, [
    'widget_title'      => esc_html__('Personal Info', 'vikinger'),
    'information_items' => vikinger_members_xprofile_get_group_fields($args['member'], $profile_personal_group_name),
    'no_results_text'   => esc_html__('No personal information found', 'vikinger')
  ]);

?>