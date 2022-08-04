<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">
	<div class="bbp-meta">
		<!-- VIKINGER FORUM REPLY HEADER STATS -->
		<div class="vikinger-forum-reply-header-stats">
			<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>

			<?php if ( bbp_is_single_user_replies() ) : ?>

				<span class="bbp-header">
					<?php esc_html_e( 'in reply to: ', 'bbpress' ); ?>
					<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
				</span>

			<?php endif; ?>
		</div>
		<!-- /VIKINGER FORUM REPLY HEADER STATS -->

		<!-- VIKINGER FORUM REPLY HEADER ACTIONS -->
		<div class="vikinger-forum-reply-header-actions">

			<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>

			<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

			<?php bbp_reply_admin_links(); ?>

			<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>
		</div>
		<!-- /VIKINGER FORUM REPLY HEADER ACTIONS -->

	</div><!-- .bbp-meta -->
</div><!-- #post-<?php bbp_reply_id(); ?> -->

<div <?php bbp_reply_class(); ?>>
	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

		<?php
		
			$reply_author_data = vikinger_bbpress_reply_author_get(bbp_get_reply_id());
			$reply_author_data['role'] = vikinger_bbpress_author_role_get($reply_author_data['id']);

			/**
			 * Forum Reply Author
			 */
			get_template_part('template-part/forum/forum-reply', 'author', [
				'author'	=> $reply_author_data
			]);
		
		?>

		<?php if ( current_user_can( 'moderate', bbp_get_reply_id() ) ) : ?>

			<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>

			<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

	</div><!-- .bbp-reply-author -->

	<div class="bbp-reply-content">

		<?php do_action( 'bbp_theme_before_reply_content' ); ?>

		<?php bbp_reply_content(); ?>

		<?php do_action( 'bbp_theme_after_reply_content' ); ?>

	</div><!-- .bbp-reply-content -->
</div><!-- .reply -->
