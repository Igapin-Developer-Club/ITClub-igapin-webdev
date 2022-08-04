<?php
/**
 * Functions - bbPress - Filters
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_bbpress_filter_topic_revision_log')) {
  /**
   * Filter topic revision log
   * 
   * @param string  $content      Topic revision log HTML content.
   * @param int     $topic_id     Topic ID.
   */
  function vikinger_bbpress_filter_topic_revision_log($content, $topic_id) {
    $revision_log = bbp_get_topic_raw_revision_log( $topic_id );

    if ( empty( $topic_id ) || empty( $revision_log ) || ! is_array( $revision_log ) ) {
      return false;
    }

    $revisions = bbp_get_topic_revisions( $topic_id );
    if ( empty( $revisions ) ) {
      return false;
    }

    $retval = "\n\n" . '<ul id="bbp-topic-revision-log-' . esc_attr( $topic_id ) . '" class="bbp-topic-revision-log">' . "\n\n";

    // Loop through revisions
    foreach ( (array) $revisions as $revision ) {

      if ( empty( $revision_log[ $revision->ID ] ) ) {
        $author_id = $revision->post_author;
        $reason    = '';
      } else {
        $author_id = $revision_log[ $revision->ID ]['author'];
        $reason    = $revision_log[ $revision->ID ]['reason'];
      }

      $since  = bbp_get_time_since( bbp_convert_date( $revision->post_modified ) );

      $author = vikinger_bbpress_topic_author_get($revision->ID);

      ob_start();

      /**
       * Avatar Micro
       */
      get_template_part('template-part/avatar/avatar', 'micro', [
        'user'      => $author,
        'linked'    => true,
        'no_border' => true,
        'modifiers' => 'vikinger-forum-reply-revision-author-avatar'
      ]);

      ?>
        <!-- VIKINGER FORUM REPLY REVISION AUTHOR TITLE -->
        <a href="<?php echo esc_url($author['link']); ?>" class="vikinger-forum-reply-revision-author-title"><?php echo esc_html($author['name']); ?></a>
        <!-- /VIKINGER FORUM REPLY REVISION AUTHOR TITLE -->
      <?php

      $author_html = ob_get_clean();

      $retval .= "\t" . '<li id="bbp-topic-revision-log-' . esc_attr( $topic_id ) . '-item-' . esc_attr( $revision->ID ) . '" class="bbp-topic-revision-log-item">' . "\n";
      if ( ! empty( $reason ) ) {
        $retval .= "\t\t" . sprintf( esc_html__( 'This topic was modified %1$s by %2$s. Reason: %3$s', 'vikinger'), esc_html( $since ), $author_html, esc_html( $reason ) ) . "\n";
      } else {
        $retval .= "\t\t" . sprintf( esc_html__( 'This topic was modified %1$s by %2$s.', 'vikinger'), esc_html( $since ), $author_html ) . "\n";
      }
      $retval .= "\t" . '</li>' . "\n";
    }

    $retval .= "\n" . '</ul>' . "\n\n";

    return $retval;
  }
}

add_filter('bbp_get_topic_revision_log', 'vikinger_bbpress_filter_topic_revision_log', 1, 2);

if (!function_exists('vikinger_bbpress_filter_reply_revision_log')) {
  /**
   * Filter reply revision log
   * 
   * @param string  $content      Reply revision log HTML content.
   * @param int     $reply_id     Reply ID.
   */
  function vikinger_bbpress_filter_reply_revision_log($content, $reply_id) {
    // Show the topic reply log if this is a topic in a reply loop
    if (bbp_is_topic($reply_id)) {
      return bbp_get_topic_revision_log($reply_id);
    }

    // Get the reply revision log (out of post meta
    $revision_log = bbp_get_reply_raw_revision_log($reply_id);

    // Check reply and revision log exist
    if (empty($reply_id) || empty($revision_log) || !is_array($revision_log)) {
      return false;
    }

    // Get the actual revisions
    $revisions = bbp_get_reply_revisions($reply_id);

    if (empty($revisions)) {
      return false;
    }

    $r = "\n\n" . '<ul id="bbp-reply-revision-log-' . esc_attr( $reply_id ) . '" class="bbp-reply-revision-log">' . "\n\n";

    // Loop through revisions
    foreach ( (array) $revisions as $revision ) {

      if ( empty( $revision_log[ $revision->ID ] ) ) {
        $author_id = $revision->post_author;
        $reason    = '';
      } else {
        $author_id = $revision_log[ $revision->ID ]['author'];
        $reason    = $revision_log[ $revision->ID ]['reason'];
      }

      $author = vikinger_bbpress_reply_author_get($revision->ID);

      ob_start();

      /**
       * Avatar Micro
       */
      get_template_part('template-part/avatar/avatar', 'micro', [
        'user'      => $author,
        'linked'    => true,
        'no_border' => true,
        'modifiers' => 'vikinger-forum-reply-revision-author-avatar'
      ]);

      ?>
        <!-- VIKINGER FORUM REPLY REVISION AUTHOR TITLE -->
        <a href="<?php echo esc_url($author['link']); ?>" class="vikinger-forum-reply-revision-author-title"><?php echo esc_html($author['name']); ?></a>
        <!-- /VIKINGER FORUM REPLY REVISION AUTHOR TITLE -->
      <?php

      $author_html = ob_get_clean();

      $since  = bbp_get_time_since( bbp_convert_date( $revision->post_modified ) );

      $r .= "\t" . '<li id="bbp-reply-revision-log-' . esc_attr( $reply_id ) . '-item-' . esc_attr( $revision->ID ) . '" class="bbp-reply-revision-log-item">' . "\n";
      if ( ! empty( $reason ) ) {
        $r .= "\t\t" . sprintf( esc_html__( 'This reply was modified %1$s by %2$s. Reason: %3$s', 'vikinger' ), esc_html( $since ), $author_html, esc_html( $reason ) ) . "\n";
      } else {
        $r .= "\t\t" . sprintf( esc_html__( 'This reply was modified %1$s by %2$s.', 'vikinger' ), esc_html( $since ), $author_html ) . "\n";
      }
      $r .= "\t" . '</li>' . "\n";

    }

    $r .= "\n" . '</ul>' . "\n\n";

    return $r;
  }
}

add_filter('bbp_get_reply_revision_log', 'vikinger_bbpress_filter_reply_revision_log', 1, 2);

if (!function_exists('vikinger_bbpress_subscribe_link_before_hide')) {
  /**
   * Hides the '|' character that wrongly appears before the subscription link
   * after doing the AJAX call to subscribe/unsubscribe
   * 
   * @param array $args     Args.
   */
  function vikinger_bbpress_subscribe_link_before_hide($args = []) {
    $args['before'] = '';
    
    return $args;
  }
}

add_filter('bbp_before_get_user_subscribe_link_parse_args', 'vikinger_bbpress_subscribe_link_before_hide');

if (!function_exists('vikinger_bbpress_custom_breadcrumbs')) {
  /**
   * Removes home link from forum breadcrumbs
   */
  function vikinger_bbpress_custom_breadcrumbs() {
    $args['include_home'] = false;

    return $args;
  }
}

add_filter('bbp_before_get_breadcrumb_parse_args', 'vikinger_bbpress_custom_breadcrumbs');

?>