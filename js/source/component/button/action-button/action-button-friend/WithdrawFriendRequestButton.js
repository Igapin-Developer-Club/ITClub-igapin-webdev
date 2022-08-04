import React from 'react';

import friendUtils from '../../../utils/friend';

import ActionButton from '../ActionButton';

function WithdrawFriendRequestButton(props) {
  const friendable = friendUtils(props.loggedUser, props.userID);

  return (
    <ActionButton {...props}
                  action={friendable.withdrawFriendRequest}
    />
  );
}

export { WithdrawFriendRequestButton as default };