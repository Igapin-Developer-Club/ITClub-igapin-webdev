<!-- VK CONTENT -->
<div class="vk-content">
  <!-- SECTION BANNER -->
  <div class="section-banner">
    <!-- SECTION BANNER ICON-->
    <svg class="section-banner-icon icon-logo-vikinger">
      <use href="#svg-logo-vikinger"></use>
    </svg>
    <!-- /SECTION BANNER ICON-->

    <!-- SECTION BANNER PRETITLE -->
    <p class="section-banner-pretitle">
    <?php

      printf(
        esc_html__('Version %s', 'vikinger'),
        VIKINGER_VERSION
      );

    ?>
    </p>
    <!-- /SECTION BANNER PRETITLE -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title"><?php esc_html_e('Demo Import', 'vikinger'); ?></p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">
    <?php
    
      echo wp_kses(
        sprintf(
          esc_html__('%sThank you for your purchase!%s Below you can import content from the theme demo into your theme!.', 'vikinger'),
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION BANNER TEXT -->
  </div>
  <!-- /SECTION BANNER -->

  <!-- SECTION -->
  <div class="section">
    <!-- SECTION TOP IMAGE -->
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/plugins.png" alt="plugins">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Demo Import', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Import Demo Content', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('From here you can choose demo content to import to your theme.%s%sBefore using this, make sure you have completed the theme install and setup process as detailed in the %sdocumentation%s "Getting Started" section.%s', 'vikinger'),
          '<br><br>',
          '<strong>',
          '<a href="https://odindesignthemes.com/vikingerthemedocs/how-to-install/" target="_blank">',
          '</a>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- MESSAGE BOX -->
    <div class="message-box message-box-info">
      <!-- MESSAGE BOX ICON WRAP -->
      <div class="message-box-icon-wrap">
        <!-- MESSAGE BOX ICON -->
        <svg class="message-box-icon icon-info">
          <use href="#svg-info"></use>
        </svg>
        <!-- /MESSAGE BOX ICON -->
      </div>
      <!-- /MESSAGE BOX ICON WRAP -->

      <!-- MESSAGE BOX TITLE -->
      <p class="message-box-title"><?php esc_html_e('Important:', 'vikinger'); ?></p>
      <!-- /MESSAGE BOX TITLE -->

      <!-- MESSAGE BOX TEXT -->
      <p class="message-box-text"><?php esc_html_e('You can use the checkboxes below to select which data you wish to import. The data can be imported any number of times, if you wish to delete data imported using this tool, please select them from the list below and click the "Reset" button.', 'vikinger'); ?></p>
      <!-- /MESSAGE BOX TEXT -->
    </div>
    <!-- /MESSAGE BOX -->

    <!-- VK DEMO IMPORT LIST -->
    <div id="vk-demo-import-list"></div>
    <!-- /VK DEMO IMPORT LIST -->
  </div>
  <!-- /SECTION -->
</div>
<!-- /VK CONTENT -->