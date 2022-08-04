<?php
/**
 * Vikinger Template - Paid Memberships Pro - Levels
 * 
 * The template for displaying membership levels.
 * 
 * @package Vikinger
 * @since 1.8.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

	global $wpdb, $pmpro_msg, $pmpro_msgt, $current_user, $pmpro_currency_symbol;

	$pmpro_levels = pmpro_sort_levels_by_order( pmpro_getAllLevels(false, true) );
	$pmpro_levels = apply_filters( 'pmpro_levels_array', $pmpro_levels );

	$pmpro_currency_position = pmpro_getCurrencyPosition();

?>

<?php if ($pmpro_msg) : ?>
<!-- PMPRO MESSAGE -->
<div class="<?php echo pmpro_get_element_class( 'pmpro_message ' . $pmpro_msgt, $pmpro_msgt ); ?>"><?php echo $pmpro_msg?></div>
<!-- /PMPRO MESSAGE -->
<?php endif; ?>

<!-- GRID -->
<div class="grid grid-4-4-4 grid-stretched centered-on-mobile">
<?php

	$count = 0;
	$has_any_level = false;

	foreach($pmpro_levels as $level) {

		$user_level = pmpro_getSpecificMembershipLevelForUser( $current_user->ID, $level->id );
		$has_level = ! empty( $user_level );
		$has_any_level = $has_level ?: $has_any_level;

		$cost_text = pmpro_getLevelCost($level, true, true); 
		$expiration_text = pmpro_getLevelExpiration($level);
		$period_text = '';

		if (!empty($cost_text) && !empty($expiration_text)) {
			$period_text = $cost_text . "<br>" . $expiration_text;
		} else if (!empty($cost_text)) {
			$period_text = $cost_text;
		} else if (!empty($expiration_text)) {
			$period_text = $expiration_text;
		}

		$action_text = '';
		$action_link = pmpro_url("checkout", "?level=" . $level->id, "https");
		$action_type = 'button';

		if (!$has_level) {
			$action_text = esc_html__('Select', 'vikinger');
		} else {
			if (pmpro_isLevelExpiringSoon($user_level) && $level->allow_signups) {
				$action_text = esc_html__('Renew', 'vikinger');
			} else {
				$action_type = 'notice';
				$action_text = esc_html__('Your Level', 'vikinger');
			}
		}

		/**
		 * Membership Preview
		 */
		get_template_part('template-part/membership/membership', 'preview', [
			'currency'					=> $pmpro_currency_symbol,
			'currency_position'	=> $pmpro_currency_position,
			'price'							=> $level->initial_payment,
			'name'							=> $level->name,
			'period'						=> $period_text,
			'description'				=> $level->description,
			'action_text'				=> $action_text,
			'action_type'				=> $action_type,
			'action_link'				=> $action_link
		]);

	}

?>
</div>
<!-- /GRID -->

<!-- PMPRO ACTIONS NAV -->
<p class="<?php echo pmpro_get_element_class( 'pmpro_actions_nav' ); ?>">
	<?php if ($has_any_level) : ?>
	<a href="<?php echo pmpro_url("account")?>" id="pmpro_levels-return-account"><?php _e('&larr; Return to Your Account', 'paid-memberships-pro' );?></a>
	<?php else : ?>
	<a href="<?php echo home_url()?>" id="pmpro_levels-return-home"><?php _e('&larr; Return to Home', 'paid-memberships-pro' );?></a>
	<?php endif; ?>
</p>
<!-- /PMPRO ACTIONS NAV -->