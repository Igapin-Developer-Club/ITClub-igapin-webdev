import React from 'react';

import ActionButton from '../ActionButton';

import * as groupMemberRouter from '../../../../router/group-member/group-member-router';

function CancelGroupMembershipButton(props) {
  const removeGroupMembership = () => {
    return groupMemberRouter.removeGroupMembership(props.data.id);
  };

  return (
    <ActionButton {...props}
                  action={removeGroupMembership}
    />
  );
}

export { CancelGroupMembershipButton as default };