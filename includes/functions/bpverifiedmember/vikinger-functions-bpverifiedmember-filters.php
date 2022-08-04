<?php
/**
 * Functions - BP Verified Member - Filters
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_comment_author_filter')) {
  /**
   * Undo HTML entities encoding so that verified badge span is not escaped
   */
  function vikinger_comment_author_filter($author, $comment_id) {
    return wp_specialchars_decode($author, ENT_QUOTES);
  }
}

add_filter('comment_author', 'vikinger_comment_author_filter', 10, 2);

?>