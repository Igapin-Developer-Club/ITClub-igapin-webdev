import React from 'react';

import HexagonBorder_34_36 from '../../hexagon/hexagon-border/HexagonBorder_34_36';

import HexagonImage_30_32 from '../../hexagon/hexagon-image/HexagonImage_30_32';

function AvatarHexagonSmaller(props) {
  const Element = props.noLink ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar smaller no-stats ${props.noBorder ? 'no-border' : ''} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
      {
        !props.noBorder &&
          <HexagonBorder_34_36 />
      }
      <HexagonImage_30_32 imageURL={props.data.avatar_url} />
    </Element>
  );
}

export { AvatarHexagonSmaller as default };