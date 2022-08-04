import React, { useState, useEffect } from 'react';

import FilterableList from './FilterableList';

import PostFilterBar from './PostFilterBar';

import * as postRouter from '../../router/post/post-router';
import * as adsRouter from '../../router/ads/ads-router';

function PostFilterableList(props) {
  const [ads, setAds] = useState(false);
  const [loadingAds, setLoadingAds] = useState(vikinger_constants.plugin_active['advanced-ads-pro']);

  const postTypes = props.postTypes ? props.postTypes.split(',') : ['post'];
  const categoryExclude = props.categoryExclude ? props.categoryExclude.split(',') : [];
  const postExclude = props.postExclude ? props.postExclude.split(',') : [];

  const getItemsFilters = (currentPage) => {
    const itemFilters = {
      numberposts: props.itemsPerPage,
      paged: currentPage,
      post_type: postTypes
    };

    if (props.categoryExclude) {
      itemFilters.category__not_in = categoryExclude;
    }

    if (props.postExclude) {
      itemFilters.post__not_in = postExclude;
    }

    if (props.tag) {
      itemFilters.tag_id = props.tag;
    }

    if (props.user_id) {
      itemFilters.author = props.user_id;
    }

    if (props.year) {
      itemFilters.year = props.year;
    }

    if (props.month) {
      itemFilters.monthnum = props.month;
    }

    if (props.day) {
      itemFilters.day = props.day;
    }

    // limit to search term
    if (props.searchTerm) {
      itemFilters.s = props.searchTerm;
    }

    return itemFilters;
  };

  const getItemsCountFilters = (filters) => {
    const itemFilters = {
      category: filters.category,
      post_type: postTypes
    };

    if (props.categoryExclude) {
      itemFilters.category__not_in = categoryExclude;
    }

    if (props.postExclude) {
      itemFilters.post__not_in = postExclude;
    }

    if (props.tag) {
      itemFilters.tag_id = props.tag;
    }

    if (props.user_id) {
      itemFilters.author = props.user_id;
    }

    if (props.year) {
      itemFilters.year = props.year;
    }

    if (props.month) {
      itemFilters.monthnum = props.month;
    }

    if (props.day) {
      itemFilters.day = props.day;
    }

    // limit to search term
    if (props.searchTerm) {
      itemFilters.s = props.searchTerm;
    }

    return itemFilters;
  };

  const getPostAds = () => {
    const getAdsByPostPlacementPromise = adsRouter.getAdsByPostPlacement();

    getAdsByPostPlacementPromise
    .done((response) => {
      // console.log('POST FILTERABLE LIST - GET ADS BY POST PLACEMENT RESPONSE: ', response);

      setAds(response);
      setLoadingAds(false);
    })
    .fail((error) => {
      // console.log('POST FILTERABLE LIST - GET ADS BY POST PLACEMENT ERROR: ', error);
    });
  };

  useEffect(() => {
    if (vikinger_constants.plugin_active['advanced-ads-pro']) {
      getPostAds();
    }
  }, []);

  return(
    <FilterableList itemType='post'
                    gridType={props.gridType}
                    itemsPerPage={props.itemsPerPage}
                    extraFilters={{category: props.category, postTypes: postTypes}}
                    filterBar={PostFilterBar}
                    getItems={postRouter.getPosts}
                    getItemsFilters={getItemsFilters}
                    getItemsCount={postRouter.getPostCount}
                    getItemsCountFilters={getItemsCountFilters}
                    ads={ads}
                    adsPlacement='archive_pages'
                    loadingAds={loadingAds}
    />
  );
}

export { PostFilterableList as default };