<?php
/**
 * Vikinger Template Part - Post Preview
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

  $has_post_cover = $args['post']['cover_url'];
  $has_post_cover_classes = !$has_post_cover ? 'post-preview-no-cover' : '';
  $post_cover_style = $has_post_cover ? 'background: url(' . esc_url($args['post']['cover_url']) . ') center center / cover no-repeat' : '';

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

<!-- POST PREVIEW -->
<div class="post-preview <?php echo esc_attr($has_post_cover_classes); ?>">
<?php if ($has_post_cover) : ?>
  <!-- POST PREVIEW IMAGE -->
  <a href="<?php echo esc_url($args['post']['link']); ?>">
    <div class="post-preview-image" style="<?php echo esc_attr($post_cover_style); ?>"></div>
  </a>
  <!-- /POST PREVIEW IMAGE -->
<?php endif; ?>
  
  <!-- POST PREVIEW INFO -->
  <div class="post-preview-info fixed-height">
  <?php if (!$has_post_cover) : ?>
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

    <!-- POST PREVIEW INFO TOP -->
    <div class="post-preview-info-top">
      <!-- POST PREVIEW TIMESTAMP -->
      <p class="post-preview-timestamp">
      <?php foreach (array_slice($args['post']['categories'], 0, 3) as $category): ?>
        <a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>"><?php echo esc_html($category->name); ?></a> -
      <?php endforeach; ?>

      <?php echo esc_html($args['post']['date']); ?>
      </p>
      <!-- /POST PREVIEW TIMESTAMP -->

      <!-- POST PREVIEW TITLE -->
      <p class="post-preview-title"><a href="<?php echo esc_url($args['post']['link']); ?>"><?php echo esc_html(vikinger_truncate_text($args['post']['title'], 75)); ?></a></p>
      <!-- /POST PREVIEW TITLE -->
    </div>
    <!-- /POST PREVIEW INFO TOP -->

    <!-- POST PREVIEW INFO BOTTOM -->
    <div class="post-preview-info-bottom">
      <!-- POST PREVIEW TEXT -->
      <p class="post-preview-text"><?php echo esc_html(vikinger_truncate_text($args['post']['excerpt_from_text'], 220)); ?></p>
      <!-- /POST PREVIEW TEXT -->

      <!-- POST PREVIEW LINK -->
      <a class="post-preview-link" href="<?php echo esc_url($args['post']['link']); ?>"><?php esc_html_e('Read more...', 'vikinger'); ?></a>
      <!-- /POST PREVIEW LINK -->
    </div>
    <!-- /POST PREVIEW INFO BOTTOM -->
  </div>
  <!-- /POST PREVIEW INFO -->

  <!-- CONTENT ACTIONS -->
  <div class="content-actions">
    <!-- CONTENT ACTION -->
    <div class="content-action"></div>
    <!-- /CONTENT ACTION -->

    <!-- CONTENT ACTION -->
    <div class="content-action">
      <!-- META LINE -->
      <div class="meta-line">
        <!-- META LINE LINK -->
        <a class="meta-line-link" href="<?php echo esc_url($args['post']['link']); ?>#comment-list">
        <?php

          $comment_count = $args['post']['comment_count'];

          echo esc_html(
            sprintf(
              _nx(
                '%s Comment',
                '%s Comments',
                $comment_count,
                'Comment Count',
                'vikinger'
              ),
              number_format_i18n($comment_count)
            )
          );

        ?>
        </a>
        <!-- /META LINE LINK -->
      </div>
      <!-- /META LINE -->

      <!-- META LINE -->
      <div class="meta-line">
        <!-- META LINE TEXT -->
        <p class="meta-line-text">
        <?php

          $share_count = $args['post']['share_count'];

          echo esc_html(
            sprintf(
              _nx(
                '%s Share',
                '%s Shares',
                $share_count,
                'Share Count',
                'vikinger'
              ),
              number_format_i18n($share_count)
            )
          );

        ?>
        </p>
        <!-- /META LINE TEXT -->
      </div>
      <!-- /META LINE -->
    </div>
    <!-- /CONTENT ACTION -->
  </div>
  <!-- /CONTENT ACTIONS -->
</div>
<!-- /POST PREVIEW -->