import React, { useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import { createTooltip } from '../../utils/plugins';

function UploadVideoButton(props) {
  const fileID = useRef(1);

  const allowedExtensions = useRef(`.${vikinger_constants.settings.media_video_allowed_extensions.join(',.')}`);
    
  const fileInputRef = useRef(null);
  const videoTooltipRef = useRef(null);

  useEffect(() => {
    createTooltip({
      containerElement: videoTooltipRef.current,
      offset: 8,
      direction: 'top',
      animation: {
        type: 'translate-out-fade'
      }
    });
  }, []);

  const uploadFiles = () => {
    const files = fileInputRef.current.files;

    // console.log('UPLOAD VIDEO BUTTON - UPLOAD FILES: ', files);

    const fileData = [];
    
    for (const file of files) {
      const fileExtension = file.name.substring(file.name.lastIndexOf('.') + 1);

      fileData.push({
        id: fileID.current,
        file: new File([file], file.name),
        url: URL.createObjectURL(file),
        extension: fileExtension
      });

      fileID.current += 1;
    }

    // console.log('UPLOAD VIDEO BUTTON - FILE DATA: ', fileData);

    if (props.onSelect) {
      props.onSelect(fileData);
    }
  };

  return (
    <div  className="quick-post-footer-action" 
          ref={videoTooltipRef} 
          data-title={vikinger_translation.add_video} 
          onClick={() => {fileInputRef.current.click();}}
    >
      {/* UPLOADABLE ITEM SELECTOR INPUT */}
      <input  ref={fileInputRef}
              className="uploadable-item-selector-input"
              type="file"
              accept={allowedExtensions.current}
              onChange={uploadFiles}
      />
      {/* UPLOADABLE ITEM SELECTOR INPUT */}
      
      <IconSVG  icon="videos"
                modifiers="quick-post-footer-action-icon"
      />
    </div>
  );
}

export { UploadVideoButton as default };