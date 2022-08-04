import React from 'react';

import SelectableUserStatus from './SelectableUserStatus';

function SelectableUserStatusList(props) {
  const renderedSelectableUserStatusList = props.data.map((user, i) => {
    return (
      <SelectableUserStatus key={user.id}
                            data={user}
                            loggedUser={props.loggedUser}
                            selected={props.selectedItems[i]}
                            toggleSelectableActive={() => {props.toggleSelectableActive(i);}}
      />
    );
  });

  return (
    <div className="user-status-list user-status-list-3-cols">
      { renderedSelectableUserStatusList }
    </div>
  );
}

export { SelectableUserStatusList as default };