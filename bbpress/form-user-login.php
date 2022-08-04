<?php

/**
 * User Login Form
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
	<fieldset class="bbp-form">
    <legend><?php esc_html_e( 'Log In', 'bbpress' ); ?></legend>

    <!-- VIKINGER FORUM TOPIC FORM WRAP -->
    <div class="vikinger-forum-topic-form-wrap">
    
      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <label for="user_login"><?php esc_html_e( 'Username', 'bbpress' ); ?>: </label>
          <input type="text" name="log" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>" size="20" maxlength="100" id="user_login" autocomplete="off" />
        </div>
        <!-- /FORM INPUT -->
      </div>
      <!-- /FORM ITEM -->

      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <label for="user_pass"><?php esc_html_e( 'Password', 'bbpress' ); ?>: </label>
          <input type="password" name="pwd" value="<?php bbp_sanitize_val( 'user_pass', 'password' ); ?>" size="20" id="user_pass" autocomplete="off" />
        </div>
        <!-- /FORM INPUT -->
      </div>
      <!-- /FORM ITEM -->

      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- CHECKBOX WRAP -->
        <div class="checkbox-wrap">
          <input type="checkbox" name="rememberme" value="forever" <?php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); ?> id="rememberme" />

          <!-- CHECKBOX BOX -->
          <div class="checkbox-box">
          <?php

            /**
             * Icon SVG
             */
            get_template_part('template-part/icon/icon', 'svg', [
              'icon'  => 'cross'
            ]);

          ?>
          </div>
          <!-- /CHECKBOX BOX -->

          <label for="rememberme"><?php esc_html_e( 'Keep me signed in', 'bbpress' ); ?></label>
        </div>
        <!-- /CHECKBOX WRAP -->
      </div>
      <!-- /FORM ITEM -->

      <?php do_action( 'login_form' ); ?>

      <div class="bbp-submit-wrapper">

        <button type="submit" name="user-submit" id="user-submit" class="button secondary submit user-submit"><?php esc_html_e( 'Log In', 'bbpress' ); ?></button>

        <?php bbp_user_login_fields(); ?>

      </div>
    </div>
    <!-- /VIKINGER FORUM TOPIC FORM WRAP -->
	</fieldset>
</form>