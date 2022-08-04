<?php
/**
 * Vikinger Template Part - Navigation Mobile
 * 
 * @package Vikinger
 * @since 1.6.3
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_menu_get_items
 * 
 * @param array $args {
 *   @type array  $menu_items               Menu items data.
 *   @type string $menu_title               Menu title.
 *   @type array  $menu_logo                Menu logo.
 *   @type array  $menu_styles              Menu styles data.
 *   @type array  $menu_trigger_open_icon   Menu open icon data.
 *   @type array  $menu_trigger_close_icon  Menu close icon data.
 * }
 */

  $menu_styles = isset($args['menu_styles']) ? $args['menu_styles'] : [];

  $menu_styles_content = array_key_exists('menu', $menu_styles) ? $menu_styles['menu'] : [];
  $menu_styles_attribute = vikinger_elementor_styles_encode_get($menu_styles_content);

  $menu_title_styles_content = array_key_exists('menu-title', $menu_styles) ? $menu_styles['menu-title'] : [];
  $menu_title_styles_attribute = vikinger_elementor_styles_encode_get($menu_title_styles_content);

  $menu_trigger_open_styles_content = array_key_exists('menu-trigger-open', $menu_styles) ? $menu_styles['menu-trigger-open'] : [];
  $menu_trigger_open_styles_attribute = vikinger_elementor_styles_encode_get($menu_trigger_open_styles_content);

  $menu_trigger_close_styles_content = array_key_exists('menu-trigger-close', $menu_styles) ? $menu_styles['menu-trigger-close'] : [];
  $menu_trigger_close_styles_attribute = vikinger_elementor_styles_encode_get($menu_trigger_close_styles_content);

  $menu_trigger_open_icon = $args['menu_trigger_open_icon'];
  $menu_trigger_close_icon = $args['menu_trigger_close_icon'];

?>

<!-- VK EL NAVIGATION MOBILE TRIGGER OPEN -->
<div class="vk-el-navigation-mobile-trigger-open">
<?php if ($menu_trigger_open_icon['library'] === 'svg') : ?>
  <img class="vk-el-navigation-mobile-trigger-icon" src="<?php echo esc_url($menu_trigger_open_icon['value']['url']); ?>" alt="menu-trigger-icon">
<?php else : ?>
  <i aria-hidden="true" class="<?php echo esc_attr($menu_trigger_open_icon['value'] . ' ' . $menu_trigger_open_icon['library']); ?>" <?php echo $menu_trigger_open_styles_attribute ?>></i>
<?php endif; ?>
</div>
<!-- /VK EL NAVIGATION MOBILE TRIGGER OPEN -->

<!-- VK EL NAVIGATION MOBILE -->
<nav class="vk-el-navigation-mobile vk-el-navigation-mobile-left" <?php echo $menu_styles_attribute ?> data-simplebar>
  <!-- VK EL NAVIGATION MOBILE HEADER -->
  <div class="vk-el-navigation-mobile-header">
  <?php if ($args['menu_logo']['url'] !== '') : ?>
    <!-- VK EL NAVIGATION MOBILE LOGO -->
    <img class="vk-el-navigation-mobile-logo" src="<?php echo esc_url($args['menu_logo']['url']); ?>" alt="logo-image">
    <!-- /VK EL NAVIGATION MOBILE LOGO -->
  <?php endif; ?>

  <?php if ($args['menu_title'] !== '') : ?>
    <!-- VK EL NAVIGATION MOBILE TITLE -->
    <p class="vk-el-navigation-mobile-title" <?php echo $menu_title_styles_attribute ?>><?php echo esc_html($args['menu_title']); ?></p>
    <!-- /VK EL NAVIGATION MOBILE TITLE -->
  <?php endif; ?>

    <!-- VK EL NAVIGATION MOBILE TRIGGER CLOSE -->
    <div class="vk-el-navigation-mobile-trigger-close">
    <?php if ($menu_trigger_close_icon['library'] === 'svg') : ?>
      <img class="vk-el-navigation-mobile-trigger-icon" src="<?php echo esc_url($menu_trigger_close_icon['value']['url']); ?>" alt="menu-trigger-icon">
    <?php else : ?>
      <i aria-hidden="true" class="<?php echo esc_attr($menu_trigger_close_icon['value'] . ' ' . $menu_trigger_close_icon['library']); ?>" <?php echo $menu_trigger_close_styles_attribute ?>></i>
    <?php endif; ?>
    </div>
    <!-- /VK EL NAVIGATION MOBILE TRIGGER CLOSE -->
  </div>
  <!-- /VK EL NAVIGATION MOBILE HEADER -->

<?php

  /**
   * Navigation Mobile Menu
   */
  get_template_part('template-part/elementor/navigation/navigation-mobile', 'menu', [
    'menu_items'  => $args['menu_items'],
    'menu_styles' => $args['menu_styles']
  ]);
  
?>
</nav>
<!-- /VK EL NAVIGATION MOBILE -->