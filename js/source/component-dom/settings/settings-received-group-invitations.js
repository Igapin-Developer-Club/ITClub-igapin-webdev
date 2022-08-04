import React from 'react';
import ReactDOM from 'react-dom';

import ReceivedGroupInvitationsSettingsScreen from '../../component/settings/ReceivedGroupInvitationsSettingsScreen';

const receivedGroupInvitationsSettingsElement = document.querySelector('#received-group-invitations-settings-screen');

if (receivedGroupInvitationsSettingsElement) {
  ReactDOM.render(
    <ReceivedGroupInvitationsSettingsScreen />,
    receivedGroupInvitationsSettingsElement
  );
}