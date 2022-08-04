import React, { useState, useRef } from 'react';

import FormInputInteractive from '../form/FormInputInteractive';

import MessageStatus from '../user-status/user-status-message/MessageStatus';

import LoaderSpinner from '../loader/LoaderSpinner';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import SimpleBar from 'simplebar-react';

function ChatMessageList(props) {
  const [searchText, setSearchText] = useState('');

  const simplebarStyles = useRef({ overflowX: 'hidden', height: '100%' });

  const showBox = (box) => {
    updateFilters({
      box: box
    });
  };

  const showInbox = () => {
    showBox('inbox');
  };

  const showSentbox = () => {
    showBox('sentbox');
  };

  const showStarred = () => {
    showBox('starred');
  };

  const onSearchInputReset = (data) => {
    updateFilters({
      search: data
    });
  };

  const onSearchSubmit = (e) => {
    e.preventDefault();

    // console.log('CHAT MESSAGE LIST - SEARCH SUBMIT: ', searchText);

    updateFilters({
      search: searchText
    });
  };

  const updateFilters = (filters) => {
    props.onFiltersChange(filters);
  };

  return (
    <div className="chat-widget static">
      {/* CHAT WIDGET FILTERS */}
      <div className="chat-widget-filters">
        <p className={`chat-widget-filter ${props.filters.box === 'inbox' ? 'active' : ''}`} onClick={showInbox}>{ vikinger_translation.inbox }</p>
        <p className={`chat-widget-filter ${props.filters.box === 'sentbox' ? 'active' : ''}`} onClick={showSentbox}>{ vikinger_translation.sentbox }</p>
        <p className={`chat-widget-filter ${props.filters.box === 'starred' ? 'active' : ''}`} onClick={showStarred}>{ vikinger_translation.starred }</p>
      </div>
      {/* CHAT WIDGET FILTERS */}

      {/* CHAT WIDGET MESSAGES */}
      <div className="chat-widget-messages">
      {
        props.loading &&
          <LoaderSpinner />
      }
      {
        (props.data.length > 0) && !props.loading &&
          <SimpleBar style={simplebarStyles.current}>
          {
            props.data.map((message) => {
              return (
                <div  className={
                        `chat-widget-message
                        ${props.selectedMessage === message ? 'active' : ''}
                        ${message.unread_count > 0 ? 'unread' : ''}`
                      }
                      key={message.id}
                      onClick={() => {props.onSelectMessage(message);}}
                >
                  <MessageStatus  data={message}
                                  ownLastMessage={message.user.id === props.loggedUser.id}
                                  favorite={message.starred}
                  />
                </div>
              );
            })
          }
          {
            props.moreItems &&
              <div className="load-more-text" onClick={props.onLoadMore}>
              {
                !props.loadingMore &&
                  vikinger_translation.load_more_messages
              }
              {
                props.loadingMore &&
                  <LoaderSpinnerSmall />
              }
              </div>
          }
          </SimpleBar>
      }
      {
        (props.data.length === 0) && !props.loading &&
          <p className="no-results-text">
            {
              props.searching &&
                vikinger_translation.message_search_no_results
            }
            {
              !props.searching &&
                vikinger_translation.no_messages_found
            }
          </p>
      }
      </div>
      {/* CHAT WIDGET MESSAGES */}
  
      {/* CHAT WIDGET FORM */}
      <form className="chat-widget-form" onSubmit={onSearchSubmit}>
        <FormInputInteractive name="searchText"
                              value={searchText}
                              placeholder={vikinger_translation.search_messages}
                              modifiers="small"
                              onChange={setSearchText}
                              onReset={onSearchInputReset}
        />
      </form>
      {/* CHAT WIDGET FORM */}
    </div>
  );
}

export { ChatMessageList as default };