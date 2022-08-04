import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonProgress_100_110(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 100,
      height: 110,
      lineWidth: 6,
      roundedCorners: true,
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
      <div ref={hexagonRef} className="hexagon-progress-100-110"></div>
    </div>
  );
}

export { HexagonProgress_100_110 as default };