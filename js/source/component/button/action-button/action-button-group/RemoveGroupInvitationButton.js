import React from 'react';

import ActionButton from '../ActionButton';

import * as groupMemberRouter from '../../../../router/group-member/group-member-router';

function RemoveGroupInvitationButton(props) {
  const removeGroupInvitation = () => {
    return groupMemberRouter.removeGroupInvitation(props.data.id);
  };

  return (
    <ActionButton {...props}
                  action={removeGroupInvitation}
    />
  );
}

export { RemoveGroupInvitationButton as default };