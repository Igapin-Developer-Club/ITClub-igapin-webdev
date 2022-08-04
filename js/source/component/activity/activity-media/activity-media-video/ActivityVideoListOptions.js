import React from 'react';

import ActivityMediaListOptions from '../ActivityMediaListOptions';
import ActivityVideoUploadForm from './ActivityVideoUploadForm';

function ActivityVideoListOptions(props) {
  return (
    <ActivityMediaListOptions uploadButtonText={vikinger_translation.upload_video}
                              activityUploadForm={ActivityVideoUploadForm}
                              {...props}
    />
  );
}

export { ActivityVideoListOptions as default };