import React, { useState, useRef, useEffect, useLayoutEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import Notification from '../notification/Notification';
import NotificationBoxList from '../notification/NotificationBoxList';

import MessageBox from '../message/MessageBox';

import ScrollPager from '../pager/ScrollPager';

import { createPopup } from '../../utils/plugins';

import * as userRouter from '../../router/user/user-router';
import * as notificationRouter from '../../router/notification/notification-router';

function NotificationsSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const [notifications, setNotifications] = useState([]);

  const [initialFetch, setInitialFetch] = useState(true);
  const [moreItems, setMoreItems] = useState(true);

  const [selectedNotifications, setSelectedNotifications] = useState([]);
  const [selectedAll, setSelectedAll] = useState(false);

  const currentPage = useRef(1);

  const messageBoxRef = useRef(null);;
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

  useEffect(() => {
    getLoggedInMember();

    getNotificationsPage();
  }, []);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember()
    .done((response) => {
      // console.log('NOTIFICATIONS SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);
    });
  };

  const notificationsSelected = () => {
    return selectedNotifications.some(selected => selected);
  };

  const deleteSelected = () => {
    const notificationsToDelete = [];

    selectedNotifications.forEach((selectedNotification, i) => {
      // add notification to be deleted if it is selected
      if (selectedNotification) {
        notificationsToDelete.push(notifications[i].id);
      }
    });

    // console.log('NOTIFICATIONS SETTINGS SCREEN - DELETE: ', notificationsToDelete);

    const deleteNotificationsPromise = notificationRouter.deleteNotifications(notificationsToDelete);

    deleteNotificationsPromise
    .done((response) => {
      // console.log('NOTIFICATIONS SETTINGS SCREEN - DELETE RESPONSE: ', response);
    })
    .fail((error) => {
      // console.log('NOTIFICATIONS SETTINGS SCREEN - DELETE ERROR: ', error);
    });

    // delete notifications (optimistic approach)
    const newNotifications = notifications.slice().filter((notification) => {
      return !notificationsToDelete.includes(notification.id);
    });

    // console.log('NOTIFICATIONS SETTINGS SCREEN - UPDATED NOTIFICATIONS: ', newNotifications);

    setNotifications(newNotifications);
    setSelectedNotifications((new Array(newNotifications.length)).fill(false));
    setSelectedAll(false);
  };

  const markSelectedAsRead = () => {
    const notificationsToMarkAsRead = [];

    selectedNotifications.forEach((selectedNotification, i) => {
      // add notification to be marked as read if it is selected
      if (selectedNotification) {
        notificationsToMarkAsRead.push(notifications[i].id);
      }
    });

    // console.log('NOTIFICATIONS SETTINGS SCREEN - MARK AS READ: ', notificationsToMarkAsRead);

    const markNotificationsAsReadPromise = notificationRouter.markNotificationsAsRead(notificationsToMarkAsRead);

    markNotificationsAsReadPromise
    .done((response) => {
      // console.log('NOTIFICATIONS SETTINGS SCREEN - MARK AS READ RESPONSE: ', response);
    })
    .fail((error) => {
      // console.log('NOTIFICATIONS SETTINGS SCREEN - MARK AS READ ERROR: ', error);
    });

    // mark notifications as read in state (optimistic approach)
    const newNotifications = notifications.slice();

    for (const notification of newNotifications) {
      // if notification was marked as read, update it
      if (notificationsToMarkAsRead.includes(notification.id)) {
        notification.is_new = 0;
      }
    }

    // console.log('NOTIFICATIONS SETTINGS SCREEN - UPDATED NOTIFICATIONS: ', newNotifications);

    setNotifications(newNotifications);
  };

  const toggleSelectableActive = (i) => {
    const newSelectedNotifications = selectedNotifications.slice();

    newSelectedNotifications[i] = !newSelectedNotifications[i];

    // console.log('NOTIFICATIONS SETTINGS SCREEN - SELECTED NOTIFICATIONS: ', newSelectedNotifications);

    setSelectedNotifications(newSelectedNotifications);
  };

  const toggleAllSelectable = () => {
    if (!selectedAll) {
      selectAll();
    } else {
      unselectAll();
    }
  };

  const selectAll = () => {
    setSelectedNotifications((new Array(notifications.length)).fill(true));
    setSelectedAll(true);
  };

  const unselectAll = () => {
    setSelectedNotifications((new Array(notifications.length)).fill(false));
    setSelectedAll(false);
  };

  const getNotificationsPage = (callback = () => {}) => {
    const notificationsPromise = notificationRouter.getNotifications({
      user_id: loggedUser.id,
      per_page: 100,
      page: currentPage.current
    });

    notificationsPromise
    .done((response) => {
      // console.log('NOTIFICATIONS SETTINGS SCREEN - GET NOTIFICATIONS PAGE ', currentPage.current, ' RESPONSE: ', response);

      currentPage.current += 1;

      const newNotifications = response ? response : [];
      const newSelectedNotifications = (new Array(newNotifications.length)).fill(false);
      const newMoreItems = newNotifications.length > 0;

      setNotifications(notifications.concat(newNotifications));
      setSelectedNotifications(selectedNotifications.concat(newSelectedNotifications));
      setMoreItems(newMoreItems);
      setInitialFetch(false);

      callback(newMoreItems);
    });
  };

  return (
    <div className="account-hub-content">
      <SectionHeader  pretitle={vikinger_translation.my_profile} title={vikinger_translation.notifications}>
      {
        (notifications.length > 0) &&
          <div className="section-header-actions">
          {
            notificationsSelected() &&
              <React.Fragment>
                <p className="section-header-action" onClick={() => {popup.current.show();}}>{vikinger_translation.delete}</p>
                <p className="section-header-action" onClick={markSelectedAsRead}>{vikinger_translation.mark_as_read}</p>
              </React.Fragment>
          }
            <p className="section-header-action" onClick={toggleAllSelectable}>{!selectedAll ? vikinger_translation.select_all : vikinger_translation.unselect_all}</p>
          </div>
      }
      </SectionHeader>

      {/* MESSAGE BOX */}
      <MessageBox forwardedRef={messageBoxRef}
                  data={{title: vikinger_translation.delete, text: vikinger_translation.delete_selected_message}}
                  error
                  confirm
                  onAccept={() => {deleteSelected(); popup.current.hide();}}
                  onCancel={() => {popup.current.hide();}}
      />
      {/* MESSAGE BOX */}

      {
        loggedUser &&
          <ScrollPager loadMoreItems={getNotificationsPage} moreItems={moreItems} initialFetch={initialFetch}>
            <React.Fragment>
              {
                (notifications.length === 0) && !moreItems &&
                  <Notification title={vikinger_translation.notifications_received_no_results_title}
                                text={vikinger_translation.notifications_received_no_results_text}
                  />
              }

              <NotificationBoxList  data={notifications}
                                    selectable={true}
                                    selectedItems={selectedNotifications}
                                    toggleSelectableActive={toggleSelectableActive}
              />
            </React.Fragment>
          </ScrollPager>
      }
    </div>
  );
}

export { NotificationsSettingsScreen as default };