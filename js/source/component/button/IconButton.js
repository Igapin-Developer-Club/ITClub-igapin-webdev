import React, { useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import { createTooltip } from '../../utils/plugins';

function IconButton(props) {
  const tooltipRef = useRef(null);

  useEffect(() => {
    if (props.title) {
      createTooltip({
        containerElement: tooltipRef.current,
        offset: 4,
        direction: 'top',
        animation: {
          type: 'translate-out-fade'
        }
      });
    }
  }, [props.title]);

  return (
    <div  ref={tooltipRef}
          className={`action-request ${props.type}`}
          {...(props.title ? {'data-title': props.title} : {})}
          onClick={props.onClick}
    >
      {
        !props.loading &&
          <IconSVG  icon={props.icon}
                    modifiers="action-request-icon"
          />
      }
      {
        props.loading &&
          <LoaderSpinnerSmall />
      }
    </div>
  );
}

export { IconButton as default };