import React, { useState, useRef, useEffect } from 'react';

import HeaderDropdown from '../HeaderDropdown';

import NotificationStatus from '../../../user-status/user-status-notification/NotificationStatus';

import LoaderSpinnerSmall from '../../../loader/LoaderSpinnerSmall';

import SimpleBar from 'simplebar-react';

import * as notificationRouter from '../../../../router/notification/notification-router';

function HeaderDropdownNotifications(props) {
  const [notifications, setNotifications] = useState([]);
  const [unreadNotificationsCount, setUnreadNotificationsCount] = useState(0);

  const simplebarStyles = useRef({ overflowX: 'hidden', height: '100%' });

  const markNotificationAsRead = (i) => {
    const selectedNotification = notifications[i];

    // console.log('HEADER DROPDOWN NOTIFICATIONS - MARK NOTIFICATION AS READ: ', notification);

    // update notification data to be marked as read
    const markNotificationAsReadPromise = notificationRouter.markNotificationAsRead({
      id: selectedNotification.id
    });

    markNotificationAsReadPromise
    .done((response) => {
      // console.log('HEADER DROPDOWN NOTIFICATIONS - MARK NOTIFICATIONS AS READ RESPONSE: ', response);
    })
    .fail((error) => {
      // console.log('HEADER DROPDOWN NOTIFICATIONS - MARK NOTIFICATIONS AS READ ERROR: ', error);
    });

    // mark notification as read in state (optimistic approach)
    setNotifications(previousNotifications => {
      const newNotifications = previousNotifications.map((notification) => {
        if (notification.id === selectedNotification.id) {
          notification.is_new = 0;
        }

        return notification;
      });

      // console.log('HEADER DROPDOWN NOTIFICATIONS - UPDATED NOTIFICATIONS: ', newNotifications);

      return newNotifications;
    });

    setUnreadNotificationsCount(previousUnreadNotificationsCount => {
      return previousUnreadNotificationsCount - 1;
    });
  };

  const getUnreadNotificationsCount = () => {
    const unreadNotificationsCountPromise = notificationRouter.getUnreadNotificationsCount();

    unreadNotificationsCountPromise
    .done((response) => {
      // console.log('HEADER DROPDOWN NOFITICATIONS - GET UNREAD NOTIFICATIONS COUNT: ', response);

      setUnreadNotificationsCount(Number.parseInt(response, 10));
    })
    .fail((error) => {
      // console.log('HEADER DROPDOWN NOFITICATIONS - GET UNREAD NOTIFICATIONS COUNT ERROR: ', error);
    });
  };

  const getNotifications = () => {
    const getNotificationsPromise = notificationRouter.getNotifications({ per_page: 8 });

    getNotificationsPromise
    .done((response) => {
      // console.log('HEADER DROPDOWN NOTIFICATIONS - GET NOTIFICATIONS RESPONSE: ', response);

      setNotifications(response ? response : []);
    })
    .fail((error) => {
      // console.log('HEADER DROPDOWN NOTIFICATIONS - GET NOTIFICATIONS RESPONSE: ', error);
    });
  };

  useEffect(() => {
    getNotifications();
    getUnreadNotificationsCount();
  }, []);

  return (
    <HeaderDropdown icon="notification" unread={unreadNotificationsCount > 0}>
    {
      !props.loggedUser &&
        <LoaderSpinnerSmall />
    }
    {
      props.loggedUser &&
        <React.Fragment>
          <div className="dropdown-box-header">
            <p className="dropdown-box-header-title">{vikinger_translation.notifications} <span className="highlighted">{unreadNotificationsCount}</span></p>
          </div>
      
          <div className="dropdown-box-list">
          <SimpleBar style={simplebarStyles.current}>
          {
            (notifications.length > 0) &&
              notifications.map((notification, i) => {
                return (
                  <div  key={notification.id}
                        className={`dropdown-box-list-item ${notification.is_new ? 'unread' : ''}`}
                        {...(notification.is_new ? {onMouseEnter: () => {markNotificationAsRead(i);}} : {})}
                  >
                    <NotificationStatus data={notification} />
                  </div>
                );
              })
          }

          {
            (notifications.length === 0) &&
              <p className="no-results-text">{vikinger_translation.no_notifications_received}</p>
          }
          </SimpleBar>
          </div>
      
          <a className="dropdown-box-button secondary" href={props.loggedUser.notifications_link}>{vikinger_translation.view_all_notifications}</a>
        </React.Fragment>
    }
    </HeaderDropdown>
  );
}

export { HeaderDropdownNotifications as default };