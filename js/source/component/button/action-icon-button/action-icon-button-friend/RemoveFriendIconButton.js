import React from 'react';

import friendUtils from '../../../utils/friend';

import ActionIconButton from '../ActionIconButton';

function RemoveFriendIconButton(props) {
  const friendable = friendUtils(props.loggedUser, props.userID);

  return (
    <ActionIconButton icon="remove-friend"
                      type="decline"
                      title={vikinger_translation.remove_friend}
                      action={friendable.removeFriend}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { RemoveFriendIconButton as default };