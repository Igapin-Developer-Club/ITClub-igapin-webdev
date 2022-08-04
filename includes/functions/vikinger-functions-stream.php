<?php
/**
 * Functions - Stream
 * 
 * @package Vikinger
 * 
 * @since 1.9.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_stream_twitch_embed_src_get')) {
  /**
   * Returns iframe src for stream embed.
   * 
   * @param string  $username       Streamer username.
   * @return string $iframe_src     Iframe src for embed.
   */
  function vikinger_stream_twitch_embed_src_get($username) {
    $stream_parent = vikinger_settings_stream_twitch_embed_parent_get();

    $iframe_src = '//player.twitch.tv/?channel=' . $username . '&parent=' . $stream_parent;

    /**
     * Filter stream iframe src.
     * 
     * @since 1.9.1
     * 
     * @param string $iframe_src
     * @param string $username
     * @param string $stream_parent
     */
    $iframe_src = apply_filters('vikinger_streams_twitch_embed_iframe_src', $iframe_src, $username, $stream_parent);
  
    return $iframe_src;
  }
}

?>