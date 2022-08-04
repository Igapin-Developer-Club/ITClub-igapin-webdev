<?php
/**
 * Vikinger Template Part - Stream Preview
 * 
 * @package Vikinger
 * @since 1.9.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type string  $username     Streamer username.
 * }
 */

  $stream_src = vikinger_stream_twitch_embed_src_get($args['username']);

?>

<!-- IFRAME WRAP -->
<div class="iframe-wrap">
  <iframe src="<?php echo esc_url($stream_src); ?>" allowFullScreen></iframe>
</div>
<!-- /IFRAME WRAP -->

