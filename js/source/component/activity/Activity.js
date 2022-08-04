import React, { useState, useRef, useEffect } from 'react';

import TagSticker from '../tag/TagSticker';

import ActivityFormSimple from './activity-form/ActivityFormSimple';
import ActivitySettings from './ActivitySettings';

import PostFooter from '../post/PostFooter';

import ActivityCommentList from '../comment/ActivityCommentList';

import * as activityRouter from '../../router/activity/activity-router';

import { getActivityTemplate } from '../utils/activity/activity-template';
import { filterActivityContentForSave } from '../utils/activity/activity-filter';
import { getUserActivityPermissions } from '../utils/activity/activity-permission';
import { updateActivityReactions } from '../utils/activity/activity-data';

import { ActivityReactionable } from '../utils/reaction';

import { getAdsForPlacementIndex } from '../utils/ads';

function Activity(props) {
  const [favorite, setFavorite] = useState(props.data.favorite);
  const [showMore, setShowMore] = useState(false);
  const [showingMore, setShowingMore] = useState(false);
  const [editingActivity, setEditingActivity] = useState(false);
  const [processingDelete, setProcessingDelete] = useState(false);
  const [processingFavorite, setProcessingFavorite] = useState(false);
  const [processingPinned, setProcessingPinned] = useState(false);

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

  const adsForContentActivityPlacement = getAdsForPlacementIndex(props.activityAds, 'bp_activity_entry_content', props.activityIndex);

  const showMoreSettingIsEnabled = vikinger_constants.settings.activity_show_more_status === 'enabled';
  const widgetBoxStatusRef = useRef(null);

  const showMoreActivity = () => {
    setShowingMore(true);

    widgetBoxStatusRef.current.classList.remove('widget-box-status-limited');
    widgetBoxStatusRef.current.style.maxHeight = '100%';
  };

  const showLessActivity = () => {
    setShowingMore(false);

    widgetBoxStatusRef.current.classList.add('widget-box-status-limited');
    widgetBoxStatusRef.current.style.maxHeight = `${vikinger_constants.settings.activity_show_more_height}px`;
  };

  const attachShowMoreElement = () => {
    setShowMore(true);
    
    showLessActivity();
  };

  useEffect(() => {
    if (showMoreSettingIsEnabled && widgetBoxStatusRef.current && widgetBoxStatusRef.current.offsetHeight > vikinger_constants.settings.activity_show_more_height) {
      attachShowMoreElement();
    }
  }, []);

  const deleteActivity = () => {
    if (processingDelete) {
      return;
    }

    setProcessingDelete(true);

    // console.log('ACTIVITY - DELETE ACTIVITY ID: ', props.data.id, 'FROM USER: ', props.user.id);

    props.deleteActivity(props.data.id, (response) => {
      setProcessingDelete(false);
    });
  };

  const pinActivity = () => {
    if (processingPinned) {
      return;
    }

    setProcessingPinned(true);

    // console.log('ACTIVITY - PIN ACTIVITY ID: ', props.data.id, 'FROM USER: ', props.user.id);

    props.pinActivity(props.data.id, () => {
      setProcessingPinned(false);
    });
  };

  const unpinActivity = () => {
    if (processingPinned) {
      return;
    }

    setProcessingPinned(true);

    // console.log('ACTIVITY - UNPIN ACTIVITY ID: ', props.data.id, 'FROM USER: ', props.user.id);

    props.unpinActivity(() => {
      setProcessingPinned(false);
    });
  };

  const addFavorite = () => {
    if (processingFavorite) {
      return;
    }

    // console.log('ACTIVITY - ADD FAVORITE ACTIVITY ID: ', props.data.id, 'FROM USER: ', props.user.id);

    setProcessingFavorite(true);

    const config = {
      userID: props.user.id,
      activityID: props.data.id
    };

    activityRouter.addActivityFavorite(config, (response) => {
      // console.log('ACTIVITY - FAVORITE ADD RESPONSE: ', response);

      if (response) {
        setFavorite(true);
      }

      setProcessingFavorite(false);
    });
  };

  const removeFavorite = () => {
    if (processingFavorite) {
      return;
    }

    // console.log('ACTIVITY - REMOVE FAVORITE ACTIVITY ID: ', props.data.id, 'FROM USER: ', props.user.id);

    setProcessingFavorite(true);

    const config = {
      userID: props.user.id,
      activityID: props.data.id
    };
    
    activityRouter.removeActivityFavorite(config, (response) => {
      // console.log('ACTIVITY - FAVORITE REMOVE RESPONSE: ', response);

      if (response) {
        setFavorite(false);
      }

      setProcessingFavorite(false);
    });
  };

  const startEditingActivity = () => {
    setEditingActivity(true);
  };

  const stopEditingActivity = () => {
    setEditingActivity(false);
  };

  const updateActivity = (text) => {
    const activityContent = filterActivityContentForSave(text);

    const activityData = {
      id: props.data.id,
      component: props.data.component,
      type: props.data.type,
      user_id: props.data.author.id,
      content: activityContent,
      recorded_time: props.data.date,
      item_id: props.data.item_id,
      secondary_item_id: props.data.secondary_item_id,
      hidden: props.data.hide_sitewide === 1
    };

    props.updateActivity(activityData, stopEditingActivity);
  };

  const ActivityEditForm = (
    <ActivityFormSimple text={props.data.content}
                        user={props.user}
                        focus
                        onSubmit={updateActivity}
                        onDiscard={stopEditingActivity}
    />
  );

  const ActivityTemplate = getActivityTemplate(props.data.type)({
    data: props.data,
    user: props.user,
    reactions: props.reactions,
    onPlay: props.onPlay,
    widgetBoxStatusRef: widgetBoxStatusRef,
    onActivityUpdate: props.onActivityUpdate,
    editForm: editingActivity ? ActivityEditForm : false
  });

  const activityIsPinned = props.pinnedActivityID && (props.pinnedActivityID === props.data.id);
  const userActivityPermissions = getUserActivityPermissions(props.user, props.data, props.profileUserID);

  return (
    <div className={`widget-box no-padding animate-slide-down ${processingDelete ? 'widget-box-deleted' : ''}`}>
      {/* TAG STICKERS */}
      <div className="tag-stickers">
      {
        favorite &&
          <TagSticker icon='favorite' iconModifiers='tertiary' modifiers='small animate-slide-down' />
      }
      {
        (props.data.hide_sitewide === 1) &&
          <TagSticker icon='private' iconModifiers='secondary' modifiers='small animate-slide-down' />
      }
      {
        activityIsPinned &&
          <TagSticker icon='pinned' iconModifiers='primary' modifiers='small animate-slide-down' />
      }
      </div>
      {/* TAG STICKERS */}

    {
      props.user && userActivityPermissions.settings && !editingActivity &&
        <ActivitySettings userActivityPermissions={userActivityPermissions}
                          favorite={favorite}
                          pinned={activityIsPinned}
                          addFavorite={addFavorite}
                          removeFavorite={removeFavorite}
                          processingFavorite={processingFavorite}
                          pinActivity={pinActivity}
                          unpinActivity={unpinActivity}
                          processingPinned={processingPinned}
                          startEditingActivity={startEditingActivity}
                          deleteActivity={deleteActivity}
                          processingDelete={processingDelete}
        />
    }

    { ActivityTemplate }

    {
      showMoreSettingIsEnabled && showMore && !showingMore &&
        <p className="button-show-more" onClick={showMoreActivity}>{vikinger_translation.show_more}</p>
    }

    {
      adsForContentActivityPlacement && adsForContentActivityPlacement
    }

      <PostFooter commentCount={props.data.comment_count}
                  shareType='activity'
                  shareData={props.data}
                  shareCount={Number.parseInt(props.data.meta.share_count, 10) || 0}
                  onShare={props.onShare}
                  user={props.user}
                  reactions={props.reactions}
                  reactionData={props.data.reactions}
                  userReaction={activityReactionable.getUserReaction()}
                  createUserReaction={activityReactionable.createUserReaction}
                  deleteUserReaction={activityReactionable.deleteUserReaction}
                  postType='activity'
                  onPlay={props.onPlay}
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
                                  activityAds={props.activityAds}
            />
          );
        }
      }
      </PostFooter>
    </div>
  );
}

export { Activity as default };