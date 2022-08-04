/**
 * General
 */
const getReactions = () => {
  const data = {
    action: 'vkreact_get_reactions_ajax',
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

/**
 * Post Reaction
 */
const createPostUserReaction = (config, callback) => {
  const data = {
    action: 'vkreact_create_post_user_reaction_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const deletePostUserReaction = (config, callback) => {
  const data = {
    action: 'vkreact_delete_post_user_reaction_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

/**
 * Post Comment Reaction
 */
const createPostCommentUserReaction = (config, callback) => {
  const data = {
    action: 'vkreact_create_postcomment_user_reaction_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const deletePostCommentUserReaction = (config, callback) => {
  const data = {
    action: 'vkreact_delete_postcomment_user_reaction_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

/**
 * Activity Reaction
 */
const createActivityUserReaction = (config, callback) => {
  const data = {
    action: 'vkreact_bp_create_activity_user_reaction_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const deleteActivityUserReaction = (config, callback) => {
  const data = {
    action: 'vkreact_bp_delete_activity_user_reaction_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

export {
  getReactions,
  createPostUserReaction,
  deletePostUserReaction,
  createPostCommentUserReaction,
  deletePostCommentUserReaction,
  createActivityUserReaction,
  deleteActivityUserReaction
};