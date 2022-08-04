import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonBadge_26_28(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 26,
      height: 28,
      roundedCorners: true,
      roundedCornerRadius: 1,
      fill: true,
      lineColor: vikinger_constants.colors['--color-avatar-rank-hexagon']
    });
  }, []);

  return (
    <div className="user-avatar-badge-content">
      <div ref={hexagonRef} className="hexagon-dark-26-28"></div>
    </div>
  );
}

export { HexagonBadge_26_28 as default };