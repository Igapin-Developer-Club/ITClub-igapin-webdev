import React from 'react';

import PhotoPreview from './PhotoPreview';

function PictureCollageItem(props) {
  return (
    <div className="picture-collage-item">
    {
      (props.data.media.more > 0) &&
        <a className="picture-collage-item-overlay" href={props.data.media.more_link}>
          <p className="picture-collage-item-overlay-text">+{props.data.media.more}</p>
        </a>
    }

      <PhotoPreview data={props.data}
                    user={props.user}
                    reactions={props.reactions}
                    noPopup={(props.data.media.more) || (props.noPopup)}
                    onActivityUpdate={props.onActivityUpdate}
      />
    </div>
  );
}

export { PictureCollageItem as default };