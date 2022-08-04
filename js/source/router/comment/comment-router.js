/**
 * General
 */
const getComments = (filters, callback) => {
  const data = {
    action: 'vikinger_get_comments_ajax',
    args: filters,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const getPostTopLevelCommentCount = (postID, callback) => {
  const data = {
    action: 'vikinger_get_post_top_level_comment_count_ajax',
    postID: postID,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const createComment = (commentData, callback) => {
  const data = {
    action: 'vikinger_create_comment_ajax',
    comment_data: {
      comment_post_ID: commentData.postID,
      comment_parent: commentData.parentID,
      comment_author: commentData.author,
      comment_content: commentData.content
    },
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  // optional parameters
  if (typeof commentData.userID !== 'undefined') {
    data.comment_data.user_id = commentData.userID;
  }

  if (typeof commentData.email !== 'undefined') {
    data.comment_data.comment_author_email = commentData.email;
  }

  jQuery.post(vikinger_constants.ajax_url, data, callback);
};

const updateComment = (args) => {
  const data = {
    action: 'vikinger_comment_update_ajax',
    args: args,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

const deletePostComment = (config) => {
  const data = {
    action: 'vikinger_post_comment_delete_ajax',
    args: config,
    _ajax_nonce: vikinger_constants.vikinger_ajax_nonce
  };

  return jQuery.post(vikinger_constants.ajax_url, data);
};

export {
  getComments,
  getPostTopLevelCommentCount,
  createComment,
  updateComment,
  deletePostComment
};