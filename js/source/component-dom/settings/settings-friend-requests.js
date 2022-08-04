import React from 'react';
import ReactDOM from 'react-dom';

import FriendRequestsSettingsScreen from '../../component/settings/FriendRequestsSettingsScreen';

const friendRequestsSettingsElement = document.querySelector('#friend-requests-settings-screen');

if (friendRequestsSettingsElement) {
  ReactDOM.render(
    <FriendRequestsSettingsScreen />,
    friendRequestsSettingsElement
  );
}