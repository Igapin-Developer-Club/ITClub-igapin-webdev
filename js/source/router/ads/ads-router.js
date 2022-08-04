/**
 * General
 */
const getAdsByActivityPlacement = () => {
  const data = {
    action: 'vikinger_advads_pro_ads_by_activity_placement_get_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getAdsByMemberPlacement = () => {
  const data = {
    action: 'vikinger_advads_pro_ads_by_member_placement_get_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getAdsByGroupPlacement = () => {
  const data = {
    action: 'vikinger_advads_pro_ads_by_group_placement_get_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getAdsByPostPlacement = () => {
  const data = {
    action: 'vikinger_advads_pro_ads_by_post_placement_get_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  getAdsByActivityPlacement,
  getAdsByMemberPlacement,
  getAdsByGroupPlacement,
  getAdsByPostPlacement
};