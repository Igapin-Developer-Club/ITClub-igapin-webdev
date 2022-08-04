<?php
/**
 * Vikinger Template Part - Social Link
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get_xprofile_social_links
 * 
 * @param array $args {
 *   @type string  $name          Social link name.
 *   @type string  $link          Social link url.
 *   @type string  $modifiers     Optional. Additional class names to add to the HTML wrapper.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;

  $modifiers_classes = $modifiers ? $modifiers : '';

?>

<!-- SOCIAL LINK -->
<a class="social-link <?php echo esc_attr($args['name']); ?> <?php echo esc_attr($modifiers_classes); ?>" href="<?php echo esc_url($args['link']); ?>" target="_blank">
<?php

  /**
   * Icon SVG
   */
  get_template_part('template-part/icon/icon', 'svg', [
    'icon'      => $args['name'],
    'modifiers' => 'social-link-icon'
  ]);

?>
</a>
<!-- /SOCIAL LINK -->