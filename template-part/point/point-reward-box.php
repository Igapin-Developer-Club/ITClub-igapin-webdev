<?php
/**
 * Vikinger Template Part - Point Reward Box
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_gamipress_get_point_type_awards
 * 
 * @param array $args {
 *   @type array    $point          Point data.
 *   @type string   $point_type     Optional. Point type if set. One of: 'deduct'
 * }
 */

  $point_type = isset($args['point_type']) ? $args['point_type'] : false;
  $award_limit_text = $point_type && $point_type === 'deduct' ? esc_html__('Deduct Limit', 'vikinger') : esc_html__('Award Limit', 'vikinger');

?>

<div class="point-reward-box">
  <!-- POINT REWARD BOX ICON WRAP -->
  <div class="point-reward-box-icon-wrap">
  <?php

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => 'credits',
      'modifiers' => 'point-reward-box-icon'
    ]);

  ?>
  </div>
  <!-- /POINT REWARD BOX ICON WRAP -->

  <!-- POINT REWARD BOX INFO -->
  <div class="point-reward-box-info point-reward-box-info-description">
    <!-- POINT REWARD BOX TITLE -->
    <p class="point-reward-box-title"><?php echo esc_html($args['point']['description']); ?></p>
    <!-- /POINT REWARD BOX TITLE -->

    <!-- POINT REWARD BOX TEXT -->
    <p class="point-reward-box-text"><?php esc_html_e('Task Description', 'vikinger'); ?></p>
    <!-- /POINT REWARD BOX TEXT -->
  </div>
  <!-- /POINT REWARD BOX INFO -->

  <!-- POINT REWARD BOX INFO -->
  <div class="point-reward-box-info">
    <!-- POINT REWARD BOX TITLE -->
    <p class="point-reward-box-title"><?php echo esc_html($args['point']['limit_text']); ?></p>
    <!-- /POINT REWARD BOX TITLE -->

    <!-- POINT REWARD BOX TEXT -->
    <p class="point-reward-box-text"><?php echo esc_html($award_limit_text); ?></p>
    <!-- /POINT REWARD BOX TEXT -->
  </div>
  <!-- /POINT REWARD BOX INFO -->

  <!-- TEXT STICKER -->
  <p class="text-sticker">
  <?php

    $icon_type = 'plus-small';
    $icon_modifiers = 'text-sticker-icon';

    if ($point_type && ($point_type === 'deduct')) {
      $icon_modifiers .= ' tertiary';
      $icon_type = 'minus-small';
    }

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => $icon_type,
      'modifiers' => $icon_modifiers
    ]);
    
  ?>

  <?php echo esc_html($args['point']['points']); ?>

    <!-- TEXT STICKER IMAGE -->
    <img class="text-sticker-image" src="<?php echo esc_url($args['point']['point_type']['image_url']); ?>" alt="<?php echo esc_attr($args['point']['point_type']['slug']); ?>">
    <!-- /TEXT STICKER IMAGE -->
  </p>
  <!-- /TEXT STICKER -->
</div>