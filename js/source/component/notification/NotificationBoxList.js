import React from 'react';

import NotificationBox from './NotificationBox';

function NotificationBoxList(props) {
  const renderedNotificationBoxList = props.data.map((notification, i) => {
    return (
      <NotificationBox  key={notification.id}
                        data={notification}
                        selectable={props.selectable}
                        selected={props.selectedItems[i]}
                        toggleSelectableActive={() => {props.toggleSelectableActive(i);}}
      />
    );
  });

  return (
    <div className="notification-box-list">
      { renderedNotificationBoxList }
    </div>
  );
}

export { NotificationBoxList as default };