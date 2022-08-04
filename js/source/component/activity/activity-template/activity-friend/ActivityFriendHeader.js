import React from 'react';

import Avatar from '../../../avatar/Avatar';

import BadgeVerified from '../../../badge/BadgeVerified';

import UserStatusLevel from '../../../user-status/user-status-level/UserStatusLevel';

function ActivityFriendHeader(props) {
  const displayVerified = vikinger_constants.plugin_active['bp-verified-member'] && vikinger_constants.settings.bp_verified_member_display_badge_in_activity_stream;
  const displayVerifiedMemberBadge = displayVerified && props.data.author.verified;
  const displayVerifiedMemberFriendBadge = displayVerified && props.data.friend.verified;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled;
  const displayMembershipTagForMember = displayMembershipTag && props.data.author.membership;
  const displayMembershipTagForFriend = displayMembershipTag && props.data.friend.membership;

  return (
    <div className="widget-box-status-header">
      <div className="user-status">
        <div className="user-status-avatar">
          <Avatar size="small"
                  data={props.data.author}
                  noBorder
          />
        </div>
    
        <div className="user-status-title medium">
          <a href={props.data.author.link}>{props.data.author.name}</a>
        {
          displayVerifiedMemberBadge &&
            <BadgeVerified />
        }
        {
          displayMembershipTagForMember &&
            <UserStatusLevel  name={props.data.author.membership.name}
                              size="small"
            />
        }
          {` ${vikinger_translation.and}`}
          <a href={props.data.friend.link}>{` ${props.data.friend.name}`}</a>
        {
          displayVerifiedMemberFriendBadge &&
            <BadgeVerified />
        }
        {
          displayMembershipTagForFriend &&
            <UserStatusLevel  name={props.data.friend.membership.name}
                              size="small"
            />
        }
          <span dangerouslySetInnerHTML={{__html: ` ${props.data.action}`}}></span>
        </div>

        <p className="user-status-text small">{props.data.timestamp}</p>
      </div>
    </div>
  );
}

export { ActivityFriendHeader as default };