import React, { useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import { createTooltip } from '../../utils/plugins';

function TagSticker(props) {
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
          className={`tag-sticker ${props.modifiers || ''}`}
          {...(props.title ? {'data-title': props.title} : {})}
    >
    {
      props.icon &&
        <IconSVG  icon={props.icon}
                  modifiers={`tag-sticker-icon ${props.iconModifiers || ''} ${props.text ? 'spaced' : ''}`}
        />
    }
    {props.text}
    </div>
  );
}

export { TagSticker as default };