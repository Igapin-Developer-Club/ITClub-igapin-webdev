/**
 * General
 */
const getMessages = (config) => {
  const data = {
    action: 'vikinger_get_messages_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getMessage = (config) => {
  const data = {
    action: 'vikinger_get_message_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const sendMessage = (config) => {
  const data = {
    action: 'vikinger_send_message_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const deleteMessageThread = (config) => {
  const data = {
    action: 'vikinger_delete_message_thread_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const starMessage = (config) => {
  const data = {
    action: 'vikinger_star_message_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const unstarMessage = (config) => {
  const data = {
    action: 'vikinger_unstar_message_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const markMessageThreadAsRead = (config) => {
  const data = {
    action: 'vikinger_message_mark_thread_as_read_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  getMessages,
  getMessage,
  sendMessage,
  deleteMessageThread,
  starMessage,
  unstarMessage,
  markMessageThreadAsRead
};