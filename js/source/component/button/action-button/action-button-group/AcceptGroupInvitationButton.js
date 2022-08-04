import React from 'react';

import ActionButton from '../ActionButton';

import * as groupMemberRouter from '../../../../router/group-member/group-member-router';

function AcceptGroupInvitationButton(props) {
  const acceptGroupInvitation = () => {
    return groupMemberRouter.acceptGroupInvitation(props.data.id);
  };

  return (
    <ActionButton {...props}
                  action={acceptGroupInvitation}
    />
  );
}

export { AcceptGroupInvitationButton as default };