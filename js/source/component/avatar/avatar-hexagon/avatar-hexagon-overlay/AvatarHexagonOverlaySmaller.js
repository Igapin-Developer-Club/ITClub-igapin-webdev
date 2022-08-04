import React from 'react';

import HexagonBorder_34_36 from '../../../hexagon/hexagon-border/HexagonBorder_34_36';

import HexagonImage_30_32 from '../../../hexagon/hexagon-image/HexagonImage_30_32';

import HexagonOverlay_30_32 from '../../../hexagon/hexagon-overlay/HexagonOverlay_30_32';

function AvatarHexagonOverlaySmaller(props) {
  const Element = props.noLink ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar smaller no-stats ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.link } : {})}
    >
      <HexagonBorder_34_36 />
      <HexagonImage_30_32 imageURL={props.data.avatar_url} />
      <HexagonOverlay_30_32 />

      <div className="user-avatar-overlay-content">
        <p className="user-avatar-overlay-content-text">+{props.count}</p>
      </div>
    </Element>
  );
}

export { AvatarHexagonOverlaySmaller as default };