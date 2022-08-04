import React from 'react';

import Avatar from '../avatar/Avatar';

import TagSticker from '../tag/TagSticker';

function UserGroupPreview(props) {
  return (
    <div className="user-preview small">
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
                  noLink
          />

          <p className="user-short-description-title small">{props.data.name}</p>
          <p className="user-short-description-text regular">{props.descriptionText}</p>
        </div>
        {/* USER SHORT DESCRIPTION */}
      </div>
      {/* USER PREVIEW INFO */}
    </div>
  );
}

export { UserGroupPreview as default };