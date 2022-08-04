<?php
/**
 * Functions - WooCommerce - Filters
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Allow customers to access wp-admin
 */
add_filter('woocommerce_prevent_admin_access', '__return_false');
add_filter('woocommerce_disable_admin_bar', '__return_false');

if (!function_exists('vikinger_woocommerce_breadcrumb_defaults_filter')) {
  /**
   * Adds custom breadcrumb default options
   */
  function vikinger_woocommerce_breadcrumb_defaults_filter($args) {
    $args['delimiter'] = '<span class="woocommerce-breadcrumb-separator">&#124;</span>';
  
    return $args;
  }
}

add_filter('woocommerce_breadcrumb_defaults', 'vikinger_woocommerce_breadcrumb_defaults_filter');

if (!function_exists('vikinger_woocommerce_dropdown_variation_attribute_options_html')) {
  /**
   * Adds SVG icon and wrapper to single product variation dropdowns
   */
  function vikinger_woocommerce_dropdown_variation_attribute_options_html($html, $args) {
    ob_start();

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => 'small-arrow',
      'modifiers' => 'form-select-icon'
    ]);

    $dropdownSVGIcon = ob_get_clean();

    $html = '<div class="form-select">' . $html . $dropdownSVGIcon . '</div>';

    return $html;
  }
}

add_filter('woocommerce_dropdown_variation_attribute_options_html', 'vikinger_woocommerce_dropdown_variation_attribute_options_html', 10, 2);

if (!function_exists('vikinger_woocommerce_quantity_input_classes')) {
  /**
   * Adds form counter input classes to quantity inputs
   */
  function vikinger_woocommerce_quantity_input_classes($classes, $product) {
    $classes[] = 'vk-form-counter-input';

    return $classes;
  }
}

add_filter('woocommerce_quantity_input_classes', 'vikinger_woocommerce_quantity_input_classes', 10, 2);

if (!function_exists('vikinger_woocommerce_account_menu_items_filter')) {
  /**
   * Removes Dashboard and Logout options
   */
  function vikinger_woocommerce_account_menu_items_filter($items, $endpoints) {
    unset($items['dashboard']);
    unset($items['customer-logout']);
  
    return $items;
  }
}

add_filter('woocommerce_account_menu_items', 'vikinger_woocommerce_account_menu_items_filter', 10, 2);

if (!function_exists('vikinger_woocommerce_minicart_fragments')) {
  /**
   * Handle mini cart AJAX updates
   */
  function vikinger_woocommerce_minicart_fragments($fragments) {
    global $woocommerce;

    $cart_item_count = $woocommerce->cart->get_cart_contents_count();
    $cart_item_count_classes = $cart_item_count > 0 ? 'unread' : '';

    ob_start();

    ?>
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
    <?php

    $fragments['div.vikinger-wc-cart-icon-wrap'] = ob_get_clean();

    ob_start();

    ?>
    <div class="dropdown-box-header vikinger-wc-cart-header-title">
      <p class="dropdown-box-header-title"><?php esc_html_e('Shopping Cart', 'vikinger'); ?> <span class="highlighted"><?php echo esc_html($cart_item_count); ?></span></p>
    </div>
    <?php

    $fragments['div.vikinger-wc-cart-header-title'] = ob_get_clean();

    ob_start();

    ?>
    <div class="dropdown-box-list scroll-small vikinger-wc-minicart" data-simplebar>
    <?php woocommerce_mini_cart(); ?>
    </div>
    <?php

    $fragments['div.vikinger-wc-minicart'] = ob_get_clean();

    ob_start();

    ?>
    <div class="cart-preview-total vikinger-wc-cart-preview-total">
      <p class="cart-preview-total-title"><?php esc_html_e('Total:', 'vikinger'); ?></p>
      <p class="cart-preview-total-text"><?php echo $woocommerce->cart->get_cart_total(); ?></p>
    </div>
    <?php

    $fragments['div.vikinger-wc-cart-preview-total'] = ob_get_clean();
      
    return $fragments;
  }
}

add_filter('woocommerce_add_to_cart_fragments', 'vikinger_woocommerce_minicart_fragments');