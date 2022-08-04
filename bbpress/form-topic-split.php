<?php

/**
 * Split Topic
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

		<div id="split-topic-<?php bbp_topic_id(); ?>" class="bbp-topic-split">

			<form id="split_topic" name="split_topic" method="post">

				<fieldset class="bbp-form">

					<legend><?php printf( esc_html__( 'Split topic "%s"', 'bbpress' ), bbp_get_topic_title() ); ?></legend>

          <!-- VIKINGER FORUM TOPIC FORM WRAP -->
          <div class="vikinger-forum-topic-form-wrap">

					<div>

						<div class="bbp-template-notice info">
							<ul>
								<li><?php esc_html_e( 'When you split a topic, you are slicing it in half starting with the reply you just selected. Choose to use that reply as a new topic with a new title, or merge those replies into an existing topic.', 'bbpress' ); ?></li>
							</ul>
						</div>

						<div class="bbp-template-notice">
							<ul>
								<li><?php esc_html_e( 'If you use the existing topic option, replies within both topics will be merged chronologically. The order of the merged replies is based on the time and date they were posted.', 'bbpress' ); ?></li>
							</ul>
						</div>

						<fieldset class="bbp-form">
							<legend><?php esc_html_e( 'Split Method', 'bbpress' ); ?></legend>

              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- CHECKBOX WRAP -->
                <div class="checkbox-wrap">
                  <input name="bbp_topic_split_option" id="bbp_topic_split_option_reply" type="radio" checked="checked" value="reply" />

                  <!-- CHECKBOX BOX -->
                  <div class="checkbox-box round"></div>
                  <!-- /CHECKBOX BOX -->

                  <label for="bbp_topic_split_option_reply"><?php printf( esc_html__( 'New topic in %s titled:', 'bbpress' ), bbp_get_forum_title( bbp_get_topic_forum_id( bbp_get_topic_id() ) ) ); ?></label>
                </div>
                <!-- /CHECKBOX WRAP -->
              </div>
              <!-- /FORM ITEM -->

              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input small">
                  <input type="text" id="bbp_topic_split_destination_title" value="<?php printf( esc_html__( 'Split: %s', 'bbpress' ), bbp_get_topic_title() ); ?>" size="35" name="bbp_topic_split_destination_title" />
                </div>
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->

							<?php if ( bbp_has_topics( array( 'show_stickies' => false, 'post_parent' => bbp_get_topic_forum_id( bbp_get_topic_id() ), 'post__not_in' => array( bbp_get_topic_id() ) ) ) ) : ?>

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- CHECKBOX WRAP -->
                  <div class="checkbox-wrap">
                    <input name="bbp_topic_split_option" id="bbp_topic_split_option_existing" type="radio" value="existing" />

                    <!-- CHECKBOX BOX -->
                    <div class="checkbox-box round"></div>
                    <!-- /CHECKBOX BOX -->

                    <label for="bbp_topic_split_option_existing"><?php esc_html_e( 'Use an existing topic in this forum:', 'bbpress' ); ?></label>
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
                      'post_parent' => bbp_get_topic_forum_id( bbp_get_topic_id() ),
                      'post_status' => bbp_get_public_topic_statuses(),
                      'selected'    => -1,
                      'exclude'     => bbp_get_topic_id(),
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

						<fieldset class="bbp-form">
							<legend><?php esc_html_e( 'Topic Extras', 'bbpress' ); ?></legend>

							<div>

              <?php if ( bbp_is_subscriptions_active() ) : ?>

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- CHECKBOX WRAP -->
                  <div class="checkbox-wrap">
                    <input name="bbp_topic_subscribers" id="bbp_topic_subscribers" type="checkbox" value="1" checked="checked" />

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

                    <label for="bbp_topic_subscribers"><?php esc_html_e( 'Copy subscribers to the new topic', 'bbpress' ); ?></label>
                  </div>
                  <!-- /CHECKBOX WRAP -->
                </div>
                <!-- /FORM ITEM -->

              <?php endif; ?>

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- CHECKBOX WRAP -->
                  <div class="checkbox-wrap">
                    <input name="bbp_topic_favoriters" id="bbp_topic_favoriters" type="checkbox" value="1" checked="checked" />

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

                    <label for="bbp_topic_favoriters"><?php esc_html_e( 'Copy favoriters to the new topic', 'bbpress' ); ?></label>
                  </div>
                  <!-- /CHECKBOX WRAP -->
                </div>
                <!-- /FORM ITEM -->

              <?php if ( bbp_allow_topic_tags() ) : ?>

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- CHECKBOX WRAP -->
                  <div class="checkbox-wrap">
                    <input name="bbp_topic_tags" id="bbp_topic_tags" type="checkbox" value="1" checked="checked" />

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

                    <label for="bbp_topic_tags"><?php esc_html_e( 'Copy topic tags to the new topic', 'bbpress' ); ?></label>
                  </div>
                  <!-- /CHECKBOX WRAP -->
                </div>
                <!-- /FORM ITEM -->

              <?php endif; ?>

							</div>
						</fieldset>

						<div class="bbp-template-notice error" role="alert" tabindex="-1">
							<ul>
								<li><?php esc_html_e( 'This process cannot be undone.', 'bbpress' ); ?></li>
							</ul>
						</div>

						<div class="bbp-submit-wrapper">
							<button type="submit" id="bbp_merge_topic_submit" name="bbp_merge_topic_submit" class="button secondary submit"><?php esc_html_e( 'Submit', 'bbpress' ); ?></button>
						</div>
					</div>

					<?php bbp_split_topic_form_fields(); ?>

          </div>
          <!-- /VIKINGER FORUM TOPIC FORM WRAP -->

				</fieldset>
			</form>
		</div>

	<?php else : ?>

		<div id="no-topic-<?php bbp_topic_id(); ?>" class="bbp-no-topic">
			<div class="entry-content"><?php is_user_logged_in()
				? esc_html_e( 'You do not have permission to edit this topic.', 'bbpress' )
				: esc_html_e( 'You cannot edit this topic.',                    'bbpress' );
			?></div>
		</div>

	<?php endif; ?>

</div>