import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonProgress_84_92(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 84,
      height: 92,
      lineWidth: 5,
      roundedCorners: true,
      roundedCornerRadius: 3,
      gradient: {
        colors: [vikinger_constants.colors['--color-progressbar-line-gradient-end'], vikinger_constants.colors['--color-progressbar-line-gradient-start']]
      },
      scale: {
        start: 0,
        end: props.data.total,
        stop: props.data.current
      }
    });
  }, []);

  return (
    <div className="user-avatar-progress">
      <div ref={hexagonRef} className="hexagon-progress-84-92"></div>
    </div>
  );
}

export { HexagonProgress_84_92 as default };