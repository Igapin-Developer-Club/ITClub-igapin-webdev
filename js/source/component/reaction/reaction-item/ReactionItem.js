import React, { useState, useRef, useEffect, useLayoutEffect } from 'react';

import ReactionBox from '../ReactionBox';

import { ucfirst } from '../../../utils/core';
import { createDropdown, createPopup } from '../../../utils/plugins';

function ReactionItem(props) {
  const [reactionBoxActiveTab, setReactionBoxActiveTab] = useState(0);

  const reactionDropdownTriggerRef = useRef(null);
  const reactionDropdownContentRef = useRef(null);

  const reactionBoxRef = useRef(null);
  const reactionBoxTriggerRef = useRef(null);

  useLayoutEffect(() => {
    createDropdown({
      triggerElement: reactionDropdownTriggerRef.current,
      containerElement: reactionDropdownContentRef.current,
      triggerEvent: 'hover',
      offset: {
        bottom: 38,
        left: -16
      },
      animation: {
        type: 'translate-bottom',
        speed: .3,
        translateOffset: {
          vertical: 20
        }
      }
    });

    createPopup({
      triggerElement: reactionBoxTriggerRef.current,
      premadeContentElement: reactionBoxRef.current,
      type: 'premade',
      popupSelectors: ['reaction-box-popup', 'animate-slide-down']
    });
  }, []);

  const setReactionBoxActiveTabFromProps = () => {
    setReactionBoxActiveTab(props.index);
  };

  useEffect(() => {
    reactionBoxTriggerRef.current.addEventListener('mousedown', setReactionBoxActiveTabFromProps);

    return () => {
      reactionBoxTriggerRef.current.removeEventListener('mousedown', setReactionBoxActiveTabFromProps);
    };
  }, [props.index]);

  const maxReactionUsers = 6,
        reactionUsersCount = Math.min(maxReactionUsers, props.data.users.length),
        moreUsersCount = props.data.users.length <= maxReactionUsers ? false : props.data.users.length - maxReactionUsers;

  const renderedReactionUsers = [];
  
  for (let i = 0; i < reactionUsersCount; i++) {
    renderedReactionUsers.push(
      <p key={props.data.users[i].id} className="simple-dropdown-text">{props.data.users[i].name}</p>
    );
  }

  return (
    <div className="reaction-item-wrap">
      <div ref={reactionBoxTriggerRef} className="reaction-item">
        <img ref={reactionDropdownTriggerRef} className="reaction-image" src={props.data.image_url} alt={`reaction-${props.data.name}`} />

        <div ref={reactionDropdownContentRef} className="simple-dropdown padded">
          <p className="simple-dropdown-text">
            <img className="reaction" src={props.data.image_url} alt={`reaction-${props.data.name}`} />
            <span className="bold">{ucfirst(props.data.name)}</span>
          </p>

        { renderedReactionUsers }
        
        {
          moreUsersCount &&
            <p className="simple-dropdown-text">
              <span className="bold">{`${vikinger_translation.more_reactions_text_1} ${moreUsersCount} ${vikinger_translation.more_reactions_text_2}`}</span>
            </p>
        }
        </div>
      </div>

      <ReactionBox  forwardedRef={reactionBoxRef}
                    data={props.reactionData}
                    reactionCount={props.reactionCount}
                    activeTab={reactionBoxActiveTab}
                    showTab={setReactionBoxActiveTab}
      />
    </div>
  );
}

export { ReactionItem as default };