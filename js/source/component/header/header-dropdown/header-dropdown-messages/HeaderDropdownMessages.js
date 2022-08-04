import React, { useState, useRef, useEffect, useLayoutEffect } from 'react';

import HeaderDropdown from '../HeaderDropdown';

import MessageStatus from '../../../user-status/user-status-message/MessageStatus';

import LoaderSpinnerSmall from '../../../loader/LoaderSpinnerSmall';

import SimpleBar from 'simplebar-react';

import * as messageRouter from '../../../../router/message/message-router';

function HeaderDropdownMessages(props) {
  const [messages, setMessages] = useState([]);
  const [loading, setLoading] = useState(true);

  const [messagesHTML, setMessagesHTML] = useState(false);
  const [betterMessagesUnreadCount, setBetterMessagesUnreadCount] = useState(0);

  const simplebarStyles = useRef({ overflowX: 'hidden', height: '100%' });

  useEffect(() => {
    if (props.loggedUser) {
      const getMessagesPromise = messageRouter.getMessages({
        user_id: props.loggedUser.id,
        box: 'inbox',
        per_page: 8
      });
  
      getMessagesPromise
      .done((response) => {
        // console.log('HEADER DROPDOWN MESSAGES - GET MESSAGES RESPONSE: ', response);

        if (vikinger_constants.plugin_active['bp-better-messages']) {
          setMessagesHTML(response);
        } else {
          if (response && response.data && (response.data instanceof Array)) {
            setMessages(response.data);
          }
        }
      })
      .fail((error) => {
        // console.log('HEADER DROPDOWN MESSAGES - GET MESSAGES ERROR: ', error);
      })
      .always(() => {
        setLoading(false);
      });
    }
  }, [props.loggedUser]);

  useEffect(() => {
    if (vikinger_constants.plugin_active['bp-better-messages']) {
      jQuery(document).trigger('bp-better-messages-init-scrollers');
    }
  });

  useEffect(() => {
    if (vikinger_constants.plugin_active['bp-better-messages']) {
      jQuery(document).on('bp-better-messages-update-unread', (e) => {
        const inboxUnreadCount = parseInt(e.originalEvent.detail.unread);

        setBetterMessagesUnreadCount(inboxUnreadCount);

        // console.log('HEADER DROPDOWN MESSAGES - BETTER MESSAGES - UNREAD COUNT', inboxUnreadCount);
      });
    }
  }, []);

  let unreadMessagesCount = 0;

  if (vikinger_constants.plugin_active['bp-better-messages']) {
    unreadMessagesCount = betterMessagesUnreadCount;
  } else {
    for (const thread of messages) {
      if (thread.unread_count > 0) {
        unreadMessagesCount++;
      }
    }
  }

  return (
    <HeaderDropdown icon="messages" unread={vikinger_constants.plugin_active['bp-better-messages'] ? betterMessagesUnreadCount > 0 : unreadMessagesCount > 0}>
    {
      (!props.loggedUser || (props.loggedUser && loading)) &&
        <LoaderSpinnerSmall />
    }
    {
      props.loggedUser && !loading &&
        <React.Fragment>
          <div className="dropdown-box-header">
            <p className="dropdown-box-header-title">{vikinger_translation.inbox} <span className="highlighted">{unreadMessagesCount}</span></p>
          </div>

        {
          messagesHTML &&
            <div dangerouslySetInnerHTML={{__html: messagesHTML}}></div>
        }
      
        {
          !messagesHTML &&
            <div className="dropdown-box-list">
            <SimpleBar style={simplebarStyles.current}>
            {
              (messages.length > 0) &&
                messages.map((message) => {
                  return (
                    <a  key={message.id}
                        className={`dropdown-box-list-item ${message.unread_count > 0 ? 'unread' : ''}`}
                        href={`${props.loggedUser.messages_link}?message_id=${message.id}`}
                    >
                      <MessageStatus  data={message}
                                      ownLastMessage={message.user.id === props.loggedUser.id}
                                      favorite={message.starred}
                      />
                    </a>
                  );
                })
            }

            {
              (messages.length === 0) &&
                <p className="no-results-text">{vikinger_translation.no_messages_received}</p>
            }
            </SimpleBar>
            </div>
        }
      
          <a className="dropdown-box-button primary" href={props.loggedUser.messages_link}>{vikinger_translation.view_all_messages}</a>
        </React.Fragment>
    }
    </HeaderDropdown>
  );
}

export { HeaderDropdownMessages as default };