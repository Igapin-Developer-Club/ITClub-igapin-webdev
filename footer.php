<?php
/**
 * Vikinger Template - Footer
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  // footer status
  $footer_status = get_theme_mod('vikinger_footer_setting_display', 'display');

  $buddypress_plugin_is_active = vikinger_plugin_buddypress_is_active();

  $display_footer = ($footer_status === 'display') && (($buddypress_plugin_is_active && !bp_is_register_page() && !bp_is_activation_page()) || !$buddypress_plugin_is_active);

  if ($display_footer) :

    // footer logo
    $footer_logo_id = get_theme_mod('vikinger_footer_setting_promo_logo', false);

    // footer text
    $footer_promo_text = get_theme_mod('vikinger_footer_setting_promo_text', false);

    // footer social links
    $footer_setting_social_links = get_theme_mod('vikinger_footer_setting_social_links', []);

    $footer_social_items = [];

    foreach ($footer_setting_social_links as $key => $footer_setting_social_link) {
      // if user entered a link
      if ($footer_setting_social_link !== '') {
        $footer_social_items[] = [
          'name'  => $key,
          'link'  => $footer_setting_social_link
        ];
      }
    }

    if (count($footer_social_items) === 0) {
      $footer_social_items = false;
    }

    // footer navigation
    $footer_menu_items = vikinger_menu_get_items('footer_menu')['threaded'];
    $footer_menu_items = vikinger_menu_group_by_parent($footer_menu_items);

    // footer bottom text
    $footer_bottom_left_text = get_theme_mod('vikinger_footer_setting_bottom_left_text', false);
    $footer_bottom_right_text = get_theme_mod('vikinger_footer_setting_bottom_right_text', false);

?>

<!-- FOOTER WRAP -->
<footer class="footer-wrap">
  <!-- FOOTER -->
  <div class="footer content-grid">
    <!-- FOOTER TOP -->
    <div class="footer-top">
      <!-- FOOTER INFO -->
      <div class="footer-info">
        <!-- FOOTER INFO BRAND -->
        <div class="footer-info-brand">
        <?php

          if ($footer_logo_id) :
            $footer_logo_url = wp_get_attachment_image_src($footer_logo_id , 'full');

        ?>
          <!-- FOOTER INFO BRAND IMAGE -->
          <img class="footer-info-brand-image" src="<?php echo esc_url($footer_logo_url[0]); ?>" alt="brand-image">
          <!-- /FOOTER INFO BRAND IMAGE -->
        <?php

          endif;

        ?>

          <!-- FOOTER INFO BRAND INFO -->
          <div class="footer-info-brand-info">
            <!-- FOOTER INFO BRAND TITLE -->
            <p class="footer-info-brand-title"><?php bloginfo('name'); ?></p>
            <!-- /FOOTER INFO BRAND TITLE -->

            <!-- FOOTER INFO BRAND SUBTITLE -->
            <p class="footer-info-brand-subtitle"><?php bloginfo('description'); ?></p>
            <!-- /FOOTER INFO BRAND SUBTITLE -->
          </div>
          <!-- FOOTER INFO BRAND INFO -->
        </div>
        <!-- /FOOTER INFO BRAND -->

      <?php if ($footer_promo_text) : ?>
        <!-- FOOTER INFO TEXT -->
        <p class="footer-info-text"><?php echo esc_html($footer_promo_text); ?></p>
        <!-- /FOOTER INFO TEXT -->
      <?php endif; ?>

      <?php

        if ($footer_social_items) {
          /**
           * Social Items
           */
          get_template_part('template-part/social/social-items', null, [
            'social_items' => $footer_social_items
          ]);
        }

      ?>
      </div>
      <!-- /FOOTER INFO -->

    <?php if ($footer_menu_items > 0) : ?>
      <!-- FOOTER NAVIGATION -->
      <div class="footer-navigation">
      <?php

        foreach ($footer_menu_items as $key => $footer_menu_item) {
          /**
           * Navigation Section
           */
          get_template_part('template-part/navigation/navigation', 'section', [
            'section_name'  => $key,
            'section_links' => $footer_menu_item
          ]);
        }

      ?>
      </div>
      <!-- /FOOTER NAVIGATION -->
    <?php endif; ?>
    </div>
    <!-- /FOOTER TOP -->

  <?php

    if ($footer_bottom_left_text || $footer_bottom_right_text) :
      $footer_bottom_left_text = $footer_bottom_left_text ? $footer_bottom_left_text : '';
      $footer_bottom_right_text = $footer_bottom_right_text ? $footer_bottom_right_text : '';
  ?>
    <!-- FOOTER BOTTOM -->
    <div class="footer-bottom">
      <!-- FOOTER BOTTOM TEXT -->
      <p class="footer-bottom-text"><?php echo wp_kses($footer_bottom_left_text, ['a' => ['href' => [], 'target' => []]]); ?></p>
      <!-- /FOOTER BOTTOM TEXT -->

      <!-- FOOTER BOTTOM TEXT -->
      <p class="footer-bottom-text"><?php echo wp_kses($footer_bottom_right_text, ['a' => ['href' => [], 'target' => []]]); ?></p>
      <!-- /FOOTER BOTTOM TEXT -->
    </div>
    <!-- /FOOTER BOTTOM -->
  <?php endif; ?>
  </div>
  <!-- /FOOTER -->
</footer>
<!-- /FOOTER WRAP -->

<?php

  endif;
  
?>

<?php wp_footer(); ?>
  
</body>
</html>