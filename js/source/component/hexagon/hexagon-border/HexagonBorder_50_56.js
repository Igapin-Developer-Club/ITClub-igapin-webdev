import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonBorder_50_56(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 50,
      height: 56,
      roundedCorners: true,
      roundedCornerRadius: 2,
      fill: true,
      lineColor: vikinger_constants.colors['--color-box-background']
    });
  }, []);

  return (
    <div className="user-avatar-border">
      <div ref={hexagonRef} className="hexagon-50-56"></div>
    </div>
  );
}

export { HexagonBorder_50_56 as default };