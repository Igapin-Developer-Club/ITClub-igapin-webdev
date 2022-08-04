import React from 'react';

import friendUtils from '../../../utils/friend';

import ActionButton from '../ActionButton';

function RejectFriendRequestButton(props) {
  const friendable = friendUtils(props.loggedUser, props.userID);

  return (
    <ActionButton {...props}
                  action={friendable.rejectFriendRequest}
    />
  );
}

export { RejectFriendRequestButton as default };