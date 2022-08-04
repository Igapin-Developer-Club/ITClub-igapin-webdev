<?php

/**
 * Move Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="bbpress-forums" class="bbpress-wrapper">

	<?php bbp_breadcrumb(); ?>

	<?php if ( is_user_logged_in() && current_user_can( 'edit_topic', bbp_get_topic_id() ) ) : ?>

		<div id="move-reply-<?php bbp_topic_id(); ?>" class="bbp-reply-move">

			<form id="move_reply" name="move_reply" method="post">

				<fieldset class="bbp-form">

					<legend><?php printf( esc_html__( 'Move reply "%s"', 'bbpress' ), bbp_get_reply_title() ); ?></legend>

          <!-- VIKINGER FORUM TOPIC FORM WRAP -->
          <div class="vikinger-forum-topic-form-wrap">

					<div>

						<div class="bbp-template-notice info">
							<ul>
								<li><?php esc_html_e( 'You can either make this reply a new topic with a new title, or merge it into an existing topic.', 'bbpress' ); ?></li>
							</ul>
						</div>

						<div class="bbp-template-notice">
							<ul>
								<li><?php esc_html_e( 'If you choose an existing topic, replies will be ordered by the time and date they were created.', 'bbpress' ); ?></li>
							</ul>
						</div>

						<fieldset class="bbp-form">
							<legend><?php esc_html_e( 'Move Method', 'bbpress' ); ?></legend>

							<!-- FORM ITEM -->
              <div class="form-item">
                <!-- CHECKBOX WRAP -->
                <div class="checkbox-wrap">
                  <input name="bbp_reply_move_option" id="bbp_reply_move_option_reply" type="radio" checked="checked" value="topic" />

                  <!-- CHECKBOX BOX -->
                  <div class="checkbox-box round"></div>
                  <!-- /CHECKBOX BOX -->

                  <label for="bbp_reply_move_option_reply"><?php printf( esc_html__( 'New topic in %s titled:', 'bbpress' ), bbp_get_forum_title( bbp_get_reply_forum_id( bbp_get_reply_id() ) ) ); ?></label>
                </div>
                <!-- /CHECKBOX WRAP -->
              </div>
              <!-- /FORM ITEM -->

              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input small">
                  <input type="text" id="bbp_reply_move_destination_title" value="<?php printf( esc_html__( 'Moved: %s', 'bbpress' ), bbp_get_reply_title() ); ?>" size="35" name="bbp_reply_move_destination_title" />
                </div>
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->

							<?php if ( bbp_has_topics( array( 'show_stickies' => false, 'post_parent' => bbp_get_reply_forum_id( bbp_get_reply_id() ), 'post__not_in' => array( bbp_get_reply_topic_id( bbp_get_reply_id() ) ) ) ) ) : ?>

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- CHECKBOX WRAP -->
                  <div class="checkbox-wrap">
                    <input name="bbp_reply_move_option" id="bbp_reply_move_option_existing" type="radio" value="existing" />

                    <!-- CHECKBOX BOX -->
                    <div class="checkbox-box round"></div>
                    <!-- /CHECKBOX BOX -->

                    <label for="bbp_reply_move_option_existing"><?php esc_html_e( 'Use an existing topic in this forum:', 'bbpress' ); ?></label>
                  </div>
                  <!-- /CHECKBOX WRAP -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-select">
                  <?php

                    bbp_dropdown( array(
                      'post_type'   => bbp_get_topic_post_type(),
                      'post_parent' => bbp_get_reply_forum_id( bbp_get_reply_id() ),
                      'selected'    => -1,
                      'exclude'     => bbp_get_reply_topic_id( bbp_get_reply_id() ),
                      'select_id'   => 'bbp_destination_topic'
                    ) );

                    /**
                     * Icon SVG
                     */
                    get_template_part('template-part/icon/icon', 'svg', [
                      'icon'      => 'small-arrow',
                      'modifiers' => 'form-select-icon'
                    ]);

                  ?>
                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->

							<?php endif; ?>

						</fieldset>

						<div class="bbp-template-notice error" role="alert" tabindex="-1">
							<ul>
								<li><?php esc_html_e( 'This process cannot be undone.', 'bbpress' ); ?></li>
							</ul>
						</div>

						<div class="bbp-submit-wrapper">
							<button type="submit" id="bbp_move_reply_submit" name="bbp_move_reply_submit" class="button secondary submit"><?php esc_html_e( 'Submit', 'bbpress' ); ?></button>
						</div>
					</div>

					<?php bbp_move_reply_form_fields(); ?>

          </div>
          <!-- /VIKINGER FORUM TOPIC FORM WRAP -->

				</fieldset>
			</form>
		</div>

	<?php else : ?>

		<div id="no-reply-<?php bbp_reply_id(); ?>" class="bbp-no-reply">
			<div class="entry-content"><?php is_user_logged_in()
				? esc_html_e( 'You do not have permission to edit this reply.', 'bbpress' )
				: esc_html_e( 'You cannot edit this reply.',                    'bbpress' );
			?></div>
		</div>

	<?php endif; ?>

</div>