import React, { useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import { createTooltip } from '../../utils/plugins';

function ButtonLink(props) {
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
    <a  ref={tooltipRef}
        className={`button ${props.modifiers || ''} ${props.icon && !props.text ? 'with-only-icon' : ''}`}
        {...(props.title ? {'data-title': props.title} : {})}
        href={props.link}
    >
      {
        props.icon &&
          <IconSVG modifiers="button-icon" icon={props.icon} />
      }
      {props.text}
    </a>
  );
}

export { ButtonLink as default };