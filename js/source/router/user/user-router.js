/**
 * General
 */
const getLoggedInMember = (config) => {
  const data = {
    action: 'vikinger_get_logged_user_member_data_ajax',
    data_scope: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Metadata
 */
const updateLoggedUserGridType = (config) => {
  const data = {
    action: 'vikinger_logged_user_grid_type_update_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const updateLoggedUserSidemenuStatus = (config) => {
  const data = {
    action: 'vikinger_logged_user_sidemenu_status_update_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const toggleLoggedUserColorTheme = () => {
  const data = {
    action: 'vikinger_logged_user_color_theme_toggle_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getLoggedUserStreamUsername = () => {
  const data = {
    action: 'vikinger_logged_user_stream_username_get_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const updateLoggedUserStreamUsername = (config) => {
  const data = {
    action: 'vikinger_logged_user_stream_username_update_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  getLoggedInMember,
  updateLoggedUserGridType,
  updateLoggedUserSidemenuStatus,
  toggleLoggedUserColorTheme,
  getLoggedUserStreamUsername,
  updateLoggedUserStreamUsername
};