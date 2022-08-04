<?php
/**
 * Vikinger Sidebar - Sidebar Blog Bottom
 * 
 * Horizontal sidebar that appears below the blog post
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  if (is_active_sidebar('blog_bottom')) {
    dynamic_sidebar('blog_bottom');
  }

?>