import React from 'react';
import ReactDOM from 'react-dom';

import EmailSettingsScreen from '../../component/settings/EmailSettingsScreen';

const emailSettingsElement = document.querySelector('#email-settings-screen');

if (emailSettingsElement) {
  ReactDOM.render(
    <EmailSettingsScreen />,
    emailSettingsElement
  );
}