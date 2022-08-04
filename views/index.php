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
    <p class="section-banner-title"><?php esc_html_e('Getting Started', 'vikinger'); ?></p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">
    <?php
    
      echo wp_kses(
        sprintf(
          esc_html__('%sThank you for your purchase!%s This is your first stop after activating the theme! Read about how to setup, configure, import demo content and much more!.', 'vikinger'),
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
  <div class="section section-full no-border">
    <!-- MESSAGE BOX -->
    <div class="message-box message-box-info">
      <!-- MESSAGE BOX ICON WRAP -->
      <div class="message-box-icon-wrap">
      <?php

        /**
         * Icon SVG
         */
        get_template_part('template-part/icon/icon', 'svg', [
          'icon'  => 'info'
        ]);

      ?>
      </div>
      <!-- /MESSAGE BOX ICON WRAP -->

      <!-- MESSAGE BOX TITLE -->
      <p class="message-box-title"><?php esc_html_e('Important:', 'vikinger'); ?></p>
      <!-- /MESSAGE BOX TITLE -->

      <!-- MESSAGE BOX TEXT -->
      <p class="message-box-text">
      <?php

        echo wp_kses(
          esc_html__('We ask that you please read carefully all the information in this page. Here you’ll find what you need to do in order to setup the theme and import the demo content to make it look like the live preview. It’s very important that you follow all the steps because setting up the theme correctly will help you avoid issues and errors. We also provide information and guides on how to customize the theme and FAQs.', 'vikinger'),
          vikinger_wp_kses_admin_text_get_allowed_tags()
        );

      ?>
      </p>
      <!-- /MESSAGE BOX TEXT -->
    </div>
    <!-- /MESSAGE BOX -->
  </div>
  <!-- /SECTION -->

  <!-- SECTION -->
  <div class="section">
    <!-- SECTION TOP IMAGE -->
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/activation-howto.png" alt="activation-howto">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Getting Started', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Starting, Customizing &amp; Guides', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('In this page you’ll find instructions to install the plugins, setup the theme and import demo content. We also have helpful guides that we recommend you to read in order to know about more customization, settings and more!%sHere’s a quick overview:', 'vikinger'),
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('Vikinger Documentation', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Here you can find detailed guides about the theme %scustomization, plugins (for example GamiPress), menus, translation, blog and more!%s', 'vikinger'),
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('We also %sstrongly recommend reading the section “Theme Customization” - “Customizer Settings%s where you’ll find a quick overview of all the things that you’ll be able to customize via the WP customizer. Things like %scolors presets, changing login and register pages text and images, loading screen, avatar and profile settings, remove the search or sidebar, media settings%s and more!', 'vikinger'),
          '<strong>',
          '</strong>',
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('%sClick here to check the documentation%s', 'vikinger'),
          '<a href="https://odindesignthemes.com/vikingerthemedocs/" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('Vikinger Video Guides', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        esc_html__('Quick video guides so you can check out individual things or have a visual aid for things like setup, demo import, customization and more!', 'vikinger'),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('%sClick here to check the video guides%s', 'vikinger'),
          '<a href="https://www.youtube.com/playlist?list=PLdR1KxGpPfLWZ1Yq0_mNlYCtj8TLfX9CK" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('Vikinger FAQs Section', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Helpful guides based on the top asked questions people ask about the theme, like %show to remove the wp bar on top? how to force login users for only them to see the content? how to customize the login forms? how to change the page users are redirected after login? how to translate?%s and many more!', 'vikinger'),
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('%sClick here to check the FAQs%s', 'vikinger'),
          '<a href="' . admin_url('admin.php?page=vikinger_faqs') . '" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('Vikinger Troubleshooting Section', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Answers to the most common issues or problems you may encounter, like %sWordPress site Health, people can’t login after registration, registration email not sending%s and many more!', 'vikinger'),
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('%sClick here to check the Troubleshooting section%s', 'vikinger'),
          '<a href="' . admin_url('admin.php?page=vikinger_troubleshooting') . '" target="_blank">',
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
  <div class="section">
    <!-- SECTION TOP IMAGE -->
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/activation-howto.png" alt="activation-howto">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Getting Started', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('How to Install', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        esc_html__('Here’s a quick video guide about how to install the theme and plugins:', 'vikinger'),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- IFRAME WRAP -->
    <div class="iframe-wrap">
      <iframe src="https://www.youtube.com/embed/t6ENt1PI6iw"></iframe>
    </div>
    <!-- /IFRAME WRAP -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('For a more detailed step by step guide, we recommend you checking the %sdocumentation%s. Go to %sGetting Started -> How to Install%s', 'vikinger'),
          '<a href="https://odindesignthemes.com/vikingerthemedocs/how-to-install/" target="_blank">',
          '</a>',
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
  <div class="section">
    <!-- SECTION TOP IMAGE -->
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/activation-howto.png" alt="activation-howto">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Getting Started', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Theme Setup', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Here’s a quick video guide about how to configure some plugin options to ensure the correct functionality of the included features. %sThis is a very important step to ensure that everything works OK and to avoid styling and other issues.%s', 'vikinger'),
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- IFRAME WRAP -->
    <div class="iframe-wrap">
      <iframe src="https://www.youtube.com/embed/CL4Qy3Dm0Y4"></iframe>
    </div>
    <!-- /IFRAME WRAP -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('For a more detailed step by step guide, we recommend you checking the %sdocumentation%s. Go to %sGetting Started -> Theme Setup%s', 'vikinger'),
          '<a href="https://odindesignthemes.com/vikingerthemedocs/theme-setup/" target="_blank">',
          '</a>',
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
  <div class="section">
    <!-- SECTION TOP IMAGE -->
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/activation-howto.png" alt="activation-howto">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Getting Started', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Demo Import', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('We created a demo content import page so you\'ll be able to %simport all the menus, pages and profile fields%s that you see in the live demo and more!%sFirst of all, make sure to %sfollow the steps of the "How to Install" and "Theme Setup" sections%s.%sAfter this you\'ll have two options:', 'vikinger'),
          '<strong>',
          '</strong>',
          '<br><br>',
          '<strong>',
          '</strong>',
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
        <p class="unordered-list-item-text">
        <?php

          echo wp_kses(
            sprintf(
              esc_html__('%sCustomize the theme the way you want%s, adding your sections, menus, etc, following the steps of each of the documentation sections (Theme Customization, Menus, etc) and the video guides. This is better for people that want to start from zero and customize everything.', 'vikinger'),
              '<strong>',
              '</strong>'
            ),
            vikinger_wp_kses_admin_text_get_allowed_tags()
          );

        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->

      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

          echo wp_kses(
            sprintf(
              esc_html__('%sImport content from the demo%s. You\'ll find the import screen inside the theme, in the "Demo Import" tab. There, you\'ll be able to choose what elements to import, or even reset them. We developed this so you can import all, or just choose the elements that you\'d like to add.', 'vikinger'),
              '<strong>',
              '</strong>'
            ),
            vikinger_wp_kses_admin_text_get_allowed_tags()
          );

        ?>
        </p>
        <!-- /UNORDERED LIST ITEM TEXT -->
      </li>
      <!-- /UNORDERED LIST ITEM -->
    </ul>
    <!-- /UNORDERED LIST -->

    <!-- MESSAGE BOX -->
    <div class="message-box message-box-info">
      <!-- MESSAGE BOX ICON WRAP -->
      <div class="message-box-icon-wrap">
      <?php

        /**
         * Icon SVG
         */
        get_template_part('template-part/icon/icon', 'svg', [
          'icon'  => 'info'
        ]);

      ?>
      </div>
      <!-- /MESSAGE BOX ICON WRAP -->

      <!-- MESSAGE BOX TITLE -->
      <p class="message-box-title"><?php esc_html_e('Important:', 'vikinger'); ?></p>
      <!-- /MESSAGE BOX TITLE -->

      <!-- MESSAGE BOX TEXT -->
      <p class="message-box-text">
      <?php

        echo wp_kses(
          esc_html__('Please keep in mind that this tool doesn\'t import the Elementor and GamiPress plugin specific demo content data (including all badges, quests, ranks and credits with the illustrations) because they are imported via each plugin. You can import the plugin specific demo content data by following the steps in the "Elementor" and "GamiPress" / "Demo Content" sections of the documentation.', 'vikinger'),
          vikinger_wp_kses_admin_text_get_allowed_tags()
        );

      ?>
      </p>
      <!-- /MESSAGE BOX TEXT -->
    </div>
    <!-- /MESSAGE BOX -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        esc_html__('Check out this video guide where you can see the entire process, from installing and configuring the theme, to importing all content to make it look like the live demo:', 'vikinger'),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- IFRAME WRAP -->
    <div class="iframe-wrap">
      <iframe src="https://www.youtube.com/embed/SXEgduXEupk"></iframe>
    </div>
    <!-- /IFRAME WRAP -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        esc_html__('After this, as we mentioned before, you only need to install the Elementor demo content and customize all other elements (menus, pages, etc) any way you want! Take a look at other sections of the documentation to see how to edit each one!', 'vikinger'),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->
</div>
<!-- /VK CONTENT -->