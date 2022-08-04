import React from 'react';

import ActivityMediaList from '../ActivityMediaList';
import ActivityVideoListOptions from './ActivityVideoListOptions';

import VideoItemList from '../../../video/VideoItemList';

function ActivityVideoList(props) {
  return (
    <ActivityMediaList  activityListOptions={ActivityVideoListOptions}
                        gridModifiers="grid-3-3-3-3"
                        itemPreviewList={VideoItemList}
                        itemPreviewModifiers="video-box-cover-only animate-slide-down"
                        activityGetType='activity_video'
                        activityCreateType='activity_video_upload'
                        sectionTitle={vikinger_translation.videos}
                        noResultsTitle={vikinger_translation.videos_no_results_title}
                        noResultsText={vikinger_translation.videos_no_results_text}
                        {...props}
    />
  );
}

export { ActivityVideoList as default };