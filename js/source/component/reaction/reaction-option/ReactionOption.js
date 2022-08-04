import React, { useRef, useEffect } from 'react';

import { ucfirst } from '../../../utils/core';
import { createTooltip } from '../../../utils/plugins';

function ReactionOption(props) {
  const reactionTooltipRef = useRef(null);
  
  useEffect(() => {
    createTooltip({
      containerElement: reactionTooltipRef.current,
      offset: 4,
      direction: 'top',
      animation: {
        type: 'translate-out-fade'
      }
    });
  }, []);

  const createUserReaction = () => {
    props.createUserReaction(props.data.id);
  };

  return (
    <div  ref={reactionTooltipRef}
          className="reaction-option"
          data-title={ucfirst(props.data.name)}
          onClick={createUserReaction}
    >
      <img className="reaction-option-image" src={props.data.image_url} alt={`reaction-${props.data.name}`} />
    </div>
  );
}

export { ReactionOption as default };