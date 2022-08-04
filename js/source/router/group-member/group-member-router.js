/**
 * General
 */
const getGroupMembers = (config) => {
  const data = {
    action: 'vikinger_groups_get_members_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getGroupMembersCount = (config, callback) => {
  const data = {
    action: 'vikinger_groups_get_members_count_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const removeGroupMember = (config) => {
  const data = {
    action: 'vikinger_group_member_remove_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const sendGroupInvitation = (config) => {
  const data = {
    action: 'vikinger_group_send_invite_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const acceptGroupInvitation = (config) => {
  const data = {
    action: 'vikinger_group_accept_invite_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const removeGroupInvitation = (config) => {
  const data = {
    action: 'vikinger_group_remove_invite_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Public Membership
 */
const joinGroup = (config) => {
  const data = {
    action: 'vikinger_group_join_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const leaveGroup = (config) => {
  const data = {
    action: 'vikinger_group_leave_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Private Membership
 */
const requestGroupMembership = (config) => {
  const data = {
    action: 'vikinger_group_membership_requests_send_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const acceptGroupMembership = (config) => {
  const data = {
    action: 'vikinger_group_membership_requests_accept_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const removeGroupMembership = (config) => {
  const data = {
    action: 'vikinger_group_membership_requests_remove_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Group Member Promotion
 */
const promoteGroupMemberToAdmin = (config) => {
  const data = {
    action: 'vikinger_group_member_promote_to_admin_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const promoteGroupMemberToMod = (config) => {
  const data = {
    action: 'vikinger_group_member_promote_to_mod_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Group Member Demotion
 */
const demoteGroupMemberToMod = (config) => {
  const data = {
    action: 'vikinger_group_member_demote_to_mod_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const demoteGroupMemberToMember = (config) => {
  const data = {
    action: 'vikinger_group_member_demote_to_member_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Group Member Ban
 */
const banGroupMember = (config) => {
  const data = {
    action: 'vikinger_group_member_ban_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const unbanGroupMember = (config) => {
  const data = {
    action: 'vikinger_group_member_unban_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  getGroupMembers,
  getGroupMembersCount,
  removeGroupMember,
  sendGroupInvitation,
  acceptGroupInvitation,
  removeGroupInvitation,
  joinGroup,
  leaveGroup,
  requestGroupMembership,
  acceptGroupMembership,
  removeGroupMembership,
  promoteGroupMemberToAdmin,
  promoteGroupMemberToMod,
  demoteGroupMemberToMod,
  demoteGroupMemberToMember,
  banGroupMember,
  unbanGroupMember
};