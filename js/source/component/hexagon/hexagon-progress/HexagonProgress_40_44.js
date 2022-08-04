import React, { useRef, useEffect } from 'react';

import { createHexagon } from '../../../utils/plugins';

function HexagonProgress_40_44(props) {
  const hexagonRef = useRef(null);
  const hexagon = useRef(false);

  useEffect(() => {
    hexagon.current = createHexagon({
      containerElement: hexagonRef.current,
      width: 40,
      height: 44,
      lineWidth: 3,
      roundedCorners: true,
      roundedCornerRadius: 1,
      gradient: {
        colors: [vikinger_constants.colors['--color-progressbar-line-gradient-end'], vikinger_constants.colors['--color-progressbar-line-gradient-start']]
      },
      scale: {
        start: 0,
        end: props.data.total,
        stop: props.data.current
      }
    });
  }, []);

  useEffect(() => {
    if (hexagon.current) {
      // redraw hexagon
      hexagon.current.redrawProgress({
        start: 0,
        end: props.data.total,
        stop: props.data.current
      });
    }
  }, [props.data]);

  return (
    <div className="user-avatar-progress">
      <div ref={hexagonRef} className="hexagon-progress-40-44"></div>
    </div>
  );
}

export { HexagonProgress_40_44 as default };