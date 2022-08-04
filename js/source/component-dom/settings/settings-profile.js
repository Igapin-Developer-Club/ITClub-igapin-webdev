import React from 'react';
import ReactDOM from 'react-dom';

import ProfileSettingsScreen from '../../component/settings/ProfileSettingsScreen';

const profileSettingsElement = document.querySelector('#profile-settings-screen');

if (profileSettingsElement) {
  ReactDOM.render(
    <ProfileSettingsScreen />,
    profileSettingsElement
  );
}