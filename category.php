<?php
/**
 * Vikinger Template - Category
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  get_header();

  $category = get_queried_object();

?>

<!-- CONTENT GRID -->
<div class="content-grid">
<?php

  $page_header_status = get_theme_mod('vikinger_pageheader_setting_display', 'display');

  if ($page_header_status === 'display') {
    $blog_header_icon_id      = get_theme_mod('vikinger_pageheader_blog_setting_image', false);
    $blog_header_title        = get_theme_mod('vikinger_pageheader_blog_setting_title', esc_html_x('Blog Posts', 'Blog Page - Title', 'vikinger'));
    $blog_header_description  = get_theme_mod('vikinger_pageheader_blog_setting_description', esc_html_x('Read about news, announcements and more!', 'Blog Page - Description', 'vikinger'));

    if ($blog_header_icon_id) {
      $blog_header_icon_url = wp_get_attachment_image_src($blog_header_icon_id , 'full')[0];
    } else {
      $blog_header_icon_url = vikinger_customizer_blog_page_image_get_default();
    }

    /**
     * Section Banner
     */
    get_template_part('template-part/section/section', 'banner', [
      'section_icon_url'    => $blog_header_icon_url,
      'section_title'       => $blog_header_title,
      'section_description' => $blog_header_description
    ]);
  }

  /**
   * Section Header
   */
  get_template_part('template-part/section/section', 'header', [
    'section_pretitle'  => esc_html__('Search Results', 'vikinger'),
    'section_title'     => esc_html__('Category', 'vikinger') . ':',
    'section_text'      => $category->cat_name
  ]);

  /**
   * Post Filterable List
   */
  get_template_part('template-part/post/post-filterable-list', null, [
    'attributes'        => [
      'category'  => $category->cat_ID
    ],
    'allow_post_types'  => true,
    'post_types'        => vikinger_blog_post_types_to_display_in_blog_get()
  ]);

?>
</div>
<!-- /CONTENT GRID -->

<?php get_footer(); ?>