<?php
/**
 * Functions - Advanced Ads - Global
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_advads_pro_ads_by_placement_get')) {
  /**
   * Returns registered BuddyPress Ads by placement hooks
   * 
   * @param string  $type         Placement type to limit ads.
   * @param array   $hooks        Hooks to limit ads.
   * @return array  $ads_by_placement {
   *   @type string $name         Name assigned to the placement.
   *   @type int    $index        Position to display ad at.
   *   @type string $html         HTML code of the ad to be rendered.
   * }
   */
  function vikinger_advads_pro_ads_by_placement_get($type = false, $hooks = false) {
    $ad_placements = get_option('advads-ads-placements', []);
  
    $ads_by_placement = [];
  
    if (is_array($ad_placements)) {
      foreach ($ad_placements as $placement_id => $placement) {
        if (!$type || ((isset($placement['type']) && ($placement['type'] === $type)))) {
          $placement_hook = vikinger_advads_pro_placement_hook_get($placement_id, $placement);

          if (($hooks === false) || in_array($placement_hook, $hooks)) {
            $placement_index = vikinger_advads_pro_placement_index_get($placement);
            $placement_ad_html = get_ad_placement($placement_id);

            // if ad display conditions are met, add placement
            if (!is_null($placement_ad_html)) {
              if (!array_key_exists($placement_hook, $ads_by_placement)) {
                $ads_by_placement[$placement_hook] = [];
              }

              $ads_by_placement[$placement_hook][] = [
                'name'    => $placement['name'],
                'index'   => $placement_index,
                'html'    => $placement_ad_html,
                'repeat'  => !empty($placement['options']['hook_repeat']) ? $placement['options']['hook_repeat'] === '1' : false
              ];
            }
          }
        }
      }
    }
  
    return $ads_by_placement;
  }
}

if (!function_exists('vikinger_advads_pro_placement_hook_get')) {
  /**
   * Returns BuddyPress hook for a given placement
   * 
   * @param string  $placement_id   Placement ID.
   * @param array   $placement      Ad placement data.
   * @return string                 Hook name.
   */
  function vikinger_advads_pro_placement_hook_get($placement_id, $placement) {
    if (isset($placement['type'])) {
      if ($placement['type'] === 'buddypress') {
        if (empty($placement['options']['buddypress_hook'])) {
          return 'bp_after_activity_entry';
        }
      
        // This accounts for previous versions of the add-on.
        return ('bp_' !== substr($placement['options']['buddypress_hook'], 0, 3))
          ? str_replace(' ', '_', 'bp_' . $placement['options']['buddypress_hook']) : $placement['options']['buddypress_hook'];
      }

      return $placement['type'];
    }

    return $placement_id;
  }
}

if (!function_exists('vikinger_advads_pro_placement_index_get')) {
  /**
   * Returns BuddyPress hook for a given placement
   * 
   * @param array $placement      Ad placement data.
   * @return int                  Placement index.
   */
  function vikinger_advads_pro_placement_index_get($placement) {
    if (isset($placement['options']['pro_buddypress_pages_index'])) {
      return (int) $placement['options']['pro_buddypress_pages_index'];
    }

    if (isset($placement['options']['pro_archive_pages_index'])) {
      return (int) $placement['options']['pro_archive_pages_index'];
    }

    return 1;
  }
}

if (!function_exists('vikinger_advads_pro_ads_by_activity_placement_get')) {
  /**
   * Returns registered BuddyPress Ads by activity placement
   * 
   * @return array  $ads_by_placement {
   *   @type string $name         Name assigned to the placement.
   *   @type int    $index        Position to display ad at.
   *   @type string $html         HTML code of the ad to be rendered.
   * }
   */
  function vikinger_advads_pro_ads_by_activity_placement_get() {
    $activity_hooks = [
      'bp_before_activity_entry',
      'bp_activity_entry_content',
      'bp_after_activity_entry',
      'bp_before_activity_entry_comments',
      'bp_activity_entry_comments',
      'bp_after_activity_entry_comments'
    ];

    return vikinger_advads_pro_ads_by_placement_get('buddypress', $activity_hooks);
  }
}

if (!function_exists('vikinger_advads_pro_ads_by_member_placement_get')) {
  /**
   * Returns registered BuddyPress Ads by member placement
   * 
   * @return array  $ads_by_placement {
   *   @type string $name         Name assigned to the placement.
   *   @type int    $index        Position to display ad at.
   *   @type string $html         HTML code of the ad to be rendered.
   * }
   */
  function vikinger_advads_pro_ads_by_member_placement_get() {
    $member_hooks = [
      'bp_directory_members_item'
    ];

    return vikinger_advads_pro_ads_by_placement_get('buddypress', $member_hooks);
  }
}

if (!function_exists('vikinger_advads_pro_ads_by_group_placement_get')) {
  /**
   * Returns registered BuddyPress Ads by group placement
   * 
   * @return array  $ads_by_placement {
   *   @type string $name         Name assigned to the placement.
   *   @type int    $index        Position to display ad at.
   *   @type string $html         HTML code of the ad to be rendered.
   * }
   */
  function vikinger_advads_pro_ads_by_group_placement_get() {
    $group_hooks = [
      'bp_directory_groups_item'
    ];

    return vikinger_advads_pro_ads_by_placement_get('buddypress', $group_hooks);
  }
}

if (!function_exists('vikinger_advads_pro_ads_by_post_placement_get')) {
  /**
   * Returns registered Ads by post placement
   * 
   * @return array  $ads_by_placement {
   *   @type string $name         Name assigned to the placement.
   *   @type int    $index        Position to display ad at.
   *   @type string $html         HTML code of the ad to be rendered.
   * }
   */
  function vikinger_advads_pro_ads_by_post_placement_get() {
    return vikinger_advads_pro_ads_by_placement_get('archive_pages');
  }
}