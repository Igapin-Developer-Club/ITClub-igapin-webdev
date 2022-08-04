<?php
/**
 * Vikinger Template Part - Profile Header V2
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_groups_get
 * 
 * @param array $args {
 *   @type array $group   Group data.
 * }
 */

  $member_count = $args['group']['total_member_count'];
  $post_count = $args['group']['post_count'];

  $group_status_text = '';

  switch ($args['group']['status']) {
    case 'public':
      $group_status_text = esc_html__('Public', 'vikinger');
      break;
    case 'private':
      $group_status_text = esc_html__('Private', 'vikinger');
      break;
    case 'hidden':
      $group_status_text = esc_html__('Hidden', 'vikinger');
      break;
  }

?>

<!-- PROFILE HEADER -->
<div class="profile-header v2">
  <!-- PROFILE HEADER COVER -->
  <div class="profile-header-cover" style="background: url(<?php echo esc_url($args['group']['cover_image_url']); ?>) center center / cover no-repeat"></div>
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
        'user'      => $args['group'],
        'modifiers' => 'user-short-description-avatar'
      ]);
    
      /**
       * Avatar Medium
       */
      get_template_part('template-part/avatar/avatar', 'medium', [
        'user'      => $args['group'],
        'modifiers' => 'user-short-description-avatar user-short-description-avatar-mobile'
      ]);
    
    ?>

      <!-- USER SHORT DESCRIPTION TITLE -->
      <p class="user-short-description-title"><?php echo esc_html($args['group']['name']); ?></p>
      <!-- /USER SHORT DESCRIPTION TITLE -->

      <!-- USER SHORT DESCRIPTION TEXT -->
      <p class="user-short-description-text">&#64;<?php echo esc_html($args['group']['slug']); ?></p>
      <!-- /USER SHORT DESCRIPTION TEXT -->
    </div>
    <!-- /USER SHORT DESCRIPTION -->

    <!-- USER STATS -->
    <div class="user-stats">
      <!-- USER STAT -->
      <div class="user-stat big">
        <!-- USER STAT ICON -->
        <div class="user-stat-icon">
        <?php

          /**
           * Icon SVG
           */
          get_template_part('template-part/icon/icon', 'svg', [
            'icon'  => $args['group']['status']
          ]);

        ?>
        </div>
        <!-- /USER STAT ICON -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text"><?php echo esc_html($group_status_text); ?></p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->

      <!-- USER STAT -->
      <div class="user-stat big">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title"><?php echo esc_html($member_count); ?></p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text"><?php echo esc_html(_n('member', 'members', $member_count, 'vikinger')); ?></p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->

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
    </div>
    <!-- /USER STATS -->

    <!-- TAG STICKER -->
    <div class="tag-sticker">
    <?php

      /**
       * Icon SVG
       */
      get_template_part('template-part/icon/icon', 'svg', [
        'icon'      => $args['group']['status'],
        'modifiers' => 'tag-sticker-icon'
      ]);

    ?>
    </div>
    <!-- /TAG STICKER -->

  <?php if (is_user_logged_in()) : ?>
    <!-- GROUP HEADER ACTIONS -->
    <div id="group-header-actions" data-groupid="<?php echo esc_attr($args['group']['id']); ?>"></div>
    <!-- /GROUP HEADER ACTIONS -->
  <?php endif; ?>
  </div>
  <!-- /PROFILE HEADER INFO -->
</div>
<!-- /PROFILE HEADER -->