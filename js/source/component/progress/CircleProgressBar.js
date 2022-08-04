import React, { useRef, useLayoutEffect } from 'react';

import ProgressBar from 'progressbar.js';

const progressBarConfig = {
  small: {
    color: 'url(#vk-avatar-gradient)',
    trailColor: vikinger_constants.colors['--color-progressbar-underline'],
    strokeWidth: 8,
    trailWidth: 8,
    svgStyle: {
      width: '40px',
      height: '40px'
    }
  },
  regular: {
    color: 'url(#vk-avatar-gradient)',
    trailColor: vikinger_constants.colors['--color-progressbar-underline'],
    strokeWidth: 5,
    trailWidth: 5,
    svgStyle: {
      width: '90px',
      height: '90px'
    }
  },
  medium: {
    color: 'url(#vk-avatar-gradient)',
    trailColor: vikinger_constants.colors['--color-progressbar-underline'],
    strokeWidth: 5,
    trailWidth: 5,
    svgStyle: {
      width: '108px',
      height: '108px'
    }
  },
  big: {
    color: 'url(#vk-avatar-gradient)',
    trailColor: vikinger_constants.colors['--color-progressbar-underline'],
    strokeWidth: 6,
    trailWidth: 6,
    svgStyle: {
      width: '134px',
      height: '134px'
    }
  }
};

function CircleProgressBar(props) {
  const progressBarRef = useRef(null);

  const size = props.size || 'regular';
  const fillAmount = props.fillAmount ? Math.min(Math.max(props.fillAmount, 0), 1) : 1;

  const progressBarElement = useRef(null);

  useLayoutEffect(() => {
    progressBarElement.current = new ProgressBar.Circle(progressBarRef.current, progressBarConfig[size]);

    progressBarElement.current.set(fillAmount);

    return () => {
      if (progressBarElement.current) {
        progressBarElement.current.destroy();
      }
    };
  });

  return (
    <div ref={progressBarRef} className="user-avatar-circle-progress"></div>
  );
}

export { CircleProgressBar as default };