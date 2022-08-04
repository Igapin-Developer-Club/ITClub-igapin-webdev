<?php
/**
 * Vikinger Customizer - Members
 * 
 * @since 1.0.0
 */

function vikinger_customizer_members($wp_customize) {
  /**
   * Members section
   */
  $wp_customize->add_section('vikinger_members', [
    'title'       => esc_html_x('Members', '(Customizer) Members Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the members options.', '(Customizer) Members Options - Description', 'vikinger'),
    'priority'    => 290,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Members Default Avatar
   */
  $wp_customize->add_setting('vikinger_members_setting_default_avatar', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_members_control_default_avatar', [
    'label'       => esc_html_x('Members Default Avatar', '(Customizer) Members Default Avatar - Title', 'vikinger'),
    'description' => esc_html_x('Default avatar assigned to members.', '(Customizer) Members Default Avatar - Description', 'vikinger'),
    'section'     => 'vikinger_members',
    'settings'    => 'vikinger_members_setting_default_avatar',
    'mime_type'   => 'image'
  ]));

  /**
   * Members Default Cover
   */
  $wp_customize->add_setting('vikinger_members_setting_default_cover', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'vikinger_members_control_default_cover', [
    'label'       => esc_html_x('Members Default Cover', '(Customizer) Members Default Cover - Title', 'vikinger'),
    'description' => esc_html_x('Default cover assigned to members.', '(Customizer) Members Default Cover - Description', 'vikinger'),
    'section'     => 'vikinger_members',
    'settings'    => 'vikinger_members_setting_default_cover',
    'mime_type'   => 'image'
  ]));

  /**
   * Members - List Items Per Page
   */
  $wp_customize->add_setting('vikinger_members_setting_list_items_per_page', [
    'sanitize_callback' => 'absint',
    'default'           => 12
  ]);

  $wp_customize->add_control('vikinger_members_setting_list_items_per_page', [
    'label'       => esc_html_x('Member Lists - Items Per Page', '(Customizer) Member Option - Label', 'vikinger'),
    'description' => esc_html_x('Amount of members to display per page in member lists.', '(Customizer) Member Option - Description', 'vikinger'),
    'type'        => 'number',
    'input_attrs' => [
      'min'   => 1,
      'step'  => 1
    ],
    'section'     => 'vikinger_members'
  ]);

  /**
   * Members Profile About Page Status
   */
  $wp_customize->add_setting('vikinger_members_setting_profile_about_page_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_members_control_profile_about_page_status', [
    'label'       => esc_html_x('Profile About Page - Status', '(Customizer) Profile About Page Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('By disabling this option, you can remove the members profile about page and associated navigation item.', '(Customizer) Profile About Page Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_members',
    'settings'    => 'vikinger_members_setting_profile_about_page_status'
  ]);

  /**
   * Members Profile Posts Page Status
   */
  $wp_customize->add_setting('vikinger_members_setting_profile_posts_page_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_members_control_profile_posts_page_status', [
    'label'       => esc_html_x('Profile Posts Page - Status', '(Customizer) Profile Posts Page Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('By disabling this option, you can remove the members profile posts page and associated navigation item.', '(Customizer) Profile Posts Page Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_members',
    'settings'    => 'vikinger_members_setting_profile_posts_page_status'
  ]);

  /**
   * Members Profile Credits Page Status
   */
  $wp_customize->add_setting('vikinger_members_setting_profile_credits_page_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_members_control_profile_credits_page_status', [
    'label'       => esc_html_x('Profile Credits Page - Status', '(Customizer) Profile Credits Page Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('By disabling this option, you can remove the members profile credits page and associated navigation item.', '(Customizer) Profile Credits Page Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_members',
    'settings'    => 'vikinger_members_setting_profile_credits_page_status'
  ]);

  /**
   * Members Profile Badges Page Status
   */
  $wp_customize->add_setting('vikinger_members_setting_profile_badges_page_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_members_control_profile_badges_page_status', [
    'label'       => esc_html_x('Profile Badges Page - Status', '(Customizer) Profile Badges Page Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('By disabling this option, you can remove the members profile badges page and associated navigation item.', '(Customizer) Profile Badges Page Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_members',
    'settings'    => 'vikinger_members_setting_profile_badges_page_status'
  ]);

  /**
   * Members Profile Quests Page Status
   */
  $wp_customize->add_setting('vikinger_members_setting_profile_quests_page_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_members_control_profile_quests_page_status', [
    'label'       => esc_html_x('Profile Quests Page - Status', '(Customizer) Profile Quests Page Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('By disabling this option, you can remove the members profile quests page and associated navigation item.', '(Customizer) Profile Quests Page Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_members',
    'settings'    => 'vikinger_members_setting_profile_quests_page_status'
  ]);

  /**
   * Members Profile Ranks Page Status
   */
  $wp_customize->add_setting('vikinger_members_setting_profile_ranks_page_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'enabled'
  ]);

  $wp_customize->add_control('vikinger_members_control_profile_ranks_page_status', [
    'label'       => esc_html_x('Profile Ranks Page - Status', '(Customizer) Profile Ranks Page Option - Status - Title', 'vikinger'),
    'description' => esc_html_x('By disabling this option, you can remove the members profile ranks page and associated navigation item.', '(Customizer) Profile Ranks Page Option - Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'enabled'   => esc_html__('Enabled', 'vikinger'),
      'disabled'  => esc_html__('Disabled', 'vikinger')
    ],
    'section'     => 'vikinger_members',
    'settings'    => 'vikinger_members_setting_profile_ranks_page_status'
  ]);


  /**
   * Members Profile Navigation Items Order
   */
  $member_profile_navigation_items_order = [
    [ 
      'slug'        => 'about',
      'label'       => esc_html_x('Profile About Page - Order', '(Customizer) Profile About Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the about page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile About Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'activity',
      'label'       => esc_html_x('Profile Timeline Page - Order', '(Customizer) Profile Timeline Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the timeline page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Timeline Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'friends',
      'label'       => esc_html_x('Profile Friends Page - Order', '(Customizer) Profile Friends Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the friends page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Friends Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'groups',
      'label'       => esc_html_x('Profile Groups Page - Order', '(Customizer) Profile Groups Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the groups page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Groups Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'posts',
      'label'       => esc_html_x('Profile Posts Page - Order', '(Customizer) Profile Posts Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the posts page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Posts Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'forums',
      'label'       => esc_html_x('Profile Forums Page - Order', '(Customizer) Profile Forums Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the forum page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Forums Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'photos',
      'label'       => esc_html_x('Profile Photos Page - Order', '(Customizer) Profile Photos Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the photos page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Photos Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'videos',
      'label'       => esc_html_x('Profile Videos Page - Order', '(Customizer) Profile Videos Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the videos page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Videos Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'stream',
      'label'       => esc_html_x('Profile Stream Page - Order', '(Customizer) Profile Stream Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the stream page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Stream Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'credits',
      'label'       => esc_html_x('Profile Credits Page - Order', '(Customizer) Profile Credits Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the credits page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Credits Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'badges',
      'label'       => esc_html_x('Profile Badges Page - Order', '(Customizer) Profile Badges Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the badges page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Badges Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'quests',
      'label'       => esc_html_x('Profile Quests Page - Order', '(Customizer) Profile Quests Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the quests page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Quests Page Option - Order - Description', 'vikinger')
    ],
    [ 
      'slug'        => 'ranks',
      'label'       => esc_html_x('Profile Ranks Page - Order', '(Customizer) Profile Ranks Page Option - Order - Title', 'vikinger'),
      'description' => esc_html_x('Choose the order in which the ranks page is displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones)', '(Customizer) Profile Ranks Page Option - Order - Description', 'vikinger')
    ]
  ];

  foreach ($member_profile_navigation_items_order as $member_profile_navigation_item_order) {
    $wp_customize->add_setting('vikinger_members_setting_profile_' . $member_profile_navigation_item_order['slug'] . '_page_order', [
      'sanitize_callback' => 'absint',
      'default'           => vikinger_member_bp_navigation_item_default_order_get($member_profile_navigation_item_order['slug'])
    ]);
  
    $wp_customize->add_control('vikinger_members_control_profile_' . $member_profile_navigation_item_order['slug'] . '_page_order', [
      'label'       => $member_profile_navigation_item_order['label'],
      'description' => $member_profile_navigation_item_order['description'],
      'type'        => 'number',
      'section'     => 'vikinger_members',
      'settings'    => 'vikinger_members_setting_profile_' . $member_profile_navigation_item_order['slug'] . '_page_order'
    ]);
  }
}

add_action('customize_register', 'vikinger_customizer_members');