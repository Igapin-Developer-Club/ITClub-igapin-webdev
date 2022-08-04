import React from 'react';

import ActivityMediaListOptions from '../ActivityMediaListOptions';
import ActivityPhotoUploadForm from './ActivityPhotoUploadForm';

function ActivityPhotoListOptions(props) {
  return (
    <ActivityMediaListOptions uploadButtonText={vikinger_translation.upload_photos}
                              activityUploadForm={ActivityPhotoUploadForm}
                              {...props}
    />
  );
}

export { ActivityPhotoListOptions as default };