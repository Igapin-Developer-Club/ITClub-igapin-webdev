<?php
/**
 * Vikinger Template - BuddyPress Activity Entry
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

?>

<!-- GRID -->
<div class="grid grid-3-6-3 mobile-prefer-content">
  <!-- GRID COLUMN -->
  <div class="grid-column"></div>
  <!-- /GRID COLUMN -->

  <!-- ACTIVITY FILTERABLE LIST -->
  <div  id="activity-filterable-list"
        class="grid-column"
        data-activityid="<?php echo esc_attr(bp_get_activity_id()); ?>"
        data-nofilter
  >
  </div>
  <!-- /ACTIVITY FILTERABLE LIST -->

  <!-- GRID COLUMN -->
  <div class="grid-column"></div>
  <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->