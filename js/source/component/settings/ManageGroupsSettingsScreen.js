import React, { useState, useEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import UserGroupManagePreview from '../user-preview/UserGroupManagePreview';

import ActionBox from '../action/ActionBox';

import Notification from '../notification/Notification';

import Loader from '../loader/Loader';

import * as userRouter from '../../router/user/user-router';

import groupUtils from'../utils/group';

import { groupPermissions } from '../utils/membership';

function ManageGroupsSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-groups-preview')
    .done((response) => {
      // console.log('MANAGE GROUPS SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);
    });
  };

  useEffect(() => {
    getLoggedInMember();
  }, []);

  // only show groups the user is an admin or mod of
  const groups = loggedUser ? loggedUser.groups.filter(group => group.is_admin || group.is_mod) : [],
        userCanCreateGroups = !vikinger_constants.settings.bp_restrict_group_creation || vikinger_constants.settings.current_user_is_admin;

  return (
    <div className="account-hub-content">
      <SectionHeader pretitle={vikinger_translation.groups} title={vikinger_translation.manage_groups} />
    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <React.Fragment>
        {
          (userCanCreateGroups || (groups.length > 0)) &&
            <div className="grid grid-3-3-3 centered-on-mobile">
            {
              groupPermissions.createGroup && userCanCreateGroups &&
                <ActionBox  title={vikinger_translation.create_new_group}
                            text={vikinger_translation.create_new_group_text}
                            actionText={vikinger_translation.start_creating}
                            loggedUser={loggedUser}
                />
            }

            {
              (groups.length > 0) && groups.map((group) => {
                let groupPreviewDescriptionText = '';

                const groupable = groupUtils(loggedUser, group);

                if (groupable.isGroupCreator()) {
                  groupPreviewDescriptionText = vikinger_translation.group_creator;
                } else if (groupable.isGroupAdmin()) {
                  groupPreviewDescriptionText = vikinger_translation.group_admin;
                } else if (groupable.isGroupMod()) {
                  groupPreviewDescriptionText = vikinger_translation.group_mod;
                }

                return (
                  <UserGroupManagePreview key={group.id}
                                          data={group}
                                          loggedUser={loggedUser}
                                          descriptionText={groupPreviewDescriptionText}
                  />
                );
              })
            }
            </div>
        }
        {
          !userCanCreateGroups && (groups.length === 0) &&
            <Notification title={vikinger_translation.no_groups_found}
                          text={vikinger_translation.cant_manage_groups_message}
            />
        }
        </React.Fragment>
    }
    </div>
  );
}

export { ManageGroupsSettingsScreen as default };