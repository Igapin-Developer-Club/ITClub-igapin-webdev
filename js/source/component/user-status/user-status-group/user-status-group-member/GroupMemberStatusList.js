import React from 'react';

import GroupMemberStatus from './GroupMemberStatus';

function GroupMemberStatusList(props) {
  const renderedGroupMemberStatusList = props.data.map((user) => {
    return (
      <GroupMemberStatus  key={user.id}
                          data={user}
                          group={props.group}
                          modifiers={props.modifiers}
                          loggedUser={props.loggedUser}
                          onActionComplete={props.onActionComplete}
      />
    );
  });

  return (
    <div className="user-status-list">
      { renderedGroupMemberStatusList }
    </div>
  );
}

export { GroupMemberStatusList as default };