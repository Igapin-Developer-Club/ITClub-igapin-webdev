<?php
/**
 * Vikinger Template Part - WooCommerce Header Mini Cart Icon Link
 * 
 * @package Vikinger
 * @since 1.8.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  global $woocommerce;

  $cart_item_count = $woocommerce->cart->get_cart_contents_count();
  $cart_item_count_classes = $cart_item_count > 0 ? 'unread' : '';

?>

<!-- ACTION LIST ITEM -->
<a class="action-list-item" href="<?php echo esc_url(wc_get_cart_url()); ?>">
  <!-- ACTION LIST ITEM ICON WRAP -->
  <div class="action-list-item-icon-wrap <?php echo esc_attr($cart_item_count_classes); ?>">
  <?php

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => 'shopping-bag',
      'modifiers' => 'action-list-item-icon'
    ]);

  ?>
  </div>
  <!-- /ACTION LIST ITEM ICON WRAP -->
</a>
<!-- ACTION LIST ITEM -->