import React, { useState } from 'react';

import HeaderDropdown from '../HeaderDropdown';

import FriendStatus from '../../../user-status/user-status-friend/FriendStatus';

import LoaderSpinnerSmall from '../../../loader/LoaderSpinnerSmall';

function HeaderDropdownFriendRequests(props) {
  const [currentTabItem, setCurrentTabItem] = useState('received');

  const activateReceivedTab = () => {
    setCurrentTabItem('received');
  };

  const activateSentTab = () => {
    setCurrentTabItem('sent');
  };

  let sentFriendRequestsCount = 0,
      receivedFriendRequestsCount = 0;

  if (props.loggedUser) {
    sentFriendRequestsCount = props.loggedUser.friend_requests_sent.length;
    receivedFriendRequestsCount = props.loggedUser.friend_requests_received.length;
  }

  const maxResults = 5;

  const sentFriendRequestsShowCount = Math.min(maxResults, sentFriendRequestsCount),
        sentFriendRequestsToShow = props.loggedUser ? props.loggedUser.friend_requests_sent.slice(0, sentFriendRequestsShowCount) : [],
        newFriendRequestsSent = sentFriendRequestsToShow.length > 0;

  const receivedFriendRequestsShowCount = Math.min(maxResults, receivedFriendRequestsCount),
        receivedFriendRequestsToShow = props.loggedUser ? props.loggedUser.friend_requests_received.slice(0, receivedFriendRequestsShowCount) : [],
        newFriendRequestsReceived = receivedFriendRequestsToShow.length > 0;

  return (
    <HeaderDropdown icon="friend" unread={newFriendRequestsReceived || newFriendRequestsSent}>
    {
      !props.loggedUser &&
        <LoaderSpinnerSmall />
    }
    {
      props.loggedUser &&
        <React.Fragment>
          {/* DROPDOWN BOX HEADER */}
          <div className="dropdown-box-header">
            <p className="dropdown-box-header-title">{vikinger_translation.friend_requests}</p>
      
            <div className="dropdown-box-header-actions">
              <p className={`dropdown-box-header-action dropdown-box-header-action-tab ${currentTabItem === 'received' ? 'active' : ''}`} onClick={activateReceivedTab}>{vikinger_translation.received} ({receivedFriendRequestsCount})
              </p>
              <p className={`dropdown-box-header-action dropdown-box-header-action-tab ${currentTabItem === 'sent' ? 'active' : ''}`} onClick={activateSentTab}>{vikinger_translation.sent} ({sentFriendRequestsCount})
              </p>
            </div>
          </div>
          {/* DROPDOWN BOX HEADER */}
      
          {
            currentTabItem === 'received' &&
              <div className="dropdown-box-list no-hover">
              {
                newFriendRequestsReceived &&
                  receivedFriendRequestsToShow.map((request) => {
                    return (
                      <div key={request.id} className="dropdown-box-list-item">
                        <FriendStatus data={request.user}
                                      loggedUser={props.loggedUser}
                                      onActionComplete={props.onActionComplete}
                                      modifiers="request"
                                      allowReject={true}
                        />
                      </div>
                    );
                  })
              }
      
              {
                !newFriendRequestsReceived &&
                  <p className="no-results-text">{vikinger_translation.no_friend_requests_received}</p>
              }
              </div>
          }

          {
            currentTabItem === 'sent' &&
              <div className="dropdown-box-list no-hover">
              {
                newFriendRequestsSent &&
                  sentFriendRequestsToShow.map((request) => {
                    return (
                      <div key={request.id} className="dropdown-box-list-item">
                        <FriendStatus data={request.user}
                                      loggedUser={props.loggedUser}
                                      onActionComplete={props.onActionComplete}
                                      modifiers="request"
                                      allowReject={true}
                        />
                      </div>
                    );
                  })
              }
              
              {
                !newFriendRequestsSent &&
                  <p className="no-results-text">{vikinger_translation.no_friend_requests_sent}</p>
              }
              </div>
          }
      
          <a className="dropdown-box-button secondary" href={props.loggedUser.friend_requests_link}>{vikinger_translation.view_all_friend_requests}</a>
        </React.Fragment>
    }
    </HeaderDropdown>
  );
}

export { HeaderDropdownFriendRequests as default };