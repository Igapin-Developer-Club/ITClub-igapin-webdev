<?php
/**
 * Vikinger Template Part - Dropdown Navigation
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get, vikinger_members_get_settings_navigation_sections
 * 
 * @param array $args {
 *   @type array    $user                   User data.
 *   @type array    $navigation_sections    Navigation sections.
 *   @type string   $modifiers              Optional. Additional class names to add to the HTML wrapper.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';

  global $vikinger_settings;

  $display_verified = vikinger_plugin_bpverifiedmember_is_active();

  $display_verified_in_fullname = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_fullname'];
  $display_verified_in_username = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_username'];

  $verified_user = $display_verified && $args['user']['verified'];

  $navigation_sections = [];

  $navigation_section = [];

  $j = 0;

  for ($i = 0; $i < count($args['navigation_sections']); $i++) {
    $navigation_section_item = $args['navigation_sections'][$i];

    $j++;

    if ($j > 2) {
      $j = 1;
      $navigation_sections[] = $navigation_section;
      $navigation_section = [];
    }

    $navigation_section[] = $navigation_section_item;
  }

  if (count($navigation_section) > 0) {
    $navigation_sections[] = $navigation_section;
  }

?>

<div class="dropdown-navigation <?php echo esc_attr($modifiers_classes); ?>">
  <!-- DROPDOWN NAVIGATION HEADER -->
  <div class="dropdown-navigation-header">
    <!-- USER STATUS -->
    <div class="user-status">
    <?php

      /**
       * Avatar Small
       */
      get_template_part('template-part/avatar/avatar', 'small', [
        'user'      => $args['user'],
        'modifiers' => 'user-status-avatar',
        'linked'    => vikinger_plugin_buddypress_is_active(),
        'no_border' => true
      ]);

    ?>
  
      <!-- USER STATUS TITLE -->
      <div class="user-status-title">
        <span class="bold">
        <?php

          printf(esc_html_x('Hi %s!', 'Settings dropdown welcome text', 'vikinger'), $args['user']['name']);

          if ($display_verified_in_fullname && $verified_user) {
            echo $vikinger_settings['bp_verified_member_badge'];
          }

        ?>
        </span>

      <?php

        $display_membership_tag = vikinger_plugin_pmpro_buddypress_is_active() && vikinger_pmpro_buddypress_membership_level_tag_display_on_profile_is_enabled() && $args['user']['membership'];

        if ($display_membership_tag) {
          /**
           * Membership Level Tag
           */
          get_template_part('template-part/membership/membership-level', 'tag', [
            'name'      => $args['user']['membership']['name'],
            'modifiers' => 'vikinger-pmpro-level-tag_small'
          ]);
        }

      ?>
      </div>
      <!-- /USER STATUS TITLE -->
  
      <!-- USER STATUS TEXT -->
      <p class="user-status-text small">
      <?php

        echo '&#64;' . esc_html($args['user']['mention_name']);

        if ($display_verified_in_username && $verified_user) {
          echo $vikinger_settings['bp_verified_member_badge'];
        }

      ?>
      </p>
      <!-- /USER STATUS TEXT -->
    </div>
    <!-- /USER STATUS -->

    <!-- DROPDOWN NAVIGATION BUTTON -->
    <a class="dropdown-navigation-button button small secondary" href="<?php echo esc_url(wp_logout_url()); ?>"><?php esc_html_e('Logout', 'vikinger'); ?></a>
    <!-- /DROPDOWN NAVIGATION BUTTON -->
  </div>
  <!-- /DROPDOWN NAVIGATION HEADER -->

<?php if (count($navigation_sections) > 0) : ?>
  <!-- DROPDOWN NAVIGATION SECTIONS -->
  <div class="dropdown-navigation-sections">
  <?php

    foreach ($navigation_sections as $navigation_section) {
  ?>
    <!-- DROPDOWN NAVIGATION SECTION -->
    <div class="dropdown-navigation-section">
  <?php
      foreach ($navigation_section as $navigation_section_item) {
        /**
         * Dropdown Navigation Section
         */
        get_template_part('template-part/navigation/dropdown-navigation-section', null, [
          'section_name'  => $navigation_section_item['title'],
          'section_links' => $navigation_section_item['menu_items']
        ]);
      }
  ?>
    </div>
    <!-- /DROPDOWN NAVIGATION SECTION -->
  <?php
      
    }

  ?>
  </div>
  <!-- /DROPDOWN NAVIGATION SECTIONS -->
<?php endif; ?>
</div>