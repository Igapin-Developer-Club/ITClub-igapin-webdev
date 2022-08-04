<?php
/**
 * Vikinger Template Part - Member Filterable List
 * 
 * @package Vikinger
 * @since 1.8.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type array  $attributes           List additional attributes.
 * }
 */

  $attributes = isset($args['attributes']) ? $args['attributes'] : [];

  $members_grid_type = vikinger_logged_user_grid_type_get('member');

  $member_list_attributes = [
    'grid-type' => $members_grid_type
  ];

  $member_list_attributes = array_merge($member_list_attributes, $attributes);

  $member_list_attributes_string = '';

  foreach ($member_list_attributes as $member_list_attribute => $member_list_attribute_value) {
    $member_list_attributes_string .= ' data-' . $member_list_attribute . '="' . esc_attr($member_list_attribute_value) . '"';
  }

?>

<!-- MEMBER FILTERABLE LIST -->
<div id="member-filterable-list" class="filterable-list" <?php echo $member_list_attributes_string; ?>></div>
<!-- /MEMBER FILTERABLE LIST -->
