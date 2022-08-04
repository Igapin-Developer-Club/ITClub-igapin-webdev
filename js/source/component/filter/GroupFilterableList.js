import React, { useState, useEffect } from 'react';

import FilterableList from './FilterableList';

import GroupFilterBar from './GroupFilterBar';

import * as groupRouter from '../../router/group/group-router';
import * as adsRouter from '../../router/ads/ads-router';

function GroupFilterableList(props) {
  const [ads, setAds] = useState(false);
  const [loadingAds, setLoadingAds] = useState(vikinger_constants.plugin_active['advanced-ads-pro']);

  const getItemsFilters = (currentPage) => {
    const itemsFilters = {
      per_page: props.itemsPerPage,
      page: currentPage,
      data_scope: 'group-preview'
    };

    // limit to user groups
    if (props.userID) {
      itemsFilters.user_id = props.userID;
    }

    // limit to search term
    if (props.searchTerm) {
      itemsFilters.search = props.searchTerm;
      // itemsFilters.search_columns = ['name'];
    }

    return itemsFilters;
  };

  const getItemsCountFilters = (filters) => {
    const itemsCountFilters = {
      search: filters.search,
      type: filters.type
    };

    // limit to user groups
    if (props.userID) {
      itemsCountFilters.user_id = props.userID;
    }

    // limit to search term
    if (props.searchTerm) {
      itemsCountFilters.search = props.searchTerm;
      // itemsCountFilters.search_columns = ['name'];
    }

    return itemsCountFilters;
  };

  const getGroupAds = () => {
    const getAdsByGroupPlacementPromise = adsRouter.getAdsByGroupPlacement();

    getAdsByGroupPlacementPromise
    .done((response) => {
      // console.log('GROUP FILTERABLE LIST - GET ADS BY GROUP PLACEMENT RESPONSE: ', response);

      setAds(response);
      setLoadingAds(false);
    })
    .fail((error) => {
      // console.log('GROUP FILTERABLE LIST - GET ADS BY GROUP PLACEMENT ERROR: ', error);
    });
  };

  useEffect(() => {
    if (vikinger_constants.plugin_active['advanced-ads-pro']) {
      getGroupAds();
    }
  }, []);

  return(
    <FilterableList itemType='group'
                    gridType={props.gridType}
                    themeColor={props.themeColor}
                    itemsPerPage={props.itemsPerPage}
                    filterBar={GroupFilterBar}
                    getItems={groupRouter.getGroups}
                    getItemsFilters={getItemsFilters}
                    getItemsCount={groupRouter.getGroupsCount}
                    getItemsCountFilters={getItemsCountFilters}
                    searchTerm={props.searchTerm}
                    loggedUserScope='user-groups'
                    ads={ads}
                    adsPlacement='bp_directory_groups_item'
                    loadingAds={loadingAds}
    />
  );
}

export { GroupFilterableList as default };