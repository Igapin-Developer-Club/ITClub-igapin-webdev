<?php
/**
 * Vikinger Customizer - Utils
 * 
 * @since 1.0.0
 */

/**
 * Returns page header default cover image url
 * 
 * @return string $image_url      Page header default cover image url.
 */
function vikinger_customizer_page_header_cover_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/banner-bg.png';

  return $image_url;
}

/**
 * Returns search page default image url
 * 
 * @return string $image_url      Search page default image url.
 */
function vikinger_customizer_search_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/search-icon.png';

  return $image_url;
}

/**
 * Returns archive page default image url
 * 
 * @return string $image_url      Archive page default image url.
 */
function vikinger_customizer_archive_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/blog-icon.png';

  return $image_url;
}

/**
 * Returns blog page default image url
 * 
 * @return string $image_url      Blog page default image url.
 */
function vikinger_customizer_blog_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/blog-icon.png';

  return $image_url;
}

/**
 * Returns forum page default image url
 * 
 * @return string $image_url      Forum page default image url.
 */
function vikinger_customizer_forum_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/forums-icon.png';

  return $image_url;
}

/**
 * Returns WooCommerce page default image url
 * 
 * @return string $image_url      WooCommerce page default image url.
 */
function vikinger_customizer_woocommerce_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/shop-icon.png';

  return $image_url;
}

/**
 * Returns Paid Memberships Pro page default image url
 * 
 * @return string $image_url      Paid Memberships Pro page default image url.
 */
function vikinger_customizer_pmpro_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/memberships-icon.png';

  return $image_url;
}

/**
 * Returns group page default image url
 * 
 * @return string $image_url      Group page default image url.
 */
function vikinger_customizer_group_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/groups-icon.png';

  return $image_url;
}

/**
 * Returns member page default image url
 * 
 * @return string $image_url      Member page default image url.
 */
function vikinger_customizer_member_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/members-icon.png';

  return $image_url;
}

/**
 * Returns badge page default image url
 * 
 * @return string $image_url      Badge page default image url.
 */
function vikinger_customizer_badge_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/badges-icon.png';

  return $image_url;
}

/**
 * Returns quest page default image url
 * 
 * @return string $image_url      Quest page default image url.
 */
function vikinger_customizer_quest_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/quests-icon.png';

  return $image_url;
}

/**
 * Returns point page default image url
 * 
 * @return string $image_url      Point page default image url.
 */
function vikinger_customizer_point_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/credits-icon.png';

  return $image_url;
}

/**
 * Returns rank page default image url
 * 
 * @return string $image_url      Rank page default image url.
 */
function vikinger_customizer_rank_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/ranks-icon.png';

  return $image_url;
}

/**
 * Returns settings page default image url
 * 
 * @return string $image_url      Settings page default image url.
 */
function vikinger_customizer_settings_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/settings-icon.png';

  return $image_url;
}

/**
 * Returns activity page default image url
 * 
 * @return string $image_url      Activity page default image url.
 */
function vikinger_customizer_activity_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/banner/newsfeed-icon.png';

  return $image_url;
}

/**
 * Returns 404 page default image url
 * 
 * @return string $image_url      404 page default image url.
 */
function vikinger_customizer_404_page_image_get_default() {
  $image_url = VIKINGER_URL . '/img/error/404.png';

  return $image_url;
}

/**
 * Sanitizes bool value
 * 
 * @param bool $value     A value that should be a bool.
 * @return bool
 */
function vikinger_customizer_sanitize_bool($value) {
  return (bool) $value;
}

/**
 * Sanitizes array value
 * 
 * @param array $value     A value that should be an array.
 * @return array
 */
function vikinger_customizer_sanitize_array($value) {
  return is_array($value) ? $value : [];
}

/**
 * Sanitizes upload maximum size allowed
 * 
 * @return int
 */
function vikinger_customizer_sanitize_upload_maximum_size($value) {
  $upload_maximum_size = absint($value);
  $server_upload_maximum_size = vikinger_upload_max_size_get();

  return min($upload_maximum_size, $server_upload_maximum_size);
}

/**
 * Sanitizes text with comma separated values
 * 
 * @return int
 */
function vikinger_customizer_sanitize_text_comma_separated($value) {
  // remove whitespaces
  $value = preg_replace('/\s+/', '', $value);
  // remove extra commas at start or end
  $value = preg_replace('/^,|,$/', '', $value);

  return $value;
}

/**
 * Sanitizes footer bottom text
 * 
 * @param string $text              Footer bottom text.
 * @return string $sanitized_text   Footer bottom sanitized text.
 */
function vikinger_customizer_sanitize_text($text) {
  $allowed_html = [
    'a'     => [
      'href'    => [],
      'target'  => []
    ],
    'br'    => [],
    'span'  => [
      'class' => []
    ]
  ];

  return wp_kses($text, $allowed_html);
}

/**
 * Returns RGB color from Hex
 * 
 * @param string  $hex_color        Hexadecimal color.
 * @return string $rgb_color        RGB color.
 */
function vikinger_customizer_color_hex_to_rgb($hex_color) {
  $rgb_color = [];

  $i = 1;

  while ($i < strlen($hex_color)) {
    $rgb_color[] = hexdec(substr($hex_color, $i, 2));
    $i += 2;
  }

  $rgb_color = implode(',', $rgb_color);

  return $rgb_color;
}

/**
 * Returns RGBA color from Hex and Opacity
 * 
 * @param string  $hex_color        Hexadecimal color.
 * @param string  $opacity          Opacity (0-1).
 * @return string $rgba_color       RGBA color.
 */
function vikinger_customizer_color_hex_to_rgba($hex_color, $opacity) {
  $rgb_color = [];

  $i = 1;

  while ($i < strlen($hex_color)) {
    $rgb_color[] = hexdec(substr($hex_color, $i, 2));
    $i += 2;
  }

  $rgb_color = implode(',', $rgb_color);

  return 'rgba(' . $rgb_color . ', ' . $opacity . ');';
}

/**
 * Returns preset default color values
 * 
 * @param string  $preset_name              Name of the preset.
 * @return array  $preset_default_colors    Preset default colors.
 */
function vikinger_customizer_color_preset_default_colors_get($preset_name) {
  switch ($preset_name) {
    case 'custom':
      $preset_default_colors = [
        /**
         * Login Register Colors
         */
        '--color-wplogin-body'        => '#fff',
        '--color-wplogin-header-text' => '#fff',

        /**
         * Header Colors
         */
        '--color-header-background'                       => '#615dfa',
        '--color-header-logo-background'                  => '#00c7d9',
        '--color-header-text'                             => '#fff',
        '--color-header-icon'                             => '#8b88ff',
        '--color-header-icon-hover'                       => '#fff',
        '--color-header-profile-settings-icon'            => '#fff',
        '--color-header-mobilemenu-trigger-icon'          => '#fff',
        '--color-header-divider'                          => '#7a77fd',
        '--color-header-input-background'                 => '#4e4ac8',
        '--color-header-input-placeholder'                => '#8b88ff',
        '--color-header-progressbar-line-gradient-start'  => '#41efff',
        '--color-header-progressbar-line-gradient-end'    => '#41efff',
        '--color-header-progressbar-underline'            => '#4a46c8',
    
        /**
         * Body Colors
         */
        '--color-body'  => '#f8f8fb',
    
        /**
         * Box Colors
         */
        '--color-box-background'                => '#fff',
        '--color-box-background-alt'            => '#fcfcfd',
        '--color-box-over-box-background'       => '#fff',
        '--color-box-over-box-light-background' => '#fff',
    
        /**
         * Box Highlight Colors
         */
        '--color-box-highlight-background'  => '#f7f7fb',
        '--color-box-hover-background'      => '#f2f2f9',
    
        /**
         * Box Shadow Colors
         */
        '--color-box-shadow'          => '#5e5c9a',
        '--color-overbox-shadow'      => '#5e5c9a',
        '--color-overbox-dark-shadow' => '#5e5c9a',
        '--color-overbox-big-shadow'  => '#5e5c9a',
    
        /**
         * Text Colors
         */
        '--color-text'        => '#3e3f5e',
        '--color-text-alt'    => '#8f91ac',
        '--color-text-alt-2'  => '#adafca',
    
        /**
         * Icon Colors
         */
        '--color-icon'              => '#adafca',
        '--color-icon-highlighted'  => '#3e3f5e',
    
        /**
         * Border Colors
         */
        '--color-border'  => '#dedeea',
        '--color-divider' => '#eaeaf5',
    
        /**
         * Progress Bar Colors
         */
        '--color-progressbar-line-gradient-start' => '#615dfa',
        '--color-progressbar-line-gradient-end'   => '#41efff',
        '--color-progressbar-underline'           => '#e7e8ee',
    
        /**
         * Avatar Rank Hexagon Colors
         */
        '--color-avatar-rank-hexagon'  => '#45437f',
    
        /**
         * Primary Colors
         */
        '--color-primary'         => '#23d2e2',
        '--color-primary-hover'   => '#1bc5d4',
        '--color-primary-light'   => '#41efff',
        '--color-primary-dark'    => '#00c7d9',
        '--color-primary-shadow'  => '#23d2e2',
    
        /**
         * Secondary Colors
         */
        '--color-secondary'         => '#615dfa',
        '--color-secondary-hover'   => '#5753e4',
        '--color-secondary-dark'    => '#45437f',
        '--color-secondary-shadow'  => '#615dfa',
    
        /**
         * Tertiary Colors
         */
        '--color-tertiary'         => '#fd4350',
        '--color-tertiary-hover'   => '#dd343f',
        '--color-tertiary-shadow'  => '#fd4350',
    
    
        /**
         * Loading Screen Colors
         */
        '--color-loading-screen-background' => '#3e3f5e',

        /**
         * Loading Bar Colors
         */
        '--color-loading-bar-1'  => '#615dfa',
        '--color-loading-bar-2'  => '#5d71fb',
        '--color-loading-bar-3'  => '#5983fb',
        '--color-loading-bar-4'  => '#549afc',
        '--color-loading-bar-5'  => '#4eb2fd',
        '--color-loading-bar-6'  => '#49c9fe',
        '--color-loading-bar-7'  => '#45ddfe',
        '--color-loading-bar-8'  => '#41efff',

        /**
         * Overlay Colors
         */
        '--color-overlay' => '#15151f'
      ];
      break;
    case 'dark':
      $preset_default_colors = [
        /**
         * Login Register Colors
         */
        '--color-wplogin-body'        => '#1d2333',
        '--color-wplogin-header-text' => '#fff',
        
        /**
         * Header Colors
         */
        '--color-header-background'                       => '#7750f8',
        '--color-header-logo-background'                  => '#40d04f',
        '--color-header-text'                             => '#fff',
        '--color-header-icon'                             => '#9b7dff',
        '--color-header-icon-hover'                       => '#fff',
        '--color-header-profile-settings-icon'            => '#fff',
        '--color-header-mobilemenu-trigger-icon'          => '#fff',
        '--color-header-divider'                          => '#9b7dff',
        '--color-header-input-background'                 => '#5538b5',
        '--color-header-input-placeholder'                => '#9b7dff',
        '--color-header-progressbar-line-gradient-start'  => '#40d04f',
        '--color-header-progressbar-line-gradient-end'    => '#d9ff65',
        '--color-header-progressbar-underline'            => '#5538b5',
    
        /**
         * Body Colors
         */
        '--color-body'  => '#161b28',
    
        /**
         * Box Colors
         */
        '--color-box-background'                => '#1d2333',
        '--color-box-background-alt'            => '#21283b',
        '--color-box-over-box-background'       => '#21283b',
        '--color-box-over-box-light-background' => '#293249',
    
        /**
         * Box Highlight Colors
         */
        '--color-box-highlight-background'  => '#21283b',
        '--color-box-hover-background'      => '#293249',
    
        /**
         * Box Shadow Colors
         */
        '--color-box-shadow'          => '#000000',
        '--color-overbox-shadow'      => '#000000',
        '--color-overbox-dark-shadow' => '#000000',
        '--color-overbox-big-shadow'  => '#000000',
    
        /**
         * Text Colors
         */
        '--color-text'        => '#ffffff',
        '--color-text-alt'    => '#9aa4bf',
        '--color-text-alt-2'  => '#9aa4bf',
    
        /**
         * Icon Colors
         */
        '--color-icon'              => '#616a82',
        '--color-icon-highlighted'  => '#ffffff',
    
        /**
         * Border Colors
         */
        '--color-border'  => '#3f485f',
        '--color-divider' => '#2f3749',
    
        /**
         * Progress Bar Colors
         */
        '--color-progressbar-line-gradient-start' => '#40d04f',
        '--color-progressbar-line-gradient-end'   => '#d9ff65',
        '--color-progressbar-underline'           => '#293249',
    
        /**
         * Avatar Rank Hexagon Colors
         */
        '--color-avatar-rank-hexagon'  => '#7750f8',
    
        /**
         * Primary Colors
         */
        '--color-primary'         => '#40d04f',
        '--color-primary-hover'   => '#4ae95b',
        '--color-primary-light'   => '#40d04f',
        '--color-primary-dark'    => '#4ff461',
        '--color-primary-shadow'  => '#40d04f',
    
        /**
         * Secondary Colors
         */
        '--color-secondary'         => '#7750f8',
        '--color-secondary-hover'   => '#9668ff',
        '--color-secondary-dark'    => '#7750f8',
        '--color-secondary-shadow'  => '#7750f8',
    
        /**
         * Tertiary Colors
         */
        '--color-tertiary'         => '#fd4350',
        '--color-tertiary-hover'   => '#dd343f',
        '--color-tertiary-shadow'  => '#fd4350',
    
    
        /**
         * Loading Screen Colors
         */
        '--color-loading-screen-background' => '#1d2333',

        /**
         * Loading Bar Colors
         */
        '--color-loading-bar-1'  => '#41d04f',
        '--color-loading-bar-2'  => '#50d551',
        '--color-loading-bar-3'  => '#67dc55',
        '--color-loading-bar-4'  => '#7de358',
        '--color-loading-bar-5'  => '#99eb5c',
        '--color-loading-bar-6'  => '#b1f35f',
        '--color-loading-bar-7'  => '#c7f962',
        '--color-loading-bar-8'  => '#d6fe65',

        /**
         * Overlay Colors
         */
        '--color-overlay' => '#15151f'
      ];
      break;
    case 'darkblue':
      $preset_default_colors = [
        /**
         * Login Register Colors
         */
        '--color-wplogin-body'        => '#131c3c',
        '--color-wplogin-header-text' => '#fff',

        /**
         * Header Colors
         */
        '--color-header-background'                       => '#192655',
        '--color-header-logo-background'                  => '#0053ff',
        '--color-header-text'                             => '#fff',
        '--color-header-icon'                             => '#4f6098',
        '--color-header-icon-hover'                       => '#fff',
        '--color-header-profile-settings-icon'            => '#fff',
        '--color-header-mobilemenu-trigger-icon'          => '#fff',
        '--color-header-divider'                          => '#314282',
        '--color-header-input-background'                 => '#131c3c',
        '--color-header-input-placeholder'                => '#4f6098',
        '--color-header-progressbar-line-gradient-start'  => '#0053ff',
        '--color-header-progressbar-line-gradient-end'    => '#00ff97',
        '--color-header-progressbar-underline'            => '#243776',
    
        /**
         * Body Colors
         */
        '--color-body'  => '#131c3c',
    
        /**
         * Box Colors
         */
        '--color-box-background'                => '#192655',
        '--color-box-background-alt'            => '#17234f',
        '--color-box-over-box-background'       => '#192655',
        '--color-box-over-box-light-background' => '#1c2a5d',
    
        /**
         * Box Highlight Colors
         */
        '--color-box-highlight-background'  => '#1c2a5d',
        '--color-box-hover-background'      => '#203067',
    
        /**
         * Box Shadow Colors
         */
        '--color-box-shadow'          => '#000000',
        '--color-overbox-shadow'      => '#000000',
        '--color-overbox-dark-shadow' => '#000000',
        '--color-overbox-big-shadow'  => '#000000',
    
        /**
         * Text Colors
         */
        '--color-text'        => '#fff',
        '--color-text-alt'    => '#8797c9',
        '--color-text-alt-2'  => '#8797c9',
    
        /**
         * Icon Colors
         */
        '--color-icon'              => '#4f6098',
        '--color-icon-highlighted'  => '#00ff97',
    
        /**
         * Border Colors
         */
        '--color-border'  => '#314282',
        '--color-divider' => '#314282',
    
        /**
         * Progress Bar Colors
         */
        '--color-progressbar-line-gradient-start' => '#0053ff',
        '--color-progressbar-line-gradient-end'   => '#00ff97',
        '--color-progressbar-underline'           => '#243776',
    
        /**
         * Avatar Rank Hexagon Colors
         */
        '--color-avatar-rank-hexagon'  => '#0053ff',
    
        /**
         * Primary Colors
         */
        '--color-primary'         => '#0053ff',
        '--color-primary-hover'   => '#1069fd',
        '--color-primary-light'   => '#00ff97',
        '--color-primary-dark'    => '#00ff97',
        '--color-primary-shadow'  => '#0053ff',
    
        /**
         * Secondary Colors
         */
        '--color-secondary'         => '#02d27c',
        '--color-secondary-hover'   => '#14e48e',
        '--color-secondary-dark'    => '#0053ff',
        '--color-secondary-shadow'  => '#02d27c',
    
        /**
         * Tertiary Colors
         */
        '--color-tertiary'         => '#fd4350',
        '--color-tertiary-hover'   => '#dd343f',
        '--color-tertiary-shadow'  => '#fd4350',
    
    
        /**
         * Loading Screen Colors
         */
        '--color-loading-screen-background' => '#192655',

        /**
         * Loading Bar Colors
         */
        '--color-loading-bar-1'  => '#0056fd',
        '--color-loading-bar-2'  => '#0065f4',
        '--color-loading-bar-3'  => '#007ce6',
        '--color-loading-bar-4'  => '#0097d6',
        '--color-loading-bar-5'  => '#00b4c5',
        '--color-loading-bar-6'  => '#00cfb4',
        '--color-loading-bar-7'  => '#00eaa4',
        '--color-loading-bar-8'  => '#00fa9a',

        /**
         * Overlay Colors
         */
        '--color-overlay' => '#15151f'
      ];
      break;
    case 'darkpurple':
      $preset_default_colors = [
        /**
         * Login Register Colors
         */
        '--color-wplogin-body'        => '#2c1d58',
        '--color-wplogin-header-text' => '#fff',

        /**
         * Header Colors
         */
        '--color-header-background'                       => '#2c1d58',
        '--color-header-logo-background'                  => '#f33059',
        '--color-header-text'                             => '#fff',
        '--color-header-icon'                             => '#4f3e80',
        '--color-header-icon-hover'                       => '#fff',
        '--color-header-profile-settings-icon'            => '#fff',
        '--color-header-mobilemenu-trigger-icon'          => '#fff',
        '--color-header-divider'                          => '#463283',
        '--color-header-input-background'                 => '#221746',
        '--color-header-input-placeholder'                => '#8a7fc4',
        '--color-header-progressbar-line-gradient-start'  => '#f33059',
        '--color-header-progressbar-line-gradient-end'    => '#943dff',
        '--color-header-progressbar-underline'            => '#403076',
    
        /**
         * Body Colors
         */
        '--color-body'  => '#221746',
    
        /**
         * Box Colors
         */
        '--color-box-background'                => '#2c1d58',
        '--color-box-background-alt'            => '#281a51',
        '--color-box-over-box-background'       => '#332363',
        '--color-box-over-box-light-background' => '#332363',
    
        /**
         * Box Highlight Colors
         */
        '--color-box-highlight-background'  => '#332363',
        '--color-box-hover-background'      => '#3b296e',
    
        /**
         * Box Shadow Colors
         */
        '--color-box-shadow'          => '#000000',
        '--color-overbox-shadow'      => '#000000',
        '--color-overbox-dark-shadow' => '#000000',
        '--color-overbox-big-shadow'  => '#000000',
    
        /**
         * Text Colors
         */
        '--color-text'        => '#fff',
        '--color-text-alt'    => '#9388cc',
        '--color-text-alt-2'  => '#9388cc',
    
        /**
         * Icon Colors
         */
        '--color-icon'              => '#8370bb',
        '--color-icon-highlighted'  => '#f33059',
    
        /**
         * Border Colors
         */
        '--color-border'  => '#4d378e',
        '--color-divider' => '#4d378e',
    
        /**
         * Progress Bar Colors
         */
        '--color-progressbar-line-gradient-start' => '#f33059',
        '--color-progressbar-line-gradient-end'   => '#943dff',
        '--color-progressbar-underline'           => '#403076',
    
        /**
         * Avatar Rank Hexagon Colors
         */
        '--color-avatar-rank-hexagon'  => '#f33059 ',
    
        /**
         * Primary Colors
         */
        '--color-primary'         => '#f33059',
        '--color-primary-hover'   => '#ff426a',
        '--color-primary-light'   => '#ff335e',
        '--color-primary-dark'    => '#ff335e',
        '--color-primary-shadow'  => '#f33059',
    
        /**
         * Secondary Colors
         */
        '--color-secondary'         => '#943dff',
        '--color-secondary-hover'   => '#a156fe',
        '--color-secondary-dark'    => '#943dff',
        '--color-secondary-shadow'  => '#943dff',
    
        /**
         * Tertiary Colors
         */
        '--color-tertiary'         => '#ff911b',
        '--color-tertiary-hover'   => '#ff9e35',
        '--color-tertiary-shadow'  => '#ff911b',
    
    
        /**
         * Loading Screen Colors
         */
        '--color-loading-screen-background' => '#2c1d58',

        /**
         * Loading Bar Colors
         */
        '--color-loading-bar-1'  => '#fd426d',
        '--color-loading-bar-2'  => '#f4447c',
        '--color-loading-bar-3'  => '#e74790',
        '--color-loading-bar-4'  => '#d84aa8',
        '--color-loading-bar-5'  => '#ca4dbd',
        '--color-loading-bar-6'  => '#b951d8',
        '--color-loading-bar-7'  => '#ac54ec',
        '--color-loading-bar-8'  => '#a356fb',

        /**
         * Overlay Colors
         */
        '--color-overlay' => '#15151f'
      ];
      break;
    case 'darkcyan':
      $preset_default_colors = [
        /**
         * Login Register Colors
         */
        '--color-wplogin-body'        => '#20293a',
        '--color-wplogin-header-text' => '#fff',

        /**
         * Header Colors
         */
        '--color-header-background'                       => '#20293a',
        '--color-header-logo-background'                  => '#00d5aa',
        '--color-header-text'                             => '#fff',
        '--color-header-icon'                             => '#424d62',
        '--color-header-icon-hover'                       => '#fff',
        '--color-header-profile-settings-icon'            => '#fff',
        '--color-header-mobilemenu-trigger-icon'          => '#fff',
        '--color-header-divider'                          => '#313f55',
        '--color-header-input-background'                 => '#171e2b',
        '--color-header-input-placeholder'                => '#8c99b1',
        '--color-header-progressbar-line-gradient-start'  => '#00d5aa',
        '--color-header-progressbar-line-gradient-end'    => '#41d9ff',
        '--color-header-progressbar-underline'            => '#314054',
    
        /**
         * Body Colors
         */
        '--color-body'  => '#171e2b',
    
        /**
         * Box Colors
         */
        '--color-box-background'                => '#20293a',
        '--color-box-background-alt'            => '#1c2433',
        '--color-box-over-box-background'       => '#242f42',
        '--color-box-over-box-light-background' => '#242f42',
    
        /**
         * Box Highlight Colors
         */
        '--color-box-highlight-background'  => '#242f42',
        '--color-box-hover-background'      => '#242f42',
    
        /**
         * Box Shadow Colors
         */
        '--color-box-shadow'          => '#000000',
        '--color-overbox-shadow'      => '#000000',
        '--color-overbox-dark-shadow' => '#000000',
        '--color-overbox-big-shadow'  => '#000000',
    
        /**
         * Text Colors
         */
        '--color-text'        => '#fff',
        '--color-text-alt'    => '#8c99b1',
        '--color-text-alt-2'  => '#8c99b1',
    
        /**
         * Icon Colors
         */
        '--color-icon'              => '#58657d',
        '--color-icon-highlighted'  => '#00fecb',
    
        /**
         * Border Colors
         */
        '--color-border'  => '#35445c',
        '--color-divider' => '#35445c',
    
        /**
         * Progress Bar Colors
         */
        '--color-progressbar-line-gradient-start' => '#00d5aa',
        '--color-progressbar-line-gradient-end'   => '#41d9ff',
        '--color-progressbar-underline'           => '#314054',
    
        /**
         * Avatar Rank Hexagon Colors
         */
        '--color-avatar-rank-hexagon'  => '#1d8676 ',
    
        /**
         * Primary Colors
         */
        '--color-primary'         => '#00d5aa',
        '--color-primary-hover'   => '#0aecbe',
        '--color-primary-light'   => '#00ffcb',
        '--color-primary-dark'    => '#00ffcb',
        '--color-primary-shadow'  => '#00d5aa',
    
        /**
         * Secondary Colors
         */
        '--color-secondary'         => '#19c7f2',
        '--color-secondary-hover'   => '#41d9ff',
        '--color-secondary-dark'    => '#19c7f2',
        '--color-secondary-shadow'  => '#19c7f2',
    
        /**
         * Tertiary Colors
         */
        '--color-tertiary'         => '#fd4350',
        '--color-tertiary-hover'   => '#dd343f',
        '--color-tertiary-shadow'  => '#fd4350',
    
    
        /**
         * Loading Screen Colors
         */
        '--color-loading-screen-background' => '#20293a',

        /**
         * Loading Bar Colors
         */
        '--color-loading-bar-1'  => '#01d4ab',
        '--color-loading-bar-2'  => '#09d6b6',
        '--color-loading-bar-3'  => '#10d6be',
        '--color-loading-bar-4'  => '#1bd7cd',
        '--color-loading-bar-5'  => '#25d7da',
        '--color-loading-bar-6'  => '#30d8e9',
        '--color-loading-bar-7'  => '#39d9f5',
        '--color-loading-bar-8'  => '#40d9fd',

        /**
         * Overlay Colors
         */
        '--color-overlay' => '#15151f'
      ];
      break;
    case 'carbonyellow':
      $preset_default_colors = [
        /**
         * Login Register Colors
         */
        '--color-wplogin-body'        => '#202431',
        '--color-wplogin-header-text' => '#fff',

        /**
         * Header Colors
         */
        '--color-header-background'                       => '#202431',
        '--color-header-logo-background'                  => '#ffba00',
        '--color-header-text'                             => '#fff',
        '--color-header-icon'                             => '#515669',
        '--color-header-icon-hover'                       => '#fff',
        '--color-header-profile-settings-icon'            => '#fff',
        '--color-header-mobilemenu-trigger-icon'          => '#fff',
        '--color-header-divider'                          => '#383c4f',
        '--color-header-input-background'                 => '#171925',
        '--color-header-input-placeholder'                => '#4b4f61',
        '--color-header-progressbar-line-gradient-start'  => '#ffba00',
        '--color-header-progressbar-line-gradient-end'    => '#fcff00',
        '--color-header-progressbar-underline'            => '#2f344a',
    
        /**
         * Body Colors
         */
        '--color-body'  => '#171925',
    
        /**
         * Box Colors
         */
        '--color-box-background'                => '#202431',
        '--color-box-background-alt'            => '#1c1f2c',
        '--color-box-over-box-background'       => '#242737',
        '--color-box-over-box-light-background' => '#242737',
    
        /**
         * Box Highlight Colors
         */
        '--color-box-highlight-background'  => '#242737',
        '--color-box-hover-background'      => '#282c3d',
    
        /**
         * Box Shadow Colors
         */
        '--color-box-shadow'          => '#000000',
        '--color-overbox-shadow'      => '#000000',
        '--color-overbox-dark-shadow' => '#000000',
        '--color-overbox-big-shadow'  => '#000000',
    
        /**
         * Text Colors
         */
        '--color-text'        => '#fff',
        '--color-text-alt'    => '#8c91a9',
        '--color-text-alt-2'  => '#8c91a9',
    
        /**
         * Icon Colors
         */
        '--color-icon'              => '#72778f',
        '--color-icon-highlighted'  => '#ffe400',
    
        /**
         * Border Colors
         */
        '--color-border'  => '#383c4f',
        '--color-divider' => '#383c4f',
    
        /**
         * Progress Bar Colors
         */
        '--color-progressbar-line-gradient-start' => '#ffba00',
        '--color-progressbar-line-gradient-end'   => '#fcff00',
        '--color-progressbar-underline'           => '#2f344a',
    
        /**
         * Avatar Rank Hexagon Colors
         */
        '--color-avatar-rank-hexagon'  => '#5c6280',
    
        /**
         * Primary Colors
         */
        '--color-primary'         => '#ffba00',
        '--color-primary-hover'   => '#ffcf3e',
        '--color-primary-light'   => '#ffe400',
        '--color-primary-dark'    => '#ffe400',
        '--color-primary-shadow'  => '#ffba00 ',
    
        /**
         * Secondary Colors
         */
        '--color-secondary'         => '#5c6280',
        '--color-secondary-hover'   => '#6d738f',
        '--color-secondary-dark'    => '#5c6280',
        '--color-secondary-shadow'  => '#5c6280',
    
        /**
         * Tertiary Colors
         */
        '--color-tertiary'         => '#fd4350',
        '--color-tertiary-hover'   => '#dd343f',
        '--color-tertiary-shadow'  => '#fd4350',
    
    
        /**
         * Loading Screen Colors
         */
        '--color-loading-screen-background' => '#202331 ',

        /**
         * Loading Bar Colors
         */
        '--color-loading-bar-1'  => '#ffba00',
        '--color-loading-bar-2'  => '#ffc200',
        '--color-loading-bar-3'  => '#fecd00',
        '--color-loading-bar-4'  => '#fed700',
        '--color-loading-bar-5'  => '#fde200',
        '--color-loading-bar-6'  => '#fded00',
        '--color-loading-bar-7'  => '#fcf600',
        '--color-loading-bar-8'  => '#fcfe00',

        /**
         * Overlay Colors
         */
        '--color-overlay' => '#15151f'
      ];
      break;
    case 'light':
    default:
      $preset_default_colors = [
        /**
         * Login Register Colors
         */
        '--color-wplogin-body'        => '#fff',
        '--color-wplogin-header-text' => '#fff',
        
        /**
         * Header Colors
         */
        '--color-header-background'                       => '#615dfa',
        '--color-header-logo-background'                  => '#00c7d9',
        '--color-header-text'                             => '#fff',
        '--color-header-icon'                             => '#8b88ff',
        '--color-header-icon-hover'                       => '#fff',
        '--color-header-profile-settings-icon'            => '#fff',
        '--color-header-mobilemenu-trigger-icon'          => '#fff',
        '--color-header-divider'                          => '#7a77fd',
        '--color-header-input-background'                 => '#4e4ac8',
        '--color-header-input-placeholder'                => '#8b88ff',
        '--color-header-progressbar-line-gradient-start'  => '#41efff',
        '--color-header-progressbar-line-gradient-end'    => '#41efff',
        '--color-header-progressbar-underline'            => '#4a46c8',
    
        /**
         * Body Colors
         */
        '--color-body'  => '#f8f8fb',
    
        /**
         * Box Colors
         */
        '--color-box-background'                => '#fff',
        '--color-box-background-alt'            => '#fcfcfd',
        '--color-box-over-box-background'       => '#fff',
        '--color-box-over-box-light-background' => '#fff',
    
        /**
         * Box Highlight Colors
         */
        '--color-box-highlight-background'  => '#f7f7fb',
        '--color-box-hover-background'      => '#f2f2f9',
    
        /**
         * Box Shadow Colors
         */
        '--color-box-shadow'          => '#5e5c9a',
        '--color-overbox-shadow'      => '#5e5c9a',
        '--color-overbox-dark-shadow' => '#5e5c9a',
        '--color-overbox-big-shadow'  => '#5e5c9a',
    
        /**
         * Text Colors
         */
        '--color-text'        => '#3e3f5e',
        '--color-text-alt'    => '#8f91ac',
        '--color-text-alt-2'  => '#adafca',
    
        /**
         * Icon Colors
         */
        '--color-icon'              => '#adafca',
        '--color-icon-highlighted'  => '#3e3f5e',
    
        /**
         * Border Colors
         */
        '--color-border'  => '#dedeea',
        '--color-divider' => '#eaeaf5',
    
        /**
         * Progress Bar Colors
         */
        '--color-progressbar-line-gradient-start' => '#615dfa',
        '--color-progressbar-line-gradient-end'   => '#41efff',
        '--color-progressbar-underline'           => '#e7e8ee',
    
        /**
         * Avatar Rank Hexagon Colors
         */
        '--color-avatar-rank-hexagon'  => '#45437f',
    
        /**
         * Primary Colors
         */
        '--color-primary'         => '#23d2e2',
        '--color-primary-hover'   => '#1bc5d4',
        '--color-primary-light'   => '#41efff',
        '--color-primary-dark'    => '#00c7d9',
        '--color-primary-shadow'  => '#23d2e2',
    
        /**
         * Secondary Colors
         */
        '--color-secondary'         => '#615dfa',
        '--color-secondary-hover'   => '#5753e4',
        '--color-secondary-dark'    => '#45437f',
        '--color-secondary-shadow'  => '#615dfa',
    
        /**
         * Tertiary Colors
         */
        '--color-tertiary'         => '#fd4350',
        '--color-tertiary-hover'   => '#dd343f',
        '--color-tertiary-shadow'  => '#fd4350',
    
    
        /**
         * Loading Screen Colors
         */
        '--color-loading-screen-background' => '#3e3f5e',

        /**
         * Loading Bar Colors
         */
        '--color-loading-bar-1'  => '#615dfa',
        '--color-loading-bar-2'  => '#5d71fb',
        '--color-loading-bar-3'  => '#5983fb',
        '--color-loading-bar-4'  => '#549afc',
        '--color-loading-bar-5'  => '#4eb2fd',
        '--color-loading-bar-6'  => '#49c9fe',
        '--color-loading-bar-7'  => '#45ddfe',
        '--color-loading-bar-8'  => '#41efff',

        /**
         * Overlay Colors
         */
        '--color-overlay' => '#15151f'
      ];
  }

  return $preset_default_colors;
}

/**
 * Returns preset setting name
 * 
 * @param string  $preset_name              Name of the preset.
 * @return string $preset_setting_name      Name of the preset setting.
 */
function vikinger_customizer_color_preset_setting_name_get($preset_name) {
  switch ($preset_name) {
    case 'custom':
      $preset_setting_name = 'vikinger_colors';
      break;
    case 'dark':
      $preset_setting_name = 'vikinger_colors_dark';
      break;
    case 'darkblue':
      $preset_setting_name = 'vikinger_colors_darkblue';
      break;
    case 'darkpurple':
      $preset_setting_name = 'vikinger_colors_darkpurple';
      break;
    case 'darkcyan':
      $preset_setting_name = 'vikinger_colors_darkcyan';
      break;
    case 'carbonyellow':
      $preset_setting_name = 'vikinger_colors_carbonyellow';
      break;
    case 'light':
    default:
      $preset_setting_name = 'vikinger_colors_light';
  }

  return $preset_setting_name;
}

/**
 * Get current user selected color preset
 * 
 * @return $preset_name   User selected color preset
 */
function vikinger_customizer_color_preset_get() {
  // if color theme switch is active, get user color theme
  if (vikinger_customizer_color_theme_switch_is_active()) {
    $user_color_theme = vikinger_logged_user_color_theme_get();
    $preset_name = get_theme_mod('vikinger_color_presets_setting_theme_switch_' . $user_color_theme, $user_color_theme);
  } else {
    $preset_name = get_theme_mod('vikinger_color_presets_setting_name', 'custom');
  }

  return $preset_name;
}

/**
 * Check if the color theme switch is active
 * 
 * @return bool $active   True if active, false otherwise
 */
function vikinger_customizer_color_theme_switch_is_active() {
  $color_theme_switch_status = get_theme_mod('vikinger_color_presets_setting_theme_switch_status', 'disabled');

  $active = $color_theme_switch_status === 'enabled';

  return $active;
}

/**
 * Returns shadow style based on shadow type
 * 
 * @param string  $shadow_type        Shadow type.
 * @return string $shadow_style       Shadow style.
 */
function vikinger_customizer_color_shadow_get($shadow_type, $color) {
  $shadow_style = '';

  $shadow_color = vikinger_customizer_color_hex_to_rgb($color);

  switch ($shadow_type) {
    case 'button':
      $shadow_style .= '4px 7px 12px 0 rgba(' . $shadow_color . ', .2)';
      break;
    case 'box':
      $shadow_style .= '0 0 40px 0 rgba(' . $shadow_color . ', .06)';
      break;
    case 'overbox':
      $shadow_style .= '3px 5px 20px 0 rgba(' . $shadow_color . ', .12)';
      break;
    case 'overbox-dark':
      $shadow_style .= '0 0 40px 0 rgba(' . $shadow_color . ', .12)';
      break;
    case 'overbox-big':
      $shadow_style .= '3px 5px 40px 0 rgba(' . $shadow_color . ', .1)';
      break;
    default:
      
  }

  return $shadow_style;
}

/**
 * Returns default theme colors
 * 
 * @param string $preset_name       Preset name to get colors of. Optional.
 * @return array $theme_colors      Theme default colors.
 */
function vikinger_customizer_theme_colors_get_default($preset_name = false) {
  if ($preset_name) {
    $current_preset = $preset_name;
  } else {
    $current_preset = vikinger_customizer_color_preset_get();
  }

  $current_preset_setting_name = vikinger_customizer_color_preset_setting_name_get($current_preset);
  $current_preset_default_colors = vikinger_customizer_color_preset_default_colors_get($current_preset);

  $theme_colors = [
    /**
     * Login Register Colors
     */
    '--color-wplogin-body'                    => [
      'type'        => 'color',
      'label'       => esc_html_x('Login Register Body - Background', '(Customizer) Color Options - Login Register Body Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects the login, register and activation pages body background color.', '(Customizer) Color Options - Login Register Body Background - Description', 'vikinger')
    ],
    '--color-wplogin-header-text'             => [
      'type'        => 'color',
      'label'       => esc_html_x('Login Register Header Text - Color', '(Customizer) Color Options - Login Register Header Text Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the login, register and activation pages header text color.', '(Customizer) Color Options - Login Register Header Text Color - Description', 'vikinger')
    ],

    /**
     * Header Colors
     */
    '--color-header-background'               => [
      'type'        => 'color',
      'label'       => esc_html_x('Header - Background', '(Customizer) Color Options - Header Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header background color.', '(Customizer) Color Options - Header Background - Description', 'vikinger')
    ],
    '--color-header-logo-background'          => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Logo - Background', '(Customizer) Color Options - Header Logo Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header logo background color. Used when setting to display only the logo on the header in the Site Identity options.', '(Customizer) Color Options - Header Logo Background - Description', 'vikinger')
    ],
    '--color-header-text'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Text - Color', '(Customizer) Color Options - Header Text Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the color of the header site title, menu text and submenu arrows.', '(Customizer) Color Options - Header Text Color - Description', 'vikinger')
    ],
    '--color-header-icon'                     => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Icon - Color', '(Customizer) Color Options - Header Icon Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header icons color.', '(Customizer) Color Options - Header Icon Color - Description', 'vikinger')
    ],
    '--color-header-icon-hover'               => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Icon - Hover Color', '(Customizer) Color Options - Header Icon Hover Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header icons hover color.', '(Customizer) Color Options - Header Icon Hover Color - Description', 'vikinger')
    ],
    '--color-header-profile-settings-icon'    => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Profile Settings Icon - Color', '(Customizer) Color Options - Header Profile Settings Icon Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header profile settings icon color.', '(Customizer) Color Options - Header Profile Settings Icon Color - Description', 'vikinger')
    ],
    '--color-header-mobilemenu-trigger-icon'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Mobile Menu Trigger Icon - Color', '(Customizer) Color Options - Header Mobile Menu Trigger Icon Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header mobile menu trigger icon color.', '(Customizer) Color Options - Header Mobile Menu Trigger Icon Color - Description', 'vikinger')
    ],
    '--color-header-divider'                  => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Divider - Color', '(Customizer) Color Options - Header Divider Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header dividers color.', '(Customizer) Color Options - Header Divider Color - Description', 'vikinger')
    ],
    '--color-header-input-background'         => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Input - Background', '(Customizer) Color Options - Header Input Background Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header search input background color.', '(Customizer) Color Options - Header Input Background Color - Description', 'vikinger')
    ],
    '--color-header-input-placeholder'        => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Input - Placeholder', '(Customizer) Color Options - Header Input Placeholder Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header search input placeholder color.', '(Customizer) Color Options - Header Input Placeholder Color - Description', 'vikinger')
    ],
    '--color-header-progressbar-line-gradient-start'       => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Progress Bar Line Gradient - Start Color', '(Customizer) Color Options - Header Progress Bar Line Gradient Start Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header rank progress bar line gradient start color.', '(Customizer) Color Options - Header Progress Bar Line Gradient Start Color - Description', 'vikinger')
    ],
    '--color-header-progressbar-line-gradient-end'       => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Progress Bar Line Gradient - End Color', '(Customizer) Color Options - Header Progress Bar Line Gradient End Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header rank progress bar line gradient end color.', '(Customizer) Color Options - Header Progress Bar Line Gradient End Color - Description', 'vikinger')
    ],
    '--color-header-progressbar-underline'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Header Progress Bar Underline - Color', '(Customizer) Color Options - Header Progress Bar Underline Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects the header rank progress bar underline color.', '(Customizer) Color Options - Header Progress Bar Underline Color - Description', 'vikinger')
    ],

    /**
     * Body Colors
     */
    '--color-body'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Body', '(Customizer) Color Options - Body - Title', 'vikinger'),
      'description' => esc_html_x('Affects the body background color.', '(Customizer) Color Options - Body - Description', 'vikinger')
    ],

    /**
     * Box Colors
     */
    '--color-box-background'          => [
      'type'        => 'color',
      'label'       => esc_html_x('Box Layer 1 - Background', '(Customizer) Color Options - Box Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects layer 1 boxes background color.', '(Customizer) Color Options - Box Background - Description', 'vikinger')
    ],
    '--color-box-background-alt'      => [
      'type'        => 'color',
      'label'       => esc_html_x('Box Layer 1 - Background Dark', '(Customizer) Color Options - Box Background Dark - Title', 'vikinger'),
      'description' => esc_html_x('Affects layer 1 boxes dark background color.', '(Customizer) Color Options - Box Background Dark - Description', 'vikinger')
    ],
    '--color-box-over-box-background' => [
      'type'        => 'color',
      'label'       => esc_html_x('Box Layer 2 - Background', '(Customizer) Color Options - Box Over Box Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects layer 2 boxes background color.', '(Customizer) Color Options - Box Over Box Background - Description', 'vikinger')
    ],
    '--color-box-over-box-light-background' => [
      'type'        => 'color',
      'label'       => esc_html_x('Box Layer 2 - Background Light', '(Customizer) Color Options - Box Over Box Background Light - Title', 'vikinger'),
      'description' => esc_html_x('Affects layer 2 boxes light background color.', '(Customizer) Color Options - Box Over Box Background Light - Description', 'vikinger')
    ],

    /**
     * Box Highlight Colors
     */
    '--color-box-highlight-background' => [
      'type'        => 'color',
      'label'       => esc_html_x('Box Highlight - Background', '(Customizer) Color Options - Box Highlight Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects box highlight background color of items, e.g. unread notifications.', '(Customizer) Color Options - Box Highlight Background - Description', 'vikinger')
    ],
    '--color-box-hover-background' => [
      'type'        => 'color',
      'label'       => esc_html_x('Box Hover - Background', '(Customizer) Color Options - Box Hover Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects box hover background color of items, e.g. when hovering over a notification.', '(Customizer) Color Options - Box Hover Background - Description', 'vikinger')
    ],

    /**
     * Box Shadow Colors
     */
    '--color-box-shadow'  => [
      'type'        => 'shadow',
      'shadow_type' => 'box',
      'label'       => esc_html_x('Box - Shadow', '(Customizer) Color Options - Box Shadow - Title', 'vikinger'),
      'description' => esc_html_x('Affects shadow color of the border of boxes, like post updates and sidebar widget boxes.', '(Customizer) Color Options - Box Shadow - Description', 'vikinger')
    ],
    '--color-overbox-shadow'  => [
      'type'        => 'shadow',
      'shadow_type' => 'overbox',
      'label'       => esc_html_x('Over Box - Shadow', '(Customizer) Color Options - Over Box Shadow - Title', 'vikinger'),
      'description' => esc_html_x('Affects shadow color of elements that are over boxes, like favorite tags, credit earning tags, slider controls and post options.', '(Customizer) Color Options - Over Box Shadow - Description', 'vikinger')
    ],
    '--color-overbox-dark-shadow'  => [
      'type'        => 'shadow',
      'shadow_type' => 'overbox-dark',
      'label'       => esc_html_x('Over Box Dark - Shadow', '(Customizer) Color Options - Over Box Dark Shadow - Title', 'vikinger'),
      'description' => esc_html_x('Affects shadow color of elements that are over boxes, like dropdowns, but need a darker shadow.', '(Customizer) Color Options - Over Box Dark Shadow - Description', 'vikinger')
    ],
    '--color-overbox-big-shadow'  => [
      'type'        => 'shadow',
      'shadow_type' => 'overbox-big',
      'label'       => esc_html_x('Over Box Big - Shadow', '(Customizer) Color Options - Over Box Big Shadow - Title', 'vikinger'),
      'description' => esc_html_x('Affects shadow color of big elements that are over boxes, like post preview information box and dropdowns.', '(Customizer) Color Options - Over Box Big Shadow - Description', 'vikinger')
    ],

    /**
     * Text Colors
     */
    '--color-text' => [
      'type'        => 'color',
      'label'       => esc_html_x('Text - Primary', '(Customizer) Color Options - Text Primary - Title', 'vikinger'),
      'description' => esc_html_x('Affects text primary color.', '(Customizer) Color Options - Text Primary - Description', 'vikinger')
    ],
    '--color-text-alt' => [
      'type'        => 'color',
      'label'       => esc_html_x('Text - Secondary', '(Customizer) Color Options - Text Secondary - Title', 'vikinger'),
      'description' => esc_html_x('Affects text secondary color.', '(Customizer) Color Options - Text Secondary - Description', 'vikinger')
    ],
    '--color-text-alt-2' => [
      'type'        => 'color',
      'label'       => esc_html_x('Text - Tertiary', '(Customizer) Color Options - Text Tertiary - Title', 'vikinger'),
      'description' => esc_html_x('Affects text tertiary color.', '(Customizer) Color Options - Text Tertiary - Description', 'vikinger')
    ],

    /**
     * Icon Colors
     */
    '--color-icon' => [
      'type'        => 'color',
      'label'       => esc_html_x('Icon', '(Customizer) Color Options - Icon - Title', 'vikinger'),
      'description' => esc_html_x('Affects icon color.', '(Customizer) Color Options - Icon - Description', 'vikinger')
    ],
    '--color-icon-highlighted' => [
      'type'        => 'color',
      'label'       => esc_html_x('Icon - Highlighted', '(Customizer) Color Options - Icon - Title', 'vikinger'),
      'description' => esc_html_x('Affects icon color when highlighted or hovering.', '(Customizer) Color Options - Icon Highlighted - Description', 'vikinger')
    ],

    /**
     * Border Colors
     */
    '--color-border' => [
      'type'        => 'color',
      'label'       => esc_html_x('Border', '(Customizer) Color Options - Border - Title', 'vikinger'),
      'description' => esc_html_x('Affects border color.', '(Customizer) Color Options - Border - Description', 'vikinger')
    ],
    '--color-divider' => [
      'type'        => 'color',
      'label'       => esc_html_x('Divider and Details', '(Customizer) Color Options - Divider - Title', 'vikinger'),
      'description' => esc_html_x('Affects divider and details (like the background of requirement checkboxes) color.', '(Customizer) Color Options - Divider - Description', 'vikinger')
    ],

    /**
     * Progress Bar Colors
     */
    '--color-progressbar-line-gradient-start'       => [
      'type'        => 'color',
      'label'       => esc_html_x('Progress Bar Line Gradient - Start Color', '(Customizer) Color Options - Progress Bar Line Gradient Start Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects global (excluding header) progress bar line gradient start color.', '(Customizer) Color Options - Progress Bar Line Gradient Start Color - Description', 'vikinger')
    ],
    '--color-progressbar-line-gradient-end'       => [
      'type'        => 'color',
      'label'       => esc_html_x('Progress Bar Line Gradient - End Color', '(Customizer) Color Options - Progress Bar Line Gradient End Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects global (excluding header) progress bar line gradient end color.', '(Customizer) Color Options - Progress Bar Line Gradient End Color - Description', 'vikinger')
    ],
    '--color-progressbar-underline'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Progress Bar Underline - Color', '(Customizer) Color Options - Progress Bar Underline Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects global (excluding header) progress bar underline color.', '(Customizer) Color Options - Progress Bar Underline Color - Description', 'vikinger')
    ],

    /**
     * Avatar Rank Hexagon Colors
     */
    '--color-avatar-rank-hexagon'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Avatar Rank Hexagon - Color', '(Customizer) Color Options - Avatar Rank Hexagon Color - Title', 'vikinger'),
      'description' => esc_html_x('Affects avatar rank hexagon color.', '(Customizer) Color Options - Avatar Rank Hexagon Color - Description', 'vikinger')
    ],

    /**
     * Primary Colors
     */
    '--color-primary'         => [
      'type'        => 'color',
      'label'       => esc_html_x('Primary', '(Customizer) Color Options - Primary - Title', 'vikinger'),
      'description' => esc_html_x('Affects primary button background, box underlines, hover text, selection text and background of elements with text or icons inside of them.', '(Customizer) Color Options - Primary - Description', 'vikinger')
    ],
    '--color-primary-hover'   => [
      'type'        => 'color',
      'label'       => esc_html_x('Primary - Hover', '(Customizer) Color Options - Primary Hover - Title', 'vikinger'),
      'description' => esc_html_x('Affects primary button hover background color.', '(Customizer) Color Options - Primary Hover - Description', 'vikinger')
    ],
    '--color-primary-light'   => [
      'type'      => 'color',
      'label'     => esc_html_x('Primary - Light', '(Customizer) Color Options - Primary Light - Title', 'vikinger'),
      'description' => esc_html_x('Affects text and icon colors over dark backgrounds.', '(Customizer) Color Options - Primary Light - Description', 'vikinger')
    ],
    '--color-primary-dark'    => [
      'type'      => 'color',
      'label'     => esc_html_x('Primary - Dark', '(Customizer) Color Options - Primary Dark - Title', 'vikinger'),
      'description' => esc_html_x('Affects highlighted text over light backgrounds.', '(Customizer) Color Options - Primary Dark - Description', 'vikinger')
    ],
    '--color-primary-shadow'  => [
      'type'        => 'shadow',
      'shadow_type' => 'button',
      'label'       => esc_html_x('Primary - Shadow', '(Customizer) Color Options - Primary Shadow - Title', 'vikinger'),
      'description' => esc_html_x('Affects primary button shadow color.', '(Customizer) Color Options - Primary Shadow - Description', 'vikinger')
    ],

    /**
     * Secondary Colors
     */
    '--color-secondary'         => [
      'type'        => 'color',
      'label'       => esc_html_x('Secondary', '(Customizer) Color Options - Secondary - Title', 'vikinger'),
      'description' => esc_html_x('Affects secondary button background, input focus border color, and background of elements with text or icons inside of them.', '(Customizer) Color Options - Secondary - Description', 'vikinger')
    ],
    '--color-secondary-hover'   => [
      'type'        => 'color',
      'label'       => esc_html_x('Secondary - Hover', '(Customizer) Color Options - Secondary Hover - Title', 'vikinger'),
      'description' => esc_html_x('Affects secondary button hover background color.', '(Customizer) Color Options - Secondary Hover - Description', 'vikinger')
    ],
    '--color-secondary-dark'   => [
      'type'        => 'color',
      'label'       => esc_html_x('Secondary - Dark', '(Customizer) Color Options - Secondary Dark - Title', 'vikinger'),
      'description' => esc_html_x('Affects popup close button background color.', '(Customizer) Color Options - Secondary Dark - Description', 'vikinger')
    ],
    '--color-secondary-shadow'  => [
      'type'        => 'shadow',
      'shadow_type' => 'button',
      'label'       => esc_html_x('Secondary - Shadow', '(Customizer) Color Options - Secondary Shadow - Title', 'vikinger'),
      'description' => esc_html_x('Affects secondary button shadow color.', '(Customizer) Color Options - Secondary Shadow - Description', 'vikinger')
    ],

    /**
     * Tertiary Colors
     */
    '--color-tertiary'         => [
      'type'        => 'color',
      'label'       => esc_html_x('Tertiary', '(Customizer) Color Options - Tertiary - Title', 'vikinger'),
      'description' => esc_html_x('Affects tertiary button background and background of elements with text or icons inside of them. Used for buttons and elements that have negative effects (delete, remove friend, demote group member, etc).', '(Customizer) Color Options - Tertiary - Description', 'vikinger')
    ],
    '--color-tertiary-hover'   => [
      'type'        => 'color',
      'label'       => esc_html_x('Tertiary - Hover', '(Customizer) Color Options - Tertiary Hover - Title', 'vikinger'),
      'description' => esc_html_x('Affects tertiary button hover background color.', '(Customizer) Color Options - Tertiary Hover - Description', 'vikinger')
    ],
    '--color-tertiary-shadow'  => [
      'type'        => 'shadow',
      'shadow_type' => 'button',
      'label'       => esc_html_x('Tertiary - Shadow', '(Customizer) Color Options - Tertiary Shadow - Title', 'vikinger'),
      'description' => esc_html_x('Affects tertiary button shadow color.', '(Customizer) Color Options - Tertiary Shadow - Description', 'vikinger')
    ],


    /**
     * Loading Screen Colors
     */
    '--color-loading-screen-background'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Screen - Background', '(Customizer) Color Options - Loading Screen Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects the loading screen background color.', '(Customizer) Color Options - Loading Screen Background - Description', 'vikinger')
    ],

    /**
     * Loading Bar Colors
     */
    '--color-loading-bar-1'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Bar - 1', '(Customizer) Color Options - Loading Bar 1 - Title', 'vikinger'),
      'description' => esc_html_x('The loading bar is made of 8 bars with cascading colors. This setting affects the first loading bar color.', '(Customizer) Color Options - Loading Bar 1 - Description', 'vikinger')
    ],
    '--color-loading-bar-2'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Bar - 2', '(Customizer) Color Options - Loading Bar 2 - Title', 'vikinger'),
      'description' => esc_html_x('Affects the second loading bar color.', '(Customizer) Color Options - Loading Bar 2 - Description', 'vikinger')
    ],
    '--color-loading-bar-3'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Bar - 3', '(Customizer) Color Options - Loading Bar 3 - Title', 'vikinger'),
      'description' => esc_html_x('Affects the third loading bar color.', '(Customizer) Color Options - Loading Bar 3 - Description', 'vikinger')
    ],
    '--color-loading-bar-4'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Bar - 4', '(Customizer) Color Options - Loading Bar 4 - Title', 'vikinger'),
      'description' => esc_html_x('Affects the fourth loading bar color.', '(Customizer) Color Options - Loading Bar 4 - Description', 'vikinger')
    ],
    '--color-loading-bar-5'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Bar - 5', '(Customizer) Color Options - Loading Bar 5 - Title', 'vikinger'),
      'description' => esc_html_x('Affects the fifth loading bar color.', '(Customizer) Color Options - Loading Bar 5 - Description', 'vikinger')
    ],
    '--color-loading-bar-6'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Bar - 6', '(Customizer) Color Options - Loading Bar 6 - Title', 'vikinger'),
      'description' => esc_html_x('Affects the sixth loading bar color.', '(Customizer) Color Options - Loading Bar 6 - Description', 'vikinger')
    ],
    '--color-loading-bar-7'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Bar - 7', '(Customizer) Color Options - Loading Bar 7 - Title', 'vikinger'),
      'description' => esc_html_x('Affects the seventh loading bar color.', '(Customizer) Color Options - Loading Bar 7 - Description', 'vikinger')
    ],
    '--color-loading-bar-8'  => [
      'type'        => 'color',
      'label'       => esc_html_x('Loading Bar - 8', '(Customizer) Color Options - Loading Bar 8 - Title', 'vikinger'),
      'description' => esc_html_x('Affects the eighth loading bar color.', '(Customizer) Color Options - Loading Bar 8 - Description', 'vikinger')
    ],

    /**
     * Overlay Colors
     */
    '--color-overlay'  => [
      'type'        => 'color_rgba',
      'opacity'     => '.96',
      'label'       => esc_html_x('Overlay - Background', '(Customizer) Color Options - Overlay Background - Title', 'vikinger'),
      'description' => esc_html_x('Affects overlay background color (overlay that displays when opening the mobile sidemenu, popups, etc).', '(Customizer) Color Options - Overlay Background - Description', 'vikinger')
    ],
  ];

  // add settings and default color data
  foreach ($theme_colors as $theme_color_name => $theme_color_data) {
    $theme_colors[$theme_color_name]['settings']  = $current_preset_setting_name . '[' . $theme_color_name . ']';
    $theme_colors[$theme_color_name]['default']   = $current_preset_default_colors[$theme_color_name];
  }

  return $theme_colors;
}

/**
 * Returns user custom theme colors style
 * 
 * @return string $custom_colors      User custom theme colors.
 */
function vikinger_customizer_theme_colors_get() {
  $default_colors = vikinger_customizer_theme_colors_get_default();

  $current_preset = vikinger_customizer_color_preset_get();
  $current_preset_setting_name = vikinger_customizer_color_preset_setting_name_get($current_preset);
  
  $user_custom_colors = get_option($current_preset_setting_name, []);

  // add defaults
  foreach ($default_colors as $key => $value) {
    // if user hasn't entered a color for this, use default color
    if (!array_key_exists($key, $user_custom_colors)) {
      if ($value['type'] === 'shadow') {
        $user_custom_colors[$key] = vikinger_customizer_color_shadow_get($value['shadow_type'], $value['default']);
      } else if ($value['type'] === 'color_rgba') {
        $user_custom_colors[$key] = vikinger_customizer_color_hex_to_rgba($value['default'], $value['opacity']);
      } else {
        $user_custom_colors[$key] = $value['default'];
      }
    } else {
    // if this color was customized by the user, convert it to a shadow
      if ($value['type'] === 'shadow') {
        $user_custom_colors[$key] = vikinger_customizer_color_shadow_get($value['shadow_type'], $user_custom_colors[$key]);
      } else if ($value['type'] === 'color_rgba') {
        $user_custom_colors[$key] = vikinger_customizer_color_hex_to_rgba($user_custom_colors[$key], $value['opacity']);
      }
    }
  }

  $custom_colors = ':root { ';

  foreach ($user_custom_colors as $key => $value) {
    $custom_colors .= $key . ': ' . $value . ';';
  }

  // add static colors
  $custom_colors .= '--color-notice-overlay-background-primary: rgba(' . vikinger_customizer_color_hex_to_rgb($user_custom_colors['--color-primary']) . ', .14);';
  $custom_colors .= '--color-notice-overlay-background-secondary: rgba(' . vikinger_customizer_color_hex_to_rgb($user_custom_colors['--color-secondary']) . ', .14);';
  $custom_colors .= '--color-notice-overlay-background-tertiary: rgba(' . vikinger_customizer_color_hex_to_rgb($user_custom_colors['--color-tertiary']) . ', .14);';

  $custom_colors .= '--color-avatar-overlay-background: rgba(' . vikinger_customizer_color_hex_to_rgb($user_custom_colors['--color-secondary']) . ', .9);';

  $custom_colors .= '--footer-navigation-display-mobile: ' . get_theme_mod('vikinger_footer_setting_navigation_mobile_status', 'none') . ';';

  $custom_colors .= ' }';

  return $custom_colors;
}

/**
 * Returns user custom theme colors
 * 
 * @return array $user_custom_colors      User custom theme colors.
 */
function vikinger_customizer_theme_colors_get_array() {
  $default_colors = vikinger_customizer_theme_colors_get_default();
  
  $current_preset = vikinger_customizer_color_preset_get();
  $current_preset_setting_name = vikinger_customizer_color_preset_setting_name_get($current_preset);
  
  $user_custom_colors = get_option($current_preset_setting_name, []);

  // add defaults
  foreach ($default_colors as $key => $value) {
    // if user hasn't entered a color for this, use default color
    if (!array_key_exists($key, $user_custom_colors)) {
      if ($value['type'] === 'shadow') {
        $user_custom_colors[$key] = vikinger_customizer_color_shadow_get($value['shadow_type'], $value['default']);
      } else {
        $user_custom_colors[$key] = $value['default'];
      }
    } else {
    // if this color was customized by the user, convert it to a shadow
      if ($value['type'] === 'shadow') {
        $user_custom_colors[$key] = vikinger_customizer_color_shadow_get($value['shadow_type'], $user_custom_colors[$key]);
      }
    }
  }

  return $user_custom_colors;
}

/**
 * Returns filtered google fonts
 */
function vikinger_gfonts_get($args = []) {
  $defaults = [
    'sort'  => 'alpha'
  ];

  $args = array_merge($defaults, $args);

  $gfonts = [];

  $gfonts_api_key = get_theme_mod('vikinger_font_setting_api_key', '');

  $result = wp_remote_get('https://www.googleapis.com/webfonts/v1/webfonts?key=' . $gfonts_api_key, $args);

  if (is_wp_error($result)) {
    return [];
  }

  if ($result['response']['code'] === 200) {
    $gfonts = json_decode($result['body'])->items;
  }

  return $gfonts;
}

/**
 * Returns available fonts to use
 */
function vikinger_customizer_theme_fonts_available_get() {
  $fonts = [];

  $gfonts = vikinger_gfonts_get();

  foreach ($gfonts as $gfont) {
    $fonts[$gfont->family] = $gfont;
  }

  return $fonts;
}

/**
 * Returns fonts as customizer select input options
 */
function vikinger_customizer_theme_font_options_get() {
  $font_options = [];

  $fonts = vikinger_customizer_theme_fonts_available_get();

  foreach ($fonts as $font => $font_data) {
    $font_options[$font] = $font;
  }

  return $font_options;
}

/**
 * Get user custom fonts
 */
function vikinger_customizer_theme_fonts_custom_get() {
  $fonts = [
    'primary'   => get_theme_mod('vikinger_font_setting_primary', 'Rajdhani'),
    'secondary' => get_theme_mod('vikinger_font_setting_secondary', 'Titillium Web')
  ];

  return $fonts;
}

/**
 * Returns user custom fonts for enqueue
 * 
 * @return array $fonts      User custom fonts.
 */
function vikinger_customizer_theme_fonts_get_for_enqueue() {
  $fonts = vikinger_customizer_theme_fonts_custom_get();

  foreach ($fonts as $font => $font_data) {
    $font = implode('+', explode(' ', $font));
  }

  return $fonts;
}

/**
 * Returns user custom fonts style
 * 
 * @return string $custom_colors      User custom theme colors.
 */
function vikinger_customizer_theme_fonts_get_style() {
  $fonts = vikinger_customizer_theme_fonts_custom_get();

  $font_style = '
    :root {
      --font-primary: ' . $fonts['primary'] . ', sans-serif;
      --font-secondary: ' . $fonts['secondary'] . ', sans-serif;
    }
  ';

  return $font_style;
}

?>