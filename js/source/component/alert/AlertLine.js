import React from 'react';

import IconSVG from '../icon/IconSVG';

function AlertLine(props) {
  return (
    <div className={`alert-line alert-line-${props.type}`}>
      <IconSVG  icon={props.type}
                modifiers="alert-line-icon"
      />
      <p className="alert-line-text"><span className="bold">{props.title}</span> {props.text}</p>
    </div>
  );
}

export { AlertLine as default };