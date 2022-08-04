import React from 'react';

import ActionButton from '../ActionButton';

import * as groupMemberRouter from '../../../../router/group-member/group-member-router';

function RejectGroupMembershipButton(props) {
  const rejectGroupMembership = () => {
    return groupMemberRouter.removeGroupMembership(props.data.id);
  };

  return (
    <ActionButton {...props}
                  action={rejectGroupMembership}
    />
  );
}

export { RejectGroupMembershipButton as default };