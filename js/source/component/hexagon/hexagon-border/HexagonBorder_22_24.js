import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonBorder_22_24(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 22,
      height: 24,
      roundedCorners: true,
      roundedCornerRadius: 1,
      fill: true,
      lineColor: vikinger_constants.colors['--color-box-background']
    });
  }, []);

  return (
    <div className="user-avatar-border">
      <div ref={hexagonRef} className="hexagon-22-24"></div>
    </div>
  );
}

export { HexagonBorder_22_24 as default };