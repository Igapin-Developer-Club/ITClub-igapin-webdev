const pmproBuddyPressIsActive = vikinger_constants.plugin_active['pmpro-buddypress'];

const pmproOptions = pmproBuddyPressIsActive ? vikinger_constants.settings.pmpro_bp_options : {};
const pmproGiveAllAccess = pmproOptions.pmpro_bp_restrictions === 1;
const pmproSpecificFeaturesAreEnabled = pmproOptions.pmpro_bp_restrictions !== -1;

const canDoAction = (action, actionIsEnabled = (optionValue) => optionValue === 1) => {
  // ignore membership restrictions for site admins
  if (vikinger_constants.settings.current_user_is_admin) {
    return true;
  }

  return pmproBuddyPressIsActive ? (pmproGiveAllAccess || (pmproSpecificFeaturesAreEnabled && actionIsEnabled(pmproOptions[action]))) : true;
};

const friendshipPermissions = {
  sendFriendRequest: canDoAction('pmpro_bp_send_friend_request')
};

const groupPermissions = {
  createGroup: canDoAction('pmpro_bp_group_creation'),
  joinGroup: canDoAction('pmpro_bp_groups_join')
};

const activityPermissions = {
  createActivity: canDoAction('pmpro_bp_public_messaging')
};

const messagePermissions = {
  createMessage: canDoAction('pmpro_bp_private_messaging')
};

import { deepMerge } from "../../utils/core";

const membershipPermissions = deepMerge(friendshipPermissions, groupPermissions, activityPermissions, messagePermissions);

export {
  membershipPermissions as default,
  friendshipPermissions,
  groupPermissions,
  activityPermissions,
  messagePermissions
};