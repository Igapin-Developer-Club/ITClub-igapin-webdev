<?php
/**
 * Functions - BuddyPress - Group - Global
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_get_default_group_avatar_url')) {
  /**
   * Returns default group avatar URL.
   * 
   * @return string $groups_default_avatar_url
   */
  function vikinger_get_default_group_avatar_url() {
    $groups_default_avatar_id = get_theme_mod('vikinger_groups_setting_default_avatar', false);

    if ($groups_default_avatar_id) {
      $groups_default_avatar_url = wp_get_attachment_image_src($groups_default_avatar_id , 'full')[0];
    } else {
      $groups_default_avatar_url = VIKINGER_URL . '/img/avatar/default-avatar.jpg';
    }
    
    return $groups_default_avatar_url;
  }
}

if (!function_exists('vikinger_get_default_group_cover_url')) {
  /**
   * Returns default group cover URL.
   * 
   * @return string $groups_default_cover_url
   */
  function vikinger_get_default_group_cover_url() {
    $groups_default_cover_id = get_theme_mod('vikinger_groups_setting_default_cover', false);

    if ($groups_default_cover_id) {
      $groups_default_cover_url = wp_get_attachment_image_src($groups_default_cover_id , 'full')[0];
    } else {
      $groups_default_cover_url = VIKINGER_URL . '/img/cover/default-cover.png';
    }

    return $groups_default_cover_url;
  }
}

if (!function_exists('vikinger_group_avatar_url_get')) {
  /**
   * Returns group avatar URL.
   * 
   * @param int $group_id     ID of the group to get cover url of.
   * @return string
   */
  function vikinger_group_avatar_url_get($group_id) {
    $avatar_image_url = bp_core_fetch_avatar([
      'item_id' => $group_id,
      'html'    => false,
      'object'  => 'group',
      'type'    => 'full'
    ]);

    // load default avatar image url if user didn't upload any yet
    if (!$avatar_image_url) {
      $avatar_image_url = vikinger_get_default_group_avatar_url();
    }

    return $avatar_image_url;
  }
}

if (!function_exists('vikinger_group_cover_url_get')) {
  /**
   * Returns group cover URL.
   * 
   * @param int $group_id     ID of the group to get cover url of.
   * @return string
   */
  function vikinger_group_cover_url_get($group_id) {
    $cover_image_url = bp_attachments_get_attachment('url', [
      'object_dir'  => 'groups',
      'item_id'     => $group_id
    ]);

    // load default cover image url if user didn't upload any yet
    if (!$cover_image_url) {
      $cover_image_url = vikinger_get_default_group_cover_url();
    }

    return $cover_image_url;
  }
}

if (!function_exists('vikinger_groups_get')) {
  /**
   * Returns filtered groups.
   * 
   * @param array   $args     Filter for the groups query.
   * @return array  $groups   Filtered groups.
   */
  function vikinger_groups_get($args = []) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/groups');

    $defaults = [
      // extras include: total_member_count, last_activity and last_activity_diff
      'populate_extras' => true
    ];

    $args = array_merge($defaults, $args);

    $data_scope = 'group-status';

    if (array_key_exists('data_scope', $args)) {
      $data_scope = $args['data_scope'];
      unset($args['data_scope']);
    }

    /**
     * Filter group args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_groups_get_args', $args);

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $bp_groups = rest_do_request($request);

    $groups = [];

    // if request was succesfull
    if ($bp_groups->status === 200) {
      foreach ($bp_groups->data as $bp_group) {
        $groups[] = vikinger_group_get_data($bp_group, $data_scope);
      }
    }

    /**
     * Filter group results.
     * 
     * @since 1.9.1
     * 
     * @param array $groups
     */
    $groups = apply_filters('vikinger_groups_get_results', $groups);

    return $groups;
  }
}

if (!function_exists('vikinger_group_get_group_status_data')) {
  /**
   * Returns group-status scope group data.
   * 
   * @param array   $bp_group              BP group data.
   * @return array  $group_status_data     group-status scope group data.
   */
  function vikinger_group_get_group_status_data($bp_group) {
    $group_status_data = [
      'id'                  => $bp_group['id'],
      'name'                => html_entity_decode($bp_group['name']),
      'description'         => $bp_group['description']['raw'],
      'slug'                => strtolower(vikinger_join_text(html_entity_decode($bp_group['name']))),
      'link'                => $bp_group['link'],
      'status'              => $bp_group['status'],
      'total_member_count'  => $bp_group['total_member_count'],
      'creator_id'          => $bp_group['creator_id'],
      'date_created'        => $bp_group['date_created'],
      'enable_forum'        => $bp_group['enable_forum'],
      'avatar_url'          => $bp_group['avatar_urls']['full']
    ];

    return $group_status_data;
  }
}

if (!function_exists('vikinger_group_get_group_preview_data')) {
  /**
   * Returns group-preview scope group data.
   * 
   * @param array   $bp_group              BP group data.
   * @return array  $group_preview_data     group-preview scope group data.
   */
  function vikinger_group_get_group_preview_data($bp_group) {
    $members_args = [
      'group_id'        => $bp_group['id'],
      'exclude_admins'  => false,
      'exclude_banned'  => true,
      'per_page'        => 6
    ];

    $group_preview_data = [
      'cover_image_url' => vikinger_group_cover_url_get($bp_group['id']),
      'post_count'      => bp_is_active('activity') ? vikinger_get_groups_post_count($bp_group['id']) : 0,
      'members_link'    => $bp_group['link'] . 'members',
      'media_link'      => $bp_group['link'] . 'photos',
      'members'         => vikinger_groups_get_members($members_args)
    ];

    $group_status_data = vikinger_group_get_group_status_data($bp_group);

    // add group status data
    $group_preview_data = array_merge($group_status_data, $group_preview_data);

    return $group_preview_data;
  }
}

if (!function_exists('vikinger_group_get_group_activity_data')) {
  /**
   * Returns group-activity scope group data.
   * 
   * @param array   $bp_group              BP group data.
   * @return array  $group_activity_data   group-activity scope group data.
   */
  function vikinger_group_get_group_activity_data($bp_group) {
    $group_activity_data = [
      'cover_image_url' => vikinger_group_cover_url_get($bp_group['id']),
      'members_link'    => $bp_group['link'] . 'members',
      'media_link'      => $bp_group['link'] . 'photos'
    ];

    $group_status_data = vikinger_group_get_group_status_data($bp_group);

    // add group status data
    $group_activity_data = array_merge($group_status_data, $group_activity_data);

    return $group_activity_data;
  }
}

if (!function_exists('vikinger_group_get_group_invitation_data')) {
  /**
   * Returns group-invitation scope group data.
   * 
   * @param array   $bp_group            BP group data.
   * @return array  $group_invitation_data     group-invitation scope group data.
   */
  function vikinger_group_get_group_invitation_data($bp_group) {
    $group_invitation_data = [
      'cover_image_url' => vikinger_group_cover_url_get($bp_group['id'])
    ];

    $group_status_data = vikinger_group_get_group_status_data($bp_group);

    // add group status data
    $group_invitation_data = array_merge($group_status_data, $group_invitation_data);

    return $group_invitation_data;
  }
}

if (!function_exists('vikinger_group_get_group_open_data')) {
  /**
   * Returns group-open scope group data.
   * 
   * @param array   $bp_group            BP group data.
   * @return array  $group_open_data     group-open scope group data.
   */
  function vikinger_group_get_group_open_data($bp_group) {
    $group_open_data = [
      'cover_image_url' => vikinger_group_cover_url_get($bp_group['id']),
      'post_count'      => bp_is_active('activity') ? vikinger_get_groups_post_count($bp_group['id']) : 0
    ];

    $group_status_data = vikinger_group_get_group_status_data($bp_group);

    // add group status data
    $group_open_data = array_merge($group_status_data, $group_open_data);

    return $group_open_data;
  }
}

if (!function_exists('vikinger_group_get_group_manage_data')) {
  /**
   * Returns group-manage scope group data.
   * 
   * @param array   $bp_group              BP group data.
   * @return array  $group_manage_data     group-manage scope group data.
   */
  function vikinger_group_get_group_manage_data($bp_group) {
    $members_args = [
      'group_id'        => $bp_group['id'],
      'exclude_admins'  => true,
      'exclude_banned'  => true,
      'per_page'        => 100
    ];

    $group_meta_args = [
      'group_id'  => $bp_group['id']
    ];

    $group_manage_data = [
      'cover_image_url' => vikinger_group_cover_url_get($bp_group['id']),
      'members'         => vikinger_groups_get_members($members_args),
      'banned'          => vikinger_get_group_banned_members($bp_group['id']),
      'admins'          => vikinger_get_group_admins($bp_group['id']),
      'mods'            => vikinger_get_group_mods($bp_group['id']),
      'meta'            => vikinger_group_get_meta($group_meta_args)
    ];

    $group_status_data = vikinger_group_get_group_status_data($bp_group);

    // add group status data
    $group_manage_data = array_merge($group_status_data, $group_manage_data);

    return $group_manage_data;
  }
}

if (!function_exists('vikinger_group_get_data')) {
  /**
   * Returns scoped group data.
   * 
   * @param array   $bp_group     BP group data.
   * @param string  $data_scope   Scope of the group data to return. 
   * @return array  $group_data   Group data.
   */
  function vikinger_group_get_data($bp_group, $data_scope = 'group-status') {
    $group_data = [];

    if ($data_scope === 'group-status') {
      $group_data = vikinger_group_get_group_status_data($bp_group);
    }

    if ($data_scope === 'group-preview') {
      $group_data = vikinger_group_get_group_preview_data($bp_group);
    }

    if ($data_scope === 'group-activity') {
      $group_data = vikinger_group_get_group_activity_data($bp_group);
    }

    if ($data_scope === 'group-invitation') {
      $group_data = vikinger_group_get_group_invitation_data($bp_group);
    }

    if ($data_scope === 'group-open') {
      $group_data = vikinger_group_get_group_open_data($bp_group);
    }

    if ($data_scope === 'group-manage') {
      $group_data = vikinger_group_get_group_manage_data($bp_group);
    }

    /**
     * Filter group data.
     * 
     * @since 1.9.1
     * 
     * @param array $group_data
     */
    $group_data = apply_filters('vikinger_groups_get_data', $group_data);

    return $group_data;
  }
}

if (!function_exists('vikinger_get_group_banned_members')) {
  /**
   * Get group banned members.
   * 
   * @param int $group_id     ID of the group to return banned members from
   * @return array
   */
  function vikinger_get_group_banned_members($group_id) {
    $banned_members_args = [
      'group_id'        => $group_id,
      'exclude_admins'  => false,
      'exclude_banned'  => false
    ];

    $group_members = vikinger_groups_get_members($banned_members_args);

    $banned_members = [];

    foreach ($group_members as $group_member) {
      if ($group_member['is_banned']) {
        $banned_members[] = $group_member;
      }
    }

    return $banned_members;
  }
}

if (!function_exists('vikinger_get_group_admins')) {
  /**
   * Get group admins.
   * 
   * @param int $group_id     ID of the group to return admins from
   * @return array
   */
  function vikinger_get_group_admins($group_id) {
    $bp_group_admins = groups_get_group_admins($group_id);

    $group_admins = [];

    foreach ($bp_group_admins as $bp_group_admin) {
      $group_admin = vikinger_members_get(['include' => [$bp_group_admin->user_id]])[0];
      $group_admin['date_modified'] = $bp_group_admin->date_modified;
      $group_admins[] = $group_admin;
    }

    return $group_admins;
  }
}

if (!function_exists('vikinger_get_group_mods')) {
  /**
   * Get group mods.
   * 
   * @param int $group_id     ID of the group to return mods from
   * @return array
   */
  function vikinger_get_group_mods($group_id) {
    $bp_group_mods = groups_get_group_mods($group_id);

    $group_mods = [];

    foreach ($bp_group_mods as $bp_group_mod) {
      $group_mod = vikinger_members_get(['include' => [$bp_group_mod->user_id]])[0];
      $group_mod['date_modified'] = $bp_group_mod->date_modified;
      $group_mods[] = $group_mod;
    }

    return $group_mods;
  }
}

if (!function_exists('vikinger_groups_get_members')) {
  /**
   * Returns filtered group members.
   * 
   * @param array   $args             Group filters.
   * @return array  $group_members    Filtered group members.
   */
  function vikinger_groups_get_members($args = []) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/groups/' . $args['group_id'] . '/members');

    $data_scope = 'user-status';

    if (array_key_exists('data_scope', $args)) {
      $data_scope = $args['data_scope'];
      unset($args['data_scope']);
    }

    /**
     * Filter group members args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_groups_get_members_args', $args);

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $bp_group_members = rest_do_request($request);

    $group_members = [];

    // if request was succesfull
    if ($bp_group_members->status === 200) {
      foreach ($bp_group_members->data as $bp_group_member) {
        $group_member_data = [
          'is_admin'          => (boolean) $bp_group_member['is_admin'],
          'is_mod'            => (boolean) $bp_group_member['is_mod'],
          'is_banned'         => (boolean) $bp_group_member['is_banned'],
          'is_confirmed'      => (boolean) $bp_group_member['is_confirmed']
        ];
    
        $group_member_data = array_merge($group_member_data, vikinger_member_get_data($bp_group_member, $data_scope));
        $group_members[] = $group_member_data;
      }
    }

    /**
     * Filter group members results.
     * 
     * @since 1.9.1
     * 
     * @param array $group_members
     */
    $group_members = apply_filters('vikinger_groups_get_members_results', $group_members);

    return $group_members;
  }
}

if (!function_exists('vikinger_groups_get_count')) {
  /**
   * Returns filtered group count.
   * 
   * @param array $args             Group filters.
   * @return int  $groups_count     Filtered group count.
   */
  function vikinger_groups_get_count($args = []) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/groups');

    $defaults = [
      'per_page' => 1
    ];

    $args = array_merge($defaults, $args);

    /**
     * Filter group count args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_groups_get_count_args', $args);

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $bp_groups = rest_do_request($request);

    $groups_count = 0;

    // if request was succesfull
    if ($bp_groups->status === 200) {
      if (array_key_exists('X-WP-Total', $bp_groups->headers)) {
        $groups_count = $bp_groups->headers['X-WP-Total'];
      }
    }

    return $groups_count;
  }
}

if (!function_exists('vikinger_groups_get_members_count')) {
  /**
   * Returns filtered group members count.
   * 
   * @param array $args                     Group filters.
   * @return int  $group_members_count      Filtered group members count.
   */
  function vikinger_groups_get_members_count($args) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/groups/' . $args['group_id'] . '/members');

    $defaults = [
      'per_page' => 1
    ];

    $args = array_merge($defaults, $args);

    /**
     * Filter group members count args.
     * 
     * @since 1.9.1
     * 
     * @param array $args
     */
    $args = apply_filters('vikinger_groups_get_members_count_args', $args);

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $bp_group_members = rest_do_request($request);

    $group_members_count = 0;

    // if request was succesfull
    if ($bp_group_members->status === 200) {
      if (array_key_exists('X-WP-Total', $bp_group_members->headers)) {
        $group_members_count = $bp_group_members->headers['X-WP-Total'];
      }
    }

    return $group_members_count;
  }
}

if (!function_exists('vikinger_get_groups_post_count')) {
  /**
   * Returns group post count.
   * 
   * @param array $group_id       ID of the group to get post count of.
   * @return int  $post_count     Group post count.
   */
  function vikinger_get_groups_post_count($group_id) {
    global $wpdb;

    $activity_components = [
      'groups'
    ];

    /**
     * Filter groups post count activity components.
     * 
     * @since 1.9.1
     * 
     * @param array $activity_components
     */
    $activity_components = apply_filters('vikinger_groups_get_post_count_activity_components', $activity_components);

    $activity_types = [
      'activity_update',
      'activity_media_update',
      'activity_media_upload',
      'activity_video_update',
      'activity_video_upload',
      'activity_share',
      'post_share',
      'created_group',
      'joined_group'
    ];

    /**
     * Filter groups post count activity types.
     * 
     * @since 1.9.1
     * 
     * @param array $activity_types
     */
    $activity_types = apply_filters('vikinger_groups_get_post_count_activity_types', $activity_types);

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_activity";
    $table = $prefix . $table_name;

    $sql = "SELECT COUNT(id) AS post_count FROM $table
            WHERE component IN ('" . implode('\', \'', $activity_components) . "')
            AND item_id = %d
            AND type IN('" . implode('\', \'', $activity_types) . "')";

    $result = $wpdb->get_row($wpdb->prepare($sql, [$group_id]));

    $post_count = 0;

    if (!is_null($result)) {
      $post_count = $result->post_count;
    }

    return $post_count;
  }
}

if (!function_exists('vikinger_get_user_groups')) {
  /**
   * Get groups a user is a member of including membership status data.
   * 
   * @param int     $user_id        ID of the user to retrieve groups from.
   * @return array  $user_groups    Filtered user groups.
   */
  function vikinger_get_user_groups($user_id, $data_scope = 'user-groups-status') {
    $bp = buddypress();

    $groups_table = $bp->groups->table_name;
    $groups_members_table = $bp->groups->table_name_members;
    
    global $wpdb;

    $sql = "SELECT  $groups_table.id, $groups_table.name, $groups_table.slug, $groups_table.status, $groups_table.creator_id, $groups_members_table.is_admin,
                    $groups_members_table.is_mod, $groups_members_table.is_banned, $groups_members_table.is_confirmed,
                    $groups_members_table.invite_sent
            FROM $groups_table
            INNER JOIN $groups_members_table
            ON $groups_table.id = $groups_members_table.group_id
            WHERE $groups_members_table.user_id = %d AND $groups_members_table.is_confirmed = 1";

    $results = $wpdb->get_results($wpdb->prepare($sql, [$user_id]));

    $user_groups = [];

    if (!is_null($results)) {
      foreach ($results as $user_group) {
        $user_group_data = [
          'id'            => (int) $user_group->id,
          'name'          => $user_group->name,
          'slug'          => $user_group->slug,
          'status'        => $user_group->status,
          'creator_id'    => (int) $user_group->creator_id,
          'is_admin'      => $user_group->is_admin == 1,
          'is_mod'        => $user_group->is_mod == 1,
          'is_banned'     => $user_group->is_banned == 1,
          'is_confirmed'  => $user_group->is_confirmed == 1,
          'invite_sent'   => $user_group->invite_sent == 1
        ];

        if ($data_scope === 'user-groups-preview') {
          $user_group_data['cover_image_url'] = vikinger_group_cover_url_get($user_group_data['id']);

          $fetch_avatar_args = [
            'item_id' => $user_group_data['id'],
            'object'  => 'group',
            'type'    => 'full',
            'html'    => false
          ];

          $user_group_data['avatar_url'] = bp_core_fetch_avatar($fetch_avatar_args);
          $user_group_data['link'] = trailingslashit(bp_get_groups_directory_permalink() . $user_group_data['slug'] . '/');
        }

        if ($data_scope === 'user-groups-members') {
          $members_args = [
            'group_id'        => $user_group_data['id'],
            'exclude_admins'  => false,
            'exclude_banned'  => true,
            'per_page'        => 100
          ];

          $user_group_data['members'] = vikinger_groups_get_members($members_args);
          $user_group_data['banned'] = vikinger_get_group_banned_members($user_group_data['id']);
        }

        $user_groups[] = $user_group_data;
      }
    }

    return $user_groups;
  }
}

if (!function_exists('vikinger_groups_meta_get_social_links')) {
  /**
   * Returns groups meta social links data
   * 
   * @param array   $group_meta     Group meta data.
   * @return array  $social_links   Formatted social links data.
   */
  function vikinger_groups_meta_get_social_links($group_meta) {
    $social_links = [];

    $social_links_keys = [
      'facebook',
      'twitter',
      'instagram',
      'youtube',
      'twitch',
      'discord',
      'patreon',
      'linkedin',
      'pinterest',
      'tiktok',
      'github',
      'reddit',
      'dribbble',
      'unsplash',
      'flickr'
    ];

    /**
     * Filter groups meta valid social networks.
     * 
     * @since 1.9.1
     * 
     * @param array $social_links_keys
     */
    $social_links_keys = apply_filters('vikinger_groups_meta_valid_social_networks', $social_links_keys);

    foreach ($social_links_keys as $social_link_key) {
      // if meta data exists for this social link, save it
      if (array_key_exists(ucfirst($social_link_key), $group_meta) && $group_meta[ucfirst($social_link_key)][0] !== '') {
        $social_links[] = [
          'name'  => $social_link_key,
          'link'  => $group_meta[ucfirst($social_link_key)][0]
        ];
      }
    }

    return $social_links;
  }
}

if (!function_exists('vikinger_groups_get_navigation_items')) {
  /**
   * Returns group navigation items
   * 
   * @param array   $group           Group data
   * @return array
   */
  function vikinger_groups_get_navigation_items($group) {
    $nav_items = [];

    $menu_items = [
      [
        'name'    => __('Timeline', 'vikinger'),
        'icon'    => 'timeline',
        'slug'    => 'activity',
        'active'  => bp_is_group_activity()
      ],
      [
        'name'    => __('Members', 'vikinger'),
        'icon'    => 'members',
        'slug'    => 'members',
        'active'  => bp_is_group_members()
      ]
    ];

    foreach ($menu_items as $menu_item) {
      $nav_items[] = [
        'name'    => $menu_item['name'],
        'link'    => $group['link'] . $menu_item['slug'],
        'icon'    => $menu_item['icon'],
        'active'  => $menu_item['active']
      ];
    }

    $nav_items = array_merge($nav_items, vikinger_group_bp_navigation_items_get($group));

    /**
     * Filter group navigation items.
     * 
     * @since 1.9.1
     * 
     * @param array $nav_items
     * @param array $group
     */
    $nav_items = apply_filters('vikinger_groups_profile_navigation_items', $nav_items, $group);

    return $nav_items;
  }
}

if (!function_exists('vikinger_group_bp_navigation_items_get')) {
  /**
   * Get group profile navigation items.
   * 
   * @param array   $group                     Group from which to get navigation items for. 
   * @return array  $group_navigation_items    Group navigation items.
   */
  function vikinger_group_bp_navigation_items_get($group) {
    $bp = buddypress();

    $bp_nav_items = $bp->groups->nav->get_secondary(['parent_slug' => $group['slug']]);
  
    $group_navigation_items = [];
  
    $bp_nav_item_blacklist = [
      'home',
      'members',
      'request-membership'
    ];

    $group_nav_item_icons = [
      'forum'       => 'forums',
      'photos'      => 'photos',
      'videos'      => 'videos',
      'bp-messages' => 'messages'
    ];

    if ($bp_nav_items) {
      foreach ($bp_nav_items as $i => $bp_nav_item) {
        // only add navigation item if not on blacklist and it should be shown for the currently displayed user
        if (!in_array($bp_nav_item->slug, $bp_nav_item_blacklist, true) && $bp_nav_item->user_has_access) {
          $nav_item = (array) $bp_nav_item;

          $group_nav_item = [
            'name'      => $nav_item['name'],
            'link'      => $nav_item['link'],
            'icon'      => array_key_exists($nav_item['slug'], $group_nav_item_icons) ? $group_nav_item_icons[$nav_item['slug']] : false,
            'active'    => bp_is_current_action($nav_item['slug'])
          ];

          $group_navigation_items[] = $group_nav_item;
        }
      }
    }
  
    return $group_navigation_items;
  }
}

if (!function_exists('vikinger_group_join')) {
  /**
   * Add a member to a group
   * 
   * @param int $group_id       ID of the group the member will join
   * @param int $user_id        ID of the user that will join the group
   * @return boolean
   */
  function vikinger_group_join($group_id, $user_id = false) {
    return groups_join_group($group_id, $user_id);
  }
}

if (!function_exists('vikinger_group_leave')) {
  /**
   * Remove a member from a group
   * 
   * @param int $group_id       ID of the group the member will be removed from
   * @param int $user_id        ID of the user that will leave the group
   * @return boolean
   */
  function vikinger_group_leave($group_id, $user_id = false) {
    return groups_leave_group($group_id, $user_id);
  }
}

if (!function_exists('vikinger_group_create')) {
  /**
   * Create a group
   * 
   * @param array   $args
   * @param int     $args['creator_id']       ID of the user that creates the group (required)
   * @param string  $args['name']             Name of the group (required)
   * @param string  $args['slug']             Slug of the group
   * @param string  $args['description']      Description of the group (required)
   * @param string  $args['status']           Status of the group (public, private, hidden)
   * @param boolean $args['enable_forum']     Whether the group has a forum or not
   * @param int     $args['parent_id']        ID of the parent group
   * @param array   $args['types']            The group types: https://codex.buddypress.org/developer/group-types/
   * @return array
   */
  function vikinger_group_create($args) {
    $request = new WP_REST_Request('POST', '/buddypress/v1/groups');

    $request->set_param('context', 'edit');

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $result = rest_do_request($request);

    // if group was created successfully and the activity module is enabled
    // record created_group activity
    if ($result->status === 200) {
      if (bp_is_active('activity')) {
				groups_record_activity([
					'type'    => 'created_group',
					'item_id' => $result->data[0]['id']
        ]);
			}

      // trigger created group action
      do_action('groups_group_create_complete', $result->data[0]['id']);
    }

    return $result;
  }
}

if (!function_exists('vikinger_group_update')) {
  /**
   * Update a group
   * 
   * @param array   $args
   * @param int     $args['id']               ID of the group (required)
   * @param int     $args['creator_id']       ID of the user that created the group
   * @param string  $args['name']             Name of the group
   * @param string  $args['slug']             Slug of the group
   * @param string  $args['description']      Description of the group
   * @param string  $args['status']           Status of the group (public, private, hidden)
   * @param boolean $args['enable_forum']     Whether the group has a forum or not
   * @param int     $args['parent_id']        ID of the parent group
   * @param array   $args['types']            The group types: https://codex.buddypress.org/developer/group-types/
   * @return array
   */
  function vikinger_group_update($args) {
    // $request = new WP_REST_Request('PUT', '/buddypress/v1/groups/' . $args['id']);

    // $request->set_param('context', 'edit');

    // $update_args = $args;

    // unset($update_args['id']);

    // // set parameters
    // foreach ($update_args as $key => $value) {
    //   $request->set_param($key, $value);
    // }

    // $result = rest_do_request($request);

    // if ($result->status === 200) {
    //   // if group status was updated, change activities hide_sitewide
    //   if (array_key_exists('status', $args)) {
    //     if ($args['status'] === 'public') {
    //       vikinger_group_activities_show_sitewide($args['id']);
    //     } else {
    //       vikinger_group_activities_hide_sitewide($args['id']);
    //     }
    //   }

    //   return true;
    // }

    // return false;
    
    /**
     * "enable_forum" value is always set to '1' using the BuddyPress REST API
     * replacing it with direct use of their function until fixed.
     */
    $update_args = $args;
    $update_args['group_id'] = $args['id'];
    unset($update_args['id']);

    $result = groups_create_group($update_args);

    if ($result) {
      // if group status was updated, change activities hide_sitewide
      if (array_key_exists('status', $args)) {
        if ($args['status'] === 'public') {
          vikinger_group_activities_show_sitewide($args['id']);
        } else {
          vikinger_group_activities_hide_sitewide($args['id']);
        }
      }

      return true;
    }

    return false;
  }
}

if (!function_exists('vikinger_group_delete')) {
  /**
   * Delete a group
   * 
   * @param int $group_id       ID of the group to delete
   * @return array
   */
  function vikinger_group_delete($group_id) {
    $request = new WP_REST_Request('DELETE', '/buddypress/v1/groups/' . $group_id);

    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result->status === 200;
  }
}

if (!function_exists('vikinger_group_get_invitations')) {
  /**
   * Get group invitations
   * 
   * @param array   $args
   * @param int     $args['page']         Page to retrieve
   * @param int     $args['per_page']     Invitations per page
   * @param int     $args['group_id']     ID of the group to limit results to
   * @param int     $args['user_id']      ID of the invited user to limit results to
   * @param int     $args['inviter_id']   ID of the user that sent the invite to limit results to
   * @param string  $args['invite_sent']  Limit result to invites that are: sent, draft, all
   * 
   */
  function vikinger_group_get_invitations($args = []) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/groups/invites');

    $defaults = [
      'per_page'  => 100
    ];

    $args = array_merge($defaults, $args);

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $result = rest_do_request($request);

    // if request successfull
    if ($result->status === 200) {
      $invitations = [];

      foreach ($result->data as $bp_invitation) {
        $invitations[] = vikinger_group_get_invitation_data($bp_invitation);
      }

      return $invitations;
    }

    return false;
  }
}

if (!function_exists('vikinger_group_get_invitation_data')) {
  /**
   * Get invitation data from BuddyPress invitation object
   * 
   * @param Object  $bp_invitation        BuddyPress invitation object
   * @return array
   */
  function vikinger_group_get_invitation_data($bp_invitation) {
    $invitation = [
      'id'            => $bp_invitation['id'],
      'invite_sent'   => $bp_invitation['invite_sent'],
      'type'          => $bp_invitation['type'],
      'message'       => $bp_invitation['message'],
      'date_modified' => $bp_invitation['date_modified'],
      'group'         => vikinger_groups_get(['include' => [$bp_invitation['group_id']], 'data_scope' => 'group-invitation'])[0],
      'user'          => vikinger_members_get(['include' => [$bp_invitation['user_id']]])[0],
      'inviter'       => vikinger_members_get(['include' => [$bp_invitation['inviter_id']]])[0]
    ];

    return $invitation;
  }
}

if (!function_exists('vikinger_group_send_invite')) {
  /**
   * Send a group invitation to a user
   * 
   * @param array $args
   * @param int   $args['group_id']     ID of the group to invite the user to
   * @param int   $args['user_id']      ID of the user to invite to the group
   */
  function vikinger_group_send_invite($args) {
    $request = new WP_REST_Request('POST', '/buddypress/v1/groups/invites');

    $request->set_param('context', 'edit');

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_group_accept_invite')) {
  /**
   * Accept a group invitation
   */
  function vikinger_group_accept_invite($invite_id) {
    $request = new WP_REST_Request('PUT', '/buddypress/v1/groups/invites/' . $invite_id);

    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_group_remove_invite')) {
  /**
   * Remove or reject a group invitation, it depends on the logged user id
   * If logged user id was the invited user, then it will be rejected,
   * otherwise the uninvite action will be used
   */
  function vikinger_group_remove_invite($invite_id) {
    $request = new WP_REST_Request('DELETE', '/buddypress/v1/groups/invites/' . $invite_id);

    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_group_membership_requests_get')) {
  /**
   * Get group membership requests
   * 
   * @param array   $args
   * @param int     $args['page']         Page to retrieve
   * @param int     $args['per_page']     Membership requests per page
   * @param int     $args['group_id']     ID of the group to limit results to
   * @param int     $args['user_id']      ID of the user to return group membership requests of
   * 
   */
  function vikinger_group_membership_requests_get($args = []) {
    $request = new WP_REST_Request('GET', '/buddypress/v1/groups/membership-requests');

    $defaults = [
      'per_page'  => 100
    ];

    $args = array_merge($defaults, $args);

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $result = rest_do_request($request);

    // if request successfull
    if ($result->status === 200) {
      $membership_requests = [];

      foreach ($result->data as $bp_membership_request) {
        $membership_request = vikinger_group_get_membership_request_data($bp_membership_request);

        if (!is_null($membership_request['group']) && !is_null($membership_request['user'])) {
          $membership_requests[] = $membership_request;
        }
      }

      return $membership_requests;
    }

    return [];
  }
}

if (!function_exists('vikinger_group_get_membership_request_data')) {
  /**
   * Get membership request data from BuddyPress membership request object
   * 
   * @param Object  $bp_membership_request        BuddyPress membership request object
   * @return array
   */
  function vikinger_group_get_membership_request_data($bp_membership_request) {
    $membership_request = [
      'id'            => $bp_membership_request['id'],
      'invite_sent'   => $bp_membership_request['invite_sent'],
      'type'          => $bp_membership_request['type'],
      'message'       => $bp_membership_request['message'],
      'date_modified' => $bp_membership_request['date_modified'],
      'group'         => vikinger_groups_get(['include' => [$bp_membership_request['group_id']], 'data_scope' => 'group-open'])[0],
      'user'          => vikinger_members_get(['include' => [$bp_membership_request['user_id']], 'data_scope' => 'user-preview'])[0]
    ];

    return $membership_request;
  }
}

if (!function_exists('vikinger_group_membership_requests_send')) {
  /**
   * Send a membership request to a private group
   * 
   * @param array   $args
   * @param int     $args['group_id']     ID of the group to send membership request
   * @param int     $args['user_id']      ID of the user that makes the membership request. Default: logged user id.
   */
  function vikinger_group_membership_requests_send($args = []) {
    $request = new WP_REST_Request('POST', '/buddypress/v1/groups/membership-requests');

    $request->set_param('context', 'edit');

    // set parameters
    foreach ($args as $key => $value) {
      $request->set_param($key, $value);
    }

    $result = rest_do_request($request);

    return $result->status === 200;
  }
}

if (!function_exists('vikinger_group_membership_requests_accept')) {
  /**
   * Accept a membership request to a private group
   * 
   * @param int $request_id    ID of the membership request
   */
  function vikinger_group_membership_requests_accept($request_id) {
    $request = new WP_REST_Request('PUT', '/buddypress/v1/groups/membership-requests/' . $request_id);

    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result->status === 200;
  }
}

if (!function_exists('vikinger_group_membership_requests_remove')) {
  /**
   * Reject or cancel a membership request to a private group, it depends on the logged user id
   * If logged user id is the one who sent the membership request, then it will be canceled,
   * otherwise it will be rejected
   * 
   * @param int $request_id    ID of the membership request
   */
  function vikinger_group_membership_requests_remove($request_id) {
    $request = new WP_REST_Request('DELETE', '/buddypress/v1/groups/membership-requests/' . $request_id);

    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result->status === 200;
  }
}

if (!function_exists('vikinger_group_member_remove')) {
  /**
   * Remove a group member
   * 
   * @param array $args
   * @param int   $args['group_id']       ID of the group to remove member from
   * @param int   $args['member_id']      ID of the member to remove
   * @return array
   */
  function vikinger_group_member_remove($args) {
    $request = new WP_REST_Request('DELETE', '/buddypress/v1/groups/' . $args['group_id'] . '/members/' . $args['member_id']);

    $request->set_param('context', 'edit');

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_group_member_change_status')) {
  /**
   * Change a group member status
   * 
   * @param array $args
   * @param int   $args['group_id']       ID of the group to change member status from
   * @param int   $args['member_id']      ID of the member to change status
   * @param int   $args['role']           Group role to assign the member (member, admin, mod)
   * @param int   $args['action']         Action used to change status (ban, unban, promote, demote)
   * @return array
   */
  function vikinger_group_member_change_status($args) {
    $request = new WP_REST_Request('PUT', '/buddypress/v1/groups/' . $args['group_id'] . '/members/' . $args['member_id']);

    $request->set_param('context', 'edit');

    $update_args = $args;

    unset($update_args['group_id']);
    unset($update_args['member_id']);

    // set parameters
    foreach ($update_args as $key => $value) {
      $request->set_param($key, $value);
    }

    $result = rest_do_request($request);

    return $result;
  }
}

if (!function_exists('vikinger_group_member_promote_to_admin')) {
  /**
   * Promote a group member to admin
   * 
   * @param array $args
   * @param int   $args['group_id']       ID of the group to promote member from
   * @param int   $args['member_id']      ID of the member to promote
   * @return array
   */
  function vikinger_group_member_promote_to_admin($args) {
    $args['role'] = 'admin';
    $args['action'] = 'promote';

    return vikinger_group_member_change_status($args);
  }
}

if (!function_exists('vikinger_group_member_promote_to_mod')) {
  /**
   * Promote a group member to mod
   * 
   * @param array $args
   * @param int   $args['group_id']       ID of the group to promote member from
   * @param int   $args['member_id']      ID of the member to promote
   * @return array
   */
  function vikinger_group_member_promote_to_mod($args) {
    $args['role'] = 'mod';
    $args['action'] = 'promote';

    return vikinger_group_member_change_status($args);
  }
}

if (!function_exists('vikinger_group_member_demote_to_mod')) {
  /**
   * Demote a group member to mod
   * 
   * @param array $args
   * @param int   $args['group_id']       ID of the group to demote member from
   * @param int   $args['member_id']      ID of the member to demote
   * @return array
   */
  function vikinger_group_member_demote_to_mod($args) {
    $args['role'] = 'mod';
    $args['action'] = 'demote';

    return vikinger_group_member_change_status($args);
  }
}

if (!function_exists('vikinger_group_member_demote_to_member')) {
  /**
   * Demote a group member to member
   * 
   * @param array $args
   * @param int   $args['group_id']       ID of the group to demote member from
   * @param int   $args['member_id']      ID of the member to demote
   * @return array
   */
  function vikinger_group_member_demote_to_member($args) {
    $args['role'] = 'member';
    $args['action'] = 'demote';

    return vikinger_group_member_change_status($args);
  }
}

if (!function_exists('vikinger_group_member_ban')) {
  /**
   * Ban a group member
   * 
   * @param array $args
   * @param int   $args['group_id']       ID of the group to ban member from
   * @param int   $args['member_id']      ID of the member to ban
   * @return array
   */
  function vikinger_group_member_ban($args) {
    $args['action'] = 'ban';

    return vikinger_group_member_change_status($args);
  }
}

if (!function_exists('vikinger_group_member_unban')) {
  /**
   * Unban a group member
   * 
   * @param array $args
   * @param int   $args['group_id']       ID of the group to unban member from
   * @param int   $args['member_id']      ID of the member to unban
   * @return array
   */
  function vikinger_group_member_unban($args) {
    $args['action'] = 'unban';

    return vikinger_group_member_change_status($args);
  }
}

if (!function_exists('vikinger_group_get_meta')) {
  /**
   * Get group metadata
   * 
   * @param array   $args
   * @param int     $args['group_id']         ID of the group to update metadata of
   * @param string  $args['meta_key']         Key of the metadata to update
   * @param boolean $args['single']           If true, return only the first value of the specified meta_key
   * @return mixed
   */
  function vikinger_group_get_meta($args) {
    $defaults = [
      'meta_key'  => '',
      'single'    => true
    ];

    $args = array_merge($defaults, $args);

    return groups_get_groupmeta($args['group_id'], $args['meta_key'], $args['single']);
  }
}

if (!function_exists('vikinger_group_update_meta_fields')) {
  /**
   * Update group metadata fields
   * 
   * @param array   $args
   * @param int     $args['group_id']             ID of the group to update metadata of
   * @param array   $args['fields']
   * @param string  $args['fields'][]['meta_key']    Key of the metadata to update
   * @param string  $args['fields'][]['meta_value']  Value of the metadata
   * @return boolean|int
   */
  function vikinger_group_update_meta_fields($args) {
    foreach ($args['fields'] as $meta_key => $meta_value) {
      $result = groups_update_groupmeta($args['group_id'], $meta_key, $meta_value);
    }

    return $result;
  }
}

if (!function_exists('vikinger_group_update_meta')) {
  /**
   * Update group metadata
   * 
   * @param array   $args
   * @param int     $args['group_id']         ID of the group to update metadata of
   * @param string  $args['meta_key']         Key of the metadata to update
   * @param string  $args['meta_value']       Value of the metadata
   * @return boolean|int
   */
  function vikinger_group_update_meta($args) {
    return groups_update_groupmeta($args['group_id'], $args['meta_key'], $args['meta_value']);
  }
}

if (!function_exists('vikinger_group_delete_meta_fields')) {
  /**
   * Delete group metadata fields
   * 
   * @param array   $args
   * @param int     $args['group_id']       ID of the group to delete metadata of
   * @param array   $args['fields']         Meta keys to delete     
   * @return boolean|int
   */
  function vikinger_group_delete_meta_fields($args) {
    foreach ($args['fields'] as $meta_key) {
      $result = groups_delete_groupmeta($args['group_id'], $meta_key);
    }

    return $result;
  }
}

if (!function_exists('vikinger_group_delete_meta')) {
  /**
   * Delete group metadata
   * 
   * @param array   $args
   * @param int     $args['group_id']         ID of the group to update metadata of
   * @param string  $args['meta_key']         Key of the metadata to update
   * @return boolean|int
   */
  function vikinger_group_delete_meta($args) {
    return groups_delete_groupmeta($args['group_id'], $args['meta_key']);
  }
}

if (!function_exists('vikinger_group_activities_hide_sitewide')) {
  /**
   * Hide all group activities sitewide
   * 
   * @param int $group_id       ID of the group.
   * @return bool $result       True if successful update, false otherwise.
   */
  function vikinger_group_activities_hide_sitewide($group_id) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_activity";
    $table = $prefix . $table_name;

    $result = $wpdb->update(
      $table,
      [
        'hide_sitewide' => 1
      ],
      [
        'component' => 'groups',
        'item_id'   => $group_id
      ],
      ['%d'],
      ['%s', '%d']
    );

    return $result !== false;
  }
}

if (!function_exists('vikinger_group_activities_show_sitewide')) {
  /**
   * Show all group activities sitewide
   * 
   * @param int $group_id       ID of the group.
   */
  function vikinger_group_activities_show_sitewide($group_id) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;
    $table_name = "bp_activity";
    $table = $prefix . $table_name;

    $result = $wpdb->update(
      $table,
      [
        'hide_sitewide' => 0
      ],
      [
        'component' => 'groups',
        'item_id'   => $group_id
      ],
      ['%d'],
      ['%s', '%d']
    );

    return $result !== false;
  }
}

?>