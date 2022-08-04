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
    <p class="section-banner-title"><?php esc_html_e('Changelog', 'vikinger'); ?></p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">
    <?php
    
      echo wp_kses(
        sprintf(
          esc_html__('%sThank you for your purchase!%s Below you will find information on theme updates!.', 'vikinger'),
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
    <p class="section-pretitle"><?php esc_html_e('Changelog', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('How to update the theme?', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You can either update the theme manually (download the theme package when an update is released and when uploading the theme zip file – vikinger.zip – via WordPress backend you will be asked if you want to overwrite the theme files with the new version), or you can use the %sEnvato Market WordPress Plugin%s.%s %sDo not delete any of the theme required plugins or you will loose all associated data, like reactions and images.%s', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.7.6" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Aug 2, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.7.6</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause some account hub links to be incorrect when disabling the activity streams component.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed a styling issue with user preview widget footer actions on mobile.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed a styling issue with user profile actions on mobile.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved group manager error handling and information provided to user in case of error.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new option in the Customizer "Vikinger Settings" -> "Members" that allows to select the amount of members that display per page in member lists.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new option in the Customizer "Vikinger Settings" -> "Groups" that allows to select the amount of groups that display per page in group lists.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.7.5.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Jun 18, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.7.5.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Elementor', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause some elements styles (outside of the elementor page area) to be incorrect in elementor pages.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.7.5" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Jun 09, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.7.5</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Admin', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Removed white space that displayed at the top of Vikinger backend pages.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('bbPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved <code> HTML element styles.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Elementor', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause font family, color and line height to be overridden by theme styles.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Paid Memberships Pro', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved login page styles.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Documentation', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Updated theme documentation content, improved navigation and performance and updated documentation links in the theme backend.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.7.4" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">May 17, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.7.4</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the profile action button text to not display correctly on mobile resolutions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Member profile links now direct to the corresponding user "About" page when the BuddyPress "Activity Streams" component is disabled.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Paid Memberships Pro', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added the Paid Memberships Pro login page as an exception by default when the "Force Login" option is enabled.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.7.3" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Mar 25, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.7.3</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('GamiPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused point, achievement and rank type images to not display correctly on multisite.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.7.2" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Mar 24, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.7.2</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Blog', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would not hide the blog banner in Gallery, Video and Audio posts when the "Vikinger Settings" -> "Page Headers" -> "Display / Hide" was set to "Hide".', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused circle and square avatar types to not display on activity status texts.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused activity share and upload popups to not hide after posting the shared content.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Elementor', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Replaced deprecated _register_controls() function.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.7.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Mar 3, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.7.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Elementor', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue introduced in the previous update that would reset styles for more elements than intended.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new version of the landing page Elementor template, which fixes several element positioning issues.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.7" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Mar 1, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.7</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would allow the use of mention functionality when the friends component was disabled.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Activity YouTube embeds now also support the short URL format (https://youtu.be/videoID).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Elementor', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause some styles to not display correctly.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.6.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Jan 28, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.6.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('User account hub email settings page no longer displays settings related to a disabled BuddyPress component.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('If all email settings related components are disabled, the "Email Settings" account hub page and menu items wil not be created.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('bbPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused notifications for actions added in a bbPress update to display "undefined" instead of a description text.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Better Messages', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added dark themed styles for the "Private Message" link in bbPress reply author boxes.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.6" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Jan 15, 2022</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.6</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue with an undefined variable in the "Vikinger - BuddyPress Extension" plugin. Please update the plugin to its latest version (v1.1.1) by using the theme installer (Vikinger -> General).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Blog', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added support for custom post types in category, tag and archive pages.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Updated bp_has_profile() function argument in the "register.php" template file.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Elementor', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Replaced deprecated _content_template() function.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.5" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Dec 21, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.5</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause the newsfeed to crash if a data inconsistency was found in group activities.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Individual photo activities on mobile now display activity information, comment form and reactions below the photo.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Better Messages', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added styles for new chat elements.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added styles for the modern messages layout.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The header messages widget is now replaced with the "Better Messages" interactive widget when the plugin is installed and active.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.4" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Dec 08, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.4</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused post, comment and activity reactions to not display localized / translated text. Please update the "Vikinger Reactions" and "Vikinger Reactions - BuddyPress Integration" plugins to their latest versions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused media upload activities to not save correctly in certain conditions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.3" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Nov 23, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.3</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that prevented the activation page text from including HTML tags.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('GamiPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that prevented points being awarded when using the "Publish an activity post in a group" action.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that prevented points being awarded when using the "Create a group" action.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.2" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Oct 07, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.2</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused GamiPress member ranks to report as 0 when the "Rank" rank type was deleted.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused GamiPress credits widget to display on member profile newsfeed pages even when there weren\'t any existing point types.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused GamiPress achievements to show +0 points when the respective achievement didn\'t award any points.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Sep 25, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the side menu to not open when used in pages that didn\'t have the theme content grid.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused rank description data to not display.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that prevented group enable forum status from being correctly disabled.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that prevented the register page text from including HTML tags.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The BuddyPress "bp_activity_get" function is no longer used to compute group post count as it always returns 0 if the user is not logged in, causing group post counts across the site to report 0 posts in a group even if it had posts.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Photo Upload', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added the "Photo Upload - Allowed Extensions - Case Sensitive" option to the Customizer "Vikinger Settings" -> "Media". Users can choose to disable this option to allow any capitalization combination of the file extensions entered in the "Photo Upload - Allowed Extensions" option to be used. For example, if the allowed extension is "jpg" and this option is disabled, then the following extensions will be allowed: "jpg", "JPG", "Jpg", etc.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Video Upload', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added the "Video Upload - Allowed Extensions - Case Sensitive" option to the Customizer "Vikinger Settings" -> "Media". Users can choose to disable this option to allow any capitalization combination of the file extensions entered in the "Video Upload - Allowed Extensions" option to be used. For example, if the allowed extension is "mp4" and this option is disabled, then the following extensions will be allowed: "mp4", "MP4", "Mp4", etc.
', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Twitch Integration', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added the "Profile Stream Page - Order" option in the Customizer "Vikinger Settings" -> "Members" section, which allows users to control the menu item position of the Stream profile page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Force Login', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Exception Page URLs now allow strict match comparison if you don\'t use regex in your URL. This means that, for example, if "https://www.mysitedomain.com/" is set as exception, URLs like "https://www.mysitedomain.com/members/" will not match.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Child Theme', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added additional constants and function checks in the parent theme to allow more constants and functions to be overridden in the child theme.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added actions and filters in several parent theme functions to allow easier customization via the child theme (more than 60 filters / actions have been added).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new backend page called "Hooks" with a list of all the hooks that are available for use in the theme.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Hooks available with this update:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Filters (60)', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('WordPress (14)', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->

            <!-- UNORDERED LIST -->
            <ul class="unordered-list">
              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Blog (9)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_posts_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_posts_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_posts_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_posts_get_count_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_posts_get_sticky_posts_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_posts_get_sticky_posts_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_pages_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_pages_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_pages_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->

              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Comments (3)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_comments_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_comments_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_comments_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->

              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('User (2)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_users_grid_type_default</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_users_sidemenu_status_default</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->
            </ul>
            <!-- /UNORDERED LIST -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('BuddyPress (35)', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->

            <!-- UNORDERED LIST -->
            <ul class="unordered-list">
              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Members (13)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_get_count_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_get_post_count_activity_components</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_get_post_count_activity_types</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_get_comment_count_activity_components</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_get_comment_count_activity_types</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_profile_navigation_items</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_profile_navigation_items_default_position</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_profile_navigation_subitems</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_accounthub_navigation_sections</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_members_xprofile_valid_social_networks</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->

              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Groups (11)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_count_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_members_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_members_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_members_count_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_post_count_activity_components</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_get_post_count_activity_types</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_profile_navigation_items</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_groups_meta_valid_social_networks</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->

              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Activities (4)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_activities_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_activities_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_activities_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_activities_get_count_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->

              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Messages (3)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_messages_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_messages_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_messages_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->

              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Notifications (3)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_notifications_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_notifications_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_notifications_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->

              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Stream (1)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_streams_twitch_embed_iframe_src</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->
            </ul>
            <!-- /UNORDERED LIST -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Media (5)', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->

            <!-- UNORDERED LIST -->
            <ul class="unordered-list">
              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('File (5)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_file_default_allowed_type_extensions</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_file_member_root_uploads_path</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_file_member_root_uploads_url</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_file_group_root_uploads_path</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_file_group_root_uploads_url</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->
            </ul>
            <!-- /UNORDERED LIST -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('GamiPress (6)', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->

            <!-- UNORDERED LIST -->
            <ul class="unordered-list">
              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Achievements (3)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_achievements_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_achievements_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_achievements_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->

              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('Ranks (3)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_ranks_get_args</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_ranks_get_data</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_ranks_get_results</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->
            </ul>
            <!-- /UNORDERED LIST -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Actions (2)', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Media (2)', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->

            <!-- UNORDERED LIST -->
            <ul class="unordered-list">
              <!-- UNORDERED LIST ITEM -->
              <li class="unordered-list-item">
                <!-- UNORDERED LIST ITEM TEXT -->
                <p class="unordered-list-item-text"><?php esc_html_e('File (2)', 'vikinger'); ?></p>
                <!-- /UNORDERED LIST ITEM TEXT -->

                <!-- UNORDERED LIST -->
                <ul class="unordered-list">
                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_file_uploaded</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->

                  <!-- UNORDERED LIST ITEM -->
                  <li class="unordered-list-item">
                    <!-- UNORDERED LIST ITEM TEXT -->
                    <p class="unordered-list-item-text">vikinger_file_deleted</p>
                    <!-- /UNORDERED LIST ITEM TEXT -->
                  </li>
                  <!-- /UNORDERED LIST ITEM -->
                </ul>
                <!-- /UNORDERED LIST -->
              </li>
              <!-- /UNORDERED LIST ITEM -->
            </ul>
            <!-- /UNORDERED LIST -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.9.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Aug 31, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.9.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved notification support by adding a new text only notification format that will be used to display unrecognized notifications.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('GamiPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved error handling when a user assigned points to a badge or quest but didn\'t select a point type.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('WordPress shortcodes and blocks used in the badges or quests description field are now displated in the individual achievement box template.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BP Better Messages', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved chat header and footer styles.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Account Hub', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Removed the account hub side menu on mobile resolutions, removing the need for users to scroll down to be able to see the respective page main content. All account hub side menu items are available in the mobile menu of the site.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Paid Memberships Pro - BuddyPress Add On', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added support for membership level display on reaction popups when the "Show Membership Level on BuddyPress Profile?" option is set to "Yes".', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Twitch Integration', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Twitch video (https://www.twitch.tv/videos/{video_id}) and channel (https://www.twitch.tv/{channel_username}) links that users post on activities will now be converted into an embedded player that allows other users to directly watch the linked video or channel.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('A new "Stream" setting page has been added to the Customizer ("Vikinger Settings" -> "Stream") that allows to configure the new stream profile page, widget, account hub page and related functionalities. The following options have been added:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Stream Profile - Status: you can choose to enable or disable Twitch profile functionality (disabling this will remove the profile activity widget, profile activity page and account hub settings page).', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text">
            <?php

              printf(
                esc_html__('Twitch Embeds - Parent Domain: In order to be able to use the Twitch Embedded Player (display twitch videos on any part of the site), Twitch requires that your site has a valid SSL certificate (HTTPS site) and that you specify the parent domain/s where the videos will be embedded (i.e.: "mysite.com"). Please enter your site domain/s in this option, you can enter multiple by separating them with a comma (,). You can check the requirements on this %sofficial Twitch post%s.', 'vikinger'),
                '<a href="https://discuss.dev.twitch.tv/t/twitch-embedded-player-updates-in-2020/23956" target="_blank">',
                '</a>'
              );

            ?>
            </p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When the "Stream Profile - Status" option is enabled, users will be able to display any Twitch stream in their profile by entering the respective Twitch channel username in the account hub "Stream" settings page. A new widget ("Stream Box") will display on each user timeline that will display that stream and a new profile page (stream) will show a larger version of the embedded player.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Please remember to correctly configure the "Twitch Embeds - Parent Domain" and to have a valid SSL certificate on your site (HTTPS site), these are Twitch requirements and the player won\'t function correctly if you don\'t follow them.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          printf(
            esc_html__('You can check this %sofficial Twitch post%s for more details.', 'vikinger'),
            '<a href="https://discuss.dev.twitch.tv/t/twitch-embedded-player-updates-in-2020/23956" target="_blank">',
            '</a>'
          );

        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Advanced Ads', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          printf(
            esc_html__(' Added partial support (some options and conditions are not supported) for the %sAdvanced Ads%s plugin.', 'vikinger'),
            '<a href="https://bit.ly/3k7zMdR" target="_blank">',
            '</a>'
          );

        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Advanced Ads Pro (Pro Addon - Not Included)', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          printf(
            esc_html__(' Added partial support (some options and conditions are not supported) for the %sAdvanced Ads Pro%s plugin.', 'vikinger'),
            '<a href="https://bit.ly/3k7zMdR" target="_blank">',
            '</a>'
          );

        ?>  
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.8.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Aug 14, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.8.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed several warnings and errors that would occur when different plugin combinations where active.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Any combination of supported / included plugins can now be used (as long as the plugins they depend on are installed and active, i.e. "Verified Member for BuddyPress" won\'t work if "BuddyPress" is not installed and active).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the "Login Page - Text" content being double filtered, which prevented the use of <br> tags in its content.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Header', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The header search dropdown is now hidden on mobile and a new icon has been added (magnifying glass) that users can click to display it.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The header now displays icon links for notifications, messages and the WooCommerce cart on mobile (if the WooCommerce plugin is active). These allow users to quickly visualize if they have new notifications, messages or items in the cart while browsing the site on mobile resolutions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Comments', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Replaced the comments "submit on enter" functionality with a "Post" button on mobile resolutions, allowing the use of the "Enter" key to add new lines.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('GamiPress', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Limited the amount of achievement and rank earners that display on badges, quests and ranks widgets.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('GamiPress - bbPress Integration', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added styles for point type display in author blocks.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('WooCommerce', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The dashboard page has been removed from the menu items and has been replaced with the orders page as the my-account root page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Force Login', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The force login theme feature has been improved by replacing the page redirect and page exceptions options with URLs. This gives site admins more control over which pages can be made accessible when the Force Login option is enabled.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('WordPress register page and BuddyPress register and activation pages are now always accessible, even when the force login option is enabled. If you use the Paid Memberships Pro plugin memberships page as register page instead, please remember to add it as an exception to allow users to access it.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Social Networks', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('More social networks have been made available to add for members, groups and the footer of the site. The following social networks have been added:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Members and Groups:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Unsplash', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Flickr', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Footer:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Spotify', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Discord', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Paid Memberships Pro', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          printf(
            esc_html__('Added support for the %sPaid Memberships Pro%s plugin.', 'vikinger'),
            '<a href="https://bit.ly/3fQv83h" target="_blank">',
            '</a>'
          );
          
        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Site admins can now require their users to have a certain membership to be able to access or engage with restricted content, like posts, pages, etc.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Paid Memberships Pro - bbPress Add On', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          printf(
            esc_html__('Added support for the %sPaid Memberships Pro - bbPress Add On%s plugin.', 'vikinger'),
            '<a href="https://bit.ly/3xM9q5Y" target="_blank">',
            '</a>'
          );
          
        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Site admins can now require their users to have a certain membership to be able to access certain forums.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Paid Memberships Pro - BuddyPress Add On', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          printf(
            esc_html__('Added support for the %sPaid Memberships Pro - BuddyPress Add On%s plugin.', 'vikinger'),
            '<a href="https://bit.ly/3xIoQZe" target="_blank">',
            '</a>'
          );
          
        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Site admins can now require their users to have a certain membership to be able to access or engage with certain BuddyPress content and functionality.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.7.0.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Jul 31, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.7.0.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the member posts page blog to not display.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.7.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Jul 24, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.7.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause an error in the single template when the GamiPress plugin wasn\'t active.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the cursor showing as a pointer on images that belong to a shared post.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed overflowing title and text on member and group widgets.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Replaced the new font added by WordPress on their latest update to the login page password field with the theme primary font.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed unrecognized notifications being displayed in the header notifications dropdown and notification account hub page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Color Presets', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added site overlay color to the available colors (overlay that displays when opening the mobile sidemenu, popups, etc).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Filter Lists', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When changing pages on filter lists (member, group and post lists), the user is now scrolled to the top of the list.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Header Search', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The search dropdown right side icons for blog posts now display differently according to the corresponding post format.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The search dropdown right side icons for groups now indicate if the corresponding group is public or private.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The search dropdown placeholder text is no longer automatically generated and is now available for translation in the "vikinger.pot" file.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Blog', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Any post type can now be displayed in the site blog page, search page and header search dropdown.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Post lists can now be split, allowing to display one list per post type in the site blog page, search page and header search dropdown.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('A post type filter can now be added to posts lists when displaying more than one post type and not using the post type split option.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Several options where added to the WordPress "Customizer" -> "Vikinger Settings" -> "Blog" section that allow the control of these new features:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Post Types - Display in Blog: You can enter the post types allowed for display in the site blog. Enter each post type you want to display separated by a comma (,).', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Post Types - Display in Search: You can enter the post types allowed for display in the site search. Enter each post type you want to display separated by a comma (,).', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Post Types - Split Display: If enabled, one post list will be displayed for each post type.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Post Types - Filter Display: If enabled, users will be able to filter posts lists by post type when "Post Type - Split Display" is disabled.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Activity', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved fetching of pinned activities, removing the "double" load on feeds and reducing loading times.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Line breaks are now displayed in activities text.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('A "Line Break Limit" option has been added to the Customizer -> "Vikinger Settings" -> "Newsfeed" that allows to control the amount of consecutive line breaks that users can input in activities and comments.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Site administrators can now delete any activity and comment (even the ones they aren\'t the author of) from the frontend by using the "three dots" dropdown settings menu.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Group administrators and moderators can now delete comments from any activity that belongs to the group from the frontend by using the "three dots" dropdown settings menu.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Activity and Comment Edit', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Users can now edit the text of activities (regular status updates and shares only) and comments from the frontend by using the "three dots" dropdown settings menu.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('A new message has been added to activity templates that displays when an activity has been edited to inform of this along with the user that made the last edit.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('A "Edit Time Limit" option has been added to the Customizer -> "Vikinger Settings" -> "Newsfeed" that allows to set the time (in minutes) in which a user is able to edit an activity or comment since he created it (if set to 0, users won\'t be able to edit activities or comments after they create them). This setting doesn\'t apply for site admins, group admins and mods.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Site administrators can edit any activity and comment (even the ones they aren\'t the author of) from the frontend by using the "three dots" dropdown settings menu.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Group administrators and moderators can edit any activity and comment that belongs to the group from the frontend by using the "three dots" dropdown settings menu.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Javascript', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php
          printf(
            esc_html__('Browserify require was replaced with %sES imports%s for the main application (app.js).', 'vikinger'),
            '<a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/import" target="_blank">',
            '</a>'
          );
        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('React', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('React main application code (app.js) has been refactored and improved.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php
          printf(
            esc_html__('All components have been transformed from class to functional with the use of the new %sHooks%s functionality introduced in React v16.8.0.', 'vikinger'),
            '<a href="https://reactjs.org/docs/hooks-intro.html" target="_blank">',
            '</a>'
          );
        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('This allowed the introduction of several additional performance improvements.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.6.4" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">Jun 23, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.6.4</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused all the post format elements to display at the same time when creating/editing a post. Please update the "Vikinger Metaboxes" plugin to the latest version by using the theme installer in order to get this fix.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the Twitch footer icon to not change color when hovering over it.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Security Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Introduced a number of security checks and improvements on AJAX endpoints.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('AJAX endpoints are no longer loaded when the plugin that is required to use them is not installed and active.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('AJAX endpoints that are used on the backend now are only loaded and available when in the WordPress backend.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Elementor', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The migration period for the Elementor Register/Login Widget and landing page that were discontinued on our previous update (v1.6.3) has ended. With this update, the Register/Login Widget functionality and related AJAX endpoints have been removed.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Header Search Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the search to look for matches belonging to disabled features via the "Customizer" -> "Vikinger Settings" -> "Search".', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the search to crash when quickly entering a lot of characters into the search input.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved the search performance and behaviour by adding a delay on input search to wait for the user to stop typing before starting a search and canceling previous queried searchs.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Blog Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Blog "/category" and "/tag" pages now display posts using logged user last selected grid type.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress Integration Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Removed "Request Membership" menu that displayed on groups navigation items in BuddyPress version 8.0.0.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Activity Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed Twitch links being processed for embed on activity posts.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Verified Member for BuddyPress Integration Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added compatibility for the new "Verified Roles" feature, verified badges will now display correctly on users that match the selected roles.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('GamiPress Integration Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added missing point award limit strings to the vikinger.pot file.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('WooCommerce Integration Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added support for the WooCommerce "shop" sidebar. Users can add widgets to the sidebar from the WordPress backend "Appearance" -> "Widgets" -> "(Vikinger) WooCommerce Shop Sidebar" or via the "Customizer" -> "Widgets" when on a page that can display the sidebar.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Social Networks', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Additional social networks can now be displayed on the footer of the site and can be added via the "Customizer" -> "Vikinger Settings" -> "Footer" settings page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Additional social networks links can now be assigned to groups via the account hub "Manage Groups" settings page ("Manage Group" -> "Social Networks").', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The following social networks have been added:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Linkedin', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Pinterest', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Tik Tok', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Github', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Reddit', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Dribbble', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.6.3" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">May 27, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.6.3</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused menu items to not open a page in a new tab when "Open link in a new tab" was selected in the respective "Appearance" -> "Menus" menu item.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the label in the reset password page to display on top of the input content.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added an option that allows users to select which page the user is redirected to when they login to the site ("Customizer" -> "Vikinger Settings" -> "Login - Register" -> "Login - Redirect Page").', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added an option that allows users to select pages to be made accessible even when the force login option is enabled ("Customizer" -> "Vikinger Settings" -> "Login - Register" -> "Force Login - Exceptions").', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Elementor Pages', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We are discontinuing the old Elementor landing and it’s login/register box widget and adding two new pages (new landing and testimonials page). We recommend always using these new pages together with the WordPress login and BuddyPress register and activate pages as it provides more security and options for both the login process, with the forgot password functionality, and the register process, which requires account activation via a key that is sent to the registering user email.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('As per customer’s requests, we created new Elementor pages, one landing and one "inner" page (Testimonials), where, even if you have the option to force people to login enabled, you’ll be able to show these pages to them as some sort of “introduction” using the new "Force Login - Exceptions" customizer option. Something similar to what %sDiscord%s has, where they have a landing, and then they have a button at the top for people to “enter” the app (in this case it would be to enter the community).', 'vikinger'),
          '<a href="https://discord.com" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.6.2" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">May 17, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.6.2</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the badge images to shrink if there where many badges in the member preview list type widgets.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Quests and Badges widgets, profile navigation items and profile pages will no longer display (instead of displaying and reporting that no quests or badges where found) if the respective GamiPress achievement type doesn\'t exist.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Social network links now open a new tab by default.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Side menu status is now saved for logged users, remaining open or closed according to latest user selection.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The loading screen logo can now be uploaded separately from the site identity logo in the "Customizer" -> "Vikinger Settings" -> "Loading Screen" section.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Removed the loading screen logo background, allowing users to not be restricted by its container dimensions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Group profile navigation now displays navigation items added by other plugins.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a "Getting Started" section to the theme backend.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.6.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">April 26, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.6.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the header search bar input height to be smaller in WooCommerce pages on mobile resolutions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Plugin Integrations', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('GamiPress - WooCommerce Points Gateway', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Use GamiPress points types as a payment gateway for WooCommerce.%sYou can find more information here: %sGamiPress - WooCommerce Points Gateway%s.', 'vikinger'),
          '<br><br>',
          '<a href="https://gamipress.com/add-ons/gamipress-wc-points-gateway/?ref=130" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('GamiPress - WooCommerce Discounts', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Award discounts for achievement completion on WooCommerce.%sYou can find more information here: %sGamiPress - WooCommerce Discounts%s', 'vikinger'),
          '<br><br>',
          '<a href="https://gamipress.com/add-ons/gamipress-wc-discounts/?ref=130" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('GamiPress - WooCommerce Partial Payments', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Let users partially pay a WooCommerce purchase by using points.%sYou can find more information here: %sGamiPress - WooCommerce Partial Payments%s', 'vikinger'),
          '<br><br>',
          '<a href="https://gamipress.com/add-ons/gamipress-wc-partial-payments/?ref=130" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.6.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">April 23, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.6.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the last item in the account hub navigation sidebar not having a round border.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When the "Force Login" option is enabled, the "Go to your site" link will no longer display on the login page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added the WooCommerce plugin to the theme setup installer.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added new presets which require the WooCommerce plugin to the theme setup installer:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Community + Shop', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Community + Gamification + Shop', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Community + Forum + Shop', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Community + Gamification + Forum + Shop', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added new section header options in the Customizer for WooCommerce page headers.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added the "Shop" Side Menu link to the "Menus" demo import option.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added more entries to the theme Troubleshooting section.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('WooCommerce Integration', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Added support for the WooCommerce plugin. Users can now use WooCommerce with the theme to manage a shop.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('WooCommerce "my-account" pages have been moved and can be accessed from a new "Shop" section that has been added to the user settings "Account Hub" page. This page has links to WooCommerce features like orders the user has made, downloads for purchased digital items, manage billing and shipping addresses and account details.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('A mini cart has been added to the header, which allows users quick access to view and remove items from their cart from any page of the site. We also added a visual indicator to the mini cart that allows users to quickly see if the cart is empty or has items in it.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.5.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">April 19, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.5.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would cause the activity feed to crash when a certain user data inconsistency was found.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added styles for the extra fields added to the BuddyPress register page via the "Account_Info" profile field group. Support for the following field types has been added:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Text Box', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Number', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Date Selector', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Multi-line Text Area', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Radio Buttons', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Checkboxes', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Drop Down Select Box', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Registration page fields are now separated between account and profile details fields.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved the header profile settings dropdown navigation (cog wheel). It now features more space for the welcome message and username and each of the navigation sections.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.5.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">March 31, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.5.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would make a white space to show on a user profile "About Me" widget if the user didn\'t fill the About field in their Profile Info settings page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would make long text overflow in the "About Me" and "Group Info" widgets.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would make the bottom of the comment forms not have a rounded border when there weren\'t any comments.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The group "Created" date in the group profile "Group Info" widget is now displayed localized and with the format selected on the WordPress backend "Settings" -> "General" -> "Date Format" setting.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The group "Type" text in the group profile "Group Info" widget is now translated correctly.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The "Day", "Month" and "Year" text in datebox profile fields are now translated correctly.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added new customizer options to allow to disable photo and video upload related features ("Vikinger Settings" -> "Media" -> Photo Upload - Status" and "Vikinger Settings" -> "Media" -> "Video Upload - Status").', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('User profile navigation now displays navigation items added by other plugins.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('User profile navigation now supports the display of navigation sub items added by other plugins.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved styling of Checkboxes and Radio Buttons profile fields types.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added an option in the customizer "Vikinger Settings" -> "Footer" -> "Navigation - Mobile Status", which allows users to choose if they want to display or hide the footer navigation on mobile.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Updated the backend FAQs section.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a backend Troubleshooting section.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress Integration Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Members can now delete their uploaded avatar and cover images from the profile info settings screen by using the new action buttons on the avatar and cover image previews and saving their changes.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When a member uploads an avatar, an activity is now generated informing of this profile update.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When a member creates a group, an activity is now generated informing of this.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When a member is promoted to be a mod of a group, a notification is now generated informing them of this.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When a member is promoted to be an admin of a group, a notification is now generated informing them of this.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BuddyPress xProfile Groups and Fields', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The theme uses the BuddyPress xProfile groups and fields to allow site members to enter information about themselves, like bio, personal, interests, social links and account information.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('To be able to show each xProfile field group and its respective fields in different settings pages and widgets in the members profiles, the theme has to query them by their name.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('This creates problems if users need to edit group or field names for translations purposes, as the theme won\'t be able to find and display the group or field information if the name is not the one it is expecting.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('To solve this and allow users to translate them, we have included a new customizer section with this update ("Vikinger Settings" -> "xProfile Groups / Fields").', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('To understand how to edit the profile groups and fields for translation purposes, we need to detail how the theme uses the group names.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('xProfile group names consist of a prefix part (i.e. "Profile") followed by an underscore (_) followed by the subgroup name ("Bio"): "Profile_Bio".', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The prefix part (in this example "Profile") is used to identify on which settings page the group and all its fields will be displayed in, to allow members to edit their information:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('"Profile" prefix: groups and fields display on the member profile info settings screen (Profile_Bio, Profile_Personal, Profile_Interests).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('"Social" prefix: groups and fields display on the member social settings screen (Social_Links).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('"Account" prefix: groups and fields display on the member account info settings screen (Account_Info).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The prefix part of the xProfile group names shouldn\'t be changed, otherwise the sub groups and fields won\'t display correctly in the settings pages.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The subgroup name part (in this example "Bio") is used to identify on which member profile page widget the subgroup fields are going to be displayed in (in this case, the "About Me" widget).', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('This subgroup in particular also has a special case with its "About" xprofile field, which is displayed differently from the other fields (text only at the top of the widget after the title).', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('With this update, users can now edit all subgroup names from the backend "Users" -> "Profile Fields" page to translate them and then enter that same name on the respective customizer "Vikinger Settings" -> "xProfile Groups / Fields" option.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('This allows the theme to query the subgroup using the new name and display the information correctly on each widget.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('As we mentioned before, the "Profile_Bio" "About" field is a special case and if changed, its new name has to be entered in the customizer.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Any other xProfile field names can be changed and will display correctly without the need to enter their new names in the customizer.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('To summarize:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('xProfile group name prefix shouldn\'t be changed.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('xProfile subgroup names can be changed to translate them, but the new subgroup name has to be entered in the respective customizer "Vikinger Settings" -> "xProfile Groups / Fields" option.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Any xProfile field names can be changed to translate them without further changes, except the "Profile_Bio" "About" field whose new name has to be entered in the respective customizer "Vikinger Settings" -> "xProfile Groups / Fields" option.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('GamiPress Integration Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Achievement, Rank and Point activities are now displayed on activity lists if enabled on the GamiPress options.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Individual Achievement and Rank pages linked through the new supported activities are now enabled and display information about the respective achievement or rank.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('BuddyPress actions for the following triggers have been revised and are now called appropriately when the respective action is complete:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Change profile avatar', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Change cover image', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Update profile information', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Promoted to group moderator/administrator', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Promote another group member to moderator/administrator', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Theme Setup Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The theme plugin installer now allows for customized or preset installs. This allows users to keep their plugins up to date by using the theme installer even if they don\'t want to use a particular plugin, avoiding to have a plugin forcefully installed and having to uninstall it when updating core theme plugins.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Custom preset allows you to manually select which plugins you want to install and saves your configuration, while other presets feature preconfigured plugin combinations that automatically select the required plugins for each particular preset.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The last selected preset is saved and used by default when opening the setup page.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The following presets are now available:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Custom', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Community', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Community + Gamification', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Community + Forum', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Community + Gamification + Forum', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Added the following plugins to the theme installer:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Verified Member for BuddyPress', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('BP Better Messages', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('GamiPress - bbPress Integration', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The theme plugin installer doesn\'t uninstall or deactivate any plugins, so if you want to change from a preset that has more plugins to one that has fewer, you will need to manually deactivate or uninstall any plugins that you don\'t want to use.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Child Theme Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Added the "languages/" directory and enabled the loading of the child theme translation files on its "functions.php" file. You can now put your translation files on the child theme "languages/" directory, without having to make any changes to the "functions.php" file, and they will be loaded before the parent theme ones (you need to be using the child theme for this to work, this means you need to have it installed and active in your WordPress backend -> "Appearance" menu).', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Most parent theme functions can now be overriten in the child theme (i.e. including a function with the same name on the child theme "functions.php" file, either directly or by using the same file structure as the parent, we recommend this second approach), allowing for easier customization of the parent theme functionality on the child theme. To make sure if you can override a parent theme function, please check if it has the function_exists() condition before its declaration.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.4.0.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">March 22, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.4.0.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would ocurr on the profile info settings screen if a datebox profile field didn\'t have an absolute or relative range type set.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.4.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">March 15, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.4.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that allowed the user to submit an activity with no text or media if the user clicked on the "Add Photo" button but didn\'t yet add any photos.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added support for relative ranges in "Date Selector" profile fields.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Videos Uploader', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Users can now upload videos and post them on activity status updates.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('A new "Videos" page has been added to the members and groups profile pages to display the videos that the user has uploaded to his profile and group members have uploaded to the group. From the "Videos" page, users can upload and delete videos that they have uploaded through status updates or direct upload through this page.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('A new customizer section named "Media" has been added ("Customizer" -> "Vikinger Settings" -> "Media") that allow users to change media (photo and video) related settings.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The following "Photo" related options had been added to this new customizer section.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Photo Upload - Maximum Size in MB: with this option, you can set the maximum size allowed for photos that users upload to the server. If a photo the user tries to upload has a size that is bigger than the one you choose here, then the user will be notified of this and he won\'t be able to upload it. You can\'t set this size to be higher than your server maximum upload file size.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Photo Upload - Allowed Extensions: with this option, you can set the file extensions allowed when a user uploads a photo. If a photo the user tries to upload has an extension that is not allowed, then the user will be notified of this and he won\'t be able to upload it.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The following "Video" related options had been added to this new customizer section.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Video Upload - Maximum Size in MB: with this option, you can set the maximum size allowed for videos that users upload to the server. If a video the user tries to upload has a size that is bigger than the one you choose here, then the user will be notified of this and he won\'t be able to upload it. You can\'t set this size to be higher than your server maximum upload file size.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Video Upload - Allowed Extensions: with this option, you can set the file extensions allowed when a user uploads a video. If a video the user tries to upload has an extension that is not allowed, then the user will be notified of this and he won\'t be able to upload it.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Activity Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When deleting an activity, all photos and videos associated to it are now deleted.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('When deleting photos or videos from user/groups photos or videos pages, the associated activity will be deleted if all videos/photos included in that activity where deleted. For example: a user creates a status update on his profile with 2 photos, if he deletes those 2 photos from the user photos page, then the status update will also be deleted. If the user only deletes 1 of the 2 photos, then the status update will remain and only show the photo that wasn\'t deleted.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added two new filters in activity feeds: Photos and Videos. The Media filter is still available and can be used to show both Photos and Videos types of activities.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Activity status updates now detail if they belong to a photo or video update instead of the previous generic "posted an update".', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.3.6.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">March 10, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.3.6.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused selected grid type by logged out users to try to be saved.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused a white space to display before media in activities that had no text.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that prevented the Elementor landing template from loading.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.3.6" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">March 09, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.3.6</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused duplicated user and group information to display on group forum topics and replies activities.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Selected grid types for blog post, member and group lists are now saved for logged users. This means that the next time they browse to a page with the same type of list (member, group or post), the last grid type that the user selected will be automatically used for the list display.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Search Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We introduced a new section called "Search" (in "Customizer" -> "Vikinger Settings") to allow search related customization.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Users can now choose to hide the header search input by using the "Display / Hide" option.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We also added options that allow the user to select which components are included in search results, both on the search main page as well as the header search dropdown.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The available options are:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Show blog posts in search', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Show members in search', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Show groups in search', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Any combination of blog posts, members and groups can be selected to be included in search results (i.e. only blog posts, blog posts and members, members and groups, etc).', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('User Avatar Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We introduced a new section called "Avatar" (in "Customizer" -> "Vikinger Settings") to allow avatar related customization.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The new "Avatar Type" option can be found here from where you can select the following options:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Hexagon', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Circle', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Square', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The type selected will be used for the display of all avatars throughout the site. ', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Also, user avatars no longer show rank related progress bar and badges when the GamiPress plugin is not installed and active.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.3.5" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">March 04, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.3.5</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the forum description notice to try to get the last author information even when the forum had no content.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed post comment list showing a loading indicator even when the post had 0 comments.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause the comment list to wrongly report that more comments where available to show after creating a new comment.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the reply button to show on comments when the "Allow Comments" option was disabled.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the light/dark mode toggle to not refresh the page under certain conditions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused duplicated characters to appear on some inputs when using certain languages.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a different background color to forum and topic even rows to improve visual separation between them.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Pages with "Allow Comments" option disabled now hide all comment related elements instead of only disabling the comment form.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('bbPress Group Forums', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Users can now create a forum for their group by using the frontend "Manage Groups" settings screen.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('If the bbPress settings option "Allow BuddyPress Groups to have their own forums" is active, then a new "Forum" tab will be added to the group manage popup for group admins. You can also select a forum or category to be used to contain all group forums from this settings screen by using the bbPress "Primary Forum" option.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('From the group manage popup "Forum" tab, the "Enable forum for this group" option can be activated to create a forum for the group which will be available both on the forum page and as a new link on the group page navigation bar.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The group name, description and status will be used by default for the group forum, however users can choose to change the title, description and status of the forum (the group avatar image will be used as the forum image).', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('After enabling forum for the group, group admins can delete the forum and all its content just by disabling the same option ("Enable forum for this group") and by clicking on "Save Changes".', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.3.4" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">February 26, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.3.4</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed comment timestamp displaying with an offset for logged out users.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed some cases where the side menu item for the current page wouldn\'t be marked as active.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved visibility of the activity and comment settings dropdown icon.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Demo Import', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We created a demo content import tool to allow users to easily replicate the content from the demo into their theme. This tool can be used any number of times and also includes the ability to reset (delete) the imported data. If you want to remove data created by the importer, please use this option.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The importer can be used from the new backend theme "Demo Import" menu. Users are not forced to import all demo content data and can select what they want to import.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('We created a new %stutorial video%s which includes the full theme install and setup process, including the use of this new demo import tool. We also updated the theme documentation to include a new "Demo Import" section.', 'vikinger'),
          '<a href="https://www.youtube.com/watch?v=SXEgduXEupk" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.3.3" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">February 19, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.3.3</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The "Add New" button of the Groups backend menu now correctly sends the user to their "Manage Groups" settings screen.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed a crash that would occur when a duplicate comment was created on a blog post.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The "Light" and "Dark" Color Switch now clears user meta cache to force getting and displaying the user selected theme when switching.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The "Account Settings" section has been added to the users Account menu. From here, users can use the "Delete Account" button to delete their account from the site. Site admins can choose to enable or disable allowing registered members to delete their own accounts by using the BuddyPress backend settings option: "Settings" -> "BuddyPress" -> "Options" -> "Account Deletion".', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Updated the "Vikinger - BuddyPress Extension" plugin to include the new delete account related "Account Settings" menu. Please update the plugin using the theme installer.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Introduced newsfeed related performance optimizations.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Activity Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Users can now delete their activity and blog comments. A new actions dropdown has been added next to the "Reply" button with the option "Delete Comment" to comments owned by the logged in user.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('A new grayscale fade visual effect has been added on activity and comment deletion confirmation that indicates that the activity or comments are being deleted.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Activity Feed Settings', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Several new options have been added to the "Customizer" -> "Vikinger Settings" -> "Newsfeed" section which allow users more control over activity feed related settings.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Activity - Show More Status: by enabling this option, a "Show More" button will appear on activities that have a large height.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Activity - Show More Height: you can control the maximum height that the feed activities can have. If an activity has a height that is greater than this value, then the remaining content will be hidden and a "Show More" button will be created to allow users to display the remaining activity content.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Activity - Character Limit: you can control the maximum number of characters that users can put into an activity.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Activity - Comment Character Limit: you can control the maximum number of characters that users can put into an activity comment (this limit also applies for blog post comments).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Members Settings', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Several new options have been added to the "Customizer" -> "Vikinger Settings" -> "Members" section which allow users more control over members related settings.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('From this section, you can now enable or disable member profile pages added by the theme. This will allow you to easily disable a member profile page and associated navigation item if you don\'t want to use it (like the profile blog page).', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('You can also choose the order in which enabled pages are displayed in the profile navigation bar (lower numbered pages will display before higher numbered ones), allowing you to display the pages you think are more important or should be easier to access first in the navigation bar.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BP Better Messages Integration', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Modified the BP Better Messages plugin elements styles so that they use theme preset colors and made several adjustments to each element to make its styles integrate better with the theme.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.3.2" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">February 12, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.3.2</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the membership requests settings screen page title using the received invitations screen title.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue which would prevent received membership requests from being displayed on the user "Membership Requests" settings page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would cause some BuddyPress Private Messaging module related features to show when the "Private Messaging" module was deactivated on the BuddyPress Settings Page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Dates in the user profile about widgets are now displayed localized and with the format selected on the WordPress backend "Settings" -> "General" -> "Date Format" setting.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          echo wp_kses(
            sprintf(
              esc_html__('Added a new Customizer option that allows limiting YouTube embed video playbacks on the newsfeed. The option can be found on "Vikinger Settings" -> "Newsfeed" -> "Limit YouTube Playback". You can use this option to limit YouTube embedded video playbacks on the newsfeed of the site. If you select "Yes", only one YouTube video will be played at a time, this means that, if a user is playing a video and chooses to play another one, then the previous video will be paused. The %sYouTube Player API%s is used to achieve this behaviour.', 'vikinger'),
              '<a href="https://developers.google.com/youtube/iframe_api_reference" target="_blank">',
              '</a>'
            ),
            vikinger_wp_kses_admin_text_get_allowed_tags()
          );

        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Introduced several performance improvements and optimizations.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.3.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">February 03, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.3.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the header showing the cogwheel dropdown on lower resolutions when the same information was available on the mobile menu.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the username (mention name) of the post author (in post version 3) being centered instead of aligned to the left.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the "locked" and "unlocked!" achievement progress bar text not being translatable.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed "Archive" pages showing the page headers when the option to hide them was selected on the Customizer.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Replaced "Messages" string with "Inbox" on the header messages dropdown to avoid confusion regarding the previewed content.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Color Theme Switch', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('You can now choose to enable a color theme switch via the "Customizer" -> "Vikinger Settings" -> "Color Presets" menu.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('If enabled, your site logged in users will be able to change between a "Light" and "Dark" theme while browsing the site by using a sun / moon button that is added on the header on desktop and on the header menu on mobile.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('From the same Customizer section you can set which of the existing color presets you want to assign when the "Light" or "Dark" theme modes are activated. For example, you can choose to use the "Custom" color preset for the "Light" theme mode, and the "Carbon Yellow" color preset for the "Dark" theme mode.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('You can also set the default theme mode ("Light" or "Dark") that is used when the color theme switch is active.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('When the color theme switch is disabled, the theme will use the color preset that you assign in the "Color Preset" option.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('BP Better Messages Compatibility', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The theme is now compatible with the BP Better Messages plugin.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('This means that, when the plugin is installed and active, it will replace the Messages profile setting screen with the one provided by the plugin. Also, when clicking on a message from the header messages dropdown, it will correctly open and display that message on the settings screen.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Verified Member for BuddyPress Integration', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Added support for the "Verified Member for BuddyPress" plugin.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('All member related widgets now support the display of the "verified" badge next to the user fullname or username (mention name) according to the setting the user has selected on the plugin ("Settings" -> "BuddyPress" -> "Verified Member").', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.3.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">January 26, 2021</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.3.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that would cause group slugs to display incorrect characters when using certain languages.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause the group manage popup to infinite load after submitting the creation of a new group.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the activity feed to stop working when an activity or post that was shared was deleted and added a message which informs the user that the shared content was deleted.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed group status dropdown text not being translated correctly in the group management popup.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the notifications bar to stop working when a user had a message from a deleted user in their inbox.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('BuddyPress Profile Fields that are empty will no longer display in the About, Personal Information and Personal Interests widgets, when they would previously display with a "-" as value.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('The slug option has been removed from the group creation and manage screens based on user feedback.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a smooth scrolling effect when navigating to page anchors.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Navigating to page anchors now takes into account the floating header height, which prevents the top part of the anchored content from being covered by the header.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('bbPress Integration', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Added support for bbPress forums. Users can now use bbPress with the theme to create and manage forums.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We also added support for forum images, this allows users to associate an image to a forum in the backend, this image will be displayed next to the forum information on the frontend and make it easier to visually identify forum content.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('A new navigation item has been added to user profiles called "Forum", this new page has information about the forum activity of a particular user (created topics and replies, engagements and favorites). Logged in users can also view their forum and topic subscriptions from this page.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('bbPress generated notifications will now show in the user notifications settings screen and the notifications header bar dropdown. These notifications include useful information and links to forum content.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('bbPress generated activities will now show on activity feeds and we have added 2 new "Show" filters for them on the activity feed filters bar ("Forum Topics" and "Forum Replies").', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Group Forums are not yet supported and will be added on a future update.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We highly recommend checking out the new tutorial videos we have released, which explain how to install the update and create a link to your new forums as well as show a forum creation example.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('FAQs and Support', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We\'ve updated the "FAQs" section with answers to the most frequently asked questions our support team has been receiving and we also updated the "Support" section with a more detailed explanation of what the theme Support includes according to Envato\'s Support Policy as well as third party sources that offer Customization Services for users that want to customize their theme.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.2.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">December 5, 2020</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.2.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the group profile avatar hexagon showing incorrect color on mobile resolutions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed Radio Buttons and Checkboxes profile field types displaying too close to each other if there were too many of them on mobile resolutions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed some section banners still showing after selecting to hide all page headers from the Customizer.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused the members profile photos page header to not have the correct spacing.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause activities from previous filters to show on the activities feed when quickly changing between different filters.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed chat messages not being marked as read when accessing them directly by using the header message notifications dropdown.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Group invitation notifications now have a link to the user "Received Group Invitations" settings page.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new notification for private group membership requests sent.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new notification for private group membership request rejections.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Updated the "Vikinger - BuddyPress Extension" plugin to include the new private groups related "Membership Requests" menu. Please update the plugin using the theme installer.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new field in the group creation and manage popups that allows the user to select the status of the group (public, private).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a tag sticker that shows the group status on each group box in the manage groups settings screen to help the user know the status of a group without having to open its management popup.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a tag sticker that shows the group status in the group management popup.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a tag sticker that shows the group status on the activity feed and profile group widgets.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added information that indicates the amount of admins, mods, members and banned members the group has in the manage group members tab.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Removed activity post form from all member profiles except own user profile based on user feedback, as it led to confusion.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Removed unused privacy dropdown from activity post forms.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Private Groups', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Added support for BuddyPress private groups. Users can now create private groups which content can only be seen by members of the group.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Private groups have a "Request Membership" button instead of the "Join Group" button that the public groups have. To join a private group, a user has to send a membership request and needs the approval of a member of that group. The membership request can also be canceled by the initiating user or rejected by any member of the private group.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Both membership requests and rejections now feature a specific notification message which links to the new group membership requests settings page. This new page allows to manage membership requests sent to a group and received by any private group the user is a member of.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Existing public groups can be converted to private groups by editing them from the "Manage Groups" settings page, the group manage popup will now have the option to select group status via a dropdown.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Activity Feed Improvements', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We introduced several improvements related to the activity feed, including activity preloading and removing the need for the feed to reload when adding a new post.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The new activity preloading allows for activities to load faster after the initial load, activities are loaded in the background while browsing and displayed when the user scrolls to view more.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Removing activity list reload when updating the feed to show new posts allows for activity shares to be displayed dynamically when previously a page reload was needed as to not break the flow when the user scrolled and wanted to share something but continue browsing afterwards without having the feed reload. Regular activity posts also benefit from this new behaviour, they will display dynamically and faster after submitting them.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We also introduced some improvements to the Pin activity functionality, pinned activities are now visible to all users instead of only to the user that made the pin, this allows for the pin functionality to not only be used personally but to highlight a post in a user profile for others to see. Also, users can now only pin an activity in their profile feed page, removing the option incorrectly showing on the main activity feed and other profile activity feeds.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.1.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">November 28, 2020</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.1.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the "No badges unlocked text" incorrectly showing on the Elementor login register widget when the GamiPress plugin was not active.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused text to not wrap correctly on some element boxes.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that caused users to show in the ranks page when their account was not activated.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed incorrect color being used for the header progress bar underline in the dark purple preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed incorrect color being used for the avatar rank hexagon in the carbon yellow preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Deleting a user will now remove its uploads directory at wp-content/uploads/vikinger/member/member_id, deleting all media uploaded by the user from the server.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Deleting a group will now remove its uploads directory at wp-content/uploads/vikinger/group/group_id, deleting all media uploaded to the group from the server.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added support for BuddyPress notification email settings, this will allow users to opt-out of receiving emails when each action occurs, for example when the user is mentioned in a post. The new settings page can be found under "Account" with the name "Email Settings".', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Updated the "Vikinger - BuddyPress Extension" plugin to include the new "Email Settings" menu. Please update the plugin using the theme installer.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Removed Mentions, Favorites, Friends and Groups tab filters from the main activity feed for logged out users.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added an option in the Customizer that allows to display or hide all page banners from the theme pages. This new option is available in the Vikinger Settings -> Page Headers section.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.1.0" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">November 21, 2020</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.1.0</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed background of activity comment replies not using correct color.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause long strings of text to not wrap correctly on activity posts and comments.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed positioning of the header side menu trigger and menu.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added missing group related translation strings.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added link to homepage to both the header logo and title.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Color Presets', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The new "Color Presets" option allows users to quickly change between several different presets to easily change the look and feel of their site. There is also a "Custom" preset available that uses all colors you have defined for your theme on previous versions, so you can keep your previously defined color configuration!.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('There are a total of 7 presets:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Custom.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Light.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Dark.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Dark Blue.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Dark Purple.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Dark Cyan.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Carbon Yellow.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('Each preset has its own default colors that give a unique look to the site and each preset colors are completely customizable through the Customizer, so you can use the presets as a base and change only some of its colors if you like to do so.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The new Customizer sections that allow preset and colors customizations are:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Color Presets.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Colors - Custom Preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Colors - Light Preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Colors - Dark Preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Colors - Dark Blue Preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Colors - Dark Purple Preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Colors - Dark Cyan Preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Colors - Carbon Yellow Preset.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Login and Register', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The login and register process has been revised and improved. The default WordPress login page has been completely styled to match the theme look with a customizable background image, text (can be set to an empty string if you don\'t want to display text over the background image), logo and colors while preserving its default functionality. You can now use this page to allow users to log in to your site or use the forgot password WordPress functionality.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The BuddyPress register and activate pages have been enabled and styled to match the theme look while also removing the header, side menu and footer to adjust it\'s look to match the new login page. These pages use the same customizable background image, text, logo and colors as the login page. You can now use them to allow your users to register to your page and require them to activate their account before they can login.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The header of the theme now includes a Login button instead of the login form, that will send users to the new login page and the mobile bottom bar that allowed register and login has been moved inside the mobile menu to free screen space when browsing the site on lower resolution screens.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('We highly recommend using this new login, register and activation process as it provides more security and options for both the login process, with the forgot password functionality, and the register process, which requires account activation via a key that is sent to the registering user email.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The Elementor landing page can still be used but the login and register Elementor Widget form won\'t provide these functions, we recommend removing the widget using the Elementor editor and using the page as a regular landing page to display any sections you like your site visitors to see!.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('It\'s now also possible to restrict access to the site if the user isn\'t logged in, this feature is disabled by default and can be enabled from the Customizer. If enabled, logged out users will be redirected to the login page if they try to access any page of the theme except the login, register and activate pages.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('The new Customizer section which allows login and register page customization is:', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Vikinger Settings -> Login - Register.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.0.3.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">November 17, 2020</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.0.3.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that prevented the registration form and popups from being visible on multisite installations.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed header inputs, rank and points text not using the "Header Text - Color" customizer setting.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added "Header Mobile Menu Trigger Icon - Color" to the available colors in the Customizer. This setting controls the mobile menu trigger icon color.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.0.3" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">November 13, 2020</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.0.3</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed a number of styling issues on 720p and below resolutions.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue with the send message link on the friendship activity that is generated when a friendship is created.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that prevented friendships to be working correctly on WordPress Multisite installations.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed header menu sub items arrow not using hover color.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          echo wp_kses(
            sprintf(
              esc_html__('Added a child theme, check %sthis link%s for information about what a WordPress child theme is. The child theme is called "vikinger-child" and can be found in the Theme/ directory of the package.', 'vikinger'),
              '<a href="https://developer.wordpress.org/themes/advanced-topics/child-themes/#what-is-a-child-theme" target="_blank">',
              '</a>'
            ),
            vikinger_wp_kses_admin_text_get_allowed_tags()
          );

        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a Customizer section called "Admin Bar" and an option "Display / Hide" that allows the user to hide the WordPress admin bar (top bar) for all logged in users (except admins). This doesn\'t affect BuddyPress toolbar for logged out users, to hide the bar for logged out users, deactivate BuddyPress Toolbar setting in the  Settings -> BuddyPress -> Options tab.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Improved chat widget loading in the profile settings messages page, now the loading indicator doesn\'t disappear before the messages widget finishes loading.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Clicking on a message on the header messages dropdown now opens that message thread automatically on the profile settings messages screen.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Notifications in the header notifications dropdown and the profile settings notifications page now have more functional links, like a link to the user that triggered the notification and the action related to that notification. For example, the "sent you a message" notification now links to that message thread, the "sent you a friend request" now links to the friend requests page, etc.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added more entries to the theme FAQs and updated old entries to reflect new features.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added support for the "Settings" -> "Reading" -> "Blog pages show at most" WordPress option, the blog posts list will now limit the posts per page shown according to this setting.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added support for the "Settings" -> "BuddyPress" -> "Options" -> "Group Creation" BuddyPress option, this allows users to enable or disable group creation for all users.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added "Header Profile Settings Icon - Color" to the available colors in the Customizer. This setting controls the cog icon color on the right part of the header.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added "Header Text - Color" to the available colors in the Customizer. This setting controls the header site title, menu text and submenu arrows color.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.0.2" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">November 7, 2020</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.0.2</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed user avatar list overflowing on the achievement widgets when many users where displayed.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed a mobile style issue which showed the decorative icons from the credit award and deduct boxes not centered and out of their respective boxes.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed an issue that could cause some images in the user profile timeline photos widget to not display.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed group member preview list overlay not using customizer secondary color.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Moved header register button closer to the login form.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Released a new version of the Vikinger - BuddyPress Extension plugin that adds translatable strings for the wordpress admin bar top right profile related menus. Please update the plugin to the latest version using the theme installer.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added group navigation missing translatable strings.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added error/notice messages to the activity form to allow the user to know the reason a post doesn\'t submit (i.e. when clicking post without entering text or adding an image).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Made it possible to post activity status updates with only images (no text).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new header version with only logo, a new option has been added to the customizer Site Identity section so users can select which header version they want to use.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new customizer color option in the Vikinger Settings - Colors section to allow users to customize the header logo background color for the new header version (you can set this to the same color as the header to make it invisible).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new customizer option in the Footer section to allow users to hide the footer of the site.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added a new section to the customizer called Side Menu, added an option in this new section that allows users to hide the side menu. Hiding the side menu will also hide the side menu trigger that appears on the header of the site.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Customizer changes made by this update:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Display Logo and Site Title / Display Logo option in the Site Identity section.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Header Logo - Background option in the Vikinger Settings - Colors section.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Vikinger Settings - Side Menu section.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Display / Hide option in the Vikinger Settings - Side Menu section.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Display / Hide option in the Vikinger Settings - Footer section.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added FAQs section on the theme options.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added icons and colors for the following social networks in member profile fields (the name for the profile field must be the same as listed below - case insensitive - in order for it to be recognized and assigned it\'s respective icon):', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Behance.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('DeviantArt.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Dribbble.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Github.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Linkedin.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Pinterest.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Reddit.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Snapchat.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Spotify.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Tiktok.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Tumblr.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Vk.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div id="vk-version-1.0.1" class="section section-full">
    <!-- SECTION PRETITLE -->
    <p class="section-pretitle">October 31, 2020</p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Version', 'vikinger'); ?> 1.0.1</p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You\'ll find information about this update below. If you want to provide feedback, suggestions or report bugs please contact our support team by following the instructions provided in the support tab.', 'vikinger'),
          '<a href="https://envato.com/market-plugin/" target="_blank">',
          '</a>',
          '<br><br>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('Fixes', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed image stretching when used inside a Group Block in a post.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the activation and registration page being accessible when they shouldn\'t be.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed the upload boxes not showing all accepted image formats by the theme (jpg/jpeg/png/gif).', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed default link icon not showing when creating social links using an unsupported social network.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed more photos link directing to user photos page instead of group photos page when uploading photos to a group through a status update.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed text, box layer and hexagon colors that didn\'t have the correct derived color or user custom color assigned to them when customizing the theme colors.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed single activity stream pages not showing user cover image and stats information.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Fixed credit deducts limit text saying it was an "Award Limit" instead of a "Deduct Limit".', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Features', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Introduced the following changes and additions in the color customization:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Header Icon - Hover Color.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Renamed Text to Text - Primary.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Text - Secondary.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Text - Tertiary.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Box - Shadow.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Over Box - Shadow.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Over Box Dark - Shadow.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Over Box Big - Shadow.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Header Progress Bar Line Gradient - Start Color (if you don\'t want to use gradient, just set start and end colors to the same color).', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Header Progress Bar Line Gradient - End Color.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Header Progress Bar Underline - Color.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Progress Bar Line Gradient - Start Color (global, user avatars and achievement progress bars).', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Progress Bar Line Gradient - End Color.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Progress Bar Underline - Color.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Added Avatar Rank Hexagon - Color.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Replaced quest, credits and group creation decorative images with HTML elements to allow users for better customization when changing theme colors, specially when going for a dark version palette. These elements will now be colored appropiately by using customizer colors.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added support for more profile field types (Checkboxes, Radio Buttons and Drop Down Select Box). Profile field types available with this update:', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->

        <!-- UNORDERED LIST -->
        <ul class="unordered-list">
          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Text Box.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Multi-line Text Area.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('URL.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Date Selector.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Checkboxes.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Radio Buttons.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->

          <!-- UNORDERED LIST ITEM -->
          <li class="unordered-list-item">
            <!-- UNORDERED LIST ITEM TEXT -->
            <p class="unordered-list-item-text"><?php esc_html_e('Drop Down Select Box.', 'vikinger'); ?></p>
            <!-- /UNORDERED LIST ITEM TEXT -->
          </li>
          <!-- /UNORDERED LIST ITEM -->
        </ul>
        <!-- /UNORDERED LIST -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Increased the width of the photo popup box so that images with bigger size display better.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION SUBTITLE -->
    <p class="section-subtitle"><?php esc_html_e('New Illustrations', 'vikinger'); ?></p>
    <!-- /SECTION SUBTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text"><?php esc_html_e('Added new credits and ranks illustrations so you\'ll have more options to choose from. You can find them inside the Illustrations folder in the updated pack.', 'vikinger'); ?></p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION IMAGE -->
    <img class="section-image" src="https://imagizer.imageshack.com/img923/3766/PSzcjU.jpg" alt="new-illustrations">
    <!-- /SECTION IMAGE -->
  </div>
  <!-- /SECTION -->
</div>
<!-- /VK CONTENT -->