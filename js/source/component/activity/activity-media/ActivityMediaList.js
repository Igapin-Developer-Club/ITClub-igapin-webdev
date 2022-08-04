import React, { useState, useRef, useEffect } from 'react';

import Paginator from '../../utils/Paginator';

import SectionHeader from '../../section/SectionHeader';

import Notification from '../../notification/Notification';

import Loader from '../../loader/Loader';

import ScrollPager from '../../pager/ScrollPager';

import { deepExtend } from '../../../utils/core';

import * as userRouter from '../../../router/user/user-router';
import * as activityRouter from '../../../router/activity/activity-router';
import * as reactionRouter from '../../../router/reaction/reaction-router';
import * as memberRouter from '../../../router/member/member-router';
import * as groupRouter from '../../../router/group/group-router';

import { updateActivities } from '../../utils/activity/activity-data';

function ActivityMediaList(props) {
  const [activities, setActivities] = useState({
    items: [],
    selectedItems: [],
    selectedAll: false,
    initialFetch: true,
    moreItems: true
  });

  const [activityCount, setActivityCount] = useState(0);

  const [reactions, setReactions] = useState([]);

  const [loggedUser, setLoggedUser] = useState(false);
  const [activityUser, setActivityUser] = useState(false);

  const [loading, setLoading] = useState(true);

  const currentPage = useRef(1);

  const createCount = useRef(0);
  const deleteCount = useRef(0);

  const filters = useRef({
    per_page: props.perPage,
    sort: props.order,
    show_hidden: props.groupID ? true : false,
    filter: {
      object: props.userID ? 'activity' : 'groups',
      action: props.activityGetType,
      primary_id: props.userID ? props.userID : props.groupID
    }
  });

  const getActivities = (callback, options = {}) => {
    // get next page to fetch based on create and delete counts
    currentPage.current = Paginator.getNextPageToFetch({
      page: currentPage.current,
      per_page: props.perPage,
      createCount: createCount.current,
      deleteCount: deleteCount.current
    });

    // reset counts
    createCount.current = 0;
    deleteCount.current = 0;

    const config = {
      page: currentPage.current
    };

    deepExtend(config, filters.current);
    deepExtend(config, options);

    // console.log('ACTIVITY MEDIA LIST - ACTIVITY FILTERS: ', config);

    activityRouter.getActivities(config, callback);
  };

  const reloadActivities = () => {
    currentPage.current = 1;

    // reset counts
    createCount.current = 0;
    deleteCount.current = 0;

    setActivities({
      items: [],
      selectedItems: [],
      selectedAll: false,
      initialFetch: true,
      moreItems: true
    });

    getActivitiesPage();
  };

  const activitiesSelected = () => {
    for (const item of activities.selectedItems) {
      if (item) {
        return true;
      }
    }

    return false;
  };

  const deleteSelected = (callback) => {
    const activityMediaToDelete = [];

    for (let i = 0; i < activities.items.length; i++) {
      const activity = activities.items[i];

      // if the activity is selected
      if (activities.selectedItems[i]) {
        activityMediaToDelete.push({
          activity_id: activity.id,
          media: activity.media,
          component: {
            id: activity.item_id,
            type: activity.component === 'activity' ? 'member' : 'group'
          }
        });
      }
    }

    // console.log('ACTIVITY MEDIA LIST - DELETE SELECTED: ', activityMediaToDelete);

    activityRouter.deleteActivityMedia(activityMediaToDelete, (response) => {
      // console.log('ACTIVITY MEDIA LIST - DELETED RESPONSE: ', response);

      callback();

      // if deleted successfully, response is array of deleted activity media IDs
      if (response) {
        deleteCount.current += response.length;

        // refresh activity count
        getActivitiesCount();

        // remove from state activities
        setActivities(previousActivities => {
          const newActivities = previousActivities.items.filter((item) => {
            return !response.some((activity_id) => {
              return activity_id == item.id;
            });
          });
    
          // console.log('ACTIVITY MEDIA LIST - ACTIVITIES AFTER DELETE: ', newActivities);
    
          return {
            ...previousActivities,
            items: newActivities,
            selectedItems: (new Array(newActivities.length)).fill(false),
            selectedAll: false
          };
        });
      } else {
        // console.log('ACTIVITY MEDIA LIST - DELETE ERROR');
      }
    });
  };

  const toggleSelectableActive = (i) => {
    setActivities(previousActivities => {
      const newSelectedActivities = previousActivities.selectedItems.slice();

      newSelectedActivities[i] = !newSelectedActivities[i];

      // console.log('ACTIVITY MEDIA LIST - SELECTED ACTIVITIES: ', newSelectedActivities);

      return {
        ...previousActivities,
        selectedItems: newSelectedActivities
      };
    });
  };

  const toggleAllSelectable = () => {
    if (!activities.selectedAll) {
      selectAll();
    } else {
      unselectAll();
    }
  };

  const selectAll = () => {
    setActivities(previousActivities => {
      return {
        ...previousActivities,
        selectedItems: (new Array(previousActivities.items.length)).fill(true),
        selectedAll: true
      };
    });
  };

  const unselectAll = () => {
    setActivities(previousActivities => {
      return {
        ...previousActivities,
        selectedItems: (new Array(previousActivities.items.length)).fill(false),
        selectedAll: false
      };
    });
  };

  const getActivitiesPage = (callback = () => {}) => {
    getActivities((response) => {
      // console.log('ACTIVITY MEDIA LIST - ACTIVITY DATA: ', response);

      currentPage.current += 1;

      setActivities(previousActivities => {
        const activitiesWithoutDuplicates = Paginator.removeDuplicates(previousActivities.items, response.activities, 'id'),
              newSelectedActivities = (new Array(activitiesWithoutDuplicates.length)).fill(false);

        return {
          ...previousActivities,
          items: previousActivities.items.concat(activitiesWithoutDuplicates),
          selectedItems: previousActivities.selectedItems.concat(newSelectedActivities),
          moreItems: response.has_more_items,
          initialFetch: false
        };
      });

      callback(response.has_more_items);
    });
  };

  const onUpload = (data, callback) => {
    // console.log('ACTIVITY MEDIA LIST - CREATE ACTIVITY WITH DATA: ', data);

    // post to own profile or group and hide sitewide according to group status
    const itemID = props.groupID ? props.groupID : 0,
          hideSitewide = props.groupID ? activityUser.status !== 'public' : false;

    const component = itemID === 0 ? 'member' : 'group',
          componentID = component === 'member' ? loggedUser.id : itemID,
          files = [];

    for (const media of data.uploadable_media) {
      files.push(media.file);
    }

    const uploadable_media = {
      files: files,
      component: {
        type: component,
        id: componentID,
        uploader_id: loggedUser.id
      }
    };

    const activityData = {
      creation_config: {
        item_id: itemID,
        user_id: loggedUser.id,
        component: itemID === 0 ? 'activity' : 'groups',
        type: props.activityCreateType,
        content: data.text.trim(),
        hide_sitewide: hideSitewide
      },
      uploadable_media: uploadable_media,
      uploadable_media_type: data.uploadable_media_type
    };

    // console.log('ACTIVITY MEDIA LIST - CREATE ACTIVITY: ', activityData);

    activityRouter.createActivity(activityData, (response) => {
      // console.log('ACTIVITY MEDIA LIST - CREATE ACTIVITY RESPONSE: ', response);

      callback(response);

      // if activity created successfully
      if (response) {
        // refresh activity count
        getActivitiesCount();
        // reload activities to show newly created ones
        reloadActivities();
      }
    });
  };

  const getLoggedUser = () => {
    userRouter.getLoggedInMember('user-activity')
    .done((loggedUser) => {
      // console.log('ACTIVITY MEDIA LIST - LOGGED IN USER: ', loggedUser);

      setLoggedUser(loggedUser);
    });
  };

  const getActivityMediaListUser = () => {
    if (props.userID) {
      memberRouter.getMembers({ include: [props.userID] })
      .done((user) => {
        // console.log('ACTIVITY MEDIA LIST - ACTIVITY USER: ', user[0]);

        setActivityUser(user[0]);
        setLoading(false);
      });
    } else if (props.groupID) {
      groupRouter.getGroups({include: [props.groupID]})
      .done((group) => {
        // console.log('ACTIVITY MEDIA LIST - ACTIVITY GROUP: ', group[0]);

        setActivityUser(group[0]);
        setLoading(false);
      });
    }
  };

  const getActivitiesCount = () => {
    const config = {
      show_hidden: props.groupID ? true : false,
      filter: filters.current.filter
    };

    // console.log('ACTIVITY MEDIA LIST - ACTIVITY COUNT FILTERS: ', config);

    activityRouter.getActivities(config, (response) => {
      // console.log('ACTIVITY MEDIA LIST - ACTIVITY TOTAL COUNT: ', response.activities.length);

      setActivityCount(response.activities.length);
    });
  };

  const getReactions = () => {
    reactionRouter.getReactions()
    .done((response) => {
      // console.log('ACTIVITY MEDIA LIST - REACTIONS: ', response);

      setReactions(response);
    });
  };

  const onActivityUpdate = (newActivityData) => {
    // console.log('ACTIVITY MEDIA LIST - ON ACTIVITY UPDATE - NEW ACTIVITY DATA: ', newActivityData);

    setActivities(previousActivities => {
      return {
        ...previousActivities,
        items: updateActivities(previousActivities.items, newActivityData)
      };
    });
  };

  useEffect(() => {
    getLoggedUser();
    
    getActivityMediaListUser();

    getActivitiesCount();

    getActivitiesPage();

    getReactions();
  }, []);

  const ItemPreviewList = props.itemPreviewList,
        ActivityListOptions = props.activityListOptions;

  const inLoggedUserProfile = loggedUser && (loggedUser.id === props.userID);

  // check if the logged user is a member of the group he is seeing
  let inLoggedUserGroup = false;

  if (loggedUser && props.groupID) {
    for (const group of loggedUser.groups) {
      // if logged user is a member of this group and is not banned
      if ((group.id === props.groupID) && !group.is_banned) {
        inLoggedUserGroup = true;
        break;
      }
    }
  }

  // check if logged user is group admin or mod
  let loggedUserIsGroupAdmin = false,
      loggedUserIsGroupMod = false;

  if (inLoggedUserGroup) {
    for (const group of loggedUser.groups) {
      if (group.id === props.groupID) {
        loggedUserIsGroupAdmin = group.is_admin;
        loggedUserIsGroupMod = group.is_mod;
        break;
      }
    }
  }

  // allow logged user to delete items if viewing it's own profile, or a group he is an admin or mod of
  const allowDelete = inLoggedUserProfile || (inLoggedUserGroup && (loggedUserIsGroupAdmin || loggedUserIsGroupMod));

  return (
    <React.Fragment>
    {
      loading &&
        <Loader />
    }
    {
      !loading &&
        <React.Fragment>
          <SectionHeader  pretitle={`${vikinger_translation.browse} ${activityUser.name}`}
                          title={props.sectionTitle}
                          titleCount={activityCount}
          >
            {
              (inLoggedUserProfile || inLoggedUserGroup) &&
                <ActivityListOptions  user={loggedUser}
                                      onUpload={onUpload}
                                      allowDelete={allowDelete}
                                      deleteSelected={deleteSelected}
                                      toggleAllSelectable={toggleAllSelectable}
                                      selectedAll={activities.selectedAll}
                                      activities={activities.items}
                                      activitiesSelected={activitiesSelected}
                />
            }
          </SectionHeader>

          <ScrollPager loadMoreItems={getActivitiesPage} moreItems={activities.moreItems} initialFetch={activities.initialFetch}>
            <React.Fragment>
              {
                (activities.items.length === 0) && !activities.moreItems &&
                  <Notification title={props.noResultsTitle}
                                text={props.noResultsText}
                  />
              }
              {
                (activities.items.length > 0) &&
                  <div className={`grid ${props.gridModifiers} centered-on-mobile`}>
                    <ItemPreviewList  data={activities.items}
                                      user={loggedUser}
                                      reactions={reactions}
                                      modifiers={props.itemPreviewModifiers}
                                      selectable={allowDelete}
                                      selectedItems={activities.selectedItems}
                                      toggleSelectableActive={toggleSelectableActive}
                                      onActivityUpdate={onActivityUpdate}
                    />
                  </div>
              }
            </React.Fragment>
          </ScrollPager>
        </React.Fragment>
    }
    </React.Fragment>
  );
}

export { ActivityMediaList as default };