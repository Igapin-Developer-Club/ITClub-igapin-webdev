<?php
/**
 * Vikinger Template - BuddyPress Member Settings
 * 
 * Determines member settings template to display
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

	$member = get_query_var('member');

	switch (bp_current_action()) {
		case 'general':
			bp_get_template_part('members/single/settings/general');
			break;
		case 'notifications':
			bp_get_template_part('members/single/settings/notifications');
			break;
		default:
			bp_get_template_part('members/single/plugins');
			break;
	}

?>