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
    <p class="section-banner-title"><?php esc_html_e('Support', 'vikinger'); ?></p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">
    <?php
    
      echo wp_kses(
        sprintf(
          esc_html__('%sThank you for your purchase!%s Below you will find information on how to get support for the theme!.', 'vikinger'),
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
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/includes.png" alt="includes">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Support', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Envato\'s Support Policy', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('You can read the full %sEnvato Support Policy%s rules and guidelines of what\'s included and what\'s not in support %shere%s. Here\'s a quick view:', 'vikinger'),
          '<a href="https://themeforest.net/page/item_support_policy" target="_blank">',
          '</a>',
          '<a href="https://themeforest.net/page/item_support_policy" target="_blank">',
          '</a>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('Included:', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

        echo wp_kses(
          sprintf(
            esc_html__('%sQuestions about the functionality of the item:%s answer your general questions about the item and how to use it. For example, how to set the homepage of the theme, how to change the colors, etc.', 'vikinger'),
            '<span class="bold">',
            '</span>'
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
        <p class="unordered-list-item-text">
        <?php

        echo wp_kses(
          sprintf(
            esc_html__('%sGet assistance with reported bugs and issues:%s if you\'re having issues with the theme or a bug, contact us and we\'ll help you with your problem! ', 'vikinger'),
            '<span class="bold">',
            '</span>'
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
        <p class="unordered-list-item-text">
        <?php

        echo wp_kses(
          sprintf(
            esc_html__('%sHelp with included 3rd party assets:%s we\'ll help you with questions that you may have with the 3rd party assets included in the theme, for example, the GamiPress features or functionality.', 'vikinger'),
            '<span class="bold">',
            '</span>'
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

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('Not Included:', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- UNORDERED LIST -->
    <ul class="unordered-list">
      <!-- UNORDERED LIST ITEM -->
      <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

        echo wp_kses(
          sprintf(
            esc_html__('%sCustomization and theme installation:%s Item support does not include services to modify or extend the item beyond the original features, style and functionality described on the item page. %sIf you\'re interested in customization services, please check the "Customization Services" section down below.%s', 'vikinger'),
            '<span class="bold">',
            '</span>',
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

       <!-- UNORDERED LIST ITEM -->
       <li class="unordered-list-item">
        <!-- UNORDERED LIST ITEM TEXT -->
        <p class="unordered-list-item-text">
        <?php

        echo wp_kses(
          sprintf(
            esc_html__('%sHelp with not included third party plugins:%s Having in mind that WordPress has thousands of plugins available, we can\'t provide support/integration for all, like for example, if you want to add a new plugin and are having problems with it or it\'s integration, please ask support to the author of the plugin.', 'vikinger'),
            '<span class="bold">',
            '</span>'
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

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('%sPlease keep in mind this support rules before contacting the support team. This rules are put in place by Envato and help the team focus on working towards bringing you new features and updates for the theme!%s%sWe appreciate your understanding!', 'vikinger'),
          '<span class="bold tertiary">',
          '</span>',
          '<br><br>'
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
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/how-to.png" alt="how-to">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Support', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('How to get support?', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Before sending your support query, %splease consult the above section to check if it\'s included in the support of the item and check the documentation and FAQs sections%s of the theme as many times your questions may already be answered there.', 'vikinger'),
          '<strong>',
          '</strong>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('Guidelines', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('In order to provide a better support experience for our customers, we are now using a ticket system which you can access %shere%s.%s%sPlease read the support rules and check out the product articles and public tickets before creating a new ticket%s, as many times your questions may already be answered, saving you back and forth time.', 'vikinger'),
          '<a href="https://odindesignthemes.ticksy.com/" target="_blank">',
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

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('The team provides support from %sMonday to Friday, from 9AM to 6PM (UTC-3).%s%sWe always try to reply as fast as possible, but %skeep in mind that the response time can be up to 2 business days%s.%sThe team %sdoes not provide support on weekends and public holidays.%s', 'vikinger'),
          '<span class="bold">',
          '</span>',
          '<br><br>',
          '<span class="bold">',
          '</span>',
          '<br><br>',
          '<span class="bold">',
          '</span>'
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
    <img class="section-top-image" src="<?php echo VIKINGER_URL; ?>/img/admin/plugins.png" alt="plugins">
    <!-- /SECTION TOP IMAGE -->

    <!-- SECTION PRETITLE -->
    <p class="section-pretitle"><?php esc_html_e('Support', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('Customization Services', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Are you in need of customization, installation, a custom plugin or something else? Due to Envato\'s Support Policy, our support team can\'t help with customizations or answer questions about them.%sWe always try to help in any way we can, but keep in mind that personal and further customizations fall outside the support scope due to Envato\'s rules.%sSadly, due to recent events (pandemic) we can\'t take any custom jobs due to lack of time as our team got smaller and it\'s already stretched thin working on updates and improving the theme.%sRegardless, we recently reached out to a couple of highly rated devs, so if you want, you can check them out here:', 'vikinger'),
          '<br>',
          '<br><br>',
          '<br><br>',
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->

    <!-- SECTION INNERTITLE -->
    <p class="section-innertitle"><?php esc_html_e('WordPress Customization', 'vikinger'); ?></p>
    <!-- /SECTION INNERTITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('%sStephan Csorba:%s Building websites for more than 15 years', 'vikinger'),
          '<a href="https://track.fiverr.com/visit/?bta=174464&brand=fiverrcpa&landingPage=https%3A%2F%2Fwww.fiverr.com%2Fstephancsorba" target="_blank">',
          '</a>'
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
          esc_html__('%sDan (boomlandjenkins):%s WordPress Web Designer and Web Consultant', 'vikinger'),
          '<a href="https://track.fiverr.com/visit/?bta=174464&brand=fiverrcpa&landingPage=https%3A%2F%2Fwww.fiverr.com%2Fboomlandjenkins" target="_blank">',
          '</a>'
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
          esc_html__('%sWe encourage you to first send them a message asking about what you need and they will advice you. You can also check out past reviews of people who already worked with them!%s%sYou can always recheck this list as we’ll keep updating it with new artists and developers.', 'vikinger'),
          '<strong>',
          '</strong>',
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->
</div>
<!-- /VK CONTENT -->