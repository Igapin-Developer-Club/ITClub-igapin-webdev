<?php
/**
 * Template Name: Quests Page
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $logged_user_has_membership_access = true;
    
  if (vikinger_plugin_pmpro_is_active()) {
    $post_access_data = vikinger_pmpro_post_access_data_get();
    $logged_user_has_membership_access = $post_access_data['accessible'];
  }

  if ($logged_user_has_membership_access) {
    // check if achievement unlock is submitted
    $achievement_unlock_submitted = isset($_POST['achievement_unlock']);

    // if achievement unlock submitted
    if ($achievement_unlock_submitted) {
      $achievement_unlock_id = absint($_POST['achievement_unlock_id']);
      $achievement_unlocked = vikinger_gamipress_unlock_logged_user_achievement_with_points($achievement_unlock_id);

      // Redirect to same page to avoid form resubmission
      $redirect_url = esc_url(home_url($wp->request));
      wp_safe_redirect($redirect_url);
      exit;
    }
  }

  get_header();

  $achievement_type = 'quest';

?>

  <!-- CONTENT GRID -->
  <div class="content-grid">
  <?php

    if (!$logged_user_has_membership_access) {
      echo $post_access_data['message'];
    } else {
      $page_header_status = get_theme_mod('vikinger_pageheader_setting_display', 'display');

      if ($page_header_status === 'display') {
        $quest_header_icon_id      = get_theme_mod('vikinger_pageheader_quest_setting_image', false);
        $quest_header_title        = get_theme_mod('vikinger_pageheader_quest_setting_title', esc_html_x('Quests', 'Quests Page - Title', 'vikinger'));
        $quest_header_description  = get_theme_mod('vikinger_pageheader_quest_setting_description', esc_html_x('Browse all the quests of the community!', 'Quests Page - Description', 'vikinger'));

        if ($quest_header_icon_id) {
          $quest_header_icon_url = wp_get_attachment_image_src($quest_header_icon_id , 'full')[0];
        } else {
          $quest_header_icon_url = vikinger_customizer_quest_page_image_get_default();
        }

        /**
         * Section Banner
         */
        get_template_part('template-part/section/section', 'banner', [
          'section_icon_url'    => $quest_header_icon_url,
          'section_title'       => $quest_header_title,
          'section_description' => $quest_header_description
        ]);
      }

      $achievements = vikinger_gamipress_get_logged_user_achievements($achievement_type);
      $user_points = vikinger_gamipress_get_logged_user_points();

      if (count($achievements)) :

  ?>
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 medium-space centered-on-mobile grid-stretched">
    <?php

      $achievement_args = [
        'user_points'               => $user_points,
        'achievement_complete_info' => true
      ];

      if ($achievement_type === 'quest') {
        $achievement_args['achievement_image_wrap'] = true;
      }

      foreach ($achievements as $achievement) {
        $achievement_args['achievement'] = $achievement;

        /**
         * Achievement Item Box
         */
        get_template_part('template-part/achievement/achievement', 'item-box', $achievement_args);
      }
      
    ?>
    </div>
    <!-- /GRID -->
  <?php

      endif;
    }
  
  ?>
  </div>
  <!-- /CONTENT GRID -->

<?php get_footer(); ?>