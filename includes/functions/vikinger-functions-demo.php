<?php
/**
 * Functions - Demo
 * 
 * @package Vikinger
 * 
 * @since 1.3.4
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Create a new menu or update an existing one.
 * 
 * @param int   $menu_id        ID of the menu to update or "0" to create a new one.
 * @param array $menu_data {      
 *   @type string $menu-name    Name of the navigation menu.
 * }
 * @return int/WP_Error Menu ID on success, WP_Error object on failure.
 */
function vikinger_navigation_menu_update($menu_id, $menu_data = []) {
  return wp_update_nav_menu_object($menu_id, $menu_data);
}

/**
 * Create a new menu item or update an existing one.
 * 
 * @param int   $menu_id        ID of the menu to add the menu item to.
 * @param int   $menu_item_id   ID of the menu item to update, or "0" to create a new one.
 * @param array $menu_item_data {
 *   @type int    menu-item-parent-id     Menu item parent ID.      
 *   @type string $menu-item-title        Name of the menu item.
 *   @type string $menu-item-type         Type of the menu item. One of: 'custom', 'post_type'. Default: 'custom'.
 *   @type string $menu-item-url          URL of the menu item.
 *   @type string $menu-item-attr-title   Title of the menu item.
 *   @type string $menu-item-classes      Classes of the menu item.
 * }
 * @return int/WP_Error Menu item ID on success, WP_Error object on failure.
 */
function vikinger_navigation_menu_item_update($menu_id, $menu_item_id, $menu_item_data = []) {
  return wp_update_nav_menu_item($menu_id, $menu_item_id, $menu_item_data);
}

/**
 * Delete navigation menu
 * 
 * @param $menu_id        ID of the menu to delete.
 * @return bool/WP_Error  True on success, false or WP_Error object on failure.
 */
function vikinger_navigation_menu_delete($menu_id) {
  return wp_delete_nav_menu($menu_id);
}

/**
 * Assigns a navigation menu to a location
 * 
 * @param string  $location      Name of the location to assign the menu to.
 * @param int     $menu_id       ID of the menu to assign to the location.
 */
function vikinger_navigation_menu_location_update($location, $menu_id) {
  $locations = get_nav_menu_locations();

  $locations[$location] = $menu_id;

  set_theme_mod('nav_menu_locations', $locations);
}

/**
 * Delete item entry from demo content theme mod
 * 
 * @param string  $theme_mod      Theme mod name.
 * @param int     $item_id        ID of the item to delete from the theme mod.
 */
function vikinger_demo_content_theme_mod_entry_delete($theme_mod, $item_id) {
  $theme_mod_items_ids = get_theme_mod($theme_mod, '');

  if ($theme_mod_items_ids !== '') {
    $items_ids = explode(',', $theme_mod_items_ids);

    $updated_items_ids = array_filter($items_ids, function ($current_item_id) use ($item_id) {
      return ((int) $current_item_id) !== $item_id;
    });

    // if at least one menu id remaining, update theme mod
    if (count($updated_items_ids) > 0) {
      // update theme mod with updated navigation menu ids (comma separated)
      set_theme_mod($theme_mod, implode(',', $updated_items_ids));
    } else {
    // no menu ids remaining, remove theme mod
      remove_theme_mod($theme_mod);
    }
  }
}

/**
 * Creates demo content menus, assigns them to menu locations and creates menu items.
 * 
 * @return bool   True if successful, false otherwise.
 */
function vikinger_demo_content_menus_create() {
  // delete demo content menus if they exist
  vikinger_demo_content_menus_delete();

  $logged_in_user_id = get_current_user_id();
  $logged_in_user = get_userdata($logged_in_user_id);

  $menus = [
    [
      'name'        => 'Main Links',
      'location'    => 'header_menu',
      'menu_items'  => [
        [
          'menu-item-title'       => 'Home',
          'menu-item-url'         => vikinger_site_url_get(),
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'More',
          'menu-item-url'         => '#',
          'menu-item-status'      => 'publish',
          'children'              => [
            [
              'menu-item-title'       => 'Other Items',
              'menu-item-url'         => 'https://themeforest.net/user/odin_design',
              'menu-item-status'      => 'publish'
            ],
            [
              'menu-item-title'       => 'Our Website',
              'menu-item-url'         => 'https://odindesignthemes.com/',
              'menu-item-status'      => 'publish'
            ]
          ]
        ]
      ]
    ],
    [
      'name'        => 'Features',
      'location'    => 'header_features_menu',
      'menu_items'  => [
        /**
         * BuddyPress
         */
        [
          'menu-item-title'       => 'Profile Timeline',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile About',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/about'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Friends',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/friends'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Groups',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/groups'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Blog Posts',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/posts'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Photos',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/photos'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Activity',
          'menu-item-url'         => vikinger_site_url_get('activity'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Members',
          'menu-item-url'         => vikinger_site_url_get('members'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Groups',
          'menu-item-url'         => vikinger_site_url_get('groups'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        /**
         * GamiPress
         */
        [
          'menu-item-title'       => 'Badges',
          'menu-item-url'         => vikinger_site_url_get('badges'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Badges',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/badges'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Quests',
          'menu-item-url'         => vikinger_site_url_get('quests'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Quests',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/quests'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Ranks',
          'menu-item-url'         => vikinger_site_url_get('ranks'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Rank',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/ranks'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Credits',
          'menu-item-url'         => vikinger_site_url_get('credits'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Credits',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/credits'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        /**
         * bbPress
         */
        [
          'menu-item-title'       => 'Forums',
          'menu-item-url'         => vikinger_site_url_get('forums'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Forum Activity',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/forums'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Forum Replies',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/forums/replies'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Forum Engagements',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/forums/engagements'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Forum Favorites',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/forums/favorites'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        /**
         * More Links
         */
        [
          'menu-item-title'       => 'Blog',
          'menu-item-url'         => vikinger_site_url_get('blog'),
          'menu-item-attr-title'  => 'More Links',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Landing',
          'menu-item-url'         => vikinger_site_url_get(),
          'menu-item-attr-title'  => 'More Links',
          'menu-item-status'      => 'publish'
        ]
      ]
    ],
    [
      'name'        => 'Side Menu',
      'location'    => 'side_menu',
      'menu_items'  => [
        [
          'menu-item-title'   => 'Newsfeed',
          'menu-item-url'     => vikinger_site_url_get('activity'),
          'menu-item-classes' => 'newsfeed',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Members',
          'menu-item-url'     => vikinger_site_url_get('members'),
          'menu-item-classes' => 'members',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Groups',
          'menu-item-url'     => vikinger_site_url_get('groups'),
          'menu-item-classes' => 'group',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Badges',
          'menu-item-url'     => vikinger_site_url_get('badges'),
          'menu-item-classes' => 'badges',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Quests',
          'menu-item-url'     => vikinger_site_url_get('quests'),
          'menu-item-classes' => 'quests',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Ranks',
          'menu-item-url'     => vikinger_site_url_get('ranks'),
          'menu-item-classes' => 'ranks',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Credits',
          'menu-item-url'     => vikinger_site_url_get('credits'),
          'menu-item-classes' => 'credits',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Blog',
          'menu-item-url'     => vikinger_site_url_get('blog'),
          'menu-item-classes' => 'blog-posts',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Forums',
          'menu-item-url'     => vikinger_site_url_get('forums'),
          'menu-item-classes' => 'forums',
          'menu-item-status'  => 'publish'
        ],
        [
          'menu-item-title'   => 'Shop',
          'menu-item-url'     => vikinger_site_url_get('shop'),
          'menu-item-classes' => 'marketplace',
          'menu-item-status'  => 'publish'
        ]
      ]
    ],
    [
      'name'      => 'Footer Menu',
      'location'  => 'footer_menu',
      'menu_items'  => [
        /**
         * BuddyPress
         */
        [
          'menu-item-title'       => 'Profile Timeline',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile About',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/about'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Friends',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/friends'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Groups',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/groups'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Blog Posts',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/posts'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Photos',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/photos'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Activity',
          'menu-item-url'         => vikinger_site_url_get('activity'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Members',
          'menu-item-url'         => vikinger_site_url_get('members'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Groups',
          'menu-item-url'         => vikinger_site_url_get('groups'),
          'menu-item-attr-title'  => 'BuddyPress',
          'menu-item-status'      => 'publish'
        ],
        /**
         * GamiPress
         */
        [
          'menu-item-title'       => 'Badges',
          'menu-item-url'         => vikinger_site_url_get('badges'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Badges',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/badges'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Quests',
          'menu-item-url'         => vikinger_site_url_get('quests'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Quests',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/quests'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Ranks',
          'menu-item-url'         => vikinger_site_url_get('ranks'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Rank',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/ranks'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Credits',
          'menu-item-url'         => vikinger_site_url_get('credits'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Credits',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/credits'),
          'menu-item-attr-title'  => 'GamiPress',
          'menu-item-status'      => 'publish'
        ],
        /**
         * bbPress
         */
        [
          'menu-item-title'       => 'Forums',
          'menu-item-url'         => vikinger_site_url_get('forums'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Forum Activity',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/forums'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Forum Replies',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/forums/replies'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Forum Engagements',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/forums/engagements'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Profile Forum Favorites',
          'menu-item-url'         => vikinger_site_url_get('members/' . $logged_in_user->user_nicename . '/forums/favorites'),
          'menu-item-attr-title'  => 'bbPress',
          'menu-item-status'      => 'publish'
        ],
        /**
         * More Links
         */
        [
          'menu-item-title'       => 'Blog',
          'menu-item-url'         => vikinger_site_url_get('blog'),
          'menu-item-attr-title'  => 'More Links',
          'menu-item-status'      => 'publish'
        ],
        [
          'menu-item-title'       => 'Landing',
          'menu-item-url'         => vikinger_site_url_get(),
          'menu-item-attr-title'  => 'More Links',
          'menu-item-status'      => 'publish'
        ]
      ]
    ]
  ];

  $created_menu_ids = [];
  $created_menus = [];

  foreach ($menus as $menu) {
    // create menu
    $menu_id = vikinger_navigation_menu_update(0, ['menu-name' => $menu['name']]);

    // menu creation failed
    if (is_wp_error($menu_id)) {
      // if there are any created menus, remove them
      if (count($created_menu_ids) > 0) {
        // update theme mod with created navigation menu ids (comma separated)
        set_theme_mod('vikinger_demo_content_navigation_menus', implode(',', $created_menu_ids));

        // remove created menus
        vikinger_demo_content_menus_delete();
      }

      return false;
    }

    $created_menu_ids[] = $menu_id;

    $created_menu = $menu;
    $created_menu['id'] = $menu_id;
    $created_menus[] = $created_menu;

    // assign menu to the respective menu location
    vikinger_navigation_menu_location_update($menu['location'], $menu_id);
  }

  // update theme mod with created navigation menu ids (comma separated)
  set_theme_mod('vikinger_demo_content_navigation_menus', implode(',', $created_menu_ids));

  // create menu items for each navigation menu
  foreach ($created_menus as $created_menu) {
    foreach ($created_menu['menu_items'] as $menu_item_data) {
      $menu_item_children_data = [];

      if (array_key_exists('children', $menu_item_data)) {
        $menu_item_children_data = $menu_item_data['children'];
        unset($menu_item_data['children']);
      }

      $menu_item_id = vikinger_navigation_menu_item_update($created_menu['id'], 0, $menu_item_data);

      if (!is_wp_error($menu_item_id) && count($menu_item_children_data) > 0) {
        foreach ($menu_item_children_data as $menu_item_child_data) {
          $menu_item_child_data['menu-item-parent-id'] = $menu_item_id;

          $menu_item_child_id = vikinger_navigation_menu_item_update($created_menu['id'], 0, $menu_item_child_data);
        }
      }
    }
  }

  return true;
}

/**
 * Deletes demo content menus.
 * 
 * @return bool   True if successful, false otherwise.
 */
function vikinger_demo_content_menus_delete() {
  $created_menus_ids = get_theme_mod('vikinger_demo_content_navigation_menus', '');

  if ($created_menus_ids !== '') {
    $menu_ids = explode(',', $created_menus_ids);

    $deleted_menu_ids = [];

    foreach ($menu_ids as $menu_id) {
      $result = vikinger_navigation_menu_delete($menu_id);

      // if successfully deleted navigation menu, add as deleted
      if (!is_wp_error($result) && $result) {
        $deleted_menu_ids[] = (int) $menu_id;
      }
    }

    // remove deleted menu ids from the navigation menus theme mod entry
    foreach ($deleted_menu_ids as $deleted_menu_id) {
      vikinger_demo_content_theme_mod_entry_delete('vikinger_demo_content_navigation_menus', $deleted_menu_id);
    }

    return count($menu_ids) === count($deleted_menu_ids);
  }

  return true;
}

/**
 * Creates a new page or update an existing one.
 * 
 * @param array $args {
 *   @type string $post_title       Title of the page.
 *   @type string $post_content     Content of the page.
 *   @type string $page_template    Template to assign the page (i.e. page_points.php, page_badges.php, page_quests.php, page_ranks.php).
 * }
 * @return int/WP_Error Page ID on success, 0 or WP_Error object on failure.
 */
function vikinger_page_update($args) {
  $defaults = [
    'post_content'  => '',
    'post_type'     => 'page'
  ];

  $args = array_merge($defaults, $args);

  return wp_insert_post($args);
}

/**
 * Deletes a page.
 * 
 * @param int $page_id    ID of the page to delete.
 * @return WP_Post/false/null Page data on sucsess, false or null on failure.
 */
function vikinger_page_delete($page_id) {
  return wp_delete_post($page_id, true);
}

/**
 * Creates demo content pages.
 * 
 * @param array   $pages        Pages to create.
 * @param string  $theme_mod    Theme mod to use for storing created pages ids.
 * @return bool   True if successful, false otherwise.
 */
function vikinger_demo_content_pages_create($pages, $theme_mod) {
  // delete demo content pages if they exist
  vikinger_demo_content_pages_delete($theme_mod);

  $created_pages_ids = [];

  foreach ($pages as $page) {
    $page_id = vikinger_page_update($page);

    if (is_wp_error($page_id) || $page_id === 0) {
      // if there are any created pages, remove them
      if (count($created_pages_ids) > 0) {
        // update theme mod with created page ids (comma separated)
        set_theme_mod($theme_mod, implode(',', $created_pages_ids));

        // remove created pages
        vikinger_demo_content_pages_delete($theme_mod);
      }

      return false;
    }

    $created_pages_ids[] = $page_id;
  }

  // update theme mod with created page ids (comma separated)
  set_theme_mod($theme_mod, implode(',', $created_pages_ids));

  return true;
}

/**
 * Deletes demo content pages.
 * 
 * @param string  $theme_mod    Theme mod to use for getting ids of pages to delete.
 * @return bool   True if successful, false otherwise.
 */
function vikinger_demo_content_pages_delete($theme_mod) {
  $created_pages_ids = get_theme_mod($theme_mod, '');

  if ($created_pages_ids !== '') {
    $page_ids = explode(',', $created_pages_ids);

    $deleted_pages_ids = [];

    foreach ($page_ids as $page_id) {
      $result = vikinger_page_delete($page_id);

      // if successfully deleted page, add as deleted
      if (!is_null($result) && $result !== false) {
        $deleted_pages_ids[] = (int) $page_id;
      }
    }

    // remove deleted menu ids from the pages theme mod entry
    foreach ($deleted_pages_ids as $deleted_page_id) {
      vikinger_demo_content_theme_mod_entry_delete($theme_mod, $deleted_page_id);
    }

    return count($page_ids) === count($deleted_pages_ids);
  }

  return true;
}

/**
 * Creates demo content base pages.
 */
function vikinger_demo_content_base_pages_create() {
  $pages = [
    [
      'post_title'    => 'Blog',
      'post_status'   => 'publish'
    ]
  ];

  return vikinger_demo_content_pages_create($pages, 'vikinger_demo_content_base_pages');
}

/**
 * Deletes demo content base pages.
 */
function vikinger_demo_content_base_pages_delete() {
  return vikinger_demo_content_pages_delete('vikinger_demo_content_base_pages');
}

/**
 * Creates demo content Elementor pages.
 */
function vikinger_demo_content_elementor_pages_create() {
  $pages = [
    [
      'post_title'    => 'Landing',
      'post_status'   => 'publish'
    ]
  ];

  return vikinger_demo_content_pages_create($pages, 'vikinger_demo_content_elementor_pages');
}

/**
 * Deletes demo content Elementor pages.
 */
function vikinger_demo_content_elementor_pages_delete() {
  return vikinger_demo_content_pages_delete('vikinger_demo_content_elementor_pages');
}

/**
 * Creates demo content GamiPress pages.
 */
function vikinger_demo_content_gamipress_pages_create() {
  $pages = [
    [
      'post_title'    => 'Badges',
      'page_template' => 'page_badges.php',
      'post_status'   => 'publish'
    ],
    [
      'post_title'    => 'Quests',
      'page_template' => 'page_quests.php',
      'post_status'   => 'publish'
    ],
    [
      'post_title'    => 'Credits',
      'page_template' => 'page_points.php',
      'post_status'   => 'publish'
    ],
    [
      'post_title'    => 'Ranks',
      'page_template' => 'page_ranks.php',
      'post_status'   => 'publish'
    ]
  ];

  return vikinger_demo_content_pages_create($pages, 'vikinger_demo_content_gamipress_pages');
}

/**
 * Deletes demo content GamiPress pages.
 */
function vikinger_demo_content_gamipress_pages_delete() {
  return vikinger_demo_content_pages_delete('vikinger_demo_content_gamipress_pages');
}

/**
 * Creates BuddyPress xprofile field group.
 * 
 * @param array $args {
 *   @type string $name       Name of the xprofile field group.
 * }
 * @return int|bool ID of the created field group if successful, false otherwise.
 */
function vikinger_buddypress_xprofile_field_group_create($args) {
  return xprofile_insert_field_group($args);
}

/**
 * Deletes BuddyPress xprofile field group.
 * 
 * @param int $field_group_id     ID of the xprofile field group to delete.
 * @return bool True if successful, false otherwise.
 */
function vikinger_buddypress_xprofile_field_group_delete($field_group_id) {
  return xprofile_delete_field_group($field_group_id);
}

/**
 * Creates or updates BuddyPress xprofile field.
 * 
 * @param array $args {
 *   @type int    $field_group_id    ID of the associated xprofile field group.
 *   @type string $name              Name of the field.
 *   @type string $type              Field type. One of: textbox, textarea, url, datebox.
 * }
 * @return int|bool ID of the created field if successful, false otherwise.
 */
function vikinger_buddypress_xprofile_field_update($args) {
  return xprofile_insert_field($args);
}

/**
 * Creates demo content BuddyPress xprofile field groups.
 * 
 * @return bool True if successful, false otherwise.
 */
function vikinger_demo_content_buddypress_xprofile_field_groups_create() {
  // if buddypress is not installed and activated, return
  if (!vikinger_plugin_is_active('buddypress')) {
    return false;
  }

  // delete demo content BuddyPress xprofile field groups if they exist
  vikinger_demo_content_buddypress_xprofile_field_groups_delete();

  $groups = [
    [
      'name'      => 'Profile_Bio',
      'fields'    => [
        [
          'name'  => 'From',
          'type'  => 'textbox'
        ],
        [
          'name'  => 'Web',
          'type'  => 'url'
        ],
        [
          'name'  => 'About',
          'type'  => 'textarea'
        ]
      ]
    ],
    [
      'name'      => 'Profile_Personal',
      'fields'    => [
        [
          'name'  => 'Email',
          'type'  => 'textbox'
        ],
        [
          'name'  => 'Birthday',
          'type'  => 'datebox'
        ],
        [
          'name'  => 'Occupation',
          'type'  => 'textbox'
        ],
        [
          'name'  => 'Birthplace',
          'type'  => 'textbox'
        ]
      ]
    ],
    [
      'name'      => 'Profile_Interests',
      'fields'    => [
        [
          'name'  => 'Favorite TV Shows',
          'type'  => 'textarea'
        ],
        [
          'name'  => 'Favorite Music Bands / Artists',
          'type'  => 'textarea'
        ],
        [
          'name'  => 'Favorite Movies',
          'type'  => 'textarea'
        ],
        [
          'name'  => 'Favorite Books',
          'type'  => 'textarea'
        ],
        [
          'name'  => 'Favorite Games',
          'type'  => 'textarea'
        ]
      ]
    ],
    [
      'name'      => 'Social_Links',
      'fields'    => [
        [
          'name'  => 'Facebook',
          'type'  => 'url'
        ],
        [
          'name'  => 'Twitter',
          'type'  => 'url'
        ],
        [
          'name'  => 'Instagram',
          'type'  => 'url'
        ],
        [
          'name'  => 'Twitch',
          'type'  => 'url'
        ],
        [
          'name'  => 'Youtube',
          'type'  => 'url'
        ],
        [
          'name'  => 'Patreon',
          'type'  => 'url'
        ],
        [
          'name'  => 'Discord',
          'type'  => 'url'
        ],
        [
          'name'  => 'ArtStation',
          'type'  => 'url'
        ]
      ]
    ]
  ];

  $created_field_group_ids = [];
  $created_field_groups = [];

  foreach ($groups as $group) {
    $field_group_id = vikinger_buddypress_xprofile_field_group_create($group);

    if (!$field_group_id) {
       // if there are any created field groups, remove them
       if (count($created_field_group_ids) > 0) {
        // update theme mod with created field group ids (comma separated)
        set_theme_mod('vikinger_demo_content_buddypress_xprofile_field_groups', implode(',', $created_field_group_ids));

        // remove created field groups
        vikinger_demo_content_buddypress_xprofile_field_groups_delete();
      }

      return false;
    }

    $created_field_group_ids[] = $field_group_id;

    $created_field_group = $group;
    $created_field_group['id'] = $field_group_id;
    $created_field_groups[] = $created_field_group;
  }

  // update theme mod with created field group ids (comma separated)
  set_theme_mod('vikinger_demo_content_buddypress_xprofile_field_groups', implode(',', $created_field_group_ids));

  // create xprofile fields for each xprofile field group
  foreach ($created_field_groups as $created_field_group) {
    // if group has fields, created them
    if (array_key_exists('fields', $created_field_group)) {
      foreach ($created_field_group['fields'] as $field) {
        $field['field_group_id'] = $created_field_group['id'];
        $field_id = vikinger_buddypress_xprofile_field_update($field);
      }
    }
  }

  return true;
}

/**
 * Deletes demo content buddypress xprofile field groups.
 * 
 * @return bool   True if successful, false otherwise.
 */
function vikinger_demo_content_buddypress_xprofile_field_groups_delete() {
  // if buddypress is not installed and activated, return
  if (!vikinger_plugin_is_active('buddypress')) {
    return false;
  }

  $created_field_group_ids = get_theme_mod('vikinger_demo_content_buddypress_xprofile_field_groups', '');

  if ($created_field_group_ids !== '') {
    $field_group_ids = explode(',', $created_field_group_ids);

    $deleted_field_group_ids = [];

    foreach ($field_group_ids as $field_group_id) {
      $result = vikinger_buddypress_xprofile_field_group_delete($field_group_id);

      // if successfully deleted page, add as deleted
      if (!is_null($result) && $result !== false) {
        $deleted_field_group_ids[] = (int) $field_group_id;
      }
    }

    // remove deleted menu ids from the pages theme mod entry
    foreach ($deleted_field_group_ids as $deleted_field_group_id) {
      vikinger_demo_content_theme_mod_entry_delete('vikinger_demo_content_buddypress_xprofile_field_groups', $deleted_field_group_id);
    }

    return count($field_group_ids) === count($deleted_field_group_ids);
  }

  return true;
}

?>