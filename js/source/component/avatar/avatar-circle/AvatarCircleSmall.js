import React from 'react';

import CircleProgressBar from '../../progress/CircleProgressBar';

function AvatarCircleSmall(props) {
  const noBorderClasses = props.noBorder ? 'no-border' : '';
  const Element = props.noLink || !vikinger_constants.plugin_active.buddypress ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar-circle small ${!props.data.rank ? 'no-stats' : ''} ${noBorderClasses} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
      {/* USER AVATAR CIRCLE IMAGE */}
      <img className="user-avatar-circle-image" src={props.data.avatar_url} alt="user-avatar" />
      {/* USER AVATAR CIRCLE IMAGE */}

    {
      props.data.rank &&
        <React.Fragment>
          {/* USER AVATAR CIRCLE PROGRESS */}
          <CircleProgressBar size="small" fillAmount={props.data.rank.current / props.data.rank.total} />
          {/* USER AVATAR CIRCLE PROGRESS */}

          {/* USER AVATAR CIRCLE BADGE */}
          <div className="user-avatar-circle-badge">
            {/* USER AVATAR CIRCLE BADGE CONTENT */}
            <div className="user-avatar-circle-badge-content">
              {/* USER AVATAR CIRCLE BADGE CONTENT TEXT */}
              <p className="user-avatar-circle-badge-content-text">{props.data.rank.current}</p>
              {/* USER AVATAR CIRCLE BADGE CONTENT TEXT */}
            </div>
            {/* USER AVATAR CIRCLE BADGE CONTENT */}
          </div>
          {/* USER AVATAR CIRCLE BADGE */}
        </React.Fragment>
    }
    </Element>
  );
}

export { AvatarCircleSmall as default };