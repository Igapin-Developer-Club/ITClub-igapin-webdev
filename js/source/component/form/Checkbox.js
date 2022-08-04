import React from 'react';

import IconSVG from '../icon/IconSVG';

function Checkbox(props) {
  return (
    <div className={`checkbox-box ${props.modifiers || ''} ${props.active ? 'active' : ''}`} onClick={props.toggleActive}>
      <IconSVG icon="cross" />
    </div>
  );
}

export { Checkbox as default };