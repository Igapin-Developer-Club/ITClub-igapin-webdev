import React from 'react';

import ActivityMediaList from '../ActivityMediaList';
import ActivityPhotoListOptions from './ActivityPhotoListOptions';

import PhotoPreviewList from '../../../picture/PhotoPreviewList';

function ActivityPhotoList(props) {
  return (
    <ActivityMediaList  activityListOptions={ActivityPhotoListOptions}
                        gridModifiers="grid-2-2-2-2-2-2"
                        itemPreviewList={PhotoPreviewList}
                        itemPreviewModifiers="small animate-slide-down"
                        activityGetType='activity_media'
                        activityCreateType='activity_media_upload'
                        sectionTitle={vikinger_translation.photos}
                        noResultsTitle={vikinger_translation.photos_no_results_title}
                        noResultsText={vikinger_translation.photos_no_results_text}
                        {...props}
    />
  );
}

export { ActivityPhotoList as default };