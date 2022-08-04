import React from 'react';

import friendUtils from '../../../utils/friend';

import ActionIconButton from '../ActionIconButton';

function AddFriendIconButton(props) {
  const friendable = friendUtils(props.loggedUser, props.userID);

  return (
    <ActionIconButton icon="add-friend"
                      type="accept"
                      title={vikinger_translation.add_friend}
                      action={friendable.addFriend}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { AddFriendIconButton as default };