import React from 'react';

import Avatar from '../../avatar/Avatar';

import IconSVG from '../../icon/IconSVG';

import BadgeVerified from '../../badge/BadgeVerified';

import UserStatusLevel from '../user-status-level/UserStatusLevel';

import { truncateText } from '../../../utils/core';

function MessageStatus(props) {
  const messageContent = props.ownLastMessage ? `${vikinger_translation.you}: ${props.data.content}` : props.data.content;

  const recipientUser = props.data.recipients.length && props.data.recipients[0].user ? props.data.recipients[0].user : {};

  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && recipientUser.verified;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && recipientUser.membership;

  return (
    <div className="user-status">
      <Avatar size="small"
              modifiers="user-status-avatar"
              data={recipientUser}
              noBorder
              noLink
      />
        
      <div className="user-status-title">
      {
        props.favorite &&
          <IconSVG icon="starred" modifiers="user-status-favorite-icon" />
      }
        <span className="bold">{recipientUser.name}</span>
      {
        displayVerifiedMemberBadge &&
          <BadgeVerified />
      }
      {
        displayMembershipTag &&
          <UserStatusLevel  name={recipientUser.membership.name}
                            size="small"
          />
      }
      </div>
      <p className="user-status-text">{truncateText(messageContent, 40)}</p>
      <p className="user-status-timestamp floaty">{props.data.timestamp}</p>
    </div>
  );
}

export { MessageStatus as default };