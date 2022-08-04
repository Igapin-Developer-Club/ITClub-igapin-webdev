<?php
/**
 * Template Name: Ranks Page
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
    // check if rank unlock is submitted
    $rank_unlock_submitted = isset($_POST['achievement_unlock']);

    // if achievement unlock submitted
    if ($rank_unlock_submitted) {
      $rank_unlock_id = absint($_POST['achievement_unlock_id']);
      $rank_unlocked = vikinger_gamipress_unlock_logged_user_rank_with_points($rank_unlock_id);

      // Redirect to same page to avoid form resubmission
      $redirect_url = esc_url(home_url($wp->request));
      wp_safe_redirect($redirect_url);
      exit;
    }
  }

  get_header();

  $rank_type = 'rank';

?>

  <!-- CONTENT GRID -->
  <div class="content-grid">
  <?php

    if (!$logged_user_has_membership_access) {
      echo $post_access_data['message'];
    } else {
      $page_header_status = get_theme_mod('vikinger_pageheader_setting_display', 'display');

      if ($page_header_status === 'display') {
        $rank_header_icon_id      = get_theme_mod('vikinger_pageheader_rank_setting_image', false);
        $rank_header_title        = get_theme_mod('vikinger_pageheader_rank_setting_title', esc_html_x('Ranks', 'Ranks Page - Title', 'vikinger'));
        $rank_header_description  = get_theme_mod('vikinger_pageheader_rank_setting_description', esc_html_x('Browse all the ranks of the community!', 'Ranks Page - Description', 'vikinger'));

        if ($rank_header_icon_id) {
          $rank_header_icon_url = wp_get_attachment_image_src($rank_header_icon_id , 'full')[0];
        } else {
          $rank_header_icon_url = vikinger_customizer_rank_page_image_get_default();
        }

        /**
         * Section Banner
         */
        get_template_part('template-part/section/section', 'banner', [
          'section_icon_url'    => $rank_header_icon_url,
          'section_title'       => $rank_header_title,
          'section_description' => $rank_header_description
        ]);
      }

      $ranks = vikinger_gamipress_get_logged_user_ranks($rank_type);
      $user_points = vikinger_gamipress_get_logged_user_points();

      if (count($ranks)) :

  ?>
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 medium-space centered-on-mobile grid-stretched">
    <?php

      foreach ($ranks as $rank) {
        $rank_args['achievement'] = $rank;

        /**
         * Achievement Item Box
         */
        get_template_part('template-part/achievement/achievement', 'item-box', [
          'achievement'               => $rank,
          'user_points'               => $user_points,
          'achievement_complete_info' => true,
          'achievement_type'          => 'rank'
        ]);
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