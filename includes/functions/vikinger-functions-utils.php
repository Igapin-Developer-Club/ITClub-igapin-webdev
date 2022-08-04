<?php
/**
 * Functions - Utils
 * 
 * @package Vikinger
 * 
 * @since 1.0.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_truncate_text')) {
  /**
   * Truncates text with given length and adds a line finisher
   * 
   * @param string  $text                 Text to truncate.
   * @param int     $word_limit           Maximum text length.
   * @param string  $more_text            Line finisher.
   * @return string $truncated_text       Truncated text.
   */
  function vikinger_truncate_text($text, $word_limit = 40, $more_text = '&hellip;') {
    $truncated_text = $text;

    if (strlen($text) > $word_limit) {
      $truncated_text = trim(substr($text, 0, $word_limit - 1));
      $truncated_text .= $more_text;
    }

    return $truncated_text;
  }
}

if (!function_exists('vikinger_join_text')) {
  /**
   * Replaces text white spaces with a separator
   * 
   * @param string  $text           Text to replace white spaces with a separator.
   * @param string  $separator      Optiona. Separator to use. Default: '-'
   */
  function vikinger_join_text($text, $separator = '-') {
    $joined_text = preg_replace('/\s+/', $separator, $text);

    return $joined_text;
  }
}

if (!function_exists('vikinger_menu_get_items')) {
  /**
   * Returns menu items
   * 
   * @param string $menu_location       Menu location.
   * @return array 
   */
  function vikinger_menu_get_items($menu_location, $args = []) {
    $menu_items = [
      'flat'      => [],
      'threaded'  => []
    ];

    $menu_id = false;

    if (!is_int($menu_location)) {
      $menu_locations = get_nav_menu_locations();

      if (array_key_exists($menu_location, $menu_locations)) {
        $menu_id = $menu_locations[$menu_location];
      }
    } else {
      $menu_id = $menu_location;
    }

    // if menu location exists, fill menu items
    if ($menu_id) {
      $nav_menu_object = wp_get_nav_menu_object($menu_id);
      $nav_items = wp_get_nav_menu_items($menu_id, $args);

      // get current page ID, or front page ID if current page is front page
      $current_post_id = get_queried_object_id();

      // if BuddyPress plugin is active and a BuddyPress page is front page, get page on front id
      if (vikinger_plugin_buddypress_is_active() && bp_is_component_front_page()) {
        $current_post_id = get_option('page_on_front');
      }

      // if user assigned a menu to this location
      if ($nav_items) {
        global $wp;

        $current_page_url = trailingslashit(home_url($wp->request));

        foreach ($nav_items as $nav_item) {
          $menu_icon = (count($nav_item->classes) > 0) && ($nav_item->classes[0] !== '') ? $nav_item->classes[0] : 'link';

          $menu_parent = (int) $nav_item->menu_item_parent;

          $menu_item_data = [
            'id'        => $nav_item->ID,
            'name'      => $nav_item->title,
            'link'      => $nav_item->url,
            'icon'      => $menu_icon,
            'active'    => $current_page_url === trailingslashit($nav_item->url),
            'parent_id' => $menu_parent,
            'parent'    => $nav_item->post_excerpt,
            'menu_name' => $nav_menu_object->name,
            'target'    => $nav_item->target,
            'children'  => []
          ];

          // add menu item to flat array
          $menu_items['flat'][] = $menu_item_data;

          // put menu in children on threaded array if there is a parent item
          if (($menu_parent !== 0)) {
            vikinger_menu_add_children($menu_item_data, $menu_items['threaded']);
          } else {
            $menu_items['threaded'][] = $menu_item_data;
          }
        }
      }
    }

    return $menu_items;
  }
}

if (!function_exists('vikinger_menu_add_children')) {
  /**
   * Recursively add children to menu items
   */
  function vikinger_menu_add_children($menu_item_child, &$menu_items) {
    for ($i = 0; $i < count($menu_items); $i++) {
      if ($menu_items[$i]['id'] === $menu_item_child['parent_id']) {
        $menu_items[$i]['children'][] = $menu_item_child;
        return;
      }

      // iterate over children if they exist
      if (count($menu_items[$i]['children']) > 0) {
        vikinger_menu_add_children($menu_item_child, $menu_items[$i]['children']);
      }
    }
  }
}

if (!function_exists('vikinger_menu_group_by_parent')) {
  /**
   * Groups menu items by parent
   */
  function vikinger_menu_group_by_parent($menu_items) {
    $grouped_menu_items = [];

    foreach ($menu_items as $menu_item) {
      if (!array_key_exists($menu_item['parent'], $grouped_menu_items)) {
        $grouped_menu_items[$menu_item['parent']] = [];
      }
      
      $grouped_menu_items[$menu_item['parent']][] = $menu_item;
    }

    return $grouped_menu_items;
  }
}

if (!function_exists('vikinger_get_random_items_from')) {
  /**
   * Get random items from an array
   * 
   * @param array $array      The array to get random items from
   * @param int   $max        The number of random items to get
   * @return array
   */
  function vikinger_get_random_items_from($array, $max = false) {
    $total_count = count($array);
    $show_max = $max ? $max : $total_count;
    $show_count = min($show_max, $total_count);

    $indexes_to_show = [];

    // get $show_count different random indexes to get random items from
    while (count($indexes_to_show) < $show_count) {
      $index = rand(0, $total_count - 1);

      // if index not already in array
      if (!in_array($index, $indexes_to_show)) {
        $indexes_to_show[] = $index;
      }
    }

    $random_items = [];

    foreach ($indexes_to_show as $index) {
      $random_items[] = $array[$index];
    }

    return $random_items;
  }
}

if (!function_exists('vikinger_wp_kses_admin_text_get_allowed_tags')) {
  /**
   * Returns wp_kses allowed tags for admin text
   * 
   * @return array $allowed_tags        HTML tags allowed
   */
  function vikinger_wp_kses_admin_text_get_allowed_tags() {
    $allowed_tags = [
      'a'       => [
        'href'    => [],
        'target'  => []
      ],
      'strong'  => [],
      'br'      => [],
      'span'    => [
        'class' => []
      ],
      'pre'     => []
    ];
    
    return $allowed_tags;
  }
}

if (!function_exists('vikinger_wp_kses_post_title_get_allowed_tags')) {
  /**
   * Returns wp_kses allowed tags for post title
   * 
   * @return array $allowed_tags        HTML tags allowed
   */
  function vikinger_wp_kses_post_title_get_allowed_tags() {
    $allowed_tags = [
      'strong'  => [],
      'em'      => [],
      'b'       => [],
      'sup'     => []
    ];
    
    return $allowed_tags;
  }
}

if (!function_exists('vikinger_wp_kses_post_excerpt_get_allowed_tags')) {
  /**
   * Returns wp_kses allowed tags for post excerpt
   * 
   * @return array $allowed_tags        HTML tags allowed
   */
  function vikinger_wp_kses_post_excerpt_get_allowed_tags() {
    $allowed_tags = [
      'strong'  => [],
      'em'      => [],
      'b'       => [],
      'sup'     => []
    ];
    
    return $allowed_tags;
  }
}

if (!function_exists('vikinger_reactions_insert_user_data')) {
  /**
   * Inserts user data into reactions
   * 
   * @param array   $reactions_data             Reactions data, each with an array of user ids
   * @return array  $reactions_data_with_users  Reactions data with user data inserted
   */
  function vikinger_reactions_insert_user_data($reactions_data) {
    $reactions_data_with_users = [];

    foreach ($reactions_data as $reaction_data) {
      $reaction_data_cp = (array) $reaction_data;
      $reaction_data_cp['users'] = [];

      foreach ($reaction_data->users as $user_id) {
        // add BuddyPress member data if plugin is active
        if (vikinger_plugin_buddypress_is_active()) {
          $reaction_data_cp['users'][] = vikinger_members_get_fallback($user_id);
        } else {
          $reaction_data_cp['users'][] = vikinger_user_get_data($user_id);
        }
      }

      $reactions_data_with_users[] = $reaction_data_cp;
    }

    return $reactions_data_with_users;
  }
}

if (!function_exists('vikinger_site_url_get')) {
  /**
   * Returns site url with appended path
   * 
   * @param string $path      Path to append. Optional.
   */
  function vikinger_site_url_get($path = '') {
    return get_site_url(null, $path);
  }
}

if (!function_exists('vikinger_backend_array_count_get')) {
  /**
   * Returns count for an array and specific path.
   * 
   * @since 1.9.1
   * 
   * @param array $items      Array to count items from.
   * @param array $path       Path to follow for counting items.
   * @param int   $count      Initial count, used for recursive count computation.
   * @return int  $count      Total items count for specified path.    
   */
  function vikinger_backend_array_count_get($items = [], $path = [], $count = 0) {
    if (count($path) > 0) {
      foreach ($items as $item) {
        if (array_key_exists($path[0], $item)) {
          // last level reached, count
          if (count($path) === 1) {
            $count += count($item[$path[0]]);
          } else {
            $count = vikinger_backend_array_count_get($item[$path[0]], array_slice($path, 1), $count);
          }
        }
      }
    }

    return $count;
  }
}

if (!function_exists('vikinger_backend_theme_hooks_data_get')) {
  /**
   * Returns theme hooks data.
   * 
   * @return array $hooks_data       Hooks data.
   */
  function vikinger_backend_theme_hooks_data_get() {
    $vikinger_functions_path = 'includes/functions/';

    $vikinger_buddypress_functions_path = $vikinger_functions_path . 'buddypress/';
    $vikinger_buddypress_member_functions_path = $vikinger_buddypress_functions_path . 'member/';
    $vikinger_buddypress_group_functions_path = $vikinger_buddypress_functions_path . 'group/';
    $vikinger_buddypress_activity_functions_path = $vikinger_buddypress_functions_path . 'activity/';
    $vikinger_buddypress_message_functions_path = $vikinger_buddypress_functions_path;
    $vikinger_buddypress_notification_functions_path = $vikinger_buddypress_functions_path;
    $vikinger_buddypress_stream_functions_path = $vikinger_functions_path;

    $vikinger_gamipress_functions_path = $vikinger_functions_path . 'gamipress/';

    $hooks_data = [
      [
        'title'       => esc_html__('Filters', 'vikinger'),
        'description' => esc_html__('Filters provide a way for functions to modify data and are meant to work in an isolated manner, they should never have side    effects such as affecting global variables and output. Filters expect to have something returned back to them.', 'vikinger'),
        'items'       => [
          [
            'title'       => esc_html__('WordPress', 'vikinger'),
            'description' => esc_html__('The filters listed below are not plugin specific and always available for use.', 'vikinger'),
            'items'       => [
              [
                'title'       => esc_html__('Blog', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the site blog.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_posts_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get posts.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get posts.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_posts_get_data',
                    'args'        => [
                      [
                        'name'        => '$post',
                        'type'        => 'array',
                        'description' => esc_html__('Post data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$post',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters post data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_posts_get_results',
                    'args'        => [
                      [
                        'name'        => '$posts',
                        'type'        => 'array',
                        'description' => esc_html__('Post results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$posts',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters post results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_posts_get_count_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get post count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get post count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_posts_get_sticky_posts_args',
                    'args'        => [
                      [
                        'name'        => '$sticky_post_args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get sticky posts.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$sticky_post_args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get sticky posts.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_posts_get_sticky_posts_results',
                    'args'        => [
                      [
                        'name'        => '$sticky_posts',
                        'type'        => 'array',
                        'description' => esc_html__('Sticky post results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$sticky_posts',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters sticky post results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_pages_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get pages.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get pages.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_pages_get_data',
                    'args'        => [
                      [
                        'name'        => '$page',
                        'type'        => 'array',
                        'description' => esc_html__('Page data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$page',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters page data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_pages_get_results',
                    'args'        => [
                      [
                        'name'        => '$pages',
                        'type'        => 'array',
                        'description' => esc_html__('Page results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$pages',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters page results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-blog.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ],
              [
                'title'       => esc_html__('Comments', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the site blog comments.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_comments_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get comments.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get comments.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-comment.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_comments_get_data',
                    'args'        => [
                      [
                        'name'        => '$com',
                        'type'        => 'array',
                        'description' => esc_html__('Comment data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$com',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters post data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-comment.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_comments_get_results',
                    'args'        => [
                      [
                        'name'        => '$comments',
                        'type'        => 'array',
                        'description' => esc_html__('Comment results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$comments',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters comment results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-comment.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ],
              [
                'title'       => esc_html__('User', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the site users.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_users_grid_type_default',
                    'args'        => [
                      [
                        'name'        => '$default_grid_type',
                        'type'        => 'string',
                        'description' => esc_html__('Default lists grid type. One of: "big", "small", "list".', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$default_grid_type',
                      'type'  => 'string'
                    ],
                    'description' => esc_html__('Filters user default lists grid type.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-user.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_users_sidemenu_status_default',
                    'args'        => [
                      [
                        'name'        => '$default_sidemenu_status',
                        'type'        => 'string',
                        'description' => esc_html__('Default sidemenu status. One of: "open", "closed".', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$default_sidemenu_status',
                      'type'  => 'string'
                    ],
                    'description' => esc_html__('Filters user default sidemenu status.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-user.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'title'       => esc_html__('BuddyPress', 'vikinger'),
            'description' => esc_html__('The filters listed below require the "BuddyPress" plugin to be installed and active as well as the respective component to be active in order to work.', 'vikinger'),
            'items'       => [
              [
                'title'       => esc_html__('Members', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the BuddyPress members component.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_members_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get members.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get members.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_get_data',
                    'args'        => [
                      [
                        'name'        => '$member_data',
                        'type'        => 'array',
                        'description' => esc_html__('Member data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$member_data',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters member data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_get_results',
                    'args'        => [
                      [
                        'name'        => '$members',
                        'type'        => 'array',
                        'description' => esc_html__('Member results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$members',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters member results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_get_count_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get member count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get member count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_get_post_count_activity_components',
                    'args'        => [
                      [
                        'name'        => '$activity_components',
                        'type'        => 'array',
                        'description' => esc_html__('Activity components used to compute members post count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activity_components',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters components that an activity has to belong to in order for it to count towards member post count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_get_post_count_activity_types',
                    'args'        => [
                      [
                        'name'        => '$activity_types',
                        'type'        => 'array',
                        'description' => esc_html__('Activity types used to compute members post count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activity_types',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters types that an activity has to belong to in order for it to count towards member post count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_get_comment_count_activity_components',
                    'args'        => [
                      [
                        'name'        => '$activity_components',
                        'type'        => 'array',
                        'description' => esc_html__('Activity components used to compute members comment count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activity_components',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters components that an activity has to belong to in order for it to count towards member comment count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_get_comment_count_activity_types',
                    'args'        => [
                      [
                        'name'        => '$activity_types',
                        'type'        => 'array',
                        'description' => esc_html__('Activity types used to compute members comment count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activity_types',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters types that an activity has to belong to in order for it to count towards member comment count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_profile_navigation_items',
                    'args'        => [
                      [
                        'name'        => '$nav_items',
                        'type'        => 'array',
                        'description' => esc_html__('Member profile navigation items.', 'vikinger')
                      ],
                      [
                        'name'        => '$member',
                        'type'        => 'array',
                        'description' => esc_html__('Member data.', 'vikinger')
                      ],
                      [
                        'name'        => '$activity_single',
                        'type'        => 'bool',
                        'description' => esc_html__('True if displaying a single activity in the feed, false otherwise.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$nav_items',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters member profile navigation items.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_profile_navigation_items_default_position',
                    'args'        => [
                      [
                        'name'        => '$default_position',
                        'type'        => 'int',
                        'description' => esc_html__('Navigation item default position.', 'vikinger')
                      ],
                      [
                        'name'        => '$slug',
                        'type'        => 'string',
                        'description' => esc_html__('Navigation item slug.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$default_position',
                      'type'  => 'int'
                    ],
                    'description' => esc_html__('Filters member profile navigation item default position.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_profile_navigation_subitems',
                    'args'        => [
                      [
                        'name'        => '$member_navigation_subitems',
                        'type'        => 'array',
                        'description' => esc_html__('Member profile navigation subitems.', 'vikinger')
                      ],
                      [
                        'name'        => '$member',
                        'type'        => 'array',
                        'description' => esc_html__('Member data.', 'vikinger')
                      ],
                      [
                        'name'        => '$slug',
                        'type'        => 'string',
                        'description' => esc_html__('Parent menu item slug.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$member_navigation_subitems',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters member profile navigation subitems.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_accounthub_navigation_sections',
                    'args'        => [
                      [
                        'name'        => '$menu_sections',
                        'type'        => 'array',
                        'description' => esc_html__('Member account hub navigation sections.', 'vikinger')
                      ],
                      [
                        'name'        => '$member',
                        'type'        => 'array',
                        'description' => esc_html__('Member data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$menu_sections',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters member account hub navigation sections.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_members_xprofile_valid_social_networks',
                    'args'        => [
                      [
                        'name'        => '$valid_social_networks',
                        'type'        => 'array',
                        'description' => esc_html__('Member xprofile valid social networks.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$valid_social_networks',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters member xprofile valid social networks, which are used to select respective SVG icons.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_member_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-member-global.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ],
              [
                'title'       => esc_html__('Groups', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the BuddyPress groups component.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_groups_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get groups.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get groups.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_get_data',
                    'args'        => [
                      [
                        'name'        => '$group_data',
                        'type'        => 'array',
                        'description' => esc_html__('Group data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$group_data',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters group data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_get_results',
                    'args'        => [
                      [
                        'name'        => '$groups',
                        'type'        => 'array',
                        'description' => esc_html__('Group results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$groups',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters group results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_get_count_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get group count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get group count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_get_members_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get group members.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get group members.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_get_members_results',
                    'args'        => [
                      [
                        'name'        => '$group_members',
                        'type'        => 'array',
                        'description' => esc_html__('Group member results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$group_members',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters group member results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_get_members_count_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get group member count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get group member count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_get_post_count_activity_components',
                    'args'        => [
                      [
                        'name'        => '$activity_components',
                        'type'        => 'array',
                        'description' => esc_html__('Activity components used to compute groups post count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activity_components',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters components that an activity has to belong to in order for it to count towards group post count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_get_post_count_activity_types',
                    'args'        => [
                      [
                        'name'        => '$activity_types',
                        'type'        => 'array',
                        'description' => esc_html__('Activity types used to compute groups post count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activity_types',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters types that an activity has to belong to in order for it to count towards group post count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_profile_navigation_items',
                    'args'        => [
                      [
                        'name'        => '$nav_items',
                        'type'        => 'array',
                        'description' => esc_html__('Group profile navigation items.', 'vikinger')
                      ],
                      [
                        'name'        => '$group',
                        'type'        => 'array',
                        'description' => esc_html__('Group data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$nav_items',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters group profile navigation items.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_groups_meta_valid_social_networks',
                    'args'        => [
                      [
                        'name'        => '$social_links_keys',
                        'type'        => 'array',
                        'description' => esc_html__('Group meta valid social networks.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$social_links_keys',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters group meta valid social networks, which are used to select respective SVG icons.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_group_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-group-global.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ],
              [
                'title'       => esc_html__('Activities', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the BuddyPress activities component.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_activities_get_args',
                    'args'        => [
                      [
                        'name'        => '$activities_args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get activities.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activities_args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get activities.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_activity_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-activity-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_activities_get_data',
                    'args'        => [
                      [
                        'name'        => '$activity_data',
                        'type'        => 'array',
                        'description' => esc_html__('Activity data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activity_data',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters activity data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_activity_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-activity-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_activities_get_results',
                    'args'        => [
                      [
                        'name'        => '$activities',
                        'type'        => 'array',
                        'description' => esc_html__('Activity results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$activities',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters activity results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_activity_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-activity-global.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_activities_get_count_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get activity count.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get activity count.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_activity_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-activity-global.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ],
              [
                'title'       => esc_html__('Messages', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the BuddyPress messages component.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_messages_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get messages.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get messages.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_message_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-message.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_messages_get_data',
                    'args'        => [
                      [
                        'name'        => '$message_data',
                        'type'        => 'array',
                        'description' => esc_html__('Message data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$message_data',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters message data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_message_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-message.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_messages_get_results',
                    'args'        => [
                      [
                        'name'        => '$message_results',
                        'type'        => 'array',
                        'description' => esc_html__('Message results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$message_results',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters message results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_message_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-message.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ],
              [
                'title'       => esc_html__('Notifications', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the BuddyPress notifications component.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_notifications_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get notifications.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get notifications.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_notification_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-notification.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_notifications_get_data',
                    'args'        => [
                      [
                        'name'        => '$notification',
                        'type'        => 'array',
                        'description' => esc_html__('Notification data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$notification',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters notification data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_notification_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-notification.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_notifications_get_results',
                    'args'        => [
                      [
                        'name'        => '$notifications',
                        'type'        => 'array',
                        'description' => esc_html__('Notification results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$notifications',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters notification results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_notification_functions_path,
                      'filename'  => 'vikinger-functions-buddypress-notification.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                ]
              ],
              [
                'title'       => esc_html__('Stream', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to the stream functionality.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_streams_twitch_embed_iframe_src',
                    'args'        => [
                      [
                        'name'        => '$iframe_src',
                        'type'        => 'string',
                        'description' => esc_html__('Stream embeds iframe source attribute.', 'vikinger')
                      ],
                      [
                        'name'        => '$username',
                        'type'        => 'string',
                        'description' => esc_html__('Streamer username.', 'vikinger')
                      ],
                      [
                        'name'        => '$stream_parent',
                        'type'        => 'string',
                        'description' => esc_html__('Stream embeds parent attribute.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$iframe_src',
                      'type'  => 'string'
                    ],
                    'description' => esc_html__('Filters stream embeds iframe source attribute.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_buddypress_stream_functions_path,
                      'filename'  => 'vikinger-functions-stream.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'title'       => esc_html__('Vikinger Media', 'vikinger'),
            'description' => esc_html__('The filters listed below require the "Vikinger Media" plugin to be installed and active in order to work.', 'vikinger'),
            'items'       => [
              [
                'title'       => esc_html__('File', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to file operations.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_file_default_allowed_extensions',
                    'args'        => [
                      [
                        'name'        => '$allowed_file_extensions',
                        'type'        => 'array',
                        'description' => esc_html__('Default allowed file extensions.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$allowed_file_extensions',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters default allowed file extensions.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-file.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_file_member_root_uploads_path',
                    'args'        => [
                      [
                        'name'        => '$path',
                        'type'        => 'string',
                        'description' => esc_html__('Member root uploads path.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$path',
                      'type'  => 'string'
                    ],
                    'description' => esc_html__('Filters member root uploads path.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-file.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_file_member_root_uploads_url',
                    'args'        => [
                      [
                        'name'        => '$url',
                        'type'        => 'string',
                        'description' => esc_html__('Member root uploads URL.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$url',
                      'type'  => 'string'
                    ],
                    'description' => esc_html__('Filters member root uploads URL.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-file.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_file_group_root_uploads_path',
                    'args'        => [
                      [
                        'name'        => '$path',
                        'type'        => 'string',
                        'description' => esc_html__('Group root uploads path.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$path',
                      'type'  => 'string'
                    ],
                    'description' => esc_html__('Filters group root uploads path.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-file.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_file_group_root_uploads_url',
                    'args'        => [
                      [
                        'name'        => '$url',
                        'type'        => 'string',
                        'description' => esc_html__('Group root uploads URL.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$url',
                      'type'  => 'string'
                    ],
                    'description' => esc_html__('Filters group root uploads URL.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-file.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'title'       => esc_html__('GamiPress', 'vikinger'),
            'description' => esc_html__('The filters listed below require the "GamiPress" plugin to be installed and active in order to work.', 'vikinger'),
            'items' => [
              [
                'title'       => esc_html__('Achievements', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to Gamipress achievements.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_achievements_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get achievements.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get achievements.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_gamipress_functions_path,
                      'filename'  => 'vikinger-functions-gamipress-achievement.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_achievements_get_data',
                    'args'        => [
                      [
                        'name'        => '$achievement_data',
                        'type'        => 'array',
                        'description' => esc_html__('Achievement data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$achievement_data',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters achievement data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_gamipress_functions_path,
                      'filename'  => 'vikinger-functions-gamipress-achievement.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_achievements_get_results',
                    'args'        => [
                      [
                        'name'        => '$achievements',
                        'type'        => 'array',
                        'description' => esc_html__('Achievement results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$achievements',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters achievement results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_gamipress_functions_path,
                      'filename'  => 'vikinger-functions-gamipress-achievement.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                ]
              ],
              [
                'title'       => esc_html__('Ranks', 'vikinger'),
                'description' => esc_html__('The filters listed below are related to Gamipress ranks.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_ranks_get_args',
                    'args'        => [
                      [
                        'name'        => '$args',
                        'type'        => 'array',
                        'description' => esc_html__('Arguments used to get ranks.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$args',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters arguments used to get ranks.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_gamipress_functions_path,
                      'filename'  => 'vikinger-functions-gamipress-rank.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_ranks_get_data',
                    'args'        => [
                      [
                        'name'        => '$rank_data',
                        'type'        => 'array',
                        'description' => esc_html__('Rank data.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$rank_data',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters rank data.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_gamipress_functions_path,
                      'filename'  => 'vikinger-functions-gamipress-rank.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_ranks_get_results',
                    'args'        => [
                      [
                        'name'        => '$ranks',
                        'type'        => 'array',
                        'description' => esc_html__('Rank results.', 'vikinger')
                      ]
                    ],
                    'returns'     => [
                      'name'  => '$ranks',
                      'type'  => 'array'
                    ],
                    'description' => esc_html__('Filters rank results.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_gamipress_functions_path,
                      'filename'  => 'vikinger-functions-gamipress-rank.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                ]
              ]
            ]
          ]
        ]
      ],
      [
        'title'       => esc_html__('Actions', 'vikinger'),
        'description' => esc_html__('Actions provide a way for running a function at a specific point, they do not return anything back to the calling hook.', 'vikinger'),
        'items'       => [
          [
            'title'       => esc_html__('Vikinger Media', 'vikinger'),
            'description' => esc_html__('The actions listed below require the "Vikinger Media" plugin to be installed and active in order to work.', 'vikinger'),
            'items'       => [
              [
                'title'       => esc_html__('File', 'vikinger'),
                'description' => esc_html__('The actions listed below are related to file operations.', 'vikinger'),
                'items'       => [
                  [
                    'name'        => 'vikinger_file_uploaded',
                    'args'        => [
                      [
                        'name'        => '$uploaded_file_path',
                        'type'        => 'string',
                        'description' => esc_html__('Path of the file that was uploaded.', 'vikinger')
                      ]
                    ],
                    'description' => esc_html__('Executed when a file is uploaded to the server.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-file.php',
                      'since'     => '1.9.1'
                    ]
                  ],
                  [
                    'name'        => 'vikinger_file_deleted',
                    'args'        => [
                      [
                        'name'        => '$filepath',
                        'type'        => 'string',
                        'description' => esc_html__('Path of the file that was deleted.', 'vikinger')
                      ]
                    ],
                    'description' => esc_html__('Executed when a file is deleted from the server.', 'vikinger'),
                    'source'      => [
                      'filepath'  => $vikinger_functions_path,
                      'filename'  => 'vikinger-functions-file.php',
                      'since'     => '1.9.1'
                    ]
                  ]
                ]
              ]
            ]
          ]
        ]
      ]
    ];

    return $hooks_data;
  }
}

?>