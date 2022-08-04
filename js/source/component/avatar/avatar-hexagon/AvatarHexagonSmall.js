import React from 'react';

import HexagonBorder_50_56 from '../../hexagon/hexagon-border/HexagonBorder_50_56';

import HexagonBadge_16_18 from '../../hexagon/hexagon-badge/HexagonBadge_16_18';
import HexagonBadgeBorder_22_24 from '../../hexagon/hexagon-badge/hexagon-badge-border/HexagonBadgeBorder_22_24';

import HexagonImage_30_32 from '../../hexagon/hexagon-image/HexagonImage_30_32';
import HexagonImage_40_44 from '../../hexagon/hexagon-image/HexagonImage_40_44';

import HexagonProgress_40_44 from '../../hexagon/hexagon-progress/HexagonProgress_40_44';
import HexagonProgressBorder_40_44 from '../../hexagon/hexagon-progress/hexagon-progress-border/HexagonProgressBorder_40_44';

function AvatarHexagonSmall(props) {
  const noBorderClasses = props.noBorder ? 'no-border' : '';
  const Element = props.noLink || !vikinger_constants.plugin_active.buddypress ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar small ${!props.data.rank ? 'no-stats' : ''} ${props.noBorder && props.data.rank ? 'no-outline' : ''} ${noBorderClasses} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
    {
      !props.noBorder &&
        <HexagonBorder_50_56 />
    }

    {
      !props.data.rank &&
        <HexagonImage_40_44 imageURL={props.data.avatar_url} />
    }

    {
      props.data.rank &&
        <React.Fragment>
          <HexagonImage_30_32 imageURL={props.data.avatar_url} />
          <HexagonProgress_40_44 data={props.data.rank} />
          <HexagonProgressBorder_40_44 />
          <div className="user-avatar-badge">
            <HexagonBadgeBorder_22_24 />
            <HexagonBadge_16_18 />
            <p className="user-avatar-badge-text">{props.data.rank.current}</p>
          </div>
        </React.Fragment>
    }
    </Element>
  );
}

export { AvatarHexagonSmall as default };