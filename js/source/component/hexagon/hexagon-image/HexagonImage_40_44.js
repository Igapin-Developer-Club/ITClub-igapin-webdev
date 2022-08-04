import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonImage_40_44(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 40,
      height: 44,
      roundedCorners: true,
      roundedCornerRadius: 1,
      clip: true
    });
  }, []);

  return (
    <div className="user-avatar-content">
      <div ref={hexagonRef} className="hexagon-image-40-44" data-src={props.imageURL}></div>
    </div>
  );
}

export { HexagonImage_40_44 as default };