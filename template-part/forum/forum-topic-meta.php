<?php
/**
 * Vikinger Template Part - Forum Topic Meta
 * 
 * @package Vikinger
 * @since 1.3.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_bbpress_forum_last_activity_get
 * 
 * @param array $args {
 *   @type array   $last_activity_data        Last activity data.
 * }
 */

  $vikinger_settings = vikinger_plugin_bpverifiedmember_is_active() ? vikinger_bpverifiedmember_settings_get('topics') : [];

  $display_verified = vikinger_plugin_bpverifiedmember_is_active() && $vikinger_settings['bp_verified_member_display_badge_in_bbp_topics'];

  $verified_user = $args['last_activity_data']['author']['verified'];

?>

<!-- FORUM TOPIC META -->
<div class="forum-topic-meta">
  <!-- FORUM TOPIC META TITLE -->
  <a class="forum-topic-meta-title" href="<?php echo esc_url($args['last_activity_data']['link']); ?>"><?php echo esc_html($args['last_activity_data']['title']); ?></a>
  <!-- /FORUM TOPIC META TITLE -->

  <!-- FORUM TOPIC META AUTHOR WRAP -->
  <div class="forum-topic-meta-author-wrap">
    <!-- FORUM TOPIC META AUTHOR -->
    <div class="forum-topic-meta-author">
    <?php

      /**
       * Avatar Micro
       */
      get_template_part('template-part/avatar/avatar', 'micro', [
        'user'      => $args['last_activity_data']['author'],
        'linked'    => true,
        'no_border' => true,
        'modifiers' => 'forum-topic-meta-author-avatar'
      ]);

    ?>

      <!-- FORUM TOPIC META AUTHOR TITLE -->
      <a href="<?php echo esc_url($args['last_activity_data']['author']['link']); ?>" class="forum-topic-meta-author-title">
      <?php

        echo esc_html($args['last_activity_data']['author']['name']);

        if ($display_verified && $verified_user) {
          echo vikinger_bpverifiedmember_badge_get();
        }

      ?>
      </a>
      <!-- /FORUM TOPIC META AUTHOR TITLE -->
    </div>
    <!-- /FORUM TOPIC META AUTHOR -->

    <!-- FORUM TOPIC META TIMESTAMP -->
    <p class="forum-topic-meta-timestamp"><?php echo esc_html($args['last_activity_data']['time_since']); ?></p>
    <!-- /FORUM TOPIC META TIMESTAMP -->
  </div>
  <!-- /FORUM TOPIC META AUTHOR WRAP -->
</div>
<!-- /FORUM TOPIC META -->