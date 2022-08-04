import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../../utils/plugins';

function HexagonProgressBorder_100_110(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 100,
      height: 110,
      lineWidth: 6,
      roundedCorners: true,
      lineColor: vikinger_constants.colors['--color-progressbar-underline']
    });
  }, []);

  return (
    <div className="user-avatar-progress-border">
      <div ref={hexagonRef} className="hexagon-border-100-110"></div>
    </div>
  );
}

export { HexagonProgressBorder_100_110 as default };