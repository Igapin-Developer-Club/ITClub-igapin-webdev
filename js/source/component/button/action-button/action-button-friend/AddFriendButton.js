import React from 'react';

import friendUtils from '../../../utils/friend';

import ActionButton from '../ActionButton';

function AddFriendButton(props) {
  const friendable = friendUtils(props.loggedUser, props.userID);

  return (
    <ActionButton {...props}
                  action={friendable.addFriend}
    />
  );
}

export { AddFriendButton as default };