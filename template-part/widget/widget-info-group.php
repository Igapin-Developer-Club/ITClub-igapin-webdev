<?php
/**
 * Vikinger Template Part - Widget Info Group
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_groups_get
 * 
 * @param array $args {
 *   @type array $group     Group data.
 * }
 */

  $group_statuses = [
    'public'  => esc_html__('Public', 'vikinger'),
    'private' => esc_html__('Private', 'vikinger'),
    'hidden'  => esc_html__('Hidden', 'vikinger')
  ];

  $group_status_string = array_key_exists($args['group']['status'], $group_statuses) ? $group_statuses[$args['group']['status']] : '';

  // Add user register date
  $information_items = [
    [
      'title' => esc_html__('Created', 'vikinger'),
      'type'  => 'text',
      'value' => date_i18n(get_option('date_format'), strtotime($args['group']['date_created']))
    ],
    [
      'title' => esc_html__('Type', 'vikinger'),
      'type'  => 'text',
      'value' => $group_status_string
    ]
  ];

  /**
   * Widget Info
   */
  get_template_part('template-part/widget/widget-info', null, [
    'widget_title'      => esc_html__('Group Info', 'vikinger'),
    'widget_text'       => $group['description'],
    'information_items' => $information_items
  ]);

?>