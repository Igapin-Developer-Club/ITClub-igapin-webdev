import React from 'react';
import ReactDOM from 'react-dom';

import SendGroupInvitationsSettingsScreen from '../../component/settings/SendGroupInvitationsSettingsScreen';

const sendGroupInvitationsSettingsElement = document.querySelector('#send-group-invitations-settings-screen');

if (sendGroupInvitationsSettingsElement) {
  ReactDOM.render(
    <SendGroupInvitationsSettingsScreen />,
    sendGroupInvitationsSettingsElement
  );
}