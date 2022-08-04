import React, { useRef, useEffect } from 'react';

import { hexaToRGB } from '../../../utils/core';
import { createHexagon } from '../../../utils/plugins';

function HexagonOverlay_30_32(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 30,
      height: 32,
      roundedCorners: true,
      roundedCornerRadius: 1,
      lineColor: hexaToRGB(vikinger_constants.colors['--color-secondary'], '.9'),
      fill: true
    });
  }, []);

  return (
    <div className="user-avatar-overlay">
      <div ref={hexagonRef} className="hexagon-overlay-30-32"></div>
    </div>
  );
}

export { HexagonOverlay_30_32 as default };