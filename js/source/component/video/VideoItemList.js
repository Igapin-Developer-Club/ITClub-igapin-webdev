import React from 'react';

import VideoItem from './VideoItem';

function VideoItemList(props) {
  const renderedVideoList = props.data.map((item, i) => {
    return (
      <VideoItem  key={item.id}
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
  });

  return (
    renderedVideoList
  );
}

export { VideoItemList as default };