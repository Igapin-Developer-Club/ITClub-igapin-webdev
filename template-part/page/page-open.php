<?php
/**
 * Vikinger Template Part - Page Open
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_page_get_loop_data
 * 
 * @param array $args {
 *   @type array $post Post data.
 * }
 */

?>

<!-- CONTENT GRID -->
<div class="content-grid">
  <!-- PAGE OPEN -->
  <article class="page-open">
    <!-- PAGE OPEN TITLE -->
    <h2 class="page-open-title"><?php echo wp_kses($args['post']['title'], vikinger_wp_kses_post_title_get_allowed_tags()); ?></h2>
    <!-- /PAGE OPEN TITLE -->

    <?php if ($args['post']['cover_url']) : ?>
    <!-- PAGE OPEN COVER -->
    <div class="page-open-cover" style="<?php echo esc_attr('background: url(' . esc_url($args['post']['cover_url']) . ') center center / cover no-repeat'); ?>"></div>
    <!-- /PAGE OPEN COVER -->
    <?php endif; ?>

    <!-- PAGE OPEN BODY -->
    <div class="page-open-content">
    <?php

      the_content();

      wp_link_pages();

    ?>
    </div>
    <!-- /PAGE OPEN CONTENT -->

    <?php if ($args['post']['allow_comments']) : ?>
    <!-- PAGE OPEN COMMENTS -->
    <div class="page-open-comments">
      <!-- COMMENT LIST -->
      <div id="comment-list" data-postid="<?php echo esc_attr($args['post']['id']); ?>" data-posttype="page"></div>
      <!-- /COMMENT LIST -->
    </div>
    <!-- /PAGE OPEN COMMENTS -->
    <?php endif; ?>
  </article>
  <!-- /PAGE OPEN -->
</div>
<!-- /CONTENT GRID -->