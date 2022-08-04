/**
 * General
 */
const getNotifications = (config = {}) => {
  const data = {
    action: 'vikinger_get_notifications_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getUnreadNotificationsCount = (config = {}) => {
  const data = {
    action: 'vikinger_get_unread_notifications_count_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const markNotificationAsRead = (config) => {
  const data = {
    action: 'vikinger_mark_notification_as_read_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const markNotificationsAsRead = (config) => {
  const data = {
    action: 'vikinger_mark_notifications_as_read_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const deleteNotifications = (config) => {
  const data = {
    action: 'vikinger_delete_notifications_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  getNotifications,
  getUnreadNotificationsCount,
  markNotificationAsRead,
  markNotificationsAsRead,
  deleteNotifications
};