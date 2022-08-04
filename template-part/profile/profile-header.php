<?php
/**
 * Vikinger Template Part - Profile Header
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get, vikinger_members_get_xprofile_social_links
 * 
 * @param array $args {
 *   @type array $member            Member data.
 *   @type array $social_links      Social links data.
 * }
 */

  $post_count = $args['member']['stats']['post_count'];
  $friend_count = $args['member']['stats']['friend_count'];
  $comment_count = $args['member']['stats']['comment_count'];

  global $vikinger_settings;

  $display_verified = vikinger_plugin_bpverifiedmember_is_active();

  $display_verified_in_fullname = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_fullname'];
  $display_verified_in_username = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_username'];

  $verified_user = $display_verified && $args['member']['verified'];

?>

<!-- PROFILE HEADER -->
<div class="profile-header">
  <!-- PROFILE HEADER COVER -->
  <div class="profile-header-cover" style="background: url(<?php echo esc_url($args['member']['cover_url']); ?>) center center / cover no-repeat"></div>
  <!-- /PROFILE HEADER COVER -->

  <!-- PROFILE HEADER INFO -->
  <div class="profile-header-info">
    <!-- USER SHORT DESCRIPTION -->
    <div class="user-short-description big">
    <?php

      /**
       * Avatar Big
       */
      get_template_part('template-part/avatar/avatar', 'big', [
        'user'      => $args['member'],
        'modifiers' => 'user-short-description-avatar'
      ]);

      /**
       * Avatar Medium
       */
      get_template_part('template-part/avatar/avatar', 'medium', [
        'user'      => $args['member'],
        'modifiers' => 'user-short-description-avatar user-short-description-avatar-mobile'
      ]);

    ?>

      <!-- USER SHORT DESCRIPTION TITLE -->
      <p class="user-short-description-title">
      <?php

        echo esc_html($args['member']['name']);

        if ($display_verified_in_fullname && $verified_user) {
          echo $vikinger_settings['bp_verified_member_badge'];
        }

      ?>
      </p>
      <!-- /USER SHORT DESCRIPTION TITLE -->

      <?php

        $display_membership_tag = vikinger_plugin_pmpro_buddypress_is_active() && vikinger_pmpro_buddypress_membership_level_tag_display_on_profile_is_enabled() && $args['member']['membership'];

        if ($display_membership_tag) {
          /**
           * Membership Level Tag
           */
          get_template_part('template-part/membership/membership-level', 'tag', [
            'name'  => $args['member']['membership']['name']
          ]);
        }

      ?>

      <!-- USER SHORT DESCRIPTION TEXT -->
      <p class="user-short-description-text">
      <?php

        echo '&#64;' . esc_html($args['member']['mention_name']);

        if ($display_verified_in_username && $verified_user) {
          echo $vikinger_settings['bp_verified_member_badge'];
        }

      ?>
      </p>
      <!-- /USER SHORT DESCRIPTION TEXT -->
    </div>
    <!-- /USER SHORT DESCRIPTION -->

    <?php
    
      $social_links_count = count($args['social_links']);

      if ($social_links_count <= 7) :
        /**
         * Social Links
         */
        get_template_part('template-part/social/social-links', null, [
          'social_links' => $args['social_links']
        ]);
      else :

    ?>
    <!-- PROFILE HEADER SOCIAL LINKS WRAP -->
    <div class="profile-header-social-links-wrap">
      <div id="profile-header-social-links-slider" class="swiper-container">
        <!-- PROFILE HEADER SOCIAL LINKS -->
        <div class="profile-header-social-links swiper-wrapper">
        <?php foreach ($args['social_links'] as $social_link) : ?>
          <div class="profile-header-social-link swiper-slide">
          <?php

            /**
             * Social Link
             */
            get_template_part('template-part/social/social-link', null, [
              'name' => $social_link['name'],
              'link' => $social_link['link']
            ]);

          ?>
          </div>
        <?php endforeach; ?>
        </div>
        <!-- /PROFILE HEADER SOCIAL LINKS -->
      </div>

      <!-- SLIDER CONTROLS -->
      <div class="slider-controls">
        <!-- SLIDER CONTROL -->
        <div id="profile-header-social-links-control-prev" class="slider-control left">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'small-arrow',
            'modifiers' => 'slider-control-icon'
          ]);

        ?>
        </div>
        <!-- /SLIDER CONTROL -->

        <!-- SLIDER CONTROL -->
        <div id="profile-header-social-links-control-next" class="slider-control right">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'small-arrow',
            'modifiers' => 'slider-control-icon'
          ]);

        ?>
        </div>
        <!-- /SLIDER CONTROL -->
      </div>
      <!-- /SLIDER CONTROLS -->
    </div>
    <!-- /PROFILE HEADER SOCIAL LINKS WRAP -->
    <?php

      endif;

      if ($social_links_count <= 4) :
        /**
         * Social Links
         */
        get_template_part('template-part/social/social-links', null, [
          'social_links'  => $args['social_links'],
          'modifiers'     => 'small mobile'
        ]);
      else :

    ?>
    <!-- PROFILE HEADER SOCIAL LINKS WRAP -->
    <div class="profile-header-social-links-wrap mobile">
      <div id="profile-header-social-links-mobile-slider" class="swiper-container">
        <!-- PROFILE HEADER SOCIAL LINKS -->
        <div class="profile-header-social-links swiper-wrapper">
        <?php foreach ($args['social_links'] as $social_link) : ?>
          <div class="profile-header-social-link swiper-slide">
          <?php

            /**
             * Social Link
             */
            get_template_part('template-part/social/social-link', null, [
              'name'      => $social_link['name'],
              'link'      => $social_link['link'],
              'modifiers' => 'small'
            ]);

          ?>
          </div>
        <?php endforeach; ?>
        </div>
        <!-- /PROFILE HEADER SOCIAL LINKS -->
      </div>

      <!-- SLIDER CONTROLS -->
      <div class="slider-controls">
        <!-- SLIDER CONTROL -->
        <div id="profile-header-social-links-mobile-control-prev" class="slider-control left">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'small-arrow',
            'modifiers' => 'slider-control-icon'
          ]);

        ?>
        </div>
        <!-- /SLIDER CONTROL -->

        <!-- SLIDER CONTROL -->
        <div id="profile-header-social-links-mobile-control-next" class="slider-control right">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'      => 'small-arrow',
            'modifiers' => 'slider-control-icon'
          ]);

        ?>
        </div>
        <!-- /SLIDER CONTROL -->
      </div>
      <!-- /SLIDER CONTROLS -->
    </div>
    <!-- /PROFILE HEADER SOCIAL LINKS WRAP -->
    <?php
    
      endif;

    ?>
    <!-- USER STATS -->
    <div class="user-stats">
      <!-- USER STAT -->
      <div class="user-stat big">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title"><?php echo esc_html($post_count); ?></p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text"><?php echo esc_html(_n('post', 'posts', $post_count, 'vikinger')); ?></p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->

    <?php

      // add BuddyPress friend stats data if friends component is active
      if (bp_is_active('friends')) :

    ?>
      <!-- USER STAT -->
      <div class="user-stat big">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title"><?php echo esc_html($friend_count); ?></p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text"><?php echo esc_html(_n('friend', 'friends', $friend_count, 'vikinger')); ?></p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->
    <?php

      endif;

    ?>

      <!-- USER STAT -->
      <div class="user-stat big">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title"><?php echo esc_html($comment_count); ?></p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text"><?php echo esc_html(_n('comment', 'comments', $comment_count, 'vikinger')); ?></p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->
    </div>
    <!-- /USER STATS -->

  <?php if (is_user_logged_in() && bp_is_active('friends')) : ?>
    <!-- PROFILE HEADER ACTIONS -->
    <div id="profile-header-actions" data-userid="<?php echo esc_attr($args['member']['id']); ?>"></div>
    <!-- /PROFILE HEADER ACTIONS -->
  <?php endif; ?>
  </div>
  <!-- /PROFILE HEADER INFO -->
</div>
<!-- /PROFILE HEADER -->