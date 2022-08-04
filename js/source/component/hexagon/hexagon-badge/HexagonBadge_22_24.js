import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonBadge_22_24(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 22,
      height: 24,
      roundedCorners: true,
      roundedCornerRadius: 1,
      fill: true,
      lineColor: vikinger_constants.colors['--color-avatar-rank-hexagon']
    });
  }, []);

  return (
    <div className="user-avatar-badge-content">
      <div ref={hexagonRef} className="hexagon-dark-22-24"></div>
    </div>
  );
}

export { HexagonBadge_22_24 as default };