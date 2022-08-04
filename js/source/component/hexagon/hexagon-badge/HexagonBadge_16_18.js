import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonBadge_16_18(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 16,
      height: 18,
      roundedCorners: true,
      roundedCornerRadius: 1,
      fill: true,
      lineColor: vikinger_constants.colors['--color-avatar-rank-hexagon']
    });
  }, []);

  return (
    <div className="user-avatar-badge-content">
      <div ref={hexagonRef} className="hexagon-dark-16-18"></div>
    </div>
  );
}

export { HexagonBadge_16_18 as default };