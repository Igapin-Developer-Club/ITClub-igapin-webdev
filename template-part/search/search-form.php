<?php
/**
 * Vikinger Template Part - Search Form
 * 
 * @package Vikinger
 * @since 1.8.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @param array $args {
 *   @type array  $attributes           List additional attributes.
 * }
 */

  $attributes = isset($args['attributes']) ? $args['attributes'] : [];

  $search_form_attributes = [];

  // add pmpro membership post and category restrictions
  if (vikinger_plugin_pmpro_is_active() && vikinger_pmpro_search_archives_limit_enabled()) {
    $restricted_categories = vikinger_pmpro_logged_user_restricted_categories_get();
    $restricted_posts = vikinger_pmpro_logged_user_restricted_posts_get();

    $search_form_attributes['category-exclude'] = implode(',', $restricted_categories);
    $search_form_attributes['post-exclude'] = implode(',', $restricted_posts);
  }

  $search_form_attributes = array_merge($search_form_attributes, $attributes);

  $search_form_attributes_string = '';

  foreach ($search_form_attributes as $search_form_attribute => $search_form_attribute_value) {
    $search_form_attributes_string .= ' data-' . $search_form_attribute . '="' . esc_attr($search_form_attribute_value) . '"';
  }

?>

<!-- SEARCH FORM -->
<div id="vk-search-form" <?php echo $search_form_attributes_string; ?>></div>
<!-- /SEARCH FORM -->