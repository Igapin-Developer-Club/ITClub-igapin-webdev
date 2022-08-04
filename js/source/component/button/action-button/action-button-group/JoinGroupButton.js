import React from 'react';

import groupUtils from'../../../utils/group';

import ActionButton from '../ActionButton';

function JoinGroupButton(props) {
  const groupable = groupUtils(props.loggedUser, props.group);

  return (
    <ActionButton {...props}
                  action={groupable.joinGroup}
    />
  );
}

export { JoinGroupButton as default };