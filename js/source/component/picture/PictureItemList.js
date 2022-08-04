import React, { useRef } from 'react';

import PictureItem from './PictureItem';

function PictureItemList(props) {
  const displayMax = useRef(props.displayMax ? props.displayMax : 12);
  
  const pictures = [],
        totalCount = props.data.length,
        showMore = displayMax.current === props.data.length,
        pictureCount = showMore ? totalCount - 1 : totalCount;

  for (let i = 0; i < pictureCount; i++) {
    const picture = props.data[i];

    pictures.push(
      <PictureItem  key={picture.id}
                    data={picture}
                    loggedUser={props.loggedUser}
                    reactions={props.reactions}
                    onActivityUpdate={props.onActivityUpdate}
      />
    );
  }


  return (
    <div className={`picture-item-list ${props.modifiers || ''}`}>
    { pictures }
    {
      showMore &&
        <PictureItem  data={props.data[pictureCount]}
                      user={props.user}
                      moreItems
                      noPopup
        />
    }
    </div>
  );
}

export { PictureItemList as default };