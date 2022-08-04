<?php
/**
 * Vikinger Template Part - Social Links
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get_xprofile_social_links
 * 
 * @param array $args {
 *   @type array   $social_links    Social links data.
 *   @type string  $modifiers       Optional. Additional class names to add to the HTML wrapper.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;

  $modifiers_classes = $modifiers ? $modifiers : '';

?>

<!-- SOCIAL LINKS -->
<div class="social-links <?php echo esc_attr($modifiers_classes); ?>">
<?php
  foreach ($args['social_links'] as $social_link) {
    /**
     * Social Link
     */
    get_template_part('template-part/social/social-link', null, [
      'name'      => $social_link['name'],
      'link'      => $social_link['link'],
      'modifiers' => $modifiers
    ]);
  }
?>
</div>
<!-- /SOCIAL LINKS -->