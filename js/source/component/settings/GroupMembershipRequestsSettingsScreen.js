import React, { useState, useEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import GroupReceivedMembershipRequestPreview from '../group/GroupReceivedMembershipRequestPreview';
import GroupSentMembershipRequestPreview from '../group/GroupSentMembershipRequestPreview';

import Notification from '../notification/Notification';

import Loader from '../loader/Loader';

import * as userRouter from '../../router/user/user-router';

function GroupMembershipRequestsSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-groups-memberships')
    .done((response) => {
      // console.log('GROUP MEMBERSHIP REQUESTS SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);
    });
  };

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const receivedMembershipRequestsCount = loggedUser ? loggedUser.group_membership_requests_received.length : 0,
        sentMembershipRequestsCount = loggedUser ? loggedUser.group_membership_requests_sent.length : 0;

  return (
    <div className="account-hub-content">
      <SectionHeader  pretitle={vikinger_translation.groups}
                      title={vikinger_translation.received_membership_requests}
                      titleCount={receivedMembershipRequestsCount}
      />
    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <React.Fragment>
        {
          (loggedUser.group_membership_requests_received.length === 0) &&
            <Notification title={vikinger_translation.received_membership_requests_no_results_title}
                          text={vikinger_translation.received_membership_requests_no_results_text}
            />
        }

        {
          (loggedUser.group_membership_requests_received.length > 0) &&
            <div className="grid grid-3-3-3 centered-on-mobile">
            {
              loggedUser.group_membership_requests_received.map((membershipRequest) => {
                return (
                  <GroupReceivedMembershipRequestPreview  key={membershipRequest.id}
                                                          data={membershipRequest}
                                                          onActionComplete={getLoggedInMember}
                  />
                );
              })
            }
            </div>
        }
        </React.Fragment>
    }

      <SectionHeader  pretitle={vikinger_translation.groups}
                      title={vikinger_translation.sent_membership_requests}
                      titleCount={sentMembershipRequestsCount}
      />
    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <React.Fragment>
        {
          (loggedUser.group_membership_requests_sent.length === 0) &&
            <Notification title={vikinger_translation.sent_membership_requests_no_results_title}
                          text={vikinger_translation.sent_membership_requests_no_results_text}
            />
        }

        {
          (loggedUser.group_membership_requests_sent.length > 0) &&
            <div className="grid grid-3-3-3 centered-on-mobile">
            {
              loggedUser.group_membership_requests_sent.map((membershipRequest) => {
                return (
                  <GroupSentMembershipRequestPreview  key={membershipRequest.id}
                                                      data={membershipRequest}
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

export { GroupMembershipRequestsSettingsScreen as default };