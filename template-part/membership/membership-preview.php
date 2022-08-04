<?php
/**
 * Vikinger Template Part - Membership Preview
 * 
 * @package Vikinger
 * @since 1.8.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string $currency         Membership price currency.
 *   @type string $price            Membership price.
 *   @type string $name             Membership name.
 *   @type string $period           Membership period.
 *   @type string $description      Membership description.
 *   @type string $action_text      Membership action text.
 *   @type string $action_type      Membership action type.
 *   @type string $action_link      Membership action link.
 * }
 */

  $currency_position = isset($args['currency_position']) ? $args['currency_position'] : 'left';
  $description = isset($args['description']) ? $args['description'] : false;
  $action_type = isset($args['action_type']) ? $args['action_type'] : 'button';

?>

<!-- MEMBERSHIP PREVIEW -->
<div class="membership-preview">
  <!-- MEMBERSHIP PREVIEW INFO -->
  <div class="membership-preview-info">
    <!-- MEMBERSHIP PREVIEW PRICE -->
    <p class="membership-preview-price">
    <?php if ($currency_position === 'left') : ?>
      <span class="membership-preview-price-currency"><?php echo esc_html($args['currency']); ?></span><?php echo esc_html($args['price']); ?>
    <?php endif; ?>

    <?php if ($currency_position === 'right') : ?>
      <?php echo esc_html($args['price']); ?><span class="membership-preview-price-currency"><?php echo esc_html($args['currency']); ?></span>
    <?php endif; ?>
    </p>
    <!-- /MEMBERSHIP PREVIEW PRICE -->

    <!-- MEMBERSHIP PREVIEW NAME -->
    <p class="membership-preview-name"><?php echo esc_html($args['name']); ?></p>
    <!-- /MEMBERSHIP PREVIEW NAME -->

    <!-- MEMBERSHIP PREVIEW PERIOD -->
    <p class="membership-preview-period">
    <?php

      echo wp_kses($args['period'], [
        'strong'  => [],
        'br'      => []
      ]);

    ?>
    </p>
    <!-- /MEMBERSHIP PREVIEW PERIOD -->

  <?php if ($description) : ?>
    <!-- MEMBERSHIP PREVIEW DESCRIPTION -->
    <div class="membership-preview-description"><?php echo $args['description']; ?></div>
    <!-- /MEMBERSHIP PREVIEW DESCRIPTION -->
  <?php endif; ?>
  </div>
  <!-- /MEMBERSHIP PREVIEW INFO -->

  <!-- MEMBERSHIP PREVIEW INFO -->
  <div class="membership-preview-info">
  <?php if ($action_type === 'button') : ?>
    <!-- MEMBERSHIP PREVIEW BUTTON -->
    <a class="membership-preview-button button secondary" href="<?php echo esc_url($args['action_link']); ?>"><?php echo esc_html($args['action_text']); ?></a>
    <!-- /MEMBERSHIP PREVIEW BUTTON -->
  <?php else : ?>
    <!-- MEMBERSHIP PREVIEW NOTICE -->
    <p class="membership-preview-notice"><?php echo esc_html($args['action_text']); ?></p>
    <!-- /MEMBERSHIP PREVIEW NOTICE -->
  <?php endif; ?>
  </div>
  <!-- /MEMBERSHIP PREVIEW INFO -->
</div>
<!-- /MEMBERSHIP PREVIEW -->