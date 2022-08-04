const DemoImporter = function () {
  const me = {};

  me.createMenus = function () {
    const data = {
      action: 'vikinger_demo_content_menus_create_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.deleteMenus = function () {
    const data = {
      action: 'vikinger_demo_content_menus_delete_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.createBasePages = function () {
    const data = {
      action: 'vikinger_demo_content_base_pages_create_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.deleteBasePages = function () {
    const data = {
      action: 'vikinger_demo_content_base_pages_delete_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.createElementorPages = function () {
    const data = {
      action: 'vikinger_demo_content_elementor_pages_create_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.deleteElementorPages = function () {
    const data = {
      action: 'vikinger_demo_content_elementor_pages_delete_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.createGamiPressPages = function () {
    const data = {
      action: 'vikinger_demo_content_gamipress_pages_create_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.deleteGamiPressPages = function () {
    const data = {
      action: 'vikinger_demo_content_gamipress_pages_delete_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.createBuddyPressProfileFieldGroups = function () {
    const data = {
      action: 'vikinger_demo_content_buddypress_xprofile_field_groups_create_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  me.deleteBuddyPressProfileFieldGroups = function () {
    const data = {
      action: 'vikinger_demo_content_buddypress_xprofile_field_groups_delete_ajax',
      _ajax_nonce: vikinger_constants.vikinger_admin_ajax_nonce
    };

    return jQuery.post(ajaxurl, data);
  };

  return me;
};

module.exports = DemoImporter;