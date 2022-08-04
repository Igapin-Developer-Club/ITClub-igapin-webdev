import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonImage_100_110(props) {
  const hexagonRef = useRef(null);

  useEffect(() => {
    createHexagon({
      containerElement: hexagonRef.current,
      width: 100,
      height: 110,
      roundedCorners: true,
      clip: true
    });
  }, []);

  return (
    <div className="user-avatar-content">
      <div ref={hexagonRef} className="hexagon-image-100-110" data-src={props.imageURL}></div>
    </div>
  );
}

export { HexagonImage_100_110 as default };