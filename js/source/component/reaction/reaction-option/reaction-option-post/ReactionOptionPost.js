import React, { useRef, useLayoutEffect } from 'react';

import ReactionOptionList from '../ReactionOptionList';

import IconSVG from '../../../icon/IconSVG';

import { createDropdown } from '../../../../utils/plugins';

function ReactionOptionPost(props) {
  const reactionOptionsDropdownTriggerRef = useRef(null);
  const reactionOptionsDropdownContentRef = useRef(null);

  useLayoutEffect(() => {
    createDropdown({
      triggerElement: reactionOptionsDropdownTriggerRef.current,
      containerElement: reactionOptionsDropdownContentRef.current,
      triggerEvent: 'hover',
      offset: {
        bottom: 54,
        left: -16
      },
      animation: {
        type: 'translate-bottom',
        speed: .3,
        translateOffset: {
          vertical: 20
        }
      },
      closeOnDropdownClick: true
    });
  }, []);

  return (
    <div className="post-option-wrap">
      <div  ref={reactionOptionsDropdownTriggerRef}
            className={`post-option ${props.userReaction ? 'reaction-active' : ''}`}
            {...(props.userReaction && { onClick: props.deleteUserReaction })}
      >
      {
        !props.userReaction &&
          <React.Fragment>
            <IconSVG  icon="thumbs-up"
                      modifiers="post-option-icon"
            />

            <p className="post-option-text">{vikinger_translation.react}</p>
          </React.Fragment>
      }
      {
        props.userReaction &&
          <React.Fragment>
            <img className="post-option-image" src={props.userReaction.image_url} alt={`reaction-${props.userReaction.name}`} />

            <p className="post-option-text">{props.userReaction.name[0].toUpperCase() + props.userReaction.name.slice(1)}</p>
          </React.Fragment>
      }
      </div>
      
      <ReactionOptionList forwardedRef={reactionOptionsDropdownContentRef}
                          modifiers={`${props.simpleOptions ? 'small' : ''}`}
                          data={props.reactions}
                          createUserReaction={props.createUserReaction}
      />
    </div>
  );
}

export { ReactionOptionPost as default };