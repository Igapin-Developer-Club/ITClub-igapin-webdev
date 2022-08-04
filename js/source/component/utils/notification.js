const notificationComponent = {
  friends: {
    icon: 'friend'
  },
  groups: {
    icon: 'group'
  },
  messages: {
    icon: 'messages'
  },
  forums: {
    icon: 'forums'
  },
  default: {
    icon: 'comment'
  }
};

const getNotificationComponentIcon = (component) => {
  return notificationComponent[component] ? notificationComponent[component].icon : notificationComponent.default.icon;
};

const getEmailSettings = () => {
  const emailSettings = [];

  if (vikinger_constants.plugin_active.buddypress_activity) {
    emailSettings.push(
      {
        name: vikinger_translation.activity,
        options: [
          {
            id: 'notification_activity_new_mention',
            name: vikinger_translation.mentions,
            description: vikinger_translation.email_settings_mentions_description
          },
          {
            id: 'notification_activity_new_reply',
            name: vikinger_translation.replies,
            description: vikinger_translation.email_settings_replies_description
          }
        ]
      }
    );
  }

  if (vikinger_constants.plugin_active.buddypress_messages) {
    emailSettings.push(
      {
        name: vikinger_translation.messages,
        options: [
          {
            id: 'notification_messages_new_message',
            name: vikinger_translation.new_message,
            description: vikinger_translation.email_settings_newmessage_description
          }
        ]
      }
    );
  }

  if (vikinger_constants.plugin_active.buddypress_friends) {
    emailSettings.push(
      {
        name: vikinger_translation.friends,
        options: [
          {
            id: 'notification_friends_friendship_request',
            name: vikinger_translation.new_friend_request,
            description: vikinger_translation.email_settings_newfriendrequest_description
          },
          {
            id: 'notification_friends_friendship_accepted',
            name: vikinger_translation.friend_request_accepted,
            description: vikinger_translation.email_settings_friendrequestaccepted_description
          }
        ]
      }
    );
  }

  if (vikinger_constants.plugin_active.buddypress_groups) {
    emailSettings.push(
      {
        name: vikinger_translation.groups,
        options: [
          {
            id: 'notification_groups_invite',
            name: vikinger_translation.group_invite,
            description: vikinger_translation.email_settings_groupinvite_description
          },
          {
            id: 'notification_groups_group_updated',
            name: vikinger_translation.group_update,
            description: vikinger_translation.email_settings_groupupdate_description
          },
          {
            id: 'notification_groups_admin_promotion',
            name: vikinger_translation.group_promotion,
            description: vikinger_translation.email_settings_grouppromotion_description
          },
          {
            id: 'notification_groups_membership_request',
            name: vikinger_translation.private_group_membership_request,
            description: vikinger_translation.email_settings_privategroupmembershiprequest_description
          },
          {
            id: 'notification_membership_request_completed',
            name: vikinger_translation.group_join_request_status,
            description: vikinger_translation.email_settings_groupjoinrequeststatus_description
          }
        ]
      }
    );
  }

  return emailSettings;
};

export {
  getNotificationComponentIcon,
  getEmailSettings
};