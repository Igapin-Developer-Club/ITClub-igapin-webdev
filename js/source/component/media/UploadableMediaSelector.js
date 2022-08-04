import React, { useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import { createTooltip } from '../../utils/plugins';

const allowedExtensions = `.${vikinger_constants.settings.media_photo_allowed_extensions.join(',.')}`;

function UploadableMediaSelector(props) {
  const fileID = useRef(1);

  const fileInputRef = useRef(null);
  const selectorButtonRef = useRef(null);

  useEffect(() => {
    createTooltip({
      containerElement: selectorButtonRef.current,
      offset: 8,
      direction: 'top',
      animation: {
        type: 'translate-out-fade'
      }
    });
  }, []);

  const uploadFiles = () => {
    const files = fileInputRef.current.files;

    // console.log('UPLOADABLE MEDIA SELECTOR - UPLOAD FILES: ', files);

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

    props.onSelect(fileData);
  };

  const onUploadClick = () => {
    fileInputRef.current.click();
  };

  return (
    <div className="uploadable-item-selector">
      {/* UPLOADABLE ITEM SELECTOR INPUT */}
      <input  ref={fileInputRef}
              className="uploadable-item-selector-input"
              type="file"
              accept={allowedExtensions}
              multiple
              onChange={uploadFiles}
      />
      {/* UPLOADABLE ITEM SELECTOR INPUT */}
    
      {/* UPLOADABLE ITEM SELECTOR BUTTON */}
      <div  ref={selectorButtonRef}
            className="uploadable-item-selector-button"
            onClick={onUploadClick}
            data-title={vikinger_translation.upload_photo}
      >
        <IconSVG  icon="plus-small"
                  modifiers="uploadable-item-selector-button-icon"
        />
      </div>
      {/* UPLOADABLE ITEM SELECTOR BUTTON */}
    </div>
  );
}

export { UploadableMediaSelector as default };