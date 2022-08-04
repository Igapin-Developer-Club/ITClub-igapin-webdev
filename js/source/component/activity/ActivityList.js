import React from 'react';

import Activity from './Activity';

import { getAdsForPlacementIndex } from '../utils/ads';

function ActivityList(props) {
  const renderedActivities = props.data.map((activityData, i) => {
    let renderedActivity = [];

    const adsForBeforeActivityPlacement = getAdsForPlacementIndex(props.activityAds, 'bp_before_activity_entry', i);

    if (adsForBeforeActivityPlacement) {
      renderedActivity = renderedActivity.concat(adsForBeforeActivityPlacement);
    }

    renderedActivity.push(
      <Activity key={activityData.id}
                data={activityData}
                user={props.user}
                profileUserID={props.profileUserID}
                pinnedActivityID={props.pinnedActivityID}
                pinActivity={props.pinActivity}
                unpinActivity={props.unpinActivity}
                updateActivity={props.updateActivity}
                deleteActivity={props.deleteActivity}
                reactions={props.reactions}
                onShare={props.onShare}
                onPlay={props.onPlay}
                onActivityUpdate={props.onActivityUpdate}
                activityAds={props.activityAds}
                activityIndex={i}
      />
    );

    const adsForAfterActivityPlacement = getAdsForPlacementIndex(props.activityAds, 'bp_after_activity_entry', i);

    if (adsForAfterActivityPlacement) {
      renderedActivity = renderedActivity.concat(adsForAfterActivityPlacement);
    }

    return renderedActivity;
  });

  return (
    renderedActivities
  );
}

export { ActivityList as default };