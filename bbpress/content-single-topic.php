<?php

/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="bbpress-forums" class="bbpress-wrapper">

	<?php bbp_breadcrumb(); ?>

	<?php do_action( 'bbp_template_before_single_topic' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>
  
    <?php

      $topic_last_activity_description_data = vikinger_bbpress_topic_last_activity_description_get(bbp_get_topic_id());

      /**
       * Forum Description Notice
       */
      get_template_part('template-part/forum/forum-description-notice', null, [
        'last_activity_description_data' => $topic_last_activity_description_data
      ]);

	  ?>

		<?php if ( bbp_show_lead_topic() ) : ?>

			<?php bbp_get_template_part( 'content', 'single-topic-lead' ); ?>

		<?php endif; ?>

		<?php if ( bbp_has_replies() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

			<!-- VIKINGER FORUM REPLIES -->
			<div class="vikinger-forum-replies">
				<!-- VIKINGER FORUM REPLIES POSTS -->
				<div class="vikinger-forum-replies-posts">
				<?php bbp_get_template_part( 'loop',       'replies' ); ?>
				</div>
				<!-- VIKINGER FORUM REPLIES POSTS -->
				
				<!-- VIKINGER FORUM REPLIES SIDEBAR -->
				<div class="vikinger-forum-replies-sidebar">
					<!-- VIKINGER FORUM REPLIES SIDEBAR ACTIONS -->
					<div class="vikinger-forum-replies-sidebar-actions">
						<?php bbp_topic_subscription_link(); ?>

						<?php bbp_topic_favorite_link(); ?>
					</div>
					<!-- /VIKINGER FORUM REPLIES SIDEBAR ACTIONS -->

				<?php

					/**
					 * Stats Decoration
					 */
					get_template_part('template-part/stats/stats', 'decoration', [
						'description'	=> _n('Voice', 'Voices', bbp_get_topic_voice_count(), 'vikinger'),
						'value'				=> bbp_get_topic_voice_count(),
						'icon'				=> 'members',
						'modifiers'		=> 'primary'
					]);

					/**
					 * Stats Decoration
					 */
					get_template_part('template-part/stats/stats', 'decoration', [
						'description'	=> _n('Reply', 'Replies', bbp_get_topic_reply_count(), 'vikinger'),
						'value'				=> bbp_get_topic_reply_count(),
						'icon'				=> 'comment',
						'modifiers'		=> 'secondary'
					]);

				?>

				<?php
				
					if (bbp_allow_topic_tags()) {
						$topic_tags = bbp_get_topic_tag_list(0, ['before' => '<p class="vikinger-forum-topic-tags">', 'after' => '</p>']);

				?>

					<!-- WIDGET BOX -->
					<div class="widget-box">
						<!-- WIDGET BOX TITLE -->
						<p class="widget-box-title"><?php esc_html_e('Tags', 'vikinger'); ?></p>
						<!-- /WIDGET BOX TITLE -->

						<!-- WIDGET BOX CONTENT -->
						<div class="widget-box-content">
						<?php if ($topic_tags !== '') : ?>
						<?php echo $topic_tags; ?>
						<?php else : ?>
							<!-- NO RESULTS TEXT -->
							<p class="no-results-text"><?php esc_html_e('This topic has no tags', 'vikinger'); ?></p>
							<!-- /NO RESULTS TEXT -->
						<?php endif; ?>
						</div>
						<!-- /WIDGET BOX CONTENT -->
					</div>
					<!-- /WIDGET BOX -->
				<?php

					}

				?>
				</div>
				<!-- VIKINGER FORUM REPLIES SIDEBAR -->
			</div>
			<!-- /VIKINGER FORUM REPLIES -->

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

		<?php endif; ?>

		<?php bbp_get_template_part( 'form', 'reply' ); ?>

	<?php endif; ?>

	<?php bbp_get_template_part( 'alert', 'topic-lock' ); ?>

	<?php do_action( 'bbp_template_after_single_topic' ); ?>

</div>