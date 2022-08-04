<?php
/**
 * Vikinger Sidebar - Sidebar Blog
 * 
 * Vertical sidebar on the right or left side of the blog post
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  if (is_active_sidebar('blog')) {
    dynamic_sidebar('blog');
  }
  
?>