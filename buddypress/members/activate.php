<?php
/**
 * Vikinger Template - BuddyPress Activate Page
 * 
 * Displays the member activation page
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $login_page_default_logo_id = get_theme_mod('vikinger_loginregister_setting_login_logo', false);

  if ($login_page_default_logo_id) {
    $login_page_default_logo_url = wp_get_attachment_image_src($login_page_default_logo_id , 'full')[0];
  } else {
    $login_page_default_logo_url = VIKINGER_URL . '/img/login/logo.png';
  }

  $login_page_default_background_id = get_theme_mod('vikinger_loginregister_setting_login_background', false);

  if ($login_page_default_background_id) {
    $login_page_default_background_url = wp_get_attachment_image_src($login_page_default_background_id , 'full')[0];
  } else {
    $login_page_default_background_url = VIKINGER_URL . '/img/login/background.jpg';
  }

  $login_page_pretitle  = get_theme_mod('vikinger_loginregister_setting_login_pretitle', esc_html_x('Welcome to', 'Login Page - Pre Title', 'vikinger'));
  $login_page_title     = get_theme_mod('vikinger_loginregister_setting_login_title', esc_html_x('Vikinger', 'Login Page - Title', 'vikinger'));
  $login_page_text      = get_theme_mod('vikinger_loginregister_setting_login_text', sprintf(esc_html__('%sThe next generation WordPress+Buddypress social community!%s Connect with your friends with full profiles, reactions, groups, badges, quests, ranks, credits and %smuch more to come!%s', 'vikinger'), '<span class="bold">', '</span>', '<span class="bold">', '</span>'));

?>

<div class="vkregister-header" style="background: url('<?php echo esc_url($login_page_default_background_url); ?>') center center / cover no-repeat">
  <?php if ($login_page_pretitle) : ?>
    <p class="vkregister-header-pretitle"><?php echo esc_html($login_page_pretitle); ?></p>
  <?php endif; ?>

  <?php if ($login_page_title) : ?>
    <p class="vkregister-header-title"><?php echo esc_html($login_page_title); ?></p>
  <?php endif; ?>

  <?php if ($login_page_text) : ?>
    <p class="vkregister-header-text"><?php echo $login_page_text; ?></p>
  <?php endif; ?>
  </div>
</div>

<div id="buddypress">

  <!-- VKREGISTER LOGO -->
  <img class="vkregister-logo" src="<?php echo esc_url($login_page_default_logo_url); ?>" alt="logo">
  <!-- /VKREGISTER LOGO -->

  <!-- VKREGISTER FORM TITLE -->
  <p class="vkregister-form-title"><?php esc_html_e('Account Activation', 'vikinger'); ?></p>
  <!-- /VKREGISTER FORM TITLE -->

	<?php

	/**
	 * Fires before the display of the member activation page.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_activation_page' ); ?>

	<div class="page" id="activate-page">

		<div id="template-notices" role="alert" aria-atomic="true">
			<?php

			/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
			do_action( 'template_notices' ); ?>

		</div>

		<?php

		/**
		 * Fires before the display of the member activation page content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_before_activate_content' ); ?>

		<?php if ( bp_account_was_activated() ) : ?>

			<?php if ( isset( $_GET['e'] ) ) : ?>
				<p><?php _e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'buddypress' ); ?></p>
			<?php else : ?>
				<p>
					<?php
					/* translators: %s: login url */
					printf( __( 'Your account was activated successfully! You can now <a href="%s">log in</a> with the username and password you provided when you signed up.', 'buddypress' ), wp_login_url( bp_get_root_domain() ) );
					?>
				</p>
			<?php endif; ?>

		<?php else : ?>

			<form action="" method="post" class="standard-form" id="activation-form">

        <!-- FORM ITEM -->
        <div class="form-item">
          <!-- FORM INPUT -->
          <div class="form-input">
            <label for="key"><?php _e( 'Activation Key:', 'buddypress' ); ?></label>
            <input type="text" name="key" id="key" value="<?php echo esc_attr( bp_get_current_activation_key() ); ?>" />
          </div>
          <!-- /FORM INPUT -->
        </div>
        <!-- /FORM ITEM -->

				<p class="submit">
					<input type="submit" name="submit" value="<?php esc_attr_e( 'Activate', 'buddypress' ); ?>" />
				</p>

			</form>

		<?php endif; ?>

		<?php

		/**
		 * Fires after the display of the member activation page content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_after_activate_content' ); ?>

	</div><!-- .page -->

	<?php

	/**
	 * Fires after the display of the member activation page.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_activation_page' ); ?>

	<?php

		$bp_directory_page_ids = bp_core_get_directory_page_ids();
		$register_page = get_post($bp_directory_page_ids['register']);
		$register_page_link = get_permalink($register_page->ID);

	?>

	<p class="vk-bp-register-page-nav">
		<a href="<?php echo esc_url(wp_login_url()); ?>"><?php esc_html_e('Login', 'vikinger'); ?></a>
		|
		<a href="<?php echo esc_url($register_page_link); ?>"><?php esc_html_e('Register', 'vikinger'); ?></a>
	</p>

</div><!-- #buddypress -->
