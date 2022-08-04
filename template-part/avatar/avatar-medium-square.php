<?php
/**
 * Vikinger Template Part - Avatar Medium Square
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
  $no_stats_classes   = $no_stats ? 'no-stats' : '';

  $current_rank = 1;
  $max_rank = 1;

  if (!$no_stats) {
    $current_rank = (int) $args['user']['rank']['current'];
    $max_rank = (int) $args['user']['rank']['total'];

    $current_rank_ratio = $current_rank / $max_rank;
  }

?>

<!-- USER AVATAR CIRCLE -->
<?php if ($linked) : ?>
<a class="user-avatar-circle user-avatar-circle-flat medium <?php echo esc_attr($no_stats_classes); ?> <?php echo esc_attr($modifiers_classes); ?> <?php echo esc_attr($no_border_classes); ?>" href="<?php echo esc_url($args['user']['link']) ?>">
<?php else : ?>
<div class="user-avatar-circle user-avatar-circle-flat medium <?php echo esc_attr($no_stats_classes); ?> <?php echo esc_attr($modifiers_classes); ?> <?php echo esc_attr($no_border_classes); ?>">
<?php endif; ?>
  <!-- USER AVATAR CIRCLE IMAGE -->
  <img class="user-avatar-circle-image" src="<?php echo esc_url($args['user']['avatar_url']); ?>" alt="avatar-image">
  <!-- /USER AVATAR CIRCLE IMAGE -->

<?php if (!$no_stats) : ?>
  <!-- USER AVATAR CIRCLE PROGRESS -->
  <div class="user-avatar-circle-progress user-avatar-circle-progress-flat-medium" data-scalestop="<?php echo esc_attr($current_rank_ratio); ?>"></div>
  <!-- /USER AVATAR CIRCLE PROGRESS -->

  <!-- USER AVATAR CIRCLE BADGE -->
  <div class="user-avatar-circle-badge">
    <!-- USER AVATAR CIRCLE BADGE CONTENT -->
    <div class="user-avatar-circle-badge-content">
      <!-- USER AVATAR CIRCLE BADGE CONTENT TEXT -->
      <p class="user-avatar-circle-badge-content-text"><?php echo esc_html($args['user']['rank']['current']); ?></p>
      <!-- /USER AVATAR CIRCLE BADGE CONTENT TEXT -->
    </div>
    <!-- /USER AVATAR CIRCLE BADGE CONTENT -->
  </div>
  <!-- /USER AVATAR CIRCLE BADGE -->
<?php endif; ?>

<?php if ($linked) : ?>
</a>
<?php else : ?>
</div>
<?php endif; ?>
<!-- /USER AVATAR CIRCLE -->