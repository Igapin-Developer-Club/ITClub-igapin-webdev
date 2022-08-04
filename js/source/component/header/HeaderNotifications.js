import React, { useState, useEffect } from 'react';

import HeaderDropdownFriendRequests from './header-dropdown/header-dropdown-friend-requests/HeaderDropdownFriendRequests';
import HeaderDropdownMessages from './header-dropdown/header-dropdown-messages/HeaderDropdownMessages';
import HeaderDropdownNotifications from './header-dropdown/header-dropdown-notifications/HeaderDropdownNotifications';

import * as userRouter from '../../router/user/user-router';

function HeaderNotifications(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const getLoggedInMember = (callback = () => {}) => {
    userRouter.getLoggedInMember('user-friends')
    .done((loggedUser) => {
      // console.log('HEADER NOTIFICATIONS - GET LOGGED USER RESPONSE: ', loggedUser);

      setLoggedUser(loggedUser);

      callback();
    });
  };

  useEffect(() => {
    getLoggedInMember();
  }, []);

  return (
    <div className="action-list dark">
    {
      vikinger_constants.plugin_active.buddypress_friends &&
        <HeaderDropdownFriendRequests loggedUser={loggedUser}
                                      onActionComplete={getLoggedInMember}
        />
    }
    {
      vikinger_constants.plugin_active.buddypress_messages && vikinger_constants.plugin_active.buddypress_friends &&
        <HeaderDropdownMessages loggedUser={loggedUser} />
    }
    {
      vikinger_constants.plugin_active.buddypress_notifications &&
        <HeaderDropdownNotifications loggedUser={loggedUser} />
    }
    </div>
  );
}

export { HeaderNotifications as default };