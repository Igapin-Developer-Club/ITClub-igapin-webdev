import React, { useRef } from 'react';

import Avatar from '../avatar/Avatar';

import GroupManagePopup from '../group/GroupManagePopup';

import TagSticker from '../tag/TagSticker';

function UserGroupManagePreview(props) {
  const groupManagePopupTriggerRef = useRef(null);

  return (
    <div className="user-preview small fixed-height-medium">
      {/* USER PREVIEW COVER */}
      <div className="user-preview-cover" style={{background: `url('${props.data.cover_image_url}') center center /  cover no-repeat`}}></div>
      {/* USER PREVIEW COVER */}
    
      {/* USER PREVIEW INFO */}
      <div className="user-preview-info">
        <TagSticker icon={props.data.status} />

        {/* USER SHORT DESCRIPTION */}
        <div className="user-short-description small">
          <Avatar data={props.data}
                  modifiers="user-short-description-avatar"
          />

          <p className="user-short-description-title small"><a href={props.data.link}>{props.data.name}</a></p>
          <p className="user-short-description-text regular">{props.descriptionText}</p>
        </div>
        {/* USER SHORT DESCRIPTION */}

        <p ref={groupManagePopupTriggerRef} className="button white full">{vikinger_translation.manage_group}</p>
      </div>
      {/* USER PREVIEW INFO */}

      <GroupManagePopup groupManagePopupTriggerRef={groupManagePopupTriggerRef}
                        data={props.data}
                        loggedUser={props.loggedUser}
                        groupPreviewDescription={props.descriptionText}
      />
    </div>
  );
}

export { UserGroupManagePreview as default };