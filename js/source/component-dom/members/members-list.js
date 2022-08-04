import React from 'react';
import ReactDOM from 'react-dom';

import MemberFilterableList from '../../component/filter/MemberFilterableList';

const memberFilterableListElement = document.querySelector('#member-filterable-list');

if (memberFilterableListElement) {
  const themeColor = memberFilterableListElement.getAttribute('data-themecolor') || false,
        userID = Number.parseInt(memberFilterableListElement.getAttribute('data-userid'), 10) || false,
        groupID = Number.parseInt(memberFilterableListElement.getAttribute('data-groupid'), 10) || false,
        searchTerm = memberFilterableListElement.getAttribute('data-searchterm') || false,
        gridType = memberFilterableListElement.getAttribute('data-grid-type') || false,
        memberInclude = memberFilterableListElement.getAttribute('data-member-include') || false;

  ReactDOM.render(
    <MemberFilterableList itemsPerPage={vikinger_constants.settings.members_list_items_per_page}
                          themeColor={themeColor}
                          userID={userID}
                          groupID={groupID}
                          searchTerm={searchTerm}
                          gridType={gridType}
                          memberInclude={memberInclude}
    />,
    memberFilterableListElement
  );
}