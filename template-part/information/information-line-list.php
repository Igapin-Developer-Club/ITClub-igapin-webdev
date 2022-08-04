<?php
/**
 * Vikinger Template Part - Information Line List
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_xprofile_get_group_fields
 * 
 * @param array $args {
 *   @type array  $information_items      Information items.
 * }
 */

?>

<!-- INFORMATION LINE LIST -->
<div class="information-line-list">
<?php

  foreach ($args['information_items'] as $information_item) {
    if ($information_item['value'] !== '') {
      /**
       * Information Line
       */
      get_template_part('template-part/information/information-line', null, [
        'information_item'  => $information_item
      ]);
    }
  }

?>
</div>
<!-- /INFORMATION LINE LIST -->