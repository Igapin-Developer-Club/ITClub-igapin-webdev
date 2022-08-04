<?php
/**
 * Vikinger Template Part - Achievement Item Box
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see page-achievements.php
 * 
 * @param array $args {
 *   @type array  $achievement                  Achievement data.
 *   @type array  $user_points                  User points data.
 *   @type bool   $achievement_complete_info    Optional. Displays complete achievement info if set.
 *   @type bool   $achievement_image_wrap       Optional. Wraps achievement image in a circle if set.
 *   @type string $achievement_type             Optional. Achievement type, changes footer text for rank type.
 * }
 */

  $achievement_complete_info  = isset($args['achievement_complete_info']) ? $args['achievement_complete_info'] : false;
  $achievement_image_wrap     = isset($args['achievement_image_wrap']) ? $args['achievement_image_wrap'] : false;
  $achievement_type           = isset($args['achievement_type']) ? $args['achievement_type'] : 'achievement';
  $achievement_points_type    = isset($args['achievement']['points_type']) && $args['achievement']['points_type'] !== '' ? $args['achievement']['points_type'] : false;

?>

<!-- ACHIEVEMENT ITEM BOX -->
<div class="achievement-item-box">
  <?php if ($achievement_complete_info && array_key_exists('points', $args['achievement']) && (((int) $args['achievement']['points']) > 0)) : ?>
  <!-- TEXT STICKER -->
  <p class="text-sticker">
  <?php

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => 'plus-small',
      'modifiers' => 'text-sticker-icon'
    ]);

  ?>

  <?php echo esc_html($args['achievement']['points']); ?>

  <?php if ($achievement_points_type) : ?>
    <!-- TEXT STICKER IMAGE -->
    <img class="text-sticker-image" src="<?php echo esc_url($args['achievement']['points_type']['image_url']); ?>" alt="<?php echo esc_attr($args['achievement']['points_type']['slug']); ?>">
    <!-- /TEXT STICKER IMAGE -->
  <?php endif; ?>
  </p>
  <!-- /TEXT STICKER -->
  <?php endif; ?>

  <!-- ACHIEVEMENT ITEM BOX INFO -->
  <div class="achievement-item-box-info">
    <!-- ACHIEVEMENT ITEM BOX INFO TOP -->
    <div class="achievement-item-box-info-top">
    <?php if ($achievement_image_wrap) : ?>
      <!-- ACHIEVEMENT ITEM BOX IMAGE WRAP -->
      <div class="achievement-item-box-image-wrap">
      <?php
        if (($args['achievement']['achievement_type'] === 'quest') && !$args['achievement']['completed']) :
      ?>
      <!-- ACHIEVEMENT ITEM BOX IMAGE -->
      <img class="achievement-item-box-image" src="<?php echo VIKINGER_URL; ?>/img/quest/quest-open.png" alt="quest-open">
      <!-- /ACHIEVEMENT ITEM BOX IMAGE -->
      <?php
        else :
      ?>
      <!-- ACHIEVEMENT ITEM BOX IMAGE -->
      <img class="achievement-item-box-image" src="<?php echo esc_url($args['achievement']['image_url']); ?>" alt="<?php echo esc_attr($args['achievement']['slug']); ?>">
      <!-- /ACHIEVEMENT ITEM BOX IMAGE -->
      <?php
        endif;
      ?>
      </div>
      <!-- /ACHIEVEMENT ITEM BOX IMAGE WRAP -->
    <?php else : ?>
      <!-- ACHIEVEMENT ITEM BOX IMAGE -->
      <img class="achievement-item-box-image" src="<?php echo esc_url($args['achievement']['image_url']); ?>" alt="<?php echo esc_attr($args['achievement']['slug']); ?>">
      <!-- /ACHIEVEMENT ITEM BOX IMAGE -->
    <?php endif; ?>

      <!-- ACHIEVEMENT ITEM BOX TITLE -->
      <p class="achievement-item-box-title"><?php echo esc_html($args['achievement']['name']); ?></p>
      <!-- /ACHIEVEMENT ITEM BOX TITLE -->

      <!-- ACHIEVEMENT ITEM BOX TEXT -->
      <div class="achievement-item-box-text"><?php echo do_blocks(do_shortcode($args['achievement']['description_raw'])); ?></div>
      <!-- /ACHIEVEMENT ITEM BOX TEXT -->

    <?php
      if ($achievement_complete_info) :
        $completed_steps = 0;
        $steps_count = count($args['achievement']['steps']);

        if ($steps_count > 0) :
    ?>
      <!-- ACHIEVEMENT ITEM BOX REQUIREMENTS -->
      <div class="achievement-item-box-requirements">
        <!-- ACHIEVEMENT ITEM BOX SUBTITLE -->
        <p class="achievement-item-box-subtitle"><?php esc_html_e('Requirements: ', 'vikinger'); ?> <span><?php echo esc_html($steps_count); ?></span></p>
        <!-- /ACHIEVEMENT ITEM BOX SUBTITLE -->

        <!-- CHECKLIST ITEMS -->
        <div class="checklist-items" data-simplebar>
        <?php
          foreach ($args['achievement']['steps'] as $step) :
            if ($step['completed']) {
              $completed_steps++;
            }

            $checklist_item_box_classes = $step['completed'] ? 'active' : '';
        ?>
          <!-- CHECKLIST ITEM -->
          <div class="checklist-item">
            <!-- CHECKLIST ITEM BOX -->
            <div class="checklist-item-box <?php echo esc_attr($checklist_item_box_classes); ?>">
            <?php

              /**
               * Icon SVG
               */
              get_template_part('template-part/icon/icon', 'svg', [
                'icon'      => 'check-small',
                'modifiers' => 'checklist-item-box-icon'
              ]);

            ?>
            </div>
            <!-- /CHECKLIST ITEM BOX -->

            <!-- CHECKLIST ITEM TEXT -->
            <p class="checklist-item-text"><?php echo esc_html($step['description']); ?></p>
            <!-- /CHECKLIST ITEM TEXT -->
          </div>
          <!-- /CHECKLIST ITEM -->
        <?php
          endforeach;
        ?>
        </div>
        <!-- /CHECKLIST ITEMS -->
      </div>
      <!-- /ACHIEVEMENT ITEM BOX REQUIREMENTS -->
    <?php
        // end steps count if
        endif;
    ?>
    </div>
    <!-- /ACHIEVEMENT ITEM BOX INFO TOP -->

    <!-- ACHIEVEMENT ITEM BOX INFO BOTTOM -->
    <div class="achievement-item-box-info-bottom">
    <?php
      // if achievement is unlockable with points and its not yet completed
      if ($args['achievement']['unlock_with_points'] && !$args['achievement']['completed'] && $args['user_points']) :
        $unlock_point_type_image_url  = $args['achievement']['unlock_with_points']['image_url'];
        $unlock_point_type            = $args['achievement']['unlock_with_points']['slug'];
        $unlock_points                = $args['achievement']['unlock_with_points']['points'];
        $user_has_points_to_unlock    = $args['user_points'][$unlock_point_type]['points'] >= $unlock_points;
    ?>
      <!-- ACHIEVEMENT ITEM BOX UNLOCK FORM -->
      <form class="achievement-item-box-unlock-form" method="post">
        <input type="hidden" name="achievement_unlock_id" value="<?php echo esc_attr($args['achievement']['id']); ?>">
        <button class="button" type="submit" name="achievement_unlock" <?php echo !$user_has_points_to_unlock ? 'disabled' : ''; ?>>
          <?php esc_html_e('Unlock using', 'vikinger'); ?>
          <?php echo esc_html($unlock_points); ?>
          <img class="achievement-item-box-unlocked-button-image" src="<?php echo esc_url($unlock_point_type_image_url); ?>" alt="<?php echo esc_attr($unlock_point_type); ?>">
        </button>
      </form>
      <!-- /ACHIEVEMENT ITEM BOX UNLOCK FORM -->
    <?php
      // end achievement unlockable with points form if
      endif;
    ?>

    <?php
      if ($args['achievement']['unlocked_with_points']) :
        $unlock_point_type_image_url = $args['achievement']['unlock_with_points']['image_url'];
        $unlock_point_type = $args['achievement']['unlock_with_points']['slug'];
        $unlock_points = $args['achievement']['unlock_with_points']['points'];
    ?>
      <p class="achievement-item-box-unlocked-button button">
        <?php esc_html_e('Unlocked with', 'vikinger'); ?>
        <?php echo esc_html($unlock_points); ?>
        <img class="achievement-item-box-unlocked-button-image" src="<?php echo esc_url($unlock_point_type_image_url); ?>" alt="<?php echo esc_attr($unlock_point_type); ?>">
      </p>
    <?php
      elseif ($args['achievement']['awarded']) :
    ?>
      <p class="achievement-item-box-unlocked-button button"><?php esc_html_e('Awarded by Admin', 'vikinger'); ?></p>
    <?php
      // end achievement unlocked with points if
      endif;
    ?>

    <?php if (!$args['achievement']['completed'] && !$args['achievement']['awarded'] && ($steps_count > 0)) : ?>
    <!-- PROGRESS STAT -->
    <div class="progress-stat">
      <!-- PROGRESS STAT BAR -->
      <div class="progress-stat-bar achievement-progress" data-scalestop="<?php echo esc_attr($completed_steps); ?>" data-scaleend="<?php echo esc_attr($steps_count); ?>"></div>
      <!-- /PROGRESS STAT BAR -->

      <!-- BAR PROGRESS WRAP -->
      <div class="bar-progress-wrap">
        <!-- BAR PROGRESS INFO -->
        <p class="bar-progress-info negative center"><span class="bar-progress-text no-space"></span></p>
        <!-- /BAR PROGRESS INFO -->
      </div>
      <!-- /BAR PROGRESS WRAP -->
    </div>
    <!-- /PROGRESS STAT -->
    <?php elseif (!$args['achievement']['completed'] && ($steps_count === 0)) : ?>
    <!-- PROGRESS STAT -->
    <div class="progress-stat">
      <!-- PROGRESS STAT BAR -->
      <div class="progress-stat-bar achievement-progress" data-scalestop="0" data-scaleend="1"></div>
      <!-- /PROGRESS STAT BAR -->

      <!-- BAR PROGRESS WRAP -->
      <div class="bar-progress-wrap">
        <!-- BAR PROGRESS INFO -->
        <p class="bar-progress-info negative center"><span class="bar-progress-text no-space"></span></p>
        <!-- /BAR PROGRESS INFO -->
      </div>
      <!-- /BAR PROGRESS WRAP -->
    </div>
    <!-- /PROGRESS STAT -->
    <?php else : ?>
    <!-- PROGRESS STAT -->
    <div class="progress-stat">
      <!-- PROGRESS STAT BAR -->
      <div class="progress-stat-bar achievement-progress" data-scalestop="1" data-scaleend="1"></div>
      <!-- /PROGRESS STAT BAR -->

      <!-- BAR PROGRESS WRAP -->
      <div class="bar-progress-wrap">
        <!-- BAR PROGRESS INFO -->
        <p class="bar-progress-info negative center"><span class="bar-progress-text no-space"></span></p>
        <!-- /BAR PROGRESS INFO -->
      </div>
      <!-- /BAR PROGRESS WRAP -->
    </div>
    <!-- /PROGRESS STAT --> 
    <?php

        endif;
      // not complete achievement info
      else :
    ?>
    </div>
    <!-- /ACHIEVEMENT ITEM BOX INFO TOP -->

    <!-- ACHIEVEMENT ITEM BOX INFO BOTTOM -->
    <div class="achievement-item-box-info-bottom">
    <?php

      endif;

    ?>
      <!-- ACHIEVEMENT ITEM BOX FOOTER -->
      <div class="achievement-item-box-footer <?php echo !$achievement_complete_info ? 'big-margin-top' : '' ?>">
        <?php if ($achievement_type === 'rank') : ?>
        <!-- ACHIEVEMENT ITEM BOX FOOTER TITLE -->
        <p class="achievement-item-box-footer-title"><?php esc_html_e('People who have this rank:', 'vikinger'); ?></p>
        <!-- /ACHIEVEMENT ITEM BOX FOOTER TITLE -->
        <?php else : ?>
        <!-- ACHIEVEMENT ITEM BOX FOOTER TITLE -->
        <p class="achievement-item-box-footer-title"><?php esc_html_e('People who have earned this:', 'vikinger'); ?></p>
        <!-- /ACHIEVEMENT ITEM BOX FOOTER TITLE -->
        <?php endif; ?>

      <?php
        if (count($args['achievement']['completed_users']) > 0) :
      ?>
        <!-- USER AVATAR LIST -->
        <div class="user-avatar-list">
        <?php
          foreach ($args['achievement']['completed_users'] as $user) {
            /**
             * Avatar Micro
             */
            get_template_part('template-part/avatar/avatar', 'micro', [
              'user'    => $user,
              'linked'  => true
            ]);
          }
        ?>
        </div>
        <!-- /USER AVATAR LIST -->
      <?php
        else:
      ?>
        <!-- ACHIEVEMENT ITEM BOX FOOTER TITLE -->
        <p class="achievement-item-box-footer-title">-</p>
        <!-- /ACHIEVEMENT ITEM BOX FOOTER TITLE -->
      <?php
        endif;
      ?>
      </div>
      <!-- /ACHIEVEMENT ITEM BOX FOOTER -->
    </div>
    <!-- /ACHIEVEMENT ITEM BOX INFO BOTTOM -->
  </div>
  <!-- /ACHIEVEMENT ITEM BOX INFO -->
</div>
<!-- /ACHIEVEMENT ITEM BOX -->