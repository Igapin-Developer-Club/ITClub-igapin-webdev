import React from 'react';
import ReactDOM from 'react-dom';

import PasswordSettingsScreen from '../../component/settings/PasswordSettingsScreen';

const passwordSettingsElement = document.querySelector('#password-settings-screen');

if (passwordSettingsElement) {
  ReactDOM.render(
    <PasswordSettingsScreen />,
    passwordSettingsElement
  );
}