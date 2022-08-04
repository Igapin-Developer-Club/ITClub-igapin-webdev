/**
 * General
 */
const getPosts = (postData) => {
  const data = {
    action: 'vikinger_get_posts_ajax',
    post_data: postData,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const getPostCount = (postData, callback) => {
  const data = {
    action: 'vikinger_get_post_count_ajax',
    post_data: postData,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const getPages = (args) => {
  const data = {
    action: 'vikinger_get_pages_ajax',
    args: args,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Taxonomies
 */
const getCategories = (callback) => {
  const data = {
    action: 'vikinger_get_categories_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

export {
  getPosts,
  getPostCount,
  getPages,
  getCategories
};