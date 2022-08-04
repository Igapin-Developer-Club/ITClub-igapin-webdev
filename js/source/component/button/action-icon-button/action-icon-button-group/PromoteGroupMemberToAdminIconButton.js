import React from 'react';

import groupUtils from'../../../utils/group';

import ActionIconButton from '../ActionIconButton';

function PromoteGroupMemberToAdminIconButton(props) {
  const groupable = groupUtils(props.loggedUser, props.group, props.member);

  return (
    <ActionIconButton icon="admin-crown"
                      type="accept"
                      title={vikinger_translation.promote_to_admin}
                      action={groupable.promoteGroupMemberToAdmin}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { PromoteGroupMemberToAdminIconButton as default };