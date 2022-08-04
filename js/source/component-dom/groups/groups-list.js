import React from 'react';
import ReactDOM from 'react-dom';

import GroupFilterableList from '../../component/filter/GroupFilterableList';

const groupFilterableListElement = document.querySelector('#group-filterable-list');

if (groupFilterableListElement) {
  const themeColor = groupFilterableListElement.getAttribute('data-themecolor') || false,
        userID = Number.parseInt(groupFilterableListElement.getAttribute('data-userid'), 10) || false,
        searchTerm = groupFilterableListElement.getAttribute('data-searchterm') || false,
        gridType = groupFilterableListElement.getAttribute('data-grid-type') || false;

  ReactDOM.render(
    <GroupFilterableList  itemsPerPage={vikinger_constants.settings.groups_list_items_per_page}
                          themeColor={themeColor}
                          userID={userID}
                          searchTerm={searchTerm}
                          gridType={gridType}
    />,
    groupFilterableListElement
  );
}