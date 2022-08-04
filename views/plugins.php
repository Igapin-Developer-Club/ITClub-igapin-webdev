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
    <p class="section-banner-title"><?php esc_html_e('Theme Plugins', 'vikinger'); ?></p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">
    <?php
    
      echo wp_kses(
        sprintf(
          esc_html__('%sThank you for your purchase!%s Below you will find information on how to install theme plugins to start using it!.', 'vikinger'),
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
    <p class="section-pretitle"><?php esc_html_e('Plugins', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Preset Selection', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You can choose a preset below or use the "Custom" option to manually select which plugins you want to install (we recommend using a preset to avoid issues with missing/required plugins).%sIf a selected plugin is not installed, updated or activated, a button will appear below that you can click to bulk install, update or activate all missing plugins!.%sThe theme will do its best to try and install, update and activate all the plugins in the list, but it can happen that a plugin fails to install, update or activate. In this case, just use the same button again to complete the process. %s%sPlease be patient as the process may take a few minutes.%s', 'vikinger'),
          '<br><br>',
          '<br><br>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- VK REQUIRED PLUGIN LIST -->
    <div id="vk-required-plugin-list"></div>
    <!-- /VK REQUIRED PLUGIN LIST -->
  </div>
  <!-- /SECTION -->
</div>
<!-- /VK CONTENT -->