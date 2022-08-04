<?php
/**
 * Vikinger Template Part - Social Items
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see footer.php
 * 
 * @param array $args {
 *   @type array   $social_items    Social items.
 *   @type string  $modifiers       Optional. Additional class names to add to the HTML wrapper.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';

?>

<!-- SOCIAL ITEMS -->
<div class="social-items <?php echo esc_attr($modifiers_classes); ?>">
<?php foreach ($args['social_items'] as $social_item) : ?>
  <!-- SOCIAL ITEM -->
  <a class="social-item <?php echo esc_attr($social_item['name']); ?> <?php echo esc_attr($modifiers_classes); ?>" href="<?php echo esc_url($social_item['link']); ?>" target="_blank">
  <?php
  
    /**
     * Icon SVG
     */
    get_template_part('template-part/icon/icon', 'svg', [
      'icon'      => $social_item['name'],
      'modifiers' => 'social-item-icon'
    ]);

  ?>
  </a>
  <!-- /SOCIAL ITEM -->
<?php endforeach; ?>
</div>
<!-- /SOCIAL ITEMS -->