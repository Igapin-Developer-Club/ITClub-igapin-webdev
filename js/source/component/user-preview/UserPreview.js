import React from 'react';

import Avatar from '../avatar/Avatar';

import IconSVG from '../icon/IconSVG';

function UserPreview(props) {
  return (
    <div className="user-preview small fixed-height">
      {/* USER PREVIEW COVER */}
      <div className="user-preview-cover" style={{background: `url('${props.data.cover_url}') center center /  cover no-repeat`}}>
      {
        props.actionableCover &&
          <div className="uploadable-item-remove-button" onClick={props.onCoverActionClick}>
            <IconSVG  icon="cross"
                      modifiers="uploadable-item-remove-button-icon"
            />
          </div>
      }
      </div>
      {/* USER PREVIEW COVER */}
    
      {/* USER PREVIEW INFO */}
      <div className="user-preview-info">
      {
        props.actionableAvatar &&
          <div className="uploadable-item-remove-button" onClick={props.onAvatarActionClick}>
            <IconSVG  icon="cross"
                      modifiers="uploadable-item-remove-button-icon"
            />
          </div>
      }
        <div className="user-short-description small">
          <Avatar data={props.data}
                  modifiers="user-short-description-avatar"
                  noLink
          />
        </div>
      </div>
      {/* USER PREVIEW INFO */}
    </div>
  );
}

export { UserPreview as default };