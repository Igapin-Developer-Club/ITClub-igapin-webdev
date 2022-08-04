import React from 'react';

import groupUtils from'../../../utils/group';

import ActionIconButton from '../ActionIconButton';

function BanGroupMemberIconButton(props) {
  const groupable = groupUtils(props.loggedUser, props.group, props.member);

  return (
    <ActionIconButton icon="ban"
                      type="decline"
                      title={vikinger_translation.ban_member}
                      action={groupable.banGroupMember}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { BanGroupMemberIconButton as default };