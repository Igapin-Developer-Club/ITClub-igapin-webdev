import React, { useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import { createTooltip } from '../../utils/plugins';

function Button(props) {
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
          className={`button ${props.modifiers || ''} ${props.icon && !props.text ? 'with-only-icon' : ''}`}
          {...(props.title ? {'data-title': props.title} : {})}
          onClick={props.onClick}
    >
      {
        !props.loading && props.icon &&
          <IconSVG modifiers="button-icon" icon={props.icon} />
      }
      {props.text}
      {
        props.loading &&
          <LoaderSpinnerSmall />
      }
    </div>
  );
}

export { Button as default };