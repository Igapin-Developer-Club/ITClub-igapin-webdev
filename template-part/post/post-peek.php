<?php
/**
 * Vikinger Template Part - Post Peek
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_post_get_loop_data
 * 
 * @param array $args {
 *   @type array $post Post data.
 * }
 */

  $has_post_cover = $args['post']['cover_url_thumb'];
  $post_cover_style = $has_post_cover ? 'background: url(' . esc_url($args['post']['cover_url_thumb']) . ') center center / cover no-repeat' : '';

  $format = $args['post']['format'] ? $args['post']['format'] : 'standard';
  $supportedFormats = ['standard', 'video', 'audio', 'gallery'];
  $supportedFormatsIcons = [
    'standard'  => 'blog-posts',
    'video'     => 'videos',
    'audio'     => 'headphones',
    'gallery'   => 'gallery'
  ];
  $postFormatIcon = in_array($format, $supportedFormats) ? $supportedFormatsIcons[$format] : $supportedFormatsIcons['standard'];

?>

<!-- POST PEEK -->
<div class="post-peek">
<?php if ($has_post_cover) : ?>
  <!-- POST PEEK IMAGE -->
  <a class="post-peek-image" href="<?php echo esc_url($args['post']['link']); ?>">
    <div class="picture small round" style="<?php echo esc_attr($post_cover_style); ?>"></div>
  </a>
  <!-- /POST PEEK IMAGE -->
<?php else : ?>
  <!-- POST FORMAT TAG -->
  <div class="post-format-tag">
  <?php

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => $postFormatIcon,
      'modifiers' => 'post-format-tag-icon'
    ]);

  ?>
  </div>
  <!-- /POST FORMAT TAG -->
<?php endif; ?>

  <!-- POST PEEK TITLE -->
  <p class="post-peek-title"><a href="<?php echo esc_url($args['post']['link']); ?>"><?php echo esc_html($args['post']['title']); ?></a></p>
  <!-- /POST PEEK TITLE -->

  <!-- POST PEEK TEXT -->
  <p class="post-peek-text"><?php echo esc_html($args['post']['date']); ?></p>
  <!-- /POST PEEK TEXT -->
</div>
<!-- /POST PEEK -->