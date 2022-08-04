import React from 'react';

import Avatar from '../../../avatar/Avatar';

import BadgeVerified from '../../../badge/BadgeVerified';

import RemoveGroupInvitationIconButton from '../../../button/action-icon-button/action-icon-button-group/RemoveGroupInvitationIconButton';

function GroupInvitationStatus(props) {
  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && props.data.user.verified;

  return (
    <div className={`user-status ${props.modifiers || ''}`}>
      <Avatar size="small"
              modifiers="user-status-avatar"
              data={props.data.user}
              noBorder
      />
        
      <p className="user-status-title">
        <a className="bold" href={props.data.user.link}>{props.data.user.name}</a>
        {
          displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_fullname &&
            <BadgeVerified />
        }
      </p>
      <p className="user-status-text small">&#64;{props.data.user.mention_name}
      {
        displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_username &&
          <BadgeVerified />
      }
      </p>

      <div className="action-request-list">
      {
        <RemoveGroupInvitationIconButton  data={props.data}
                                          onActionComplete={props.onActionComplete}
        />
      }
      </div>
    </div>
  );
}

export { GroupInvitationStatus as default };