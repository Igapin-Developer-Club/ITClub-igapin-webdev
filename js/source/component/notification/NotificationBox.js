import React from 'react';

import NotificationStatus from '../user-status/user-status-notification/NotificationStatus';

function NotificationBox(props) {
  return (
    <div className={`notification-box animate-slide-down ${props.data.is_new ? 'unread' : ''}`}>
      <NotificationStatus data={props.data}
                          selectable={props.selectable}
                          selected={props.selected}
                          toggleSelectableActive={props.toggleSelectableActive}
      />
    </div>
  );
}

export { NotificationBox as default };