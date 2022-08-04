import React from 'react';

import ActivityContent from '../../activity/activity-template/ActivityContent';

import ActivityStatusHeader from '../../activity/activity-template/activity-status/ActivityStatusHeader';
import ActivityStatusBody from '../../activity/activity-template/activity-status/ActivityStatusBody';

import ActivityShareHeader from '../../activity/activity-template/activity-share/ActivityShareHeader';
import ActivityShareBody from '../../activity/activity-template/activity-share/ActivityShareBody';

import ActivityFriendHeader from '../../activity/activity-template/activity-friend/ActivityFriendHeader';
import ActivityFriendBody from '../../activity/activity-template/activity-friend/ActivityFriendBody';

import ActivityGroupHeader from '../../activity/activity-template/activity-group/ActivityGroupHeader';
import ActivityGroupBody from '../../activity/activity-template/activity-group/ActivityGroupBody';

import PostPreview from '../../post/post-preview/PostPreview';
import PostPreviewIframe from '../../post/post-preview/post-preview-iframe/PostPreviewIframe';
import PostPreviewGallery from '../../post/post-preview/post-preview-gallery/PostPreviewGallery';

const getActivityContent = (activityHeader, activityBody) => {
  return (props) => {
    return (
      <ActivityContent  activityHeader={activityHeader}
                        activityBody={activityBody}
                        {...props}
      />
    );
  };
};

const getActivityTemplate = (type, format = false) => {
  if ((type === 'created_group') || (type === 'joined_group')) {
    return getActivityContent(ActivityGroupHeader, ActivityGroupBody);
  }
  
  if (type === 'friendship_created') {
    return getActivityContent(ActivityFriendHeader, ActivityFriendBody);
  }
  
  if ((type === 'activity_share') || (type === 'post_share')) {
    return getActivityContent(ActivityShareHeader, ActivityShareBody);
  }

  if (type === 'post') {
    if ((format === 'video') || (format === 'audio')) {
      return (props) => <PostPreviewIframe {...props} />;
    }

    if (format === 'gallery') {
      return (props) => <PostPreviewGallery {...props} />;
    }

    return (props) => <PostPreview {...props} />;
  }

  return getActivityContent(ActivityStatusHeader, ActivityStatusBody);
};

export {
  getActivityTemplate
};