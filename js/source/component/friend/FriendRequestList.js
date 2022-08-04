import React from 'react';

import FriendRequest from './FriendRequest';

function FriendRequestList(props) {
  return (
    <div className="notification-box-list">
    {
      props.data.map((friendRequest) => {
        return (
          <FriendRequest  key={friendRequest.id}
                          data={friendRequest.user}
                          loggedUser={props.loggedUser}
                          onActionComplete={props.onActionComplete}
          />
        );
      })
    }
    </div>
  );
}

export { FriendRequestList as default };