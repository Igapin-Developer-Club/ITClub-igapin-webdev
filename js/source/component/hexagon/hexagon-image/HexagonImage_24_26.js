import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonImage_24_26(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 24,
      height: 26,
      roundedCorners: true,
      roundedCornerRadius: 1,
      clip: true
    });
  }, []);

  return (
    <div className="user-avatar-content">
      <div ref={hexagonRef} className="hexagon-image-24-26" data-src={props.imageURL}></div>
    </div>
  );
}

export { HexagonImage_24_26 as default };