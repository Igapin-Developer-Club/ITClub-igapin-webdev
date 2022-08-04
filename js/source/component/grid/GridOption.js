import React, { useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import { createTooltip } from '../../utils/plugins';

function GridOption(props) {
  const tooltipRef = useRef(null);

  useEffect(() => {
    createTooltip({
      containerElement: tooltipRef.current,
      offset: 8,
      direction: 'top',
      animation: {
        type: 'translate-out-fade'
      }
    });
  }, []);

  return (
    <div  ref={tooltipRef}
          className={`view-action ${props.active ? 'active' : ''}`}
          data-title={vikinger_translation.grid_filter[props.type]}
          onClick={props.onClick}
    >
      <IconSVG  icon={`${props.type}-grid-view`}
                modifiers="view-action-icon"
      />
    </div>
  );
}

export { GridOption as default };

