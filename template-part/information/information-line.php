<?php
/**
 * Vikinger Template Part - Information Line
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_xprofile_get_group_fields
 * 
 * @param array $args {
 *   @type array  $information_item     Information item.
 * }
 */

?>

<!-- INFORMATION LINE -->
<div class="information-line">
  <!-- INFORMATION LINE TITLE -->
  <p class="information-line-title"><?php echo esc_html($args['information_item']['title']); ?></p>
  <!-- /INFORMATION LINE TITLE -->

<?php if ($args['information_item']['type'] === 'url') : ?>
  <!-- INFORMATION LINE TEXT -->
  <p class="information-line-text"><a href="<?php echo esc_url($args['information_item']['value']); ?>" target="_blank"><?php echo esc_html($args['information_item']['value']); ?></a></p>
  <!-- /INFORMATION LINE TEXT -->
<?php elseif ($args['information_item']['type'] === 'datebox') : ?>
  <!-- INFORMATION LINE TEXT -->
  <p class="information-line-text"><?php echo esc_html(date_i18n(get_option('date_format'), strtotime($args['information_item']['value']))); ?></p>
  <!-- /INFORMATION LINE TEXT -->
<?php else : ?>
  <!-- INFORMATION LINE TEXT -->
  <p class="information-line-text"><?php echo esc_html($args['information_item']['value']); ?></p>
  <!-- /INFORMATION LINE TEXT -->
<?php endif; ?>
</div>
<!-- /INFORMATION LINE -->