import React from 'react';

import UserStatus from './UserStatus';

function UserStatusList(props) {
  const renderedUserStatusList = props.data.map((user) => {
    return (
      <UserStatus key={user.id}
                  data={user}
                  showVerifiedBadge={props.showVerifiedBadge}
      />
    );
  });

  return (
    <div className="user-status-list">
      { renderedUserStatusList }
    </div>
  );
}

export { UserStatusList as default };