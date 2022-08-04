import React, { useState, useRef, useEffect } from 'react';

import Loader from '../loader/Loader';

import ItemPreviewList from './ItemPreviewList';

import Pager from '../pager/Pager';

import { deepExtend } from '../../utils/core';

import * as userRouter from '../../router/user/user-router';

function FilterableList(props) {
  const [items, setItems] = useState([]);
  const [itemCount, setItemCount] = useState(0);

  const [gridType, setGridType] = useState(props.gridType || 'small');

  const [loadingItems, setLoadingItems] = useState(false);

  const [loggedUser, setLoggedUser] = useState(false);
  const [loadingUser, setLoadingUser] = useState(true);

  const filterableListRef = useRef(null);

  const getLoggedInMember = (callback = () => {}) => {
    const getLoggedInMemberScope = props.loggedUserScope ? props.loggedUserScope : 'user-status';

    const getLoggedInMemberPromise = userRouter.getLoggedInMember(getLoggedInMemberScope);

    getLoggedInMemberPromise
    .done((loggedUser) => {
      // console.log('FILTERABLE LIST - LOGGED USER: ', loggedUser);

      setLoggedUser(loggedUser);
      setLoadingUser(false);

      callback();
    });
  };

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const themeColor = props.themeColor || 'primary';
  const filters = useRef({});
  
  const currentPage = useRef(1);
  
  const getItems = () => {
    const config = props.getItemsFilters(currentPage.current);

    deepExtend(config, filters.current);
    
    // console.log('FILTERABLE LIST - GET ITEMS CONFIG: ', config);

    return props.getItems(config);
  };

  const getItemsCount = (callback) => {
    const config = props.getItemsCountFilters(filters.current);

    // console.log('FILTERABLE LIST - GET ITEMS COUNT CONFIG: ', config);

    props.getItemsCount(config, callback);
  };

  const updateItems = () => {
    setLoadingItems(true);

    getItems()
    .done((items) => {
      // console.log('FILTERABLE LIST - ITEMS: ', items);

      setItems(items);
    })
    .fail((error) => {
      // console.log('FILTERABLE LIST - ERROR: ', error);
    })
    .always(() => {
      setLoadingItems(false);
    });
  };

  const updateItemsCount = () => {
    getItemsCount((itemCount) => {
      // console.log('FILTERABLE LIST - ITEM COUNT: ', itemCount);

      setItemCount(itemCount);
    });
  };

  const applyFilters = (filtersData) => {
    // console.log('FILTERABLE LIST - APPLY FILTERS: ', filtersData);

    // check if filters changed
    let filtersChanged = false;

    for (const filter in filtersData) {
      if (filters.current[filter] !== filtersData[filter]) {
        filtersChanged = true;
        break;
      }
    }

    // if filters didn't change, don't update
    if (!filtersChanged) {
      return;
    }

    deepExtend(filters.current, filtersData);

    // filters changed, update count
    // and reset to first page
    currentPage.current = 1;
    updateItemsCount();
    updateItems();
  };

  const setGrid = (gridType) => {
    setGridType(gridType);

    // only save grid type if there is a user logged in
    if (loggedUser) {
      const updateLoggedUserGridTypePromise = userRouter.updateLoggedUserGridType({grid_component: props.itemType, grid_type: gridType});

      // console.log('FILTERABLE LIST - UPDATE LOGGED USER GRID TYPE: ', props.itemType, gridType);

      updateLoggedUserGridTypePromise
      .done((response) => {
        // console.log('FILTERABLE LIST - UPDATE LOGGED USER GRID TYPE RESPONSE: ', response);
      })
      .fail((error) => {
        // console.log('FILTERABLE LIST - UPDATE LOGGED USER GRID TYPE ERROR: ', error);
      });
    }
  };

  const onPageChange = () => {
    // console.log('FILTERABLE LIST - ON PAGE CHANGE: ', filterableListRef.current);
    
    if (filterableListRef.current) {
      filterableListRef.current.scrollIntoView();
      window.scrollBy({
        top: -120
      });
    }
  };

  const showPage = (pageNumber) => {
    // if page didn't change, don't update items
    if (currentPage.current === pageNumber) {
      return;
    }

    currentPage.current = pageNumber;
    onPageChange();
    updateItems();
  };
  
  const FilterBar = props.filterBar;

  const itemTypeText = itemCount === 1 ? vikinger_translation.result : vikinger_translation.results;
  
  return (
    <div ref={filterableListRef}>
      <FilterBar  extraFilters={props.extraFilters}
                  applyFilters={applyFilters}
                  gridType={gridType}
                  setGrid={setGrid}
                  themeColor={themeColor}
                  searchTerm={props.searchTerm}
      />
      {
        (loadingItems || loadingUser || props.loadingAds) &&
          <Loader />
      }
      {
        !(loadingItems || loadingUser || props.loadingAds) &&
          <React.Fragment>
            <ItemPreviewList  itemType={props.itemType}
                              gridType={gridType}
                              data={items}
                              loggedUser={loggedUser}
                              onActionComplete={getLoggedInMember}
                              ads={props.ads}
                              adsPlacement={props.adsPlacement}
            />
          {
            itemCount !== 0 &&
              <React.Fragment>
                <Pager  pageCount={Math.ceil(itemCount / props.itemsPerPage)}
                        activePage={currentPage.current}
                        showPage={showPage}
                        themeColor={themeColor}
                />
                <p className="section-results-text">
                {vikinger_translation.showing_results_text_1} {currentPage.current === 1 ? 1 : (props.itemsPerPage * (currentPage.current - 1)) + 1} - {(props.itemsPerPage * currentPage.current) > itemCount ? itemCount : props.itemsPerPage * currentPage.current} {vikinger_translation.showing_results_text_2} {itemCount} {itemTypeText.toLowerCase()}
                </p>
              </React.Fragment>
          }
          </React.Fragment>
      }
    </div>
  );
}

export { FilterableList as default };