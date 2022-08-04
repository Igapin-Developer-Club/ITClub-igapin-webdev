import React from 'react';

import ReactionOption from './ReactionOption';

function ReactionOptionList(props) {
  const renderedReactionOptionList = props.data.map((reaction) => {
    return (
      <ReactionOption key={reaction.id}
                      data={reaction}
                      createUserReaction={props.createUserReaction}
      />
    );
  });

  return (
    <div ref={props.forwardedRef} className={`reaction-options ${props.modifiers || ''}`}>
      { renderedReactionOptionList }
    </div>
  );
}

export { ReactionOptionList as default };