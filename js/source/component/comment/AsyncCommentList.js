import React, { useState, useRef, useEffect } from 'react';

import CommentForm from './comment-form/CommentForm';
import CommentFormBig from './comment-form/CommentFormBig';
import CommentFormGuest from './comment-form/CommentFormGuest';
import CommentList from './CommentList';

import LoaderSpinner from '../loader/LoaderSpinner';

import { deepExtend } from '../../utils/core';

import groupUtils from'../utils/group';

import { updateComments } from '../utils/comment/comment-data';

function AsyncCommentList(props) {
  const [comments, setComments] = useState({
    items: [],
    count: props.commentCount
  });

  const [initialFetch, setInitialFetch] = useState(props.commentCount > 0);

  const commentsWithChildren = useRef([]);
  const preloadedComments = useRef([]);
  const currentPage = useRef(1);

  const _isMounted = useRef(false);

  const deleteCommentStatic = (commentID) => {
    setComments(previousComments => {
      let newComments = [];

      deepExtend(newComments, previousComments.items);

      let deletedCommentCount = 0;

      // only need top level comment count
      for (const comment of newComments) {
        if (comment.id === commentID) {
          deletedCommentCount = 1;
          break;
        }
      }

      newComments = iterateCommentsFilter(newComments, commentID);

      // console.log('ASYNC COMMENT LIST - NEW COMMENTS: ', newComments);
      // console.log('ASYNC COMMENT LIST - DELETED COMMENT COUNT: ', deletedCommentCount);

      return {
        items: newComments,
        count: previousComments.count - deletedCommentCount
      };
    });
  };

  const deleteComment = (config, callback) => {
    const deleteCommentPromise = props.deleteComment(config);

    // console.log('ASYNC COMMENT LIST - DELETE COMMENT CONFIG: ', config);

    deleteCommentPromise
    .done((response) => {
      // console.log('ASYNC COMMENT LIST - DELETE COMMENT RESPONSE: ', response);

      // comment deleted succesfully, remove comment and all its children from the comments
      if (response) {
        // remove comment from state
        deleteCommentStatic(config.comment_id);
      } else {
      // show error
        callback(false);
      }
    })
    .fail((error) => {
      // console.log('ASYNC COMMENT LIST - DELETE COMMENT ERROR: ', error);

      // show error
      callback(false);
    });
  };

  const iterateCommentsFilter = (comments, commentID) => {
    const filteredComments = comments.filter(comment => comment.id !== commentID);

    return filteredComments.map((comment) => {
      if (typeof comment.children !== 'undefined') {
        comment.children = iterateCommentsFilter(comment.children, commentID);
      }

      return comment;
    });
  };

  const iterateComments = (comments, callback, depth = 1) => {
    for (const comment of comments) {
      callback(comment, depth);

      if (typeof comment.children !== 'undefined') {
        iterateComments(comment.children, callback, depth + 1);
      }
    }
  };

  const onReplyButtonClick = (commentID) => {
    setComments(previousComments => {
      const newComments = previousComments.items.slice();

      iterateComments(newComments, (comment) => {
        comment.showReplyForm = (comment.id === commentID);
      });

      return {
        ...previousComments,
        items: newComments
      };
    });
  };

  const onCancelReplyButtonClick = () => {
    setComments(previousComments => {
      const newComments = previousComments.items.slice();

      iterateComments(newComments, (comment) => {
        comment.showReplyForm = false;
      });

      return {
        ...previousComments,
        items: newComments
      };
    });
  };

  const clearChildrenComments = (comments) => {
    for (const comment of comments) {
      if (comment.children instanceof Array && comment.children.length > 0) {
        comment.hasChildren = 0;

        iterateComments(comment.children, () => {
          comment.hasChildren++;
        });

        comment.children = [];
      }
    }
  };

  const getChildrenComments = (parentID) => {
    // console.log('ASYNC COMMENT LIST - GET CHILDREN COMMENTS FOR: ', parentID);

    for (const comment of commentsWithChildren.current) {
      if (comment.id === parentID) {
        const children = comment.children;
        // console.log('ASYNC COMMENT LIST - FOUND PARENT: ', parentID);
        // console.log('ASYNC COMMENT LIST - PARENT CHILDREN COMMENTS: ', children);
        
        setComments(previousComments => {
          const newComments = previousComments.items.slice();

          for (const newComment of newComments) {
            if (newComment.id === parentID) {
              newComment.children = children;
              newComment.hasChildren = 0;
              break;
            }
          }

          return {
            ...previousComments,
            items: newComments
          };
        });

        return;
      }
    }
  };

  const getCommentsPage = (callback) => {
    const config = {
      page: currentPage.current
    };

    // console.log('ASYNC COMMENT LIST - GET COMMENTS PAGE CONFIG: ', config);

    currentPage.current += 1;

    // console.log('ASYNC COMMENT LIST - GET COMMENTS PAGE NEXT PAGE: ', currentPage.current);

    props.getComments((requestedComments) => {
      // console.log('ASYNC COMMENT LIST - GET COMMENTS PAGE RESPONSE: ', requestedComments);

      let newRequestedComments = [];

      deepExtend(newRequestedComments, requestedComments);

      // console.log('ASYNC COMMENT LIST - COMMENTS WITH DUPLICATES (MAYBE): ', newRequestedComments);

      const newComments = newRequestedComments.slice();

      // remove duplicates (needed for on demand comment show vs pagination)
      for (let i = newRequestedComments.length - 1; i >= 0; i--) {
        const comment = newRequestedComments[i];

        for (let j = comments.items.length - 1; j >= 0; j--) {
          const newComment = comments.items[j];

          // if comment already exists at level 0, remove it
          if (comment.id === newComment.id) {
            newComments.splice(i, 1);
          }
        }
      }

      // console.log('COMMENTS WITHOUT DUPLICATES: ', newComments);

      // save original comments with children
      commentsWithChildren.current = commentsWithChildren.current.concat(requestedComments);
      // console.log('COMMENTS WITH CHILDREN: ', commentsWithChildren.current);

      // remove children comments from top level
      // and add children comment count property
      clearChildrenComments(newComments);

      // console.log('COMMENTS WITHOUT CHILDREN: ', newComments);

      callback(newComments);
    }, config);
  };

  const getMoreComments = () => {
    // dump preloaded comments if any
    if (preloadedComments.current.length > 0) {
      if (_isMounted.current) {
        setComments(previousComments => {
          const newComments = previousComments.items.concat(preloadedComments.current);

          getCommentsPage((comments) => {
            preloadedComments.current = comments;
          });

          return {
            ...previousComments,
            items: newComments
          };
        });
      }
    // get comments page and preload comments if there are any left
    } else {
      getCommentsPage((comments) => {
        if (_isMounted.current) {
          setComments(previousComments => {
            return {
              ...previousComments,
              items: previousComments.items.concat(comments)
            };
          });

          setInitialFetch(false);
        }

        getCommentsPage((comments) => {
          preloadedComments.current = comments;
        });
      });
    }
  };

  const createComment = (commentData, callback) => {
    // console.log('ASYNC COMMENT LIST - CREATE COMMENT: ', commentData);

    props.createComment(commentData, (response) => {
      // console.log('ASYNC COMMENT LIST - CREATE COMMENT RESPONSE: ', response);

      if (!response) {
        callback('An error has ocurred, please try again later');
      } else {
        callback(response);

        if (!Number.isNaN(Number.parseInt(response, 10))) { 
          newCommentCreated(response);
        }
      }
    });
  };

  const newCommentCreated = (commentID) => {
    // console.log('ASYNC COMMENT LIST - NEW COMMENT CREATED - COMMENT ID: ', commentID);

    // get created comment and update comment list state
    props.getComment(commentID, (comment) => {
      setComments(previousComments => {
        // console.log('ASYNC COMMENT LIST - GET COMMENT RESPONSE: ', comment);

        comment.showReplyForm = false;

        const newComments = previousComments.items.slice();

        let commentCount = previousComments.count;

        // if comment doesn't have parent push it to newComments array
        if (comment.parent == 0) {
          commentCount++;

          // console.log('ORDER: ', props.order);
          if (props.order === 'ASC') {
            newComments.push(comment);
          } else if (props.order === 'DESC') {
            // comment.scrollToMe = true;
            newComments.unshift(comment);
          }
        } else {
        // if comment has a parent, push it in the parents children array (create it if first child)
          iterateComments(newComments, (newComment, depth) => {
            // if found comment parent
            if (newComment.id == comment.parent) {
              // if children array doesn't exist in parent, create it
              if (typeof newComment.children === 'undefined') {
                newComment.children = [];
              }

              // insert comment as child
              if (props.order === 'ASC') {
                newComment.children.push(comment);
              } else if (props.order === 'DESC') {
                // comment.scrollToMe = true;
                newComment.children.unshift(comment);
              }

              // hide parent comment reply form
              newComment.showReplyForm = false;

              // don't continue searching
              return;
            }
          });
        }

        // console.log('ASYNC COMMENT LIST - NEW COMMENTS: ', newComments);

        return {
          items: newComments,
          count: commentCount
        };
      });
    });
  };

  const updateComment = (commentData, callback) => {
    const updateCommentPromise = props.updateComment(commentData);

    updateCommentPromise
    .done((response) => {
      // console.log('ASYNC COMMENT LIST - UPDATE COMMENT - RESPONSE: ', response);

      props.getComment(commentData.id, (updatedCommentData) => {
        // console.log('ASYNC COMMENT LIST - GET UPDATED COMMENT - RESPONSE: ', updatedCommentData);

        onCommentUpdate(updatedCommentData);

        callback();
      });
    })
    .fail((error) => {
      // console.log('ASYNC COMMENT LIST - UPDATE COMMENT - ERROR: ', error);
    });
  };

  const onCommentUpdate = (newCommentData) => {
    // console.log('ASYNC COMMENT LIST - ON COMMENT UPDATE - NEW COMMENT DATA: ', newCommentData);

    setComments(previousComments => {
      return {
        ...previousComments,
        items: updateComments(previousComments.items, newCommentData)
      }
    });
  };

  useEffect(() => {
    if (!_isMounted.current) {
      _isMounted.current = true;
    }

    return () => {
      _isMounted.current = false;
    };
  }, []);

  useEffect(() => {
    if (props.commentCount > 0) {
      props.getCommentCount((commentCount) => {
        setComments(previousComments => {
          return {
            ...previousComments,
            count: commentCount
          };
        });
        
        getMoreComments();
      });
    }
  }, []);

  let commentForm;

  if (props.allowGuest) {
    commentForm = <CommentFormGuest createComment={createComment} />;
  }

  if (props.user) {
    if (props.replyType === 'quick') {
      commentForm = <CommentForm user={props.user} userFriends={props.user.friends} createComment={createComment} />;
    } else {
      commentForm = <CommentFormBig user={props.user} userFriends={props.user.friends} createComment={createComment} />;
    }
  }

  let userCanComment = props.user;

  const isActivityComment = props.postType === 'activity',
        isGroupActivityComment = isActivityComment && (props.parentData.component === 'groups');

  // if user is not admin and this comment belongs to a group
  if (!vikinger_constants.settings.current_user_is_admin && props.user && isGroupActivityComment) {
    const groupable = groupUtils(props.user, props.parentData.group);

    userCanComment = groupable.isGroupMember() && !groupable.isBannedFromGroup();
  }

  return (
    <div className="post-comments">
    {
      initialFetch &&
        <LoaderSpinner />
    }

    {
      !initialFetch &&
        <React.Fragment>
        {
          !props.disableComments && (props.formPosition === 'top') && userCanComment &&
            commentForm
        }
        {
          (comments.items.length > 0) &&
            <CommentList  comments={comments.items}
                          user={props.user}
                          userCanComment={userCanComment}
                          createComment={createComment}
                          onReplyButtonClick={onReplyButtonClick}
                          onCancelReplyButtonClick={onCancelReplyButtonClick}
                          commentCount={comments.count}
                          getMoreComments={getMoreComments}
                          getChildrenComments={getChildrenComments}
                          entityData={props.entityData}
                          parentData={props.parentData}
                          reactions={props.reactions}
                          reactionable={props.reactionable}
                          onCommentUpdate={onCommentUpdate}
                          postType={props.postType}
                          showVerifiedBadge={props.showVerifiedBadge}
                          updateComment={updateComment}
                          deleteComment={deleteComment}
                          disableComments={props.disableComments}
                          activityAds={props.activityAds}
              />
        }
        {
          !props.disableComments && (props.formPosition === 'bottom') && userCanComment &&
            commentForm
        }
        </React.Fragment>
    }
    </div>
  );
}

export { AsyncCommentList as default };