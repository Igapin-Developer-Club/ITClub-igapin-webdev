import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonImage_30_32(props) {
  const hexagonRef = useRef(null);
  const hexagon = useRef(false);

  useEffect(() => {
    hexagon.current = createHexagon({
      containerElement: hexagonRef.current,
      width: 30,
      height: 32,
      roundedCorners: true,
      roundedCornerRadius: 1,
      clip: true
    });
  }, []);

  useEffect(() => {
    if (hexagon.current) {
      // redraw hexagon
      hexagon.current.redrawImages();
    }
  }, [props.imageURL]);

  return (
    <div className="user-avatar-content">
      <div ref={hexagonRef} className="hexagon-image-30-32" data-src={props.imageURL}></div>
    </div>
  );
}

export { HexagonImage_30_32 as default };