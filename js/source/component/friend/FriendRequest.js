import React from 'react';

import FriendStatus from '../user-status/user-status-friend/FriendStatus';

function FriendRequest(props) {
  return (
    <div className="notification-box">
      <FriendStatus data={props.data}
                    modifiers="request"
                    loggedUser={props.loggedUser}
                    onActionComplete={props.onActionComplete}
                    allowReject={true}
      />
    </div>
  );
}

export { FriendRequest as default };