/**
 * General
 */
const getMembers = (config) => {
  const data = {
    action: 'vikinger_members_get_ajax',
    filters: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getMembersCount = (config, callback) => {
  const data = {
    action: 'vikinger_members_get_count_ajax',
    filters: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const deleteLoggedUser = () => {
  const data = {
    action: 'vikinger_logged_user_delete_account_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Login
 */
const checkPassword = (config) => {
  const data = {
    action: 'vikinger_check_password_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const updatePassword = (config) => {
  const data = {
    action: 'vikinger_update_password_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Metadata
 */
const updateUserMetadata = (config) => {
  const data = {
    action: 'vikinger_user_meta_update_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * XProfile
 */
const updateMemberXProfileData = (config) => {
  const data = {
    action: 'vikinger_member_update_xprofile_data_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Avatar
 */
const uploadMemberAvatar = (config) => {
  const formData = new FormData();

  formData.set('context', 'edit');
  formData.set('action', 'bp_avatar_upload');
  formData.set('file', config.file);

  const uploadMemberAvatarPromise = jQuery.ajax({
    url: `${vikinger_constants.rest_root}buddypress/v1/members/${config.user_id}/avatar`,
    method: 'POST',
    beforeSend: function(xhr) {
      xhr.setRequestHeader('X-WP-Nonce', vikinger_constants.wp_rest_nonce);
    },
    data: formData,
    contentType: false,
    processData: false
  });

  uploadMemberAvatarPromise
  .done((response) => {
    const data = {
      action: 'vikinger_member_avatar_upload_triggers_call_ajax',
      user_id: config.user_id,
      _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
    };

    jQuery.post(vikinger_constants.ajax_url, data);
  });

  return uploadMemberAvatarPromise;
};

const deleteMemberAvatar = (config) => {
  const data = {
    action: 'vikinger_member_avatar_delete_ajax',
    user_id: config.user_id,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Cover
 */
const uploadMemberCover = (config) => {
  const formData = new FormData();

  formData.set('context', 'edit');
  formData.set('action', 'bp_cover_image_upload');
  formData.set('file', config.file);

  const uploadMemberCoverPromise = jQuery.ajax({
    url: `${vikinger_constants.rest_root}buddypress/v1/members/${config.user_id}/cover`,
    method: 'POST',
    beforeSend: function(xhr) {
      xhr.setRequestHeader('X-WP-Nonce', vikinger_constants.wp_rest_nonce);
    },
    data: formData,
    contentType: false,
    processData: false
  });

  uploadMemberCoverPromise
  .done((response) => {
    const data = {
      action: 'vikinger_member_cover_upload_triggers_call_ajax',
      user_id: config.user_id,
      _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
    };

    jQuery.post(vikinger_constants.ajax_url, data);
  });

  return uploadMemberCoverPromise;
};

const deleteMemberCover = (config) => {
  const data = {
    action: 'vikinger_member_cover_delete_ajax',
    user_id: config.user_id,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  getMembers,
  getMembersCount,
  deleteLoggedUser,
  checkPassword,
  updatePassword,
  updateUserMetadata,
  updateMemberXProfileData,
  uploadMemberAvatar,
  deleteMemberAvatar,
  uploadMemberCover,
  deleteMemberCover
};