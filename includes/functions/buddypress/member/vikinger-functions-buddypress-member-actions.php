<?php
/**
 * Functions - BuddyPress - Member - Actions
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Member Profile - About Page
 */
if (vikinger_settings_members_profile_page_is_enabled('about')) {

  if (!function_exists('vikinger_members_about_page_setup_nav')) {
    /**
     * Creates member about page navigation
     */
    function vikinger_members_about_page_setup_nav() {
      global $bp;

      bp_core_new_nav_item([
        'name'            => esc_html__('About', 'vikinger'),
        'slug'            => 'about',
        'screen_function' => 'vikinger_members_about_page',
        'position'        => vikinger_member_bp_navigation_item_default_order_get('about')
      ]);
    }
  }

  add_action('bp_setup_nav', 'vikinger_members_about_page_setup_nav');

  if (!function_exists('vikinger_members_about_page')) {
    /**
     * Members post page setup
     */
    function vikinger_members_about_page() {
      add_action('bp_template_content', 'vikinger_members_about_page_screen_content');
      bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
    }
  }

  if (!function_exists('vikinger_members_about_page_screen_content')) {
    /**
     * Members post page HTML content
     */
    function vikinger_members_about_page_screen_content() {
      $member = get_query_var('member');

      ?>
      <!-- GRID -->
      <div class="grid grid-3-6-3">
        <!-- GRID COLUMN -->
        <div class="grid-column">
        <?php

          /**
           * Widget Info About
           */
          get_template_part('template-part/widget/widget-info', 'about', [
            'member' => $member
          ]);

        ?>
        </div>
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        <div class="grid-column">
        <?php

          /**
           * Widget Info Block Interests
           */
          get_template_part('template-part/widget/widget-info-block', 'interests', [
            'member' => $member
          ]);

        ?>
        </div>
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        <div class="grid-column">
        <?php

          /**
           * Widget Info Personal
           */
          get_template_part('template-part/widget/widget-info', 'personal', [
            'member' => $member
          ]);

        ?>
        </div>
        <!-- /GRID COLUMN -->
      </div>
      <!-- /GRID -->
      <?php
    }
  }
}

/**
 * Member Profile - Posts Page
 */
if (vikinger_settings_members_profile_page_is_enabled('posts')) {
  if (!function_exists('vikinger_members_posts_page_setup_nav')) {
    /**
     * Creates member posts page navigation
     */
    function vikinger_members_posts_page_setup_nav() {
      global $bp;

      bp_core_new_nav_item([
        'name'            => esc_html__('Blog Posts', 'vikinger'),
        'slug'            => 'posts',
        'screen_function' => 'vikinger_members_posts_page',
        'position'        => vikinger_member_bp_navigation_item_default_order_get('posts')
      ]);
    }
  }

  add_action('bp_setup_nav', 'vikinger_members_posts_page_setup_nav');

  if (!function_exists('vikinger_members_posts_page')) {
    /**
     * Members post page setup
     */
    function vikinger_members_posts_page() {
      add_action('bp_template_content', 'vikinger_members_posts_page_screen_content');
      bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
    }
  }

  if (!function_exists('vikinger_members_posts_page_screen_content')) {
    /**
     * Members post page HTML content
     */
    function vikinger_members_posts_page_screen_content() {
      $member = get_query_var('member');

      $post_args = [
        'author'  => $member['id']
      ];

      if (vikinger_plugin_pmpro_is_active() && vikinger_pmpro_search_archives_limit_enabled()) {
        $restricted_categories = vikinger_pmpro_logged_user_restricted_categories_get();
        $restricted_posts = vikinger_pmpro_logged_user_restricted_posts_get();

        $post_args['category__not_in'] = $restricted_categories;
        $post_args['post__not_in'] = $restricted_posts;
      }

      $post_count = vikinger_get_post_count($post_args);

      /**
       * Section Header
       */
      get_template_part('template-part/section/section', 'header', [
        'section_pretitle'    => sprintf(
          esc_html_x('Browse %s', 'Section Header - Pretitle', 'vikinger'),
          $member['name']
        ),
        'section_title'       => esc_html__('Blog Posts', 'vikinger'),
        'section_text'        => $post_count
      ]);

      /**
       * Post Filterable List
       */
      get_template_part('template-part/post/post-filterable-list', null, [
        'allow_post_types'  => true,
        'post_types'        => vikinger_blog_post_types_to_display_in_blog_get(),
        'attributes'        => [
          'userid'  => $member['id']
        ]
      ]);
    }
  }
}

/**
 * Member Profile - Stream Page
 */
if (vikinger_settings_stream_profile_is_enabled()) {
  if (!function_exists('vikinger_members_stream_page_setup_nav')) {
    /**
     * Creates member twitch page navigation
     */
    function vikinger_members_stream_page_setup_nav() {
      global $bp;

      bp_core_new_nav_item([
        'name'            => esc_html__('Stream', 'vikinger'),
        'slug'            => 'stream',
        'screen_function' => 'vikinger_members_stream_page',
        'position'        => vikinger_member_bp_navigation_item_default_order_get('stream')
      ]);
    }
  }

  add_action('bp_setup_nav', 'vikinger_members_stream_page_setup_nav');

  if (!function_exists('vikinger_members_stream_page')) {
    /**
     * Members twitch page setup
     */
    function vikinger_members_stream_page() {
      add_action('bp_template_content', 'vikinger_members_stream_page_screen_content');
      bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
    }
  }

  if (!function_exists('vikinger_members_stream_page_screen_content')) {
    /**
     * Members post page HTML content
     */
    function vikinger_members_stream_page_screen_content() {
      $member = get_query_var('member');

      $stream_username = vikinger_user_stream_username_get($member['id']);

      if (!$stream_username) {
        $no_results_found_text = esc_html__('This user hasn\'t linked a stream to their profile', 'vikinger');

        // show personalized message if current logged user is profile user
        if (get_current_user_id() === $member['id']) {
          $no_results_found_text = sprintf(
            esc_html__('You haven\'t linked a stream to your profile. Go to your account hub %sstream%s page to link one.', 'vikinger'),
            '<a href="' . esc_url($member['stream_link']) . '">',
            '</a>'
          );
        }

        /**
         * Notification Section
         */
        get_template_part('template-part/notification/notification', 'section', [
          'title' => esc_html__('No stream found', 'vikinger'),
          'text'  => $no_results_found_text
        ]);
      } else {
        /**
         * Stream Preview
         */
        get_template_part('template-part/stream/stream', 'preview', [
          'username'  => $stream_username
        ]);
      }
    }
  }
}

/**
 * Member Account Hub - Settings Pages
 */
if (bp_is_active('settings')) {
  /**
   * Member Account Hub - Social Page
   */
  if (bp_is_active('xprofile')) {
    if (!function_exists('vikinger_members_settings_social_page_setup_nav')) {
      /**
       * Creates member social settings page navigation
       */
      function vikinger_members_settings_social_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Social Settings', 'vikinger'),
          'slug'            => 'social',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_social_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_social_page_setup_nav');

    if (!function_exists('vikinger_members_settings_social_page')) {
      /**
       * Members social page setup
       */
      function vikinger_members_settings_social_page() {
        add_action('bp_template_content', 'vikinger_members_settings_social_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_social_page_screen_content')) {
      /**
       * Members social page HTML content
       */
      function vikinger_members_settings_social_page_screen_content() {
        ?>
          <div id="social-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }
  }

  /**
   * Member Account Hub - Stream Page
   */
  if (vikinger_settings_stream_profile_is_enabled()) {
    if (!function_exists('vikinger_members_settings_stream_page_setup_nav')) {
      /**
       * Creates member stream settings page navigation
       */
      function vikinger_members_settings_stream_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Stream Settings', 'vikinger'),
          'slug'            => 'stream',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_stream_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_stream_page_setup_nav');

    if (!function_exists('vikinger_members_settings_stream_page')) {
      /**
       * Members stream page setup
       */
      function vikinger_members_settings_stream_page() {
        add_action('bp_template_content', 'vikinger_members_settings_stream_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_stream_page_screen_content')) {
      /**
       * Members stream page HTML content
       */
      function vikinger_members_settings_stream_page_screen_content() {
        ?>
          <div id="stream-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }
  }

  /**
   * Member Account Hub - Messages Page
   */
  if (bp_is_active('messages') && bp_is_active('friends')) {
    if (!function_exists('vikinger_members_settings_messages_page_setup_nav')) {
      /**
       * Creates member messages settings page navigation
       */
      function vikinger_members_settings_messages_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Message Settings', 'vikinger'),
          'slug'            => 'messages',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_messages_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_messages_page_setup_nav');

    if (!function_exists('vikinger_members_settings_messages_page')) {
      /**
       * Members messages page setup
       */
      function vikinger_members_settings_messages_page() {
        add_action('bp_template_content', 'vikinger_members_settings_messages_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_messages_page_screen_content')) {
      /**
       * Members messages page HTML content
       */
      function vikinger_members_settings_messages_page_screen_content() {
        // if BP Better Messages plugin is active, show its messages screen
        if (vikinger_plugin_bpbettermessages_is_active()) {
        ?>
          <!-- ACCOUNT HUB CONTENT -->
          <div class="account-hub-content">
        <?php
          /**
           * Section Header
           */
          get_template_part('template-part/section/section', 'header', [
            'section_pretitle'  => esc_html__('My Profile', 'vikinger'),
            'section_title'     => esc_html__('Messages', 'vikinger')
          ]);
    
          echo BP_Better_Messages()->functions->get_page();
    
        } else {
          $user_id = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? (int) $_GET['user_id'] : false;
          $message_id = isset($_GET['message_id']) && is_numeric($_GET['message_id']) ? (int) $_GET['message_id'] : false;
    
          if ($user_id) :
    
          ?>
            <div id="messages-settings-screen" data-userid="<?php echo esc_attr($user_id); ?>"></div>
            <?php
          
          elseif ($message_id) :
    
          ?>
            <div id="messages-settings-screen" data-messageid="<?php echo esc_attr($message_id); ?>"></div>
          <?php
          
          else :
    
          ?>
            <div id="messages-settings-screen"></div>
          <?php
    
          endif;
        }
        ?>
          </div>
          <!-- /ACCOUNT HUB CONTENT -->
        </div>
        <!-- /GRID -->
        <?php
      }
    }
  }

  /**
   * Member Account Hub - Friend Requests Page
   */
  if (bp_is_active('friends')) {
    if (!function_exists('vikinger_members_settings_friend_requests_page_setup_nav')) {
      /**
       * Creates member friend requests settings page navigation
       */
      function vikinger_members_settings_friend_requests_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Friend Requests Settings', 'vikinger'),
          'slug'            => 'friend-requests',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_friend_requests_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_friend_requests_page_setup_nav');

    if (!function_exists('vikinger_members_settings_friend_requests_page')) {
      /**
       * Members friend requests page setup
       */
      function vikinger_members_settings_friend_requests_page() {
        add_action('bp_template_content', 'vikinger_members_settings_friend_requests_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_friend_requests_page_screen_content')) {
      /**
       * Members friend requests page HTML content
       */
      function vikinger_members_settings_friend_requests_page_screen_content() {
        ?>
          <div id="friend-requests-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }
  }

  /**
   * Member Account Hub - Account Info Page
   */
  if (bp_is_active('xprofile')) {
    if (!function_exists('vikinger_members_settings_account_info_page_setup_nav')) {
      /**
       * Creates member account info settings page navigation
       */
      function vikinger_members_settings_account_info_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Account Info Settings', 'vikinger'),
          'slug'            => 'account',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_account_info_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_account_info_page_setup_nav');

    if (!function_exists('vikinger_members_settings_account_info_page')) {
      /**
       * Members account info page setup
       */
      function vikinger_members_settings_account_info_page() {
        add_action('bp_template_content', 'vikinger_members_settings_account_info_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_account_info_page_screen_content')) {
      /**
       * Members account info page HTML content
       */
      function vikinger_members_settings_account_info_page_screen_content() {
        ?>
          <div id="account-info-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }
  }

  /**
   * Member Account Hub - Account Settings Page
   */
  if (!function_exists('vikinger_members_settings_account_settings_page_setup_nav')) {
    /**
     * Creates member account settings settings page navigation
     */
    function vikinger_members_settings_account_settings_page_setup_nav() {
      global $bp;

      bp_core_new_subnav_item([
        'name'            => esc_html__('Account Settings', 'vikinger'),
        'slug'            => 'account-settings',
        'parent_slug'     => bp_get_settings_slug(),
        'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
        'screen_function' => 'vikinger_members_settings_account_settings_page',
        'user_has_access' => bp_core_can_edit_settings()
      ], 'members');
    }
  }

  add_action('bp_setup_nav', 'vikinger_members_settings_account_settings_page_setup_nav');

  if (!function_exists('vikinger_members_settings_account_settings_page')) {
    /**
     * Members account settings page setup
     */
    function vikinger_members_settings_account_settings_page() {
      add_action('bp_template_content', 'vikinger_members_settings_account_settings_page_screen_content');
      bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
    }
  }

  if (!function_exists('vikinger_members_settings_account_settings_page_screen_content')) {
    /**
     * Members account settings page HTML content
     */
    function vikinger_members_settings_account_settings_page_screen_content() {
      $member = get_query_var('member');

    ?>
      <!-- ACCOUNT HUB CONTENT -->
      <div class="account-hub-content">
      <?php

        /**
         * Section Header
         */
        get_template_part('template-part/section/section', 'header', [
          'section_pretitle'  => esc_html__('Account', 'vikinger'),
          'section_title'     => esc_html__('Account Settings', 'vikinger')
        ]);

      ?>
        <!-- GRID COLUMN -->
        <div class="grid-column">
          <!-- WIDGET BOX -->
          <div class="widget-box">
            <!-- WIDGET BOX TITLE -->
            <p class="widget-box-title"><?php esc_html_e('Delete Account', 'vikinger'); ?></p>
            <!-- /WIDGET BOX TITLE -->

            <!-- WIDGET BOX CONTENT -->
            <div class="widget-box-content">
            <?php

              if (is_super_admin($member['id'])) {
                /**
                 * Alert Line
                 */
                get_template_part('template-part/alert/alert', 'line', [
                  'type'  =>  'info',
                  'text'  =>  sprintf(
                                esc_html__('%sDelete Account:%s Site admins cannot be deleted.', 'vikinger'),
                                '<span class="bold">',
                                '</span>'
                              )
                ]);
              } else if (bp_disable_account_deletion()) {
                /**
                 * Alert Line
                 */
                get_template_part('template-part/alert/alert', 'line', [
                  'type'  =>  'info',
                  'text'  =>  sprintf(
                                esc_html__('%sDelete Account Disabled:%s Please contact the site administrator to request account deletion.', 'vikinger'),
                                '<span class="bold">',
                                '</span>'
                              )
                ]);
              } else {
                /**
                 * Alert Line
                 */
                get_template_part('template-part/alert/alert', 'line', [
                  'type'  =>  'error',
                  'text'  =>  sprintf(
                                esc_html__('%sWarning:%s deleting your account will delete all of the content you have created. It will be completely irrecoverable.', 'vikinger'),
                                '<span class="bold">',
                                '</span>'
                              )
                ]);

            ?>

              <!-- BUTTON -->
              <div id="vk-user-account-delete" class="button tertiary button-loader">
                <span class="button-text"><?php esc_html_e('Delete My Account', 'vikinger'); ?></span>
                <span class="button-loading-text"><?php esc_html_e('Deleting...', 'vikinger'); ?></span>
                <!-- LOADER SPINNER WRAP -->
                <div class="loader-spinner-wrap small">
                  <!-- LOADER SPINNER -->
                  <div class="loader-spinner"></div>
                  <!-- /LOADER SPINNER -->
                </div>
                <!-- /LOADER SPINNER WRAP -->
              </div>
              <!-- /BUTTON -->
            <?php

              }

            ?>
            </div>
            <!-- /WIDGET BOX CONTENT -->
          </div>
          <!-- /WIDGET BOX -->
        </div>
        <!-- /GRID COLUMN -->
      </div>
      <!-- /ACCOUNT HUB CONTENT -->
    </div>
    <!-- /GRID -->
    <?php
    }
  }

  /**
   * Member Account Hub - Account Password Page
   */
  if (!function_exists('vikinger_members_settings_password_page_setup_nav')) {
    /**
     * Creates member password settings page navigation
     */
    function vikinger_members_settings_password_page_setup_nav() {
      global $bp;

      bp_core_new_subnav_item([
        'name'            => esc_html__('Password Settings', 'vikinger'),
        'slug'            => 'password',
        'parent_slug'     => bp_get_settings_slug(),
        'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
        'screen_function' => 'vikinger_members_settings_password_page',
        'user_has_access' => bp_core_can_edit_settings()
      ], 'members');
    }
  }

  add_action('bp_setup_nav', 'vikinger_members_settings_password_page_setup_nav');

  if (!function_exists('vikinger_members_settings_password_page')) {
    /**
     * Members password page setup
     */
    function vikinger_members_settings_password_page() {
      add_action('bp_template_content', 'vikinger_members_settings_password_page_screen_content');
      bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
    }
  }

  if (!function_exists('vikinger_members_settings_password_page_screen_content')) {
    /**
     * Members password page HTML content
     */
    function vikinger_members_settings_password_page_screen_content() {
      ?>
        <div id="password-settings-screen"></div>
      </div>
      <!-- /GRID -->
      <?php
    }
  }

  if (bp_is_active('activity') || bp_is_active('messages') || bp_is_active('friends') || bp_is_active('groups')) {
    /**
     * Member Account Hub - Account Email Settings Page
     */
    if (!function_exists('vikinger_members_settings_email_settings_page_setup_nav')) {
      /**
       * Creates member email settings page navigation
       */
      function vikinger_members_settings_email_settings_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Email Settings', 'vikinger'),
          'slug'            => 'email-settings',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_email_settings_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_email_settings_page_setup_nav');

    if (!function_exists('vikinger_members_settings_email_settings_page')) {
      /**
       * Members email settings page setup
       */
      function vikinger_members_settings_email_settings_page() {
        add_action('bp_template_content', 'vikinger_members_settings_email_settings_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_email_settings_page_screen_content')) {
      /**
       * Members email settings page HTML content
       */
      function vikinger_members_settings_email_settings_page_screen_content() {
        ?>
          <div id="email-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }
  }

  if (bp_is_active('groups')) {
    /**
     * Member Account Hub - Manage Groups Page
     */
    if (!function_exists('vikinger_members_settings_manage_groups_page_setup_nav')) {
      /**
       * Creates member manage groups settings page navigation
       */
      function vikinger_members_settings_manage_groups_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Manage Groups Settings', 'vikinger'),
          'slug'            => 'manage-groups',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_manage_groups_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_manage_groups_page_setup_nav');

    if (!function_exists('vikinger_members_settings_manage_groups_page')) {
      /**
       * Members manage groups page setup
       */
      function vikinger_members_settings_manage_groups_page() {
        add_action('bp_template_content', 'vikinger_members_settings_manage_groups_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_manage_groups_page_screen_content')) {
      /**
       * Members manage groups page HTML content
       */
      function vikinger_members_settings_manage_groups_page_screen_content() {
        ?>
          <div id="manage-groups-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }

    /**
     * Member Account Hub - Send Group Invitations Page
     */
    if (!function_exists('vikinger_members_settings_send_group_invitations_page_setup_nav')) {
      /**
       * Creates member send group invitations settings page navigation
       */
      function vikinger_members_settings_send_group_invitations_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Send Group Invitations Settings', 'vikinger'),
          'slug'            => 'send-group-invitations',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_send_group_invitations_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_send_group_invitations_page_setup_nav');

    if (!function_exists('vikinger_members_settings_send_group_invitations_page')) {
      /**
       * Members send group invitations page setup
       */
      function vikinger_members_settings_send_group_invitations_page() {
        add_action('bp_template_content', 'vikinger_members_settings_send_group_invitations_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_send_group_invitations_page_screen_content')) {
      /**
       * Members send group invitations page HTML content
       */
      function vikinger_members_settings_send_group_invitations_page_screen_content() {
        ?>
          <div id="send-group-invitations-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }

    /**
     * Member Account Hub - Received Group Invitations Page
     */
    if (!function_exists('vikinger_members_settings_received_group_invitations_page_setup_nav')) {
      /**
       * Creates member received group invitations settings page navigation
       */
      function vikinger_members_settings_received_group_invitations_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Received Group Invitations Settings', 'vikinger'),
          'slug'            => 'received-group-invitations',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_received_group_invitations_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_received_group_invitations_page_setup_nav');

    if (!function_exists('vikinger_members_settings_received_group_invitations_page')) {
      /**
       * Members received group invitations page setup
       */
      function vikinger_members_settings_received_group_invitations_page() {
        add_action('bp_template_content', 'vikinger_members_settings_received_group_invitations_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_received_group_invitations_page_screen_content')) {
      /**
       * Members received group invitations page HTML content
       */
      function vikinger_members_settings_received_group_invitations_page_screen_content() {
        ?>
          <div id="received-group-invitations-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }

    /**
     * Member Account Hub - Group Membership Requests Page
     */
    if (!function_exists('vikinger_members_settings_group_membership_requests_page_setup_nav')) {
      /**
       * Creates group membership requests settings page navigation
       */
      function vikinger_members_settings_group_membership_requests_page_setup_nav() {
        global $bp;

        bp_core_new_subnav_item([
          'name'            => esc_html__('Membership Requests Settings', 'vikinger'),
          'slug'            => 'membership-requests',
          'parent_slug'     => bp_get_settings_slug(),
          'parent_url'      => trailingslashit(bp_loggedin_user_domain() . bp_get_settings_slug()),
          'screen_function' => 'vikinger_members_settings_group_membership_requests_page',
          'user_has_access' => bp_core_can_edit_settings()
        ], 'members');
      }
    }

    add_action('bp_setup_nav', 'vikinger_members_settings_group_membership_requests_page_setup_nav');

    if (!function_exists('vikinger_members_settings_group_membership_requests_page')) {
      /**
       * Members received group invitations page setup
       */
      function vikinger_members_settings_group_membership_requests_page() {
        add_action('bp_template_content', 'vikinger_members_settings_group_membership_requests_page_screen_content');
        bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
      }
    }

    if (!function_exists('vikinger_members_settings_group_membership_requests_page_screen_content')) {
      /**
       * Members received group invitations page HTML content
       */
      function vikinger_members_settings_group_membership_requests_page_screen_content() {
        ?>
          <div id="group-membership-requests-settings-screen"></div>
        </div>
        <!-- /GRID -->
        <?php
      }
    }
  }
}

if (!function_exists('vikinger_members_remove_unused_subnav_items')) {
  /**
   * Remove unused member subnav pages
   */
  function vikinger_members_remove_unused_subnav_items() {
    bp_core_remove_nav_item('profile', 'members');
    bp_core_remove_nav_item('notifications', 'members');
    bp_core_remove_nav_item('messages', 'members');

    bp_core_remove_subnav_item('activity', 'mentions', 'members');
    bp_core_remove_subnav_item('activity', 'favorites', 'members');
    bp_core_remove_subnav_item('activity', 'friends', 'members');
    bp_core_remove_subnav_item('activity', 'groups', 'members');

    bp_core_remove_subnav_item('friends', 'requests', 'members');

    bp_core_remove_subnav_item('groups', 'invites', 'members');

    bp_core_remove_subnav_item('settings', 'data', 'members');
    bp_core_remove_subnav_item('settings', 'profile', 'members');
  }
}

add_action('bp_setup_nav', 'vikinger_members_remove_unused_subnav_items');

if (!function_exists('vikinger_groups_remove_unused_subnav_items')) {
  /**
   * Remove unused group subnav pages
   */
  function vikinger_groups_remove_unused_subnav_items() {
    if (!bp_is_group()) {
      return;
    }

    $slug = bp_get_current_group_slug();

    bp_core_remove_subnav_item($slug, 'admin', 'groups');
    bp_core_remove_subnav_item($slug, 'send-invites', 'groups');

    $parent_slug = $slug . '_manage';

    $hide_tabs = array(
      'edit-details'      => 1,
      'group-settings'    => 1,
      'group-avatar'      => 1,
      'group-cover-image' => 1,
      'manage-members'    => 1,
      'delete-group'      => 1
    );
    
    foreach (array_keys($hide_tabs) as $tab) {
      bp_core_remove_subnav_item($parent_slug, $tab, 'groups');
    }

    // redirect to groups page
    if (!empty($hide_tabs[bp_action_variable(0)])) {
      bp_core_redirect(bp_get_group_permalink(groups_get_current_group()));
    }
  }
}

add_action('bp_actions', 'vikinger_groups_remove_unused_subnav_items');

?>