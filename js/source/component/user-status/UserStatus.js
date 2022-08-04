import React from 'react';

import Avatar from '../avatar/Avatar';

import BadgeVerified from '../badge/BadgeVerified';

import UserStatusLevel from './user-status-level/UserStatusLevel';

function UserStatus(props) {
  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && props.showVerifiedBadge && props.data.verified;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && props.data.membership;

  return (
    <div className="user-status request-small">
      <Avatar size="small"
              modifiers="user-status-avatar"
              data={props.data}
              noBorder
      />
        
      <div className="user-status-title">
        <a className="bold" href={props.data.link}>{props.data.name}</a>
      {
        displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_fullname &&
          <BadgeVerified />
      }
      {
        displayMembershipTag &&
          <UserStatusLevel  name={props.data.membership.name}
                            size="small"
          />
      }
      </div>
      <p className="user-status-text small">&#64;{props.data.mention_name}
      {
        displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_username &&
          <BadgeVerified />
      }
      </p>

      <div className="action-request-list">
        <img className="user-status-reaction-image" src={props.data.reaction.image_url} alt={`reaction-${props.data.reaction.name}`} />
      </div>
    </div>
  );
}

export { UserStatus as default };