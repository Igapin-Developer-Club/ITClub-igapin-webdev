<?php
/**
 * Vikinger Template Part - Information Block List
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

<!-- INFORMATION BLOCK LIST -->
<div class="information-block-list">
<?php

  foreach ($args['information_items'] as $information_item) {
    if ($information_item['value'] !== '') {
      /**
       * Information Block
       */
      get_template_part('template-part/information/information-block', null, [
        'information_item'  => $information_item
      ]);
    }
  }

?>
</div>
<!-- /INFORMATION BLOCK LIST -->