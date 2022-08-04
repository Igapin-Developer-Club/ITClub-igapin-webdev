import React from 'react';

import PhotoPreview from './PhotoPreview';

function PhotoPreviewList(props) {
  return (
    props.data.map((item, i) => {
      return (
        <PhotoPreview key={item.id}
                      data={item}
                      user={props.user}
                      reactions={props.reactions}
                      modifiers={props.modifiers}
                      selectable={props.selectable}
                      selected={props.selectedItems[i]}
                      toggleSelectableActive={() => {props.toggleSelectableActive(i);}}
                      onActivityUpdate={props.onActivityUpdate}
        />
      );
    })
  );
}

export { PhotoPreviewList as default };