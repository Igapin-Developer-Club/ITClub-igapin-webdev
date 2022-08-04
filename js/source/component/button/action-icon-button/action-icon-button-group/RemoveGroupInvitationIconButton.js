import React from 'react';

import ActionIconButton from '../ActionIconButton';

import * as groupMemberRouter from '../../../../router/group-member/group-member-router';

function RemoveGroupInvitationIconButton(props) {
  const removeGroupInvitation = () => {
    return groupMemberRouter.removeGroupInvitation(props.data.id);
  };

  return (
    <ActionIconButton icon="remove-user"
                      type="decline"
                      title={vikinger_translation.remove_invitation}
                      action={removeGroupInvitation}
                      onActionComplete={props.onActionComplete}
    />
  );
}

export { RemoveGroupInvitationIconButton as default };