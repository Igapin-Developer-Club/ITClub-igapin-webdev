import React from 'react';

import groupUtils from'../../../utils/group';

import ActionIconButton from '../ActionIconButton';

function DemoteGroupMemberToModIconButton(props) {
  const groupable = groupUtils(props.loggedUser, props.group, props.member);

  return (
    <ActionIconButton icon="mod-shield"
                      type="decline"
                      title={vikinger_translation.demote_to_mod}
                      action={groupable.demoteGroupMemberToMod}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { DemoteGroupMemberToModIconButton as default };