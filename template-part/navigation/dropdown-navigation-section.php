<?php
/**
 * Vikinger Template Part - Dropdown Navigation
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get_settings_navigation_sections
 * 
 * @param array $args {
 *   @type string $section_name     Section name.
 *   @type array  $section_links    Section links.
 * }
 */

?>

<!-- DROPDOWN NAVIGATION CATEGORY -->
<p class="dropdown-navigation-category"><?php echo esc_html($args['section_name']); ?></p>
<!-- /DROPDOWN NAVIGATION CATEGORY -->

<?php foreach ($args['section_links'] as $section_link) : ?>
  <!-- DROPDOWN NAVIGATION LINK -->
  <a class="dropdown-navigation-link" href="<?php echo esc_url($section_link['link']); ?>"><?php echo esc_html($section_link['name']); ?></a>
  <!-- /DROPDOWN NAVIGATION LINK -->
<?php endforeach; ?>