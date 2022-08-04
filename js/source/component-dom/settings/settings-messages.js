import React from 'react';
import ReactDOM from 'react-dom';

import MessagesSettingsScreen from '../../component/settings/MessagesSettingsScreen';

const messagesSettingsElement = document.querySelector('#messages-settings-screen');

if (messagesSettingsElement) {
  const userID = Number.parseInt(messagesSettingsElement.getAttribute('data-userid'), 10) || false,
        messageID = Number.parseInt(messagesSettingsElement.getAttribute('data-messageid'), 10) || false;

  ReactDOM.render(
    <MessagesSettingsScreen userID={userID}
                            messageID={messageID}
    />,
    messagesSettingsElement
  );
}