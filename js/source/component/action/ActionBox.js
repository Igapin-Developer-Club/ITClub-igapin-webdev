import React, { useRef } from 'react';

import HexagonBorder_100_110 from '../hexagon/hexagon-border/HexagonBorder_100_110';

import IconSVG from '../icon/IconSVG';

import GroupManagePopup from '../group/GroupManagePopup';

function ActionBox(props) {
  const groupManagePopupTriggerRef = useRef(null);

  return (
    <div className="create-entity-box">
      <div className="create-entity-box-cover"></div>
  
      <div className="create-entity-box-avatar">
        <HexagonBorder_100_110 />
        <IconSVG icon="group" modifiers="create-entity-box-avatar-icon" />
      </div>
  
      <div className="create-entity-box-info">
        <p className="create-entity-box-title">{props.title}</p>
  
        <p className="create-entity-box-text">{props.text}</p>
  
        <p ref={groupManagePopupTriggerRef} className="button secondary full">{props.actionText}</p>
      </div>

      <GroupManagePopup groupManagePopupTriggerRef={groupManagePopupTriggerRef}
                        loggedUser={props.loggedUser}
                        groupPreviewDescription={props.text}
      />
    </div>
  );
}

export { ActionBox as default };