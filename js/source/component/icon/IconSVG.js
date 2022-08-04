import React from 'react';

function IconSVG(props) {
  return (
    <svg className={`icon-${props.icon} ${props.modifiers || ''}`}>
      <use href={`#svg-${props.icon}`}></use>
    </svg>
  );
}

export { IconSVG as default };