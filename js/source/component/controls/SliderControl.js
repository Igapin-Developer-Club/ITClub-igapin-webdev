import React from 'react';

import IconSVG from '../icon/IconSVG';

function SliderControl(props) {
  return (
    <div className={`slider-control ${props.direction} ${props.disabled ? 'disabled' : ''}`} onClick={props.controlClicked}>
      <IconSVG  icon="small-arrow"
                modifiers="slider-control-icon"
      />

    {
      props.double &&
        <IconSVG  icon="small-arrow"
                  modifiers="slider-control-icon"
        />
    }
    </div>
  );
}

export { SliderControl as default };