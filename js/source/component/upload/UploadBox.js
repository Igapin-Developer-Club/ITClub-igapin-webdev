import React, { useState, useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

const allowedExtensions = `.${vikinger_constants.settings.media_photo_allowed_extensions.join(',.')}`;
const allowedExtensionsText = `${vikinger_constants.settings.media_photo_allowed_extensions.join(', ')}`;

function UploadBox(props) {
  const [title, setTitle] = useState(props.title);
  const [active, setActive] = useState(props.active || false);

  const text = props.text || allowedExtensionsText;

  const fileData = useRef(null);
  const fileInputRef = useRef(null);

  const updateFile = () => {
    const file = fileInputRef.current.files[0];

    // console.log('UPLOAD BOX - SELECTED FILE: ', file);

    // if no file selected (user clicked cancel)
    if (typeof file === 'undefined') {
      return;
    }

    // release previous blob image resource if exists
    if (fileData.current) {
      URL.revokeObjectURL(fileData.current.url);
      // console.log('UPLOAD BOX - REVOKE FILE URL: ', fileData.current.url);
    }

    // save new selected file
    fileData.current = {
      file: new File([file], file.name),
      url: URL.createObjectURL(file)
    };

    setTitle(file.name);
    setActive(true);

    props.onFileSelect(fileData.current);
  };

  useEffect(() => {
    setTitle(props.title);
  }, [props.title]);

  useEffect(() => {
    setActive(props.active);
  }, [props.active]);

  return (
    <div className={`upload-box ${props.modifiers || ''} ${active ? 'active' : ''}`} onClick={() => {fileInputRef.current.click();}}>
      <IconSVG  icon="members"
                modifiers="upload-box-icon"
      />
  
      <p className="upload-box-title">{title}</p>

      <p className="upload-box-text">{text}</p>

      <input  ref={fileInputRef}
              className="upload-box-file-input"
              type="file"
              accept={allowedExtensions}
              onChange={updateFile}
      />
    </div>
  );
}

export { UploadBox as default };