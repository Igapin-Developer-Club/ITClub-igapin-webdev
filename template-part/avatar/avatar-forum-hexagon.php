<?php
/**
 * Vikinger Template Part - Avatar Forum
 * 
 * @package Vikinger
 * @since 1.3.5
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

<!-- USER AVATAR -->
<?php if ($linked) : ?>
<a class="user-avatar user-avatar-forum no-stats <?php echo esc_attr($modifiers_classes); ?> <?php echo esc_attr($no_border_classes); ?>" href="<?php echo esc_url($args['user']['link']) ?>">
<?php else : ?>
<div class="user-avatar no-stats <?php echo esc_attr($modifiers_classes); ?> <?php echo esc_attr($no_border_classes); ?>">
<?php endif; ?>
<?php if (!$no_border) : ?>
  <!-- USER AVATAR BORDER -->
  <div class="user-avatar-border">
    <!-- HEXAGON -->
    <div class="hexagon-76-84"></div>
    <!-- /HEXAGON -->
  </div>
  <!-- /USER AVATAR BORDER -->
<?php endif; ?>

  <!-- USER AVATAR CONTENT -->
  <div class="user-avatar-content">
    <!-- HEXAGON -->
    <div class="hexagon-image-58-64" data-src="<?php echo esc_url($args['user']['avatar_url']); ?>"></div>
    <!-- /HEXAGON -->
  </div>
  <!-- /USER AVATAR CONTENT -->
<?php if ($linked) : ?>
</a>
<?php else : ?>
</div>
<?php endif; ?>
<!-- /USER AVATAR -->