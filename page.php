<?php
/**
 * Vikinger Template - Page
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  get_header();

  if (have_posts()) {
    the_post();

    // Elementor page template
    if (vikinger_plugin_elementor_is_active() && vikinger_is_elementor_page()) {
      the_content();
    // bbPress page template
    } else if (vikinger_plugin_bbpress_is_active() && is_bbpress()) {
      /**
       * Forum Page
       */
      get_template_part('template-part/forum/forum', 'page');
    } else if (vikinger_plugin_woocommerce_is_active() && is_account_page()) {
      /**
       * WooCommerce Account Page
       */
      get_template_part('template-part/woocommerce/woocommerce-account', 'page');
    } else if (vikinger_plugin_woocommerce_is_active() && (is_cart() || is_checkout() || is_checkout_pay_page() || is_order_received_page())) {
      /**
       * WooCommerce Page
       */
      get_template_part('template-part/woocommerce/woocommerce', 'page');
    } else if (vikinger_plugin_pmpro_is_active() && vikinger_pmpro_is_pmpro_account_page()) {
      /**
       * Paid Memberships Pro Account Page
       */
      get_template_part('template-part/pmpro/pmpro-account', 'page');
    } else if (vikinger_plugin_pmpro_is_active() && vikinger_pmpro_is_pmpro_page()) {
      /**
       * Paid Memberships Pro Page
       */
      get_template_part('template-part/pmpro/pmpro', 'page');
    } else {
    // not an Elementor or bbPress page, load regular page template
      $post_data = vikinger_page_get_loop_data();

      /**
       * Page Open
       */
      get_template_part('template-part/page/page-open', null, [
        'post' => $post_data
      ]);
    }
  }

  get_footer();

?>