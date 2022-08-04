import React from 'react';

import ReactionItem from './ReactionItem';

function ReactionItemList(props) {
  const renderedReactionItemList = props.data.map((reactionData, i) => {
    return (
      <ReactionItem key={reactionData.id}
                    data={reactionData}
                    reactionData={props.data}
                    reactionCount={props.reactionCount}
                    index={props.data.length - i}
      />
    );
  });

  return (
    <div className={`reaction-item-list ${props.modifiers || ''}`}>
      { renderedReactionItemList }
    </div>
  );
}

export { ReactionItemList as default };