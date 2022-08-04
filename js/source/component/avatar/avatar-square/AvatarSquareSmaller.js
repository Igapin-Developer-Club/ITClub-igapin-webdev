import React from 'react';

function AvatarSquareSmaller(props) {
  const noStats = typeof props.data.rank === 'undefined';
  const noBorderClasses = props.noBorder ? 'no-border' : '';
  const Element = props.noLink || !vikinger_constants.plugin_active.buddypress ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar-circle user-avatar-circle-flat smaller ${noStats ? 'no-stats' : ''} ${noBorderClasses} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
      {/* USER AVATAR CIRCLE IMAGE */}
      <img className="user-avatar-circle-image" src={props.data.avatar_url} alt="user-avatar" />
      {/* USER AVATAR CIRCLE IMAGE */}
    </Element>
  );
}

export { AvatarSquareSmaller as default };