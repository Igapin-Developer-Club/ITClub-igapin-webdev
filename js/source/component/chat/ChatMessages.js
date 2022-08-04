import React from 'react';

import ChatMessageList from './ChatMessageList';
import ChatMessageNew from './ChatMessageNew';
import ChatMessageOpen from './ChatMessageOpen';

import { messagePermissions } from '../utils/membership';

function ChatMessages(props) {
  return (
    <div className="chat-widget-wrap">
      <ChatMessageList  data={props.data}
                        loggedUser={props.loggedUser}
                        onSelectMessage={props.onSelectMessage}
                        selectedMessage={props.selectedMessage}
                        onFiltersChange={props.onFiltersChange}
                        loading={props.loading}
                        moreItems={props.moreItems}
                        onLoadMore={props.onLoadMore}
                        loadingMore={props.loadingMore}
                        searching={props.searching}
                        filters={props.filters}
      />

      {
        !props.creatingNewMessage && props.selectedMessage &&
          <ChatMessageOpen  data={props.selectedMessage}
                            loggedUser={props.loggedUser}
                            onSendMessage={props.onSendMessage}
                            onStarMessage={props.onStarMessage}
                            onUnstarMessage={props.onUnstarMessage}
                            onDeleteThread={props.onDeleteThread}
                            deletingThread={props.deletingThread}
                            sendingMessage={props.sendingMessage}
          />
      }

      {
        messagePermissions.createMessage && props.creatingNewMessage &&
          <ChatMessageNew loggedUser={props.loggedUser}
                          userID={props.userID}
                          clearSendMessageUser={props.clearSendMessageUser}
                          onCreateThread={props.onCreateThread}
          />
      }
    </div>
  );
}

export { ChatMessages as default };