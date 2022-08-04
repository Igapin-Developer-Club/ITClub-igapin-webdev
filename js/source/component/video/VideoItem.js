import React, { useRef } from 'react';

import Checkbox from '../form/Checkbox';

import IconSVG from '../icon/IconSVG';

import ActivityMediaPopup from '../activity/activity-popup/ActivityMediaPopup';

function VideoItem(props) {
  const activityMediaPopupTriggerRef = useRef(null);

  return (
    <div className="video-box-wrap">
      <div className={`video-box ${props.modifiers || ''}`}>
        {
          props.selectable &&
            <Checkbox active={props.selected} toggleActive={props.toggleSelectableActive} />
        }

        {/* VIDEO BOX COVER */}
        <div ref={activityMediaPopupTriggerRef} className="video-box-cover">
          <div className="video-wrap">
            <video src={props.data.media.link}></video>
          </div>

          <div className="play-button">
            <IconSVG  icon="play"
                      modifiers="play-button-icon"
            />
          </div>
        </div>
        {/* VIDEO BOX COVER */}
      </div>

      {
        !(props.noPopup) &&
          <div>
            <ActivityMediaPopup data={props.data}
                                user={props.user}
                                reactions={props.reactions}
                                activityMediaPopupTriggerRef={activityMediaPopupTriggerRef}
                                onActivityUpdate={props.onActivityUpdate}
            />
          </div>
      }
    </div>
  );
}

export { VideoItem as default };