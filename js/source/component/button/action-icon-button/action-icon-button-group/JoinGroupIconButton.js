import React from 'react';

import groupUtils from'../../../utils/group';

import ActionIconButton from '../ActionIconButton';

function JoinGroupIconButton(props) {
  const groupable = groupUtils(props.loggedUser, props.group);

  return (
    <ActionIconButton icon="join-group"
                      type="accept"
                      title={vikinger_translation.join_group}
                      action={groupable.joinGroup}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { JoinGroupIconButton as default };