import React from 'react';

import IconSVG from '../icon/IconSVG';

function Notification(props) {
  return (
    <div className="notification-section animate-slide-down">
      <IconSVG  icon="no-results"
                modifiers="notification-section-icon"
      />

      <p className="notification-section-title">{props.title}</p>
      <p className="notification-section-text">{props.text}</p>
    </div>
  );
}

export { Notification as default };