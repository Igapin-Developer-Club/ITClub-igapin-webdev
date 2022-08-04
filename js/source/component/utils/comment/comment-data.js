import { deepMerge } from "../../../utils/core";

const reorderComments = (comments, order) => {
  let sortFunction;

  // select sorting function according to selected sort order
  if (order === 'DESC') {
    sortFunction = (firstEl, secondEl) => {
      if (firstEl.date > secondEl.date) {
        return -1;
      }

      if (firstEl.date < secondEl.date) {
        return 1;
      }

      return 0;
    };
  } else if (order === 'ASC') {
    sortFunction = (firstEl, secondEl) => {
      if (firstEl.date < secondEl.date) {
        return -1;
      }

      if (firstEl.date > secondEl.date) {
        return 1;
      }

      return 0;
    };
  }

  return sortComments(comments, sortFunction);
};

const sortComments = (comments, sortFunction) => {
  comments.sort(sortFunction);

  for (const comment of comments) {
    if (comment.children instanceof Array && comment.children.length > 0) {
      comment.children = sortComments(comment.children, sortFunction);
    }
  }

  return comments;
};

const updateCommentReactions = (comment, newReactions) => {
  const newComment = deepMerge(comment);

  newComment.reactions = newReactions;

  return newComment;
};

const updateComments = (comments, newCommentData) => {
  const newComments = comments.map((comment) => {
    // found comment to update
    if (comment.id === newCommentData.id) {
      return newCommentData;
    // there is children in the current comment
    } else if (comment.children && comment.children.length > 0) {
      comment.children = updateComments(comment.children, newCommentData);
    }

    return comment;
  });

  return newComments;
};

export {
  reorderComments,
  updateCommentReactions,
  updateComments
};