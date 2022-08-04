import React, { useRef, useEffect } from 'react';

import ReactionOptionList from '../ReactionOptionList';

import { createDropdown } from '../../../../utils/plugins';

function ReactionOptionComment(props) {
  const reactionOptionsDropdownTriggerRef = useRef(null);
  const reactionOptionsDropdownContentRef = useRef(null);

  useEffect(() => {
    createDropdown({
      triggerElement: reactionOptionsDropdownTriggerRef.current,
      containerElement: reactionOptionsDropdownContentRef.current,
      triggerEvent: 'hover',
      offset: {
        bottom: 30,
        left: -80
      },
      animation: {
        type: 'translate-bottom',
        speed: .3,
        translateOffset: {
          vertical: 16
        }
      },
      closeOnDropdownClick: true
    });
  }, []);

  return (
    <div className="meta-line">
      <div  ref={reactionOptionsDropdownTriggerRef}
            className="meta-line-link-wrap"
            {...(props.userReaction && { onClick: props.deleteUserReaction })}
      >
      {
        !props.userReaction &&
          <p className="meta-line-link light">{vikinger_translation.react}</p>
      }
      {
        props.userReaction &&
          <p className="meta-line-link">{props.userReaction.name[0].toUpperCase() + props.userReaction.name.slice(1)}</p>
      }
      </div>

      <ReactionOptionList forwardedRef={reactionOptionsDropdownContentRef}
                          modifiers='small'
                          data={props.reactions}
                          createUserReaction={props.createUserReaction}
      />
    </div>
  );
}

export { ReactionOptionComment as default };