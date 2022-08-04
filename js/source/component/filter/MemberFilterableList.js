import React, { useState, useEffect } from 'react';

import FilterableList from './FilterableList';

import MemberFilterBar from './MemberFilterBar';

import * as memberRouter from '../../router/member/member-router';
import * as adsRouter from '../../router/ads/ads-router';

function MemberFilterableList(props) {
  const [ads, setAds] = useState(false);
  const [loadingAds, setLoadingAds] = useState(vikinger_constants.plugin_active['advanced-ads-pro']);

  const memberInclude = props.memberInclude ? props.memberInclude.split(',') : [];

  const getItemsFilters = (currentPage) => {
    const itemsFilters = {
      per_page: props.itemsPerPage,
      page: currentPage,
      data_scope: 'user-preview'
    };

    // limit to members friends of user
    if (props.userID) {
      itemsFilters.user_id = props.userID;
    }

    // limit to members of a group
    if (props.groupID) {
      itemsFilters.group_id = props.groupID;
    }

    // limit to search term
    if (props.searchTerm) {
      itemsFilters.search = props.searchTerm;
    }

    if (props.memberInclude) {
      itemsFilters.include = memberInclude;
    }

    return itemsFilters;
  };

  const getItemsCountFilters = (filters) => {
    const itemsCountFilters = {
      search: filters.search,
      type: filters.type
    };

    // limit to members friends of user
    if (props.userID) {
      itemsCountFilters.user_id = props.userID;
    }

    // limit to members of a group
    if (props.groupID) {
      itemsCountFilters.group_id = props.groupID;
    }

    // limit to search term
    if (props.searchTerm) {
      itemsCountFilters.search = props.searchTerm;
    }

    if (props.memberInclude) {
      itemsCountFilters.include = memberInclude;
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
                    filterBar={MemberFilterBar}
                    getItems={memberRouter.getMembers}
                    getItemsFilters={getItemsFilters}
                    getItemsCount={memberRouter.getMembersCount}
                    getItemsCountFilters={getItemsCountFilters}
                    searchTerm={props.searchTerm}
                    loggedUserScope='user-friends'
                    ads={ads}
                    adsPlacement='bp_directory_members_item'
                    loadingAds={loadingAds}
    />
  );
}

export { MemberFilterableList as default };