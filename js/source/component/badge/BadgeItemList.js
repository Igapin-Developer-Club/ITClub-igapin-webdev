import React from 'react';

import BadgeItem from './BadgeItem';

import BadgeItemMore from './BadgeItemMore';

function BadgeItemList(props) {
  const maxDisplayCount = props.maxDisplayCount || props.data.length,
        badgesCount = props.data.length,
        displayCount = Math.min(maxDisplayCount, badgesCount),
        badges = props.data.slice(0, displayCount),
        moreCount = (badgesCount - displayCount) > 0 ? badgesCount - displayCount : 0;

  const badgeItems = badges.map((badge) => {
    return (
      <BadgeItem key={badge.id} data={badge} />
    );
  });

  return (
    <div className={`badge-list ${props.modifiers || ''}`}>
    {badgeItems}
    {
      moreCount > 0 &&
        <BadgeItemMore more_count={moreCount} more_link={props.moreLink} />
    }
    </div>
  );
}

export { BadgeItemList as default };