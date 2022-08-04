import React, { useState, useEffect } from 'react';

import FilterableList from './FilterableList';

import GroupMemberFilterBar from './GroupMemberFilterBar';

import * as groupMemberRouter from '../../router/group-member/group-member-router';
import * as adsRouter from '../../router/ads/ads-router';

function GroupMemberFilterableList(props) {
  const [ads, setAds] = useState(false);
  const [loadingAds, setLoadingAds] = useState(vikinger_constants.plugin_active['advanced-ads-pro']);

  const getItemsFilters = (currentPage) => {
    const itemsFilters = {
      group_id: props.groupID,
      exclude_admins: false,
      per_page: props.itemsPerPage,
      page: currentPage,
      data_scope: 'user-preview'
    };

    // limit to search term
    if (props.searchTerm) {
      itemsFilters.search = props.searchTerm;
    }

    return itemsFilters;
  };

  const getItemsCountFilters = (filters) => {
    const itemsCountFilters = {
      group_id: props.groupID,
      exclude_admins: false,
      search: filters.search,
      status: filters.status
    };

    // limit to search term
    if (props.searchTerm) {
      itemsCountFilters.search = props.searchTerm;
    }

    return itemsCountFilters;
  };

  const getMemberAds = () => {
    const getAdsByMemberPlacementPromise = adsRouter.getAdsByMemberPlacement();

    getAdsByMemberPlacementPromise
    .done((response) => {
      // console.log('MEMBER FILTERABLE LIST - GET ADS BY MEMBER PLACEMENT RESPONSE: ', response);

      setAds(response);
      setLoadingAds(false);
    })
    .fail((error) => {
      // console.log('MEMBER FILTERABLE LIST - GET ADS BY MEMBER PLACEMENT ERROR: ', error);
    });
  };

  useEffect(() => {
    if (vikinger_constants.plugin_active['advanced-ads-pro']) {
      getMemberAds();
    }
  }, []);

  return(
    <FilterableList itemType='member'
                    gridType={props.gridType}
                    themeColor={props.themeColor}
                    itemsPerPage={props.itemsPerPage}
                    filterBar={GroupMemberFilterBar}
                    getItems={groupMemberRouter.getGroupMembers}
                    getItemsFilters={getItemsFilters}
                    getItemsCount={groupMemberRouter.getGroupMembersCount}
                    getItemsCountFilters={getItemsCountFilters}
                    searchTerm={props.searchTerm}
                    loggedUserScope='user-friends'
                    ads={ads}
                    adsPlacement='bp_directory_members_item'
                    loadingAds={loadingAds}
    />
  );
}

export { GroupMemberFilterableList as default };