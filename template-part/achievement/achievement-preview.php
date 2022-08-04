<?php
/**
 * Vikinger Template Part - Achievement Preview
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_gamipress_get_achievements
 * 
 * @param array $args {
 *   @type array  $achievement    Achievement data.
 * }
 */

?>

<!-- ACHIEVEMENT PREVIEW -->
<div class="achievement-preview">
  <!-- ACHIEVEMENT PREVIEW INFO -->
  <div class="achievement-preview-info">
  <?php if (($args['achievement']['achievement_type'] === 'quest') && !$args['achievement']['completed']) : ?>
    <img class="achievement-preview-image" src="<?php echo VIKINGER_URL; ?>/img/quest/quest-open.png" alt="quest-open">
  <?php else: ?>
    <img class="achievement-preview-image" src="<?php echo esc_url($args['achievement']['image_url']); ?>" alt="<?php echo esc_attr($args['achievement']['name']); ?>">
  <?php endif; ?>

    <!-- ACHIEVEMENT PREVIEW TITLE -->
    <p class="achievement-preview-title"><?php echo esc_html($args['achievement']['name']); ?></p>
    <!-- /ACHIEVEMENT PREVIEW TITLE -->

    <!-- ACHIEVEMENT PREVIEW TEXT -->
    <p class="achievement-preview-text"><?php echo esc_html($args['achievement']['description']); ?></p>
    <!-- /ACHIEVEMENT PREVIEW TEXT -->
  </div>
  <!-- /ACHIEVEMENT PREVIEW INFO -->

  <!-- PROGRESS STAT -->
  <div class="progress-stat">
  <?php

    if (!$args['achievement']['completed']) :
      $completed_steps = 0;

      foreach ($args['achievement']['steps'] as $step) {
        if ($step['completed']) {
          $completed_steps++;
        }
      }

  ?>
    <!-- PROGRESS STAT BAR -->
    <div  class="progress-stat-bar achievement-simple-progress"
          data-scalestop="<?php echo esc_attr($completed_steps); ?>"
          data-scaleend="<?php echo esc_attr(count($args['achievement']['steps'])); ?>"
    >
    </div>
    <!-- /PROGRESS STAT BAR -->
  <?php

    else :

  ?>
    <!-- PROGRESS STAT BAR -->
    <div class="progress-stat-bar achievement-simple-progress"></div>
    <!-- /PROGRESS STAT BAR -->
  <?php

    endif;

  ?>
  </div>
  <!-- /PROGRESS STAT -->
</div>
<!-- /ACHIEVEMENT PREVIEW -->