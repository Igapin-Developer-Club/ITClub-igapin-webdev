import React from 'react';

import friendUtils from '../../../utils/friend';

import ActionIconButton from '../ActionIconButton';

function WithdrawFriendRequestIconButton(props) {
  const friendable = friendUtils(props.loggedUser, props.userID);

  return (
    <ActionIconButton icon="remove-friend"
                      type="decline"
                      title={vikinger_translation.withdraw_friend}
                      action={friendable.withdrawFriendRequest}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { WithdrawFriendRequestIconButton as default };