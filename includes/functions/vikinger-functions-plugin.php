<?php
/**
 * Functions - Plugin
 * 
 * @package Vikinger
 * 
 * @since 1.0.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * Get selected plugin preset.
 * 
 * @return string       Last selected preset name.
 */
function vikinger_plugin_selected_preset_get() {
  return get_theme_mod('vikinger_plugin_selected_preset', 'custom');
}

/**
 * Save selected plugin preset.
 * 
 * @param string  $preset     Preset name to save.
 * @return bool               True if the value was updated, false otherwise.
 */
function vikinger_plugin_selected_preset_save($preset) {
  return set_theme_mod('vikinger_plugin_selected_preset', $preset);
}

/**
 * Get custom preset plugins.
 * 
 * @return array|bool $custom_preset_plugins       Custom preset plugins, false if not set or on error.
 */
function vikinger_plugin_custom_preset_plugins_get() {
  $custom_preset_plugins = get_theme_mod('vikinger_plugin_custom_preset_plugins', false);

  if ($custom_preset_plugins) {
    $custom_preset_plugins = explode(',', $custom_preset_plugins);
  }

  return $custom_preset_plugins;
}

/**
 * Save custom preset plugins.
 * 
 * @param string  $plugins    Comma separated custom preset plugins.
 * @return bool               True if the value was updated, false otherwise.
 */
function vikinger_plugin_custom_preset_plugins_save($plugins) {
  return set_theme_mod('vikinger_plugin_custom_preset_plugins', $plugins);
}

/**
 * Returns plugin WordPress org download link.
 * 
 * @param string  $plugin             Plugin name.
 * @return string $download_link      Plugin zip file download link.
 */
function vikinger_plugin_get_wp_org_download_link($plugin) {
  $download_link = 'https://downloads.wordpress.org/plugin/' . $plugin . '.latest-stable.zip';

  return $download_link;
}

/**
 * Returns required plugins by the theme.
 * 
 * @return array $required_plugins
 */
function vikinger_plugin_get_required_plugins() {
  $required_plugins = [
    'buddypress'                        => [
      'name'        => 'BuddyPress',
      'slug'        => 'buddypress/bp-loader.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('buddypress'),
      'plugin_name' => 'buddypress'
    ],
    'bp-better-messages'                => [
      'name'        => 'BP Better Messages',
      'slug'        => 'bp-better-messages/bp-better-messages.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('bp-better-messages'),
      'plugin_name' => 'bp-better-messages'
    ],
    'bp-verified-member'                => [
      'name'        => 'Verified Member for BuddyPress',
      'slug'        => 'bp-verified-member/bp-verified-member.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('bp-verified-member'),
      'plugin_name' => 'bp-verified-member'
    ],
    'paid-memberships-pro'              => [
      'name'        => 'Paid Memberships Pro',
      'slug'        => 'paid-memberships-pro/paid-memberships-pro.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('paid-memberships-pro'),
      'plugin_name' => 'paid-memberships-pro'
    ],
    'pmpro-buddypress'                  => [
      'name'        => 'Paid Memberships Pro - BuddyPress Add On',
      'slug'        => 'pmpro-buddypress/pmpro-buddypress.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('pmpro-buddypress'),
      'plugin_name' => 'pmpro-buddypress'
    ],
    'pmpro-bbpress'                  => [
      'name'        => 'Paid Memberships Pro - bbPress Add On',
      'slug'        => 'pmpro-bbpress/pmpro-bbpress.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('pmpro-bbpress'),
      'plugin_name' => 'pmpro-bbpress'
    ],
    'advanced-ads'                  => [
      'name'        => 'Advanced Ads',
      'slug'        => 'advanced-ads/advanced-ads.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('advanced-ads'),
      'plugin_name' => 'advanced-ads'
    ],
    'bbpress'                           => [
      'name'        => 'bbPress',
      'slug'        => 'bbpress/bbpress.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('bbpress'),
      'plugin_name' => 'bbpress'
    ],
    'gamipress'                         => [
      'name'        => 'GamiPress',
      'slug'        => 'gamipress/gamipress.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('gamipress'),
      'plugin_name' => 'gamipress'
    ],
    'gamipress-buddypress-integration'  => [
      'name'        => 'GamiPress - BuddyPress Integration',
      'slug'        => 'gamipress-buddypress-integration/gamipress-buddypress.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('gamipress-buddypress-integration'),
      'plugin_name' => 'gamipress-buddypress-integration'
    ],
    'gamipress-bbpress-integration'     => [
      'name'        => 'GamiPress - bbPress Integration',
      'slug'        => 'gamipress-bbpress-integration/gamipress-bbpress.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('gamipress-bbpress-integration'),
      'plugin_name' => 'gamipress-bbpress-integration'
    ],
    'woocommerce'                       => [
      'name'        => 'WooCommerce',
      'slug'        => 'woocommerce/woocommerce.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('woocommerce'),
      'plugin_name' => 'woocommerce'
    ],
    'elementor'                     => [
      'name'        => 'Elementor',
      'slug'        => 'elementor/elementor.php',
      'type'        => 'wordpress',
      'url'         => vikinger_plugin_get_wp_org_download_link('elementor'),
      'plugin_name' => 'elementor'
    ],
    'vikinger-buddypress-extension' => [
      'name'            => 'Vikinger - BuddyPress Extension',
      'slug'            => 'vikinger-buddypress-extension/vikinger-buddypress-extension.php',
      'type'            => 'github',
      'url'             => 'https://github.com/odindesign-themes/vikinger-buddypress-extension/archive/v1.1.1.zip',
      'latest_version'  => '1.1.1',
      'plugin_name'     => 'vikinger-buddypress-extension'
    ],
    'vkreact'                       => [
      'name'            => 'Vikinger Reactions',
      'slug'            => 'vkreact/vkreact.php',
      'type'            => 'github',
      'url'             => 'https://github.com/odindesign-themes/vkreact/archive/v1.0.4.zip',
      'latest_version'  => '1.0.4',
      'plugin_name'     => 'vkreact'
    ],
    'vkreact-buddypress'            => [
      'name'            => 'Vikinger Reactions - BuddyPress Integration',
      'slug'            => 'vkreact-buddypress/vkreact-buddypress.php',
      'type'            => 'github',
      'url'             => 'https://github.com/odindesign-themes/vkreact-buddypress/archive/v1.0.4.zip',
      'latest_version'  => '1.0.4',
      'plugin_name'     => 'vkreact-buddypress'
    ],
    'vkmedia'                       => [
      'name'            => 'Vikinger Media',
      'slug'            => 'vkmedia/vkmedia.php',
      'type'            => 'github',
      'url'             => 'https://github.com/odindesign-themes/vkmedia/archive/v1.0.0.zip',
      'latest_version'  => '1.0.0',
      'plugin_name'     => 'vkmedia'
    ],
    'vikinger-widgets' => [
      'name'            => 'Vikinger Widgets',
      'slug'            => 'vikinger-widgets/vikinger-widgets.php',
      'type'            => 'github',
      'url'             => 'https://github.com/odindesign-themes/vikinger-widgets/archive/v1.0.0.zip',
      'latest_version'  => '1.0.0',
      'plugin_name'     => 'vikinger-widgets'
    ],
    'vikinger-metaboxes' => [
      'name'            => 'Vikinger Metaboxes',
      'slug'            => 'vikinger-metaboxes/vikinger-metaboxes.php',
      'type'            => 'github',
      'url'             => 'https://github.com/odindesign-themes/vikinger-metaboxes/archive/v1.0.2.zip',
      'latest_version'  => '1.0.2',
      'plugin_name'     => 'vikinger-metaboxes'
    ]
  ];

  return $required_plugins;
}

/**
 * Returns plugin latest version from repository
 * 
 * @param string  $plugin       Plugin name.
 * @return string $version      Plugin repository version.
 */
function vikinger_plugin_get_wp_repository_version($plugin) {
  $url = 'https://api.wordpress.org/plugins/info/1.2/?action=plugin_information&request[slugs][]=' . $plugin;

  $response = wp_remote_get($url);

  if (is_wp_error($response)) {
    wp_die($response->get_error_message());
  }

  $plugin_data = json_decode($response['body']);

  $version = $plugin_data->{$plugin}->version;

  return $version;
}

/**
 * Returns required plugins status.
 * 
 * @return array $required_plugins_status     Status of the required plugins.
 */
function vikinger_plugin_get_required_plugins_status() {
  $required_plugins = vikinger_plugin_get_required_plugins();

  $required_plugins_status = [];

  foreach ($required_plugins as $required_plugin => $required_plugin_value) {
    $required_plugin_installed = vikinger_plugin_is_installed($required_plugin);

    $required_plugin_status_data = [
      'installed'   => $required_plugin_installed,
      'updated'     => false,
      'active'      => false,
      'name'        => $required_plugin_value['name'],
      'plugin_name' => $required_plugin_value['plugin_name'],
      'slug'        => $required_plugin_value['slug'],
      'type'        => $required_plugin_value['type'],
      'url'         => $required_plugin_value['url']
    ];

    if ($required_plugin_value['type'] === 'wordpress') {
      $required_plugin_latest_version = vikinger_plugin_get_wp_repository_version($required_plugin);
    } else if ($required_plugin_value['type'] === 'github') {
      // check if git can be queried for this information
      $required_plugin_latest_version = $required_plugin_value['latest_version'];
    }

    $required_plugin_status_data['latest_version'] = $required_plugin_latest_version;

    if ($required_plugin_installed) {
      $required_plugin_data = vikinger_plugin_installed_get_data($required_plugin);
      $required_plugin_data_merge = [
        'current_version' => $required_plugin_data['Version']
      ];

      $required_plugin_status_data = array_merge($required_plugin_status_data, $required_plugin_data_merge);
      $required_plugin_status_data['active'] = vikinger_plugin_is_active($required_plugin);
      $required_plugin_status_data['updated'] = $required_plugin_status_data['current_version'] === $required_plugin_latest_version;
      // all repository data
      $required_plugin_status_data['data'] = $required_plugin_data;
    }

    $required_plugins_status[] = $required_plugin_status_data;
  }

  return $required_plugins_status;
}

/**
 * Returns installed plugin information data
 * 
 * @param string  $plugin           PLugin name.
 * @return array  $plugin_data      Plugin information data.
 */
function vikinger_plugin_installed_get_data($plugin) {
  $required_plugins = vikinger_plugin_get_required_plugins();
  $installed_plugins = get_plugins();

  $plugin_slug = $required_plugins[$plugin]['slug'];

  $plugin_data = $installed_plugins[$plugin_slug];

  return $plugin_data;
}

/**
 * Check if a plugin is installed.
 * 
 * @param string  $plugin           PLugin name.
 * @return bool   $is_installed     True if plugin is installed, false otherwise.
 */
function vikinger_plugin_is_installed($plugin) {
  $required_plugins = vikinger_plugin_get_required_plugins();
  $installed_plugins = get_plugins();

  $plugin_slug = $required_plugins[$plugin]['slug'];

  $is_installed = array_key_exists($plugin_slug, $installed_plugins);

  return $is_installed;
}

/**
 * Installs and activates a plugin.
 * 
 * @param string  $plugin_url     Plugin name.
 * @return bool   $result         True if installed and activated plugin, false otherwise.
 */
function vikinger_plugin_install_and_activate($plugin_name) {
  $tries = 3;
  $result = false;

  $plugin = vikinger_plugin_get_required_plugins()[$plugin_name];

  while ($tries > 0 && !$result) {
    $tries = $tries - 1;
    if ($plugin['type'] === 'wordpress') {
      $result = vikinger_plugin_install($plugin['url']);
    } else if ($plugin['type'] === 'github') {
      $result = vikinger_plugin_install_from_github($plugin['plugin_name'], $plugin['latest_version'], $plugin['url']);
    } else {
      $result = false;
      break;
    }
  }

  if ($result) {
    $tries = 3;
    $result = false;
    
    while ($tries > 0 && !$result) {
      $tries = $tries - 1;
      $result = vikinger_plugin_activate($plugin['slug']);
    }
  }

  return $result;
}

/**
 * Installs a plugin from a github repository.
 * 
 * @param string  $plugin_name      Plugin name.
 * @param string  $plugin_version   Plugin version.
 * @param string  $plugin_url       Plugin url.
 * @return bool   $installed        True if installed plugin, false otherwise.
 */
function vikinger_plugin_install_from_github($plugin_name, $plugin_version, $plugin_url) {
  $download_file_name = $plugin_name . '-' . $plugin_version;

  $plugin_zip = download_url($plugin_url);

  $result = WP_Filesystem();

  if ($result) {
    global $wp_filesystem;

    // unzip plugin to upgrade directory
    $file_path = $wp_filesystem->wp_content_dir() . 'upgrade/';
    $file_name = $file_path . $download_file_name;

    // remove file with the same name from upgrade directory if it exists
    if ($wp_filesystem->is_dir($file_name)) {
      $wp_filesystem->delete($file_name, true);
    }

    // unzip file
    $unzipped = unzip_file($plugin_zip, $file_path);

    if (is_wp_error($unzipped)) {
      $wp_filesystem->delete($file_name, true);

      return false;
    } else {
      // unzipped correctly, move file
      $plugins_filename = $wp_filesystem->wp_plugins_dir() . $plugin_name;

      // remove file with the same name from plugins directory if it exists
      if ($wp_filesystem->is_dir($plugins_filename)) {
        $wp_filesystem->delete($plugins_filename, true);
      }

      // move plugin
      $moved = $wp_filesystem->move($file_name, $plugins_filename);

      if (!$moved) {
        // delete from upgrade directory
        $wp_filesystem->delete($file_name, true);
      }

      return $moved;
    }
  }

  return false;
}

/**
 * Installs a plugin.
 * 
 * @param string  $plugin_url     Plugin url.
 * @return bool   $installed      True if installed plugin, false otherwise.
 */
function vikinger_plugin_install($plugin_url) {
  require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

  $skin = new WP_Ajax_Upgrader_Skin();
  $Plugin_Upgrader = new Plugin_Upgrader($skin);

  $installed = $Plugin_Upgrader->install($plugin_url);

  if (is_wp_error($installed)) {
    $installed = false;
  }

  return $installed;
}

/**
 * Updates and activates a plugin.
 * 
 * @param string  $plugin_name    Plugin name.
 * @return bool   $result         True if updated and activated plugin, false otherwise.
 */
function vikinger_plugin_update_and_activate($plugin_name) {
  $plugin = vikinger_plugin_get_required_plugins()[$plugin_name];

  if ($plugin['type'] === 'wordpress') {
    $result = vikinger_plugin_update($plugin['slug']);
  } else if ($plugin['type'] === 'github') {
    $result = vikinger_plugin_install_from_github($plugin['plugin_name'], $plugin['latest_version'], $plugin['url']);
  } else {
    $result = false;
  }

  if ($result) {
    $result = vikinger_plugin_activate($plugin['slug']);
  }

  return $result;
}

/**
 * Updates a plugin.
 * 
 * @param string  $plugin_slug    Plugin slug.
 * @return bool   $updated        True if updated plugin, false otherwise.
 */
function vikinger_plugin_update($plugin_slug) {
  require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

  $skin = new WP_Ajax_Upgrader_Skin();
  $Plugin_Upgrader = new Plugin_Upgrader($skin);

  $updated = $Plugin_Upgrader->upgrade($plugin_slug);

  if (is_wp_error($updated)) {
    $updated = false;
  }

  return $updated;
}

/**
 * Activates a plugin.
 * 
 * @param string  $plugin_slug      Plugin slug.
 * @return bool   $activated        True if activated plugin, false otherwise.
 */
function vikinger_plugin_activate($plugin_slug) {
  $activated = activate_plugin($plugin_slug);

  return $activated === NULL;
}

/**
 * Check if a plugin is active.
 * 
 * @param string  $plugin         PLugin name.
 * @return bool   $is_active      True if plugin is active, false otherwise.
 */
function vikinger_plugin_is_active($plugin) {
  switch ($plugin) {
    case 'buddypress':
      $is_active = function_exists('buddypress');
      break;
    case 'bp-verified-member':
      $is_active = class_exists('BP_Verified_Member');
      break;
    case 'bbpress':
      $is_active = class_exists('bbPress');
      break;
    case 'bp-better-messages':
      $is_active = class_exists('BP_Better_Messages');
      break;
    case 'bp-verified-member':
      $is_active = class_exists('BP_Verified_Member');
      break;
    case 'gamipress':
      $is_active = function_exists('GamiPress');
      break;
    case 'gamipress-buddypress-integration':
      $is_active = class_exists('GamiPress_BuddyPress');
      break;
    case 'gamipress-bbpress-integration':
      $is_active = class_exists('GamiPress_bbPress');
      break;
    case 'woocommerce':
      $is_active = class_exists('WooCommerce');
      break;
    case 'paid-memberships-pro':
      $is_active = function_exists('pmpro_init');
      break;
    case 'pmpro-buddypress':
      $is_active = function_exists('pmpro_bp_get_level_options');
      break;
    case 'pmpro-bbpress':
      $is_active = function_exists('pmprobb_init');
      break;
    case 'advanced-ads':
      $is_active = class_exists('Advanced_Ads');
      break;
    case 'advanced-ads-pro':
      $is_active = class_exists('Advanced_Ads_Pro');
      break;
    case 'elementor':
      $is_active = class_exists('Elementor\Plugin');
      break;
    case 'vikinger-buddypress-extension':
      $is_active = function_exists('vikinger_buddypress_extension_init');
      break;
    case 'vkreact':
      $is_active = function_exists('vkreact_activate');
      break;
    case 'vkreact-buddypress':
      $is_active = function_exists('vkreact_bp_activate');
      break;
    case 'vkmedia':
      $is_active = function_exists('vkmedia_activate');
      break;
    case 'vikinger-widgets':
      $is_active = function_exists('vkwidgets_activate');
      break;
    case 'vikinger-metaboxes':
      $is_active = function_exists('vkmetaboxes_activate');
      break;
    default:
      $is_active = false;
  }

  return $is_active;
}

/**
 * Checks if the BuddyPress plugin is active.
 * 
 * @return bool $is_active    True if the BuddyPress plugin is active, false otherwise.
 */
function vikinger_plugin_buddypress_is_active() {
  $is_active = vikinger_plugin_is_active('buddypress');

  return $is_active;
}

/**
 * Checks if the GamiPress plugin is active.
 * 
 * @return bool $is_active    True if the GamiPress plugin is active, false otherwise.
 */
function vikinger_plugin_gamipress_is_active() {
  $is_active = vikinger_plugin_is_active('gamipress');

  return $is_active;
}

/**
 * Checks if the vkreact plugin is active.
 * 
 * @return bool $is_active    True if the vkreact plugin is active, false otherwise.
 */
function vikinger_plugin_vkreact_is_active() {
  $is_active = vikinger_plugin_is_active('vkreact');

  return $is_active;
}

/**
 * Checks if the vkreact-buddypress plugin is active.
 * 
 * @return bool $is_active    True if the vkreact-buddypress plugin is active, false otherwise.
 */
function vikinger_plugin_vkreact_buddypress_is_active() {
  $is_active = vikinger_plugin_is_active('vkreact-buddypress');

  return $is_active;
}

/**
 * Checks if the vkmedia plugin is active.
 * 
 * @return bool $is_active    True if the vkmedia plugin is active, false otherwise.
 */
function vikinger_plugin_vkmedia_is_active() {
  $is_active = vikinger_plugin_is_active('vkmedia');

  return $is_active;
}

/**
 * Checks if the elementor plugin is active.
 * 
 * @return bool $is_active    True if the elementor plugin is active, false otherwise.
 */
function vikinger_plugin_elementor_is_active() {
  $is_active = vikinger_plugin_is_active('elementor');

  return $is_active;
}

/**
 * Checks if the bbpress plugin is active.
 * 
 * @return bool $is_active    True if the bbpress plugin is active, false otherwise.
 */
function vikinger_plugin_bbpress_is_active() {
  $is_active = vikinger_plugin_is_active('bbpress');

  return $is_active;
}

/**
 * Checks if the woocommerce plugin is active.
 * 
 * @return bool $is_active    True if the woocommerce plugin is active, false otherwise.
 */
function vikinger_plugin_woocommerce_is_active() {
  $is_active = vikinger_plugin_is_active('woocommerce');

  return $is_active;
}

/**
 * Checks if the paid memberships pro plugin is active.
 * 
 * @return bool $is_active    True if the pmpro plugin is active, false otherwise.
 */
function vikinger_plugin_pmpro_is_active() {
  $is_active = vikinger_plugin_is_active('paid-memberships-pro');

  return $is_active;
}

/**
 * Checks if the paid memberships pro - buddypress plugin is active.
 * 
 * @return bool $is_active    True if the pmpro - buddypress plugin is active, false otherwise.
 */
function vikinger_plugin_pmpro_buddypress_is_active() {
  $is_active = vikinger_plugin_is_active('pmpro-buddypress');

  return $is_active;
}

/**
 * Checks if the paid memberships pro - bbpress plugin is active.
 * 
 * @return bool $is_active    True if the pmpro - bbpress plugin is active, false otherwise.
 */
function vikinger_plugin_pmpro_bbpress_is_active() {
  $is_active = vikinger_plugin_is_active('pmpro-bbpress');

  return $is_active;
}

/**
 * Checks if the Advanced Ads plugin is active.
 * 
 * @return bool $is_active    True if the Advanced Ads plugin is active, false otherwise.
 */
function vikinger_plugin_advancedads_is_active() {
  $is_active = vikinger_plugin_is_active('advanced-ads');

  return $is_active;
}

/**
 * Checks if the Advanced Ads Pro plugin is active.
 * 
 * @return bool $is_active    True if the Advanced Ads Pro plugin is active, false otherwise.
 */
function vikinger_plugin_advancedads_pro_is_active() {
  $is_active = vikinger_plugin_is_active('advanced-ads-pro');

  return $is_active;
}

/**
 * Checks if the bp better messages plugin is active.
 * 
 * @return bool $is_active    True if the bp better messages plugin is active, false otherwise.
 */
function vikinger_plugin_bpbettermessages_is_active() {
  $is_active = vikinger_plugin_is_active('bp-better-messages');

  return $is_active;
}

/**
 * Checks if the verified member for buddypress plugin is active.
 * 
 * @return bool $is_active    True if the verified member for buddypress plugin is active, false otherwise.
 */
function vikinger_plugin_bpverifiedmember_is_active() {
  $is_active = vikinger_plugin_is_active('bp-verified-member');

  return $is_active;
}

/**
 * Returns required plugins activation status
 * 
 * @return $required_plugins_status       Required plugin with activation status.
 */
function vikinger_plugin_get_required_plugins_activation_status() {
  $required_plugins_status = [];

  $required_plugins = vikinger_plugin_get_required_plugins();

  foreach ($required_plugins as $required_plugin) {
    $required_plugins_status[$required_plugin['plugin_name']] = vikinger_plugin_is_active($required_plugin['plugin_name']);
  }

  // add buddypress component related activation status
  if (vikinger_plugin_buddypress_is_active()) {
    $required_plugins_status['buddypress_activity'] = bp_is_active('activity');
    $required_plugins_status['buddypress_groups'] = bp_is_active('groups');
    $required_plugins_status['buddypress_friends'] = bp_is_active('friends');
    $required_plugins_status['buddypress_messages'] = bp_is_active('messages');
    $required_plugins_status['buddypress_notifications'] = bp_is_active('notifications');
  }

  $required_plugins_status['advanced-ads-pro'] = vikinger_plugin_advancedads_pro_is_active();

  return $required_plugins_status;
}

?>