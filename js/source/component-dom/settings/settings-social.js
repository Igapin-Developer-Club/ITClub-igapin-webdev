import React from 'react';
import ReactDOM from 'react-dom';

import SocialSettingsScreen from '../../component/settings/SocialSettingsScreen';

const socialSettingsElement = document.querySelector('#social-settings-screen');

if (socialSettingsElement) {
  ReactDOM.render(
    <SocialSettingsScreen />,
    socialSettingsElement
  );
}