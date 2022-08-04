import React from 'react';

import IconSVG from '../icon/IconSVG';

function UploadableMediaItem(props) {
  return (
    <div className="uploadable-item" style={{background: `url('${props.data.url}') center center / cover no-repeat`}}>
      <div className="uploadable-item-remove-button" onClick={props.onRemoveButtonClick}>
        <IconSVG  icon="cross"
                  modifiers="uploadable-item-remove-button-icon"
        />
      </div>
    </div>
  );
}

export { UploadableMediaItem as default };