import React from 'react';

import Avatar from '../../../avatar/Avatar';

import BadgeVerified from '../../../badge/BadgeVerified';

import PromoteGroupMemberToModIconButton from '../../../button/action-icon-button/action-icon-button-group/PromoteGroupMemberToModIconButton';
import PromoteGroupMemberToAdminIconButton from '../../../button/action-icon-button/action-icon-button-group/PromoteGroupMemberToAdminIconButton';

import DemoteGroupMemberToMemberIconButton from '../../../button/action-icon-button/action-icon-button-group/DemoteGroupMemberToMemberIconButton';
import DemoteGroupMemberToModIconButton from '../../../button/action-icon-button/action-icon-button-group/DemoteGroupMemberToModIconButton';

import BanGroupMemberIconButton from '../../../button/action-icon-button/action-icon-button-group/BanGroupMemberIconButton';
import UnbanGroupMemberIconButton from '../../../button/action-icon-button/action-icon-button-group/UnbanGroupMemberIconButton';

import RemoveGroupMemberIconButton from '../../../button/action-icon-button/action-icon-button-group/RemoveGroupMemberIconButton';

import groupUtils from'../../../utils/group';

function GroupMemberStatus(props) {
  const groupable = groupUtils(props.loggedUser, props.group, props.data);

  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && props.data.verified;

  return (
    <div className={`user-status ${props.modifiers || ''}`}>
      <Avatar size="small"
              modifiers="user-status-avatar"
              data={props.data}
              noBorder
      />
        
      <p className="user-status-title">
        <a className="bold" href={props.data.link}>{props.data.name}</a>
        {
          displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_fullname &&
            <BadgeVerified />
        }
      </p>
      <p className="user-status-text small">&#64;{props.data.mention_name}
      {
        displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_username &&
          <BadgeVerified />
      }
      </p>

      <div className="action-request-list">
      {
        props.loggedUser && (props.loggedUser.id !== props.data.id) &&
          <React.Fragment>
          {
            !groupable.groupMemberIsBanned() &&
              <React.Fragment>
              {
                !groupable.groupMemberIsAdmin() && groupable.canPromoteMemberToAdmin() &&
                  <PromoteGroupMemberToAdminIconButton  member={props.data}
                                                        group={props.group}
                                                        loggedUser={props.loggedUser}
                                                        onActionComplete={props.onActionComplete}
                  />
              }

              {
                !groupable.groupMemberIsAdmin() && !groupable.groupMemberIsMod() && groupable.canPromoteMemberToMod() &&
                  <PromoteGroupMemberToModIconButton  member={props.data}
                                                      group={props.group}
                                                      loggedUser={props.loggedUser}
                                                      onActionComplete={props.onActionComplete}
                  />
              }

              {
                groupable.groupMemberIsAdmin() && groupable.canDemoteMemberToMod() &&
                  <DemoteGroupMemberToModIconButton member={props.data}
                                                    group={props.group}
                                                    loggedUser={props.loggedUser}
                                                    onActionComplete={props.onActionComplete}
                  />
              }

              {
                (groupable.groupMemberIsAdmin() || groupable.groupMemberIsMod()) && groupable.canDemoteMemberToMember() &&
                  <DemoteGroupMemberToMemberIconButton  member={props.data}
                                                        group={props.group}
                                                        loggedUser={props.loggedUser}
                                                        onActionComplete={props.onActionComplete}
                  />
              }

              {
                groupable.canRemoveGroupMember() &&
                  <RemoveGroupMemberIconButton  member={props.data}
                                                group={props.group}
                                                loggedUser={props.loggedUser}
                                                onActionComplete={props.onActionComplete}
                  />
              }

              {
                !groupable.groupMemberIsAdmin() && groupable.canBanMember() &&
                  <BanGroupMemberIconButton member={props.data}
                                            group={props.group}
                                            loggedUser={props.loggedUser}
                                            onActionComplete={props.onActionComplete}
                  />
              }
              </React.Fragment>
          }
          {
            groupable.groupMemberIsBanned() && groupable.canUnbanMember() &&
              <UnbanGroupMemberIconButton member={props.data}
                                          group={props.group}
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

export { GroupMemberStatus as default };