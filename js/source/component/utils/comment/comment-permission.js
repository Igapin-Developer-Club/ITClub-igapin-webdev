const getUserCommentPermissions = (user, commentData, group) => {
  const permissions = {
    settings: false,
    edit: false,
    delete: false
  };

  if (!user) {
    return permissions;
  }

  const loggedUserIsSiteAdmin = vikinger_constants.settings.current_user_is_admin;

  if (loggedUserIsSiteAdmin) {
    permissions.settings = true;
    permissions.edit = true;
    permissions.delete = true;
  } else {
    permissions.settings = userCanUseCommentSettings(commentData, user, group);
    permissions.edit = userCanEditComment(commentData, user, group);
    permissions.delete = userCanDeleteComment(commentData, user, group);
  }

  return permissions;
};

import groupUtils from'../group';

const userCanUseCommentSettings = (commentData, user, group) => {
  const isCommentAuthor = userIsCommentAuthor(commentData, user);

  if (group) {
    const groupable = groupUtils(user, group);

    if (groupable.isGroupAdmin() || groupable.isGroupMod()) {
      return true;
    }

    if (!(groupable.isGroupMember() && isCommentAuthor)) {
      return false;
    }

    if (groupable.isBannedFromGroup()) {
      return false;
    }
  } else {
    if (!isCommentAuthor) {
      return false;
    }
  }

  return true;
};

const userCanEditComment = (commentData, user, group) => {
  const isCommentAuthor = userIsCommentAuthor(commentData, user);

  if (group) {
    const groupable = groupUtils(user, group);

    if (groupable.isGroupAdmin() || groupable.isGroupMod()) {
      return true;
    }

    if (!(groupable.isGroupMember() && isCommentAuthor)) {
      return false;
    }
  } else {
    if (!isCommentAuthor) {
      return false;
    }
  }

  if (commentEditableTimeHasElapsed(commentData)) {
    return false;
  }

  return true;
};

const userCanDeleteComment = (commentData, user, group) => {
  const isCommentAuthor = userIsCommentAuthor(commentData, user);

  if (group) {
    const groupable = groupUtils(user, group);

    if (groupable.isGroupAdmin() || groupable.isGroupMod()) {
      return true;
    }

    if (!(groupable.isGroupMember() && isCommentAuthor)) {
      return false;
    }
  } else {
    if (!isCommentAuthor) {
      return false;
    }
  }

  return true;
};

const userIsCommentAuthor = (commentData, user) => {
  return commentData.author.id === user.id;
};

import { dateMinutesDiff } from '../../../utils/core';

const editableTimeLimit = vikinger_constants.settings.activity_edit_time_limit;

const commentEditableTimeHasElapsed = (commentData) => {
  if (editableTimeLimit > 0) {
    const currentDate = new Date();
    const currentDateUTC = new Date(currentDate.getUTCFullYear(), currentDate.getUTCMonth(), currentDate.getUTCDate(),
    currentDate.getUTCHours(), currentDate.getUTCMinutes(), currentDate.getUTCSeconds());

    const commentDate = new Date(commentData.date);

    const minutesSinceCommentWasCreated = dateMinutesDiff(commentDate, currentDateUTC);

    // console.log('COMMENT - EDITABLE TIME ELAPSED: ', minutesSinceCommentWasCreated);

    if (minutesSinceCommentWasCreated >= editableTimeLimit) {
      return true;
    }
  }

  return false;
};

export {
  getUserCommentPermissions
};