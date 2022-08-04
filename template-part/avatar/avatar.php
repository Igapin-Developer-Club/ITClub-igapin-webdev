<?php
/**
 * Vikinger Template Part - Avatar
 * 
 * @package Vikinger
 * @since 1.3.6
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get, vikinger_groups_get
 * 
 * @param array $args {
 *   @type array   $user        User data.
 *   @type string  $modifiers   Optional. Additional class names to add to the HTML wrapper.
 *   @type bool    $no_border   Optional. Adds a border if set.
 *   @type bool    $linked      Optional. Adds a link to the user profile if set.
 * }
 */

  global $vikinger_settings;

  $avatar_type = !is_null($vikinger_settings) ? $vikinger_settings['avatar_type'] : get_theme_mod('vikinger_avatar_setting_type', 'hexagon');

  get_template_part('template-part/avatar/avatar', $avatar_type, $args);

?>