import React from 'react';

import HexagonBorder_22_24 from '../../hexagon/hexagon-border/HexagonBorder_22_24';

import HexagonImage_24_26 from '../../hexagon/hexagon-image/HexagonImage_24_26';

function AvatarHexagonTiny(props) {
  const Element = props.noLink ? 'div' : 'a';

  return (
    <Element  className={`user-avatar tiny ${props.noBorder ? 'no-border' : ''} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
      {
        !props.noBorder &&
          <HexagonBorder_22_24 />
      }
      <HexagonImage_24_26 imageURL={props.data.avatar_url} />
    </Element>
  );
}

export { AvatarHexagonTiny as default };