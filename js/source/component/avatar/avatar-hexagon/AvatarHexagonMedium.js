import React from 'react';

import HexagonBorder_120_130 from '../../hexagon/hexagon-border/HexagonBorder_120_130';

import HexagonBadge_26_28 from '../../hexagon/hexagon-badge/HexagonBadge_26_28';
import HexagonBadgeBorder_32_36 from '../../hexagon/hexagon-badge/hexagon-badge-border/HexagonBadgeBorder_32_36';

import HexagonImage_82_90 from '../../hexagon/hexagon-image/HexagonImage_82_90';
import HexagonImage_100_110 from '../../hexagon/hexagon-image/HexagonImage_100_110';

import HexagonProgress_100_110 from '../../hexagon/hexagon-progress/HexagonProgress_100_110';
import HexagonProgressBorder_100_110 from '../../hexagon/hexagon-progress/hexagon-progress-border/HexagonProgressBorder_100_110';

function AvatarHexagonMedium(props) {
  const noBorderClasses = props.noBorder ? 'no-border' : '';
  const Element = props.noLink || !vikinger_constants.plugin_active.buddypress ? 'div' : 'a';
  
  return (
    <Element  className={`user-avatar medium ${!props.data.rank ? 'no-stats' : ''} ${props.noBorder && props.data.rank ? 'no-outline' : ''} ${noBorderClasses} ${props.modifiers || ''}`}
              {...(!props.noLink ? { href: props.data.link } : {})}
    >
    {
      !props.noBorder &&
        <HexagonBorder_120_130 />
    }

    {
      !props.data.rank &&
        <HexagonImage_100_110 imageURL={props.data.avatar_url} />
    }

    {
      props.data.rank &&
        <React.Fragment>
          <HexagonImage_82_90 imageURL={props.data.avatar_url} />
          <HexagonProgress_100_110 data={props.data.rank} />
          <HexagonProgressBorder_100_110 />
          <div className="user-avatar-badge">
            <HexagonBadgeBorder_32_36 />
            <HexagonBadge_26_28 />
            <p className="user-avatar-badge-text">{props.data.rank.current}</p>
          </div>
        </React.Fragment>
    }
    </Element>
  );
}

export { AvatarHexagonMedium as default };