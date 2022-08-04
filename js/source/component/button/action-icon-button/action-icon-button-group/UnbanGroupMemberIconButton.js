import React from 'react';

import groupUtils from'../../../utils/group';

import ActionIconButton from '../ActionIconButton';

function UnbanGroupMemberIconButton(props) {
  const groupable = groupUtils(props.loggedUser, props.group, props.member);

  return (
    <ActionIconButton icon="ban"
                      type="accept"
                      title={vikinger_translation.unban_member}
                      action={groupable.unbanGroupMember}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { UnbanGroupMemberIconButton as default };