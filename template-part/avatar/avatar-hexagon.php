<?php
/**
 * Vikinger Template Part - Avatar Hexagon
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
  $no_stats   = !array_key_exists('rank', $args['user']);

  $modifiers_classes  = $modifiers ? $modifiers : '';
  $no_border_classes  = $no_border ? 'no-border' : '';
  $no_border_classes  = $no_border && !$no_stats ? 'no-border no-outline' : $no_border_classes;
  $no_stats_classes   = $no_stats ? 'no-stats' : '';

?>

<!-- USER AVATAR -->
<?php if ($linked) : ?>
<a class="user-avatar <?php echo esc_attr($no_stats_classes); ?> <?php echo esc_attr($modifiers_classes); ?> <?php echo esc_attr($no_border_classes); ?>" href="<?php echo esc_url($args['user']['link']) ?>">
<?php else : ?>
<div class="user-avatar <?php echo esc_attr($no_stats_classes); ?> <?php echo esc_attr($modifiers_classes); ?> <?php echo esc_attr($no_border_classes); ?>">
<?php endif; ?>
<?php if (!$no_border) : ?>
  <!-- USER AVATAR BORDER -->
  <div class="user-avatar-border">
    <!-- HEXAGON -->
    <div class="hexagon-100-110"></div>
    <!-- /HEXAGON -->
  </div>
  <!-- /USER AVATAR BORDER -->
<?php endif; ?>

<?php if ($no_stats) : ?>
  <!-- USER AVATAR CONTENT -->
  <div class="user-avatar-content">
    <!-- HEXAGON -->
    <div class="hexagon-image-82-90" data-src="<?php echo esc_url($args['user']['avatar_url']); ?>"></div>
    <!-- /HEXAGON -->
  </div>
  <!-- /USER AVATAR CONTENT -->
<?php else : ?>
  <!-- USER AVATAR CONTENT -->
  <div class="user-avatar-content">
    <!-- HEXAGON -->
    <div class="hexagon-image-68-74" data-src="<?php echo esc_url($args['user']['avatar_url']); ?>"></div>
    <!-- /HEXAGON -->
  </div>
  <!-- /USER AVATAR CONTENT -->

  <!-- USER AVATAR PROGRESS -->
  <div class="user-avatar-progress">
    <!-- HEXAGON -->
    <div  class="hexagon-progress-84-92"
          data-scalestop="<?php echo esc_attr($args['user']['rank']['current']); ?>"
          data-scaleend="<?php echo esc_attr($args['user']['rank']['total']); ?>"
    >
    </div>
    <!-- /HEXAGON -->
  </div>
  <!-- /USER AVATAR PROGRESS -->

  <!-- USER AVATAR PROGRESS BORDER -->
  <div class="user-avatar-progress-border">
    <!-- HEXAGON -->
    <div class="hexagon-border-84-92"></div>
    <!-- /HEXAGON -->
  </div>
  <!-- /USER AVATAR PROGRESS BORDER -->

  <!-- USER AVATAR BADGE -->
  <div class="user-avatar-badge">
    <!-- USER AVATAR BADGE BORDER -->
    <div class="user-avatar-badge-border">
      <!-- HEXAGON -->
      <div class="hexagon-28-32"></div>
      <!-- /HEXAGON -->
    </div>
    <!-- /USER AVATAR BADGE BORDER -->

    <!-- USER AVATAR BADGE CONTENT -->
    <div class="user-avatar-badge-content">
      <!-- HEXAGON -->
      <div class="hexagon-dark-22-24"></div>
      <!-- /HEXAGON -->
    </div>
    <!-- /USER AVATAR BADGE CONTENT -->

    <!-- USER AVATAR BADGE TEXT -->
    <p class="user-avatar-badge-text"><?php echo esc_html($args['user']['rank']['current']); ?></p>
    <!-- /USER AVATAR BADGE TEXT -->
  </div>
  <!-- /USER AVATAR BADGE -->
<?php endif; ?>

<?php if ($linked) : ?>
</a>
<?php else : ?>
</div>
<?php endif; ?>
<!-- /USER AVATAR -->