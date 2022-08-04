<?php
/**
 * Vikinger Template Part - User Status List
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type array $users    Users data.
 * }
 */

?>

<!-- USER STATUS LIST -->
<div class="user-status-list">
<?php

  foreach ($args['users'] as $user) {
    /**
     * User Status
     */
    get_template_part('template-part/user/user-status', null, [
      'user' => $user
    ]);
  }
  
?>
</div>
<!-- /USER STATUS LIST -->