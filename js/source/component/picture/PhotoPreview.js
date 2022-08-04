import React, { useRef } from 'react';

import Checkbox from '../form/Checkbox';

import IconSVG from '../icon/IconSVG';

import ActivityMediaPopup from '../activity/activity-popup/ActivityMediaPopup';

function PhotoPreview(props) {
  const activityMediaPopupTriggerRef = useRef(null);

  return (
    <div className="photo-preview-wrap">
      <div className={`photo-preview ${props.modifiers || ''}`}>
        <div className="photo-preview-image" style={{background: `url('${props.data.media.link}') center center / cover no-repeat`}}></div>

        {
          props.selectable &&
            <Checkbox active={props.selected}
                      toggleActive={props.toggleSelectableActive}
            />
        }
    
        {/* PHOTO PREVIEW INFO */}
        <div ref={activityMediaPopupTriggerRef} className="photo-preview-info">
          {/* REACTION COUNT LIST */}
          <div className="reaction-count-list">
          {
            vikinger_constants.plugin_active.vkreact && vikinger_constants.plugin_active['vkreact-buddypress'] &&
              <div className="reaction-count negative">
                <IconSVG  icon="thumbs-up"
                          modifiers="reaction-count-icon"
                />
      
                <p className="reaction-count-text">{props.data.reactions.length}</p>
              </div>
          }

            <div className="reaction-count negative">
              <IconSVG  icon="comment"
                        modifiers="reaction-count-icon"
              />
    
              <p className="reaction-count-text">{props.data.comment_count}</p>
            </div>
          </div>
          {/* REACTION COUNT LIST */}
        </div>
        {/* PHOTO PREVIEW INFO */}
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

export { PhotoPreview as default };