import React from 'react';

import friendUtils from '../../../utils/friend';

import ActionIconButton from '../ActionIconButton';

function RejectFriendRequestIconButton(props) {
  const friendable = friendUtils(props.loggedUser, props.userID);

  return (
    <ActionIconButton icon="remove-friend"
                      type="decline"
                      title={vikinger_translation.reject_friend}
                      action={friendable.rejectFriendRequest}
                      onActionStart={props.onActionStart}
                      onActionComplete={props.onActionComplete}
                      locked={props.locked}
    />
  );
}

export { RejectFriendRequestIconButton as default };