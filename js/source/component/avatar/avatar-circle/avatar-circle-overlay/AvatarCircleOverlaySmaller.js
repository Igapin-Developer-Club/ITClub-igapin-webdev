import React from 'react';

function AvatarCircleOverlaySmaller(props) {
  const noBorderClasses = props.noBorder ? 'no-border' : '';
  const Element = props.noLink || !vikinger_constants.plugin_active.buddypress ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar-circle smaller ${noBorderClasses} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.link } : {})}
    >
      {/* USER AVATAR CIRCLE IMAGE */}
      <img className="user-avatar-circle-image" src={props.data.avatar_url} alt="user-avatar" />
      {/* USER AVATAR CIRCLE IMAGE */}

      {/* USER AVATAR CIRCLE OVERLAY */}
      <div className="user-avatar-circle-overlay">
        {/* USER AVATAR CIRCLE OVERLAY TEXT */}
        <p className="user-avatar-circle-overlay-text">+{props.count}</p>
        {/* USER AVATAR CIRCLE OVERLAY TEXT */}
      </div>
      {/* USER AVATAR CIRCLE OVERLAY */}
    </Element>
  );
}

export { AvatarCircleOverlaySmaller as default };