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
    <p class="section-banner-title"><?php esc_html_e('Troubleshooting', 'vikinger'); ?></p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">
    <?php
    
      echo wp_kses(
        sprintf(
          esc_html__('%sThank you for your purchase!%s Below you will find solutions to issues you may encounter.', 'vikinger'),
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
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/activation-howto.png" alt="activation-howto">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Troubleshooting', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Troubleshooting', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('First of all, we recommend checking your %sWordPress Site Health page%s. Many issues you may encounter can be easily solved by ensuring that you don\'t have any issues reported by your WordPress Site Health page. You can check your WordPress site health via your WordPress backend panel -> Tools -> Site Health.', 'vikinger'),
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list unordered-list-bold">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
          <a href="#vk-install-issues">
          <?php esc_html_e('I\'m having issues installing the theme / theme doesn\'t work', 'vikinger'); ?>
          </a>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
          <a href="#vk-style-issues">
          <?php esc_html_e('Images/elements seem out of place/broken or theme functionality is not working as expected', 'vikinger'); ?>
          </a>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
          <a href="#vk-imageactivity-not-posting">
          <?php esc_html_e('I can\'t post a BuddyPress activity with images or video', 'vikinger'); ?>
          </a>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
          <a href="#vk-bp-activation-emails-not-sending">
          <?php esc_html_e('BuddyPress is not sending emails with activation code to users after they register to the site', 'vikinger'); ?>
          </a>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
          <a href="#vk-xprofile-field-customization">
          <?php esc_html_e('I changed the name of a BuddyPress profile field or group and now its not displaying on the site', 'vikinger'); ?>
          </a>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
          <a href="#vk-customize-pages-elementor">
          <?php esc_html_e('Encountering issues while editing pages with Elementor', 'vikinger'); ?>
          </a>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- SECTION INNERTITLE -->
    <p id="vk-install-issues" class="section-innertitle section-innertitle-padded"><?php esc_html_e('I\'m having issues installing the theme / theme doesn\'t work', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('If you haven\'t done much yet, we recommend you to do a clean install to start again to make sure that the things you\'ve done don\'t interfere with the setup.%sFor a successful install and setup process, please follow the instructions that are available in the theme %sdocumentation%s inside "Getting Started" -> "How to Install" and "Theme Setup".%sAfter completing the install and setup process and verifying that everything is working correctly, you can either use the "Demo Import" functionality to import demo content or create the content manually by following the documentation tutorials and videos.', 'vikinger'),
          '<br><br>',
          '<a href="https://odindesignthemes.com/vikingerthemedocs/how-to-install/" target="_blank">',
          '</a>',
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p id="vk-style-issues" class="section-innertitle section-innertitle-padded"><?php esc_html_e('Images/elements seem out of place/broken or theme functionality is not working as expected', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('First, please ensure that you have completed all steps of the theme setup process as failing to complete a step can cause styling issues to appear on the site.%sSometimes, there can be third party plugins that are conflicting with the theme styling and functionality.%sDeactivate any additional plugins you have installed (plugins that are not included in the theme setup or reported compatible with it) one by one to identify which plugin is causing the styling or functionality problems (You may need to clear your browser cache after deactivating certain plugins).', 'vikinger'),
          '<br><br>',
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p id="vk-imageactivity-not-posting" class="section-innertitle section-innertitle-padded"><?php esc_html_e('I can\'t post a BuddyPress activity with images or video', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Please check your WordPress site health page (WordPress backend panel -> Tools -> Site Health), the most common cause of being unable to make an activity post with media (images or video) is due to having an outdated MariaDB database.%sIf you have an outdated MariaDB version installed, please update it to the latest version, and then uninstall and reinstall the "Vikinger Media" plugin, if the plugin is installed successfully, the "yourprefix_vkmedia_media" table will be created and available in your WordPress database.', 'vikinger'),
          '<br><br>',
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p id="vk-bp-activation-emails-not-sending" class="section-innertitle section-innertitle-padded"><?php esc_html_e('BuddyPress is not sending emails with activation code to users after they register to the site', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Please check that your WordPress email configuration is correctly setup and if emails are being sent for other actions.%sIf you are using an email plugin (i.e.: %shttps://wordpress.org/plugins/wp-mail-smtp/%s), please check if this works for you: %shttps://wordpress.org/support/topic/activation-emails-from-forums-not-sent/%s.%sOtherwise, please contact the BuddyPress support team (%shttps://buddypress.org/support/%s) as they will be able to assist you further with this: %shttps://buddypress.org/support/search/activation+email/%s', 'vikinger'),
          '<br><br>',
          '<a href="https://wordpress.org/plugins/wp-mail-smtp/" target="_blank">',
          '</a>',
          '<a href="https://wordpress.org/support/topic/activation-emails-from-forums-not-sent/" target="_blank">',
          '</a>',
          '<br><br>',
          '<a href="https://buddypress.org/support/" target="_blank">',
          '</a>',
          '<a href="https://buddypress.org/support/search/activation+email/" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p id="vk-xprofile-field-customization" class="section-innertitle section-innertitle-padded"><?php esc_html_e('I changed the name of a BuddyPress profile field or group and now its not displaying on the site', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('The theme uses the BuddyPress xProfile groups and fields to allow site members to enter information about themselves, like bio, personal, interests, social links and account information.%sTo be able to show each xProfile field group and its respective fields in different settings pages and widgets in the members profiles, the theme has to query them by their name.%sThis creates problems if users need to edit group or field names for translations purposes, as the theme won\'t be able to find and display the group or field information if the name is not the one it is expecting.To solve this and allow users to translate them, we have included a new customizer section with this update ("Vikinger Settings" -> "xProfile Groups / Fields").%sTo understand how to edit the profile groups and fields for translation purposes, we need to detail how the theme uses the group names.%sxProfile group names consist of a prefix part (i.e. "Profile") followed by an underscore (_) followed by the subgroup name ("Bio"): "Profile_Bio".%sThe prefix part (in this example "Profile") is used to identify on which settings page the group and all its fields will be displayed in, to allow members to edit their information:', 'vikinger'),
          '<br><br>',
          '<br><br>',
          '<br><br>',
          '<br><br>',
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
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
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('The prefix part of the xProfile group names shouldn\'t be changed, otherwise the sub groups and fields won\'t display correctly in the settings pages.%sThe subgroup name part (in this example "Bio") is used to identify on which member profile page widget the subgroup fields are going to be displayed in (in this case, the "About Me" widget).%sThis subgroup in particular also has a special case with its "About" xprofile field, which is displayed differently from the other fields (text only at the top of the widget after the title).%sWith this update, users can now edit all subgroup names from the backend "Users" -> "Profile Fields" page to translate them and then enter that same name on the respective customizer "Vikinger Settings" -> "xProfile Groups / Fields" option.%sThis allows the theme to query the subgroup using the new name and display the information correctly on each widget.%sAs we mentioned before, the "Profile_Bio" "About" field is a special case and if changed, its new name has to be entered in the customizer.%sAny other xProfile field names can be changed and will display correctly without the need to enter their new names in the customizer.%sTo summarize:', 'vikinger'),
          '<br><br>',
          '<br><br>',
          '<br><br>',
          '<br><br>',
          '<br><br>',
          '<br><br>',
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
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

    <!-- SECTION INNERTITLE -->
    <p id="vk-customize-pages-elementor" class="section-innertitle section-innertitle-padded"><?php esc_html_e('Encountering issues while editing pages with Elementor', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text"><?php esc_html_e('You can only use Elementor to edit pages created with Elementor (like the landing page) or create new pages.', 'vikinger'); ?></p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->
</div>
<!-- /VK CONTENT -->