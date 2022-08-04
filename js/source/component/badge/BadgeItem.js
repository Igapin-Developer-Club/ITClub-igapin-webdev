import React, { useRef, useEffect } from 'react';

import { createTooltip } from '../../utils/plugins';

function BadgeItem(props) {
  const tooltipRef = useRef(null);

  useEffect(() => {
    createTooltip({
      containerElement: tooltipRef.current,
      offset: 4,
      direction: 'top',
      animation: {
        type: 'translate-out-fade'
      }
    });
  }, [props.data.name]);

  return (
    <div ref={tooltipRef} className="badge-item" data-title={props.data.name}>
      <img src={props.data.image_url} alt={props.data.slug} />
    </div>
  );
}

export { BadgeItem as default };