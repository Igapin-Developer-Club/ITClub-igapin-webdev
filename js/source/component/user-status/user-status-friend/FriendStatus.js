import React, { useState } from 'react';

import friendUtils from '../../utils/friend';

import Avatar from '../../avatar/Avatar';

import BadgeVerified from '../../badge/BadgeVerified';

import UserStatusLevel from '../user-status-level/UserStatusLevel';

import AddFriendIconButton from '../../button/action-icon-button/action-icon-button-friend/AddFriendIconButton';
import AcceptFriendRequestIconButton from '../../button/action-icon-button/action-icon-button-friend/AcceptFriendRequestIconButton';
import RejectFriendRequestIconButton from '../../button/action-icon-button/action-icon-button-friend/RejectFriendRequestIconButton';
import WithdrawFriendRequestIconButton from '../../button/action-icon-button/action-icon-button-friend/WithdrawFriendRequestIconButton';
import RemoveFriendIconButton from '../../button/action-icon-button/action-icon-button-friend/RemoveFriendIconButton';

function FriendStatus(props) {
  const [accepting, setAccepting] = useState(false);
  const [rejecting, setRejecting] = useState(false);

  const acceptingRequest = () => {
    setAccepting(true);
  };

  const rejectingRequest = () => {
    setRejecting(true);
  };

  const friendable = friendUtils(props.loggedUser, props.data.id);

  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && props.data.verified;
  const displayVerifiedMemberBadgeInUsername = displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_username;
  const displayVerifiedMemberBadgeInFullname = displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_fullname;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && props.data.membership;

  return (
    <div className={`user-status ${props.modifiers || ''}`}>
      <Avatar size="small"
              modifiers="user-status-avatar"
              data={props.data}
              noBorder
      />
        
      <div className="user-status-title">
        <a className="bold" href={props.data.link}>{props.data.name}</a>
      {
        displayVerifiedMemberBadgeInFullname &&
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
        displayVerifiedMemberBadgeInUsername &&
          <BadgeVerified />
      }
      </p>

      <div className="action-request-list">
      {
        props.loggedUser && (props.loggedUser.id !== props.data.id) &&
          <React.Fragment>
          {
            !friendable.isFriend() &&
              <React.Fragment>
              {
                !friendable.friendRequestSent() && !friendable.friendRequestReceived() &&
                  <AddFriendIconButton  userID={props.data.id}
                                        loggedUser={props.loggedUser}
                                        onActionComplete={props.onActionComplete}
                  />
              }

              {
                friendable.friendRequestSent() &&
                  <WithdrawFriendRequestIconButton  userID={props.data.id}
                                                    loggedUser={props.loggedUser}
                                                    onActionComplete={props.onActionComplete}
                  />
              }

              {
                friendable.friendRequestReceived() &&
                  <AcceptFriendRequestIconButton  userID={props.data.id}
                                                  loggedUser={props.loggedUser}
                                                  onActionStart={acceptingRequest}
                                                  onActionComplete={props.onActionComplete}
                                                  locked={rejecting}
                  />
              }

              {
                props.allowReject && friendable.friendRequestReceived() &&
                  <RejectFriendRequestIconButton  userID={props.data.id}
                                                  loggedUser={props.loggedUser}
                                                  onActionStart={rejectingRequest}
                                                  onActionComplete={props.onActionComplete}
                                                  locked={accepting}
                  />
              }
              </React.Fragment>
          }
          {
            friendable.isFriend() &&
              <RemoveFriendIconButton userID={props.data.id}
                                      loggedUser={props.loggedUser}
                                      onActionComplete={props.onActionComplete}
              />
          }
          </React.Fragment>
      }
      </div>
    </div>
  );
}

export { FriendStatus as default };