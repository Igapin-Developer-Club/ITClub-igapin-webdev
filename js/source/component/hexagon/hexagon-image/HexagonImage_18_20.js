import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonImage_18_20(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 18,
      height: 20,
      roundedCorners: true,
      roundedCornerRadius: 1,
      clip: true
    });
  }, []);

  return (
    <div className="user-avatar-content">
      <div ref={hexagonRef} className="hexagon-image-18-20" data-src={props.imageURL}></div>
    </div>
  );
}

export { HexagonImage_18_20 as default };