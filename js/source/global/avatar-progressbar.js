import ProgressBar from 'progressbar.js';

import { querySelector } from '../utils/core';

const avatarGradientDef = `
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0" style="display: block;">
  <defs>
    <linearGradient id="vk-avatar-gradient" x1="0" y1="0" x2="1" y2="0">
      <stop offset="0%" stop-color="${vikinger_constants.colors['--color-progressbar-line-gradient-end']}"/>
      <stop offset="100%" stop-color="${vikinger_constants.colors['--color-progressbar-line-gradient-start']}"/>
    </linearGradient>
  </defs>
</svg>`;

const avatarGradientDefContainer = document.createElement('div');

avatarGradientDefContainer.innerHTML = avatarGradientDef;

document.body.appendChild(avatarGradientDefContainer);

const createSquareProgressSVG = function (size = 'big') {
  const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg'),
        underlinePath = document.createElementNS('http://www.w3.org/2000/svg', 'path'),
        linePath = document.createElementNS('http://www.w3.org/2000/svg', 'path'),
        lineD = 'M 0,2 L 98,2 L 98,98 L 2,98 L 2,4';

  svg.setAttribute('viewBox', '0 0 100 100');

  underlinePath.setAttribute('d', lineD);
  underlinePath.setAttribute('fill-opacity', 0);
  underlinePath.setAttribute('stroke', vikinger_constants.colors['--color-progressbar-underline']);

  linePath.setAttribute('d', lineD);
  linePath.setAttribute('fill-opacity', 0);
  linePath.setAttribute('stroke', 'url(#vk-avatar-gradient)');

  switch (size) {
    case 'big':
      svg.setAttribute('width', 134);
      underlinePath.setAttribute('stroke-width', 6);
      linePath.setAttribute('stroke-width', 6);
      break;
    case 'medium':
      svg.setAttribute('width', 108);
      underlinePath.setAttribute('stroke-width', 5);
      linePath.setAttribute('stroke-width', 5);
      break;
    case 'small':
      svg.setAttribute('width', 40);
      underlinePath.setAttribute('stroke-width', 8);
      linePath.setAttribute('stroke-width', 8);
      break;
    case 'regular':
    default:
      svg.setAttribute('width', 90);
      underlinePath.setAttribute('stroke-width', 5);
      linePath.setAttribute('stroke-width', 5);
  }

  svg.append(underlinePath, linePath);

  return {
    svg,
    underlinePath,
    linePath
  };
};

const avatarProgressItems = [
  {
    type: 'path',
    size: 'small',
    selector: '.user-avatar-circle-progress-flat-small',
    config: {}
  },
  {
    type: 'path',
    size: 'regular',
    selector: '.user-avatar-circle-progress-flat-regular',
    config: {}
  },
  {
    type: 'path',
    size: 'medium',
    selector: '.user-avatar-circle-progress-flat-medium',
    config: {}
  },
  {
    type: 'path',
    size: 'big',
    selector: '.user-avatar-circle-progress-flat-big',
    config: {}
  },
  {
    type: 'circle',
    selector: '.user-avatar-circle-progress-small',
    config: {
      color: 'url(#vk-avatar-gradient)',
      trailColor: vikinger_constants.colors['--color-progressbar-underline'],
      strokeWidth: 8,
      trailWidth: 8,
      svgStyle: {
        width: '40px',
        height: '40px'
      }
    }
  },
  {
    type: 'circle',
    selector: '.user-avatar-circle-progress-regular',
    config: {
      color: 'url(#vk-avatar-gradient)',
      trailColor: vikinger_constants.colors['--color-progressbar-underline'],
      strokeWidth: 5,
      trailWidth: 5,
      svgStyle: {
        width: '90px',
        height: '90px'
      }
    }
  },
  {
    type: 'circle',
    selector: '.user-avatar-circle-progress-medium',
    config: {
      color: 'url(#vk-avatar-gradient)',
      trailColor: vikinger_constants.colors['--color-progressbar-underline'],
      strokeWidth: 5,
      trailWidth: 5,
      svgStyle: {
        width: '108px',
        height: '108px'
      }
    }
  },
  {
    type: 'circle',
    selector: '.user-avatar-circle-progress-big',
    config: {
      color: 'url(#vk-avatar-gradient)',
      trailColor: vikinger_constants.colors['--color-progressbar-underline'],
      strokeWidth: 6,
      trailWidth: 6,
      svgStyle: {
        width: '134px',
        height: '134px'
      }
    }
  }
];

for (const avatarProgressItem of avatarProgressItems) {
  querySelector(avatarProgressItem.selector, (els) => {
    for (const avatarProgressElement of els) {
      let avatarProgress;

      if (avatarProgressItem.type === 'circle') {
        avatarProgress = new ProgressBar.Circle(avatarProgressElement, avatarProgressItem.config);
      } else if (avatarProgressItem.type === 'path') {
        const svgElement = createSquareProgressSVG(avatarProgressItem.size);

        avatarProgressElement.append(svgElement.svg);
        avatarProgress = new ProgressBar.Path(svgElement.linePath, avatarProgressItem.config);
      }

      const stopValue = Number.parseFloat(avatarProgressElement.getAttribute('data-scalestop'));

      avatarProgress.set(stopValue);
    }
  });
}