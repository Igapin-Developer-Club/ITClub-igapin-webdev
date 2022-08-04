<?php
/**
 * Vikinger Template Part - Avatar Small
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

  get_template_part('template-part/avatar/avatar-small', $vikinger_settings['avatar_type'], $args);

?>