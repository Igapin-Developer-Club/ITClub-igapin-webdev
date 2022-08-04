import React from 'react';

import UploadableMediaItem from './UploadableMediaItem';
import UploadableMediaSelector from './UploadableMediaSelector';

function UploadableMediaList(props) {
  const renderedUploadableMediaItems = props.data.map((item) => {
    return (
      <UploadableMediaItem  key={item.id}
                            data={item}
                            onRemoveButtonClick={() => {props.onRemove(item.id);}}
      />
    );
  });

  return (
    <div className={`uploadable-item-list ${props.disabled ? 'disabled' : ''}`}>
      { renderedUploadableMediaItems }
      
      <UploadableMediaSelector onSelect={props.onSelect} />
    </div>
  );
}

export { UploadableMediaList as default };