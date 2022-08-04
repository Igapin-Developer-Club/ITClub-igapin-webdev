const Pluginner = function () {
  const me = {};

  me.getRequiredPlugins = function () {
    const data = {
      action: 'vikinger_plugin_get_required_plugins_status_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.installAndActivatePlugin = function (pluginName) {
    const data = {
      action: 'vikinger_plugin_install_and_activate_ajax',
      plugin_name: pluginName,
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.updateAndActivatePlugin = function (pluginName) {
    const data = {
      action: 'vikinger_plugin_update_and_activate_ajax',
      plugin_name: pluginName,
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.activatePlugin = function (pluginSlug) {
    const data = {
      action: 'vikinger_plugin_activate_ajax',
      plugin_slug: pluginSlug,
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.getSelectedPreset = function () {
    const data = {
      action: 'vikinger_plugin_selected_preset_get_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.saveSelectedPreset = function (preset) {
    const data = {
      action: 'vikinger_plugin_selected_preset_save_ajax',
      preset: preset,
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.getCustomPresetPlugins = function () {
    const data = {
      action: 'vikinger_plugin_custom_preset_plugins_get_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.saveCustomPresetPlugins = function (plugins) {
    const data = {
      action: 'vikinger_plugin_custom_preset_plugins_save_ajax',
      plugins: plugins,
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  return me;
};

module.exports = Pluginner;