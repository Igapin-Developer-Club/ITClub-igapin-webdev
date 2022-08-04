import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../../utils/plugins';

function HexagonProgressBorder_84_92(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 84,
      height: 92,
      lineWidth: 5,
      roundedCorners: true,
      roundedCornerRadius: 3,
      lineColor: vikinger_constants.colors['--color-progressbar-underline']
    });
  }, []);

  return (
    <div className="user-avatar-progress-border">
      <div ref={hexagonRef} className="hexagon-border-84-92"></div>
    </div>
  );
}

export { HexagonProgressBorder_84_92 as default };