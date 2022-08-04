import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonImage_68_74(props) {
  const hexagonRef = useRef(null);
  const hexagon = useRef(false);

  useEffect(() => {
    hexagon.current = createHexagon({
      containerElement: hexagonRef.current,
      width: 68,
      height: 74,
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
      <div ref={hexagonRef} className="hexagon-image-68-74" data-src={props.imageURL}></div>
    </div>
  );
}

export { HexagonImage_68_74 as default };