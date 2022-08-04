import React, { useState, useEffect} from 'react';

import TagSticker from '../tag/TagSticker';

import JoinGroupButton from '../button/action-button/action-button-group/JoinGroupButton';
import LeaveGroupButton from '../button/action-button/action-button-group/LeaveGroupButton';
import RequestGroupMembershipButton from '../button/action-button/action-button-group/RequestGroupMembershipButton';
import RemoveGroupMembershipButton from '../button/action-button/action-button-group/RemoveGroupMembershipButton';

import ButtonLink from '../button/ButtonLink';

import * as userRouter from '../../router/user/user-router';
import * as groupRouter from '../../router/group/group-router';

import groupUtils from'../utils/group';

import { groupPermissions } from '../utils/membership';

function GroupHeaderActions(props) {
  const [loggedUser, setLoggedUser] = useState(false);
  const [group, setGroup] = useState(false);

  const getLoggedInMember = (callback = () => {}) => {
    userRouter.getLoggedInMember('user-groups')
    .done((response) => {
      // console.log('GROUP HEADER ACTIONS - GET LOGGED USER RESPONSE: ', response);

      setLoggedUser(response);

      callback();
    });
  };

  const getGroup = () => {
    groupRouter.getGroups({ include: [props.groupID] })
    .done((response) => {
      // console.log('GROUP HEADER ACTIONS - GET GROUP RESPONSE: ', response);

      setGroup(response[0]);
    });
  };

  const reloadWindow = () => {
    window.location.reload();
  };

  useEffect(() => {
    getLoggedInMember();
    getGroup();
  }, []);

  const groupable = groupUtils(loggedUser, group);

  return (
    <div className="profile-header-info-actions">
    {
      loggedUser && group &&
        <React.Fragment>
        {
          groupable.isBannedFromGroup() &&
            <TagSticker modifiers="button-tag tertiary"
                        title="Banned"
                        icon="ban"
                        iconModifiers="white"
            />
        }
        {
          !groupable.isBannedFromGroup() &&
            <React.Fragment>
            {
              groupPermissions.joinGroup && groupable.isGroupPublic() && !groupable.isGroupMember() &&
                <JoinGroupButton  modifiers="profile-header-info-action secondary"
                                  title={vikinger_translation.join_group}
                                  icon="join-group"
                                  loggedUser={loggedUser}
                                  group={group}
                                  onActionComplete={reloadWindow}
                />
            }

            {
              groupable.isGroupMember() && !groupable.isGroupAdmin() &&
                <LeaveGroupButton modifiers="profile-header-info-action tertiary"
                                  title={vikinger_translation.leave_group}
                                  icon="leave-group"
                                  loggedUser={loggedUser}
                                  group={group}
                                  onActionComplete={reloadWindow}
                />
            }

            {
              groupPermissions.joinGroup && groupable.isGroupPrivate() && !groupable.isGroupMember() && !groupable.groupMembershipRequestSent() &&
                <RequestGroupMembershipButton modifiers="profile-header-info-action secondary"
                                              title={vikinger_translation.send_join_request}
                                              icon="join-group"
                                              loggedUser={loggedUser}
                                              group={group}
                                              onActionComplete={getLoggedInMember}
                />
            }

            {
              groupable.isGroupPrivate() && !groupable.isGroupMember() && groupable.groupMembershipRequestSent() &&
                <RemoveGroupMembershipButton  modifiers="profile-header-info-action tertiary"
                                              title={vikinger_translation.cancel_join_request}
                                              icon="leave-group"
                                              loggedUser={loggedUser}
                                              group={group}
                                              onActionComplete={getLoggedInMember}
                />
            }

            {
              (groupable.isGroupAdmin() || groupable.isGroupMod()) &&
                <ButtonLink link={loggedUser.manage_groups_link}
                            modifiers="profile-header-info-action"
                            icon="more-dots"
                            title={vikinger_translation.manage_groups}
                />
            }
            </React.Fragment>
        }
        </React.Fragment> 
    }
    </div>
  );
}

export { GroupHeaderActions as default };