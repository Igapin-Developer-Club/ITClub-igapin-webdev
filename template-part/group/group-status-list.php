<?php
/**
 * Vikinger Template Part - Group Status List
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_groups_get
 * 
 * @param array $args {
 *   @type array $groups    Groups data.
 * }
 */

?>

<!-- USER STATUS LIST -->
<div class="user-status-list">
<?php

  foreach ($args['groups'] as $group) {
    /**
     * Group Status
     */
    get_template_part('template-part/group/group-status', null, [
      'group' => $group
    ]);
  }
  
?>
</div>
<!-- /USER STATUS LIST -->