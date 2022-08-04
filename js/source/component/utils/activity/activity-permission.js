const getUserActivityPermissions = (user, activityData, currentProfileUserID) => {
  const permissions = {
    settings: false,
    pin: false,
    edit: false,
    delete: false
  };

  if (!user) {
    return permissions;
  }

  const loggedUserIsSiteAdmin = vikinger_constants.settings.current_user_is_admin;

  if (loggedUserIsSiteAdmin) {
    permissions.settings = true;
    permissions.edit = activityComponentIsAllowedForEdit(activityData.component) && activityTypeIsAllowedForEdit(activityData.type);
    permissions.delete = true;
  } else {
    permissions.settings = userCanUseActivitySettings(activityData, user);
    permissions.edit = userCanEditActivity(activityData, user);
    permissions.delete = userCanDeleteActivity(activityData, user);
  }

  permissions.pin = userCanPinActivity(activityData, user, currentProfileUserID);

  return permissions;
};

import groupUtils from'../group';

const userCanUseActivitySettings = (activityData, user) => {
  const isGroupActivity = activityData.component === 'groups';

  if (isGroupActivity) {
    const groupable = groupUtils(user, activityData.group);

    if (groupable.isBannedFromGroup()) {
      return false;
    }
  }

  return true;
};

const userCanPinActivity = (activityData, user, currentProfileUserID) => {
  const isActivityAuthor = userIsActivityAuthor(activityData, user);

  if (!isActivityAuthor) {
    return false;
  }

  if (!(user.id) === currentProfileUserID) {
    return false;
  }

  return true;
};

const userCanEditActivity = (activityData, user) => {
  if (!activityComponentIsAllowedForEdit(activityData.component)) {
    return false;
  }

  if (!activityTypeIsAllowedForEdit(activityData.type)) {
    return false;
  }

  const isActivityAuthor = userIsActivityAuthor(activityData, user);
  const isGroupActivity = activityData.component === 'groups';

  if (isGroupActivity) {
    const groupable = groupUtils(user, activityData.group);

    if (groupable.isGroupAdmin() || groupable.isGroupMod()) {
      return true;
    }

    if (!(groupable.isGroupMember() && isActivityAuthor)) {
      return false;
    }
  } else {
    if (!isActivityAuthor) {
      return false;
    }
  }

  if (activityEditableTimeHasElapsed(activityData)) {
    return false;
  }

  return true;
};

const userCanDeleteActivity = (activityData, user) => {
  const isActivityAuthor = userIsActivityAuthor(activityData, user);
  const isGroupActivity = activityData.component === 'groups';

  if (isGroupActivity) {
    const groupable = groupUtils(user, activityData.group);

    if (groupable.isGroupAdmin() || groupable.isGroupMod()) {
      return true;
    }

    if (!(groupable.isGroupMember() && isActivityAuthor)) {
      return false;
    }
  } else {
    if (!isActivityAuthor) {
      return false;
    }
  }
  
  return true;
};

const userIsActivityAuthor = (activityData, user) => {
  return activityData.author.id === user.id;
};

const activityComponentIsAllowedForEdit = (activityComponent) => {
  const editableComponents = [
    'activity',
    'groups'
  ];

  return editableComponents.includes(activityComponent);
};

const activityTypeIsAllowedForEdit = (activityType) => {
  const editableTypes = [
    'activity_update',
    'activity_share',
    'activity_media_update',
    'activity_media_upload',
    'activity_video_update',
    'activity_video_upload'
  ];

  return editableTypes.includes(activityType);
};

import { dateMinutesDiff } from '../../../utils/core';

const editableTimeLimit = vikinger_constants.settings.activity_edit_time_limit;

const activityEditableTimeHasElapsed = (activityData) => {
  if (editableTimeLimit > 0) {
    const currentDate = new Date();
    const currentDateUTC = new Date(currentDate.getUTCFullYear(), currentDate.getUTCMonth(), currentDate.getUTCDate(),
    currentDate.getUTCHours(), currentDate.getUTCMinutes(), currentDate.getUTCSeconds());

    const activityDate = new Date(activityData.date);

    const minutesSinceActivityWasCreated = dateMinutesDiff(activityDate, currentDateUTC);

    // console.log('ACTIVITY - EDITABLE TIME ELAPSED: ', minutesSinceActivityWasCreated);

    if (minutesSinceActivityWasCreated >= editableTimeLimit) {
      return true;
    }
  }

  return false;
};

export {
  getUserActivityPermissions
};