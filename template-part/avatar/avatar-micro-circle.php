<?php
/**
 * Vikinger Template Part - Avatar Micro Circle
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

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;
  $no_border  = isset($args['no_border']) ? $args['no_border'] : false;
  $linked     = isset($args['linked']) ? $args['linked'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';
  $no_border_classes  = $no_border ? 'no-border' : '';

?>

<!-- USER AVATAR CIRCLE -->
<?php if ($linked) : ?>
<a class="user-avatar-circle micro <?php echo esc_attr($modifiers_classes); ?> <?php echo esc_attr($no_border_classes); ?>" href="<?php echo esc_url($args['user']['link']) ?>">
<?php else : ?>
<div class="user-avatar-circle micro <?php echo esc_attr($modifiers_classes); ?> <?php echo esc_attr($no_border_classes); ?>">
<?php endif; ?>
  <!-- USER AVATAR CIRCLE IMAGE -->
  <img class="user-avatar-circle-image" src="<?php echo esc_url($args['user']['avatar_url']); ?>" alt="avatar-image">
  <!-- /USER AVATAR CIRCLE IMAGE -->
<?php if ($linked) : ?>
</a>
<?php else : ?>
</div>
<?php endif; ?>
<!-- /USER AVATAR CIRCLE -->