<?php
/**
 * Vikinger Template Part - Forum Reply Author
 * 
 * @package Vikinger
 * @since 1.3.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_bbpress_reply_author_get, vikinger_bbpress_author_role_get
 * 
 * @param array $args {
 *   @type array $author        Author data.
 * }
 */

  $vikinger_settings = vikinger_plugin_bpverifiedmember_is_active() ? vikinger_bpverifiedmember_settings_get('replies') : [];

  $display_verified = vikinger_plugin_bpverifiedmember_is_active() && $vikinger_settings['bp_verified_member_display_badge_in_bbp_replies'];

  $display_verified_in_fullname = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_fullname'];
  $display_verified_in_username = $display_verified && $vikinger_settings['bp_verified_member_display_badge_in_profile_username'];

  $verified_author = $args['author']['verified'];

?>

<!-- FORUM REPLY AUTHOR -->
<div class="vikinger-forum-reply-author">
<?php

  /**
   * Avatar
   */
  get_template_part('template-part/avatar/avatar', null, [
    'user'      => $args['author'],
    'linked'    => true,
    'no_border' => true,
    'modifiers' => 'vikinger-forum-reply-author-avatar'
  ]);

?>
  <!-- VIKINGER FORUM REPLY AUTHOR TITLE -->
  <p class="vikinger-forum-reply-author-title">
    <a href="<?php echo esc_url($args['author']['link']); ?>">
    <?php

      echo esc_html($args['author']['name']);

      if ($display_verified_in_fullname && $verified_author) {
        echo vikinger_bpverifiedmember_badge_get();
      }

    ?>
    </a>
  </p>
  <!-- /VIKINGER FORUM REPLY AUTHOR TITLE -->

  <!-- VIKINGER FORUM REPLY AUTHOR TEXT -->
  <p class="vikinger-forum-reply-author-text">
    <a href="<?php echo esc_url($args['author']['link']); ?>">
    <?php

      echo '&#64;' . esc_html($args['author']['mention_name']);

      if ($display_verified_in_username && $verified_author) {
        echo vikinger_bpverifiedmember_badge_get();
      }

    ?>
    </a>
  </p>
  <!-- /VIKINGER FORUM REPLY AUTHOR TEXT -->

  <!-- VIKINGER FORUM REPLY AUTHOR ROLE -->
  <p class="vikinger-forum-reply-author-role"><?php echo esc_html($args['author']['role']); ?></p>
  <!-- /VIKINGER FORUM REPLY AUTHOR ROLE -->
</div>
<!-- /FORUM REPLY AUTHOR -->