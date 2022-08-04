<?php
/**
 * Vikinger Template Part - Author Preview
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type array   $user        User data.
 *   @type string  $modifiers   Optional. Additional class names to add to the HTML wrapper.
 *   @type bool    $linked      Optional. Adds a link to the user profile if set.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;
  $linked     = isset($args['linked']) ? $args['linked'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';

  global $vikinger_settings;

  $display_verified_in_username = isset($args['display_verified_in_username']) ? $args['display_verified_in_username'] : false;
  $display_verified_in_fullname = isset($args['display_verified_in_fullname']) ? $args['display_verified_in_fullname'] : false;

?>

<!-- AUTHOR PREVIEW -->
<div class="author-preview <?php echo esc_attr($modifiers_classes); ?>">
<?php

  /**
   * Avatar Small
   */
  get_template_part('template-part/avatar/avatar', 'small', [
    'user'      => $args['user'],
    'modifiers' => 'author-preview-avatar',
    'linked'    => $linked,
    'no_border' => true
  ]);

?>

  <!-- AUTHOR PREVIEW INFO -->
  <div class="author-preview-info">
    <!-- AUTHOR PREVIEW TITLE -->
    <p class="author-preview-title">
    <?php
        
      echo esc_html($args['user']['name']);

      if ($display_verified_in_fullname) {
        echo $vikinger_settings['bp_verified_member_badge'];
      }

    ?>
    </p>
    <!-- /AUTHOR PREVIEW TITLE -->

    <!-- AUTHOR PREVIEW TEXT -->
    <p class="author-preview-text">
    <?php

      echo '&#64;' . esc_html($args['user']['mention_name']);

      if ($display_verified_in_username) {
        echo $vikinger_settings['bp_verified_member_badge'];
      }

    ?>
    </p>
    <!-- /AUTHOR PREVIEW TEXT -->
  </div>
  <!-- /AUTHOR PREVIEW INFO -->
</div>
<!-- /AUTHOR PREVIEW -->