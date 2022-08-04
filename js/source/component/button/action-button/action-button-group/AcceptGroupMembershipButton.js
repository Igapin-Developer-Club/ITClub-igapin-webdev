import React from 'react';

import ActionButton from '../ActionButton';

import * as groupMemberRouter from '../../../../router/group-member/group-member-router';

function AcceptGroupMembershipButton(props) {
  const acceptGroupMembership = () => {
    return groupMemberRouter.acceptGroupMembership(props.data.id);
  };

  return (
    <ActionButton {...props}
                  action={acceptGroupMembership}
    />
  );
}

export { AcceptGroupMembershipButton as default };