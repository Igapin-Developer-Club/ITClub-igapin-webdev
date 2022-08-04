<?php
/**
 * Vikinger - Functions
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

/**
 * THEME CONSTANTS
 */

/**
 * Versioning
 */
define('VIKINGER_VERSION', '1.9.7.6');
define('VIKINGER_VERSION_OPTION', 'vikinger_version');

/**
 * Theme paths and urls
 */
define('VIKINGER_PATH', get_template_directory());
define('VIKINGER_URL', get_template_directory_uri());

if (!defined('VIKINGER_UPLOADS_PATH')) {
  define('VIKINGER_UPLOADS_PATH', wp_get_upload_dir()['basedir'] . '/vikinger');
}

if (!defined('VIKINGER_UPLOADS_URL')) {
  define('VIKINGER_UPLOADS_URL', wp_get_upload_dir()['baseurl'] . '/vikinger');
}

/**
 * Load admin styles and scripts
 */
function vikinger_admin_load_scripts() {
  // load fonts
  wp_enqueue_style('vikinger-admin-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Titillium+Web:400,900&display=swap');

  // add custom stylesheets
  wp_enqueue_style('vikinger-admin-simplebar-styles', VIKINGER_URL . '/css/vendor/simplebar.css', [], '1.0.0');
  wp_enqueue_style('vikinger-admin-styles', VIKINGER_URL . '/css/admin-style.min.css', ['vikinger-admin-simplebar-styles'], '1.4.9.2');

  // add custom scripts
  wp_enqueue_script('vikinger-admin-scripts', VIKINGER_URL . '/js/admin.bundle.min.js', [], '3.9.9.2', true);

  // pass php variables to javascript file
  wp_localize_script('vikinger-admin-scripts', 'vikinger_constants', array(
    'vikinger_admin_ajax_nonce' => wp_create_nonce('vikinger_admin_ajax')
  ));

  // pass translation strings to javascript file
  wp_localize_script('vikinger-admin-scripts', 'vikinger_translation', vikinger_translation_get());
}

add_action('admin_enqueue_scripts', 'vikinger_admin_load_scripts');

/**
 * Load theme styles and scripts
 */
function vikinger_load_scripts() {
  // get fonts
  $fonts = vikinger_customizer_theme_fonts_get_for_enqueue();

  // load fonts
  wp_enqueue_style('vikinger-fonts', 'https://fonts.googleapis.com/css?family=' . $fonts['primary'] . ':400,500,600,700|' . $fonts['secondary'] . ':400,900&display=swap');

  // add custom stylesheets
  wp_enqueue_style('vikinger-simplebar-styles', VIKINGER_URL . '/css/vendor/simplebar.css', [], '1.0.0');
  wp_enqueue_style('vikinger-swiper-slider-styles', VIKINGER_URL . '/css/vendor/swiper.min.css', [], '1.0.0');
  wp_enqueue_style('vikinger-styles', VIKINGER_URL . '/style.css', ['vikinger-simplebar-styles', 'vikinger-swiper-slider-styles'], '3.9.9.2');

  // get user custom theme fonts
  $custom_fonts = vikinger_customizer_theme_fonts_get_style();

  // add user custom theme fonts
  wp_add_inline_style('vikinger-styles', $custom_fonts);

  // get user custom theme colors
  $custom_colors = vikinger_customizer_theme_colors_get();

  // add user custom theme colors
  wp_add_inline_style('vikinger-styles', $custom_colors);

  // add plugins
  wp_enqueue_script('vikinger-swiper-scripts', VIKINGER_URL . '/js/vendor/swiper.min.js', [], '1.0.0', true);
  wp_enqueue_script('vikinger-xmaccordion-scripts', VIKINGER_URL . '/js/vendor/xm_accordion.min.js', [], '1.0.0', true);
  wp_enqueue_script('vikinger-xmdropdown-scripts', VIKINGER_URL . '/js/vendor/xm_dropdown.min.js', [], '1.0.0', true);
  wp_enqueue_script('vikinger-xmhexagon-scripts', VIKINGER_URL . '/js/vendor/xm_hexagon.min.js', [], '1.0.0', true);
  wp_enqueue_script('vikinger-xmpopup-scripts', VIKINGER_URL . '/js/vendor/xm_popup.min.js', [], '1.0.0', true);
  wp_enqueue_script('vikinger-xmprogressBar-scripts', VIKINGER_URL . '/js/vendor/xm_progressBar.min.js', [], '1.0.0', true);
  wp_enqueue_script('vikinger-xmtab-scripts', VIKINGER_URL . '/js/vendor/xm_tab.min.js', [], '1.0.0', true);
  wp_enqueue_script('vikinger-xmtooltip-scripts', VIKINGER_URL . '/js/vendor/xm_tooltip.min.js', [], '1.0.0', true);

  $vikinger_main_scripts_dependencies = [
    'jquery',
    'vikinger-swiper-scripts',
    'vikinger-xmaccordion-scripts',
    'vikinger-xmdropdown-scripts',
    'vikinger-xmhexagon-scripts',
    'vikinger-xmpopup-scripts',
    'vikinger-xmprogressBar-scripts',
    'vikinger-xmtab-scripts',
    'vikinger-xmtooltip-scripts'
  ];

  // add main script
  wp_enqueue_script('vikinger-main-scripts', VIKINGER_URL . '/js/app.bundle.min.js', $vikinger_main_scripts_dependencies, '3.9.9.2', true);

  global $vikinger_settings;

  $vikinger_settings = vikinger_settings_get();

  // pass php variables to javascript file
  wp_localize_script('vikinger-main-scripts', 'vikinger_constants', [
    'vikinger_url'                => VIKINGER_URL,
    'home_url'                    => esc_url(home_url('/')),
    'ajax_url'                    => admin_url('admin-ajax.php'),
    'wp_rest_nonce'               => wp_create_nonce('wp_rest'),
    'vikinger_ajax_nonce'         => wp_create_nonce('vikinger_ajax'),
    'rest_root'                   => esc_url_raw(rest_url()),
    'plugin_active'               => vikinger_plugin_get_required_plugins_activation_status(),
    'gamipress_badge_type_exists' => vikinger_plugin_gamipress_is_active() && vikinger_gamipress_achievement_type_exists('badge'),
    'colors'                      => vikinger_customizer_theme_colors_get_array(),
    'settings'                    => $vikinger_settings
  ]);

  // pass translation strings to javascript file
  wp_localize_script('vikinger-main-scripts', 'vikinger_translation', vikinger_translation_get());
}

add_action('wp_enqueue_scripts', 'vikinger_load_scripts');

/**
 * Remove plugin styles that are not needed to reduce file queries
 */
function vikinger_dequeue_styles() {
  // remove BuddyPress styles
  wp_dequeue_style('bp-legacy-css');

  // remove GamiPress styles
  wp_dequeue_style('gamipress-css');
}

add_action('wp_enqueue_scripts', 'vikinger_dequeue_styles', 20);

/**
 * Add body class filters
 */
function vikinger_body_classes($classes){
  if (is_admin_bar_showing()) {
    $classes[] = 'vikinger-top-space';
  }

  if (!is_user_logged_in()) {
    $classes[] = 'vikinger-logged-out';
  }

  return $classes;
}

add_filter('body_class', 'vikinger_body_classes');

/**
 * Theme Options
 */
function vikinger_admin_page_index_html() {
  $filepath = VIKINGER_PATH . '/views/index.php';
  require_once($filepath);
}

function vikinger_admin_page_plugins_html() {
  $filepath = VIKINGER_PATH . '/views/plugins.php';
  require_once($filepath);
}

function vikinger_admin_page_documentation_html() {
  $filepath = VIKINGER_PATH . '/views/documentation.php';
  require_once($filepath);
}

function vikinger_admin_page_hooks_html() {
  $filepath = VIKINGER_PATH . '/views/hooks.php';
  require_once($filepath);
}

function vikinger_admin_page_faqs_html() {
  $filepath = VIKINGER_PATH . '/views/faqs.php';
  require_once($filepath);
}

function vikinger_admin_page_troubleshooting_html() {
  $filepath = VIKINGER_PATH . '/views/troubleshooting.php';
  require_once($filepath);
}

function vikinger_admin_page_changelog_html() {
  $filepath = VIKINGER_PATH . '/views/changelog.php';
  require_once($filepath);
}

function vikinger_admin_page_support_html() {
  $filepath = VIKINGER_PATH . '/views/support.php';
  require_once($filepath);
}

function vikinger_admin_page_demo_import_html() {
  $filepath = VIKINGER_PATH . '/views/demo-import.php';
  require_once($filepath);
}

function vikinger_admin_page_index() {
  add_menu_page(
    'Vikinger - Index',
    'Vikinger',
    'manage_options',
    'vikinger_index',
    'vikinger_admin_page_index_html',
    VIKINGER_URL . '/img/admin/options-icon.png'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - Index',
    'Getting Started',
    'manage_options',
    'vikinger_index',
    'vikinger_admin_page_index_html'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - General',
    'General',
    'manage_options',
    'vikinger_plugins',
    'vikinger_admin_page_plugins_html'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - Documentation',
    'Documentation',
    'manage_options',
    'vikinger_documentation',
    'vikinger_admin_page_documentation_html'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - Hooks',
    'Hooks',
    'manage_options',
    'vikinger_hooks',
    'vikinger_admin_page_hooks_html'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - FAQs',
    'FAQs',
    'manage_options',
    'vikinger_faqs',
    'vikinger_admin_page_faqs_html'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - Troubleshooting',
    'Troubleshooting',
    'manage_options',
    'vikinger_troubleshooting',
    'vikinger_admin_page_troubleshooting_html'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - Changelog',
    'Changelog',
    'manage_options',
    'vikinger_changelog',
    'vikinger_admin_page_changelog_html'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - Support',
    'Support',
    'manage_options',
    'vikinger_support',
    'vikinger_admin_page_support_html'
  );

  add_submenu_page(
    'vikinger_index',
    'Vikinger - Demo Import',
    'Demo Import',
    'manage_options',
    'vikinger_demo_import',
    'vikinger_admin_page_demo_import_html'
  );
}

add_action('admin_menu', 'vikinger_admin_page_index');

/**
 * Navigation Menus
 */
function vikinger_register_menus() {
  register_nav_menus(
    array(
      'header_menu'           => esc_html_x('Header Menu', '(Backend) Menu Location Name', 'vikinger'),
      'header_features_menu'  => esc_html_x('Header Features Menu', '(Backend) Menu Location Name', 'vikinger'),
      'side_menu'             => esc_html_x('Side Menu', '(Backend) Menu Location Name', 'vikinger'),
      'footer_menu'           => esc_html_x('Footer Menu', '(Backend) Menu Location Name', 'vikinger')
     )
  );
}

add_action('init', 'vikinger_register_menus');

/**
 * Add support for features
 */
function vikinger_support_features() {
  add_theme_support('post-formats', array('video', 'audio', 'gallery'));

  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('automatic-feed-links');

  // Set content width.
  global $content_width;
  
	if (!isset($content_width)) {
		$content_width = 800;
  }

  // add post thumbnails support
  add_theme_support('post-thumbnails');
  
  // Set post thumbnail size.
	set_post_thumbnail_size(584);

  // Add custom image sizes used in post versions cover.
  add_image_size('vikinger-postlist-thumb', 40, 40, true);
  add_image_size('vikinger-postv1-fullscreen', 1980);
  add_image_size('vikinger-postv2-fullscreen', 1184);

  // bbPress images
  add_post_type_support('forum', 'thumbnail');
  add_image_size('vikinger-forum-thumb', 64, 64, true);

  // WooCommerce support
  add_theme_support('woocommerce');
  // WooCommerce gallery support
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'vikinger_support_features');

/**
 * Hide admin bar for non administrators
 */
$admin_bar_status = get_theme_mod('vikinger_adminbar_setting_display', 'display');

if (($admin_bar_status === 'hide') && !current_user_can('administrator')) {
  show_admin_bar(false);
}

/**
 * Functions
 */
require_once VIKINGER_PATH . '/includes/functions/vikinger-functions.php';

/**
 * AJAX
 */
require_once VIKINGER_PATH . '/includes/ajax/vikinger-ajax.php';

/**
 * Sidebars
 */
require_once VIKINGER_PATH . '/includes/sidebars/vikinger-sidebars.php';

/**
 * Customizer
 */
require_once VIKINGER_PATH . '/includes/customizer/vikinger-customizer.php';

/**
 * PHP Autoloader
 */
function vikinger_class_autoloader($class_name) {
  $base_path = VIKINGER_PATH . '/includes/classes';

  // utils classes
  $utils_path = $base_path . '/utils';
  $utils_classes = ['Vikinger_Scheduler', 'Vikinger_Task'];

  foreach ($utils_classes as $utils_class) {
    if ($class_name === $utils_class) {
      require $utils_path . '/' . $class_name . '.php';
    }
  }
}

spl_autoload_register('vikinger_class_autoloader');

/**
 * Allow the use of wp_redirect / wp_safe_redirect after headers are sent (after the get_header() function is called)
 */
function vikinger_allow_redirect_after_header() {
  ob_start();
}

add_action('init', 'vikinger_allow_redirect_after_header');

/**
 * Load translations
 */
function vikinger_translations_load() {
  load_theme_textdomain('vikinger', VIKINGER_PATH . '/languages');
}

add_action('after_setup_theme', 'vikinger_translations_load');

?>