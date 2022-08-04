import React from 'react';
import ReactDOM from 'react-dom';

import ManageGroupsSettingsScreen from '../../component/settings/ManageGroupsSettingsScreen';

const manageGroupsSettingsElement = document.querySelector('#manage-groups-settings-screen');

if (manageGroupsSettingsElement) {
  ReactDOM.render(
    <ManageGroupsSettingsScreen />,
    manageGroupsSettingsElement
  );
}