import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonBorder_120_130(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 120,
      height: 130,
      roundedCorners: true,
      fill: true,
      lineColor: vikinger_constants.colors['--color-box-background']
    });
  }, []);

  return (
    <div className="user-avatar-border">
      <div ref={hexagonRef} className="hexagon-120-130"></div>
    </div>
  );
}

export { HexagonBorder_120_130 as default };