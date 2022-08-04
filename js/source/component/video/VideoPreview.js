import React from 'react';

function VideoPreview(props) {
  return (
    <div className="video-wrap">
      <video src={props.src} controls disablePictureInPicture controlsList="nodownload"></video>
    </div>
  );
}

export { VideoPreview as default };