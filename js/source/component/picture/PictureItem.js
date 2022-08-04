import React, { useRef } from 'react';

import ActivityMediaPopup from '../activity/activity-popup/ActivityMediaPopup';

function PictureItem(props) {
  const activityMediaPopupTriggerRef = useRef(null);

  return (
    <div className="picture-item-wrap">
      <div ref={activityMediaPopupTriggerRef} className="picture-item">
        <div className="picture round" style={{background: `url('${props.data.media.link}') center center / cover no-repeat`}}></div>
        {
          props.moreItems &&
            <a className="picture-item-overlay round" href={props.user.media_link}>
              <p className="picture-item-overlay-text">+</p>
            </a>
        }
      </div>
      {
        !(props.noPopup) &&
          <div>
            <ActivityMediaPopup data={props.data}
                                user={props.loggedUser}
                                reactions={props.reactions}
                                activityMediaPopupTriggerRef={activityMediaPopupTriggerRef}
                                onActivityUpdate={props.onActivityUpdate}
            />
          </div>
      }
    </div>
  );
}

export { PictureItem as default };