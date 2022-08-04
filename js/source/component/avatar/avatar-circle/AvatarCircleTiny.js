import React from 'react';

function AvatarCircleTiny(props) {
  const noBorderClasses = props.noBorder ? 'no-border' : '';
  const Element = props.noLink || !vikinger_constants.plugin_active.buddypress ? 'div' : 'a';
    
  return (
    <Element  className={`user-avatar-circle tiny ${noBorderClasses} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
      {/* USER AVATAR CIRCLE IMAGE */}
      <img className="user-avatar-circle-image" src={props.data.avatar_url} alt="user-avatar" />
      {/* USER AVATAR CIRCLE IMAGE */}
    </Element>
  );
}

export { AvatarCircleTiny as default };