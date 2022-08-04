import React from 'react';

import IconSVG from '../icon/IconSVG';

function MessageBox(props) {
  let iconColor = 'secondary',
      iconType = 'info';

  if (props.success) {
    iconColor = 'primary';
    iconType = 'success';
  } else if (props.error) {
    iconColor = 'tertiary';
    iconType = 'error';
  } else if (props.warning) {
    iconColor = 'tertiary';
  }

  return (
    <div ref={props.forwardedRef} className={`message-box ${(props.confirm || props.continue) ? 'no-padding-bottom' : ''}`}>
      {/* MESSAGE BOX ICON WRAP */}
      <div className={`message-box-icon-wrap ${iconColor}`}>
        <IconSVG  icon={iconType}
                  modifiers="message-box-icon"
        />
      </div>
      {/* MESSAGE BOX ICON WRAP */}

      <p className="message-box-title">{props.data.title}</p>
      <p className="message-box-text">{props.data.text}</p>
      {
        props.confirm &&
          <div className="message-box-actions">
            <p className="message-box-action button white" onClick={props.onCancel}>{vikinger_translation.cancel}</p>
            <p className="message-box-action button secondary" onClick={props.onAccept}>{vikinger_translation.accept}</p>
          </div>
      }
      {
        props.continue &&
          <div className="message-box-actions">
            <p className="message-box-action button secondary" onClick={props.onContinue}>{vikinger_translation.continue}</p>
          </div>
      }
    </div>
  );
}

export { MessageBox as default };