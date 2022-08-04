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
    <p class="section-banner-title"><?php esc_html_e('Hooks', 'vikinger'); ?></p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">
    <?php
    
      echo wp_kses(
        sprintf(
          esc_html__('%sThank you for your purchase!%s Below you will find information on theme hooks!.', 'vikinger'),
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
    <p class="section-pretitle"><?php esc_html_e('Hooks', 'vikinger'); ?></p>
    <!-- /SECTION PRETITLE -->

    <!-- SECTION TITLE -->
    <p class="section-title"><?php esc_html_e('What are hooks?', 'vikinger'); ?></p>
    <!-- /SECTION TITLE -->

    <!-- SECTION TEXT -->
    <p class="section-text">
    <?php

      echo wp_kses(
        sprintf(
          esc_html__('Hooks are a way for one piece of code to interact/modify another piece of code at specific, pre-defined spots. There are two types of hooks: %sActions%s and %sFilters%s. To use either, you need to write a custom function known as a Callback, and then register it with a WordPress hook for a specific action or filter.%sFor more information about hooks and how to use them, please refer to this %sofficial WordPress resource%s.%s You can find a list of all the hooks that are available for use in the theme below:', 'vikinger'),
          '<strong>',
          '</strong>',
          '<strong>',
          '</strong>',
          '<br><br>',
          '<a href="https://developer.wordpress.org/plugins/hooks/" target="_blank">',
          '</a>',
          '<br><br>'
        ),
        vikinger_wp_kses_admin_text_get_allowed_tags()
      );

    ?>
    </p>
    <!-- /SECTION TEXT -->
  </div>
  <!-- /SECTION -->

<?php

  $hooks = vikinger_backend_theme_hooks_data_get();

?>

  <!-- SECTION -->
  <div class="section section-free">
    <!-- VK DOCS SECTION -->
    <div class="vk-docs-section">
      <!-- VK DOCS SECTION SIDEBAR -->
      <div class="vk-docs-section-sidebar" data-simplebar>
        <!-- VK DOCS SECTION SIDEBAR ITEM LIST -->
        <ul class="vk-docs-section-sidebar-item-list">
        <?php foreach ($hooks as $hook) : ?>
          <!-- VK DOCS SECTION SIDEBAR ITEM -->
          <li class="vk-docs-section-sidebar-item">
            <!-- VK DOCS SECTION SIDEBAR LINK -->
            <a class="vk-docs-section-sidebar-link" href="#<?php echo esc_attr(strtolower($hook['title'])); ?>"><?php echo esc_html($hook['title'], 'vikinger'); echo esc_html(' (' . vikinger_backend_array_count_get($hook['items'], ['items', 'items']) . ')'); ?></a>
            <!-- /VK DOCS SECTION SIDEBAR LINK -->

          <?php if (count($hook['items']) > 0) : ?>
            <!-- VK DOCS SECTION SIDEBAR ITEM LIST -->
            <ul class="vk-docs-section-sidebar-item-list">

            <?php foreach ($hook['items'] as $section) : ?>
              <!-- VK DOCS SECTION SIDEBAR ITEM -->
              <li class="vk-docs-section-sidebar-item">
                <!-- VK DOCS SECTION SIDEBAR LINK -->
                <a class="vk-docs-section-sidebar-link" href="#section-<?php echo esc_attr(strtolower($section['title'])); ?>"><?php echo esc_html($section['title'] . ' (' . vikinger_backend_array_count_get($section['items'], ['items']) . ')'); ?></a>
                <!-- /VK DOCS SECTION SIDEBAR LINK -->

              <?php if (count($section['items']) > 0) : ?>
                <!-- VK DOCS SECTION SIDEBAR ITEM LIST -->
                <ul class="vk-docs-section-sidebar-item-list">
                <?php foreach ($section['items'] as $subsection) : ?>
                  <!-- VK DOCS SECTION SIDEBAR ITEM -->
                  <li class="vk-docs-section-sidebar-item">
                    <!-- VK DOCS SECTION SIDEBAR LINK -->
                    <a class="vk-docs-section-sidebar-link" href="#subsection-<?php echo esc_attr(strtolower($subsection['title'])); ?>">- <?php echo esc_html($subsection['title'] . ' (' . count($subsection['items']) . ')'); ?></a>
                    <!-- /VK DOCS SECTION SIDEBAR LINK -->

                  <?php if (count($subsection['items']) > 0) : ?>
                    <!-- VK DOCS SECTION SIDEBAR ITEM LIST -->
                    <ul class="vk-docs-section-sidebar-item-list">
                    <?php foreach ($subsection['items'] as $hook_fn) : ?>
                      <!-- VK DOCS SECTION SIDEBAR ITEM -->
                      <li class="vk-docs-section-sidebar-item">
                        <!-- VK DOCS SECTION SIDEBAR LINK -->
                        <a class="vk-docs-section-sidebar-link" href="#hook-<?php echo esc_attr(strtolower($hook_fn['name'])); ?>"><?php echo esc_html($hook_fn['name']); ?></a>
                        <!-- /VK DOCS SECTION SIDEBAR LINK -->
                      </li>
                      <!-- /VK DOCS SECTION SIDEBAR ITEM -->
                    <?php endforeach; ?>
                    </ul>
                    <!-- /VK DOCS SECTION SIDEBAR ITEM LIST -->
                  <?php endif; ?>
                  </li>
                  <!-- /VK DOCS SECTION SIDEBAR ITEM -->
                <?php endforeach; ?>
                </ul>
                <!-- /VK DOCS SECTION SIDEBAR ITEM LIST -->
              <?php endif; ?>
              </li>
              <!-- /VK DOCS SECTION SIDEBAR ITEM -->
            <?php endforeach; ?>
            </ul>
            <!-- /VK DOCS SECTION SIDEBAR ITEM LIST -->
          <?php endif; ?>
          </li>
          <!-- /VK DOCS SECTION SIDEBAR ITEM -->
        <?php endforeach; ?>
        </ul>
        <!-- /VK DOCS SECTION SIDEBAR ITEM LIST -->
      </div>
      <!-- /VK DOCS SECTION SIDEBAR -->

      <!-- VK DOCS SECTION BODY -->
      <div class="vk-docs-section-body">
        <!-- VK DOCS SECTION CONTENT -->
        <div class="vk-docs-section-content">
        <?php foreach ($hooks as $hook) : ?>
          <!-- VK DOCS SECTION TITLE -->
          <p id="<?php echo esc_attr(strtolower($hook['title'])); ?>" class="vk-docs-section-title"><?php echo esc_html($hook['title']); ?></p>
          <!-- /VK DOCS SECTION TITLE -->

          <!-- VK DOCS SECTION DESCRIPTION -->
          <p class="vk-docs-section-description"><?php echo esc_html($hook['description']); ?></p>
          <!-- /VK DOCS SECTION DESCRIPTION -->

          <?php foreach ($hook['items'] as $section) : ?>
            <!-- VK DOCS SECTION SUBTITLE -->
            <p id="section-<?php echo esc_attr(strtolower($section['title'])); ?>" class="vk-docs-section-subtitle"><?php echo esc_html($section['title']); ?></p>
            <!-- /VK DOCS SECTION SUBTITLE -->

            <!-- VK DOCS SECTION DESCRIPTION -->
            <p class="vk-docs-section-description"><?php echo esc_html($section['description']); ?></p>
            <!-- /VK DOCS SECTION DESCRIPTION -->

            <?php foreach ($section['items'] as $subsection) : ?>
              <!-- VK DOCS SUBSECTION CONTENT -->
              <div class="vk-docs-subsection-content">
                <!-- VK DOCS SUBSECTION TITLE -->
                <p id="subsection-<?php echo esc_attr(strtolower($subsection['title'])); ?>" class="vk-docs-subsection-title"><?php echo esc_html($subsection['title']); ?></p>
                <!-- /VK DOCS SUBSECTION TITLE -->

                <!-- VK DOCS SUBSECTION DESCRIPTION -->
                <p class="vk-docs-subsection-description"><?php echo esc_html($subsection['description']); ?></p>
                <!-- /VK DOCS SUBSECTION DESCRIPTION -->

              <?php foreach ($subsection['items'] as $hook_fn) : ?>
              <?php 
              
                $hook_fn_args = [];

                foreach ($hook_fn['args'] as $hook_fn_arg) {
                  $hook_fn_args[] = $hook_fn_arg['name'];
                }

                $hook_fn_args_string = implode(', ', $hook_fn_args);

                $hook_args_function_string = array_key_exists('returns', $hook_fn) ? 'apply_filters' : 'do_action';
              
              ?>
                <!-- VK DOCS SECTION ITEM WRAP -->
                <div id="hook-<?php echo esc_attr(strtolower($hook_fn['name'])); ?>" class="vk-docs-section-item-wrap">
                  <!-- VK DOCS SECTION ITEM -->
                  <div class="vk-docs-section-item">
                    <!-- VK DOCS SUBSECTION SUBTITLE -->
                    <p class="vk-docs-subsection-subtitle">
                      <strong><?php echo array_key_exists('returns', $hook_fn) ? esc_html('(' . $hook_fn['returns']['type'] . ') ') : ''; ?></strong>
                      <?php echo esc_html($hook_fn['name']); ?>
                    </p>
                    <!-- /VK DOCS SUBSECTION SUBTITLE -->

                    <!-- VK DOCS SUBSECTION DESCRIPTION -->
                    <p class="vk-docs-subsection-description"><?php echo esc_html($hook_fn['description']); ?></p>
                    <!-- /VK DOCS SUBSECTION DESCRIPTION -->

                    <!-- VK DOCS SUBSECTION DESCRIPTION -->
                    <p class="vk-docs-subsection-description"><strong class="highlighted"><?php echo esc_html($hook_args_function_string . '(\'' . $hook_fn['name'] . '\', ' . $hook_fn_args_string  . ');'); ?></strong></p>
                    <!-- /VK DOCS SUBSECTION DESCRIPTION -->

                    <!-- VK DOCS SUBSECTION INNERTITLE -->
                    <p class="vk-docs-subsection-innertitle"><?php esc_html_e('Parameters', 'vikinger'); echo esc_html(' (' . count($hook_fn['args']) . ')'); ?></p>
                    <!-- /VK DOCS SUBSECTION INNERTITLE -->

                  <?php foreach ($hook_fn['args'] as $hook_fn_arg) : ?>
                    <!-- VK DOCS SUBSECTION DESCRIPTION -->
                    <p class="vk-docs-subsection-description">
                      <strong><?php echo esc_html('(' . $hook_fn_arg['type'] . ') '); ?></strong>
                      <span class="bold"><?php echo esc_html($hook_fn_arg['name'] . ': '); ?></span>
                      <?php echo esc_html($hook_fn_arg['description']); ?>
                    </p>
                    <!-- /VK DOCS SUBSECTION DESCRIPTION -->
                  <?php endforeach; ?>

                    <!-- VK DOCS SUBSECTION INNERTITLE -->
                    <p class="vk-docs-subsection-innertitle"><?php esc_html_e('Source', 'vikinger'); ?></p>
                    <!-- /VK DOCS SUBSECTION INNERTITLE -->

                    <!-- VK DOCS SUBSECTION DESCRIPTION -->
                    <p class="vk-docs-subsection-description">
                      <strong><?php esc_html_e('File: ', 'vikinger'); ?></strong>
                      <?php echo esc_html($hook_fn['source']['filepath'] . $hook_fn['source']['filename']); ?>
                    </p>
                    <!-- /VK DOCS SUBSECTION DESCRIPTION -->

                    <!-- VK DOCS SUBSECTION DESCRIPTION -->
                    <p class="vk-docs-subsection-description">
                      <strong><?php esc_html_e('Since: ', 'vikinger'); ?></strong>
                      <?php echo esc_html($hook_fn['source']['since']); ?>
                    </p>
                    <!-- /VK DOCS SUBSECTION DESCRIPTION -->
                  </div>
                  <!-- /VK DOCS SECTION ITEM -->
                </div>
                <!-- /VK DOCS SECTION ITEM WRAP -->
              <?php endforeach; ?>
              </div>
              <!-- /VK DOCS SUBSECTION CONTENT -->
            <?php endforeach; ?>
          <?php endforeach; ?>
        <?php endforeach; ?>
        </div>
        <!-- /VK DOCS SECTION CONTENT -->
      </div>
      <!-- /VK DOCS SECTION BODY -->
    </div>
    <!-- /VK DOCS SECTION -->
  </div>
  <!-- /SECTION -->
</div>
<!-- /VK CONTENT -->
  