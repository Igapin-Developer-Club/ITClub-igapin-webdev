import React, { useState, useEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import GroupInvitationPreview from '../group/GroupInvitationPreview';

import Notification from '../notification/Notification';

import Loader from '../loader/Loader';

import * as userRouter from '../../router/user/user-router';

function ReceivedGroupInvitationsSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-groups-received-invitations')
    .done((response) => {
      // console.log('RECEIVED GROUP INVITATIONS SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);
    });
  };

  const receivedInvitationsCount = loggedUser ? loggedUser.group_invitations_received.length : 0;

  return (
    <div className="account-hub-content">
      <SectionHeader  pretitle={vikinger_translation.groups}
                      title={vikinger_translation.received_invitations}
                      titleCount={receivedInvitationsCount}
      />
    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <React.Fragment>
        {
          (loggedUser.group_invitations_received.length === 0) &&
            <Notification title={vikinger_translation.received_invitations_no_results_title}
                          text={vikinger_translation.received_invitations_no_results_text}
            />
        }

        {
          (loggedUser.group_invitations_received.length > 0) &&
            <div className="grid grid-3-3-3 centered-on-mobile">
            {
              loggedUser.group_invitations_received.map((invitation) => {
                return (
                  <GroupInvitationPreview key={invitation.id}
                                          data={invitation}
                                          onActionComplete={getLoggedInMember}
                  />
                );
              })
            }
            </div>
        }
        </React.Fragment>
    }
    </div>
  );
}

export { ReceivedGroupInvitationsSettingsScreen as default };