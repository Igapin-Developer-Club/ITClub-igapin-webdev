<?php
/**
 * Template Name: Paid Memberships Pro - Access Restricted Page
 * 
 * @package Vikinger
 * @since 1.8.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  get_header();

?>

<!-- CONTENT GRID -->
<div class="content-grid">
  <!-- PMPRO CONTENT MESSAGE -->
  <div class="pmpro_content_message">
    <!-- PMPRO CONTENT MESSAGE TITLE -->
    <h2 class="pmpro_content_message_title"><?php the_title(); ?></h2>
    <!-- /PMPRO CONTENT MESSAGE TITLE -->

    <!-- PMPRO CONTENT MESSAGE CONTENT -->
    <div class="pmpro_content_message_content">
    <?php the_content(); ?>
    </div>
    <!-- /PMPRO CONTENT MESSAGE CONTENT -->
  </div>
  <!-- /PMPRO CONTENT MESSAGE -->
</div>
<!-- /CONTENT GRID -->

<?php get_footer(); ?>