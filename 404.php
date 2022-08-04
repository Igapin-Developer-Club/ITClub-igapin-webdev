<?php
/**
 * Vikinger Template - 404
 * 
 * The template for displaying 404 pages (Not Found)
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  get_header();

  $error_image_id     = get_theme_mod('vikinger_404_setting_image', false);
  $error_title        = get_theme_mod('vikinger_404_setting_title', esc_html__('OOPS!!...Wrong Turn!!', 'vikinger'));
  $error_description  = get_theme_mod('vikinger_404_setting_description', sprintf(esc_html__('Seems that you encountered a web black hole that absorbed the page you were looking for! But don\'t panic because you can go back!%sIf the problem persists, please send us an email to our support team at %ssupport@vikinger.com%s', 'vikinger'), '<br><br>', '<a href="mailto:support@vikinger.com">', '</a>'));
  $error_button_text  = get_theme_mod('vikinger_404_setting_button_text', esc_html__('Go Back', 'vikinger'));

  if ($error_image_id) {
    $error_image_url = wp_get_attachment_image_src($error_image_id , 'full')[0];
  } else {
    $error_image_url = vikinger_customizer_404_page_image_get_default();
  }

?>

<!-- CONTENT GRID -->
<div class="content-grid">
  <!-- ERROR SECTION -->
  <div class="error-section">
    <!-- ERROR SECTION IMAGE -->
    <img class="error-section-image" src="<?php echo esc_url($error_image_url); ?>" alt="404-image">
    <!-- /ERROR SECTION IMAGE -->

    <!-- ERROR SECTION TITLE -->
    <p class="error-section-title"><?php esc_html_e('404', 'vikinger'); ?></p>
    <!-- /ERROR SECTION TITLE -->

    <!-- ERROR SECTION SUBTITLE -->
    <p class="error-section-subtitle"><?php echo esc_html($error_title); ?></p>
    <!-- /ERROR SECTION SUBTITLE -->

    <!-- ERROR SECTION DESCRIPTION -->
    <p class="error-section-description"><?php echo wp_kses($error_description, ['a' => ['href' => [], 'target' => []], 'br'  => []]); ?></p>
    <!-- /ERROR SECTION DESCRIPTION -->

    <a href="<?php echo esc_url(home_url('/activity')); ?>" class="error-section-button button medium primary"><?php echo esc_html($error_button_text); ?></a>
  </div>
  <!-- /ERROR SECTION -->
</div>
<!-- /CONTENT GRID -->

<?php get_footer(); ?>