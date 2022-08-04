import React from 'react';

import Avatar from './Avatar';
import AvatarOverlay from './avatar-overlay/AvatarOverlay';

function AvatarSmallerList(props) {
  const displayCount = props.limit ? Math.min(props.limit, props.data.length) : props.data.length;
  
  const moreItems = props.count > displayCount ? props.count - displayCount : 0;

  const renderedItems = [];

  for (let i = 0; i < displayCount; i++) {
    const dataItem = props.data[i],
          lastItem = (i === (displayCount - 1));

    if (lastItem && moreItems) {
      renderedItems.push(
        <AvatarOverlay  size="smaller"
                        key={dataItem.id}
                        data={dataItem}
                        count={moreItems}
                        link={props.link}
        />
      );
    } else {
      renderedItems.push(
        <Avatar size="smaller"
                key={dataItem.id}
                data={dataItem}
        />
      );
    }
  }

  return (
    <div className="user-avatar-list medium reverse centered">
      { renderedItems }
    </div>
  );
}

export { AvatarSmallerList as default };