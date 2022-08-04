import React from 'react';
import ReactDOM from 'react-dom';

import HeaderNotifications from '../../component/header/HeaderNotifications';

const headerNotificationsElement = document.querySelector('#header-notifications');

if (headerNotificationsElement) {
  ReactDOM.render(
    <HeaderNotifications />,
    headerNotificationsElement
  );
}