import React, { useRef, useLayoutEffect } from 'react';

import ActivityCommentList from '../../comment/ActivityCommentList';

import PostFooter from '../../post/PostFooter';

import VideoPreview from '../../video/VideoPreview';

import SimpleBar from 'simplebar-react';

import { createPopup } from '../../../utils/plugins';

import { getActivityTemplate } from '../../utils/activity/activity-template';
import { updateActivityReactions } from '../../utils/activity/activity-data';

import groupUtils from'../../utils/group';

import { ActivityReactionable } from '../../utils/reaction';

function ActivityMediaPopup(props) {
  const activityReactionableProps = {
    entityData: { activity_id: props.data.id },
    user: props.user,
    reactions: props.reactions,
    reactionData: props.data.reactions,
    onUserReactionUpdate: (newReactionData) => {
      const newActivityData = updateActivityReactions(props.data, newReactionData);

      props.onActivityUpdate(newActivityData);
    }
  };

  const activityReactionable = ActivityReactionable(activityReactionableProps);

  const activityMediaPopupRef = useRef(null);

  const simplebarStyles = useRef({overflowX: 'hidden', height: '100%'});

  const popup = useRef(null);

  useLayoutEffect(() => {
    popup.current = createPopup({
      triggerElement: props.activityMediaPopupTriggerRef.current,
      premadeContentElement: activityMediaPopupRef.current,
      type: 'premade',
      popupSelectors: ['activity-media-popup', 'animate-slide-down']
    });
  }, []);

  const isGroupActivity = props.data.component === 'groups';

  const ActivityTemplate = getActivityTemplate(props.data.type)({
    data: props.data,
    user: props.user,
    reactions: props.reactions,
    onActivityUpdate: props.onActivityUpdate
  });

  let userCanUseSettings = props.user;

  // if this activity belongs to a group
  if (props.user && isGroupActivity && props.data.group) {
    const groupable = groupUtils(props.user, props.data.group);

    userCanUseSettings = !groupable.isBannedFromGroup();
  }

  return (
    <div ref={activityMediaPopupRef} className="popup-picture">
      {/* WIDGET BOX */}
      <div className="widget-box no-padding no-settings">
        <SimpleBar style={simplebarStyles.current}>
        { ActivityTemplate }

        {
          userCanUseSettings &&
            <PostFooter commentCount={props.data.comment_count}
                        shareData={false}
                        simpleOptions={true}
                        user={props.user}
                        reactions={props.reactions}
                        reactionData={props.data.reactions}
                        userReaction={activityReactionable.getUserReaction()}
                        createUserReaction={activityReactionable.createUserReaction}
                        deleteUserReaction={activityReactionable.deleteUserReaction}
                        postType='activity'
            >
              {
                (updateCommentCount) => {
                  return (
                    <ActivityCommentList  activityID={props.data.id}
                                          parentData={props.data}
                                          comments={props.data.comments}
                                          updateCommentCount={updateCommentCount}
                                          user={props.user}
                                          reactions={props.reactions}
                                          perPage={2}
                                          order='DESC'
                                          replyType='quick'
                                          formPosition='top'
                    />
                  );
                }
              }
            </PostFooter>
        }
        </SimpleBar>
      </div>
      {/* WIDGET BOX */}

      {/* POPUP PICTURE IMAGE WRAP */}
      <div className="popup-picture-image-wrap">
      {
        (props.data.type === 'activity_media') &&
          <img className="popup-picture-image" src={props.data.media.link} alt={props.data.media.name} />
      }
      {
        (props.data.type === 'activity_video') &&
          <VideoPreview src={props.data.media.link} />
      }
      </div>
      {/* POPUP PICTURE IMAGE WRAP */}
    </div>
  );
}

export { ActivityMediaPopup as default };