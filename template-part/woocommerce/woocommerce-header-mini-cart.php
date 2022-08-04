<?php
/**
 * Vikinger Template Part - WooCommerce Header Mini Cart
 * 
 * @package Vikinger
 * @since 1.6.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  global $woocommerce;

  $cart_item_count = $woocommerce->cart->get_cart_contents_count();
  $cart_item_count_classes = $cart_item_count > 0 ? 'unread' : '';

?>

<!-- HEADER CART -->
<div class="header-cart">
  <!-- ACTION LIST -->
  <div class="action-list dark">
    <!-- ACTION LIST ITEM WRAP -->
    <div class="action-list-item-wrap">
      <!-- ACTION LIST ITEM -->
      <div class="action-list-item header-settings-dropdown-trigger">
        <!-- ACTION LIST ITEM ICON WRAP -->
        <div class="action-list-item-icon-wrap vikinger-wc-cart-icon-wrap <?php echo esc_attr($cart_item_count_classes); ?>">
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
      </div>
      <!-- ACTION LIST ITEM -->

      <!-- DROPDOWN BOX -->
      <div class="dropdown-box no-padding-bottom header-settings-dropdown">
        <!-- DROPDOWN BOX HEADER -->
        <div class="dropdown-box-header vikinger-wc-cart-header-title">
          <p class="dropdown-box-header-title"><?php esc_html_e('Shopping Cart', 'vikinger'); ?> <span class="highlighted"><?php echo esc_html($woocommerce->cart->get_cart_contents_count()); ?></span></p>
        </div>
        <!-- /DROPDOWN BOX HEADER -->
        
        <!-- DROPDOWN BOX LIST -->
        <div class="dropdown-box-list scroll-small vikinger-wc-minicart" data-simplebar>
        <?php woocommerce_mini_cart(); ?>
        </div>
        <!-- /DROPDOWN BOX LIST -->

        <!-- CART PREVIEW TOTAL -->
        <div class="cart-preview-total vikinger-wc-cart-preview-total">
          <p class="cart-preview-total-title"><?php esc_html_e('Total:', 'vikinger'); ?></p>
          <p class="cart-preview-total-text"><?php echo $woocommerce->cart->get_cart_total(); ?></p>
        </div>
        <!-- /CART PREVIEW TOTAL -->

        <!-- DROPDOWN BOX ACTIONS -->
        <div class="dropdown-box-actions">
          <!-- DROPDOWN BOX ACTION -->
          <div class="dropdown-box-action">
            <a class="button secondary" href="<?php echo esc_url(wc_get_cart_url()); ?>"><?php esc_html_e('Shopping Cart', 'vikinger'); ?></a>
          </div>
          <!-- /DROPDOWN BOX ACTION -->

          <!-- DROPDOWN BOX ACTION -->
          <div class="dropdown-box-action">
            <a class="button primary" href="<?php echo esc_url(wc_get_checkout_url()); ?>"><?php esc_html_e('Checkout', 'vikinger'); ?></a>
          </div>
          <!-- /DROPDOWN BOX ACTION -->
        </div>
        <!-- /DROPDOWN BOX ACTIONS -->
      </div>
      <!-- /DROPDOWN BOX -->
    </div>
    <!-- /ACTION LIST ITEM WRAP -->
  </div>
  <!-- /ACTION LIST -->
</div>
<!-- /HEADER CART -->