import React from 'react';

import PictureCollageItem from './PictureCollageItem';

function PictureCollageRow(props) {
  return (
    <div className={`picture-collage-row ${props.modifiers || ''}`}>
      {
        props.data.map((item) => {
          return (
            <PictureCollageItem key={item.id}
                                data={item}
                                user={props.user}
                                reactions={props.reactions}
                                noPopup={props.noPopup}
                                onActivityUpdate={props.onActivityUpdate}
            />
          );
        })
      }
    </div>
  );
}

export { PictureCollageRow as default };