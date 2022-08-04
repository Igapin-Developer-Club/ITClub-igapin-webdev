<?php
/**
 * Functions - Translation
 * 
 * @package Vikinger
 * 
 * @since 1.0.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

 /**
  * Returns all translation strings needed for dynamic scripts
  */
function vikinger_translation_get() {
  return [
    /**
     * Backend - Theme Activation
     */
    'activate'                                => esc_html__('Activate!', 'vikinger'),
    'activating'                              => esc_html__('Activating...', 'vikinger'),
    'activation_form_wrong_pc_or_token_error' => esc_html__('Wrong Purchase Code or Access Token.', 'vikinger'),

    /**
     * Backend - Plugin Installer
     */
    'required_plugins_install_button_text'    => esc_html__('Install / Update / Activate Plugins', 'vikinger'),
    'processing'                              => esc_html__('Processing...', 'vikinger'),

    /**
     * Global
     */
    'day'   => esc_html__('Day', 'vikinger'),
    'month' => esc_html__('Month', 'vikinger'),
    'year'  => esc_html__('Year', 'vikinger'),

    /**
     * Paid Memberships Pro
     */
    'members_only_content_text' => esc_html__('This content is for members only.', 'vikinger'),
    'join_now'                  => esc_html__('Join Now', 'vikinger'),

    /**
     * Header Search
     */
    'search_placeholder'              => esc_html__('Enter your search here...', 'vikinger'),
    'members'                         => esc_html__('Members', 'vikinger'),
    'no_members_found'                => esc_html__('No members found', 'vikinger'),
    'groups'                          => esc_html__('Groups', 'vikinger'),
    'no_groups_found'                 => esc_html__('No groups found', 'vikinger'),
    'posts'                           => esc_html__('Posts', 'vikinger'),
    'by'                              => esc_html_x('By', 'by author_name', 'vikinger'),

    /**
     * Header Friend Requests
     */
    'friend_requests'             => esc_html__('Friend Requests', 'vikinger'),
    'received'                    => esc_html__('Received', 'vikinger'),
    'sent'                        => esc_html__('Sent', 'vikinger'),
    'no_friend_requests_received' => esc_html__('No friend requests received', 'vikinger'),
    'no_friend_requests_sent'     => esc_html__('No friend requests sent', 'vikinger'),
    'view_all_friend_requests'    => esc_html__('View all Friend Requests', 'vikinger'),

    /**
     * Header Messages
     */
    'messages'                    => esc_html__('Messages', 'vikinger'),
    'no_messages_received'        => esc_html__('No messages received', 'vikinger'),
    'view_all_messages'           => esc_html__('View all Messages', 'vikinger'),

    /**
     * Header Notifications
     */
    'email_settings'              => esc_html__('Email Settings', 'vikinger'),
    'notifications'               => esc_html__('Notifications', 'vikinger'),
    'no_notifications_received'   => esc_html__('No notifications received', 'vikinger'),
    'view_all_notifications'      => esc_html__('View all Notifications', 'vikinger'),

    /**
     * Filterable List
     */
    'no_results_found'            => esc_html__('No results found', 'vikinger'),
    'item_list_no_results_text'   => esc_html__('Please try with another filter!', 'vikinger'),

    'showing_results_text_1'      => esc_html_x('Showing', '"showing" n results out of m total', 'vikinger'),
    'showing_results_text_2'      => esc_html_x('out of', 'showing n results "out of" m total', 'vikinger'),

    /**
     * Post Filters
     */
    'category'                    => esc_html__('Category', 'vikinger'),
    'all_categories'              => esc_html__('All Categories', 'vikinger'),
    'type'                        => esc_html__('Type', 'vikinger'),
    'all'                         => esc_html__('All', 'vikinger'),
    'filter_by'                   => esc_html_x('Filter By', 'narrow a search by some criteria', 'vikinger'),
    'date'                        => esc_html_x('Date', 'e.g. (10/08/2020)', 'vikinger'),
    'popularity'                  => esc_html__('Popularity', 'vikinger'),
    'order_by'                    => esc_html__('Order By', 'vikinger'),
    'ascending'                   => esc_html__('Ascending', 'vikinger'),
    'descending'                  => esc_html__('Descending', 'vikinger'),
    'filter_action'               => esc_html_x('Filter', 'to narrow a search', 'vikinger'),
    'result'                      => esc_html__('Result', 'vikinger'),
    'results'                     => esc_html__('Results', 'vikinger'),

    /**
     * Grid Filters
     */
    'grid_filter'                 => [
      'big'   => esc_html_x('Big Grid', 'how the content is displayed on screen', 'vikinger'),
      'small' => esc_html_x('Small Grid', 'how the content is displayed on screen', 'vikinger'),
      'list'  => esc_html_x('List Grid', 'how the content is displayed on screen', 'vikinger')
    ],

    /**
     * Post Preview
     */
    'read_more'                   => esc_html__('Read More...', 'vikinger'),
    'comment'                     => esc_html_x('Comment', 'a comment', 'vikinger'),
    'comments'                    => esc_html__('Comments', 'vikinger'),
    'share'                       => esc_html_x('Share', 'a share', 'vikinger'),
    'shares'                      => esc_html_x('Shares', '0 / 2 or more replies', 'vikinger'),

    /**
     * Reaction Filters
     */
    'all'                         => esc_html_x('All', 'show everything', 'vikinger'),
    'more_reactions_text_1'       => esc_html_x('and', '"and" n more reactions', 'vikinger'),
    'more_reactions_text_2'       => esc_html_x('more...', 'and n "more" reactions', 'vikinger'),

    /**
     * Widget Tabs
     */
    'newest'                      => esc_html__('Newest', 'vikinger'),
    'popular'                     => esc_html__('Popular', 'vikinger'),
    'active'                      => esc_html_x('Active', 'user activity', 'vikinger'),

    /**
     * Photos Widget
     */
    'no_photos_found'             => esc_html__('No photos found', 'vikinger'),

    /**
     * Friends Widget
     */
    'friends'                     => esc_html__('Friends', 'vikinger'),
    'no_friends_found'            => esc_html__('No friends found', 'vikinger'),
    'find_friends'                => esc_html__('Find Friends', 'vikinger'),
    'see_all_friends'             => esc_html__('See all Friends', 'vikinger'),

    /**
     * Achievement Pages
     */
    'locked'                      => esc_html__('Locked', 'vikinger'),
    'unlocked!'                   => esc_html__('Unlocked!', 'vikinger'),

    /**
     * Activity Form
     */
    'status_update'                 => esc_html__('Status Update', 'vikinger'),
    'post_in'                       => esc_html__('Post In', 'vikinger'),
    'my_profile'                    => esc_html__('My Profile', 'vikinger'),
    'privacy'                       => esc_html__('Privacy', 'vikinger'),
    'public'                        => esc_html__('Public', 'vikinger'),
    'private'                       => esc_html__('Private', 'vikinger'),
    'activity_form_placeholder_1'   => esc_html_x('Hi', '(Activity Form) Placeholder text before user name', 'vikinger'),
    'activity_form_placeholder_2'   => esc_html_x('Write something here, use &#64; to mention someone...', '(Activity Form) Placeholder text after user name', 'vikinger'),
    'activity_form_placeholder_3'   => esc_html_x('Write something here...', '(Activity Form) Placeholder text after user name when BuddyPress friends component is disabled', 'vikinger'),
    'add_photo'                     => esc_html__('Add Photo', 'vikinger'),
    'add_video'                     => esc_html__('Add Video', 'vikinger'),
    'add_gif'                       => esc_html__('Add Gif', 'vikinger'),
    'upload_photo'                  => esc_html__('Upload Photo', 'vikinger'),
    'discard'                       => esc_html__('Discard', 'vikinger'),
    'save'                          => esc_html__('Save', 'vikinger'),
    'post_action'                   => esc_html_x('Post', 'to post something', 'vikinger'),
    'activity_form_empty_error'     => esc_html__('Please enter some text or add a photo or video!', 'vikinger'),
    'upload_form_photo_empty_error' => esc_html__('Please add a photo to upload!', 'vikinger'),
    'upload_form_video_empty_error' => esc_html__('Please add a video to upload!', 'vikinger'),
    'maximum_size_accepted_is'      => esc_html__('Maximum size accepted is', 'vikinger'),
    'size_is_too_big'               => esc_html__('size is too big!', 'vikinger'),
    'file_extension_is_not_allowed' => esc_html__('file extension is not allowed!', 'vikinger'),

    /**
     * Activity Filters
     */
    'all_updates'                 => esc_html_x('All Updates', 'to show all post updates', 'vikinger'),
    'mentions'                    => esc_html__('Mentions', 'vikinger'),
    'favorites'                   => esc_html__('Favorites', 'vikinger'),
    'scope'                       => esc_html__('Scope', 'vikinger'),
    'show'                        => esc_html__('Show', 'vikinger'),
    'everything'                  => esc_html__('Everything', 'vikinger'),
    'status'                      => esc_html__('Status', 'vikinger'),
    'shares'                      => esc_html__('Shares', 'vikinger'),
    'media'                       => esc_html__('Media', 'vikinger'),
    'photos'                      => esc_html__('Photos', 'vikinger'),
    'videos'                      => esc_html__('Videos', 'vikinger'),
    'friendships'                 => esc_html__('Friendships', 'vikinger'),
    'new_groups'                  => esc_html__('New Groups', 'vikinger'),

    /**
     * Activity Settings
     */
    'add_favorite'                  => esc_html__('Add Favorite', 'vikinger'),
    'remove_favorite'               => esc_html__('Remove Favorite', 'vikinger'),
    'pin_to_top'                    => esc_html__('Pin to Top', 'vikinger'),
    'unpin_from_top'                => esc_html__('Unpin from Top', 'vikinger'),
    'edit_post'                     => esc_html__('Edit Post', 'vikinger'),
    'delete_post'                   => esc_html__('Delete Post', 'vikinger'),
    'delete_activity_message_title' => esc_html__('Delete Post', 'vikinger'),
    'delete_activity_message_text'  => esc_html__('Are you sure you want to delete this post?', 'vikinger'),
    'edit_comment'                  => esc_html__('Edit Comment', 'vikinger'),
    'cancel_edit'                   => esc_html__('Cancel Edit', 'vikinger'),
    'delete_comment'                => esc_html__('Delete Comment', 'vikinger'),
    'delete_comment_message_title'  => esc_html__('Delete Comment', 'vikinger'),
    'delete_comment_message_text'   => esc_html__('Are you sure you want to delete this comment?', 'vikinger'),

    /**
     * Activity
     */
    'edited_by'                       => esc_html__('* edited by', 'vikinger'),
    'and'                             => esc_html__('and', 'vikinger'),
    'in_the_group'                    => esc_html__('in the group', 'vikinger'),
    'shared_content_deleted_title'    => esc_html__('Oops! -', 'vikinger'),
    'shared_content_deleted_text'     => esc_html__('the shared content was deleted.', 'vikinger'),
    'show_more'                       => esc_html__('Show More', 'vikinger'),


    /**
     * Content Actions
     */
    'comment'                     => esc_html_x('Comment', 'a comment', 'vikinger'),
    'comments'                    => esc_html__('Comments', 'vikinger'),
    'share'                       => esc_html_x('Share', 'a share', 'vikinger'),
    'shares'                      => esc_html_x('Shares', '0 / 2 or more shares', 'vikinger'),


    /**
     * Post Footer
     */
    'react'                       => esc_html_x('React!', 'to react to something', 'vikinger'),
    'comment_action'              => esc_html_x('Comment', 'to comment on something', 'vikinger'),
    'share_action'                => esc_html_x('Share', 'to share something', 'vikinger'),

    /**
     * Comment Form
     */
    'leave_a_comment'               => esc_html__('Leave a Comment', 'vikinger'),
    'your_reply'                    => esc_html__('Your Reply', 'vikinger'),
    'discard'                       => esc_html__('Discard', 'vikinger'),
    'post_reply'                    => esc_html__('Post Reply', 'vikinger'),
    'reply_action'                  => esc_html_x('Reply', 'to reply to something', 'vikinger'),
    'cancel_action'                 => esc_html_x('Cancel', 'to cancel something', 'vikinger'),
    'load'                          => esc_html__('Load', 'vikinger'),
    'reply'                         => esc_html_x('Reply', 'a reply' ,'vikinger'),
    'replies'                       => esc_html_x('Replies', '0 / 2 or more replies' ,'vikinger'),
    'load_more_comments'            => esc_html__('Load More Comments', 'vikinger'),
    'comment_empty_message'         => esc_html__('Please enter a comment', 'vikinger'),
    'comment_not_approved_message'  => esc_html__('Your comment is awaiting moderation and will be visible when approved', 'vikinger'),

    /**
     * Group Filters
     */
    'search_groups'               => esc_html__('Search Groups', 'vikinger'),
    'order_by'                    => esc_html__('Order By', 'vikinger'),
    'alphabetical'                => esc_html__('Alphabetical', 'vikinger'),
    'newest_groups'               => esc_html__('Newest Groups', 'vikinger'),
    'recently_active'             => esc_html__('Recently Active', 'vikinger'),

    /**
     * Group Preview
     */
    'group'                       => esc_html__('Group', 'vikinger'),
    'member'                      => esc_html__('Member', 'vikinger'),
    'post'                        => esc_html_x('Post', 'a post', 'vikinger'),
    'banned'                      => esc_html_x('Banned', 'banned from something', 'vikinger'),

    /**
     * Message Box
     */
    'accept'                      => esc_html__('Accept', 'vikinger'),
    'cancel'                      => esc_html__('Cancel', 'vikinger'),
    'continue'                    => esc_html__('Continue', 'vikinger'),

    /**
     * Group Actions
     */
    'join_group'                  => esc_html__('Join Group', 'vikinger'),
    'leave_group'                 => esc_html__('Leave Group', 'vikinger'),
    'send_join_request'           => esc_html__('Send Join Request', 'vikinger'),
    'cancel_join_request'         => esc_html__('Cancel Join Request', 'vikinger'),
    'reject_join_request'         => esc_html__('Reject Join Request', 'vikinger'),
    'accept_join_request'         => esc_html__('Accept Join Request', 'vikinger'),
    'remove_member'               => esc_html__('Remove Member', 'vikinger'),
    'remove_invitation'           => esc_html__('Remove Invitation', 'vikinger'),
    'reject_invitation'           => esc_html__('Reject Invitation', 'vikinger'),
    'accept_invitation'           => esc_html__('Accept Invitation', 'vikinger'),
    'ban_member'                  => esc_html__('Ban Member', 'vikinger'),
    'unban_member'                => esc_html__('Unban Member', 'vikinger'),
    'promote_to_admin'            => esc_html__('Promote to Admin', 'vikinger'),
    'promote_to_mod'              => esc_html__('Promote to Mod', 'vikinger'),
    'demote_to_mod'               => esc_html__('Demote to Mod', 'vikinger'),
    'demote_to_member'            => esc_html__('Demote to Member', 'vikinger'),
    'manage_groups'               => esc_html__('Manage Groups', 'vikinger'),

    /**
     * Member Filters
     */
    'search_members'              => esc_html__('Search Members', 'vikinger'),
    'order_by'                    => esc_html__('Order By', 'vikinger'),
    'alphabetical'                => esc_html__('Alphabetical', 'vikinger'),
    'newest_members'              => esc_html__('Newest Members', 'vikinger'),
    'recently_active'             => esc_html__('Recently Active', 'vikinger'),

    /**
     * Member Preview
     */
    'post'                        => esc_html_x('Post', 'a post', 'vikinger'),
    'friend'                      => esc_html__('Friend', 'vikinger'),
    'no_social_networks_linked'   => esc_html__('No social networks linked', 'vikinger'),
    'no_badges_unlocked'          => esc_html__('No badges unlocked', 'vikinger'),

    /**
     * Member Actions
     */
    'add_friend'                  => esc_html__('Add Friend', 'vikinger'),
    'remove_friend'               => esc_html__('Remove Friend', 'vikinger'),
    'accept_friend'               => esc_html__('Accept Friend Request', 'vikinger'),
    'reject_friend'               => esc_html__('Reject Friend Request', 'vikinger'),
    'withdraw_friend'             => esc_html__('Cancel Friend Request', 'vikinger'),
    'send_message'                => esc_html__('Send Message', 'vikinger'),

    /**
     * Activity Media List
     */
    'browse'                        => esc_html__('Browse', 'vikinger'),
    'photos'                        => esc_html__('Photos', 'vikinger'),
    'photos_no_results_title'       => esc_html__('No photos found', 'vikinger'),
    'photos_no_results_text'        => esc_html__('There aren\'t any uploaded photos!', 'vikinger'),
    'videos_no_results_title'       => esc_html__('No videos found', 'vikinger'),
    'videos_no_results_text'        => esc_html__('There aren\'t any uploaded videos!', 'vikinger'),
    'upload_photos'                 => esc_html__('Upload Photos', 'vikinger'),
    'upload_video'                  => esc_html__('Upload Video', 'vikinger'),
    'select_all'                    => esc_html__('Select All', 'vikinger'),
    'unselect_all'                  => esc_html__('Unselect All', 'vikinger'),
    'delete'                        => esc_html__('Delete', 'vikinger'),

    /**
     * Settings
     */
    'my_profile'                  => esc_html__('My Profile', 'vikinger'),
    'save_changes'                => esc_html__('Save Changes', 'vikinger'),
    'saving'                      => esc_html__('Saving...', 'vikinger'),

    /**
     * Profile Info Settings
     */
    'profile_info'                => esc_html__('Profile Info', 'vikinger'),
    'change_avatar'               => esc_html__('Change Avatar', 'vikinger'),
    'change_cover'                => esc_html__('Change Cover', 'vikinger'),
    'upload_error'                => esc_html__('Upload Error', 'vikinger'),
    'upload_error_message'        => esc_html__('An error has ocurred, please verify avatar/cover dimensions or try again later', 'vikinger'),
    'avatar_upload_error'         => esc_html__('Avatar Upload Error', 'vikinger'),
    'cover_upload_error'          => esc_html__('Cover Upload Error', 'vikinger'),
    'select_an_option'            => esc_html__('Select an Option', 'vikinger'),

    /**
     * Social Settings
     */
    'social_networks'             => esc_html__('Social Networks', 'vikinger'),
    'no_social_info_available'    => esc_html__('No social info available', 'vikinger'),

    /**
     * Stream Settings
     */
    'stream'                                => esc_html__('Stream', 'vikinger'),
    'stream_settings_username_title'        => esc_html__('Twitch Streamer - Username', 'vikinger'),
    'stream_settings_username_placeholder'  => esc_html__('Enter Twitch streamer username here...', 'vikinger'),
    'stream_settings_preview_title'         => esc_html__('Twitch Stream - Preview', 'vikinger'),
    'stream_settings_preview_text'          => esc_html__('Below, you can see a preview of how the Twitch stream will look like with the currently entered streamer username', 'vikinger'),
    'stream_settings_preview_no_results'    => esc_html__('No streamer username entered', 'vikinger'),

    /**
     * Notification Settings
     */
    'notifications_received_no_results_title' => esc_html__('No notifications received', 'vikinger'),
    'notifications_received_no_results_text'  => esc_html__('If you receive notifications they will appear here!', 'vikinger'),
    'mark_as_read'                            => esc_html__('Mark as Read', 'vikinger'),
    'accept'                                  => esc_html__('Accept', 'vikinger'),
    'cancel'                                  => esc_html__('Cancel', 'vikinger'),
    'delete_selected_message'                 => esc_html__('Are you sure you want to delete all selected items?', 'vikinger'),

    /**
     * Message Settings
     */
    'inbox'                       => esc_html__('Inbox', 'vikinger'),
    'sentbox'                     => esc_html__('Sentbox', 'vikinger'),
    'starred'                     => esc_html_x('Starred', 'favorites', 'vikinger'),
    'new_message'                 => esc_html__('New Message', 'vikinger'),
    'started'                     => esc_html__('Started', 'vikinger'),
    'add_friend_placeholder'      => esc_html__('Use &#64; to add a friend...', 'vikinger'),
    'search_messages'             => esc_html__('Search Messages', 'vikinger'),
    'write_a_message'             => esc_html__('Write a Message...', 'vikinger'),
    'no_messages_found'           => esc_html__('No messages found', 'vikinger'),
    'message_search_no_results'   => esc_html__('No messages match your search', 'vikinger'),
    'star_action'                 => esc_html_x('Star', 'favorite something', 'vikinger'),
    'unstar'                      => esc_html_x('Unstar', 'unfavorite something', 'vikinger'),
    'delete_item_message'         => esc_html__('Are you sure you want to delete this?', 'vikinger'),
    'you'                         => esc_html__('You', 'vikinger'),

    /**
     * Friend Requests Settings
     */
    'friend_requests_received'                  => esc_html__('Friend Requests Received', 'vikinger'),
    'friend_requests_received_no_results_title' => esc_html__('No friend requests received', 'vikinger'),
    'friend_requests_received_no_results_text'  => esc_html__('If you receive friend requests they will appear here!', 'vikinger'),
    'friend_requests_sent'                      => esc_html__('Friend Requests Sent', 'vikinger'),
    'friend_requests_sent_no_results_title'     => esc_html__('No friend requests sent', 'vikinger'),
    'friend_requests_sent_no_results_text'      => esc_html__('If you send friend requests they will appear here!', 'vikinger'),

    /**
     * Account Info Settings
     */
    'account'                               => esc_html__('Account', 'vikinger'),
    'account_info'                          => esc_html__('Account Info', 'vikinger'),
    'no_account_info_available'             => esc_html__('No account info available', 'vikinger'),

    /**
     * Change Password Settings
     */
    'change_password'                       => esc_html__('Change Password', 'vikinger'),
    'enter_your_current_password'           => esc_html__('Enter your Current Password', 'vikinger'),
    'your_new_password'                     => esc_html__('Your New Password', 'vikinger'),
    'confirm_new_password'                  => esc_html__('Confirm New Password', 'vikinger'),
    'error'                                 => esc_html__('Error', 'vikinger'),
    'change_password_error_title'           => esc_html__('Change Password Error', 'vikinger'),
    'change_password_error_text'            => esc_html__('Couldn\'t change password. Please try again later', 'vikinger'),
    'current_password_mismatch_error_title' => esc_html__('Incorrect Password', 'vikinger'),
    'current_password_mismatch_error_text'  => esc_html__('Entered current password doesn\'t match your password. Please make sure to enter your current password correctly', 'vikinger'),
    'new_password_mismatch_error_title'     => esc_html__('New Password Mismatch', 'vikinger'),
    'new_password_mismatch_error_text'      => esc_html__('New password field and new password confirmation field don\'t match. Please make sure to enter the same password in both fields', 'vikinger'),

    /**
     * Email Settings
     */
    'activity'                              => esc_html__('Activity', 'vikinger'),

    'mentions'                              => esc_html__('Mentions', 'vikinger'),
    'email_settings_mentions_description'   => esc_html__('A member mentions you in an update', 'vikinger'),

    'replies'                               => esc_html__('Replies', 'vikinger'),
    'email_settings_replies_description'    => esc_html__('A member replies to an update or comment you\'ve posted', 'vikinger'),

    'new_message'                           => esc_html__('New Message', 'vikinger'),
    'email_settings_newmessage_description' => esc_html__('A member sends you a new message', 'vikinger'),

    'friends'                                           => esc_html__('Friends', 'vikinger'),

    'new_friend_request'                                => esc_html__('New Friend Request', 'vikinger'),
    'email_settings_newfriendrequest_description'       => esc_html__('A member sends you a friendship request', 'vikinger'),

    'friend_request_accepted'                           => esc_html__('Friend Request Accepted', 'vikinger'),
    'email_settings_friendrequestaccepted_description'  => esc_html__('A member accepts your friendship request', 'vikinger'),

    'group_invite'                                              => esc_html__('Group Invite', 'vikinger'),
    'email_settings_groupinvite_description'                    => esc_html__('A member invites you to join a group', 'vikinger'),

    'group_update'                                              => esc_html__('Group Update', 'vikinger'),
    'email_settings_groupupdate_description'                    => esc_html__('Group information is updated', 'vikinger'),

    'group_promotion'                                           => esc_html__('Group Promotion', 'vikinger'),
    'email_settings_grouppromotion_description'                 => esc_html__('You are promoted to a group administrator or moderator', 'vikinger'),

    'private_group_membership_request'                          => esc_html__('Private Group Membership Request', 'vikinger'),
    'email_settings_privategroupmembershiprequest_description'  => esc_html__('A member requests to join a private group for which you are an admin', 'vikinger'),

    'group_join_request_status'                                 => esc_html__('Group Join Request Status', 'vikinger'),
    'email_settings_groupjoinrequeststatus_description'         => esc_html__('Your request to join a group has been approved or denied', 'vikinger'),

    /**
     * Manage Groups Settings
     */
    'manage_group'                          => esc_html__('Manage Group', 'vikinger'),
    'manage_groups'                         => esc_html__('Manage Groups', 'vikinger'),
    'cant_manage_groups_message'            => esc_html__('You can\'t manage any groups yet!', 'vikinger'),
    'create_group'                          => esc_html__('Create Group!', 'vikinger'),
    'create_new_group'                      => esc_html__('Create New Group', 'vikinger'),
    'create_new_group_text'                 => esc_html__('Share your passion with others!', 'vikinger'),
    'start_creating'                        => esc_html__('Start Creating!', 'vikinger'),
    'creating'                              => esc_html__('Creating...', 'vikinger'),
    'group_creator'                         => esc_html__('Group Creator', 'vikinger'),
    'group_admin'                           => esc_html__('Group Admin', 'vikinger'),
    'group_mod'                             => esc_html__('Group Mod', 'vikinger'),

    'group_info'                            => esc_html__('Group Info', 'vikinger'),
    'group_name'                            => esc_html__('Group Name', 'vikinger'),
    'group_status'                          => esc_html__('Group Status', 'vikinger'),
    'group_slug'                            => esc_html__('Group Slug (what you see on the URL)', 'vikinger'),
    'group_description'                     => esc_html__('Group Description', 'vikinger'),
    'forum'                                 => esc_html__('Forum', 'vikinger'),
    'forums'                                => esc_html__('Forums', 'vikinger'),
    'forum_topics'                          => esc_html__('Forum Topics', 'vikinger'),
    'forum_replies'                         => esc_html__('Forum Replies', 'vikinger'),
    'group_forum'                           => esc_html__('Group Forum', 'vikinger'),
    'group_forum_enable_title'              => esc_html__('Should this group have a forum?', 'vikinger'),
    'group_forum_enable_text'               => esc_html__('Enable forum for this group', 'vikinger'),
    'forum_name'                            => esc_html__('Forum Name', 'vikinger'),
    'forum_description'                     => esc_html__('Forum Description', 'vikinger'),
    'forum_privacy'                         => esc_html__('Forum Privacy', 'vikinger'),

    'avatar_and_cover'                      => esc_html__('Avatar and Cover', 'vikinger'),

    'administrators'                        => esc_html__('Administrators', 'vikinger'),
    'mods'                                  => esc_html__('Mods', 'vikinger'),
    'banned_members'                        => esc_html__('Banned Members', 'vikinger'),
    'no_mods_found'                         => esc_html__('No mods found', 'vikinger'),
    'no_banned_members_found'               => esc_html__('No banned members found', 'vikinger'),

    'delete_group'                          => esc_html__('Delete Group', 'vikinger'),
    'delete_group_text'                     => esc_html__('Deleting a group will remove all its content, this action cannot be undone.', 'vikinger'),
    'delete_group_confirmation'             => esc_html__('Are you sure you want to delete this group?', 'vikinger'),

    'required_fields_message'               => esc_html__('Please fill all required fields', 'vikinger'),
    'save_error_message'                    => esc_html__('Error when saving, please try again later', 'vikinger'),
    'create_group_error'                    => esc_html__('Group creation failed! Please try again later.', 'vikinger'),
    'update_group_error'                    => esc_html__('Group update failed! Please try again later.', 'vikinger'),
    'discard_all'                           => esc_html__('Discard All', 'vikinger'),

    /**
     * Send Invitations Settings
     */
    'send_invitations'                      => esc_html__('Send Invitations', 'vikinger'),
    'send_invitations_no_results_title'     => esc_html__('No groups', 'vikinger'),
    'send_invitations_no_results_text_1'    => esc_html__('You don\'t belong to any groups. Create or join a group first!', 'vikinger'),
    'send_invitations_no_results_text_2'    => esc_html__('You don\'t belong to any groups which you can send invitations from', 'vikinger'),
    'select_the_group'                      => esc_html__('Select the Group', 'vikinger'),
    'select_your_friends'                   => esc_html__('Select your Friends', 'vikinger'),
    'send_invitations_friends_no_results'   => esc_html__('You don\'t have any friends that can be invited to this group', 'vikinger'),
    'sending'                               => esc_html__('Sending...', 'vikinger'),
    'pending_invitations'                   => esc_html__('Pending Invitations', 'vikinger'),
    'pending_invitations_no_results_title'  => esc_html__('No invitations sent', 'vikinger'),
    'pending_invitations_no_results_text'   => esc_html__('If you send invitations they will appear here!', 'vikinger'),

    /**
     * Received Invitations Settings
     */
    'received_invitations'                          => esc_html__('Received Invitations', 'vikinger'),
    'received_invitations_no_results_title'         => esc_html__('No invitations received', 'vikinger'),
    'received_invitations_no_results_text'          => esc_html__('If you receive invitations they will appear here!', 'vikinger'),
    'invited_by'                                    => esc_html__('Invited By', 'vikinger'),
    'received_membership_requests'                  => esc_html__('Received Membership Requests', 'vikinger'),
    'received_membership_requests_no_results_title' => esc_html__('No membership requests received', 'vikinger'),
    'received_membership_requests_no_results_text'  => esc_html__('If you receive membership requests they will appear here!', 'vikinger'),
    'sent_membership_requests'                      => esc_html__('Sent Membership Requests', 'vikinger'),
    'sent_membership_requests_no_results_title'     => esc_html__('No membership requests sent', 'vikinger'),
    'sent_membership_requests_no_results_text'      => esc_html__('If you send membership requests they will appear here!', 'vikinger'),
    'wants_to_join'                                 => esc_html__('Wants to Join', 'vikinger'),

    /**
     * Login Form Popup
     */
    'register'                              => esc_html__('Register', 'vikinger'),
    'login'                                 => esc_html__('Login', 'vikinger'),
    'login_and_register'                    => esc_html__('Login &amp; Register', 'vikinger'),
    'account_login'                         => esc_html__('Account Login', 'vikinger'),
    'username_or_email'                     => esc_html__('Username or Email', 'vikinger'),
    'password'                              => esc_html__('Password', 'vikinger'),
    'remember_me'                           => esc_html__('Remember Me', 'vikinger'),
    'login_to_your_account'                 => esc_html__('Login to your Account', 'vikinger'),
    'authenticating'                        => esc_html__('Authenticating...', 'vikinger'),
    'wrong_user_message'                    => esc_html__('Wrong username or password.', 'vikinger'),
    'generic_error'                         => esc_html__('An error has ocurred. Please try again later.', 'vikinger'),
    'create_your_account'                   => esc_html__('Create your Account!', 'vikinger'),
    'your_email'                            => esc_html__('Your Email', 'vikinger'),
    'username'                              => esc_html__('Username', 'vikinger'),
    'repeat_password'                       => esc_html__('Repeat Password', 'vikinger'),
    'register_now'                          => esc_html__('Register Now!', 'vikinger'),
    'registering'                           => esc_html__('Registering...', 'vikinger'),
    'registration_complete'                 => esc_html__('Registration Complete!', 'vikinger'),
    'invalid_email_message'                 => esc_html__('Email entered is invalid', 'vikinger'),
    'password_mismatch_message'             => esc_html__('Passwords don\'t match, please enter the same password in both fields', 'vikinger'),
    'username_exists_message'               => esc_html__('Username already exists!, please select another one', 'vikinger')
  ];
}

?>