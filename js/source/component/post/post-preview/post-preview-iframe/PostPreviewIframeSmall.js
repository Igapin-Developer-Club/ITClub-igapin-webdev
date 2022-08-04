import React, { useRef, useEffect } from 'react';

import ContentActions from '../../../content-actions/ContentActions';

import IconSVG from '../../../icon/IconSVG';

import { truncateText } from '../../../../utils/core';
import { createPopup } from '../../../../utils/plugins';

function PostPreviewIframeSmall(props) {
  const titleWordLimit = 75;

  const coverStyle = props.data.cover_url ? {background: `url(${props.data.cover_url}) center center / cover no-repeat`} : {};

  const categories = props.data.categories.slice(0, 3);

  const iframePopupRef = useRef(null);

  useEffect(() => {
    createPopup({
      triggerElement: iframePopupRef.current,
      type: 'iframe'
    });
  }, []);

  return (
    <div className="post-preview small post-preview-type-iframe animate-slide-down">
      {/* POST PREVIEW IMAGE */}
      <a ref={iframePopupRef} data-iframe-url={props.data.format === 'video' ? props.data.video_url : props.data.audio_url}>
        <div className="post-preview-image" style={coverStyle}>
        {
          props.data.format === 'video' &&
          <div className="post-preview-image-action play-button medium">
            <IconSVG  icon="play"
                      modifiers="play-button-icon medium"
            />
          </div>
        }
        {
          props.data.format === 'audio' &&
          <div className="post-preview-image-action play-button medium centered">
            <IconSVG  icon="speaker"
                      modifiers="play-button-icon"
            />
          </div>
        }
        </div>
      </a>
      {/* POST PREVIEW IMAGE */}

      {/* POST PREVIEW INFO */}
      <div className="post-preview-info">
        <div className="post-preview-info-top">
          <p className="post-preview-timestamp">
            {
              categories.map((category) => {
                return (
                  <span key={category.id}><a href={category.link}>{category.name}</a> - </span>
                );
              })
            }
            {props.data.timestamp}
          </p>
          <p className="post-preview-title"><a href={props.data.permalink}>{truncateText(props.data.title, titleWordLimit)}</a></p>
        </div>
      </div>
      {/* POST PREVIEW INFO */}

      {/* CONTENT ACTIONS */}
      <ContentActions reactionData={props.data.reactions}
                      link={props.data.permalink}
                      commentCount={props.data.comment_count}
                      shareCount={props.data.share_count}
      />
      {/* CONTENT ACTIONS */}
    </div>
  );
}

export { PostPreviewIframeSmall as default };