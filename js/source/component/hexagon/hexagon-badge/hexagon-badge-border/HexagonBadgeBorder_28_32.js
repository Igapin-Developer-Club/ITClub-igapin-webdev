import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../../utils/plugins';

function HexagonBadgeBorder_28_32(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 28,
      height: 32,
      roundedCorners: true,
      roundedCornerRadius: 1,
      fill: true,
      lineColor: vikinger_constants.colors['--color-box-background']
    });
  }, []);

  return (
    <div className="user-avatar-badge-border">
      <div ref={hexagonRef} className="hexagon-28-32"></div>
    </div>
  );
}

export { HexagonBadgeBorder_28_32 as default };