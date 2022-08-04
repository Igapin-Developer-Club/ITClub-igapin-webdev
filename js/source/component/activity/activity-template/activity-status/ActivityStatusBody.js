import React, { useRef } from 'react';

import PictureCollage from '../../../picture/PictureCollage';

import VideoPreview from '../../../video/VideoPreview';

import ActivityMediaPopup from '../../activity-popup/ActivityMediaPopup';

import YTPlayer from '../../../iframe/YTPlayer';

import { getMediaLink } from '../../../../utils/core';

import { filterActivityContentForDisplay } from '../../../utils/activity/activity-filter';

function ActivityStatusBody(props) {
  const activityMediaPopupTriggerRef = useRef(null);

  const onPlay = () => {
    props.onPlay(props.data.id);
  };

  const bbPressActivity = (props.data.component === 'bbpress') || (props.data.type === 'bbp_topic_create') || (props.data.type === 'bbp_reply_create');

  const filteredActivityContent = filterActivityContentForDisplay(props.data.content);

  return (
    <div className="widget-box-status-content">
    {
      (props.data.content !== '') && !props.editForm &&
        <React.Fragment>
        {
          bbPressActivity &&
            <div className="widget-box-status-html-content" dangerouslySetInnerHTML={{__html: filteredActivityContent}}></div>
        }

        {
          !bbPressActivity &&
            <p className="widget-box-status-text" dangerouslySetInnerHTML={{__html: filteredActivityContent}}></p>
        }
        </React.Fragment>
    }

    {
      props.data.uploaded_media && (props.data.uploaded_media.data.length > 1) &&
        <PictureCollage data={props.data.uploaded_media.data}
                        metadata={props.data.uploaded_media.metadata}
                        user={props.user}
                        reactions={props.reactions}
                        noPopup={props.simpleActivity}
                        onActivityUpdate={props.onActivityUpdate}
        />
    }

    {
      props.data.uploaded_media && (props.data.uploaded_media.data.length === 1) &&
        <React.Fragment>
        {
          ((props.data.type === 'activity_video_update') || (props.data.type === 'activity_video_upload')) &&
            <VideoPreview src={props.data.uploaded_media.data[0].media.link} />
        }
        {
          ((props.data.type === 'activity_media_update') || (props.data.type === 'activity_media_upload')) &&
            <React.Fragment>
              <figure ref={activityMediaPopupTriggerRef} className="widget-box-picture">
                <img src={props.data.uploaded_media.data[0].media.link} alt={props.data.uploaded_media.data[0].media.name} />
              </figure>

            {
              !props.simpleActivity &&
                <ActivityMediaPopup data={props.data.uploaded_media.data[0]}
                                    user={props.user}
                                    reactions={props.reactions}
                                    activityMediaPopupTriggerRef={activityMediaPopupTriggerRef}
                                    onActivityUpdate={props.onActivityUpdate}
                />
            }
            </React.Fragment>
        }
        </React.Fragment>
    }

    {
      props.data.meta.attached_media_type && props.data.meta.attached_media_id &&
        <div className="iframe-wrap">
        {
          (props.data.meta.attached_media_type[0] === 'youtube') &&
            <React.Fragment>
            {
              (vikinger_constants.settings.newsfeed_yt_playback_limit === 'yes') && !props.sharePopupActivity &&
                <YTPlayer videoID={props.data.meta.attached_media_id[0]}
                          stop={props.data.meta.attached_media_stop}
                          onPlay={onPlay}
                />
            }
            {
              ((vikinger_constants.settings.newsfeed_yt_playback_limit === 'no') || props.sharePopupActivity) &&
                <iframe src={getMediaLink(props.data.meta.attached_media_type[0], props.data.meta.attached_media_id[0])} allowFullScreen></iframe>
            }
            </React.Fragment>
        }
        
        {
          (props.data.meta.attached_media_type[0] !== 'youtube') &&
            <iframe src={getMediaLink(props.data.meta.attached_media_type[0], props.data.meta.attached_media_id[0])} allowFullScreen></iframe>
        }
        </div>
    }
    </div>
  );
}

export { ActivityStatusBody as default };