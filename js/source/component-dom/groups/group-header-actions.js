import React from 'react';
import ReactDOM from 'react-dom';

import GroupHeaderActions from '../../component/profile/GroupHeaderActions';

const groupHeaderActionsElement = document.querySelector('#group-header-actions');

if (groupHeaderActionsElement) {
  const groupID = Number.parseInt(groupHeaderActionsElement.getAttribute('data-groupid'), 10) || false;

  ReactDOM.render(
    <GroupHeaderActions groupID={groupID} />,
    groupHeaderActionsElement
  );
}