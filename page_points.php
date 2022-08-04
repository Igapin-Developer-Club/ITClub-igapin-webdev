<?php
/**
 * Template Name: Points Page
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
    // get achievement page data
    $queried_object = get_queried_object();

    $title = $queried_object->post_title;
    $description = wp_strip_all_tags($queried_object->post_content);
    $slug = $queried_object->post_name;
  }

  get_header();

?>

  <!-- CONTENT GRID -->
  <div class="content-grid">
  <?php

    if (!$logged_user_has_membership_access) {
      echo $post_access_data['message'];
    } else {
      $page_header_status = get_theme_mod('vikinger_pageheader_setting_display', 'display');

      if ($page_header_status === 'display') {
        $point_header_icon_id      = get_theme_mod('vikinger_pageheader_point_setting_image', false);
        $point_header_title        = get_theme_mod('vikinger_pageheader_point_setting_title', esc_html_x('Credits', 'Credits Page - Title', 'vikinger'));
        $point_header_description  = get_theme_mod('vikinger_pageheader_point_setting_description', esc_html_x('Browse all the credits of the community!', 'Credits Page - Description', 'vikinger'));

        if ($point_header_icon_id) {
          $point_header_icon_url = wp_get_attachment_image_src($point_header_icon_id , 'full')[0];
        } else {
          $point_header_icon_url = vikinger_customizer_point_page_image_get_default();
        }

        /**
         * Section Banner
         */
        get_template_part('template-part/section/section', 'banner', [
          'section_icon_url'    => $point_header_icon_url,
          'section_title'       => $point_header_title,
          'section_description' => $point_header_description
        ]);
      }

      $points = vikinger_gamipress_get_logged_user_points();

      if ($points) :
        /**
         * Section Header
         */
        get_template_part('template-part/section/section', 'header', [
          'section_pretitle'  => esc_html__('Browse your', 'vikinger'),
          'section_title'     => esc_html__('Credits Balance', 'vikinger')
        ]);

  ?>
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 centered-on-mobile">
    <?php

        foreach ($points as $point) {
          /**
           * Point Item Box
           */
          get_template_part('template-part/point/point-item', 'box', [
            'point' => $point
          ]);
        }
        
    ?>
    </div>
    <!-- /GRID -->
  <?php

    endif;

    /**
     * Credits Awards
     */
    $point_types_awards = vikinger_gamipress_get_point_type_awards();

    if ($point_types_awards) :
      /**
       * Section Header
       */
      get_template_part('template-part/section/section', 'header', [
        'section_pretitle'  => esc_html__('Complete tasks!', 'vikinger'),
        'section_title'     => esc_html__('Credits Awards', 'vikinger')
      ]);
  ?>
    <div class="grid grid-half">
    <?php

    foreach ($point_types_awards as $point_type_awards) {
      foreach ($point_type_awards as $point_type_award) {
        /**
         * Point Reward Box
         */
        get_template_part('template-part/point/point-reward', 'box', [
          'point' => $point_type_award
        ]);
      }
    }

    ?>
    </div>
  <?php

    endif;

    /**
     * Credits Deducts
     */
    $point_types_deducts = vikinger_gamipress_get_point_type_deducts();

    if ($point_types_deducts) :
      /**
       * Section Header
       */
      get_template_part('template-part/section/section', 'header', [
        'section_pretitle'  => esc_html__('Watch out for', 'vikinger'),
        'section_title'     => esc_html__('Credits Deducts', 'vikinger')
      ]);
  ?>
    <div class="grid grid-half">
    <?php

    foreach ($point_types_deducts as $point_type_deducts) {
      foreach ($point_type_deducts as $point_type_deduct) {
        /**
         * Point Reward Box
         */
        get_template_part('template-part/point/point-reward', 'box', [
          'point'       => $point_type_deduct,
          'point_type'  => 'deduct'
        ]);
      }
    }

    ?>
    </div>
  <?php

      endif;
    }

  ?>
  </div>
  <!-- /CONTENT GRID -->

<?php get_footer(); ?>