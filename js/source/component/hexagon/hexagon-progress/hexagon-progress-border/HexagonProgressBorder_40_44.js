import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../../utils/plugins';

function HexagonProgressBorder_40_44(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 40,
      height: 44,
      lineWidth: 3,
      roundedCorners: true,
      roundedCornerRadius: 1,
      lineColor: vikinger_constants.colors['--color-progressbar-underline']
    });
  }, []);

  return (
    <div className="user-avatar-progress-border">
      <div ref={hexagonRef} className="hexagon-border-40-44"></div>
    </div>
  );
}

export { HexagonProgressBorder_40_44 as default };