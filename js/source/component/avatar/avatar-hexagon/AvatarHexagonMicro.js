import React from 'react';

import HexagonBorder_22_24 from '../../hexagon/hexagon-border/HexagonBorder_22_24';

import HexagonImage_18_20 from '../../hexagon/hexagon-image/HexagonImage_18_20';

function AvatarHexagonMicro(props) {
  const Element = props.noLink ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar micro no-stats ${props.noBorder ? 'no-border' : ''} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
      {
        !props.noBorder &&
          <HexagonBorder_22_24 />
      }
      <HexagonImage_18_20 imageURL={props.data.avatar_url} />
    </Element>
  );
}

export { AvatarHexagonMicro as default };