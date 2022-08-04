import React from 'react';

import groupUtils from'../../../utils/group';

import ActionIconButton from '../ActionIconButton';

function LeaveGroupIconButton(props) {
  const groupable = groupUtils(props.loggedUser, props.group);

  return (
    <ActionIconButton icon="leave-group"
                      type="decline"
                      title={vikinger_translation.leave_group}
                      action={groupable.leaveGroup}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { LeaveGroupIconButton as default };