import React from 'react';

import Avatar from '../avatar/Avatar';
import AvatarSmallerList from '../avatar/AvatarSmallerList';

import TagSticker from '../tag/TagSticker';

import JoinGroupButton from '../button/action-button/action-button-group/JoinGroupButton';
import LeaveGroupButton from '../button/action-button/action-button-group/LeaveGroupButton';
import RequestGroupMembershipButton from '../button/action-button/action-button-group/RequestGroupMembershipButton';
import RemoveGroupMembershipButton from '../button/action-button/action-button-group/RemoveGroupMembershipButton';

import { truncateText, joinText } from '../../utils/core';

import groupUtils from'../utils/group';

import { groupPermissions } from '../utils/membership';

function GroupPreviewSmall(props) {
  const groupable = groupUtils(props.loggedUser, props.data);

  const memberCountText = props.data.total_member_count === 1 ? vikinger_translation.member : vikinger_translation.members,
        postCountText = props.data.post_count === 1 ? vikinger_translation.post : vikinger_translation.posts;

  return (
    <div className="user-preview landscape animate-slide-down">
      {/* USER PREVIEW COVER */}
      <div className="user-preview-cover" style={{background: `url(${props.data.cover_image_url}) center center / cover no-repeat`}}></div>
      {/* USER PREVIEW COVER */}
  
      {/* USER PREVIEW INFO */}
      <div className="user-preview-info">
        <div className="user-short-description landscape tiny">
          <Avatar size="small"
                  modifiers="user-short-description-avatar"
                  data={props.data}
          />
    
          <p className="user-short-description-title"><a href={props.data.link}>{truncateText(props.data.name, 25)}</a></p>
          <p className="user-short-description-text"><a href={props.data.link}>&#64;{truncateText((joinText(props.data.name)).toLowerCase(), 35)}</a></p>
        </div>

        <div className="user-stats">
          <div className="user-stat">
            <p className="user-stat-title">{props.data.total_member_count}</p>
            <p className="user-stat-text">{memberCountText}</p>
          </div>

          <div className="user-stat">
            <p className="user-stat-title">{props.data.post_count}</p>
            <p className="user-stat-text">{postCountText}</p>
          </div>
        </div>

        <AvatarSmallerList data={props.data.members} count={props.data.total_member_count} limit={6} link={props.data.members_link} />

        {/* USER PREVIEW ACTIONS */}
        <div className="user-preview-actions user-preview-actions-tagged">
          <TagSticker icon={props.data.status} />

        {
          props.loggedUser &&
            <React.Fragment>
            {
              groupable.isBannedFromGroup() &&
                <TagSticker modifiers="button-tag tertiary"
                            title={vikinger_translation.banned}
                            icon="ban"
                            iconModifiers="white"
                />
            }
            {
              !groupable.isBannedFromGroup() &&
                <React.Fragment>
                {
                  groupPermissions.joinGroup && groupable.isGroupPublic() && !groupable.isGroupMember() &&
                    <JoinGroupButton  modifiers="secondary"
                                      title={vikinger_translation.join_group}
                                      icon="join-group"
                                      loggedUser={props.loggedUser}
                                      group={props.data}
                                      onActionComplete={props.onActionComplete}
                    />
                }

                {
                  groupable.isGroupMember() && !groupable.isGroupAdmin() &&
                    <LeaveGroupButton modifiers="tertiary"
                                      title={vikinger_translation.leave_group}
                                      icon="leave-group"
                                      loggedUser={props.loggedUser}
                                      group={props.data}
                                      onActionComplete={props.onActionComplete}
                    />
                }

                {
                  groupPermissions.joinGroup && groupable.isGroupPrivate() && !groupable.isGroupMember() && !groupable.groupMembershipRequestSent() &&
                    <RequestGroupMembershipButton modifiers="secondary"
                                                  title={vikinger_translation.send_join_request}
                                                  icon="join-group"
                                                  loggedUser={props.loggedUser}
                                                  group={props.data}
                                                  onActionComplete={props.onActionComplete}
                    />
                }

                {
                  groupable.isGroupPrivate() && !groupable.isGroupMember() && groupable.groupMembershipRequestSent() &&
                    <RemoveGroupMembershipButton  modifiers="tertiary"
                                                  title={vikinger_translation.cancel_join_request}
                                                  icon="leave-group"
                                                  loggedUser={props.loggedUser}
                                                  group={props.data}
                                                  onActionComplete={props.onActionComplete}
                    />
                }
                </React.Fragment>
            }
            </React.Fragment>
        }
        </div>
        {/* USER PREVIEW ACTIONS */}
      </div>
      {/* USER PREVIEW INFO */}
    </div>
  );
}

export { GroupPreviewSmall as default };