import React from 'react';

import HexagonBorder_100_110 from '../../hexagon/hexagon-border/HexagonBorder_100_110';

import HexagonBadge_22_24 from '../../hexagon/hexagon-badge/HexagonBadge_22_24';
import HexagonBadgeBorder_28_32 from '../../hexagon/hexagon-badge/hexagon-badge-border/HexagonBadgeBorder_28_32';

import HexagonImage_68_74 from '../../hexagon/hexagon-image/HexagonImage_68_74';
import HexagonImage_82_90 from '../../hexagon/hexagon-image/HexagonImage_82_90';

import HexagonProgress_84_92 from '../../hexagon/hexagon-progress/HexagonProgress_84_92';
import HexagonProgressBorder_84_92 from '../../hexagon/hexagon-progress/hexagon-progress-border/HexagonProgressBorder_84_92';

function AvatarHexagon(props) {
  const noBorderClasses = props.noBorder ? 'no-border' : '';
  const Element = props.noLink || !vikinger_constants.plugin_active.buddypress ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar ${!props.data.rank ? 'no-stats' : ''} ${props.noBorder && props.data.rank ? 'no-outline' : ''} ${noBorderClasses} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
    {
      !props.noBorder &&
        <HexagonBorder_100_110 />
    }

    {
      !props.data.rank &&
        <HexagonImage_82_90 imageURL={props.data.avatar_url} />
    }

    {
      props.data.rank &&
        <React.Fragment>
          <HexagonImage_68_74 imageURL={props.data.avatar_url} />
          <HexagonProgress_84_92 data={props.data.rank} />
          <HexagonProgressBorder_84_92 />
          <div className="user-avatar-badge">
            <HexagonBadgeBorder_28_32 />
            <HexagonBadge_22_24 />
            <p className="user-avatar-badge-text">{props.data.rank.current}</p>
          </div>
        </React.Fragment>
    }
    </Element>
  );
}

export { AvatarHexagon as default };