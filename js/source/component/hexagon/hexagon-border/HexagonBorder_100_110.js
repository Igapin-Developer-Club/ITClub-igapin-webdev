import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonBorder_100_110(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 100,
      height: 110,
      roundedCorners: true,
      fill: true,
      lineColor: vikinger_constants.colors['--color-box-background']
    });
  }, []);

  return (
    <div className="user-avatar-border">
      <div ref={hexagonRef} className="hexagon-100-110"></div>
    </div>
  );
}

export { HexagonBorder_100_110 as default };