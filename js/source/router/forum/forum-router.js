/**
 * Group Forum
 */
const getGroupAssociatedForum = (config) => {
  const data = {
    action: 'vikinger_bbpress_group_forum_associate_get_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const createGroupForum = (config, group_id) => {
  const data = {
    action: 'vikinger_bbpress_group_forum_create_ajax',
    args: config,
    group_id: group_id,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const deleteGroupForum = (config) => {
  const data = {
    action: 'vikinger_bbpress_group_forum_delete_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  getGroupAssociatedForum,
  createGroupForum,
  deleteGroupForum
};