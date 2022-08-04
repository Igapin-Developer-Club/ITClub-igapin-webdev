import React from 'react';

import ReactionMetaLine from '../reaction/ReactionMetaLine';

function ContentActions(props) {
  const commentsText = props.commentCount === 1 ? vikinger_translation.comment : vikinger_translation.comments,
        sharesText = props.shareCount === 1 ? vikinger_translation.share : vikinger_translation.shares;

  return (
    <div className="content-actions">
      {/* CONTENT ACTION */}
      <div className="content-action">
      {
        props.reactionData.length > 0 &&
          <ReactionMetaLine data={props.reactionData} />
      }
      </div>
      {/* CONTENT ACTION */}
  
      {/* CONTENT ACTION */}
      <div className="content-action">
        <div className="meta-line">
        {
          !props.link &&
            <p className="meta-line-text">{props.commentCount} {commentsText}</p>
        }
        {
          props.link &&
            <a className="meta-line-link" href={`${props.link}#comment-list`}>{props.commentCount} {commentsText}</a>
        }
        </div>

      {
        props.shareCount !== false && vikinger_constants.plugin_active.buddypress &&
          <div className="meta-line">
            <p className="meta-line-text">{props.shareCount} {sharesText}</p>
          </div>
      }
      </div>
      {/* CONTENT ACTION */}
    </div>
  );
}

export { ContentActions as default };