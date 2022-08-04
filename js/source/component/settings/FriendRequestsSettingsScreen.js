import React, { useState, useEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import Notification from '../notification/Notification';

import FriendRequestList from '../friend/FriendRequestList';

import Loader from '../loader/Loader';

import * as userRouter from '../../router/user/user-router';

function FriendRequestsSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-friends')
    .done((response) => {
      // console.log('FRIEND REQUESTS SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);
    });
  };

  useEffect(() => {
    getLoggedInMember();
  }, []);

  return (
    <div className="account-hub-content">
      <SectionHeader  pretitle={vikinger_translation.my_profile} title={vikinger_translation.friend_requests_received} />
    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <React.Fragment>
        {
          (loggedUser.friend_requests_received.length > 0) &&
            <FriendRequestList  data={loggedUser.friend_requests_received}
                                loggedUser={loggedUser}
                                onActionComplete={getLoggedInMember}
            />
        }
        {
          (loggedUser.friend_requests_received.length === 0) &&
            <Notification title={vikinger_translation.friend_requests_received_no_results_title}
                          text={vikinger_translation.friend_requests_received_no_results_text}
            />
        }
        </React.Fragment>
    }

      <SectionHeader  pretitle={vikinger_translation.my_profile} title={vikinger_translation.friend_requests_sent} />

    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <React.Fragment>
        {
          (loggedUser.friend_requests_sent.length > 0) &&
            <FriendRequestList  data={loggedUser.friend_requests_sent}
                                loggedUser={loggedUser}
                                onActionComplete={getLoggedInMember}
            />
        }
        {
          (loggedUser.friend_requests_sent.length === 0) &&
            <Notification title={vikinger_translation.friend_requests_sent_no_results_title}
                          text={vikinger_translation.friend_requests_sent_no_results_text}
            />
        }
        </React.Fragment>
    }
    </div>
  );
}

export { FriendRequestsSettingsScreen as default };