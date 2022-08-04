<?php
/**
 * Vikinger Template Part - Group Status
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_groups_get
 * 
 * @param array $args {
 *   @type array $group    Group data.
 * }
 */

  $member_count = $args['group']['total_member_count'];

?>

<!-- USER STATUS -->
<div class="user-status user-status-with-icon">
<?php

  /**
   * Avatar Small
   */
  get_template_part('template-part/avatar/avatar', 'small', [
    'user'      => $args['group'],
    'modifiers' => 'user-status-avatar',
    'linked'    => true,
    'no_border' => true,
    'no_stats'  => true
  ]);

?>

  <!-- USER STATUS TITLE -->
  <p class="user-status-title"><a class="bold" href="<?php echo esc_url($args['group']['link']); ?>"><?php echo esc_html($args['group']['name']); ?></a></p>
  <!-- /USER STATUS TITLE -->

  <!-- USER STATUS TEXT -->
  <p class="user-status-text small"><?php echo esc_html($member_count); ?> <?php echo esc_html(_n('member', 'members', $member_count, 'vikinger')); ?></p>
  <!-- /USER STATUS TEXT -->

<?php

    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => $args['group']['status'],
      'modifiers' => 'user-status-icon user-status-privacy-icon'
    ])

?>
</div>
<!-- /USER STATUS -->