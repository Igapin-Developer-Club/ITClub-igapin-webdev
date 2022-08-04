/**
 * General
 */
const getActivities = (config, callback) => {
  const data = {
    action: 'vikinger_get_activities_ajax',
    filters: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const createActivity = (activityData, callback) => {
  const formData = new FormData();

  // send creation config
  for (const key in activityData.creation_config) {
    formData.set(`creation_config[${key}]`, activityData.creation_config[key]);
  }

  // send share config if any
  if (activityData.share_config) {
    for (const key in activityData.share_config) {
      formData.set(`share_config[${key}]`, activityData.share_config[key]);
    }
  }

  // send attached media if any
  if (activityData.attached_media) {
    for (const key in activityData.attached_media) {
      formData.set(`attached_media[${key}]`, activityData.attached_media[key]);
    }
  }

  // send uploadable media if any
  if (activityData.uploadable_media) {
    // send files
    for (const file of activityData.uploadable_media.files) {
      formData.append(`uploadable_media[]`, file);
    }

    // send component
    for (const key in activityData.uploadable_media.component) {
      formData.set(`uploadable_media[component][${key}]`, activityData.uploadable_media.component[key]);
    }
  }

  // send uploadable media type if any
  if (activityData.uploadable_media_type) {
    formData.set('uploadable_media_type', activityData.uploadable_media_type);
  }

  formData.set('action', 'vikinger_create_activity_ajax');
  formData.set('_ajax_nonce', vikinger_constants.vikinger_ajax_nonce);

  jQuery.ajax({
    url: vikinger_constants.ajax_url,
    method: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: callback
  });
};

const updateActivity = (args) => {
  const data = {
    action: 'vikinger_activity_update_ajax',
    args: args,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const deleteActivity = (activityID, callback) => {
  const data = {
    action: 'vikinger_delete_activity_ajax',
    activity_id: activityID,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

/**
 * Activity Comment
 */
const createActivityComment = (commentData, callback) => {
  const data = {
    action: 'vikinger_create_activity_comment',
    args: {},
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  // args parameters
  if (typeof commentData.activityID !== 'undefined') {
    data.args.activity_id = commentData.activityID;
  }

  if (typeof commentData.parentID !== 'undefined') {
    data.args.parent_id = commentData.parentID;
  }

  if (typeof commentData.content !== 'undefined') {
    data.args.content = commentData.content;
  }

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const deleteActivityComment = (config) => {
  const data = {
    action: 'vikinger_activity_comment_delete_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Activity Media
 */
const deleteActivityMedia = (config, callback) => {
  const data = {
    action: 'vikinger_delete_activity_media_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

/**
 * Favorite
 */
const addActivityFavorite = (config, callback) => {
  const data = {
    action: 'vikinger_add_favorite_activity_ajax',
    userID: config.userID,
    activityID: config.activityID,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const removeActivityFavorite = (config, callback) => {
  const data = {
    action: 'vikinger_remove_favorite_activity_ajax',
    userID: config.userID,
    activityID: config.activityID,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

/**
 * Pin
 */
const pinActivity = (config, callback) => {
  const data = {
    action: 'vikinger_pin_activity_ajax',
    userID: config.userID,
    activityID: config.activityID,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const unpinActivity = (config, callback) => {
  const data = {
    action: 'vikinger_unpin_activity_ajax',
    userID: config.userID,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

export {
  getActivities,
  createActivity,
  updateActivity,
  deleteActivity,
  createActivityComment,
  deleteActivityComment,
  deleteActivityMedia,
  addActivityFavorite,
  removeActivityFavorite,
  pinActivity,
  unpinActivity
};