import React, { useState, useRef, useEffect } from 'react';

import MentionItem from './MentionItem';

import SimpleBar from 'simplebar-react';

function MentionList(props) {
  const [activeUserIndex, _setActiveUserIndex] = useState(0);

  const activeUserIndexRef = useRef(0);

  const setActiveUserIndex = (i) => {
    let index = i;

    if (typeof i === 'function') {
      index = i(activeUserIndex);
    }

    activeUserIndexRef.current = index;
    _setActiveUserIndex(index);
  };

  const mentionListRef = useRef(null);

  const simplebarStyles = useRef({ maxHeight: 140 });

  const userMatches = useRef([]);

  const handleClick = (data) => {
    props.onItemSelection(data, 'click');
  };

  const activatePreviousUser = () => {
    setActiveUserIndex(previousActiveUserIndex => {
      return previousActiveUserIndex === 0 ? userMatches.current.length - 1 : previousActiveUserIndex - 1;
    });
  };

  const activateNextUser = () => {
    setActiveUserIndex(previousActiveUserIndex => {
      return previousActiveUserIndex === (userMatches.current.length - 1) ? 0 : previousActiveUserIndex + 1;
    });
  };

  const activatePreviousUserOnArrowUpPressed = (e) => {
    // arrow up key pressed
    if (e.keyCode === 38) {
      activatePreviousUser();
    }
  };

  const activateNextUserOnArrowDownPressed = (e) => {
    // arrow down key pressed
    if (e.keyCode === 40) {
      activateNextUser();
    }
  };

  const activateUserOnKeyPressed = (e) => {
    // spacebar or enter key pressed
    if ((e.keyCode === 32) || (e.keyCode === 13)) {
      if (userMatches.current.length > 0) {
      //   console.log('MENTION LIST - ON KEY PRESSED ACTIVE USER INDEX: ', activeUserIndexRef.current);
      //   console.log('MENTION LIST - ON KEY PRESSED USER MATCHES: ', userMatches.current);
        props.onItemSelection(userMatches.current[activeUserIndexRef.current], 'keydown');
      }
    }
  };

  const userMatchCompareFunction = (a, b) => {
    const aExec = (new RegExp(props.searchText, 'igm')).exec(a.mention_name),
          bExec = (new RegExp(props.searchText, 'igm')).exec(b.mention_name);

    if (aExec.index < bExec.index) {
      return -1;
    }

    if (aExec.index > bExec.index) {
      return 1;
    }

    return 0;
  };

  useEffect(() => {
    mentionListRef.current.style.top = `${props.positionData.relTop + props.positionData.height}px`;
    mentionListRef.current.style.left = `${props.positionData.relLeft}px`;

    window.addEventListener('keydown', activateUserOnKeyPressed);
    window.addEventListener('keydown', activatePreviousUserOnArrowUpPressed);
    window.addEventListener('keydown', activateNextUserOnArrowDownPressed);

    return () => {
      window.removeEventListener('keydown', activateUserOnKeyPressed);
      window.removeEventListener('keydown', activatePreviousUserOnArrowUpPressed);
      window.removeEventListener('keydown', activateNextUserOnArrowDownPressed);
    };
  });

  useEffect(() => {
    // console.log('MENTION LIST - USE EFFECT SEARCH TEXT: ', props.searchText);

    setActiveUserIndex(0);
  }, [props.searchText]);

  // console.log('MENTION LIST - DATA: ', props.data);

  userMatches.current = [];

  // get users that matches searchText
  for (const user of props.data) {
    const searchTextRegex = new RegExp(props.searchText, 'igm');
    
    if (searchTextRegex.test(user.mention_name)) {
      userMatches.current.push(user);
    }
  }

  // // sort users that matched searchText by lower index
  userMatches.current.sort(userMatchCompareFunction);

  // console.log('MENTION LIST - ACTIVE USER INDEX: ', activeUserIndex);
  // console.log('MENTION LIST - USER MATCHES: ', userMatches.current);

  return (
    <div ref={mentionListRef} className="mention-list">
      <SimpleBar style={simplebarStyles.current}>
      {
        userMatches.current.map((user, i) => {
          return (
            <MentionItem  key={user.id}
                          data={user}
                          searchText={props.searchText}
                          onClick={handleClick}
                          active={activeUserIndex === i}
                          activateItem={() => {setActiveUserIndex(i);}}
            />
          );
        })
      }
      {
        (userMatches.current.length === 0) &&
          <p className="mention-list-error-text">{vikinger_translation.no_members_found}</p>
      }
      </SimpleBar>
    </div>
  );
}

export { MentionList as default };