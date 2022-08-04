import React from 'react';

import ReactionMetaLine from '../reaction/ReactionMetaLine';
import ReactionOptionComment from '../reaction/reaction-option/reaction-option-comment/ReactionOptionComment';

import CommentSettings from './CommentSettings';

import EditedByStatus from '../user-status/user-status-edited-by/EditedByStatus';

import { getUserCommentPermissions } from '../utils/comment/comment-permission';

function CommentActions(props) {
  const parentActivityGroup = props.parentData ? props.parentData.group : false;
  const userCommentPermissions = getUserCommentPermissions(props.user, props.data, parentActivityGroup);

  return (
    <div className="content-actions">
      <div className="content-action">
      {
        props.reactionData.length > 0 &&
          <ReactionMetaLine modifiers="small"
                            data={props.reactionData}
          />
      }
      
      {
        props.user &&
        ((props.postType === 'post' && vikinger_constants.plugin_active.vkreact) ||
        (props.postType === 'activity' && vikinger_constants.plugin_active.vkreact && vikinger_constants.plugin_active['vkreact-buddypress'])) &&
          <ReactionOptionComment  reactions={props.reactions}
                                  userReaction={props.userReaction}
                                  createUserReaction={props.createUserReaction}
                                  deleteUserReaction={props.deleteUserReaction}
          />
      }
        
      {
        props.allowReply &&
          <React.Fragment>
          {
            !props.data.showReplyForm &&
              <div className="meta-line">
                <p className="meta-line-link light" onClick={props.onReplyButtonClick}>{vikinger_translation.reply_action}</p>
              </div>
          }
          {
            props.data.showReplyForm &&
              <div className="meta-line">
                <p className="meta-line-link light" onClick={props.onCancelReplyButtonClick}>{vikinger_translation.cancel_action}</p>
              </div>
          }
          </React.Fragment>
      }

      {
        userCommentPermissions.settings &&
          <div className="meta-line settings">
            <CommentSettings  data={props.data}
                              editingComment={props.editingComment}
                              startEditingComment={props.startEditingComment}
                              stopEditingComment={props.stopEditingComment}
                              deleteComment={props.deleteComment}
                              userCommentPermissions={userCommentPermissions}
            />
          </div>
      }

        <div className="meta-line">
          <p className="meta-line-timestamp">
          { props.data.timestamp }
          {
            props.data.last_edited &&
              <EditedByStatus user={props.data.last_edited.user} />
          }
          </p>
        </div>
      </div>
    </div>
  );
}

export { CommentActions as default };