import React, { useState, useRef, useEffect } from 'react';

import Avatar from '../avatar/Avatar';

import CommentForm from './comment-form/CommentForm';
import CommentFormGuest from './comment-form/CommentFormGuest';
import CommentFormSimple from './comment-form/CommentFormSimple';

import CommentActions from './CommentActions';

import BadgeVerified from '../badge/BadgeVerified';

import UserStatusLevel from '../user-status/user-status-level/UserStatusLevel';

import { filterCommentContentForDisplay, filterCommentContentForSave } from '../utils/comment/comment-filter';

import { getAdsForPlacementIndex } from '../utils/ads';

function Comment(props) {
  const [editingComment, setEditingComment] = useState(false);

  const adsForContentCommentPlacement = getAdsForPlacementIndex(props.activityAds, 'bp_activity_entry_comments', props.commentIndex);

  const commentRef = useRef(null);

  useEffect(() => {
    if (props.data.scrollToMe) {
      commentRef.current.scrollIntoView();
    }
  }, []);

  const deleteComment = () => {
    props.deleteComment({ comment_id: props.data.id });
  };

  const onReplyButtonClick = () => {
    props.onReplyButtonClick(props.data.id);
  };

  const startEditingComment = () => {
    setEditingComment(true);
  };

  const stopEditingComment = () => {
    setEditingComment(false);
  };

  const updateComment = (text) => {
    const commentContent = filterCommentContentForSave(text);
    
    const commentData = {
      ...props.data,
      content: commentContent
    };

    // console.log('COMMENT - UPDATE COMMENT - CONFIG: ', commentData);

    props.updateComment(commentData, stopEditingComment);
  };

  let commentForm;

  if (props.allowGuest) {
    commentForm = <CommentFormGuest parent={props.data.id}
                                    createComment={props.createComment}
                  />;
  }

  if (props.user) {
    commentForm = <CommentForm  user={props.user}
                                parent={props.data.id}
                                createComment={props.createComment}
                                focus={true}
                  />;
  }

  const replyForm = props.data.showReplyForm ? commentForm : '';

  const displayVerifiedMemberBadge = props.showVerifiedBadge && props.data.author.verified;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && props.data.author.membership;

  const filteredCommentContent = filterCommentContentForDisplay(props.data.content);

  return (
    <div ref={commentRef} className={`post-comment animate-slide-down reply-${props.depth || 1}`}>
    {
      (!props.data.type || (props.data.type === 'comment') || (props.data.type === 'activity_comment')) &&
        <Avatar size="small"
                data={props.data.author}
                noBorder
                noLink={props.data.author.link === ''}
        />
    }

      {/* POST COMMENT TEXT */}
      <div className={`post-comment-text ${editingComment ? 'post-comment-text-editing' : ''}`}>
      {
        (props.data.author.link !== '') &&
          <a className="post-comment-text-author" href={props.data.author.link}>{props.data.author.name}</a>
      }
      {
        (props.data.author.link === '') &&
          <span className="post-comment-text-author">{props.data.author.name}</span>
      }
      {
        displayVerifiedMemberBadge &&
          <BadgeVerified />
      }
      {
        displayMembershipTag &&
          <UserStatusLevel  name={props.data.author.membership.name}
                            size="small"
          />
      }
      {
        !editingComment &&
          <div className="post-comment-text-content" dangerouslySetInnerHTML={{__html: filteredCommentContent}}></div>
      }
      {
        editingComment &&
          <CommentFormSimple  text={props.data.content}
                              user={props.user}
                              parent={props.data.id}
                              onSubmit={updateComment}
                              onDiscard={stopEditingComment}
                              focus={true}
          />
      }
      </div>
      {/* POST COMMENT TEXT */}

      {
        adsForContentCommentPlacement && adsForContentCommentPlacement
      }

      <CommentActions data={props.data}
                      parentData={props.parentData}
                      allowReply={!props.disableComments && (props.user || props.allowGuest) && props.userCanComment}
                      user={props.user}
                      userCanComment={props.userCanComment}
                      onReplyButtonClick={onReplyButtonClick}
                      onCancelReplyButtonClick={props.onCancelReplyButtonClick}
                      reactions={props.reactions}
                      reactionData={props.reactionData}
                      userReaction={props.userReaction}
                      createUserReaction={props.createUserReaction}
                      deleteUserReaction={props.deleteUserReaction}
                      postType={props.postType}
                      editingComment={editingComment}
                      startEditingComment={startEditingComment}
                      stopEditingComment={stopEditingComment}
                      deleteComment={deleteComment}
      />

    { replyForm }
    
    {
      props.data.approved == '0' &&
        <p className="post-comment-notification">{vikinger_translation.comment_not_approved_message}</p>
    }
    </div>
  );
}

export { Comment as default };