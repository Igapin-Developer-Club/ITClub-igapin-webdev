<?php
/**
 * Vikinger Template Part - User Status
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type array $user    User data.
 * }
 */

  global $vikinger_settings;

  $display_verified = vikinger_plugin_bpverifiedmember_is_active() && $vikinger_settings['bp_verified_member_display_badge_in_members_lists'];

  $display_verified_in_fullname = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_fullname'];
  $display_verified_in_username = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_username'];

  $verified_user = $display_verified && $args['user']['verified'];

?>

<!-- USER STATUS -->
<div class="user-status">
<?php

  /**
   * Avatar Small
   */
  get_template_part('template-part/avatar/avatar', 'small', [
    'user'      => $args['user'],
    'modifiers' => 'user-status-avatar',
    'linked'    => true,
    'no_border' => true
  ]);

?>
  <!-- USER STATUS TITLE -->
  <div class="user-status-title">
    <a class="bold" href="<?php echo esc_url($args['user']['link']); ?>"><?php echo esc_html($args['user']['name']); ?></a>
  <?php

    if ($display_verified_in_fullname && $verified_user) {
      echo $vikinger_settings['bp_verified_member_badge'];
    }

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
    &#64;<?php echo esc_html($args['user']['mention_name']); ?>
  <?php
    if ($display_verified_in_username && $verified_user) {
      echo $vikinger_settings['bp_verified_member_badge'];
    }
  ?>
  </p>
  <!-- /USER STATUS TEXT -->
</div>
<!-- /USER STATUS -->