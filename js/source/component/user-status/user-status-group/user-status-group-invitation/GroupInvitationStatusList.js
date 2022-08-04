import React from 'react';

import GroupInvitationStatus from './GroupInvitationStatus';

function GroupInvitationStatusList(props) {
  const renderedGroupInvitationStatusList = props.data.map((invitation) => {
    return (
      <GroupInvitationStatus  key={invitation.id}
                              data={invitation}
                              loggedUser={props.loggedUser}
                              onActionComplete={props.onActionComplete}
      />
    );
  });

  return (
    <div className="user-status-list">
      { renderedGroupInvitationStatusList }
    </div>
  );
}

export { GroupInvitationStatusList as default };