<?php
/**
 * Vikinger Template Part - Information Block
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_xprofile_get_group_fields
 * 
 * @param array $args {
 *   @type array  $information_item      Information item.
 * }
 */

?>

<!-- INFORMATION BLOCK -->
<div class="information-block">
  <!-- INFORMATION BLOCK TITLE -->
  <p class="information-block-title"><?php echo esc_html($args['information_item']['title']); ?></p>
  <!-- /INFORMATION BLOCK TITLE -->
  
  <!-- INFORMATION BLOCK TEXT -->
  <p class="information-block-text"><?php echo esc_html($args['information_item']['value']); ?></p>
  <!-- /INFORMATION BLOCK TEXT -->
</div>
<!-- /INFORMATION BLOCK -->