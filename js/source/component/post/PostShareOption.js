import React, { useRef, useEffect, useLayoutEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import ActivityForm from '../activity/activity-form/ActivityForm';

import { createPopup } from '../../utils/plugins';

function PostShareOption(props) {
  const shareBoxRef = useRef(null);
  const shareBoxTriggerRef = useRef(null);

  const popup = useRef(null);

  useLayoutEffect(() => {
    popup.current = createPopup({
      triggerElement: shareBoxTriggerRef.current,
      premadeContentElement: shareBoxRef.current,
      type: 'premade',
      popupSelectors: ['share-box-popup', 'animate-slide-down'],
      onOverlayCreate: function (overlay) {
        overlay.setAttribute('data-simplebar', '');
      }
    });
  }, []);

  useEffect(() => {
    if ((props.postType === 'activity') && vikinger_constants.settings.newsfeed_yt_playback_limit === 'yes') {
      shareBoxTriggerRef.current.addEventListener('mousedown', props.onPlay);
    }

    return () => {
      if ((props.postType === 'activity') && vikinger_constants.settings.newsfeed_yt_playback_limit === 'yes') {
        shareBoxTriggerRef.current.removeEventListener('mousedown', props.onPlay);
      }
    };
  });

  return (
    <div className="post-option-wrap">
      <div ref={shareBoxTriggerRef} className="post-option">
        <IconSVG  icon="share"
                  modifiers="post-option-icon"
        />

        <p className="post-option-text">{vikinger_translation.share_action}</p>
      </div>

      <ActivityForm forwardedRef={shareBoxRef}
                    user={props.user}
                    onSubmit={props.onShare}
                    shareData={props.shareData}
                    popup={popup}
      />
    </div>
  );
}

export { PostShareOption as default };