import React from 'react';
import ReactDOM from 'react-dom';

import NotificationsSettingsScreen from '../../component/settings/NotificationsSettingsScreen';

const notificationsSettingsElement = document.querySelector('#notifications-settings-screen');

if (notificationsSettingsElement) {
  ReactDOM.render(
    <NotificationsSettingsScreen />,
    notificationsSettingsElement
  );
}