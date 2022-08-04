<?php
/**
 * Vikinger Template Part - Post Sticky
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_post_get_loop_data
 * 
 * @param array $args {
 *   @type array $post            Post data.
 * }
 */

  $hide_excerpt = !$args['post']['has_membership_access'] && vikinger_plugin_pmpro_is_active() && !vikinger_pmpro_excerpts_display_is_enabled();

  $has_post_cover = $args['post']['postv2_cover_url'];
  $has_post_cover_classes = !$has_post_cover ? 'post-preview-no-cover' : '';
  $post_cover_style = $has_post_cover ? 'background: url(' . esc_url($args['post']['postv2_cover_url']) . ') center center / cover no-repeat' : '';

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
<div class="post-preview sticky <?php echo esc_attr($has_post_cover_classes); ?>">
  <!-- TAG STICKER -->
  <div class="tag-sticker">
  <?php

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => 'pinned',
      'modifiers' => 'tag-sticker-icon primary'
    ]);

  ?>
  </div>
  <!-- /TAG STICKER -->
  
<?php if ($has_post_cover) : ?>
  <!-- POST PREVIEW IMAGE -->
  <a href="<?php echo esc_url($args['post']['permalink']); ?>">
    <div class="post-preview-image" style="<?php echo esc_attr($post_cover_style); ?>"></div>
  </a>
  <!-- /POST PREVIEW IMAGE -->

  <!-- POST PREVIEW IMAGE MOBILE -->
  <a class="post-preview-image-mobile-link" href="<?php echo esc_url($args['post']['permalink']); ?>">
    <img class="post-preview-image-mobile" src="<?php echo esc_url($args['post']['postv2_cover_url']); ?>" alt="post-image">
  </a>
  <!-- /POST PREVIEW IMAGE MOBILE -->
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
        <a href="<?php echo esc_url($category['link']); ?>"><?php echo esc_html($category['name']); ?></a> -
      <?php endforeach; ?>

      <?php echo esc_html($args['post']['timestamp']); ?>
      </p>
      <!-- /POST PREVIEW TIMESTAMP -->

      <!-- POST PREVIEW TITLE -->
      <p class="post-preview-title medium"><a href="<?php echo esc_url($args['post']['permalink']); ?>"><?php echo esc_html(vikinger_truncate_text($args['post']['title'], 140)); ?></a></p>
      <!-- /POST PREVIEW TITLE -->
    </div>
    <!-- /POST PREVIEW INFO TOP -->

    <!-- POST PREVIEW INFO BOTTOM -->
    <div class="post-preview-info-bottom">
    <?php if (!$hide_excerpt) : ?>
      <!-- POST PREVIEW TEXT -->
      <p class="post-preview-text"><?php echo esc_html(vikinger_truncate_text($args['post']['excerpt'], 300)); ?></p>
      <!-- /POST PREVIEW TEXT -->
    <?php else : ?>
      <!-- POST PREVIEW TEXT -->
      <p class="post-preview-text">
      <?php esc_html_e('This content is for members only.', 'vikinger'); ?>
        <a href="<?php echo esc_url(vikinger_plugin_pmpro_is_active() ? pmpro_url('levels') : ''); ?>"><?php esc_html_e('Join Now'); ?></a>
      </p>
      <!-- /POST PREVIEW TEXT -->
    <?php endif; ?>

      <!-- POST PREVIEW LINK -->
      <a class="post-preview-link" href="<?php echo esc_url($args['post']['permalink']); ?>"><?php esc_html_e('Read more...', 'vikinger'); ?></a>
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
        <a class="meta-line-link" href="<?php echo esc_url($args['post']['permalink']); ?>#comment-list">
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

    <?php

      // add BuddyPress share count data if plugin is active
      if (vikinger_plugin_buddypress_is_active()) :

    ?>
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
    <?php

      endif;

    ?>
    </div>
    <!-- /CONTENT ACTION -->
  </div>
  <!-- /CONTENT ACTIONS -->
</div>
<!-- /POST PREVIEW -->