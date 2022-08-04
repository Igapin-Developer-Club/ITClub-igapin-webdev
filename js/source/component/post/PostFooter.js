import React, { useState } from 'react';

import ContentActions from '../content-actions/ContentActions';

import PostShareOption from './PostShareOption';

import ReactionOptionPost from '../reaction/reaction-option/reaction-option-post/ReactionOptionPost';

import IconSVG from '../icon/IconSVG';

import * as activityRouter from '../../router/activity/activity-router';

import { activityPermissions } from '../utils/membership';

function PostFooter(props) {
  const [commentCount, setCommentCount] = useState(props.commentCount);
  const [shareCount, setShareCount] = useState(props.shareCount);

  const onShare = (data, callback) => {
    // console.log('POST FOOTER - SHARE DATA: ', data);

    const itemID = Number.parseInt(data.postIn, 10);

    // post public by default
    let hideSitewide = false;

    // if posting to a group, get group privacy to set hideSitewide
    if (itemID !== 0) {
      for (const group of props.user.groups) {
        // user is a member of the group
        if (group.id === itemID) {
          // hide sitewide if not public group
          hideSitewide = group.status !== 'public';
          break;
        }
      }
    }

    const activityData = {
      creation_config: {
        item_id: itemID,
        secondary_item_id: props.shareData.id,
        component: itemID === 0 ? 'activity' : 'groups',
        type: `${props.shareType}_share`,
        content: data.text.trim(),
        hide_sitewide: hideSitewide
      },
      share_config: {
        id: props.shareData.id,
        type: props.shareType,
        count: shareCount + 1
      }
    };

    // console.log('POST FOOTER - SHARE: ', activityData);

    activityRouter.createActivity(activityData, (response) => {
      // activity created successfully
      if (response) {
        // update feed to show shared activity dynamically on share
        if (props.onShare) {
          props.onShare(response, itemID, callback);
        } else {
          callback(response);
        }

        // increment share count
        setShareCount(previousShareCount => {
          return previousShareCount + 1;
        });
      } else {
        callback(response);
      }
    });
  };

  const updateCommentCount = (value) => {
    setCommentCount(previousCommentCount => {
      return previousCommentCount + value;
    });
  };

  return (
    <div className="post-footer">
      <ContentActions commentCount={commentCount}
                      shareData={props.shareData}
                      shareCount={shareCount}
                      reactionData={props.reactionData}
      />

    {
      !props.disableActions && props.user &&
        <div className="post-options">
        {
          ((props.postType === 'post' && vikinger_constants.plugin_active.vkreact) ||
          (props.postType === 'activity' && vikinger_constants.plugin_active.vkreact && vikinger_constants.plugin_active['vkreact-buddypress'])) &&
            <ReactionOptionPost reactions={props.reactions}
                                userReaction={props.userReaction}
                                createUserReaction={props.createUserReaction}
                                deleteUserReaction={props.deleteUserReaction}
                                simpleOptions={props.simpleOptions}
            />
        }

          {/* POST OPTION */}
          <div className={`post-option active ${props.simpleOptions ? 'no-text' : ''}`}>
            <IconSVG  icon="comment"
                      modifiers="post-option-icon"
            />
    
          {
            !props.simpleOptions &&
              <p className="post-option-text">{vikinger_translation.comment_action}</p>
          }
          </div>
          {/* POST OPTION */}

        {
          activityPermissions.createActivity && props.shareData && vikinger_constants.plugin_active.buddypress &&
            <PostShareOption  user={props.user}
                              shareData={props.shareData}
                              onShare={onShare}
                              onPlay={props.onPlay}
                              postType={props.postType}
              />
        }
        </div>
    }

    { props.children(updateCommentCount) }
    </div>
  );
}

export { PostFooter as default };