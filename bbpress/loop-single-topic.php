<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

	$vikinger_settings = vikinger_plugin_bpverifiedmember_is_active() ? vikinger_bpverifiedmember_settings_get('topics') : [];

	$display_verified = vikinger_plugin_bpverifiedmember_is_active() && $vikinger_settings['bp_verified_member_display_badge_in_bbp_topics'];

?>

<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
	<li class="bbp-topic-title">

		<?php if ( bbp_is_user_home() ) : ?>

			<?php if ( bbp_is_favorites() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

					<?php bbp_topic_favorite_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

				</span>

			<?php elseif ( bbp_is_subscriptions() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

					<?php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

				</span>

			<?php endif; ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>

		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>">
		<?php if (bbp_is_topic_sticky(bbp_get_topic_id())) : ?>
			<span class="vikinger-forum-pinned-tag"><?php esc_html_e('Pinned', 'vikinger'); ?></span>
		<?php endif; ?>

		<?php if (bbp_is_topic_closed(bbp_get_topic_id())) : ?>
			<span class="vikinger-forum-closed-tag"><?php esc_html_e('Closed', 'vikinger'); ?></span>
		<?php endif; ?>

		<?php bbp_topic_title(); ?>
		</a>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php bbp_topic_pagination(); ?>

		<?php do_action( 'bbp_theme_before_topic_meta' ); ?>

		<div class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>

			<span class="bbp-topic-started-by"><?php esc_html_e('Started by', 'vikinger'); ?></span>

			<!-- FORUM TOPIC META AUTHOR -->
			<div class="forum-topic-meta-author">
			<?php

				$topic_author = vikinger_bbpress_topic_author_get(bbp_get_topic_id());

				$verified_topic_author = $topic_author['verified'];

				/**
				 * Avatar Micro
				 */
				get_template_part('template-part/avatar/avatar', 'micro', [
					'user'      => $topic_author,
					'linked'    => true,
					'no_border' => true,
					'modifiers' => 'forum-topic-meta-author-avatar'
				]);

			?>

      <!-- FORUM TOPIC META AUTHOR TITLE -->
			<a href="<?php echo esc_url($topic_author['link']); ?>" class="forum-topic-meta-author-title">
			<?php

				echo esc_html($topic_author['name']);

				if ($display_verified && $verified_topic_author) {
          echo vikinger_bpverifiedmember_badge_get();
        }

			?>
			</a>
      <!-- /FORUM TOPIC META AUTHOR TITLE -->
    </div>
    <!-- /FORUM TOPIC META AUTHOR -->

			<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

			<?php if ( ! bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>

				<?php do_action( 'bbp_theme_before_topic_started_in' ); ?>

				<span class="bbp-topic-started-in"><?php printf( esc_html__( 'in: %1$s', 'bbpress' ), '<a href="' . bbp_get_forum_permalink( bbp_get_topic_forum_id() ) . '">' . bbp_get_forum_title( bbp_get_topic_forum_id() ) . '</a>' ); ?></span>
				<?php do_action( 'bbp_theme_after_topic_started_in' ); ?>

			<?php endif; ?>

		</div>

		<?php do_action( 'bbp_theme_after_topic_meta' ); ?>

		<?php bbp_topic_row_actions(); ?>

	</li>

	<li class="bbp-topic-voice-count"><?php bbp_topic_voice_count(); ?></li>

	<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></li>

	<li class="bbp-topic-freshness">

		<?php do_action( 'bbp_theme_before_topic_freshness_link' ); ?>

		<?php bbp_topic_freshness_link(); ?>

		<?php do_action( 'bbp_theme_after_topic_freshness_link' ); ?>

		<p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_freshness_author' ); ?>

			<!-- FORUM TOPIC META AUTHOR -->
			<div class="forum-topic-meta-author">
			<?php

				$topic_last_active_author = vikinger_bbpress_topic_author_get(bbp_get_topic_last_active_id());

				$verified_topic_last_active_author = $topic_last_active_author['verified'];

				/**
				 * Avatar Micro
				 */
				get_template_part('template-part/avatar/avatar', 'micro', [
					'user'      => $topic_last_active_author,
					'linked'    => true,
					'no_border' => true,
					'modifiers' => 'forum-topic-meta-author-avatar'
				]);

			?>

      <!-- FORUM TOPIC META AUTHOR TITLE -->
			<a href="<?php echo esc_url($topic_last_active_author['link']); ?>" class="forum-topic-meta-author-title">
			<?php

				echo esc_html($topic_last_active_author['name']);

				if ($display_verified && $verified_topic_last_active_author) {
          echo vikinger_bpverifiedmember_badge_get();
				}
				
			?>
			</a>
      <!-- /FORUM TOPIC META AUTHOR TITLE -->
    </div>
    <!-- /FORUM TOPIC META AUTHOR -->

			<?php do_action( 'bbp_theme_after_topic_freshness_author' ); ?>

		</p>
	</li>
</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->
