import React from 'react';
import ReactDOM from 'react-dom';

import AccountInfoSettingsScreen from '../../component/settings/AccountInfoSettingsScreen';

const accountInfoSettingsElement = document.querySelector('#account-info-settings-screen');

if (accountInfoSettingsElement) {
  ReactDOM.render(
    <AccountInfoSettingsScreen />,
    accountInfoSettingsElement
  );
}