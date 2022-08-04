import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../../utils/plugins';

function HexagonBadgeBorder_32_36(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 32,
      height: 36,
      roundedCorners: true,
      roundedCornerRadius: 1,
      fill: true,
      lineColor: vikinger_constants.colors['--color-box-background']
    });
  }, []);

  return (
    <div className="user-avatar-badge-border">
      <div ref={hexagonRef} className="hexagon-32-36"></div>
    </div>
  );
}

export { HexagonBadgeBorder_32_36 as default };