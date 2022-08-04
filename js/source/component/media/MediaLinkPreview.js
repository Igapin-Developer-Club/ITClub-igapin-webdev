import React from 'react';

import IconSVG from '../icon/IconSVG';

function MediaLinkPreview(props) {
  return (
    <div className={`media-link-preview ${props.disabled ? 'disabled' : ''}`}>
      {/* MEDIA LINK PREVIEW CLOSE BUTTON */}
      <div className="media-link-preview-close-button" onClick={props.onCloseButtonClick}>
        <IconSVG  icon="cross"
                  modifiers="media-link-preview-close-button-icon"
        />
      </div>
      {/* MEDIA LINK PREVIEW CLOSE BUTTON */}

      {/* IFRAME WRAP */}
      <div className="iframe-wrap">
        <iframe src={props.iframeSrc} allowFullScreen></iframe>
      </div>
      {/* IFRAME WRAP */}
    </div>
  );
}

export { MediaLinkPreview as default };