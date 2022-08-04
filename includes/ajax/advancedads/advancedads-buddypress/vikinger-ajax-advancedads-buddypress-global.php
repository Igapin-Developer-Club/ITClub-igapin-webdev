<?php
/**
 * AJAX - Advanced Ads + BuddyPress - Global
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_advads_pro_ads_by_activity_placement_get_ajax')) {
  /**
   * Returns registered BuddyPress Ads by activity placement
   */
  function vikinger_advads_pro_ads_by_activity_placement_get_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $result = vikinger_advads_pro_ads_by_activity_placement_get();

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_advads_pro_ads_by_activity_placement_get_ajax', 'vikinger_advads_pro_ads_by_activity_placement_get_ajax');
add_action('wp_ajax_nopriv_vikinger_advads_pro_ads_by_activity_placement_get_ajax', 'vikinger_advads_pro_ads_by_activity_placement_get_ajax');

if (!function_exists('vikinger_advads_pro_ads_by_member_placement_get_ajax')) {
  /**
   * Returns registered BuddyPress Ads by member placement
   */
  function vikinger_advads_pro_ads_by_member_placement_get_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $result = vikinger_advads_pro_ads_by_member_placement_get();

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_advads_pro_ads_by_member_placement_get_ajax', 'vikinger_advads_pro_ads_by_member_placement_get_ajax');
add_action('wp_ajax_nopriv_vikinger_advads_pro_ads_by_member_placement_get_ajax', 'vikinger_advads_pro_ads_by_member_placement_get_ajax');

if (!function_exists('vikinger_advads_pro_ads_by_group_placement_get_ajax')) {
  /**
   * Returns registered BuddyPress Ads by group placement
   */
  function vikinger_advads_pro_ads_by_group_placement_get_ajax() {
    // nonce check, dies early if the nonce cannot be verified
    check_ajax_referer('vikinger_ajax');

    $result = vikinger_advads_pro_ads_by_group_placement_get();

    header('Content-Type: application/json');
    echo json_encode($result);

    wp_die();
  }
}

add_action('wp_ajax_vikinger_advads_pro_ads_by_group_placement_get_ajax', 'vikinger_advads_pro_ads_by_group_placement_get_ajax');
add_action('wp_ajax_nopriv_vikinger_advads_pro_ads_by_group_placement_get_ajax', 'vikinger_advads_pro_ads_by_group_placement_get_ajax');

?>