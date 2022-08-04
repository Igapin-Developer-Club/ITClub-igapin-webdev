/**
 * General
 */
const addFriend = (config) => {
  const data = {
    action: 'vikinger_friend_add_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const removeFriend = (config) => {
  const data = {
    action: 'vikinger_friend_remove_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const withdrawFriendRequest = (config) => {
  const data = {
    action: 'vikinger_friend_withdraw_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const acceptFriendRequest = (config) => {
  const data = {
    action: 'vikinger_friend_accept_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const rejectFriendRequest = (config) => {
  const data = {
    action: 'vikinger_friend_reject_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  addFriend,
  removeFriend,
  withdrawFriendRequest,
  acceptFriendRequest,
  rejectFriendRequest
};