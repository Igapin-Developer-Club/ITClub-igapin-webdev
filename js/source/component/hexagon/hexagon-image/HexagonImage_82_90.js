import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonImage_82_90(props) {
  const hexagonRef = useRef(null);
  const hexagon = useRef(false);

  useEffect(() => {
    hexagon.current = createHexagon({
      containerElement: hexagonRef.current,
      width: 82,
      height: 90,
      roundedCorners: true,
      roundedCornerRadius: 3,
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
      <div ref={hexagonRef} className="hexagon-image-82-90" data-src={props.imageURL}></div>
    </div>
  );
}

export { HexagonImage_82_90 as default };