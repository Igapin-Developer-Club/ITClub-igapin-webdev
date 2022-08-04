import React, { useState, useRef, useEffect, useLayoutEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import Loader from '../loader/Loader';

import MessageBox from '../message/MessageBox';

import ChatMessages from '../chat/ChatMessages';

import { deepMerge } from '../../utils/core';
import { createPopup } from '../../utils/plugins';

import * as userRouter from '../../router/user/user-router';
import * as messageRouter from '../../router/message/message-router';

import { messagePermissions } from '../utils/membership';

function MessagesSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const [userID, setUserID] = useState(props.userID);
  const [messageID, setMessageID] = useState(props.messageID);

  const [messages, setMessages] = useState([]);
  const [moreItems, setMoreItems] = useState(true);
  const [initialFetch, setInitialFetch] = useState(true);

  const [loading, setLoading] = useState(true);
  const [loadingMore, setLoadingMore] = useState(false);

  const [creatingNewMessage, setCreatingNewMessage] = useState(true);

  const [filters, setFilters] = useState({
    page: 1,
    per_page: 100,
    box: 'inbox'
  });

  const [selectedMessage, setSelectedMessage] = useState(false);

  const [sendingMessage, setSendingMessage] = useState(false);
  const [deletingThread, setDeletingThread] = useState(false);

  const replaceMessages = useRef(false);

  const messageBoxRef = useRef(null);
  const popup = useRef(null);

  useLayoutEffect(() => {
    popup.current = createPopup({
      premadeContentElement: messageBoxRef.current,
      type: 'premade',
      popupSelectors: ['message-box-popup', 'animate-slide-down'],
      onOverlayCreate: function (overlay) {
        overlay.setAttribute('data-simplebar', '');
      }
    });
  }, []);

  const mergeFilters = (oldFilters, newFilters) => {
    const mergedFilters = deepMerge(oldFilters, newFilters);

    // remove search filter if it is empty
    if ((typeof mergedFilters.search !== 'undefined') && (mergedFilters.search === '')) {
      delete mergedFilters.search;
    }

    return mergedFilters;
  };

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-friends')
    .done((response) => {
      // console.log('MESSAGES SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);

      const newFilters = mergeFilters(filters, { user_id: response.id });

      setFilters(newFilters);
      getMessagesPage(false, newFilters);

    });
  };

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const refreshMessages = (selectFirst = false, refreshMessagesFilters = false) => {
    // console.log('MESSAGES SETTINGS SCREEN - REFRESH MESSAGES');

    replaceMessages.current = true;

    setLoading(true);

    const newFilters = refreshMessagesFilters ? refreshMessagesFilters : filters;

    const updatedFilters =  mergeFilters(newFilters, { page: 1 });

    setFilters(updatedFilters);

    getMessagesPage(selectFirst, updatedFilters);
  };

  const updateFiltersRefresh = (newFilters) => {
    // console.log('MESSAGES SETTINGS SCREEN - UPDATE FILTERS REFRESH: ', filters);

    const updatedFilters = mergeFilters(filters, newFilters);

    setFilters(updatedFilters);

    refreshMessages(false, updatedFilters);
  };

  const getMessagesPage = (selectFirst = false, getFilters = false) => {
    setLoadingMore(true);

    const getMessagesPageFilters = getFilters ? getFilters : filters;
    const getMessagesPromise = messageRouter.getMessages(getMessagesPageFilters);

    getMessagesPromise
    .done((response) => {
      // console.log('MESSAGES SETTINGS SCREEN - GET MESSAGES PAGE ', getMessagesPageFilters.page, ' RESPONSE: ', response);

      const newMessages = replaceMessages.current ? response.data : messages.concat(response.data);
      const moreItems = response.headers['X-WP-TotalPages'] > getMessagesPageFilters.page;

      let newSelectedMessage = (typeof selectFirst === 'boolean') && selectFirst && newMessages.length > 0 ? newMessages[0] : selectedMessage;

      // pre selected message
      if (messageID) {
        for (const message of newMessages) {
          if (message.id === messageID) {
            newSelectedMessage = message;

            // if selected message thread is unread, mark it as read
            if (message.unread_count > 0) {
              markMessageThreadAsRead(message);
            }

            break;
          }
        }
      }

      replaceMessages.current = false;

      setMessages(newMessages);
      setMoreItems(moreItems);

      setSelectedMessage(newSelectedMessage);
      setCreatingNewMessage(!newSelectedMessage);

      setFilters(previousFilters => {
        return mergeFilters(previousFilters, { page: previousFilters.page + 1 });
      });

      setMessageID(false);

      setInitialFetch(false);
      setLoading(false);
      setLoadingMore(false);
    })
    .fail((error) => {
      // console.log('MESSAGES SETTINGS SCREEN - GET MESSAGES PAGE ', getMessagesPageFilters.page, ' ERROR: ', error);
    });
  };

  const markMessageThreadAsRead = (message) => {
    const markMessageThreadAsReadPromise = messageRouter.markMessageThreadAsRead(message.id);

    markMessageThreadAsReadPromise
    .done((response) => {
      // console.log('MESSAGE SETTINGS SCREEN - MARK THREAD AS READ RESPONSE: ', response);
    })
    .fail((error) => {
      // console.log('MESSAGE SETTINGS SCREEN - MARK THREAD AS READ ERROR: ', error);
    });

    // optimistic mark as read
    message.unread_count = 0;
  };

  const selectMessage = (message) => {
     // if message already selected, return
     if (selectedMessage === message) {
      return;
    }

    // console.log('MESSAGE SETTINGS SCREEN - SELECTED MESSAGE: ', message);

    // if selected message thread is unread, mark it as read
    if (message.unread_count > 0) {
      markMessageThreadAsRead(message);
    }

    setSelectedMessage(message);
    setCreatingNewMessage(false);
  };

  const createNewMessage = () => {
    setSelectedMessage(false);
    setCreatingNewMessage(true);
  };

  const onStarMessage = () => {
    const messageInBox = messages.some(message => message.id === selectedMessage.id);

    // if message is not on the currently selected box, return
    // this can happen due to the previous selected message display function, that displays previous selected message
    // even when changing boxes and the message is in another box
    if (!messageInBox) {
      return;
    }

    const newMessages = messages.slice();

    let newSelectedMessage;

    for (const message of newMessages) {
      if (message.id === selectedMessage.id) {
        newSelectedMessage = message;
        message.starred = true;
        break;
      }
    }

    // console.log('MESSAGE SETTINGS SCREEN - NEW MESSAGES: ', newMessages);
    // console.log('MESSAGE SETTINGS SCREEN - NEW SELECTED MESSAGE: ', newSelectedMessage);

    setSelectedMessage(newSelectedMessage);
    setMessages(newMessages);
  };

  const onUnstarMessage = () => {
    const messageInBox = messages.some(message => message.id === selectedMessage.id);

    // if message is not on the currently selected box, return
    // this can happen due to the previous selected message display function, that displays previous selected message
    // even when changing boxes and the message is in another box
    if (!messageInBox) {
      return;
    }

    const newMessages = messages.slice();

    let newSelectedMessage;

    for (const message of newMessages) {
      if (message.id === selectedMessage.id) {
        newSelectedMessage = message;
        message.starred = false;
        break;
      }
    }

    // console.log('MESSAGE SETTINGS SCREEN - NEW MESSAGES: ', newMessages);
    // console.log('MESSAGE SETTINGS SCREEN - NEW SELECTED MESSAGE: ', newSelectedMessage);

    setSelectedMessage(newSelectedMessage);
    setMessages(newMessages);
  };

  const deleteThread = () => {
    // if already deleting thread, return
    if (deletingThread) {
      return;
    }

    setDeletingThread(true);

    const threadID = selectedMessage.id;

    const deleteMessagePromise = messageRouter.deleteMessageThread({
      thread_id: threadID,
      user_id: loggedUser.id
    });

    deleteMessagePromise
    .done((response) => {
      // console.log('CHAT MESSAGE OPEN - DELETE MESSAGE RESPONSE: ', response);
    })
    .fail((error) => {
      // console.log('CHAT MESSAGE OPEN - DELETE MESSAGE ERROR: ', error);
    });

    // check if user wants to delete message while being on another box
    // i.e. selected a message, changed box, and trying to delete message (last selected message feature)
    const messageInThisBox = messages.some(thread => thread.id === threadID);

    // if message is in this box, delete it
    if (messageInThisBox) {
      // optimistic delete
      // get selected message index
      let selectedMessageIndex;

      for (let i = 0; i < messages.length; i++) {
        const thread = messages[i];

        if (thread.id === threadID) {
          selectedMessageIndex = i;
          break;
        }
      }

      const newMessages = messages.slice().filter(thread => thread.id !== threadID);

      let newSelectedMessage = newMessages.length > 0;

      if (newSelectedMessage) {
        if (typeof newMessages[selectedMessageIndex] !== 'undefined') {
          newSelectedMessage = newMessages[selectedMessageIndex];
        } else {
          newSelectedMessage = newMessages[selectedMessageIndex - 1];
        }
      }

      // console.log('MESSAGE SETTINGS SCREEN - MESSAGES AFTER DELETION: ', newMessages);
      // console.log('MESSAGE SETTINGS SCREEN - SELECTED MESSAGE INDEX: ', selectedMessageIndex);
      // console.log('MESSAGE SETTINGS SCREEN - NEW SELECTED MESSAGE: ', newSelectedMessage);

      setMessages(newMessages);
      setSelectedMessage(newSelectedMessage);
      setCreatingNewMessage(typeof newSelectedMessage === 'boolean');
    } else {
      // show new message screen
      setSelectedMessage(false);
      setCreatingNewMessage(true);
    }

    setDeletingThread(false);
  };

  const createThread = (messageContent, recipients) => {
    // console.log('MESSAGE SETTINGS SCREEN - CREATE THREAD: ', messageContent, recipients);

    const createThreadPromise = messageRouter.sendMessage({
      message: messageContent,
      recipients: recipients,
      sender_id: loggedUser.id
    });

    createThreadPromise
    .done((response) => {
      // console.log('MESSAGE SETTINGS SCREEN - CREATE THREAD RESPONSE: ', response);

      const newFilters = mergeFilters(filters, { box: 'sentbox' });

      setFilters(newFilters);

      refreshMessages(true, newFilters);
    })
    .fail((error) => {
      // console.log('MESSAGE SETTINGS SCREEN - CREATE THREAD ERROR: ', error);
    });
  };

  const sendMessage = (threadID, messageContent, recipients, callback = () => {}) => {
    // if already sending a message, return
    if (sendingMessage) {
      return;
    }

    setSendingMessage(true);

    const sendMessageConfig = {
      id: threadID,
      message: messageContent,
      recipients: recipients,
      sender_id: loggedUser.id
    };
    
    const sendMessagePromise = messageRouter.sendMessage(sendMessageConfig);

    // console.log('MESSAGE SETTINGS SCREEN - SEND MESSAGE: ', sendMessageConfig);

    sendMessagePromise
    .done((response) => {
      // console.log('MESSAGE SETTINGS SCREEN - SEND MESSAGE RESPONSE: ', response);

      const getSentMessagePromise = messageRouter.getMessage(threadID);

      getSentMessagePromise
      .done((response) => {
        // console.log('MESSAGE SETTINGS SCREEN - GET SENT MESSAGE RESPONSE: ', response);

        callback();

        const newMessages = messages.slice();

        // console.log('MESSAGE SETTINGS SCREEN - NEW MESSAGES TO SHOW: ', newMessages);

        for (const message of newMessages) {
          if (message.id === threadID) {
            message.messages = response.messages;
          }
        }

        setMessages(newMessages);
        setSendingMessage(false);
      })
      .fail((error) => {
        // console.log('MESSAGE SETTINGS SCREEN - GET SENT MESSAGE ERROR: ', error);

        setSendingMessage(false);
      });

    })
    .fail((error) => {
      // console.log('MESSAGE SETTINGS SCREEN - SEND MESSAGE ERROR: ', error);

      setSendingMessage(false);
    });
  };

  const clearSendMessageUser = () => {
    setUserID(false);
  };

  const searching = typeof filters.search !== 'undefined';

  return (
    <div className="account-hub-content">
      <SectionHeader pretitle={vikinger_translation.my_profile} title={vikinger_translation.messages}>
      {
        messagePermissions.createMessage &&
          <div className="section-header-actions">
            <p className="section-header-action" onClick={createNewMessage}>{vikinger_translation.new_message}</p>
          </div>
      }
      </SectionHeader>

      {/* MESSAGE BOX */}
      <MessageBox forwardedRef={messageBoxRef}
                  data={{title: vikinger_translation.delete, text: vikinger_translation.delete_item_message}}
                  error
                  confirm
                  onAccept={() => {deleteThread(); popup.current.hide();}}
                  onCancel={() => {popup.current.hide();}}
      />
      {/* MESSAGE BOX */}

      {
        !loggedUser && initialFetch &&
          <Loader />
      }

      {
        loggedUser &&
          <ChatMessages data={messages}
                        loggedUser={loggedUser}
                        userID={userID}
                        clearSendMessageUser={clearSendMessageUser}
                        onFiltersChange={updateFiltersRefresh}
                        loading={loading}
                        onLoadMore={getMessagesPage}
                        loadingMore={loadingMore}
                        moreItems={moreItems}
                        searching={searching}
                        onSelectMessage={selectMessage}
                        selectedMessage={selectedMessage}
                        creatingNewMessage={creatingNewMessage}
                        onStarMessage={onStarMessage}
                        onUnstarMessage={onUnstarMessage}
                        onSendMessage={sendMessage}
                        sendingMessage={sendingMessage}
                        onCreateThread={createThread}
                        onDeleteThread={() => {popup.current.show();}}
                        deletingThread={deletingThread}
                        filters={filters}
          />
      }
    </div>
  );
}

export { MessagesSettingsScreen as default };