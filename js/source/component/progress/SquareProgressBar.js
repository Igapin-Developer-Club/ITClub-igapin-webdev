import React, { useRef, useLayoutEffect } from 'react';

import ProgressBar from 'progressbar.js';

const svgConfig = {
  small: {
    width: 40,
    strokeWidth: 8
  },
  regular: {
    width: 90,
    strokeWidth: 5
  },
  medium: {
    width: 108,
    strokeWidth: 5
  },
  big: {
    width: 134,
    strokeWidth: 6
  }
};

function SquareProgressBar(props) {
  const linePathRef = useRef(null);

  const size = props.size || 'regular';
  const fillAmount = props.fillAmount ? Math.min(Math.max(props.fillAmount, 0), 1) : 1;

  const progressBarElement = useRef(null);

  useLayoutEffect(() => {
    progressBarElement.current = new ProgressBar.Path(linePathRef.current);

    progressBarElement.current.set(fillAmount);
  }, []);

  return (
    <svg viewBox="0 0 100 100" width={svgConfig[size].width}>
      <path fillOpacity="0"
            strokeWidth={svgConfig[size].strokeWidth}
            stroke={vikinger_constants.colors['--color-progressbar-underline']}
            d="M 0,2 L 98,2 L 98,98 L 2,98 L 2,4"
      />
      <path ref={linePathRef}
            fillOpacity="0"
            strokeWidth={svgConfig[size].strokeWidth}
            stroke="url(#vk-avatar-gradient)"
            d="M 0,2 L 98,2 L 98,98 L 2,98 L 2,4"
      />
    </svg>
  );
}

export { SquareProgressBar as default };