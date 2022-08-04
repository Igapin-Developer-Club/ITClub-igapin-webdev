<?php
/**
 * Vikinger Template Part - Post Filterable List
 * 
 * @package Vikinger
 * @since 1.7.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_post_get_loop_data
 * 
 * @param array $args {
 *   @type array  $attributes           List additional attributes.
 *   @type bool   $allow_post_types     If true, allow post types in filterable list.
 *   @type string $post_types           Post types to display.
 * }
 */

  $attributes = isset($args['attributes']) ? $args['attributes'] : [];
  $post_list_allow_post_types = isset($args['allow_post_types']) ? $args['allow_post_types'] : false;
  $post_types = isset($args['post_types']) ? $args['post_types'] : ['post'];

  $posts_grid_type = vikinger_logged_user_grid_type_get('post');

  $post_list_attributes = [
    'grid-type' => $posts_grid_type
  ];

  // add pmpro membership post and category restrictions
  if (vikinger_plugin_pmpro_is_active() && vikinger_pmpro_search_archives_limit_enabled()) {
    $restricted_categories = vikinger_pmpro_logged_user_restricted_categories_get();
    $restricted_posts = vikinger_pmpro_logged_user_restricted_posts_get();

    $post_list_attributes['category-exclude'] = implode(',', $restricted_categories);
    $post_list_attributes['post-exclude'] = implode(',', $restricted_posts);
  }

  $post_list_attributes = array_merge($post_list_attributes, $attributes);

  $post_list_attributes_string = '';

  foreach ($post_list_attributes as $post_list_attribute => $post_list_attribute_value) {
    $post_list_attributes_string .= ' data-' . $post_list_attribute . '="' . esc_attr($post_list_attribute_value) . '"';
  }

  if ($post_list_allow_post_types) {
    $post_type_split_is_enabled = vikinger_blog_post_type_split_display_is_enabled();

    if ($post_type_split_is_enabled && (count($post_types) > 1)) {
      foreach ($post_types as $post_type) {
        /**
         * Section Header
         */
        get_template_part('template-part/section/section', 'header', [
          'section_pretitle'  => esc_html__('Browse', 'vikinger'),
          'section_title'     => ucfirst($post_type)
        ]);
?>
      <!-- POST PREVIEW FILTERABLE LIST -->
      <div  class="post-preview-filterable-list filterable-list" <?php echo $post_list_attributes_string; ?> data-posttypes="<?php echo esc_attr($post_type); ?>"></div>
      <!-- /POST PREVIEW FILTERABLE LIST -->
<?php

      }
    } else {

?>
    <!-- POST PREVIEW FILTERABLE LIST -->
    <div  class="post-preview-filterable-list filterable-list" <?php echo $post_list_attributes_string; ?> data-posttypes="<?php echo esc_attr(implode(',', $post_types)); ?>"></div>
    <!-- /POST PREVIEW FILTERABLE LIST -->
<?php

    }
  } else {

?>
  <!-- POST PREVIEW FILTERABLE LIST -->
  <div  class="post-preview-filterable-list filterable-list" <?php echo $post_list_attributes_string; ?>></div>
  <!-- /POST PREVIEW FILTERABLE LIST -->
<?php

  }

?>
